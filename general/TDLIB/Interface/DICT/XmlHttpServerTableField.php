<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

header("Content-Type:text/html;charset=gbk");
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

global $db;

///*����Ϊ�ɰ洦��ʽ,�°汾�ӽ�ѧ�ƻ��л�ȡ��Ӧ��Ϣ
if($_GET['action']=="showdatas"&&$_GET['TableName']!="")
{
	$MetaColumnNames = $db->MetaColumnNames($_GET['TableName']);
	$MetaColumnNames = @array_keys($MetaColumnNames);

	$sql	= "SHOW TABLE STATUS FROM td_edu LIKE '".$_GET['TableName']."%'";
	$rs		= $db->Execute($sql);
	$��ע = $rs->fields['Comment'];

	print join(',',$MetaColumnNames);
	print ";";
	//����,�����µİ칫��Ʒ�����Ϣ,�칫��Ʒ����:{�칫��Ʒ����},�칫��Ʒ���:{�칫��Ʒ���Ʊ��},���ֿ�:{���ֿ�},�������:{�������},������:{������},��׼��:{��׼��},��ע:{��ע},������:{������},����:{����},����:{����},���:{���}
	$ElementArray = array();
	array_shift($MetaColumnNames);
	for($i=0;$i<sizeof($MetaColumnNames);$i++)			{
		$�ֶ� = $MetaColumnNames[$i];
		$ElementArray[] .= $�ֶ�.":{".$�ֶ�."}";
	}
	print "���е��µ�".$��ע."��Ϣ,".join(',',$ElementArray)."";
	exit;
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