<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css("CRM�ͻ���ѯ");
?>
<table border="0" width="100%" cellspacing="0" cellpadding="3" class="small">
  <tr>
    <td class="Big"><img src="images/view.gif" align="absmiddle"><span class="big3">&nbsp;CRM�ͻ���ѯ</span>
    </td>
  </tr>
</table>
<table class="TableBlock" width="100%" align="center">
	   <tr align="left" class="TableHeader"><td colspan=10></td></tr>
	   <tr align="center" class="TableHeader">
				 <TD noWrap>�ͻ�����</TD>
				 <TD noWrap>�ͻ�����</TD>
				 <TD noWrap>�ͻ�����</TD>
				 <TD noWrap>�ͻ��ȼ�</TD>
				 <TD noWrap>��һ��ϵ��</TD>
				 <TD noWrap>ְ��</TD>
				 <TD noWrap>�ֻ�</TD>
				 <TD noWrap>��ַ</TD>
	   </tr>
<?

if($_GET['check'] == "crmkehu"){
	$�ͻ����� = $_POST['kehu_name'];
	$�ͻ����� = $_POST['kehu_type'];
    
	if($�ͻ����� != ""){
	   $sql = "select * from crm_customer where �ͻ�����='$�ͻ�����'";
	}else if($�ͻ�����!="" and $�ͻ�����!=""){
	   $sql = "select * from crm_customer where �ͻ�����='$�ͻ�����' and �ͻ�����='$�ͻ�����'";
	}else if($�ͻ�����=="" and $�ͻ�����!=""){
	   $sql = "select * from crm_customer where �ͻ�����='$�ͻ�����'";
	}else if($�ͻ�����=="" and $�ͻ�����==""){
	   print "
			<div align=\"center\" title=\"��ֵ��ѯ\">
			<table class=\"MessageBox\" align=\"center\" width=\"400\">
			<tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;��û�������κβ�ѯ����!</div>
			</td></tr>
			</table><br>
			<div align=center>
			";
			print "<br><center><input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-1);\"></center>";
			exit;
	}
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(count($rs_a) == 0){
	   print "
			<div align=\"center\" title=\"������\">
			<table class=\"MessageBox\" align=\"center\" width=\"400\">
			<tr><td class=\"msg info\">
			<div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;û�в�ѯ���κ����ݣ������²�ѯ!</div>
			</td></tr>
			</table><br>
			<div align=center>
			";
			print "<br><center><input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-1);\"></center>";
			exit;
	}
	for($i=0;$i<count($rs_a);$i++){	
	print "<tr align=\"center\" class=\"TableData\">
									 <TD noWrap>&nbsp;<font color=\"blue\"><a href=crm_customer_view_model.php?�ͻ����=".$rs_a[$i]['���'].">".$rs_a[$i]['�ͻ�����']."</a></font></TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['�ͻ�����']."</TD>
									 <TD noWrap>&nbsp;<font color=\"green\">".$rs_a[$i]['�ͻ�����']."</font></TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['�ͻ��ȼ�']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['��һ��ϵ��']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['ְ��']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['�ֻ�']."</TD>
									 <TD noWrap>&nbsp;".$rs_a[$i]['��ַ']."</TD>
								  </tr>";				
	}	
?>
</table>
<?
print "<br><center><input type=button  value=\"����\" class=\"SmallButton\" onClick=\"history.go(-1);\"></center>";
}	
?>
</body>
</html>