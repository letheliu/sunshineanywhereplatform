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
		$sql = "update booksset set ʹ����Ա='$����������',����״̬='ͼ�鼺����' where ͼ����='$ͼ����'";
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
		//$sql = "update booksset set ����״̬='�����ѷ���' where ����״̬='ͼ�鼺����'";
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
			$sql = "update booksset set ����״̬='ͼ�鼺����' where ͼ����='$ͼ����'";
			$db->Execute($sql);
			//print $sql."<BR>";;
		}
	}

	
	


	

	$filetablename		=	'bookssetbaofei';

	$parse_filename	=	'bookssetbaofei';

	require_once('include.inc.php');

	?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>