<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css("CRM客户查询");
?>
<table border="0" width="100%" cellspacing="0" cellpadding="3" class="small">
  <tr>
    <td class="Big"><img src="images/view.gif" align="absmiddle"><span class="big3">&nbsp;CRM客户查询</span>
    </td>
  </tr>
</table>
<table class="TableBlock" width="100%" align="center">
	   <tr align="left" class="TableHeader"><td colspan=10></td></tr>
	   <tr align="center" class="TableHeader">
				 <TD noWrap>客户编码</TD>
				 <TD noWrap>客户名称</TD>
				 <TD noWrap>客户类型</TD>
				 <TD noWrap>客户等级</TD>
				 <TD noWrap>第一联系人</TD>
				 <TD noWrap>职务</TD>
				 <TD noWrap>手机</TD>
				 <TD noWrap>地址</TD>
	   </tr>
<?

if($_GET['check'] == "crmkehu"){
	$客户名称 = $_POST['kehu_name'];
	$客户类型 = $_POST['kehu_type'];
    
	if($客户名称 != ""){
	   $sql = "select * from crm_customer where 客户名称='$客户名称'";
	}else if($客户名称!="" and $客户类型!=""){
	   $sql = "select * from crm_customer where 客户名称='$客户名称' and 客户类型='$客户类型'";
	}else if($客户名称=="" and $客户类型!=""){
	   $sql = "select * from crm_customer where 客户类型='$客户类型'";
	}else if($客户名称=="" and $客户类型==""){
	   print "
			<div align=\"center\" title=\"空值查询\">
			<table class=\"MessageBox\" align=\"center\" width=\"400\">
			<tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;您没有输入任何查询数据!</div>
			</td></tr>
			</table><br>
			<div align=center>
			";
			print "<br><center><input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-1);\"></center>";
			exit;
	}
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(count($rs_a) == 0){
	   print "
			<div align=\"center\" title=\"空数据\">
			<table class=\"MessageBox\" align=\"center\" width=\"400\">
			<tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;没有查询出任何数据，请重新查询!</div>
			</td></tr>
			</table><br>
			<div align=center>
			";
			print "<br><center><input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-1);\"></center>";
			exit;
	}
	for($i=0;$i<count($rs_a);$i++){	
	print "<tr align=\"center\" class=\"TableData\">
									 <TD noWrap>&nbsp;<font color=\"blue\"><a href=crm_customer_view_model.php?客户编号=".$rs_a[$i]['编号'].">".$rs_a[$i]['客户编码']."</a></font></TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['客户名称']."</TD>
									 <TD noWrap>&nbsp;<font color=\"green\">".$rs_a[$i]['客户类型']."</font></TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['客户等级']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['第一联系人']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['职务']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['手机']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['地址']."</TD>
								  </tr>";				
	}	
?>
</table>
<?
print "<br><center><input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-1);\"></center>";
}	
?>
</body>
</html>