<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("������Դ-��������-��������");
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;



	���ӶԲ�ѯ���ڿ�ݷ�ʽ��֧��("����");


	if($_GET['��Ա�û���']!="")			{
		$_GET['��Ա�û���'] = addslashes($_GET['��Ա�û���']);
		$SYSTEM_ADD_SQL .= " and ��Ա�û���='".$_GET['��Ա�û���']."'";
	}

	$filetablename='edu_xingzheng_kaoqinmingxi';
	require_once('include.inc.php');

	require_once('../Help/module_xingzhengkaoqin_datalist.php');

	?>