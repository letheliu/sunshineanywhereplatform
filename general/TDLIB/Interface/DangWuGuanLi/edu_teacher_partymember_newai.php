<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-��Ա����-��Ա����");

	if($_GET['action']=="add_default_data")		{
		//$��ʦ��� =$_POST['��ʦ���'];
		$�û�ID=$_POST['�û���'];
		$fieldValueName = returntablefield("user","USER_ID",$�û�ID,"USER_NAME");
		$_POST['����'] = $fieldValueName;
	}
	if($_GET['action']=="edit_default_data")		{
		//$��ʦ��� =$_POST['��ʦ���'];
		$�û�ID=$_POST['�û���'];
		$fieldValueName = returntablefield("user","USER_ID",$�û�ID,"USER_NAME");
		$_POST['����'] = $fieldValueName;
	}

	$filetablename		=	'edu_teacher_partymember';
	$parse_filename		=	'edu_teacher_partymember';

	require_once('include.inc.php');
		if($_GET['action']==''||$_GET['action']=='init_default')		{
		$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >��ע:��ģ������Խ�ʦ�ĵ�������</font></td></table>";
		print $PrintText;
	}
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