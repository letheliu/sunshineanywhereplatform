<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("学生管理-综合事务-党员","人力资源-党员管理-党支部管理");
//######################教育组件-权限较验部分##########################

$filetablename='edu_partyunit';
require_once('include.inc.php');

?>