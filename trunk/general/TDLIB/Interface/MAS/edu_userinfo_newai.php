<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

$ÿ�¶������ = "50";

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$��ǰʱ�� = date("Y-m-d");
	$sql = "select USER_ID,USER_NAME from TD_OA.user";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)								{
		$USER_ID	= $rs_a[$i]['USER_ID'];
		$USER_NAME	= $rs_a[$i]['USER_NAME'];
		$sql = "select COUNT(*) AS NUM from edu_userinfo where �û���='$USER_ID'";
		$rs  = $db->Execute($sql);
		$NUM = $rs->fields['NUM'];
		if($NUM==0&&$USER_ID!='')		{
			$����ʱ�� = date("Y-m-d H:i:s");
			$sql = "insert into edu_userinfo values('','$USER_ID','$USER_NAME','','$ÿ�¶������','$����ʱ��');";
			$db->Execute($sql);
		}
		else		{
			$sql = "update edu_userinfo set ����='$USER_NAME' where �û���='$USER_ID'";
			$db->Execute($sql);
		}
		//print $sql."<BR>";
	}
}


//���ݱ�ģ���ļ�,��ӦModelĿ¼�����edu_userinfo_newai.ini�ļ�
//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
$filetablename		=	'edu_userinfo';
$parse_filename		=	'edu_userinfo';
require_once('include.inc.php');


if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
	��ע:�˲����ɰ�����(����Ա)���й���,�Լ�������༶��ѧ����ѧ����¼����鿴�Լ��İ༶֪ͨ.</font></td></table>";
	//print $PrintText;
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