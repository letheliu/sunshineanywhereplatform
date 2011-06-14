<?

function return_sql_line_mysql($fields)	{
	global $showlistfieldlist,$showlistfieldfilter;
	global $group_filter;
	global $_GET,$_POST;
	global $primarykey,$columns;
	global $_SESSION,$SUNSHINE_USER_NAME_VAR;
	//print_R($_SESSION);
	$primarykeyindex=$columns[$primarykey];
	$tablename = $fields['table']['name'];
	$primarykey= $fields['table']['primarykey'];
	$uniquekey = $fields['table']['uniquekey'];
	$list=explode(',',$showlistfieldlist);
	$type=explode(',',$showlistfieldfilter);
	$uniquekey_array=explode(',',$uniquekey);
	$columns=returntablecolumn($tablename);
	$columnsInfor=returntablecolumnInfor($tablename);
	
	$primarykey_index=$columns[$primarykey];
	for($i=0;$i<sizeof($list);$i++)	{
		$index=$list[$i];
		$temp_array[$i]=$columns[$index];
		$temp_type[(string)$columns[$index]]=$type[$i];
	}

	$temp="".join(',',$temp_array)."";
	$temp_insert=array();
	foreach($temp_array as $list)	{
		switch($temp_type[$list])		{
			case 'password':
				$temp_post="'".MD5($_POST[$list])."'";
				break;
			case 'autoincrement':
				//print "autoincrement";
				//print_R($_GET);
				//print_R($_POST);

				global $db,$tablename;
				$MartField = "AUTO_INCREMENT_".$list;
				$MartFieldValue = $_POST[$MartField];
				$PageActionFieldArray = explode('_',$_GET['action']);
				$PageActionFieldValue = $PageActionFieldArray[0];
				if($MartFieldValue!=""&&$PageActionFieldValue=="add")			{
					$sql12 = "select max($list) as NUM from $tablename";//print $sql12;//exit;
					$rs12 = $db->Execute($sql12);
					$number12 = $rs12->fields['NUM'];
					$number12 += 1;
					$temp_post = format_auto_increment($number12);
					//exit;
				}
				break;
			default:
				$temp_post="'".htmlspecialchars($_POST[$list],ENT_QUOTES)."'";
				//htmlentitiesUser($_POST[$list])
		}
		
		array_push($temp_insert,$temp_post);
	}
	$temp_insert_text=join(',',$temp_insert);
	$temp_var=join(",\$",$temp_array);
	$temp_var="\$$primarykey_index,\$".$temp_var;
	$insert_sql="insert into $tablename ($temp) values($temp_insert_text)";
	//print $insert_sql;exit;
	$uniquekey_select=array();
	$uniquekey_select_get=array();
	foreach($uniquekey_array as $list)	{
		$temp_index_name=$columns[$list];
		array_push($uniquekey_select,"$columns[$list]='".htmlentitiesUser($_POST[$temp_index_name])."'");
		array_push($uniquekey_select_get,"$columns[$list]='".htmlentitiesUser($_GET[$temp_index_name])."'");
	}
	$uniquekey_sql="".join(' and ',$uniquekey_select)."";
	//print_R($uniquekey_select);
	$uniquekey_sql_get="".join(' and ',$uniquekey_select_get)."";

	global $departprivte;
	//用户角色级别权限判断，如果是用户自身的记录则可以修改，
	//如果不是，那么沿用PRIVATE的权限进行管理
	//此区域部分在NEWAI_SQL部分有所复制
	if($departprivte!="")		{
	$departprivteSQLArray = array();
	$departprivteArray = explode('::',$departprivte);
	//print_R($departprivteArray);
	for($i=0;$i<sizeof($departprivteArray);$i++)	{
		$privText = $departprivteArray[$i];
		$privTextArray = explode(':',$privText);
		switch($privTextArray[0])		{
			case 'user':
				$ColumnIndex1 = $privTextArray[1];
				$USER_NAME = $_SESSION[$SUNSHINE_USER_NAME_VAR];
				$ColumnName1 = $columns[$ColumnIndex1];
				$_POST[$ColumnName1];
				if($ColumnName1!=""&&$_POST[$ColumnName1]!="")	{
					if($USER_NAME==$_POST[$ColumnName1])		{
						$SYSTEM_PRIVATE_USER_DEFINE_CONTROL = 0 ;
					}
					else	{
						$SYSTEM_PRIVATE_USER_DEFINE_CONTROL = 1;
					}
				}
				else	{
					$SYSTEM_PRIVATE_USER_DEFINE_CONTROL = 0;
				}
				break;
		}//end swtich
	}//end for
	}//exit;

	//print $SYSTEM_PRIVATE_USER_DEFINE_CONTROL;
	//print $fields['value'][$ColumnName1];
	//print_R($fields['value']);

	//-------------------------------------------------------------------

	//print_R($fields['USER_PRIVATE']);
	$temp_update=array();
	foreach($temp_array as $list)					{
		////判断是否要进行字段操作 -- 开始

		//用户定义角色权限，是否为只读(可写)选项
		//如用用户定义可写，那么重新调整为可写， 如果非自身记录，则沿用系统设定
		if($ColumnName1!="")		{
			$SYSTEM_PRIVATE_USER_DEFINE_CONTROL == 0 ?
			$fields['USER_PRIVATE'][$list] = '' : '';
		}
		//print $SYSTEM_PRIVATE_USER_DEFINE_CONTROL;
		//print $fields['USER_PRIVATE'][$list]."<BR>";

		if($fields['USER_PRIVATE'][$list]!="")		{
		}
		else		{
		//去除readonlymulti:45:5后面的参数部分
		$MODEL_ARRAY = explode(':',$temp_type[$list]);
		switch($MODEL_ARRAY[0])		{
			case 'password':
				//print strlen($_POST[$list]);
				if(strlen($_POST[$list])==32)	{
					$temp_post="$list='$_POST[$list]'";
				}
				else				{
					$temp_post="$list='".MD5($_POST[$list])."'";
				}
				array_push($temp_update,$temp_post);
				break;
			case 'readonlymulti':
				//不对数据库进行操作的字段类型
				break;
			case 'readonly':
				//不对数据库进行操作的字段类型
				break;
			case 'autoincrement':
				//print "autoincrement";
				//print_R($_GET);
				//print_R($_POST);
				global $db,$tablename;
				$MartField = "AUTO_INCREMENT_".$list;
				$MartFieldValue = $_POST[$MartField];
				$PageActionFieldArray = explode('_',$_GET['action']);
				$PageActionFieldValue = $PageActionFieldArray[0];
				if($MartFieldValue!=""&&$PageActionFieldValue=="add")			{
					$sql12 = "select max($list) as NUM from $tablename";//print $sql12;//exit;
					$rs12 = $db->Execute($sql12);
					$number12 = $rs12->fields[NUM];
					$number12 += 1;
					$number12 = format_auto_increment($number12);
					//exit;
					array_push($temp_update,$temp_post);
				}
				break;
			case 'content':
				$temp_post="$list='".$_POST[$list]."'";
				array_push($temp_update,$temp_post);
				break;
			case 'binaryfile':
				if(file_exists($_FILES[$list]["tmp_name"]))		{
				$filename=$_FILES[$list]["name"];
				$filename_array=explode('.',$filename);
				$filepath="attachment/".$_GET[$primarykeyindex].".".$filename_array[sizeof($filename_array)-1];
				file_exists($filepath)?unlink($filepath):'';
				copy($_FILES[$list]["tmp_name"],$filepath);
				$temp_post="$list='$filepath'";
				array_push($temp_update,$temp_post);
				}
				break;
			default:
				$temp_post="$list='".htmlspecialchars($_POST[$list],ENT_QUOTES)."'";
				//$temp_post="$list='".htmlentitiesUser($_POST[$list])."'";
				//$temp_post="'".htmlspecialchars($_POST[$list],ENT_QUOTES)."'";
				array_push($temp_update,$temp_post);
		}//end switch
		}//判断是否要进行字段操作 -- 结束
	}
	//print_R($temp_update);exit;

	$filter_foreign_index='';
	//Begin if group_filter begin
	if($group_filter!='')								{
	$group_filter_array=explode(',',$group_filter);
	for($i=0;$i<sizeof($group_filter_array);$i++)		{
		$group_filter_array_temp=explode(':',$group_filter_array[$i]);
		$index_name=$columns["".$group_filter_array_temp[0].""];
		if($_GET[$index_name]=='')	{
		}
		else if($_GET[$index_name]!=''&&$index_name=="birthday")	{
			$BirthdayValueArray = explode('-',$_GET[$index_name]);
			//print_R($BirthdayValueArray);
			if(sizeof($BirthdayValueArray)==2)		{
				$date1 = Date("Y")-$BirthdayValueArray[0];
				$date2 = Date("Y")-$BirthdayValueArray[1];
				$counter_index=$i;
				$Birthday_SQL = "EXTRACT( YEAR FROM $index_name) >= '$date2' and EXTRACT( YEAR FROM $index_name) <= '$date1'";
				$filter_foreign_arrray[$i]=$Birthday_SQL;
			}
		}
		else	{
			$counter_index=$i;
			//判断外来变量限制是否为数组形式
			$VALUE_GET_ARRAY = explode(',',$_GET[$index_name]);
			$AMOUNT_VALUE_GET_ARRAY = sizeof($VALUE_GET_ARRAY);
			//为>1时，输入条件为两个，进行组建
			if($AMOUNT_VALUE_GET_ARRAY>1)						{
				$filter_foreign_arrray[$i] = "($index_name='".join("' or $index_name='",$VALUE_GET_ARRAY)."')";
			}
			else	{
				//print $index_name;
				//print_R($columnsInfor[$index_name]->type);
				global $SYSTEM_DB_TYPE;
				if($SYSTEM_DB_TYPE=="PGSQL")			{
					$字段类型 = $columnsInfor[$index_name]->type;
					if(substr($字段类型,0,3)=='int')	{
						//INT类型不能使用like
						$filter_foreign_arrray[$i]="$index_name = '$_GET[$index_name]'";
					}
					else	{
						//字符类型,可以使用like
						$filter_foreign_arrray[$i]="$index_name like '%$_GET[$index_name]%'";
					}
				}
				else	{
					$字段类型 = $columnsInfor[$index_name]->type;
					//记不起使用like的用途是什么了,现在恢复到=判断方式阶段
					//$filter_foreign_arrray[$i]="$index_name like '%$_GET[$index_name]%'";
					//现在恢复到=判断方式阶段
					$filter_foreign_arrray[$i]="$index_name = '".$_GET[$index_name]."'";
					//默认MYSQL数据库
				}
				//学校信息较验生成
				//if($_GET['学院名称']!="")		{
				//	$LastArray = $filter_foreign_arrray;
				//}
				//else	$LastArray = array();
			}
		}
	}//end for


	//print $addsql2;

	//学校信息较验判断
	//if(sizeof($LastArray)>0)		$filter_foreign_arrray = $LastArray;
	//print_R($filter_foreign_arrray);

	if(sizeof($filter_foreign_arrray)<=1)
		$filter_foreign_index=$filter_foreign_arrray[$counter_index];
	else
		$filter_foreign_index=join(' and ',$filter_foreign_arrray);
	if(strlen($filter_foreign_index)==0)	{
		$filter_foreign_index_body='';
		$filter_foreign_index='';
	}
	else	{
		$filter_foreign_index_body=" and ".$filter_foreign_index;
		$filter_foreign_index="where ".$filter_foreign_index;
	}
	}
	//print $filter_foreign_index;exit;

	//附加SQL语句,用于WHERE判断语句之间,用户自定义SQL的加入。
	global $addsql2;
	if($addsql2!=""&&$filter_foreign_index!="")		{
		$filter_foreign_index_body = $filter_foreign_index_body." and ".$addsql2;
		$filter_foreign_index = $filter_foreign_index." and ".$addsql2;
	}
	else if($addsql2!=""&&$filter_foreign_index=="")		{
		$filter_foreign_index_body = $addsql2;
		$filter_foreign_index = "where ".$addsql2;
	}
	else	{
	}

	//print $filter_foreign_index;exit;


	//Begin if -- hidden_field begin
	global $hidden_field,$SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_DEPT_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
	if($hidden_field!='')								{
	$hidden_field_array=explode(',',$hidden_field);
	foreach($hidden_field_array as $list)		{
		$circle_temp=explode(':',$list);//print_R($circle_temp);
		switch($circle_temp[0])		{
			case 'parent':
				$temp_temp=$columns[''.$circle_temp[1].''];
				$value=$_GET[$temp_temp];
				if($value=='')	$value=0;
				if($columns[''.$circle_temp[1].'']!='')
					$cirlce_mode_array_temp[++$i-1]="$temp_temp='$value'";
				unset($temp_temp);
				//unset($value);
				break;
			case 'user':
				$temp_temp=$columns[''.$circle_temp[1].''];//print_R($circle_temp[2]);
				switch($circle_temp[2])			{
					case 'name':
						$user_value=$_SESSION[$SUNSHINE_USER_NAME_VAR];
						$cirlce_mode_array_temp[++$i-1]=$temp_temp!=''?"$temp_temp='$user_value'":'';
						break;
					case 'department':
						$user_value=$_SESSION[$SUNSHINE_USER_DEPT_VAR];
						$cirlce_mode_array_temp[++$i-1]=$temp_temp!=''?"($temp_temp='$user_value' or $temp_temp='0')":'';
						break;
					case 'id':
						$user_value=$_SESSION[$SUNSHINE_USER_ID_VAR];
						$cirlce_mode_array_temp[++$i-1]=$temp_temp!=''?"$temp_temp='$user_value'":'';
						break;
					case 'get':
						$user_value=$_GET[$temp_temp];
						$cirlce_mode_array_temp[++$i-1]=$temp_temp!=''?"$temp_temp='$user_value'":'';
						break;
				}
				unset($temp_temp);
				break;
			case 'fixed':
				$temp_temp=$columns[''.$circle_temp[1].''];
				if($temp_temp!='')
					$cirlce_mode_array_temp[++$i-1]="$temp_temp!='".$circle_temp[2]."'";
				unset($temp_temp);
				break;
			case 'fixed_equal':
				$temp_temp=$columns[''.$circle_temp[1].''];
				if($temp_temp!='')
					$cirlce_mode_array_temp[++$i-1]="$temp_temp='".$circle_temp[2]."'";
				unset($temp_temp);
				break;
			case 'markadd':
			case 'markread':
				//print_R($circle_temp);
				$markread_field=$columns[''.$circle_temp[1].''];
				$markread_value_add=$circle_temp[2];
				$markread_value_add=$markread_value_add==1?1:0;
				if($markread_field!='')
					$cirlce_mode_array_temp[++$i-1]="$primarykey_index='$_GET[$primarykey_index]'";
				break;
			case 'primarykey':
				$cirlce_mode_array_temp[++$i-1]="$primarykey_index='$_GET[$primarykey_index]'";
				break;
			case 'calendar_begin':
				if($_GET['calendar_type']=='')	$_GET['calendar_type']='day';
				$datetime=returncalendar_dateline($_GET['calendar_type']);
				$timeline=date("Y-m-d H:i:s",$datetime['begin']);
				$calendar_begin_field=$columns[''.$circle_temp[1].''];
				$cirlce_mode_array_temp[++$i-1]="$calendar_begin_field>'$timeline'";
				break;
			case 'calendar_end':
				if($_GET['calendar_type']=='')	$_GET['calendar_type']='day';
				$datetime=returncalendar_dateline($_GET['calendar_type']);
				$timeline=date("Y-m-d H:i:s",$datetime['end']);
				$calendar_end_field=$columns[''.$circle_temp[1].''];
				$cirlce_mode_array_temp[++$i-1]="$calendar_end_field<'$timeline'";
				break;
			case 'calendar_type':
				$calendar_type_field=$columns[''.$circle_temp[1].''];
				break;
			case 'calendar_content':
				$calendar_content_field=$columns[''.$circle_temp[1].''];
				break;
			case 'link':
				//$linkurl_html="<a href=\"?$value=$_GET[$value]>$columns[''.$circle_temp[1].''];

				break;
		}
	}
	print_R($cirlce_mode_array_temp);exit;

	if(sizeof($cirlce_mode_array_temp)>=1)		{
		$filter_foreign_index=join(" and ",$cirlce_mode_array_temp);
		$filter_foreign_index_body=" and ".$filter_foreign_index;
	}

	}//End if -- hidden_field end
	//print $filter_foreign_index_body;
	//print $uniquekey_sql;

	//客户资源部分用户权限说明--开始
	$returnCustomerSQL = returnCustomerSQL();
	//print $returnCustomerSQL;exit;
	//客户资源部分用户权限说明--结束
	//print $filter_foreign_index;
	//决定是否进行WHERE语句包含
	if($hidden_field!=''&&sizeof($cirlce_mode_array_temp)>=1)		{
		//print $filter_foreign_index;
		$filter_foreign_index="where ".$filter_foreign_index;
		if($returnCustomerSQL!="")		{
			$filter_foreign_index = $filter_foreign_index." and ".$returnCustomerSQL;
		}
		//print $filter_foreign_index;
	}
	else if($returnCustomerSQL!="")		{
		//print $filter_foreign_index;
		$substr = substr(trim($filter_foreign_index),0,5);
		if($substr=="where")	{
			$filter_foreign_index = $filter_foreign_index." and ".$returnCustomerSQL;

		}
		else		{
			$filter_foreign_index = "where ".$returnCustomerSQL;
		}
	}
	//print $filter_foreign_index;exit;

	//2009-12-9日增加,主要用于客户前台页面SQL语句定制
	global $SYSTEM_ADD_SQL;
	//print $SYSTEM_ADD_SQL;
	if($SYSTEM_ADD_SQL!="")			{
		$substr = substr(trim($filter_foreign_index),0,5);
		if($substr=="where")	{
			$filter_foreign_index .= " ".$SYSTEM_ADD_SQL." ";
		}
		else	{
			$filter_foreign_index = "where 1=1 ".$SYSTEM_ADD_SQL." ";
		}
	}
	//print $filter_foreign_index;exit;


	//求和函数：开始
	global $UserSumFunction;
	$sumIndexName = $columns[$UserSumFunction];
	//求和函数：结束

	$temp_select_sql="".join(',',$temp_array)."";
	$temp_select_sql="$primarykey_index,".$temp_select_sql;
	$temp_update_sql=join(",",$temp_update);
	//$temp_update_sql=substr($temp_update_sql,0,strlen($temp_update_sql)-1);
	$temp_array_get=explode('_',$_GET['action']);
	if($temp_array_get[0]=='init'||$temp_array_get[0]=='export')	{
		$uniquekey_sql_		=	"select $temp_select_sql from $tablename $filter_foreign_index";// order by $primarykey_index DESC
		$uniquekey_sql		=	"select $temp_select_sql from $tablename $filter_foreign_index";
		$uniquekey_sql_num	=	"select count($primarykey_index) as num from $tablename $filter_foreign_index";
		$uniquekey_sql_num_get		=	"select count($primarykey_index) as num from $tablename $filter_foreign_index";
		$uniquekey_sql_sum_get		=	"select sum(___) as sum from $tablename $filter_foreign_index";

		$uniquekey_sql_search		=	"select $temp_select_sql from $tablename where ".trim($_GET['searchfield'])." like '%".trim($_GET['searchvalue'])."%' $SYSTEM_ADD_SQL ".$filter_foreign_index_body."";//print $uniquekey_sql_search;exit;
		$uniquekey_sql_num_search	=	"select count($primarykey_index) as num from $tablename where ".trim($_GET['searchfield'])." like '%".trim($_GET['searchvalue'])."%' $SYSTEM_ADD_SQL ".$filter_foreign_index_body."";
		$uniquekey_sql_sum_search	=	"select sum(___) as sum from $tablename where ".trim($_GET['searchfield'])." like '%".trim($_GET['searchvalue'])."%' $SYSTEM_ADD_SQL ".$filter_foreign_index_body."";

		//得到where后面的语句
		$action_array = explode('_',$_GET['action']);
		if($action_array[2]=='search')		{
			$uniquekey_sql_search_array = explode("where ",$uniquekey_sql_search);
			$where_sql = " from $tablename where ".$uniquekey_sql_search_array[1];
		}
		else	{
			$uniquekey_sql_array = explode("where ",$uniquekey_sql);
			$where_sql = " from $tablename where ".$uniquekey_sql_array[1];
		}
		//print_R($action_array);

	}
	else	{
		$uniquekey_sql_		=	"select $temp_select_sql from $tablename where $uniquekey_sql $SYSTEM_ADD_SQL ";
		$uniquekey_sql_num	=	"select count($primarykey_index) as num from $tablename where $uniquekey_sql $SYSTEM_ADD_SQL ";
		$uniquekey_sql_get	=	"select $temp_select_sql from $tablename where $uniquekey_sql_get $SYSTEM_ADD_SQL ";
		$uniquekey_sql_num_get		=	"select count($primarykey_index) as num from $tablename where $uniquekey_sql_get $SYSTEM_ADD_SQL ";
		$uniquekey_sql_sum_get		=	"select sum(___) as sum from $tablename where $uniquekey_sql_get $SYSTEM_ADD_SQL ";

		$uniquekey_sql_search		=	"select $temp_select_sql from $tablename where ".trim($_GET['searchfield'])." like '%".trim($_GET['searchvalue'])."%' and $uniquekey_sql_get $SYSTEM_ADD_SQL ";
		$uniquekey_sql_num_search	=	"select count($primarykey_index) as num from $tablename where ".trim($_GET['searchfield'])." like '%".trim($_GET['searchvalue'])."%' and $uniquekey_sql_get $SYSTEM_ADD_SQL ";
		$uniquekey_sql_sum_search	=	"select sum(___) as sum from $tablename where ".trim($_GET['searchfield'])." like '%".trim($_GET['searchvalue'])."%' and $uniquekey_sql_get $SYSTEM_ADD_SQL ";
	}//print $uniquekey_sql_;

	//print $uniquekey_sql_search;exit;
	if(strlen($filter_foreign_index)>6)	{
		//$markread_value_add=1:$markread_value_add=0;
		$markread_sql	="update $tablename set $markread_field='$markread_value_add' $filter_foreign_index";
		$markadd_sql	="update $tablename set $markread_field=$markread_field+1 $filter_foreign_index";
		$markread_sql_addusername	="update $tablename set $markread_field=$markread_field+'$user_value,' $filter_foreign_index";
	}
	if($hidden_field!='')
		$add_index_sql=$filter_foreign_index;
	else
		$add_index_sql="where $primarykey_index='$_GET[$primarykey_index]'";



	$update_sql="update $tablename set $temp_update_sql $add_index_sql";
	$delete_sql="delete from $tablename $add_index_sql";
	global $delete_attribute;global $_GET;
	if(isset($delete_attribute)&&$delete_attribute!="")		{
		$array_temp=explode('_',$_GET['returnmodel']);
		$delete_attribute_array=explode(':',$delete_attribute);//print $delete_attribute;
		$delete_index=$delete_attribute_array[0];//print_R($delete_attribute_array);
		$delete_attribute_value=$delete_attribute_array[2];
		$update_fixed=$columns[$delete_index];
		$update_fixed_field_sql="update $tablename set $update_fixed='$delete_attribute_value' $add_index_sql";
	}
	$select_sql="select $temp_select_sql from $tablename $add_index_sql";
	$search_sql="select * from $tablename where \$_POST[search_field] like '%$_POST[search_value]%'";
	$return_sql_line['insert_sql']	=$insert_sql;
	$return_sql_line['temp_var']	=$temp_var;
	$return_sql_line['update_sql']	=$update_sql;
	$return_sql_line['markread_sql']=$markread_sql;
	$return_sql_line['markadd_sql']	=$markadd_sql;
	$return_sql_line['markread_sql_addusername']=$markread_sql_addusername;
	$return_sql_line['delete_sql']	=$delete_sql;
	$return_sql_line['search_sql']	=$search_sql;
	$return_sql_line['where_sql']	=$where_sql;
	$return_sql_line['select_sql']	=$select_sql;//print $uniquekey_sql_;
	$return_sql_line['uniquekey_sql']			=$uniquekey_sql_;
	$return_sql_line['uniquekey_sql_get']		=$uniquekey_sql;
	$return_sql_line['uniquekey_sql_num']		=$uniquekey_sql_num;
	$return_sql_line['uniquekey_sql_num_get']	=$uniquekey_sql_num_get;
	$return_sql_line['uniquekey_sql_sum_get']	=$uniquekey_sql_sum_get;
	$return_sql_line['update_fixed_field_sql']	=$update_fixed_field_sql;

	$return_sql_line['uniquekey_sql_search']	=$uniquekey_sql_search;
	$return_sql_line['uniquekey_sql_num_search']=$uniquekey_sql_num_search;
	$return_sql_line['uniquekey_sql_sum_search']=$uniquekey_sql_sum_search;

	//return fields
	$return_sql_line['calendar_begin_field']	=$calendar_begin_field;
	$return_sql_line['calendar_end_field']		=$calendar_end_field;
	$return_sql_line['calendar_type_field']		=$calendar_type_field;
	$return_sql_line['calendar_content_field']	=$calendar_content_field;
	//print_r($return_sql_line);
	return $return_sql_line;
}


