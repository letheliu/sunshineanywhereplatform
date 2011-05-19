<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("学生管理-综合事务-社团");
//######################教育组件-权限较验部分##########################


if($_GET['action']=='add_default_data')		{
	$_POST['负责人学号'] = $_POST['负责人姓名ID'];
	$_POST['负责人姓名'] = $_POST['负责人姓名'];
	//print_R($_POST);exit;
}

$filetablename='edu_association';
require_once('include.inc.php');
?>