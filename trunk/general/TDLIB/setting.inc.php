<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('allow_call_time_pass_reference',0);
error_reporting(E_WARNING | E_ERROR);

$SYSTEM_EXEC_TIME = time();

//$SYSTEM_DB_TYPE = "MYSQL";
//$SYSTEM_ADD_STRIP = "\"";

$db=NewADOConnection("mysql");
$db->Connect($localhost,$userdb_name,$userdb_pwd,$userdb);

global $_SESSION,$db;
$SUNSHINE_MYSQL_VERSION = $_SESSION['SUNSHINE_MYSQL_VERSION'];
/*
if($SUNSHINE_MYSQL_VERSION=="")				{
	$ServerInfo = $db->ServerInfo();
	$_SESSION['SUNSHINE_MYSQL_VERSION'] = $ServerInfo['version'];
	$SUNSHINE_MYSQL_VERSION = $_SESSION['SUNSHINE_MYSQL_VERSION'];
}//�õ�MYSQL VERSION��ֵ
if($SUNSHINE_MYSQL_VERSION>='5.0.0')				{
	//MYSQL 4�汾,����ִ��SET NAMES GBK�Ȳ���
	$db->Execute("set names gbk");
}
*/
//$db->Execute("set names EUC_CN");
$db->Execute("set names gbk;");
$db->Execute("SET sql_mode='';");

$uploadsfilesize=2000000;
$ADODB_FETCH_MODE=ADODB_FETCH_ASSOC;


$SUNSHINE_USER_ID_VAR='SUNSHINE_USER_ID';
$SUNSHINE_USER_NAME_VAR='SUNSHINE_USER_NAME';
$SUNSHINE_USER_DEPT_VAR='SUNSHINE_USER_DEPT';
$SUNSHINE_USER_PRIV_VAR='SUNSHINE_USER_PRIV';
$SUNSHINE_USER_PRIV_NAME_VAR='SUNSHINE_USER_PRIV_NAME';
$SUNSHINE_USER_DEPT_NAME_VAR='SUNSHINE_USER_DEPT_NAME';
$SUNSHINE_USER_NICK_NAME_VAR='SUNSHINE_USER_NICK_NAME';
$SUNSHINE_USER_AVATAR_VAR='SUNSHINE_USER_AVATAR';
$SUNSHINE_USER_LANG_VAR='SUNSHINE_USER_LANG';
$SUNSHINE_USER_SMS_ON_VAR='SUNSHINE_USER_SMS_ON';
$SUNSHINE_USER_MENU_HIDE_VAR='SUNSHINE_USER_MENU_HIDE';

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