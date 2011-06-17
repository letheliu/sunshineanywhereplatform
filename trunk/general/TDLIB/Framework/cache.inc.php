<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

@session_start();

$ADODB_CACHE_DIR='../cache';
//$LOGIN_THEME = "1";
//print_R($_SESSION);
if($_SESSION['SYSTEM_EDU_CRM_WUYE']=="EDU")		{
	$IE_TITLE		= "通达数字化校园 - 单点科技发行";
	$首页BANNER标题 = "通达数字化校园 - 通达中部研发中心";
	$首页BANNER我的桌面 = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$首页BANNER修改密码 = "/general/TDLIB/Interface/Framework/user_password.php";
	$首页BANNER系统注销 = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
elseif($_SESSION['SYSTEM_EDU_CRM_WUYE']=="TDLIB")		{
	$IE_TITLE		= "单点CRM系统 SunshineCRM";
	$首页BANNER标题 = "单点CRM系统 SunshineCRM 通达中部研发中心";
	$首页BANNER我的桌面 = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$首页BANNER修改密码 = "/general/TDLIB/Interface/Framework/user_password.php";
	$首页BANNER系统注销 = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
elseif($_SESSION['SYSTEM_EDU_CRM_WUYE']=="WUYE")		{
	$IE_TITLE		= "单点物业管理系统 - 单点科技发行";
	$首页BANNER标题 = "单点物业管理系统 - 通达中部研发中心";
	$首页BANNER我的桌面 = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$首页BANNER修改密码 = "/general/TDLIB/Interface/Framework/user_password.php";
	$首页BANNER系统注销 = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
elseif($_SESSION['SYSTEM_EDU_CRM_WUYE']=="ERP")		{
	$IE_TITLE		= "单点ERP系统 - 单点科技发行";
	$首页BANNER标题 = "单点ERP系统 - 单点科技";
	$首页BANNER我的桌面 = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$首页BANNER修改密码 = "/general/TDLIB/Interface/Framework/user_password.php";
	$首页BANNER系统注销 = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
else		{
	$IE_TITLE		= "郑州单点科技软件有限公司";
	$首页BANNER标题 = "单点系列管理软件";
	$首页BANNER我的桌面 = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$首页BANNER修改密码 = "/general/TDLIB/Interface/Framework/user_password.php";
	$首页BANNER系统注销 = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}



$菜单信息一名称 = "功能菜单";
$菜单信息一地址 = "/general/TDLIB/Interface/Framework/menufromsystempriv.php";
$菜单信息二名称 = "客户信息";
$菜单信息二地址 = "/general/TDLIB/Interface/CRM/crm_customer_person_newai.php";
$菜单信息三名称 = "消息中心";
$菜单信息三地址 = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";

?>