function returnCustomerSQL()		{
	//权限性条件一，权限性限制条件二在INIT视图里面
	global $departprivte,$_SESSION;
	global $columns,$SUNSHINE_USER_DEPT_VAR,$SUNSHINE_USER_NAME_VAR;
	$USER_PRIV_ID = $_SESSION['SUNSHINE_USER_PRIV'];
	$USER_PRIV = returntablefield("user_priv","USER_PRIV",$USER_PRIV_ID,"PRIV_NO");
	//print $USER_PRIV=6;
	if($departprivte!="")		{
		$departprivteSQLArray = array();
		$departprivteArray = explode('::',$departprivte);
		for($i=0;$i<sizeof($departprivteArray);$i++)	{
			$privText = $departprivteArray[$i];
			$privTextArray = explode(':',$privText);
			switch($privTextArray[0])		{
				case 'department':
					$ColumnIndex = $privTextArray[1];
					$DEPT_ID = $_SESSION[$SUNSHINE_USER_DEPT_VAR];
					$DeptColumnName = $columns[$ColumnIndex];
					$departprivteSQLArray['department'] = "$DeptColumnName='$DEPT_ID'";
					$departprivteSQLArray['departmentNOT'] = "$DeptColumnName='SunshineAnywhere'";
					break;
				//以下部分控制权限放在列表显示区域中，非用户自有记录，标识为只读信息
				case 'user':
					$ColumnIndex1 = $privTextArray[1];
					$ColumnIndex2 = $privTextArray[2];
					$USER_NAME = $_SESSION[$SUNSHINE_USER_NAME_VAR];
					$ColumnName1 = $columns[$ColumnIndex1];
					if($ColumnIndex2!="")		{
						$ColumnName2 = $columns[$ColumnIndex2];
						$departprivteSQLArray['user'] = "($ColumnName1='$USER_NAME' or $ColumnName2='1')";
					}
					else			{
						$departprivteSQLArray['user'] = "$ColumnName1='$USER_NAME'";
					}
					break;
			}//end swtich
		}//end for
		//print $USER_PRIV;
		switch($USER_PRIV)			{
			//总经理、系统管理级别、经理助理级别
			case 1:
			case 2:
			case 3:
				$departprivteSQL = '';
				break;
			//营销总监级别
			case 4:
			//事业部经理级别
			case 5:
			//营销经理级别
			case 6:
			//A.E.
			case 9:
			//事业部总监级别--以下两种情况人做为特例出现，在INIT模型中得到体现
				if($departprivteSQLArray['department']!=""&&$departprivteSQLArray['user']!="")				{
					$departprivteSQL = "(".$departprivteSQLArray['department']." or ".$departprivteSQLArray['user'].") ";
				}
				else if($departprivteSQLArray['department']!="") {
					$departprivteSQL = "".$departprivteSQLArray['department']." ";
				}
				else if($departprivteSQLArray['user']!="") {
					$departprivteSQL = "".$departprivteSQLArray['user']." ";
				}
				break;
			//营销专员级别
			case 7:
			//财务人员级别
			case 8:
			//普通员工级别
			case 10:
				if($departprivteSQLArray['department']!=""&&$departprivteSQLArray['user']!="")				{
					$departprivteSQL = "(".$departprivteSQLArray['department']." or ".$departprivteSQLArray['user'].") ";
				}
				else if($departprivteSQLArray['department']!=""&&$departprivteSQLArray['user']=="") {
					$departprivteSQL = "".$departprivteSQLArray['department']." ";
				}
				else if($departprivteSQLArray['user']!=""&&$departprivteSQLArray['department']=="") {
					$departprivteSQL = "".$departprivteSQLArray['user']." ";
				}
				else	{

				}
				break;
		}
	}//end if
	//print_R($_SESSION);
	//print $departprivteSQL;
	return trim($departprivteSQL);
}

