<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	/*
	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);//exit;
		global $db;
		$������� = (int)$_POST['�������'];$�̲ı�� = $_POST['�̲ı��'];
		$sql = "update edu_jiaocai set ���п��=���п��+$������� where �̲ı��='".$�̲ı��."'";
		$rs = $db->Execute($sql);//print $sql;exit;
		$_POST['������'] = returntablefield("edu_jiaocai","�̲ı��",$�̲ı��,"������");
		$_POST['������'] = returntablefield("edu_jiaocai","�̲ı��",$�̲ı��,"������");
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}
	*/

if($_GET['action']=="����IP��ַ")			{
	page_css("����IP��ַ");
	$sql	= "select distinct REMOTE_ADDR from access_downloadguest where HTTP_USER_AGENT like '%Mozilla%'";
	$rs		= $db->CacheExecute(15,$sql);
	$rs_a	= $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$REMOTE_ADDR		= $rs_a[$i]['REMOTE_ADDR'];

		$ip2long = bindec(decbin(ip2long($REMOTE_ADDR))) ;
		$sql	= "select ip_area from data_ip where ipstart<='$ip2long' and ipend>='$ip2long'";
		$rs		= $db->CacheExecute(36000,$sql);
		$IP���ڵ� = $rs->fields['ip_area'];
		if($IP���ڵ�=='')		$IP���ڵ� = "��ѯ�޵�ַ";

		$sql = "update access_downloadguest set HTTP_USER_AGENT='$IP���ڵ�' where REMOTE_ADDR='$REMOTE_ADDR'";
		$db->Execute($sql);
	}
	print "<table class=TableBlock width=100%>";
	print "<tr class=TableContent><td>&nbsp;���Ĳ������ɹ�,�����Բ���ʹ����������.</td></tr>";
	print "</table>";
	print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>\n";

	exit;
}

	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����access_downloadguest_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'access_downloadguest';
	$parse_filename		=	'access_downloadguest';
	require_once('include.inc.php');

if($_GET['action']=="init_default"||$_GET['action']=="")				{
	//print_R($_GET);
	print "<FORM name=form1 action=\"?action=DataDealDelte&pageid=1\" method=post encType=multipart/form-data>";
	print "<table class=TableBlock width=80%>";
	print "<tr class=TableContent><td><input type=button class=BigButton name='����IP��ַ' onClick=\"location='?".base64_encode("xx=xx&action=����IP��ַ&xx=xx")."'\" value='����IP��ַ'><font color=green>&nbsp;����IP��ַ.</font></td></tr>";
	print "</table>";
	print "</FORM>";
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