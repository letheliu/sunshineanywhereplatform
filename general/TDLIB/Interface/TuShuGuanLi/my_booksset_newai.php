<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();




	$common_html=returnsystemlang('common_html');

	if($_GET['action']=="")		{
		$sql = "update booksset set ����״̬='����δ����' where ����״̬=''";
		$db->Execute($sql);
		$sql = "update booksset set ���=����*����";
		$db->Execute($sql);
	}





	//###########################################
	//����ֲ��Ź���Ȩ�޲���
	//###########################################

	$_GET['ʹ����Ա'] = $_SESSION['LOGIN_USER_NAME'];
	$_GET['����״̬'] = "����δ����,�����ѷ���,ͼ���ѷ���,ͼ���ѹ黹,ͼ���ѱ���";





	$filetablename='booksset';
	$parse_filename = 'my_booksset';

	require_once('include.inc.php');

	?>