<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();



	if($_GET['action']=="add_default_data")		{
	page_css('����');
	$ͼ���� = $_POST['ͼ����'];
	$ͼ������ = $_POST['ͼ������'];
	$���������� = $_POST['����������'];
	if($_POST['��׼��']!=""&&$_POST['����������']!="")	{
		$_POST['����'] = returntablefield("booksset","ͼ����",$ͼ����,"����");
		$_POST['����'] = returntablefield("booksset","ͼ����",$ͼ����,"����");
		$_POST['���'] = returntablefield("booksset","ͼ����",$ͼ����,"���");
		$sql = "update booksset set ʹ����Ա='$����������',����״̬='ͼ���ѱ���' where ͼ����='$ͼ����'";
		$db->Execute($sql);
		//print $sql;
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("��׼�˻������Ϊ��,���Ĳ���û��ִ�гɹ�!",$infor='�ò����°汾û�б�ʹ��',$return="location='booksset_newai.php'",$indexto='booksset_newai.php');
		exit;
	}
}


	//$_GET['action']=="init_default"||$_GET['action']==""
	if(0)		{
		//$sql = "update booksset set ����״̬='�����ѷ���' where ����״̬='ͼ���ѱ���'";
		//$db->Execute($sql);
		$sql = "select * from bookssetbaofei";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)		{
			$ͼ���� = $rs_a[$i]['ͼ����'];
			$��� = $rs_a[$i]['���'];
			$���� = returntablefield("booksset","ͼ����",$ͼ����,"����");
			$���� = returntablefield("booksset","ͼ����",$ͼ����,"����");
			$��� = $����*$����;
			$sql = "update bookssetbaofei set ���='$���',����='$����',����='$����' where ���='$���'";
			$db->Execute($sql);
			//print $sql."<BR>";;
			$sql = "update booksset set ����״̬='ͼ���ѱ���' where ͼ����='$ͼ����'";
			$db->Execute($sql);
			//print $sql."<BR>";;
		}
	}







	$filetablename		=	'bookssetbaofei';

	$parse_filename	=	'bookssetbaofei';

	require_once('include.inc.php');

	?>