<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();


	if($_GET['action']=="add_default_data")		{
	page_css('采购');
	$所属部门 = $_POST['所属部门'];
	$采购标识 = $_POST['采购标识'];
	$批准人 = $_POST['批准人'];
	$数量 = $_POST['数量'];
	$创建人 = $_POST['创建人'];
	$创建时间 = $_POST['创建时间'];
	if($批准人!=""&&$数量>0)					{
		//print_R($_POST);exit;
		for($i=1;$i<=$数量;$i++)			{

			//得到图书编号
			$sql = "select 图书编号 from booksset order by 编号 desc limit 1";
			$rs = $db->Execute($sql);
			$图书编号 = $rs->fields['图书编号'];
			if($图书编号!="")			{
				$图书编号  = $图书编号+1;
				$图书名称 = $采购标识;//."".date("Ymd")
			}
			else	{
				$图书编号1 = substr($图书编号,0,10);
				//print $图书编号1."<HR>$图书编号";
				$图书编号2 = substr($图书编号,10,4);
				$图书编号2 = $图书编号2+10001;
				$图书编号2 = substr($图书编号2,1,strlen($图书编号2));
				$图书编号  = $图书编号1.$图书编号2;
				$图书名称 = $采购标识;
			}


			$单价 = returntablefield("booksset","图书名称",$图书名称,"单价");
			$金额 = $单价*$数量;
			//处理固定图书表的数据
			$sql = "insert into booksset
				(图书名称,图书编号,图书类别,所属部门,所属状态,创建人,创建时间,单价,数量,金额)
				values('$图书名称','$图书编号','$图书类别','$所属部门','购置未分配','$创建人','$创建时间','$单价','1','$单价');";
			$db->Execute($sql);

			//处理固定图书采购表的数据
			$sql = "insert into bookssetin
				(图书名称,图书编号,所属部门,批准人,备注,创建人,创建时间,单价,数量,金额)
				values('$图书名称','$图书编号','$所属部门','$批准人','$备注','$创建人','$创建时间','$单价','1','$单价');";
			$db->Execute($sql);
			//print $sql."<BR>";
		}
		//print_R($_POST);exit;
		print_infor("你的操作已经完成!",$infor='trip',$return="location='booksset_newai.php?'",$indexto='booksset_newai.php',1);


		//Array ( [采购标识] => 台式电脑 [数量] => 6 [所属部门] => 行政管理部 [批准人_ID] => admin [批准人] => 系统管理员 [备注] => [创建人] => admin [创建时间] => 2009-08-27 16:52:16 [submit] => 保存 )
	}

	else			{
		$SYSTEM_SECOND = 1;
		print_infor("批准人为空或数量小于1,您的操作没有执行成功!",$infor='该参数新版本没有被使用',$return="location='booksset_newai.php'",$indexto='booksset_newai.php');
	}

	exit;
}




	$filetablename		=	'bookssetin';

	$parse_filename	=	'bookssetin';

	require_once('include.inc.php');

	?>