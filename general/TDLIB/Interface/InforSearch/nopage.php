<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once("lib.inc.php");
//��BASE64�������֮��,SESSION����USER_ID����֮ǰ
$USER_ID = $_GET['USER_ID'];
//��λ�ò��ܸĶ�

$GLOBAL_SESSION=returnsession();

//print_R($_GET);

page_css("����������˵���ѡ��Ҫ���ĵ���Ϣ");

print_infor("����������˵���ѡ��Ҫ���ĵ���Ϣ!");

 ?>