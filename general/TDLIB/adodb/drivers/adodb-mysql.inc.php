<?php
/*
V5.11 5 May 2010   (c) 2000-2010 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license.
  Whenever there is any discrepancy between the two licenses,
  the BSD license will take precedence.
  Set tabs to 8.

  MySQL code that does not support transactions. Use mysqlt if you need transactions.
  Requires mysql client. Works on Windows and Unix.

 28 Feb 2001: MetaColumns bug fix - suggested by  Freek Dijkstra (phpeverywhere@macfreek.com)
*/

// security - hide paths
if (!defined('ADODB_DIR')) die();

if (! defined("_ADODB_MYSQL_LAYER")) {
 define("_ADODB_MYSQL_LAYER", 1 );

class ADODB_mysql extends ADOConnection {
	var $databaseType = 'mysql';
	var $dataProvider = 'mysql';
	var $hasInsertID = true;
	var $hasAffectedRows = true;
	var $metaTablesSQL = "SHOW TABLES";
	var $metaColumnsSQL = "SHOW COLUMNS FROM `%s`";
	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	var $hasLimit = true;
	var $hasMoveFirst = true;
	var $hasGenID = true;
	var $isoDates = true; // accepts dates in ISO format
	var $sysDate = 'CURDATE()';
	var $sysTimeStamp = 'NOW()';
	var $hasTransactions = false;
	var $forceNewConnect = false;
	var $poorAffectedRows = true;
	var $clientFlags = 0;
	var $substr = "substring";
	var $nameQuote = '`';		/// string to use to quote identifiers and names
	var $compat323 = false; 		// true if compat with mysql 3.23

	function ADODB_mysql()
	{
		if (defined('ADODB_EXTENSION')) $this->rsPrefix .= 'ext_';
	}

	function ServerInfo()
	{
		$arr['description'] = ADOConnection::GetOne("select version()");
		$arr['version'] = ADOConnection::_findvers($arr['description']);
		return $arr;
	}

	function IfNull( $field, $ifNull )
	{
		return " IFNULL($field, $ifNull) "; // if MySQL
	}



	function MetaTables($ttype=false,$showSchema=false,$mask=false)
	{
		$save = $this->metaTablesSQL;
		if ($showSchema && is_string($showSchema)) {
			$this->metaTablesSQL .= " from $showSchema";
		}

		if ($mask) {
			$mask = $this->qstr($mask);
			$this->metaTablesSQL .= " like $mask";
		}
		$ret = ADOConnection::MetaTables($ttype,$showSchema);

		$this->metaTablesSQL = $save;
		return $ret;
	}


	function MetaIndexes ($table, $primary = FALSE, $owner=false)
	{
        // save old fetch mode
        global $ADODB_FETCH_MODE;

		$false = false;
        $save = $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
        if ($this->fetchMode !== FALSE) {
               $savem = $this->SetFetchMode(FALSE);
        }

        // get index details
        $rs = $this->Execute(sprintf('SHOW INDEX FROM %s',$table));

        // restore fetchmode
        if (isset($savem)) {
                $this->SetFetchMode($savem);
        }
        $ADODB_FETCH_MODE = $save;

        if (!is_object($rs)) {
                return $false;
        }

        $indexes = array ();

        // parse index data into array
        while ($row = $rs->FetchRow()) {
                if ($primary == FALSE AND $row[2] == 'PRIMARY') {
                        continue;
                }

                if (!isset($indexes[$row[2]])) {
                        $indexes[$row[2]] = array(
                                'unique' => ($row[1] == 0),
                                'columns' => array()
                        );
                }

                $indexes[$row[2]]['columns'][$row[3] - 1] = $row[4];
        }

        // sort columns by order in the index
        foreach ( array_keys ($indexes) as $index )
        {
                ksort ($indexes[$index]['columns']);
        }

        return $indexes;
	}


	// if magic quotes disabled, use mysql_real_escape_string()
	function qstr($s,$magic_quotes=false)
	{
		if (is_null($s)) return 'NULL';
		if (!$magic_quotes) {

			if (ADODB_PHPVER >= 0x4300) {
				if (is_resource($this->_connectionID))
					return "'".mysql_real_escape_string($s,$this->_connectionID)."'";
			}
			if ($this->replaceQuote[0] == '\\'){
				$s = adodb_str_replace(array('\\',"\0"),array('\\\\',"\\\0"),$s);
			}
			return  "'".str_replace("'",$this->replaceQuote,$s)."'";
		}

		// undo magic quotes for "
		$s = str_replace('\\"','"',$s);
		return "'$s'";
	}

	function _insertid()
	{
		return ADOConnection::GetOne('SELECT LAST_INSERT_ID()');
		//return mysql_insert_id($this->_connectionID);
	}

	function GetOne($sql,$inputarr=false)
	{
	global $ADODB_GETONE_EOF;
		if ($this->compat323 == false && strncasecmp($sql,'sele',4) == 0) {
			$rs = $this->SelectLimit($sql,1,-1,$inputarr);
			if ($rs) {
				$rs->Close();
				if ($rs->EOF) return $ADODB_GETONE_EOF;
				return reset($rs->fields);
			}
		} else {
			return ADOConnection::GetOne($sql,$inputarr);
		}
		return false;
	}

	function BeginTrans()
	{
		if ($this->debug) ADOConnection::outp("Transactions not supported in 'mysql' driver. Use 'mysqlt' or 'mysqli' driver");
	}

	function _affectedrows()
	{
			return mysql_affected_rows($this->_connectionID);
	}

 	 // See http://www.mysql.com/doc/M/i/Miscellaneous_functions.html
	// Reference on Last_Insert_ID on the recommended way to simulate sequences
 	var $_genIDSQL = "update %s set id=LAST_INSERT_ID(id+1);";
	var $_genSeqSQL = "create table %s (id int not null)";
	var $_genSeqCountSQL = "select count(*) from %s";
	var $_genSeq2SQL = "insert into %s values (%s)";
	var $_dropSeqSQL = "drop table %s";

	function CreateSequence($seqname='adodbseq',$startID=1)
	{
		if (empty($this->_genSeqSQL)) return false;
		$u = strtoupper($seqname);

		$ok = $this->Execute(sprintf($this->_genSeqSQL,$seqname));
		if (!$ok) return false;
		return $this->Execute(sprintf($this->_genSeq2SQL,$seqname,$startID-1));
	}


	function GenID($seqname='adodbseq',$startID=1)
	{
		// post-nuke sets hasGenID to false
		if (!$this->hasGenID) return false;

		$savelog = $this->_logsql;
		$this->_logsql = false;
		$getnext = sprintf($this->_genIDSQL,$seqname);
		$holdtransOK = $this->_transOK; // save the current status
		$rs = @$this->Execute($getnext);
		if (!$rs) {
			if ($holdtransOK) $this->_transOK = true; //if the status was ok before reset
			$u = strtoupper($seqname);
			$this->Execute(sprintf($this->_genSeqSQL,$seqname));
			$cnt = $this->GetOne(sprintf($this->_genSeqCountSQL,$seqname));
			if (!$cnt) $this->Execute(sprintf($this->_genSeq2SQL,$seqname,$startID-1));
			$rs = $this->Execute($getnext);
		}

		if ($rs) {
			$this->genID = mysql_insert_id($this->_connectionID);
			$rs->Close();
		} else
			$this->genID = 0;

		$this->_logsql = $savelog;
		return $this->genID;
	}

  	function MetaDatabases()
	{
		$qid = mysql_list_dbs($this->_connectionID);
		$arr = array();
		$i = 0;
		$max = mysql_num_rows($qid);
		while ($i < $max) {
			$db = mysql_tablename($qid,$i);
			if ($db != 'mysql') $arr[] = $db;
			$i += 1;
		}
		return $arr;
	}


	// Format date column in sql string given an input format that understands Y M D
	function SQLDate($fmt, $col=false)
	{
		if (!$col) $col = $this->sysTimeStamp;
		$s = 'DATE_FORMAT('.$col.",'";
		$concat = false;
		$len = strlen($fmt);
		for ($i=0; $i < $len; $i++) {
			$ch = $fmt[$i];
			switch($ch) {

			default:
				if ($ch == '\\') {
					$i++;
					$ch = substr($fmt,$i,1);
				}
				/** FALL THROUGH */
			case '-':
			case '/':
				$s .= $ch;
				break;

			case 'Y':
			case 'y':
				$s .= '%Y';
				break;
			case 'M':
				$s .= '%b';
				break;

			case 'm':
				$s .= '%m';
				break;
			case 'D':
			case 'd':
				$s .= '%d';
				break;

			case 'Q':
			case 'q':
				$s .= "'),Quarter($col)";

				if ($len > $i+1) $s .= ",DATE_FORMAT($col,'";
				else $s .= ",('";
				$concat = true;
				break;

			case 'H':
				$s .= '%H';
				break;

			case 'h':
				$s .= '%I';
				break;

			case 'i':
				$s .= '%i';
				break;

			case 's':
				$s .= '%s';
				break;

			case 'a':
			case 'A':
				$s .= '%p';
				break;

			case 'w':
				$s .= '%w';
				break;

			 case 'W':
				$s .= '%U';
				break;

			case 'l':
				$s .= '%W';
				break;
			}
		}
		$s.="')";
		if ($concat) $s = "CONCAT($s)";
		return $s;
	}


	// returns concatenated string
	// much easier to run "mysqld --ansi" or "mysqld --sql-mode=PIPES_AS_CONCAT" and use || operator
	function Concat()
	{
		$s = "";
		$arr = func_get_args();

		// suggestion by andrew005@mnogo.ru
		$s = implode(',',$arr);
		if (strlen($s) > 0) return "CONCAT($s)";
		else return '';
	}

	function OffsetDate($dayFraction,$date=false)
	{
		if (!$date) $date = $this->sysDate;

		$fraction = $dayFraction * 24 * 3600;
		return '('. $date . ' + INTERVAL ' .	 $fraction.' SECOND)';

//		return "from_unixtime(unix_timestamp($date)+$fraction)";
	}

	// returns true or false
	function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		if (!empty($this->port)) $argHostname .= ":".$this->port;

		if (ADODB_PHPVER >= 0x4300)
			$this->_connectionID = mysql_connect($argHostname,$argUsername,$argPassword,
												$this->forceNewConnect,$this->clientFlags);
		else if (ADODB_PHPVER >= 0x4200)
			$this->_connectionID = mysql_connect($argHostname,$argUsername,$argPassword,
												$this->forceNewConnect);
		else
			$this->_connectionID = mysql_connect($argHostname,$argUsername,$argPassword);

		if ($this->_connectionID === false) return false;
		if ($argDatabasename) return $this->SelectDB($argDatabasename);
		return true;
	}

	// returns true or false
	function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		if (!empty($this->port)) $argHostname .= ":".$this->port;

		if (ADODB_PHPVER >= 0x4300)
			$this->_connectionID = mysql_pconnect($argHostname,$argUsername,$argPassword,$this->clientFlags);
		else
			$this->_connectionID = mysql_pconnect($argHostname,$argUsername,$argPassword);
		if ($this->_connectionID === false) return false;
		if ($this->autoRollback) $this->RollbackTrans();
		if ($argDatabasename) return $this->SelectDB($argDatabasename);
		return true;
	}

	function _nconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->forceNewConnect = true;
		return $this->_connect($argHostname, $argUsername, $argPassword, $argDatabasename);
	}

 	function MetaColumns($table, $normalize=true)
	{
		$this->_findschema($table,$schema);
		if ($schema) {
			$dbName = $this->database;
			$this->SelectDB($schema);
		}
		global $ADODB_FETCH_MODE;
		$save = $ADODB_FETCH_MODE;
		$ADODB_FETCH_MODE = ADODB_FETCH_NUM;

		if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);
		$rs = $this->CacheExecute(150,sprintf($this->metaColumnsSQL,$table));

		if ($schema) {
			$this->SelectDB($dbName);
		}

		if (isset($savem)) $this->SetFetchMode($savem);
		$ADODB_FETCH_MODE = $save;
		if (!is_object($rs)) {
			$false = false;
			return $false;
		}

		$retarr = array();
		while (!$rs->EOF){
			$fld = new ADOFieldObject();
			$fld->name = $rs->fields[0];
			$type = $rs->fields[1];

			// split type into type(length):
			$fld->scale = null;
			if (preg_match("/^(.+)\((\d+),(\d+)/", $type, $query_array)) {
				$fld->type = $query_array[1];
				$fld->max_length = is_numeric($query_array[2]) ? $query_array[2] : -1;
				$fld->scale = is_numeric($query_array[3]) ? $query_array[3] : -1;
			} elseif (preg_match("/^(.+)\((\d+)/", $type, $query_array)) {
				$fld->type = $query_array[1];
				$fld->max_length = is_numeric($query_array[2]) ? $query_array[2] : -1;
			} elseif (preg_match("/^(enum)\((.*)\)$/i", $type, $query_array)) {
				$fld->type = $query_array[1];
				$arr = explode(",",$query_array[2]);
				$fld->enums = $arr;
				$zlen = max(array_map("strlen",$arr)) - 2; // PHP >= 4.0.6
				$fld->max_length = ($zlen > 0) ? $zlen : 1;
			} else {
				$fld->type = $type;
				$fld->max_length = -1;
			}
			$fld->not_null = ($rs->fields[2] != 'YES');
			$fld->primary_key = ($rs->fields[3] == 'PRI');
			$fld->auto_increment = (strpos($rs->fields[5], 'auto_increment') !== false);
			$fld->binary = (strpos($type,'blob') !== false || strpos($type,'binary') !== false);
			$fld->unsigned = (strpos($type,'unsigned') !== false);
			$fld->zerofill = (strpos($type,'zerofill') !== false);

			if (!$fld->binary) {
				$d = $rs->fields[4];
				if ($d != '' && $d != 'NULL') {
					$fld->has_default = true;
					$fld->default_value = $d;
				} else {
					$fld->has_default = false;
				}
			}

			if ($save == ADODB_FETCH_NUM) {
				$retarr[] = $fld;
			} else {
				$retarr[strtoupper($fld->name)] = $fld;
			}
				$rs->MoveNext();
			}

			$rs->Close();
			return $retarr;
	}

	// returns true or false
	function SelectDB($dbName)
	{
		$this->database = $dbName;
		$this->databaseName = $dbName; # obsolete, retained for compat with older adodb versions
		if ($this->_connectionID) {
			return @mysql_select_db($dbName,$this->_connectionID);
		}
		else return false;
	}

	// parameters use PostgreSQL convention, not MySQL
	function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false,$secs=0)
	{
		$offsetStr =($offset>=0) ? ((integer)$offset)."," : '';
		// jason judge, see http://phplens.com/lens/lensforum/msgs.php?id=9220
		if ($nrows < 0) $nrows = '18446744073709551615';

		if ($secs)
			$rs = $this->CacheExecute($secs,$sql." LIMIT $offsetStr".((integer)$nrows),$inputarr);
		else
			$rs = $this->Execute($sql." LIMIT $offsetStr".((integer)$nrows),$inputarr);
		return $rs;
	}

	// returns queryID or false
	function _query($sql,$inputarr=false)
	{
		//global $ADODB_COUNTRECS;
		//if($ADODB_COUNTRECS)
		////print $sql."<BR>";
		//对MYSQL系统进行性能监控 2010-9-30 15:09
		$开始时间 = time();

		$mysql_query = mysql_query($sql,$this->_connectionID);
		$mysql_error = mysql_error();
		if(!$mysql_error)		{
			//放到最下面进行执行
		}
		else	{
			$sql = trim($sql);
			global $SYSTEM_MODE;
			if(strlen($sql)>6&&$SYSTEM_MODE==1&&!$rez) {
				print "FILE NAME: ".$_SERVER['SCRIPT_FILENAME']."<BR>";
				print "ERROR SQL: ".$sql.$IsFOrS."<BR>DRIVER FILE: adodb-mysql.inc.php<BR>".mysql_error();;
				//print_R($_SERVER);
				exit;
			}
		}

		$sqlTEXT2010 = $sql;
		//加入对消息中心功能支持
		#########################################################################################################
		//SQL语句解析函数_应用于消息中心($sql,$操作记录编号);
		#########################################################################################################
		//判断是否是联合全操作,是否有子查询,是否用left
		//如果有,则表示为手写SQL代码,不是系统生成,则直接返回,不进行过滤
		$sqllower		= trim($sqlTEXT2010);
		$sqllower		= strtolower($sqllower);
		$sqllower = eregi_replace("  "," ",$sqllower);
		$sqllower = eregi_replace("  "," ",$sqllower);

		if(substr($sqllower,0,strlen("insert into"))=="insert into")		{
			$操作记录编号 = $this->_insertid();
			$sqlArray = explode('insert into ',$sql);
			$sqlArray = explode(' values',$sqlArray[1]);
			$sqlArray = explode('(',$sqlArray[0]);
			$TablenameTemp = TRIM($sqlArray[0]);
			if($TablenameTemp!="")	$this->_开始处理消息中心('INSERT',$TablenameTemp,$操作记录编号);
		}
		if(substr($sqllower,0,strlen("update"))=="update")			{
			$sqlArray = explode('update ',$sql);
			$sqlArray = explode(' set ',$sqlArray[1]);
			$TablenameTemp = TRIM($sqlArray[0]);
			global $primarykey_index;
			//print $sql;exit;
			//print $primarykey_index;print_R($_POST);print_R($_GET);exit;
			$操作记录编号 = $_GET[$primarykey_index];
			if($TablenameTemp!=""&&$操作记录编号!='')	$this->_开始处理消息中心('UPDATE',$TablenameTemp,$操作记录编号);
		}
		if(substr($sqllower,0,strlen("delete from"))=="delete from")		{
			//$sqlArray = explode('delete from ',$sql);
			//$sqlArray = explode(' ',$sqlArray[0]);
			//print_R($sqlArray);
			//$TablenameTemp = TRIM($sqlArray[2]);
			//print $sql."<BR>";
			//if($TablenameTemp!="")	$this->_开始处理消息中心('DELETE',$TablenameTemp,$操作记录编号);
		}
		//exit;
		#########################################################################################################
		//SQL语句解析函数_应用于消息中心($sql,$操作记录编号);
		#########################################################################################################


		//对MYSQL系统进行性能监控 2010-9-30 15:09
		$结束时间	= time();
		$执行时间	= $结束时间-$开始时间;

		if($sql!="show status"
			&&$sql!="set names gbk"
			&&$执行时间>0
			)		{

			$sqlTEXT = "show status";
			$result = mysql_query($sqlTEXT,$this->_connectionID);
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$KEYNAME = $row['Variable_name'];
				$Element2[$KEYNAME] = $row['Value'];
			}//exit;
			//print_R($Element2);
			$Element['编号']					= "";
			$Element['当前时间']				= date("Y-m-d H:i:s");
			$Element['执行时间']				= $执行时间;
			$Element['SQL语句']					= ereg_replace("'","&#039;",$sqlTEXT2010);;
			$Element['Slow_launch_threads']		= $Element2['Slow_launch_threads'];
			$Element['Threads_cached']			= $Element2['Threads_cached'];
			$Element['Threads_connected']		= $Element2['Threads_connected'];
			$Element['Threads_created']			= $Element2['Threads_created'];
			$Element['Threads_running']			= $Element2['Threads_running'];
			$Element['Qcache_free_blocks']		= $Element2['Qcache_free_blocks'];
			$Element['Qcache_free_memory']		= $Element2['Qcache_free_memory'];
			$Element['Qcache_hits']				= $Element2['Qcache_hits'];
			$Element['Qcache_inserts']			= $Element2['Qcache_inserts'];
			$Element['Qcache_lowmem_prunes']	= $Element2['Qcache_lowmem_prunes'];
			$Element['Qcache_not_cached']		= $Element2['Qcache_not_cached'];
			$Element['Qcache_queries_in_cache'] = $Element2['Qcache_queries_in_cache'];
			$Element['Qcache_total_blocks']		= $Element2['Qcache_total_blocks'];
			$Element['SQL语句']				   .= " |||| ".$_SERVER['SCRIPT_NAME'];
			$KEYS		= array_keys($Element);
			$VALUES		= array_values($Element);
			$KEYSTEXT	= join(",",$KEYS);
			$VALUESTEXT = join("','",$VALUES);
			$sql = "insert into system_logall($KEYSTEXT) values('$VALUESTEXT');";
			mysql_query($sql,$this->_connectionID);
			//print $sql;
		}



		//返回结果
		return $mysql_query;
		//else return @mysql_unbuffered_query($sql,$this->_connectionID); // requires PHP >= 4.0.6
	}


	/*进行消息中心进行判断,以找出合适的发送对象*/
	function _开始处理消息中心($类型,$数据对象,$操作记录编号='')				{
		if($类型=="UPDATE")					{
			$sql	= "select * from crm_clendar_rule where 类型='$类型' and 数据对象='$数据对象' and 是否启用='是'";
		}
		elseif($类型=="INSERT")					{
			$sql	= "select * from crm_clendar_rule where 类型='$类型' and 数据对象='$数据对象' and 是否启用='是'";
		}
		elseif($类型=="DELETE")					{
			$sql	= "select * from crm_clendar_rule where 类型='$类型' and 数据对象='$数据对象' and 是否启用='是'";
		}
		else	{
			return '';
		}
		//print $sql;
		//得到表结构信息
		$MetaColumnNames	= $this->MetaColumns($数据对象);
		$MetaColumnNames	= array_keys($MetaColumnNames);
		$主键				= $MetaColumnNames[0];
		$result		= mysql_query($sql,$this->_connectionID);
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$KEYNAME = $row['Variable_name'];
			$数据字段	= $row['数据字段'];
			$提醒周期	= $row['提醒周期'];
			$提醒对象	= $row['提醒对象'];
			$提醒人员	= $row['提醒人员'];
			$提醒内容模板 = $row['提醒内容模板'];
			$是否启用	= $row['是否启用'];
			$判断条件	= $row['判断条件'];
			$判断值		= $row['判断值'];
			$跳转路径	= $row['跳转路径'];
			$提醒消息目标	= $row['提醒消息目标'];
			$消息提醒源字段	= $row['消息提醒源字段'];
			//求得目标提醒人员
			//判断是否有附加条件
			if($数据字段!=""&&$判断值!=""&&in_array($数据字段,$MetaColumnNames))				{
				//如果是在UPDATE情况下面,还需要判断是否是重复提交,如果发生改变时才应该提醒
				switch($类型)					{
					case 'INSERT':
						$sql	= "select * from $数据对象 where $主键='$操作记录编号' and $数据字段='$判断值'";
						break;
					case 'UPDATE':
						if($判断值!=$_POST[$数据字段.'_原始值']&&$_POST[$数据字段.'_原始值']!='')		{
							//执行提醒 不一致时进行消息提醒,状态发生改变
							$sql	= "select * from $数据对象 where $主键='$操作记录编号' and $数据字段='$判断值'";
						}
						else	{
							//不执行提醒 一致时不进行消息提醒,状态未发生改变
							$sql	= "select * from $数据对象 where $主键='$操作记录编号' and $数据字段='$判断值' and 1=0";
						}
						break;
				}//end switch
			}
			else	{
				switch($类型)	{
					case 'INSERT':
						$sql	= "select * from $数据对象 where $主键='$操作记录编号'";
						break;
					case 'UPDATE':
						$sql	= "select * from $数据对象 where $主键='$操作记录编号'";
						break;
					case 'DELETE':
						$sql	= "select * from $数据对象 where $主键='$操作记录编号'";
						break;
				}
			}
			//print $判断值;print $_POST[$数据字段.'_原始值'];print_R($_POST);print $sql;exit;
			$result2	= mysql_query($sql,$this->_connectionID);
			$ROW2		= mysql_fetch_array($result2, MYSQL_ASSOC);
			//print_R($ROW2);
			//必须得到的值不为空时才进行发送短信
			if($ROW2[$主键]!="")												{
				//判断提醒对象是否是本表字段
				if(in_array($提醒对象,$MetaColumnNames))		{
					$求得目标提醒人员 = $ROW2[$提醒对象];
					//默认保存的是用户
					$sql	= "select USER_ID from user where USER_NAME='$求得目标提醒人员'";
					$result	= mysql_query($sql,$this->_connectionID);
					$ROWXX	= mysql_fetch_array($result, MYSQL_ASSOC);
					if($ROWXX['USER_ID']!="")					{
						$求得目标提醒人员 = $ROWXX['USER_ID'];
					}
					//print_R($ROWXX);exit;
				}
				//print_R($提醒对象);exit;
				//对模板进行替换操作
				for($ix=0;$ix<sizeof($MetaColumnNames);$ix++)				{
					$FIELD_NAME		= $MetaColumnNames[$ix];
					$提醒内容模板	= ereg_replace("{".$FIELD_NAME."}","<font color=green>".$ROW2[$FIELD_NAME]."</font>",$提醒内容模板);
				}
				if($提醒人员!="")					{
					$求得目标提醒人员 = $提醒人员.",".$求得目标提醒人员;
				}
				//求得消息发送人员
				if($消息提醒源字段!=""&&in_array($消息提醒源字段,$MetaColumnNames))				{
					$求得消息发送人员 = $ROW2[$消息提醒源字段];
				}
				else	{
					$求得消息发送人员 = "admin";
				}
				//print $消息提醒源字段;
				//过滤目标发送人员重复目标
				$求得目标提醒人员Array = explode(',',$求得目标提醒人员);
				for($ix=0;$ix<sizeof($求得目标提醒人员Array);$ix++)								{
					$求得目标提醒人员Array2[(string)$求得目标提醒人员Array[$ix]]	= $求得目标提醒人员Array[$ix];
				}
				$求得目标提醒人员Array	= @array_keys($求得目标提醒人员Array2);
				$求得目标提醒人员		= @join(',',$求得目标提醒人员Array);

				//日程安排5 个人短信息0 内部邮件2
				if($求得目标提醒人员!="")				{
					switch($提醒消息目标)				{
						case '通达OA短信息':
							$this->_发送消息_TDOASMS($求得消息发送人员,$求得目标提醒人员,$SMS_TYPE=0,$提醒内容模板,$跳转路径);
							break;
						case '通达OA邮件':
							$this->_发送消息_TDOAEMAIL($求得消息发送人员,$求得目标提醒人员,$SMS_TYPE=0,$提醒内容模板,$跳转路径);
							break;
						case '通达OA日程安排':
							$this->_发送消息_TDCALENDAR($求得消息发送人员,$求得目标提醒人员,$SMS_TYPE=0,$提醒内容模板,$跳转路径);
							break;
						case '消息中心':
							$this->_发送消息_MESSAGECENTER($求得消息发送人员,$求得目标提醒人员,$SMS_TYPE=0,$提醒内容模板,$跳转路径);
							break;
					}//end switch
				}
			}//end if
		}//exit;
	}

	/*_发送消息_TDOASMS*/
	function _发送消息_TDOASMS($FROM_ID,$TO_ID,$SMS_TYPE,$CONTENT,$REMIND_URL)			{
		//短消息部分需要返回连接,但需要过滤HTML属性
		$CONTENT = strip_tags($CONTENT);
		$SEND_TIME = date("Y-m-d H:i:s");
		$sql = "insert into TD_OA.sms_body values('','$FROM_ID','$SMS_TYPE','$CONTENT','$SEND_TIME','$REMIND_URL');";
		//print $sql."<BR>";
		$result  = mysql_query($sql,$this->_connectionID);
		$BODY_ID = $this->_insertid();
		//SMS_ID  TO_ID  REMIND_FLAG  DELETE_FLAG  BODY_ID  REMIND_TIME
		$TO_ID_ARRAY = explode(',',$TO_ID);
		for($i=0;$i<sizeof($TO_ID_ARRAY);$i++)				{
			$TD_ID_NAME = $TO_ID_ARRAY[$i];
			if($TD_ID_NAME!="")				{
				$REMIND_TIME = time();
				$sql = "insert into TD_OA.sms values('','$TD_ID_NAME','0','0','$BODY_ID','$REMIND_TIME')";
				//print $sql."<BR>";
				mysql_query($sql,$this->_connectionID);
			}
		}

	}

	/*_发送消息_TDOAEMAIL*/
	function _发送消息_TDOAEMAIL($FROM_ID,$TO_ID,$SMS_TYPE,$CONTENT,$REMIND_URL)			{
		$SEND_TIME = date("Y-m-d H:i:s");
		$SUBJECT   = $this->_substr_cut(strip_tags($CONTENT),88)."...";
		if($REMIND_URL!="")		{
			$CONTENT   = "&nbsp;&nbsp;".$CONTENT."<BR>&nbsp;&nbsp;<a href=\"/general/".$REMIND_URL."\"><font color=green>点击跳转到业务处理页面</font></a>";
		}
		else		{
			$CONTENT   = "&nbsp;&nbsp;".$CONTENT;
		}
		$sql = "insert into TD_OA.email_body
						(FROM_ID,TO_ID2,SUBJECT,CONTENT,SEND_TIME,SEND_FLAG,SMS_REMIND)
				values
						('$FROM_ID','$TO_ID','$SUBJECT','$CONTENT','$SEND_TIME','1','0');";
		//print $sql."<BR>";//print_R($TD_ID);exit;
		$result  = mysql_query($sql,$this->_connectionID);
		$BODY_ID = $this->_insertid();
		//TO_ID  READ_FLAG  DELETE_FLAG  BOX_ID  BODY_ID  RECEIPT
		$TO_ID_ARRAY = explode(',',$TO_ID);
		for($i=0;$i<sizeof($TO_ID_ARRAY);$i++)				{
			$TD_ID_NAME = $TO_ID_ARRAY[$i];
			if($TD_ID_NAME!="")				{
				$REMIND_TIME = time();
				$sql = "insert into TD_OA.email values('','$TD_ID_NAME','0','0','0','$BODY_ID','0')";
				//print $sql."<BR>";//exit;
				mysql_query($sql,$this->_connectionID);
			}
		}

	}

	/*_发送消息_TDCALENDAR*/
	function _发送消息_TDCALENDAR($FROM_ID,$TO_ID,$SMS_TYPE,$CONTENT,$REMIND_URL)			{
		//日程安排部分不需要返回连接,同时需要过滤HTML属性
		$CONTENT = strip_tags($CONTENT);
		$CAL_TIME = date("Y-m-d H:i:s");
		$END_TIME = date("Y-m-d H:i:s",mktime(date('H'),date('i')+5,date('s'),date('m'),date('d'),date('Y')));
		$SMS_TYPE = 1;//表示工作事务
		if($REMIND_URL!="")		{
			//$CONTENT   = "&nbsp;&nbsp;".$CONTENT."<BR>&nbsp;&nbsp;<a href=\"/general/".$REMIND_URL."\">点击跳转到业务处理页面</a>";
		}
		else		{
			//$CONTENT   = "&nbsp;&nbsp;".$CONTENT;
		}
		//USER_ID  CAL_TIME  END_TIME  CAL_TYPE  CAL_LEVEL  CONTENT  MANAGER_ID  OVER_STATUS
		$sql = "insert into TD_OA.calendar values('','$FROM_ID','$CAL_TIME','$END_TIME','$SMS_TYPE','$CAL_LEVEL','$CONTENT','$MANAGER_ID','0');";
		//print $sql."<BR>";
		$result  = mysql_query($sql,$this->_connectionID);
	}

	/*_发送消息_MESSAGECENTER*/
	function _发送消息_MESSAGECENTER($FROM_ID,$TO_ID,$SMS_TYPE,$CONTENT,$REMIND_URL)			{
		//日程安排部分不需要返回连接,同时需要过滤HTML属性
		$CONTENT = strip_tags($CONTENT);
		$CAL_TIME = date("Y-m-d H:i:s");
		$END_TIME = date("Y-m-d H:i:s",mktime(date('H'),date('i')+5,date('s'),date('m'),date('d'),date('Y')));
		$SMS_TYPE = 1;//表示工作事务
		if($REMIND_URL!="")		{
			//$CONTENT   = "&nbsp;&nbsp;".$CONTENT."<BR>&nbsp;&nbsp;<a href=\"/general/".$REMIND_URL."\">点击跳转到业务处理页面</a>";
		}
		else		{
			//$CONTENT   = "&nbsp;&nbsp;".$CONTENT;
		}
		//USER_ID  CAL_TIME  END_TIME  CAL_TYPE  CAL_LEVEL  CONTENT  MANAGER_ID  OVER_STATUS
		$sql = "insert into calendar values('','$FROM_ID','$CAL_TIME','$END_TIME','$SMS_TYPE','$CAL_LEVEL','$CONTENT','$MANAGER_ID','0');";
		//print $sql."<BR>";
		$result  = mysql_query($sql,$this->_connectionID);
	}

	//汉字字符切割，可以防止出现半个汉字的情况
	function _substr_cut($title,$length=8)
	{
		if (strlen($title)>$length) {
		$temp = 0;
		for($i=0; $i<$length; $i++)
		if (ord($title[$i]) >128) $temp++;
		if ($temp%2 == 0)
		$title = substr($title,0,$length)."..";
		else
		$title = substr($title,0,$length+1)."..";
		}
		return $title;
	}

	/*	Returns: the last error message from previous database operation	*/
	function ErrorMsg()
	{

		if ($this->_logsql) return $this->_errorMsg;
		if (empty($this->_connectionID)) $this->_errorMsg = @mysql_error();
		else $this->_errorMsg = @mysql_error($this->_connectionID);
		return $this->_errorMsg;
	}

	/*	Returns: the last error number from previous database operation	*/
	function ErrorNo()
	{
		if ($this->_logsql) return $this->_errorCode;
		if (empty($this->_connectionID))  return @mysql_errno();
		else return @mysql_errno($this->_connectionID);
	}

	// returns true or false
	function _close()
	{
		@mysql_close($this->_connectionID);
		$this->_connectionID = false;
	}


	/*
	* Maximum size of C field
	*/
	function CharMax()
	{
		return 255;
	}

	/*
	* Maximum size of X field
	*/
	function TextMax()
	{
		return 4294967295;
	}

	// "Innox - Juan Carlos Gonzalez" <jgonzalez#innox.com.mx>
	function MetaForeignKeys( $table, $owner = FALSE, $upper = FALSE, $associative = FALSE )
     {
	 global $ADODB_FETCH_MODE;
		if ($ADODB_FETCH_MODE == ADODB_FETCH_ASSOC || $this->fetchMode == ADODB_FETCH_ASSOC) $associative = true;

         if ( !empty($owner) ) {
            $table = "$owner.$table";
         }
         $a_create_table = $this->getRow(sprintf('SHOW CREATE TABLE %s', $table));
		 if ($associative) {
		 	$create_sql = isset($a_create_table["Create Table"]) ? $a_create_table["Create Table"] : $a_create_table["Create View"];
         } else $create_sql  = $a_create_table[1];

         $matches = array();

         if (!preg_match_all("/FOREIGN KEY \(`(.*?)`\) REFERENCES `(.*?)` \(`(.*?)`\)/", $create_sql, $matches)) return false;
	     $foreign_keys = array();
         $num_keys = count($matches[0]);
         for ( $i = 0;  $i < $num_keys;  $i ++ ) {
             $my_field  = explode('`, `', $matches[1][$i]);
             $ref_table = $matches[2][$i];
             $ref_field = explode('`, `', $matches[3][$i]);

             if ( $upper ) {
                 $ref_table = strtoupper($ref_table);
             }

			// see https://sourceforge.net/tracker/index.php?func=detail&aid=2287278&group_id=42718&atid=433976
			if (!isset($foreign_keys[$ref_table])) {
				$foreign_keys[$ref_table] = array();
			}
            $num_fields = count($my_field);
            for ( $j = 0;  $j < $num_fields;  $j ++ ) {
                 if ( $associative ) {
                     $foreign_keys[$ref_table][$ref_field[$j]] = $my_field[$j];
                 } else {
                     $foreign_keys[$ref_table][] = "{$my_field[$j]}={$ref_field[$j]}";
                 }
             }
         }

         return  $foreign_keys;
     }


}

