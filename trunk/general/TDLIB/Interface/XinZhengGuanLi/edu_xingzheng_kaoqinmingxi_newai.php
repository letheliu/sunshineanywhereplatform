<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-行政考勤-考勤数据");
	$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
	if($_GET['学期']=="") $_GET['学期'] = $当前学期;

	增加对查询日期快捷方式的支持("日期");

	$filetablename='edu_xingzheng_kaoqinmingxi';
	require_once('include.inc.php');

	require_once('../Help/module_xingzhengkaoqin_datalist.php');

	?>