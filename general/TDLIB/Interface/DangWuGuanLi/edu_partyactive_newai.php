<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
//CheckSystemPrivate("行政管理-党员管理-党组织活动");
//######################教育组件-权限较验部分##########################

$filetablename='edu_partyactive';
require_once('include.inc.php');

?>