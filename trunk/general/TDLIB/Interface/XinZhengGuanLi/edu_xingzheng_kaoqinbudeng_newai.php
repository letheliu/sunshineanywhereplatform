<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-��������-������ϸ");
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;



	if($_GET['action']=="add_default_data")			{
		$_POST['��Ա�û���'] =  $_POST['��Ա_ID'];
		$DEPT_ID =  returntablefield("user","USER_ID",$_POST['��Ա_ID'],"DEPT_ID");
		$_POST['����'] =  returntablefield("department","DEPT_ID",$DEPT_ID,"DEPT_NAME");
		//print_R($_POST);exit;
	}

	$filetablename='edu_xingzheng_kaoqinbudeng';
	require_once('include.inc.php');
	//������˵��ע��
	require_once("../Help/module_xingzhengworkflow.php");
	?>