<?
//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("ѧ������-�ۺ�����-����");
//######################�������-Ȩ�޽��鲿��##########################


if($_GET['action']=='add_default_data')		{
	$_POST['������ѧ��'] = $_POST['����������ID'];
	$_POST['����������'] = $_POST['����������'];
	//print_R($_POST);exit;
}

$filetablename='edu_association';
require_once('include.inc.php');
?>