//权限部分设计之二 数据初始化部分
function returnPrivateTwoInit()			{
	global $departprivte,$_SESSION;
	global $columns,$SUNSHINE_USER_DEPT_VAR,$SUNSHINE_USER_NAME_VAR;

	if($departprivte!="")		{
		$returnArray['initdepartment'] = array();
		$returnArray['inituser'] = array();
		$USER_PRIV_ID = $_SESSION['SUNSHINE_USER_PRIV'];
		$DEPT_INFOR = $_SESSION['SUNSHINE_USER_DEPT'];
		$USER_INFOR = $_SESSION['SUNSHINE_USER_NAME'];
		$USER_PRIV = returntablefield("user_priv","USER_PRIV",$USER_PRIV_ID,"PRIV_NO");
		$departprivteSQLArray = array();
		$departprivteArray = explode('::',$departprivte);
		for($i=0;$i<sizeof($departprivteArray);$i++)	{
			$privText = $departprivteArray[$i];
			$privTextArray = explode(':',$privText);
			$checkFieldIndex = $privTextArray[1];
			$checkFieldName = $columns[$checkFieldIndex];
			switch($privTextArray[0])		{
				case 'initdepartment':
					$returnArray['CheckFieldNameDEPT'] = $checkFieldIndex;
					$ColumnIndexArray = explode(',',$privTextArray[2]);
					for($j=0;$j<sizeof($ColumnIndexArray);$j++)		{
						$ElementKey = $ColumnIndexArray[$j];
						$IndexName = $columns[$ElementKey];
						//$returnArray['initdepartment'][$DEPT_INFOR][$j] = $IndexName;
						$returnArray['initdepartment']['SYSTEM_INFOR'][$j] = $IndexName;
					}
					break;
				case 'inituser':
					$returnArray['CheckFieldNameUSER'] = $checkFieldIndex;
					$ColumnIndexArray = explode(',',$privTextArray[2]);
					for($j=0;$j<sizeof($ColumnIndexArray);$j++)		{
						$ElementKey = $ColumnIndexArray[$j];
						$IndexName = $columns[$ElementKey];
						//$returnArray['inituser'][$USER_INFOR][$j] = $IndexName;
						$returnArray['inituser']['SYSTEM_INFOR'][$j] = $IndexName;
					}
					break;
			}//end swtich
		}//end for
	}//end if
	return $returnArray;
}

