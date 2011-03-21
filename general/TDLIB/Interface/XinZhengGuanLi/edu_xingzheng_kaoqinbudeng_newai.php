<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-行政考勤-流程明细");
	$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
	if($_GET['学期']=="") $_GET['学期'] = $当前学期;



	if($_GET['action']=="add_default_data")			{
		$_POST['人员用户名'] =  $_POST['人员_ID'];
		$DEPT_ID =  returntablefield("user","USER_ID",$_POST['人员_ID'],"DEPT_ID");
		$_POST['部门'] =  returntablefield("department","DEPT_ID",$DEPT_ID,"DEPT_NAME");
		//print_R($_POST);exit;
	}

	$filetablename='edu_xingzheng_kaoqinbudeng';
	require_once('include.inc.php');
	//功能性说明注释
	require_once("../Help/module_xingzhengworkflow.php");
	?>