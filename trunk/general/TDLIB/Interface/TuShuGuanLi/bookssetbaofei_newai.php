<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();



	if($_GET['action']=="add_default_data")		{
	page_css('报废');
	$图书编号 = $_POST['图书编号'];
	$图书名称 = $_POST['图书名称'];
	$报废申请人 = $_POST['报废申请人'];
	if($_POST['批准人']!=""&&$_POST['报废申请人']!="")	{
		$_POST['单价'] = returntablefield("booksset","图书编号",$图书编号,"单价");
		$_POST['数量'] = returntablefield("booksset","图书编号",$图书编号,"数量");
		$_POST['金额'] = returntablefield("booksset","图书编号",$图书编号,"金额");
		$sql = "update booksset set 使用人员='$报废申请人',所属状态='图书已报废' where 图书编号='$图书编号'";
		$db->Execute($sql);
		//print $sql;
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("批准人或借领人为空,您的操作没有执行成功!",$infor='该参数新版本没有被使用',$return="location='booksset_newai.php'",$indexto='booksset_newai.php');
		exit;
	}
}


	//$_GET['action']=="init_default"||$_GET['action']==""
	if(0)		{
		//$sql = "update booksset set 所属状态='购置已分配' where 所属状态='图书已报废'";
		//$db->Execute($sql);
		$sql = "select * from bookssetbaofei";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)		{
			$图书编号 = $rs_a[$i]['图书编号'];
			$编号 = $rs_a[$i]['编号'];
			$单价 = returntablefield("booksset","图书编号",$图书编号,"单价");
			$数量 = returntablefield("booksset","图书编号",$图书编号,"数量");
			$金额 = $单价*$数量;
			$sql = "update bookssetbaofei set 金额='$金额',数量='$数量',单价='$单价' where 编号='$编号'";
			$db->Execute($sql);
			//print $sql."<BR>";;
			$sql = "update booksset set 所属状态='图书已报废' where 图书编号='$图书编号'";
			$db->Execute($sql);
			//print $sql."<BR>";;
		}
	}







	$filetablename		=	'bookssetbaofei';

	$parse_filename	=	'bookssetbaofei';

	require_once('include.inc.php');

	?>