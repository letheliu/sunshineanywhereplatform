<?
//返回当前用户数目
function returnusernum()			{
	global $db;
	$sql="select count(USER_ID) as num from user";
	$rs=$db->CacheExecute(150,$sql);
	$num=$rs->fields['num'];
	return $num;
}

//###################################################################
//新建记录函数
//###################################################################
function create_record_newai()	{
global $db,$html_etc;
global $tablename;
global $_POST,$_GET;
global $return_sql_line,$uniquekey;
global $systemlang;

DoReferer();

if(0)				{
	$returnusernum = returnusernum();
	$common_html['en']='Not register version, only ten users to permit';
	$common_html['zh']='未注册版，只能有十个试用用户';
	$common_html2['en']='Not register version, only ten users to permit';
	$common_html2['zh']='许可证权限受限，如需要更多用户数量，请与软件商联系!';

	if(file_exists('license.ini'))		{
		$ini_file=parse_ini_file('license.ini');
		$REGISTER_CODE=$ini_file[REGISTER_CODE];
		$result=machinecode_sunshine_512_2000($ini_file[MACHINE_CODE]);
		if($REGISTER_CODE==$result)		{
			//注册码信息验证正确时进行如下操作
			$returnRegisterExpireUserNumber = returnRegisterExpireUserNumber();
			if($returnRegisterExpireUserNumber!="unlimit")					{
				if($returnusernum>$returnRegisterExpireUserNumber)		{
					print_infor($common_html2[$systemlang],'trip',"location='?action=init_default'");
					exit;
				}
			}
		}
		else			{
			//注册码信息验证没有通过时进行如下操作
			@unlink('license.ini');
			if($returnusernum>=10)		{
				print_infor($common_html[$systemlang],'trip',"location='?action=init_default'");
				exit;
			}
		}
	}
	else		{
			if($returnusernum>=10)		{
				print_infor($common_html[$systemlang],'trip',"location='?action=init_default'");
				exit;
			}
	}


}

if($uniquekey)
	exist_record_newai();
$SQL=$return_sql_line['insert_sql'];
//print "$SQL<BR>";
//print_R($_POST);exit;
$result=$db->Execute($SQL);
global $db,$html_etc,$tablename;
system_log_input("新增".$html_etc[$tablename][$tablename],$SQL);
if($result->EOF) return false;
else return true;
}

//###################################################################
//判断是否存在记录函数
//###################################################################

function returnRegisterExpireUserNumber()					{
	if(is_file("Framework/menu.php"))		{
		$LicenseFileName = "Framework/license.ini";
		$goalfile = "cache/registerExpireDate.php";
	}
	else if(is_file("../Framework/license.ini"))	{
		$LicenseFileName = "../Framework/license.ini";
		$goalfile = "../cache/registerExpireDate.php";
	}
	else	{
		$LicenseFileName = "NoFile";
	}
	return "unlimit";
}


//###################################################################
//判断是否存在记录函数
//###################################################################
function exist_record_newai()	{
global $db,$html_etc,$common_html;
global $_POST,$_GET;global $mark;
global $return_sql_line,$uniquekey;

DoReferer();

$SQL=$return_sql_line['uniquekey_sql_num'];//print "$SQL<BR>";print_R($_POST);exit;
$return="init_".$mark;
$result=$db->Execute($SQL);
if($result->fields[num]>=1)		{
	print_infor($common_html['common_html']['already_exist'],'trip',"location='?action=$return'");
	exit;
}
}

