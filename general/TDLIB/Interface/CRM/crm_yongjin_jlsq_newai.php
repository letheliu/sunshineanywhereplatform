<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	���ӶԲ�ѯ���ڿ�ݷ�ʽ��֧��("��������");
   

	if($_GET['action']=="edit_default_data")		{
		page_css("Ӷ������");

		if($_POST['�Ƿ����'] == 1 and $_POST['�Ƿ�����'] == 0){
		   $_POST['�������'] = date("Y-m-d H:i:s");
		   $����� = $_SESSION['LOGIN_USER_ID'];          
		   $��ע   = $_POST['��ע'];
		   //����ַ���
           $bz = substr($��ע,0,7);
		   if($bz != "<�����"){
		      $_POST['��ע'] = "<�����:".$�����.">".$_POST['��ע'];
		   }   
		}

		if($_POST['�Ƿ�����'] == '1'){
		   $_POST['��������'] = date("Y-m-d H:i:s"); 
		   $������ = $_SESSION['LOGIN_USER_ID'];
		   $_POST['��ע'] = "<�����ˣ�".$������.">".$_POST['��ע'];
		}

		$���� = $_POST['����'];
		$sql = "select �Ƿ����� from crm_yongjin_sq where ����='$����'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		if($rs_a[0]['�Ƿ�����'] == 1){
		   print "
			<div align=\"center\" title=\"���ϼ�¼����\">
			<table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;�����¼�Ѿ����ϣ�ϵͳ��ֹ����.</div>
			</td></tr></table>
			<br>
			<div align=center>
			";
			  print "<input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-2);\">
			</div>
			";
		   exit;
		}
	}

	if($_GET['action']=='view_default'){
		  page_css("Ӷ������");    
          $ID = $_GET['���'];
		  $sql = "select * from crm_yongjin_sq where ���='$ID'";
		  $rs = $db->Execute($sql);
		  $rs_a = $rs->GetArray();
		  if($rs_a[0]['�Ƿ����'] == 1 and $rs_a[0]['�Ƿ�����'] == 0){
		     print "<div align=\"center\" title=\"���ϼ�¼����\">
					<table class=\"MessageBox\" align=\"center\" width=\"450\"><tr><td class=\"msg info\">
					<div class=\"content\" style=\"font-size:12pt\"><img src=\"images\���.jpg\"></div>
					</td></tr></table>";
		  }
		  if($rs_a[0]['�Ƿ�����'] == 1){
		     print "<div align=\"center\" title=\"���ϼ�¼����\">
					<table class=\"MessageBox\" align=\"center\" width=\"450\"><tr><td class=\"msg info\">
					<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;�����¼�Ѿ����ϣ�</div>
					</td></tr></table>";
		  }
	}

	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����crm_yongjin_sq_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'crm_yongjin_sq';
	$parse_filename		=	'crm_yongjin_jlsq';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			˵����<BR>
			</font></td></table>";
			print $PrintText;
		}
	
	?>