<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	//��Ϣ�����Ƿ����������ļ�
	$goalfile = "crm_clendar_rule_isuse.ini";


	if($_GET['action2']=="������Ϣ����")			{

		page_css("������Ϣ����");
		//$file = file($goalfile);
		$_POST2['��ǰ��Ϣ����״̬'] = "����";
		$DataText = serialize($_POST2);
		@!$handle = fopen($goalfile, 'w');
		fwrite($handle, $DataText);
		fclose($handle);
		print_infor("������ݲ��������ɹ�,�뷵��","location='?'","location='?'",'?');
		exit;

	}


	if($_GET['action2']=="�ر���Ϣ����")			{

		page_css("�ر���Ϣ����");
		//$file = file($goalfile);
		$_POST2['��ǰ��Ϣ����״̬'] = "�ر�";
		$DataText = serialize($_POST2);
		@!$handle = fopen($goalfile, 'w');
		fwrite($handle, $DataText);
		fclose($handle);
		print_infor("������ݲ��������ɹ�,�뷵��","location='?'","location='?'",'?');
		exit;

	}


	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����crm_clendar_ruletime_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'crm_clendar_ruletime';
	$parse_filename		=	'crm_clendar_ruletime';
	require_once('include.inc.php');

if($_GET['action']==''||$_GET['action']=='init_default')		{
	//print_R($_GET);
	print "<BR><FORM name=form1 action=\"?action=DataDealDelte&pageid=1\" method=post encType=multipart/form-data>";
	print "<table class=TableBlock width=100%>";
	print "<tr class=TableContent><td>";

	$file = file($goalfile);
	$Text = join('',$file);
	$DataText = unserialize($Text);
	//print_r($Text);
	$��ǰ��Ϣ����״̬ = $DataText['��ǰ��Ϣ����״̬'];

	print "<font color=green>��ǰ��Ϣ����״̬:</font><font color=red>$��ǰ��Ϣ����״̬</font>&nbsp;&nbsp;";
	if($��ǰ��Ϣ����״̬=="�ر�")		{
		print "<input type=button class=BigButton name='������Ϣ����' onClick=\"location='?".base64_encode("xx=xx&ѧ������=".$_GET['ѧ������']."&action2=������Ϣ����&xx=xx")."'\" value='����'>";
	}
	else		{
		print "<input type=button class=BigButton name='�ر���Ϣ����' onClick=\"location='?".base64_encode("xx=xx&ѧ������=".$_GET['ѧ������']."&action2=�ر���Ϣ����&xx=xx")."'\" value='�ر�'>";
	}
	print "<font color=green>&nbsp;��Ϣ�������п��ܻ�����һЩϵͳ����,Ϊ�ӿ�ϵͳ�����ٶ�,����Թر���Ϣ����.</font></td></tr>";
	print "</table>";
	print "</FORM>";
}

	?>