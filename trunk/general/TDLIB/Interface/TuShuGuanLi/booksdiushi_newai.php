<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();


	if($_GET['action']=="add_default_data")		{
	page_css('�黹');
	$ͼ���� = $_POST['ͼ����'];
	$ͼ������ = $_POST['ͼ������'];
	$ά�޵�λ = $_POST['ά�޵�λ'];
	if($_POST['��׼��']!="")	{
		$_POST['����'] = returntablefield("booksset","ͼ����",$ͼ����,"����");
		$_POST['����'] = returntablefield("booksset","ͼ����",$ͼ����,"����");
		$_POST['���'] = returntablefield("booksset","ͼ����",$ͼ����,"���");
		$sql = "update booksset set ʹ����Ա='',����״̬='ͼ���Ѷ�ʧ' where ͼ����='$ͼ����'";
		$db->Execute($sql);
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("��׼��Ϊ��,���Ĳ���û��ִ�гɹ�!",$infor='�ò����°汾û�б�ʹ��',$return="location='booksset_newai.php'",$indexto='booksset_newai.php');
		exit;
	}
}





	$filetablename		=	'booksdiushi';

	$parse_filename	=	'booksdiushi';

	require_once('include.inc.php');

	?>