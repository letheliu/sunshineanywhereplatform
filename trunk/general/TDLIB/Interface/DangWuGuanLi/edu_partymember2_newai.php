<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
//CheckSystemPrivate("行政管理-党员管理-预备党员");
//######################教育组件-权限较验部分##########################

$filetablename='edu_partymember2';
require_once('include.inc.php');

?>