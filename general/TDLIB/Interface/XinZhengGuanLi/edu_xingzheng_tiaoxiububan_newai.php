<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-行政考勤-流程明细");
	$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
	if($_GET['学期']=="") $_GET['学期'] = $当前学期;

	require_once('lib.xingzheng.inc.php');

	if($_GET['action']=="add_default_data")			{
		$_POST['人员用户名'] =  $_POST['人员_ID'];
		$DEPT_ID =  returntablefield("user","USER_ID",$_POST['人员_ID'],"DEPT_ID");
		$_POST['部门'] =  returntablefield("department","DEPT_ID",$DEPT_ID,"DEPT_NAME");
		//print_R($_POST);exit;
	}



	//批量通过调休审核操作
if($_GET['action']=="operation_tiaoxiutongguo"&&$_GET['selectid']!="")			{
	//print_R($_GET);exit;
	//print_R($_SESSION);
	$审核人 = $_SESSION['LOGIN_USER_NAME'];
	$审核时间=date('Y-m-d H:i:s');

	$Array = explode(',',$_GET['selectid']);
	//PRINT_r($Array);EXIT;
	for($i=0;$i<sizeof($Array);$i++)	{
		$Element = $Array[$i];
		if($Element!="")		{
			$审核状态 = returntablefield("edu_xingzheng_tiaoxiububan","编号",$$Element,"审核状态");
			if($审核状态!=1){
			$sql = "update edu_xingzheng_tiaoxiububan set 调休审核状态='1',调休审核人='$审核人',调休审核时间='$审核时间' where 编号='$Element' and 调休审核状态='0'";
			$rs = $db->Execute($sql);
			$sql."<BR>";
			}
		}
	}
	$pageid = $_GET['pageid'];
	page_css("调休审核审批");
	print_nouploadfile("你的数据操作已经成功!");
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?pageid=$pageid'>\n";
	exit;
}




//批量通过补班审核操作
if($_GET['action']=="operation_bubantongguo"&&$_GET['selectid']!="")			{
	//print_R($_GET);exit;
	//print_R($_SESSION);
	$审核人 = $_SESSION['LOGIN_USER_NAME'];
	$审核时间=date('Y-m-d H:i:s');

	$Array = explode(',',$_GET['selectid']);
	//PRINT_r($Array);EXIT;
	for($i=0;$i<sizeof($Array);$i++)	{
		$Element = $Array[$i];
		if($Element!="")		{
			$审核状态 = returntablefield("edu_xingzheng_tiaoxiububan","编号",$$Element,"审核状态");
			if($审核状态!=1){
			$sql = "update edu_xingzheng_tiaoxiububan set 补班审核状态='1',补班审核人='$审核人',补班审核时间='$审核时间' where 编号='$Element' and 调休审核状态='1' and 补班审核状态='0'";
			$rs = $db->Execute($sql);
			$sql."<BR>";
			}
		}
	}
	$pageid = $_GET['pageid'];
	page_css("补班审核审批");
	print_nouploadfile("你的数据操作已经成功!");
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?pageid=$pageid'>\n";
	exit;
}









	$filetablename='edu_xingzheng_tiaoxiububan';
	require_once('include.inc.php');
	//功能性说明注释
	require_once("../Help/module_xingzhengworkflow.php");
	?>