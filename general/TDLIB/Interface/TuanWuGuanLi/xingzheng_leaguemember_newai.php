<?
//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("ѧ������-�ۺ�����-��Ա");
//######################�������-Ȩ�޽��鲿��##########################


if($_GET['action']=='add_default_data'||$_GET['action']=='edit_default_data')		{
	$_POST['ѧ��'] = $_POST['����ID'];
	$���� = returntablefield("edu_student","ѧ��",$_POST['����ID'],"���,�Ա�,��������,����");
	$_POST['�༶'] = $����['���'];
	$_POST['�Ա�'] = $����['�Ա�'];
	$_POST['��������'] = $����['��������'];
	$_POST['����'] = $����['����'];
	$sql = "update edu_student set ������ò='��Ա' where ѧ��='".$_POST['ѧ��']."'";
	$db->Execute($sql);
	//print_R($����);exit;
}

$filetablename='edu_leaguemember';
require_once('include.inc.php');

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
��ע���������Ա������������ĳһѧ������Ա��Ϣ�����Զ�������ѧ�������档
</font></td></table>";
	print $PrintText;
}
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>