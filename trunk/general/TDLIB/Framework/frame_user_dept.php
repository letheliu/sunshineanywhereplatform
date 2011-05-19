<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('lib.inc.php');
require_once('./sms_index/single_select.php');
$lang=returnsystemlang();
$html_etc=returnsystemlang('hrms');
$common_html=returnsystemlang('common_html');
page_css("系统弹出窗口");
//----------------------------------------------------------
//本函数来自于sms_index/目录
//----------------------------------------------------------
$action=$_GET['action_page'];
$action_page=$_GET['action_page'];
$to_id=$_GET['TO_ID'];
$to_name=$_GET['TO_NAME'];
$MODE=$_GET['MODE'];
require_once('./sms_index/dept.php');
page_css('User Department List');
depart_js();
depart_header();
depart_list($to_id,$to_name);


?>
