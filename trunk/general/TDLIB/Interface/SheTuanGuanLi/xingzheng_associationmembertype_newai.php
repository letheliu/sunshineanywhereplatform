<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("学生管理-综合事务-社团");
//######################教育组件-权限较验部分##########################

$filetablename='edu_associationmembertype';
require_once('include.inc.php');
?>