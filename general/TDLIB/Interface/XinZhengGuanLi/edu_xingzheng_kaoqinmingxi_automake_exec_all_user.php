<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//header("Content-Type:text/html;charset=gbk");
//######################�������-Ȩ�޽��鲿��##########################
require_once("lib.inc.php");
//
//$GLOBAL_SESSION=returnsession();
//require_once("systemprivateinc.php");
//CheckSystemPrivate("�������-�ճ���ѧ����-��ʦ����");
//######################�������-Ȩ�޽��鲿��##########################

//$SHOWTEXT = '1';

//��ɻ�
$CurXueQi = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");

require_once("lib.xingzheng.inc.php");

function �Ű���ԱList($��������)			{
	global $db;
	//$��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date('m'),date('d')-1,date('Y')));
	//$����ʱ�� = date("Y-m-d",mktime(1,1,1,date('m'),date('d')+14,date('Y')));
	$sql = "select �Ű���Ա from edu_xingzheng_paiban where ��������='$��������'";
	$rs = $db -> Execute($sql);
	$rs_a = $rs -> GetArray();
	$�Ű���Ա���� = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$�Ű���Ա = $rs_a[$i]['�Ű���Ա'];
		$�Ű���ԱArray = explode(',',$�Ű���Ա);
		for($iX=0;$iX<sizeof($�Ű���ԱArray);$iX++)		{
			$�Ű���ԱX = $�Ű���ԱArray[$iX];
			$�Ű���Ա����[$�Ű���ԱX] = $�Ű���ԱX;
		}
	}
	$�Ű���Ա����K = @array_keys($�Ű���Ա����);
	//$�Ű���Ա = join(',',$�Ű���Ա����K);
	return $�Ű���Ա����K;
}


$��ʼʱ��Array = explode('-',date("Y-m-d"));


//Ĭ��180��,��ʼ��,�������,���������
for($i=-1;$i<5;$i++)		{

		$Datetime	= date("Y-m-d",mktime(1,1,1,$��ʼʱ��Array[1],$��ʼʱ��Array[2] + $i,$��ʼʱ��Array[0]));
		//print "<BR>��ʼ����ǰ��ʦ����:###############<BR>";
		$�Ű���Ա����K = �Ű���ԱList($Datetime);
		for($iX=0;$iX<sizeof($�Ű���Ա����K);$iX++)		{
			$��Ա�û��� = $�Ű���Ա����K[$iX];
			$������Ա = returntablefield("user","USER_ID",$��Ա�û���,"USER_NAME");
			ִ�в���ĳ��ĳ�쿼����Ϣ($CurXueQi,$������Ա,$��Ա�û���,$Datetime);
			ͬ��ĳ��ĳ�쿼�ڻ����ݵ�������ϸ��($������Ա,$��Ա�û���,$Datetime);
		}
		global $SHOWTEXT; if($SHOWTEXT)		print "<BR><BR><font color=red><B>����".$������Ա."��ʦ����:".$Datetime."</B></font><BR>";
}

$����ʱ�� = date("Y-m-d");
$sql = "update `edu_xingzheng_kaoqinmingxi` set �ϰ�ʵ��ˢ��='�ϰ�ȱ��',�ϰ࿼��״̬  ='�ϰ�ȱ��' where �ϰ�ʵ��ˢ��='' and �ϰ࿼��״̬  ='' and ����<'$����ʱ��'";
$db->Execute($sql);
$sql = "update `edu_xingzheng_kaoqinmingxi` set �°�ʵ��ˢ��='�°�ȱ��',�°࿼��״̬  ='�°�ȱ��' where �°�ʵ��ˢ��='' and �°࿼��״̬  ='' and ����<'$����ʱ��'";
$db->Execute($sql);
global $SHOWTEXT; if($SHOWTEXT)		print "<BR><font color=red>*******:$sql <BR></font>";

����ٵ����˷���������();

//print_R($_GET);
$sql = "update TD_OA.office_task set LAST_EXEC='".date( "Y-m-d" )."',EXEC_TIME='".date( "H:i:s" )."' where TASK_CODE = 'XINGZHENG_KAOQIN'";
$db->Execute($sql);


print "+OK";




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