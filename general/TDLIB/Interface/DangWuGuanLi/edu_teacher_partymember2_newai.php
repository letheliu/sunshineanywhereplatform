<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-��Ա����-Ԥ����Ա");


	if($_GET['action']=="add_default_data")		{
		//$��ʦ��� =$_POST['��ʦ���'];
		$�û�ID=$_POST['�û���'];
		$fieldValueName = returntablefield("user","USER_ID",$�û�ID,"USER_NAME");
		$_POST['����'] = $fieldValueName;
	}
	if($_GET['action']=="edit_default_data")		{
		//$��ʦ��� =$_POST['��ʦ���'];
		$�û�ID=$_POST['�û���'];
		$fieldValueName = returntablefield("user","USER_ID",$�û�ID,"USER_NAME");
		$_POST['����'] = $fieldValueName;
	}


	$filetablename		=	'edu_teacher_partymember2';
	$parse_filename		=	'edu_teacher_partymember2';
	require_once('include.inc.php');
	?>