<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("������Դ-��������-���");
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;




	$filetablename='edu_xingzheng_banci';
	require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{

		require_once('../Help/module_xingzhengkaoqin_banci.php');

		//���˷Ƿ�����
		��ʱִ�к���("�����������ڷǷ�����",30);

	}

	function �����������ڷǷ�����()		{
		global $db;
		$sql = "delete from edu_xingzheng_kaoqinmingxi where ��� not in (select ������� from edu_xingzheng_banci)";
		$db->Execute($sql);
	}
	?>