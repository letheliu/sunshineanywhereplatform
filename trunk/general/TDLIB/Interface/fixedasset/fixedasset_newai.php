<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-固定资产-全权限管理");

	$common_html=returnsystemlang('common_html');

	if($_GET['action']==""||$_GET['action']=="init_default")		{
		$sql = "update fixedasset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		//$sql = "update fixedasset set 金额=单价*数量";
		//$db->Execute($sql);
	}

	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		$_POST['单价'] = number_format($_POST['单价'], 2, '.', '');

		$编号 = $_GET['编号'];
		$新资产编号 = $_POST['资产编号'];
		$原资产编号 = returntablefield("fixedasset","编号",$编号,"资产编号");;
		$sql = "update fixedassetin set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassetout set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassettui set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassetbaofei set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassettiaoku set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassetweixiu set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);

		$sql = "update fixedasset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		$sql = "update fixedasset set 金额=单价*数量";
		$db->Execute($sql);
	}

	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		$_POST['单价'] = number_format($_POST['单价'], 2, '.', '');
	}

	$_GET['所属状态'] = "购置未分配,购置已分配,资产已分配,资产已归还";

	$filetablename='fixedasset';
	require_once('include.inc.php');

?>