<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once("lib.inc.php");
//在BASE64编码解码之后,SESSION重置USER_ID变量之前
$USER_ID = $_GET['USER_ID'];
//此位置不能改动

$GLOBAL_SESSION=returnsession();

//print_R($_GET);

page_css("请先在上面菜单栏选择要查阅的信息");

print_infor("请先在上面菜单栏选择要查阅的信息!");

 ?>