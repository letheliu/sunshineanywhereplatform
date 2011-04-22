<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-行政考勤-班次");
	$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
	if($_GET['学期']=="") $_GET['学期'] = $当前学期;




	$filetablename='edu_xingzheng_banci';
	require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{

		require_once('../Help/module_xingzhengkaoqin_banci.php');

		//过滤非法数据
		定时执行函数("过滤行政考勤非法数据",30);

	}

	function 过滤行政考勤非法数据()		{
		global $db;
		$sql = "delete from edu_xingzheng_kaoqinmingxi where 班次 not in (select 班次名称 from edu_xingzheng_banci)";
		$db->Execute($sql);
	}
	?>