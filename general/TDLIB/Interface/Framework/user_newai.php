<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("ϵͳ��Ϣ����-��֯��������");
//######################�������-Ȩ�޽��鲿��##########################


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


	if($_GET['action']=="add_default_data")		{
		global $db;
		$_POST['PASSWORD']	= crypt("");
		$_POST['THEME']		= '3';
	}

	if($_GET['action']=="operation_clearpassword"&&$_GET['selectid']!="")				{
		$PASSWORD	= crypt("");
		$selectidArray = explode(',',$_GET['selectid']);
		$TempValue = sizeof($selectidArray)-2;
		for($i=0;$i<sizeof($selectidArray);$i++)			{
			$selectidValue = $selectidArray[$i];
			if($selectidValue!="")				{
				$sql = "update user set PASSWORD='$PASSWORD' where UID='$selectidValue'";
				$db->Execute($sql);
			}
		}
		page_css("���Ĳ������ɹ�");
		print_infor("���Ĳ������ɹ�,�뷵��....",'',"location='?'","?");
		exit;
	}


	//�Զ��������ݿ���ʽ
	$Columns = $db->MetaColumns("user");
	if($Columns['UID']->primary_key!=1)				{
		$sql = "ALTER TABLE `user` ADD PRIMARY KEY ( `UID` ) ";
		$db->Execute($sql);
	};
	if($Columns['UID']->auto_increment!=1)				{
		$sql = "ALTER TABLE `user` CHANGE `UID` `UID` INT( 11 ) NOT NULL AUTO_INCREMENT ";
		$db->Execute($sql);
	};


	//$SYSTEM_PRINT_SQL  = 0;
	//$sql = "ALTER TABLE `user` ADD PRIMARY KEY ( UID ) ";
	//$db->Execute($sql);
	//$sql = "ALTER TABLE `user` CHANGE UID UID INT( 11 ) NOT NULL AUTO_INCREMENT ";
	//$db->Execute($sql);

	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����user_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'user';
	$parse_filename		=	'user';
	require_once('include.inc.php');
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