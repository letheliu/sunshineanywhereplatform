<?
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("学生管理-综合事务-党员");
//######################教育组件-权限较验部分##########################

if($_GET['action']=='add_default_data'||$_GET['action']=='edit_default_data')		{
	$_POST['学号'] = $_POST['姓名ID'];
	$数组 = returntablefield("edu_student","学号",$_POST['姓名ID'],"班号,性别,出生日期,民族");
	$_POST['班级'] = $数组['班号'];
	$_POST['性别'] = $数组['性别'];
	$_POST['出生日期'] = $数组['出生日期'];
	$_POST['民族'] = $数组['民族'];
	$sql = "update edu_student set 政治面貌='预备党员' where 学号='".$_POST['学号']."'";
	$db->Execute($sql);
	//print_R($数组);exit;
}

$filetablename='edu_partymember2';
require_once('include.inc.php');

?>