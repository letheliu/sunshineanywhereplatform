<?
//�ж��Ƿ�ΪBASE64����
//$isBase64 = isBase64();
//����_GET����ת��
//$isBase64==1?CheckBase64():exit;


require_once('../../include.inc.php');

global $db;
if($_GET['action']="ajax"&&$_GET['tablename']!=""&&$_GET['updateField']!=""&&$_GET['primaryKey']!=""&&$_GET['newValue']!="")
{	
	$tablename = $_GET['tablename'];
	$updateField = $_GET['updateField'];
	$primarykeyValue = $_GET['primarykeyValue'];
	$primaryKey = $_GET['primaryKey'];
	$newValue = $_GET['newValue'];
	$sql = "update $tablename set $updateField='$newValue' where $primaryKey='$primarykeyValue'";
	//print $sql;exit;
	$rs=$db->Execute($sql);
}
else		{

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