/*--------------------------------------------------------------------------------------
	 Class Name: Recordset
--------------------------------------------------------------------------------------*/


class ADORecordSet_mysql extends ADORecordSet{

	var $databaseType = "mysql";
	var $canSeek = true;

	function ADORecordSet_mysql($queryID,$mode=false)
	{
		if ($mode === false) {
			global $ADODB_FETCH_MODE;
			$mode = $ADODB_FETCH_MODE;
		}
		switch ($mode)
		{
		case ADODB_FETCH_NUM: $this->fetchMode = MYSQL_NUM; break;
		case ADODB_FETCH_ASSOC:$this->fetchMode = MYSQL_ASSOC; break;
		case ADODB_FETCH_DEFAULT:
		case ADODB_FETCH_BOTH:
		default:
			$this->fetchMode = MYSQL_BOTH; break;
		}
		$this->adodbFetchMode = $mode;
		$this->ADORecordSet($queryID);
	}

	function _initrs()
	{
	//GLOBAL $ADODB_COUNTRECS;
	//	$this->_numOfRows = ($ADODB_COUNTRECS) ? @mysql_num_rows($this->_queryID):-1;
		$this->_numOfRows = @mysql_num_rows($this->_queryID);
		$this->_numOfFields = @mysql_num_fields($this->_queryID);
	}

