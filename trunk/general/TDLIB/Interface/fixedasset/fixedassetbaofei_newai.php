<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("���ڹ���-�̶��ʲ�-������ϸ");



if($_GET['action']=="add_default_data")		{
	page_css('����');
	$�ʲ���� = $_POST['�ʲ����'];
	$�ʲ����� = $_POST['�ʲ�����'];
	$���������� = $_POST['����������'];
	if($_POST['��׼��']!=""&&$_POST['����������']!="")	{
		$_POST['����'] = returntablefield("fixedasset","�ʲ����",$�ʲ����,"����");
		$_POST['����'] = returntablefield("fixedasset","�ʲ����",$�ʲ����,"����");
		$_POST['���'] = returntablefield("fixedasset","�ʲ����",$�ʲ����,"���");
		$sql = "update fixedasset set ʹ����Ա='$����������',����״̬='�ʲ�������' where �ʲ����='$�ʲ����'";
		$db->Execute($sql);
		//print $sql;
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("��׼�˻������Ϊ��,���Ĳ���û��ִ�гɹ�!",$infor='�ò����°汾û�б�ʹ��',$return="location='fixedasset_newai.php'",$indexto='fixedasset_newai.php');
		exit;
	}
}

	//$_GET['action']=="init_default"||$_GET['action']==""
	if(0)		{
		//$sql = "update fixedasset set ����״̬='�����ѷ���' where ����״̬='�ʲ�������'";
		//$db->Execute($sql);
		$sql = "select * from fixedassetbaofei";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)		{
			$�ʲ���� = $rs_a[$i]['�ʲ����'];
			$��� = $rs_a[$i]['���'];
			$���� = returntablefield("fixedasset","�ʲ����",$�ʲ����,"����");
			$���� = returntablefield("fixedasset","�ʲ����",$�ʲ����,"����");
			$��� = $����*$����;
			$sql = "update fixedassetbaofei set ���='$���',����='$����',����='$����' where ���='$���'";
			$db->Execute($sql);
			//print $sql."<BR>";;
			$sql = "update fixedasset set ����״̬='�ʲ�������' where �ʲ����='$�ʲ����'";
			$db->Execute($sql);
			//print $sql."<BR>";;
		}
	}



	//exit;

	$filetablename='fixedassetbaofei';

	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
		$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >

	ע�⣺<BR>
	&nbsp;&nbsp;�ٴ˲���ֻ�Ǽ�¼�ʲ����б���ʱ������״̬��Ϣ��<BR>
	&nbsp;&nbsp;��������ڹ̶��ʲ������ֱ���޸Ĺ̶��ʲ���״̬��ϢΪ����״̬ʱ�򲻻��������Ϣ��
	</font></td></table>";
		print $PrintText;
	}
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