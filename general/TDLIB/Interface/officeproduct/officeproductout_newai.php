<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

require_once("systemprivateinc.php");

CheckSystemPrivate("���ڹ���-�칫��Ʒ-������ϸ");



if($_GET['action']=="add_default_data")		{
	page_css('�칫��Ʒ');
	$�칫��Ʒ��� = $_POST['�칫��Ʒ���'];
	$�칫��Ʒ���� = $_POST['�칫��Ʒ����'];
	$������������ = $_POST['������������'];
	if($_POST['��׼��']!="")	{
		$_POST['����'] = returntablefield("officeproduct","�칫��Ʒ���",$�칫��Ʒ���,"����");
		$_POST['����'] = $_POST['��������'];
		$_POST['���'] = $_POST['����']*$_POST['����'];
		$sql = "update officeproduct set ������=������-".$_POST['����']." where �칫��Ʒ���='$�칫��Ʒ���'";
		$db->Execute($sql);
		//print $sql."<BR>";exit;
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("��׼��Ϊ�ջ�������������Ϊ��,���Ĳ���û��ִ�гɹ�!",$infor='�ò����°汾û�б�ʹ��',$return="location='officeproduct_newai.php'",$indexto='officeproduct_newai.php');
		exit;
	}
}
else	{
	//$_GET['��������'] = "����";
}

$filetablename='officeproductout';
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