	function FetchField($fieldOffset = -1)
	{
		if ($fieldOffset != -1) {
			$o = @mysql_fetch_field($this->_queryID, $fieldOffset);
			$f = @mysql_field_flags($this->_queryID,$fieldOffset);
			if ($o) $o->max_length = @mysql_field_len($this->_queryID,$fieldOffset); // suggested by: Jim Nicholson (jnich#att.com)
			//$o->max_length = -1; // mysql returns the max length less spaces -- so it is unrealiable
			if ($o) $o->binary = (strpos($f,'binary')!== false);
		}
		else if ($fieldOffset == -1) {	/*	The $fieldOffset argument is not provided thus its -1 	*/
			$o = @mysql_fetch_field($this->_queryID);
			if ($o) $o->max_length = @mysql_field_len($this->_queryID); // suggested by: Jim Nicholson (jnich#att.com)
		//$o->max_length = -1; // mysql returns the max length less spaces -- so it is unrealiable
		}

		return $o;
	}

	function GetRowAssoc($upper=true)
	{
		if ($this->fetchMode == MYSQL_ASSOC && !$upper) $row = $this->fields;
		else $row = ADORecordSet::GetRowAssoc($upper);
		return $row;
	}

	/* Use associative array to get fields array */
	function Fields($colname)
	{
		// added @ by "Michael William Miller" <mille562@pilot.msu.edu>
		if ($this->fetchMode != MYSQL_NUM) return @$this->fields[$colname];

		if (!$this->bind) {
			$this->bind = array();
			for ($i=0; $i < $this->_numOfFields; $i++) {
				$o = $this->FetchField($i);
				$this->bind[strtoupper($o->name)] = $i;
			}
		}
		 return $this->fields[$this->bind[strtoupper($colname)]];
	}

