<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

@session_start();

$ADODB_CACHE_DIR='../cache';
//$LOGIN_THEME = "1";
//print_R($_SESSION);
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
	$IE_TITLE		= "������ҵ����ϵͳ - ����Ƽ�����";
	$��ҳBANNER���� = "������ҵ����ϵͳ - ͨ���в��з�����";
	$��ҳBANNER�ҵ����� = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$��ҳBANNER�޸����� = "/general/TDLIB/Interface/Framework/user_password.php";
	$��ҳBANNERϵͳע�� = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
elseif($_SESSION['SYSTEM_EDU_CRM_WUYE']=="ERP")		{
	$IE_TITLE		= "����ERPϵͳ - ����Ƽ�����";
	$��ҳBANNER���� = "����ERPϵͳ - ����Ƽ�";
	$��ҳBANNER�ҵ����� = "/general/TDLIB/Interface/CRM/crm_clendar_person_newai.php";
	$��ҳBANNER�޸����� = "/general/TDLIB/Interface/Framework/user_password.php";
	$��ҳBANNERϵͳע�� = "../LOGIN/logout.php?USER_NAME=".$_SESSION['LOGIN_USER_ID'];;
}
else		{
	$IE_TITLE		= "֣�ݵ���Ƽ�������޹�˾";
	$��ҳBANNER���� = "����ϵ�й������";
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

?>