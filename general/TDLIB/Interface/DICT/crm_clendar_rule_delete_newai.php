<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();


	//���������˵�ʱ,�Ƿ���ʾKEY�ֶ�
	$SYSTEM_SELECT_MENU_SHOW_KEY = 1;

	$SYSTEM_ADD_SQL = " and ����='DELETE'";



	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		global $db;
		$_POST['����'] = "DELETE";
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}




	if($_GET['action']==''||$_GET['action']=='init_default')		{
		//print_R($_SESSION);
		$�����ı� = "ɾ�����ݴ�������";
		$�����ı� = "add_default";
		$�������� = "��������";
		$�������� = explode(',',$�����ı�);;
		$�������� = explode(',',$�����ı�);;
		$����_lin .= "";
		for($i=0;$i<sizeof($��������);$i++)
		{
			$�������� = $��������[$i];
			$����_lin .= "&nbsp;<a href='?".base64_encode("XX=XX&action=".$��������[$i]."&$��������=".$��������."&XX=XX")."'>$��������</a>";
		}
		//���δ�趨,ָΪȫ���༶
		if($_GET[$��������]=="")		{
			$_GET[$��������] = $��������[0];
		}
		else	{
		}
		$PrintText .= "<table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableData><td ><font color=green >
		�����ֶ�ѡ�񴥷�����:".$����_lin."
		</font></td></table><BR>";
		print $PrintText;
	}


	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����crm_clendar_rule_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'crm_clendar_rule';
	$parse_filename		=	'crm_clendar_rule_delete';
	require_once('include.inc.php');

	require_once('../Help/module_message.php');

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