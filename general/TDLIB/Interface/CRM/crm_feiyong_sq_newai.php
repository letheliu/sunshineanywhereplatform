<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	page_css("��������");
   
	if($_GET['action']=="edit_default_data")		{

		$���� = $_POST['����'];
		$sql = "select �Ƿ����� from crm_feiyong_sq where ����='$����'";
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
    
          $ID = $_GET['���'];
		  $sql = "select * from crm_feiyong_sq where ���='$ID'";
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
	$filetablename		=	'crm_feiyong_sq';
	$parse_filename		=	'crm_feiyong_sq';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			˵����<BR>
			</font></td></table>";
			print $PrintText;
		}
	?>