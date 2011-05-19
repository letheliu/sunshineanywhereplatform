<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
require_once('./sms_index/single_select.php');
$lang=returnsystemlang();
$html_etc=returnsystemlang('hrms');
$common_html=returnsystemlang('common_html');
//----------------------------------------------------------
//本函数来自于sms_index/目录
//----------------------------------------------------------
$departmentid=isset($_GET['departmentid'])?$_GET['departmentid']:$_SESSION[$SUNSHINE_USER_DEPT_VAR];	
$action_page=$_GET['action_page'];
$MODE = $_GET['MODE'];
if($departmentid==""||empty($departmentid))	{$departmentid=1;}
require_once('./sms_index/user.php');
page_css("系统弹出窗口");
frame_user_js($departmentid,$_GET['TO_ID'],$_GET['TO_NAME']);
frame_user_header();
if($_GET['action_page']=='single')	{
	frame_user_data_one($departmentid);
}
else		{
	frame_user_data($departmentid);
}



?>