	function _seek($row)
	{
		if ($this->_numOfRows == 0) return false;
		return @mysql_data_seek($this->_queryID,$row);
	}

	function MoveNext()
	{
		//return adodb_movenext($this);
		//if (defined('ADODB_EXTENSION')) return adodb_movenext($this);
		if (@$this->fields = mysql_fetch_array($this->_queryID,$this->fetchMode)) {
			$this->_currentRow += 1;
			return true;
		}
		if (!$this->EOF) {
			$this->_currentRow += 1;
			$this->EOF = true;
		}
		return false;
	}

	function _fetch()
	{
		$this->fields =  @mysql_fetch_array($this->_queryID,$this->fetchMode);
		return is_array($this->fields);
	}

	function _close() {
		@mysql_free_result($this->_queryID);
		$this->_queryID = false;
	}

	function MetaType($t,$len=-1,$fieldobj=false)
	{
		if (is_object($t)) {
			$fieldobj = $t;
			$t = $fieldobj->type;
			$len = $fieldobj->max_length;
		}

		$len = -1; // mysql max_length is not accurate
		switch (strtoupper($t)) {
		case 'STRING':
		case 'CHAR':
		case 'VARCHAR':
		case 'TINYBLOB':
		case 'TINYTEXT':
		case 'ENUM':
		case 'SET':
			if ($len <= $this->blobSize) return 'C';

		case 'TEXT':
		case 'LONGTEXT':
		case 'MEDIUMTEXT':
			return 'X';

		// php_mysql extension always returns 'blob' even if 'text'
		// so we have to check whether binary...
		case 'IMAGE':
		case 'LONGBLOB':
		case 'BLOB':
		case 'MEDIUMBLOB':
		case 'BINARY':
			return !empty($fieldobj->binary) ? 'B' : 'X';

		case 'YEAR':
		case 'DATE': return 'D';

		case 'TIME':
		case 'DATETIME':
		case 'TIMESTAMP': return 'T';

		case 'INT':
		case 'INTEGER':
		case 'BIGINT':
		case 'TINYINT':
		case 'MEDIUMINT':
		case 'SMALLINT':

			if (!empty($fieldobj->primary_key)) return 'R';
			else return 'I';

		default: return 'N';
		}
	}

}

class ADORecordSet_ext_mysql extends ADORecordSet_mysql {
	function ADORecordSet_ext_mysql($queryID,$mode=false)
	{
		if ($mode === false) {
			global $ADODB_FETCH_MODE;
			$mode = $ADODB_FETCH_MODE;
		}
		switch ($mode)
		{
		case ADODB_FETCH_NUM: $this->fetchMode = MYSQL_NUM; break;
		case ADODB_FETCH_ASSOC:$this->fetchMode = MYSQL_ASSOC; break;
		case ADODB_FETCH_DEFAULT:
		case ADODB_FETCH_BOTH:
		default:
		$this->fetchMode = MYSQL_BOTH; break;
		}
		$this->adodbFetchMode = $mode;
		$this->ADORecordSet($queryID);
	}

	function MoveNext()
	{
		return @adodb_movenext($this);
	}
}


}
?>