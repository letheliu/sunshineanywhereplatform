<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("财务收费管理-收费设定");
//######################教育组件-权限较验部分##########################

$filetablename='dict_shoufeixiangmu';
require_once('include.inc.php');


if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=red ><B>备注:如果删除收费项目名称等信息,会自动删除专业收费标准,学生已缴费等模块的对应信息,请谨慎使用.</B></font></td></table>";
	print $PrintText;
}

?>