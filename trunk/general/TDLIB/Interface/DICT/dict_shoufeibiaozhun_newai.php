<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();




$filetablename		=	'dict_shoufeibiaozhun';
$parse_filename		=	'dict_shoufeibiaozhun';
require_once('include.inc.php');



if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=red ><B>非常重要:<BR></B></font>
	<font color=green >
	&nbsp;&nbsp;1、如果删除收费标准名称等信息，会自动删除专业收费标准/学生已缴费等模块的对应信息，请谨慎使用。<BR>
	&nbsp;&nbsp;2、如果你只有一个收费标准，填写'普通'就可以了，如果有两种及以上收费标准，直接增加收费标准名称，增加完成以后在'收费标准设置'里面进行设置具体信息。<BR>&nbsp;&nbsp;3、必须至少存在一个收费标准,且名称设为'普通'。</font></td></table>";
	print $PrintText;
}


$sql = "select * from dict_shoufeibiaozhun where 名称='普通'";
$rs = $db->Execute($sql);
if($rs->fields['名称']!="普通")			{
	$sql = "insert into dict_shoufeibiaozhun values('','普通');";
	$db->Execute($sql);
}

?>