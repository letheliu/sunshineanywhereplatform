<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();



$user_id = $_SESSION['LOGIN_USER_ID'];
$CONTENT = urldecode( $_POST['CONTENT'] );

//returntablefield(����,�ֶ���,�ֶ�ֵ,��Ҫ��ѯ���ֶ�);

$date = date("Y-m-d H:i");
$query = "select * from crm_mytable_notes where ������ID='".$user_id."';";
$rs = $db->Execute($query);
$rs_a = $rs->GetArray();
if (count($rs_a)>0)
{
				$query = "update crm_mytable_notes set ��ǩ����='".$CONTENT."',����ʱ��='".$date."' where ������ID='".$user_id."';";				
}
else
{
				$query = "insert into crm_mytable_notes(��ǩ����,������ID,����ʱ��) values('".$CONTENT."','".$user_id."','".$date."');";				
}
$db->Execute($query);
echo "update +OK";
?>
<?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>