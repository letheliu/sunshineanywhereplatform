<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("���ڹ���-�칫��Ʒ-�칫��Ʒ����");


	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);exit;

		$��� = $_GET['���'];
		$�°칫��Ʒ��� = $_POST['�칫��Ʒ���'];
		$ԭ�칫��Ʒ��� = returntablefield("officeproduct","���",$���,"�칫��Ʒ���");;
		$sql = "update officeproductin set �칫��Ʒ���='$�°칫��Ʒ���' where �칫��Ʒ���='$ԭ�칫��Ʒ���'";
		$db->Execute($sql);
		$sql = "update officeproductout set �칫��Ʒ���='$�°칫��Ʒ���' where �칫��Ʒ���='$ԭ�칫��Ʒ���'";
		$db->Execute($sql);
		$sql = "update officeproducttui set �칫��Ʒ���='$�°칫��Ʒ���' where �칫��Ʒ���='$ԭ�칫��Ʒ���'";
		$db->Execute($sql);
		$sql = "update officeproductbaofei set �칫��Ʒ���='$�°칫��Ʒ���' where �칫��Ʒ���='$ԭ�칫��Ʒ���'";
		$db->Execute($sql);
		$sql = "update officeproducttiaoku set �칫��Ʒ���='$�°칫��Ʒ���' where �칫��Ʒ���='$ԭ�칫��Ʒ���'";
		$db->Execute($sql);




		//$sql = "update officeproduct set ����״̬='����δ����' where ����״̬=''";
		//$db->Execute($sql);
		//$sql = "update officeproduct set ���=����*����";
		//$db->Execute($sql);
	}




$filetablename='officeproduct';
require_once('include.inc.php');
?>