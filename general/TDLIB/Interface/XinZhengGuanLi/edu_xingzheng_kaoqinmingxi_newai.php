<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("������Դ-��������-��������");
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;

	���ӶԲ�ѯ���ڿ�ݷ�ʽ��֧��("����");

	$filetablename='edu_xingzheng_kaoqinmingxi';
	require_once('include.inc.php');

	require_once('../Help/module_xingzhengkaoqin_datalist.php');

	?>