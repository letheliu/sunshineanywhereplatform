<?
//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("ѧ������-�ۺ�����-����");
//######################�������-Ȩ�޽��鲿��##########################

if($_GET['action']=='add_default_data')		{
	$_POST['��Աѧ��'] = $_POST['��Ա����ID'];
	$_POST['��Ա����'] = $_POST['��Ա����'];
	//print_R($_POST);exit;
}

$filetablename='edu_associationmember';
require_once('include.inc.php');
?>