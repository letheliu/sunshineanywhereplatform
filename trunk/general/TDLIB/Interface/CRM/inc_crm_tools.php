<?

//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("�ҵĹ�˾ҵ��-CRM���߼�");
//######################�������-Ȩ�޽��鲿��##########################

require_once('lib.inc.php');
require_once('lib.zip.inc.php');
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

page_css("CRM���߼�");


if($_GET['action']=="ת���û�A�Ŀͻ����������Ϣ���û�B")								{
	//print_R($_POST);exit;
	$�û�A_ID	= $_POST['�û�A_ID'];
	$�û�B_ID	= $_POST['�û�B_ID'];
	$�û�A		= $_POST['�û�A'];
	$�û�B		= $_POST['�û�B'];
	if($�û�A_ID!=""&&$�û�B_ID!="")			{
		$sql = "update crm_contract set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_customer set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_expense set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set ������Ա='$�û�B' where ������Ա='$�û�A'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_product set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_provider set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_service set ������='$�û�B_ID' where ������='$�û�A_ID'";
		$db->Execute($sql);		print $sq."<BR>";

		print_infor("���Ĳ����������,�뷵��!&nbsp;&nbsp;",'',"location='?'","?",1);
		exit;
	}
	else	{
		print_infor("�û�A���û�Bû���趨,�������趨!",'',"location='?'","?",1);
		exit;
	}
}


if($_GET['action']=="����һ�ͻ�ת��ĳ�û�")								{
	//print_R($_GET);//exit;
	$�ͻ�����	= $_GET['�ͻ�����'];
	$�û���	= $_GET['�û���'];
	if($�ͻ�����!=""&&$�û���!="")			{
		$sql = "update crm_contract set ������='$�û���' where �ͻ�����='$�ͻ�����'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_customer set ������='$�û���' where �ͻ�����='$�ͻ�����'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_expense set ������='$�û���' where �ͻ�����='$�ͻ�����'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set ������='$�û���' where �ͻ�����='$�ͻ�����'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_order set ������Ա='$�û���' where �ͻ�����='$�ͻ�����'";
		$db->Execute($sql);		print $sq."<BR>";
		$sql = "update crm_service set ������='$�û���' where �ͻ�����='$�ͻ�����'";
		$db->Execute($sql);		print $sq."<BR>";

		print_infor("���Ĳ����������,�뷵��!&nbsp;&nbsp;",'',"location='?'","?",1);
		exit;
	}
	else	{
		print_infor("�û�A���û�Bû���趨,�������趨!",'',"location='?'","?",1);
		exit;
	}
}




?>
<script language = "JavaScript">
function FormCheck()
{
	if (document.form1.�û�A_ID.value == "") {
		alert("�û�Aû���趨��Ա");
		return false;
	}
	if (document.form1.�û�B_ID.value == "") {
		alert("�û�Bû���趨��Ա");
		return false;
	}
}
function FormCheck2()
{
	if (document.form1.�ͻ�����.value == "") {
		alert("�ͻ�����û���趨");
		return false;
	}
	if (document.form1.�û�_ID.value == "") {
		alert("�û�û���趨");
		return false;
	}
	URL = "?action=����һ�ͻ�ת��ĳ�û�&�ͻ�����="+document.form1.�ͻ�����.value+"&�û���="+document.form1.�û�_ID.value;
	window.location = URL;
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table border="0" width="100%" align=center cellspacing="0" cellpadding="3" class="TableBlock">
  <tr  class=TableHeader>
    <td colspan="6" height=28>&nbsp;<img src="/images/sys_config.gif" align="absmiddle" > CRM�α�������߼�(�ṩһЩ���Ĺ��߸�������Ա����ʹ��)</td>
  </tr>
 <tr class="TableData">
 <td colspan="6" align=center height=42>
 <FORM name=form1 onsubmit="return FormCheck();" action="?action=ת���û�A�Ŀͻ����������Ϣ���û�B&pageid=1" method=post encType=multipart/form-data>
	ת���û�A:
	<input type="hidden" name="�û�A_ID" value="">
	<input type="text" name="�û�A" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectTeacherSingle('','�û�A_ID', '�û�A')">ѡ��</a>
	�Ŀͻ����������Ϣ��:
	�û�B
	<input type="hidden" name="�û�B_ID" value="">
	<input type="text" name="�û�B" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectTeacherSingle('','�û�B_ID', '�û�B')">ѡ��</a>
    <input type="submit"  value="�ύ" class="BigButton" title="�ύ">
 </td>
</tr>
</table>

<BR>
<table border="0" width="100%" align=center cellspacing="0" cellpadding="3" class="TableBlock">
  <tr  class=TableHeader>
    <td colspan="6" height=28>&nbsp;<img src="/images/sys_config.gif" align="absmiddle" > CRM�α�������߼�(�ṩһЩ���Ĺ��߸�������Ա����ʹ��)</td>
  </tr>
 <tr class="TableData">
 <td colspan="6" align=center height=42>
	ת�ƿͻ�����:
	<input type="hidden" name="�ͻ�����_ID" value="">
	<input type="text" name="�ͻ�����" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectAllInforSingle('../../Enginee/Module/customer_select_single/index.php','','�ͻ�����_ID', '�ͻ�����')">ѡ��</a>
	�Ŀͻ����������Ϣ��:
	�û�
	<input type="hidden" name="�û�_ID" value="">
	<input type="text" name="�û�" value="" readonly class="SmallStatic" size="10">
	<a href="javascript:;" class="orgAdd" onClick="SelectTeacherSingle('','�û�_ID', '�û�')">ѡ��</a>
    <input type="Button"  value="�ύ" class="BigButton" OnClick='FormCheck2();' title="�ύ">
	</FORM>
 </td>
</tr>
</table>
