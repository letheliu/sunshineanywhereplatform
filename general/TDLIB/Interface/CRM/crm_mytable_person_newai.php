<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	//print_R($_SESSION);
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

    	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>������ť��ʼ������ģ�����ݣ�
			               <input type=button name=csh class=SmallButton value=��ʼ��>
			               </td></table>";
			print $PrintText;
		}
		*/
	$user_id = $_SESSION['LOGIN_USER_ID'];
	//$user_id = "ccccccccc";
	$ins_date = date("Y-m-d H:i:s");
    $SQL = "select COUNT(*) AS NUM from crm_mytable where ������='$user_id'";
	$rs = $db->Execute($SQL);
	if($rs->fields('NUM')==0){
		page_css("CRM�����ʼ��");
		$ins_sql = "INSERT INTO `crm_mytable` (`ģ����`, `ģ������`, `ģ��λ��`, `ģ������`, `��ʾ����`, `������ʾ`, `������`, `����ʱ��`, `��ע`) VALUES ('02', 'crm_kehu_birthday.php', '�ұ�', '�û���ѡ', '0', '1', '".$user_id."', '".$ins_date."', 'CRM�ͻ���������'),
  ('03', 'crm_notes.php', '�ұ�', '�û���ѡ', '0', '1', '".$user_id."', '".$ins_date."', 'CRM�����ǩ'),
('04', 'crm_mytable_kehugaishu.php', '���', '�û���ѡ', '0', '1', '".$user_id."', '".$ins_date."', 'CRM�ͻ�����'),
('05', 'crm_mytable_feiyong.php', '���', '�û���ѡ', '4', '1', '".$user_id."', '".$ins_date."', 'CRM���ù���'),
('06', 'crm_mytable_fuwu.php', '���', '�û���ѡ', '4', '1', '".$user_id."', '".$ins_date."', 'CRM�������'),
('07', 'crm_mytable_hetong.php', '���', '�û���ѡ', '4', '1', '".$user_id."', '".$ins_date."', 'CRM��ͬ����'),
('08', 'crm_mytable_dingdan.php', '���', '�û���ѡ', '4', '1', '".$user_id."', '".$ins_date."', 'CRM��������'),
('01', 'crm_google.php', '�ұ�', '�û���ѡ', '0', '1', '".$user_id."', '".$ins_date."', 'Google���߷���'),
('09', 'kehu_chaxun.php', '�ұ�', '�û���ѡ', '0', '0', '".$user_id."', '".$ins_date."', 'CRM�ͻ���ѯ'),
('10', 'crm_mytable_tongzhi.php', '�ұ�', '�û���ѡ', '0', '0', '".$user_id."', '".$ins_date."', 'CRM����֪ͨ');";

       $db->Execute($ins_sql);

    print "<div align=\"center\" title=\"��ʼ��CRM����ģ��\">
		   <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
		   <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;��������ģ���Ѿ���ɳ�ʼ������ʹ��.</div>
		   </td></tr></table><br><div align=center>";
	print "<input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-2);\"></div>";
	exit;
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


	$_GET['������'] = $user_id;

	$filetablename		=	'crm_mytable';
	$parse_filename		=	'crm_mytable_person';
	require_once('include.inc.php');

	   	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>˵����<br>
			&nbsp;&nbsp;&nbsp;1������ǵ�һ�ε�¼ϵͳ��ϵͳ����CRM����ģ����г�ʼ����<br>
			&nbsp;&nbsp;&nbsp;2����ʼ����ɺ��û������Զ�������ģ�����ʾ��        
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