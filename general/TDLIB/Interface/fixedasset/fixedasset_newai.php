<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("���ڹ���-�̶��ʲ�-ȫȨ�޹���");

	$common_html=returnsystemlang('common_html');

	if($_GET['action']==""||$_GET['action']=="init_default")		{
		$sql = "update fixedasset set ����״̬='����δ����' where ����״̬=''";
		$db->Execute($sql);
		//$sql = "update fixedasset set ���=����*����";
		//$db->Execute($sql);
	}

	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		$_POST['����'] = number_format($_POST['����'], 2, '.', '');

		$��� = $_GET['���'];
		$���ʲ���� = $_POST['�ʲ����'];
		$ԭ�ʲ���� = returntablefield("fixedasset","���",$���,"�ʲ����");;
		$sql = "update fixedassetin set �ʲ����='$���ʲ����' where �ʲ����='$ԭ�ʲ����'";
		$db->Execute($sql);
		$sql = "update fixedassetout set �ʲ����='$���ʲ����' where �ʲ����='$ԭ�ʲ����'";
		$db->Execute($sql);
		$sql = "update fixedassettui set �ʲ����='$���ʲ����' where �ʲ����='$ԭ�ʲ����'";
		$db->Execute($sql);
		$sql = "update fixedassetbaofei set �ʲ����='$���ʲ����' where �ʲ����='$ԭ�ʲ����'";
		$db->Execute($sql);
		$sql = "update fixedassettiaoku set �ʲ����='$���ʲ����' where �ʲ����='$ԭ�ʲ����'";
		$db->Execute($sql);
		$sql = "update fixedassetweixiu set �ʲ����='$���ʲ����' where �ʲ����='$ԭ�ʲ����'";
		$db->Execute($sql);

		$sql = "update fixedasset set ����״̬='����δ����' where ����״̬=''";
		$db->Execute($sql);
		$sql = "update fixedasset set ���=����*����";
		$db->Execute($sql);
	}

	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		$_POST['����'] = number_format($_POST['����'], 2, '.', '');
	}

	$_GET['����״̬'] = "����δ����,�����ѷ���,�ʲ��ѷ���,�ʲ��ѹ黹";

	$filetablename='fixedasset';
	require_once('include.inc.php');

?>