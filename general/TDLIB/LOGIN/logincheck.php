<?

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('include.inc.php');
//$表前缀 = "TD_OA.";
//print_R($db);
function logincheck($username,$password)							{
	global $db,$表前缀;
	$SQL		= "SELECT * FROM ".$表前缀."user WHERE USER_ID = '$username'";
	$rs			= $db->Execute($SQL);
	$rs_a		= $rs->GetArray();
	$USER_ID	= $rs_a[0]['USER_ID'];
	$PASSWORDTEXT = $rs_a[0]['PASSWORD'];
	//print crypt('', $PASSWORDTEXT) == $PASSWORDTEXT;
	//print_R($password);print_R($PASSWORDTEXT);exit;
	if($USER_ID!="")												{
		if(crypt($password,$PASSWORDTEXT) == $PASSWORDTEXT)			{
			//密码正确
			return $rs_a;
			exit;
		}
		else	{
			//密码错误
			//print_R($password);print_R($username);exit;
			echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
			exit;
		}
	}
	else	{
		//用户名不存在
		//print_R($password);print_R($_POST);exit;
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
		exit;
	}
	exit;
}
//$array=explode('||',$_GET['checkstring']);//print_R($array);
//$username=$array[0];
//$password=$array[1];
//print $username.$password;exit;

//较验特殊字母 =
$checkUserName = explode('=',$_REQUEST['username']);
$checkUserPassword = explode('=',$_REQUEST['password']);
if(sizeof($checkUserName)>1||sizeof($checkUserPassword)>1)  {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
}
//较验特殊字母 "
$checkUserName = explode('"',$_REQUEST['username']);
$checkUserPassword = explode('"',$_REQUEST['password']);
if(sizeof($checkUserName)>1||sizeof($checkUserPassword)>1)  {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
}
//较验特殊字母 '
$checkUserName = explode("'",$_REQUEST['username']);
$checkUserPassword = explode("'",$_REQUEST['password']);
if(sizeof($checkUserName)>1||sizeof($checkUserPassword)>1)  {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
}

$rs_a	=	logincheck($_REQUEST['username'],$_REQUEST['password']);
//print_R($rs_a);
if($rs_a[0]['USER_NAME']!='')	{
	session_start();
	$_SESSION['LOGIN_UID']		=	$rs_a[0]['UID'];
	$_SESSION['LOGIN_USER_ID']	=	$rs_a[0]['USER_ID'];
	$_SESSION['LOGIN_DEPT_ID']	=	$rs_a[0]['DEPT_ID'];
	$_SESSION['LOGIN_USER_PRIV']=	$rs_a[0]['USER_PRIV'];
	$_SESSION['LOGIN_THEME']	=	$rs_a[0]['THEME'];
	$_SESSION['LOGIN_AVATAR']	=	$rs_a[0]['AVATAR'];
	$_SESSION['LOGIN_USER_NAME']=	$rs_a[0]['USER_NAME'];


	//$USER_PRIV_TEXT = returntablefield("user_priv","USER_PRIV",$rs->fields['USER_PRIV'],"PRIV_NO");
	$sql = "select FUNC_ID_STR from ".$表前缀."user_priv where USER_PRIV='".$rs_a[0]['USER_PRIV']."'";
	$rs_user_priv = $db->Execute($sql);
	$rs_user_priv_array = $rs_user_priv->GetArray();
	$FUNC_ID_STR = $rs_user_priv_array[0]['FUNC_ID_STR'];
	$_SESSION['LOGIN_FUNC_ID_STR'] = $FUNC_ID_STR;

	$DEPT_ID=$rs_a[0]['DEPT_ID'];
	$sql="select DEPT_NAME from ".$表前缀."department where DEPT_ID='$DEPT_ID'";
	//print $sql;
	$rs_d=$db->Execute($sql);
	$DEPT_NAME=$rs_d->fields['DEPT_NAME'];

	$USER_PRIV=$rs_a[0]['USER_PRIV'];
	$sql="select PRIV_NAME from ".$表前缀."user_priv where USER_PRIV='$USER_PRIV'";
	//print $sql;
	$rs_u=$db->Execute($sql);
	$PRIV_NAME=$rs_u->fields['PRIV_NAME'];

	$_SESSION[$SUNSHINE_USER_DEPT_NAME_VAR]=$DEPT_NAME;
	$_SESSION[$SUNSHINE_USER_PRIV_NAME_VAR]=$PRIV_NAME;
	//print $SUNSHINE_USER_AVATAR_VAR;

	//print_R($_SESSION);print_R($_GET);exit;
	$MENU_TYPE = 0;

	//日志记录
	//system_log_input('登录成功');

	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=../Framework/index.php'>\n";


	//echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=Framework/index.php'>\n";
}
else	{
	//system_log_input('登录失败');
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";

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