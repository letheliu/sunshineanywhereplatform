<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
    

    if($_GET['check'] == "jinjitongzhi"){
		    page_css("�����������");
			$notesfile = "crm_mytable/notify.txt";
			$notesText = $_POST['jinjitongzhi'];	
			@!$handle = fopen($notesfile, 'w');
			fwrite($handle, $notesText);
	        fclose($handle);
			print "
			<div align=\"center\" title=\"����֪ͨ����\">
			<table class=\"MessageBox\" align=\"center\" width=\"400\">
			<tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;����֪ͨ�ѷ�������</div>
			</td></tr>
			</table><br>
			<div align=center>
			";
			print "<input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-1);\">
			</div>
			";
		   exit;		
		}
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