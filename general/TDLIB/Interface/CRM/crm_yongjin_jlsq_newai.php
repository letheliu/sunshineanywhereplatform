<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	增加对查询日期快捷方式的支持("申请日期");
   

	if($_GET['action']=="edit_default_data")		{
		page_css("佣金申请");

		if($_POST['是否审核'] == 1 and $_POST['是否作废'] == 0){
		   $_POST['审核日期'] = date("Y-m-d H:i:s");
		   $审核人 = $_SESSION['LOGIN_USER_ID'];          
		   $备注   = $_POST['备注'];
		   //拆分字符串
           $bz = substr($备注,0,7);
		   if($bz != "<审核人"){
		      $_POST['备注'] = "<审核人:".$审核人.">".$_POST['备注'];
		   }   
		}

		if($_POST['是否作废'] == '1'){
		   $_POST['作废日期'] = date("Y-m-d H:i:s"); 
		   $作废人 = $_SESSION['LOGIN_USER_ID'];
		   $_POST['备注'] = "<作废人：".$作废人.">".$_POST['备注'];
		}

		$单号 = $_POST['单号'];
		$sql = "select 是否作废 from crm_yongjin_sq where 单号='$单号'";
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
		  page_css("佣金申请");    
          $ID = $_GET['编号'];
		  $sql = "select * from crm_yongjin_sq where 编号='$ID'";
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

	//数据表模型文件,对应Model目录下面的crm_yongjin_sq_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'crm_yongjin_sq';
	$parse_filename		=	'crm_yongjin_jlsq';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td ><font color=green >
			说明：<BR>
			</font></td></table>";
			print $PrintText;
		}
	
	?>