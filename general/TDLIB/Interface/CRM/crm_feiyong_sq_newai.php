<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	page_css("费用申请");
   
	if($_GET['action']=="edit_default_data")		{

		$单号 = $_POST['单号'];
		$sql = "select 是否作废 from crm_feiyong_sq where 单号='$单号'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();

		if($rs_a[0]['是否作废'] == 1){
			
		   print "
			<div align=\"center\" title=\"作废记录管理\">
			<table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;此项记录已经作废，系统禁止操作.</div>
			</td></tr></table>
			<br>
			<div align=center>
			";
			  print "<input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-2);\">
			</div>
			";
		   exit;
		}
	}


	
	if($_GET['action']=='view_default'){
    
          $ID = $_GET['编号'];
		  $sql = "select * from crm_feiyong_sq where 编号='$ID'";
		  $rs = $db->Execute($sql);
		  $rs_a = $rs->GetArray();
		  if($rs_a[0]['是否审核'] == 1 and $rs_a[0]['是否作废'] == 0){
		     print "<div align=\"center\" title=\"作废记录管理\">
					<table class=\"MessageBox\" align=\"center\" width=\"450\"><tr><td class=\"msg info\">
					<div class=\"content\" style=\"font-size:12pt\"><img src=\"images\审核.jpg\"></div>
					</td></tr></table>";
		  }
		  if($rs_a[0]['是否作废'] == 1){
		     print "<div align=\"center\" title=\"作废记录管理\">
					<table class=\"MessageBox\" align=\"center\" width=\"450\"><tr><td class=\"msg info\">
					<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;此项记录已经作废！</div>
					</td></tr></table>";
		  }
	}
	$filetablename		=	'crm_feiyong_sq';
	$parse_filename		=	'crm_feiyong_sq';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			说明：<BR>
			</font></td></table>";
			print $PrintText;
		}
	?>