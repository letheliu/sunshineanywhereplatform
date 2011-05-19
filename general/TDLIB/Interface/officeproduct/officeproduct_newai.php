<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-办公用品-办公用品管理");


	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);exit;

		$编号 = $_GET['编号'];
		$新办公用品编号 = $_POST['办公用品编号'];
		$原办公用品编号 = returntablefield("officeproduct","编号",$编号,"办公用品编号");;
		$sql = "update officeproductin set 办公用品编号='$新办公用品编号' where 办公用品编号='$原办公用品编号'";
		$db->Execute($sql);
		$sql = "update officeproductout set 办公用品编号='$新办公用品编号' where 办公用品编号='$原办公用品编号'";
		$db->Execute($sql);
		$sql = "update officeproducttui set 办公用品编号='$新办公用品编号' where 办公用品编号='$原办公用品编号'";
		$db->Execute($sql);
		$sql = "update officeproductbaofei set 办公用品编号='$新办公用品编号' where 办公用品编号='$原办公用品编号'";
		$db->Execute($sql);
		$sql = "update officeproducttiaoku set 办公用品编号='$新办公用品编号' where 办公用品编号='$原办公用品编号'";
		$db->Execute($sql);




		//$sql = "update officeproduct set 所属状态='购置未分配' where 所属状态=''";
		//$db->Execute($sql);
		//$sql = "update officeproduct set 金额=单价*数量";
		//$db->Execute($sql);
	}




$filetablename='officeproduct';
require_once('include.inc.php');
?>