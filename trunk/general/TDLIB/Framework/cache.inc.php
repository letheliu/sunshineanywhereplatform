<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

session_start();

$ADODB_CACHE_DIR='../cache';
//$LOGIN_THEME = "1";
if($_SESSION['SYSTEM_EDU_CRM_WUYE']=="EDU")		{
	$IE_TITLE		= "ͨ�����ֻ�У԰ - ����Ƽ�����";
	$��ҳBANNER���� = "ͨ�����ֻ�У԰ - ͨ���в��з�����";
	$��ҳBANNER�ҵ����� = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$��ҳBANNER�޸����� = "/general/TDLIB/Interface/Framework/user_password.php";
	$��ҳBANNERϵͳע�� = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
elseif($_SESSION['SYSTEM_EDU_CRM_WUYE']=="TDLIB")		{
	$IE_TITLE		= "����CRMϵͳ SunshineCRM";
	$��ҳBANNER���� = "����CRMϵͳ SunshineCRM ͨ���в��з�����";
	$��ҳBANNER�ҵ����� = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$��ҳBANNER�޸����� = "/general/TDLIB/Interface/Framework/user_password.php";
	$��ҳBANNERϵͳע�� = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
elseif($_SESSION['SYSTEM_EDU_CRM_WUYE']=="WUYE")		{
	$IE_TITLE		= "������ҵ����ϵͳ";
	$��ҳBANNER���� = "������ҵ����ϵͳ - ͨ���в��з�����";
	$��ҳBANNER�ҵ����� = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$��ҳBANNER�޸����� = "/general/TDLIB/Interface/Framework/user_password.php";
	$��ҳBANNERϵͳע�� = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}



$�˵���Ϣһ���� = "���ܲ˵�";
$�˵���Ϣһ��ַ = "/general/TDLIB/Interface/Framework/menufromsystempriv.php";
$�˵���Ϣ������ = "�ͻ���Ϣ";
$�˵���Ϣ����ַ = "/general/TDLIB/Interface/CRM/crm_customer_person_newai.php";
$�˵���Ϣ������ = "��Ϣ����";
$�˵���Ϣ����ַ = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";

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