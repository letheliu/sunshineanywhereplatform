<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("学生管理-综合事务-社团");
//######################教育组件-权限较验部分##########################

if($_GET['action']=='add_default_data')		{
	$_POST['成员学号'] = $_POST['成员姓名ID'];
	$_POST['成员姓名'] = $_POST['成员姓名'];
	//print_R($_POST);exit;
}

$filetablename='edu_associationmember';
require_once('include.inc.php');
?>