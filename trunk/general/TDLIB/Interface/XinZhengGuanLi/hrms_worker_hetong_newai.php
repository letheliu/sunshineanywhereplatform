<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-人事管理-合同");

	/*
	if($_GET['action']=="add_default_data")		{

		//print_R($_GET);print_R($_POST);//exit;

		global $db;

		$入库数量 = (int)$_POST['入库数量'];

		$教材编号 = $_POST['教材编号'];

		$sql = "update edu_jiaocai set 现有库存=现有库存+$入库数量 where 教材编号='".$教材编号."'";

		$rs = $db->Execute($sql);

		//print $sql;exit;

		$_POST['编作者'] = returntablefield("edu_jiaocai","教材编号",$教材编号,"编作者");

		$_POST['出版社'] = returntablefield("edu_jiaocai","教材编号",$教材编号,"出版社");

		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>
";

	}

	*/
	if($_GET['action']=="add_default_data")		{

		//print_R($_GET);print_R($_POST);//exit;

		global $db;

		$工号 = $_POST['工号'];
		$签订时间 = $_POST['签订时间'];
		$结束时间 = $_POST['结束时间'];

		//$教材编号 = $_POST['教材编号'];

		$sql = "update hrms_file set 本次合同签日='".$签订时间."',本次合同终止日期='".$结束时间."' where 工号='".$工号."'";

		$rs = $db->Execute($sql);


	//	$sql = "update hrms_work_hetong set 工作年限='".$结束时间-$签订时间."' where 工号='".$工号."'";

	//	$rs = $db->Execute($sql);

		//print $sql;exit;





	}





	$filetablename='hrms_worker_hetong';

	require_once('include.inc.php');

	?>