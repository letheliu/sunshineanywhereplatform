<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	���ӶԲ�ѯ���ڿ�ݷ�ʽ��֧��("��������");
	
   
	if($_GET['action']=="edit_default_data")		{
		page_css("�ӳٸ���");
        
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
		$sql = "select �Ƿ����� from crm_yanchifukuan_sq where ����='$����'";
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
		  page_css("�ӳٸ���");
    
          $ID = $_GET['���'];
		  $sql = "select * from crm_yanchifukuan_sq where ���='$ID'";
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
	$filetablename		=	'crm_yanchifukuan_sq';
	$parse_filename		=	'crm_yanchifukuan_jlsq';
	require_once('include.inc.php');

	
	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			˵����<BR>
			</font></td></table>";
			print $PrintText;
		}
	
	?>