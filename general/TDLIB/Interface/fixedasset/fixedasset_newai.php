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

	$_GET['����״̬'] = "����δ����,�����ѷ���,�ʲ��ѷ���,�ʲ����黹";

	$filetablename='fixedasset';
	require_once('include.inc.php');

?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>