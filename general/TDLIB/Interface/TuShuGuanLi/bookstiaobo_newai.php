<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();


	if($_GET['action']=="add_default_data")		{
		page_css('归还');
		$图书编号 = $_POST['图书编号'];
		$图书名称 = $_POST['图书名称'];
		$现在所属部门 = $_POST['现在所属部门'];
		if($现在所属部门!=""&&$_POST['批准人']!="")	{
			$_POST['单价'] = returntablefield("booksset","图书编号",$图书编号,"单价");
			$_POST['数量'] = returntablefield("booksset","图书编号",$图书编号,"数量");
			$_POST['金额'] = returntablefield("booksset","图书编号",$图书编号,"金额");
			$sql = "update booksset set 所属部门='$现在所属部门' where 图书编号='$图书编号'";
			$db->Execute($sql);
		}
		else			{
			$SYSTEM_SECOND = 1;
			print_infor("批准人为空或现在所属部门为空,您的操作没有执行成功!",$infor='该参数新版本没有被使用',$return="location='booksset_newai.php'",$indexto='booksset_newai.php');
			exit;
		}
	}





	$filetablename		=	'bookstiaobo';

	$parse_filename	=	'bookstiaobo';

	require_once('include.inc.php');

	?>