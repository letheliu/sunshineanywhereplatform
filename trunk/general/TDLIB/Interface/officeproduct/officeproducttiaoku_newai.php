<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-办公用品-操作明细");


//Array ( [action] => add_default2_data [pageid] => 1 ) Array ( [办公用品名称] => 法律基础与思想道德修养 [办公用品编号] => 100002 [调出仓库] => 一号仓库 [调入仓库] => 一号仓库 [调拨数量] => 1 [经手人] => 王纪云 [备注] => [创建人] => admin [创建时间] => 2009-06-14 11:19:11 [submit] => 保存 )

if($_GET['action']=="add_default_data")		{
	page_css('调拨');
	$办公用品名称 = $_POST['办公用品名称'];
	$办公用品编号 = $_POST['办公用品编号'];
	$调出仓库 = $_POST['调出仓库'];
	$调入仓库 = $_POST['调入仓库'];
	$调拨数量 = $_POST['调拨数量'];
	$经手人 = $_POST['经手人'];
	$备注 = $_POST['备注'];
	$创建人 = $_POST['创建人'];
	$创建时间 = $_POST['创建时间'];
	if($调出仓库==$调入仓库)		{
		$Infor = "调入和调出仓库不能为同一仓库!";
		print_nouploadfile($Infor);
		exit;
	}
	if($调拨数量<1)		{
		$Infor = "调拨数量必须大于0!";
		print_nouploadfile($Infor);
		exit;
	}

	if($_POST['批准人']!="")	{
		$_POST['单价'] = returntablefield("officeproduct","办公用品编号",$办公用品编号,"单价");
		$_POST['数量'] = $_POST['调拨数量'];
		$_POST['金额'] = $_POST['单价']*$_POST['数量'];
		//print $sql."<BR>";exit;
		$单价 = $_POST['单价'];
		$数量 = $_POST['数量'];
		$金额 = $_POST['金额'];
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("批准人为空或现在所属部门为空,您的操作没有执行成功!",$infor='该参数新版本没有被使用',$return="location='officeproduct_newai.php'",$indexto='officeproduct_newai.php');
		exit;
	}

	//print_R($_GET);
	//print_R($_POST);
	/*
out
  编号 int(100)   否  auto_increment
  办公用品名称 varchar(200) gbk_chinese_ci  否
  办公用品编号 varchar(200) gbk_chinese_ci  否
  出库仓库 varchar(200) gbk_chinese_ci  否
  出库数量 int(10)   否 0
  出库对象 varchar(200) gbk_chinese_ci  否
  出库性质 varchar(200) gbk_chinese_ci  否
  经手人 varchar(200) gbk_chinese_ci  否
  批准人 varchar(200) gbk_chinese_ci  否
  备注 varchar(255) gbk_chinese_ci  否
  创建人 varchar(200) gbk_chinese_ci  否
  创建时间

in
  办公用品名称 varchar(200) gbk_chinese_ci  否
  办公用品编号 varchar(200) gbk_chinese_ci  否
  入库仓库 varchar(200) gbk_chinese_ci  否
  入库数量 int(10)   否 0
  经手人 varchar(200) gbk_chinese_ci  否
  批准人 varchar(200) gbk_chinese_ci  否
  备注 varchar(255) gbk_chinese_ci  否
  创建人 varchar(200) gbk_chinese_ci  否
  创建时间

	*/

	//形成调出仓库出库单据
	$sql = "insert into officeproductout values('','$办公用品名称','$办公用品编号','$调出仓库','$数量','$出库对象','调拨','$经手人','$批准人','系统进行的仓库间调拨','$创建人','$创建时间','$单价','$数量','$金额');";
	$db->Execute($sql);
	//形成调入仓库入库单据
	$sql = "insert into officeproductin values('','$办公用品名称','$办公用品编号','$调入仓库','$数量','$经手人','$批准人','系统进行的仓库间调拨','$创建人','$创建时间','$单价','$数量','$金额');";
	$db->Execute($sql);
	//exit;
}


$filetablename='officeproducttiaoku';
require_once('include.inc.php');
?>