//权限部分设计之二 数据过滤化部分
//2010-6-14 11:20替换以前旧的判断方式
function returnPrivateTwoArray($SYSTEM_FILTER_ARRAY,$USER_PRIV,$FieldName,$FieldValue,$RecordDEPT,$RecordUser)			{
	global $_SESSION;
	$CONSTANT_ARRAY = array();
	$USER_PRIV_ID = $_SESSION['SUNSHINE_USER_PRIV'];
	$DEPT_INFOR = $_SESSION['SUNSHINE_USER_DEPT'];
	$USER_INFOR = $_SESSION['SUNSHINE_USER_NAME'];
	$CONSTANT_ARRAY = $SYSTEM_FILTER_ARRAY['initdepartment']['SYSTEM_INFOR'];
	//$USER_PRIV = 4;
	//print_R($CONSTANT_ARRAY);
	//思路：先判断是否为相应字段，然后再判断是否为自有用户。
	if(is_array($CONSTANT_ARRAY))	{
		if(in_array($FieldName,$CONSTANT_ARRAY))	{
			//判断是否要进行过滤--YES
			//较验是与否
			switch($USER_PRIV)			{
				case 1:
				case 2:
				case 7:
					$FieldText = $FieldValue;
					break;
				case 3:
				case 5:
					$RecordDEPT!=$DEPT_INFOR?$FieldText = "***" : $FieldText = $FieldValue;
					break;
				case 4:
				case 6:
					$RecordUser!=$USER_INFOR?$FieldText = "***" : $FieldText = $FieldValue;
					break;
			}//end switch
		}//end in_array
		else	{
			$FieldText = $FieldValue;
		}
	}
	else		{
		$FieldText = $FieldValue;
	}
	return $FieldText;
}





function return_sql_line_mssql()	{

	return $return_sql_line;
}




//oracle
function return_sql_line_oracle($fields)	{

	return $return_sql_line;
}



?>