//###################################################################
//判断是否存在记录函数
//###################################################################
function exist_group_user()		{
	global $db,$group_user;
	global $_GET,$_POST,$common_html;
	global $fields;
	global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;

	DoReferer();

	$group_user_array=explode(':',$group_user);
	$parent_group=return_parent_group();//print_R($parent_group);
	$tablename=$group_user_array[0];

	switch($parent_group['sql_text']['type'])	{
		case 'group':
			$temp_user_value=$_GET[(string)$parent_group['sql_text']['user']];
			break;
		default:
			$temp_user_value=$_SESSION[$SUNSHINE_USER_NAME_VAR];
			break;
	}

	$sql="select count(".$parent_group['sql_text'][parent].") as num from $tablename where ".$parent_group['sql_text'][parent]."='".$_GET[(string)$parent_group['sql_text'][parent]]."' and ".$parent_group['sql_text'][user]."='".$temp_user_value."'";
	$rs=$db->Execute($sql);	//print $sql;exit;
	if($rs->fields[num]>=1)		{
		print_infor($common_html['common_html']['notnullinfolder'],'trip',"history.back();");
		exit;
	}
	else	{
		delete_array_newai($_GET[(string)$parent_group[parent]],$fields);
	}

}



//###################################################################
//编辑记录函数
//###################################################################
function edit_record_newai()	{
global $db,$html_etc,$tablename;
global $_POST,$_GET;
global $return_sql_line,$isrechecked;
DoReferer();
$SQL=$return_sql_line['update_sql'];
//print $SQL;exit;
//print_R($_POST);exit;
$result=$db->Execute($SQL);
global $db,$html_etc,$tablename;
system_log_input("更新".$html_etc[$tablename][$tablename],$SQL);
if($result->EOF) return false;
else return true;
}


//###################################################################
//删除记录函数
//###################################################################
function delete_array_newai($element,$fields)	{
global $right_etc,$html_etc,$common_html;
global $_POST,$_GET,$db;
global $primarykey_index;
global $delete_attribute,$delete_attribute;
global $columns,$tablename;
DoReferer();
$_GET[$primarykey_index]=$element;
$return_sql_line=return_sql_line($fields);
if(isset($delete_attribute)&&$delete_attribute!='')		{
	//$delete_attribute_array=explode(':',$delete_attribute);
	//$index_temp=$delete_attribute_array[0];print $index_temp;
	//$fieldvalue=gettablefield($tablename,$primarykey_index,$columns[$index_temp],$element);print $fieldvalue;
	//if($fieldvalue)
	//	$SQL=$return_sql_line['delete_sql'];
	//else
	$SQL=$return_sql_line['update_fixed_field_sql'];
}
else
	$SQL=$return_sql_line['delete_sql'];
//print $SQL;exit;
//print_R($primarykey_index);exit;
//得到要删除的表的记录的值;
$sql = "select * from $tablename where $primarykey_index='$element'";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$KEYS = @array_keys($rs_a[0]);
$SQLTEXT = '';
for($i=0;$i<sizeof($KEYS);$i++)						{
	$KEY = $KEYS[$i];
	$SQLTEXT .= "$KEY:".$rs_a[0][$KEY]." ";
}
//print_R();
//print $SQLTEXT;exit;
global $db,$html_etc,$tablename;
system_log_input("删除".$html_etc[$tablename][$tablename],$SQLTEXT."  <BR>".$SQL);
$result=$db->Execute($SQL);
if($result->EOF) return false;
else return true;
}


//###################################################################
//判断是否为外来连接，如果是，则系统禁止执行
//###################################################################
function DoReferer()				{
global $_SERVER;
$HTTP_REFERER = parse_url($_SERVER['HTTP_REFERER']);
$HOSTNAME = $HTTP_REFERER['host'];
//print_r($HTTP_REFERER);
//print_r($HOSTNAME);
//print $_SERVER['SERVER_NAME'];
//if($HOSTNAME==$_SERVER['SERVER_NAME']||$HOSTNAME==$_SERVER['SERVER_ADDR'])	{
	//系统连接，可以执行程序
	//print 1;
	//exit;
//}
///else	{
	//外部连接，程序执行中止
	//print_infor("非法操作，请注意使用方法！",'trip',"location='?action=init_default'");
	//exit;
//}
}
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>