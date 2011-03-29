<?

//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("我的公司业务-CRM工具集");
//######################教育组件-权限较验部分##########################

require_once('lib.inc.php');
require_once('lib.zip.inc.php');
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

page_css("CRM工具集");


if($_GET['action']=="转移用户A的客户所有相关信息给用户B")								{
	//print_R($_POST);exit;
	$用户A_ID	= $_POST['用户A_ID'];
	$用户B_ID	= $_POST['用户B_ID'];
	$用户A		= $_POST['用户A'];
	$用户B		= $_POST['用户B'];
	if($用户A_ID!=""&&$用户B_ID!="")			{
		$sql = "update crm_contract set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_customer set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_expense set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set 销售人员='$用户B' where 销售人员='$用户A'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_product set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_provider set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_service set 创建人='$用户B_ID' where 创建人='$用户A_ID'";
		$db->Execute($sql);		print $sq."<BR>";

		print_infor("您的操作己经完成,请返回!&nbsp;&nbsp;",'',"location='?'","?",1);
		exit;
	}
	else	{
		print_infor("用户A或用户B没有设定,请重新设定!",'',"location='?'","?",1);
		exit;
	}
}


if($_GET['action']=="处理单一客户转给某用户")								{
	//print_R($_GET);//exit;
	$客户名称	= $_GET['客户名称'];
	$用户名	= $_GET['用户名'];
	if($客户名称!=""&&$用户名!="")			{
		$sql = "update crm_contract set 创建人='$用户名' where 客户名称='$客户名称'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_customer set 创建人='$用户名' where 客户名称='$客户名称'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_expense set 创建人='$用户名' where 客户名称='$客户名称'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set 创建人='$用户名' where 客户名称='$客户名称'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set 销售人员='$用户名' where 客户名称='$客户名称'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_service set 创建人='$用户名' where 客户名称='$客户名称'";
		$db->Execute($sql);		print $sq."<BR>";

		print_infor("您的操作己经完成,请返回!&nbsp;&nbsp;",'',"location='?'","?",1);
		exit;
	}
	else	{
		print_infor("用户A或用户B没有设定,请重新设定!",'',"location='?'","?",1);
		exit;
	}
}




?>
<script language = "JavaScript">
function FormCheck()
{
	if (document.form1.用户A_ID.value == "") {
		alert("用户A没有设定人员");
		return false;
	}
	if (document.form1.用户B_ID.value == "") {
		alert("用户B没有设定人员");
		return false;
	}
}
function FormCheck2()
{
	if (document.form1.客户名称.value == "") {
		alert("客户名称没有设定");
		return false;
	}
	if (document.form1.用户_ID.value == "") {
		alert("用户没有设定");
		return false;
	}
	URL = "?action=处理单一客户转给某用户&客户名称="+document.form1.客户名称.value+"&用户名="+document.form1.用户_ID.value;
	window.location = URL;
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table border="0" width="100%" align=center cellspacing="0" cellpadding="3" class="TableBlock">
  <tr  class=TableHeader>
    <td colspan="6" height=28>&nbsp;<img src="/images/sys_config.gif" align="absmiddle" > CRM课表操作工具集(提供一些简便的工具给管理人员操作使用)</td>
  </tr>
 <tr class="TableData">
 <td colspan="6" align=center height=42>
 <FORM name=form1 onsubmit="return FormCheck();" action="?action=转移用户A的客户所有相关信息给用户B&pageid=1" method=post encType=multipart/form-data>
	转移用户A:
	<input type="hidden" name="用户A_ID" value="">
	<input type="text" name="用户A" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectTeacherSingle('','用户A_ID', '用户A')">选择</a>
	的客户所有相关信息给:
	用户B
	<input type="hidden" name="用户B_ID" value="">
	<input type="text" name="用户B" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectTeacherSingle('','用户B_ID', '用户B')">选择</a>
    <input type="submit"  value="提交" class="BigButton" title="提交">
 </td>
</tr>
</table>

<BR>
<table border="0" width="100%" align=center cellspacing="0" cellpadding="3" class="TableBlock">
  <tr  class=TableHeader>
    <td colspan="6" height=28>&nbsp;<img src="/images/sys_config.gif" align="absmiddle" > CRM课表操作工具集(提供一些简便的工具给管理人员操作使用)</td>
  </tr>
 <tr class="TableData">
 <td colspan="6" align=center height=42>
	转移客户名称:
	<input type="hidden" name="客户名称_ID" value="">
	<input type="text" name="客户名称" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectAllInforSingle('../../Enginee/Module/customer_select_single/index.php','','客户名称_ID', '客户名称')">选择</a>
	的客户所有相关信息给:
	用户
	<input type="hidden" name="用户_ID" value="">
	<input type="text" name="用户" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectTeacherSingle('','用户_ID', '用户')">选择</a>
    <input type="Button"  value="提交" class="BigButton" OnClick='FormCheck2();' title="提交">
	</FORM>
 </td>
</tr>
</table>
