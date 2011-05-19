<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-党员管理-预备党员");


	if($_GET['action']=="add_default_data")		{
		//$教师编号 =$_POST['教师编号'];
		$用户ID=$_POST['用户名'];
		$fieldValueName = returntablefield("user","USER_ID",$用户ID,"USER_NAME");
		$_POST['姓名'] = $fieldValueName;
	}
	if($_GET['action']=="edit_default_data")		{
		//$教师编号 =$_POST['教师编号'];
		$用户ID=$_POST['用户名'];
		$fieldValueName = returntablefield("user","USER_ID",$用户ID,"USER_NAME");
		$_POST['姓名'] = $fieldValueName;
	}


	$filetablename		=	'edu_teacher_partymember2';
	$parse_filename		=	'edu_teacher_partymember2';
	require_once('include.inc.php');
	?>