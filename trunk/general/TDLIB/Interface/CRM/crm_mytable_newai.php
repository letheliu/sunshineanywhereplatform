<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	if($_GET['action']=="add_default_data")		{
	   page_css('��ʾ��������');
	   $��ʾ���� = $_POST['��ʾ����'];
	   if($��ʾ���� > 4){
	     print "<div align=\"center\" title=\"��ʾ������������\">
			    <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			    <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;Ϊ�˱�������ģ�������һ�£���ʾ�������ܴ���4�����������.</div>
			    </td></tr></table><br><div align=center>";
		 print "<input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-1);\"></div>";
		 exit;
	   }
    }

	if($_GET['action']=="edit_default_data")    {
	   page_css('��ʾ��������');
	   $��ʾ���� = $_POST['��ʾ����'];
	   if($��ʾ���� > 4){
	     print "<div align=\"center\" title=\"��ʾ������������\">
			    <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			    <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;Ϊ�˱�������ģ�������һ�£���ʾ�������ܴ���4������������.</div>
			    </td></tr></table><br><div align=center>";
		 print "<input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-1);\"></div>";
		 exit;
	   }
	}

	$filetablename		=	'crm_mytable';
	$parse_filename		=	'crm_mytable';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>˵����<br>
                            &nbsp;&nbsp;&nbsp;1����ģ���ǹ���ʹ�õģ����й��������û�����ģ�����õ�Ȩ�ޡ�<br>
			                &nbsp;&nbsp;&nbsp;2������ǵ�һ�ε�¼ϵͳ��ϵͳ����CRM����ģ����г�ʼ����<br>        
			               </td></TR></table>";
			print $PrintText;
		}
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