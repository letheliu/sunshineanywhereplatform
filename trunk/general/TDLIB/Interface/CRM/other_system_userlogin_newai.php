<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();



$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];


if($_GET['action']=="��¼ϵͳ")						{

	print "<TITLE>��������ϵͳ</TITLE>
	<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
	<LINK href=\"/theme/3/style.css\" type=text/css rel=stylesheet>
	<script type=\"text/javascript\" language=\"javascript\" src=\"/general/EDU/Enginee/lib/common.js\"></script>
	<STYLE>@media print{input{display:none}}</STYLE>
	";

	$��� = $_GET['���'];

	$sql = "select * from other_system_userlogin where ϵͳ='$���' and �û�='$LOGIN_USER_ID'";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	//print_R($rsX_a);exit;

	if($rsX_a[0]['�û�']!="")			{
		print "<BODY class=bodycolor topMargin=5 onload='form1.submit();'>";
	}
	else			{
		print_infor("�������������û���������!",'trip',"".base64_encode("XX=XX&action=���õ�¼ϵͳ&���=$���&XX=XX")."","?");
		exit;
	}

	$sql = "select * from other_system_config where ���='$���'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$����			= $rs_a[0]['����'];
	$��¼��ַ		= $rs_a[0]['��¼��ַ'];
	$��½�û����ֶ�	= $rs_a[0]['��½�û����ֶ�'];
	$��½�����ֶ�	= $rs_a[0]['��½�����ֶ�'];
	$�ύ��ʽ		= $rs_a[0]['�ύ��ʽ'];
	$Ȩ��			= $rs_a[0]['Ȩ��'];
	$Ȩ��			= $rs_a[0]['Ȩ��'];
	$��չ��½1�ֶ���	= $rs_a[0]['��չ��½1�ֶ���'];
	$��չ��½1�ֶ�ֵ	= $rs_a[0]['��չ��½1�ֶ�ֵ'];
	$��չ��½2�ֶ���	= $rs_a[0]['��չ��½2�ֶ���'];
	$��չ��½2�ֶ�ֵ	= $rs_a[0]['��չ��½2�ֶ�ֵ'];
	$��չ��½3�ֶ���	= $rs_a[0]['��չ��½3�ֶ���'];
	$��չ��½3�ֶ�ֵ	= $rs_a[0]['��չ��½3�ֶ�ֵ'];
	$��ע				= $rs_a[0]['��ע'];



	print "<form name=\"form1\" id=\"form1\" action=\"$��¼��ַ\" method=\"$�ύ��ʽ\">";
	print "<input type=\"hidden\" name=\"$��½�û����ֶ�\" id=\"$��½�û����ֶ�\" value=\"".$rsX_a[0]['��¼�û���']."\">";
	print "<input type=\"hidden\" name=\"$��½�����ֶ�\" id=\"$��½�����ֶ�\" value=\"".base64_decode($rsX_a[0]['��¼����'])."\">";
	if($��չ��½1�ֶ���!="")				{
		print "<input type=\"hidden\" name=\"$��չ��½1�ֶ���\" id=\"$��չ��½1�ֶ���\" value=\"".$��չ��½1�ֶ�ֵ."\">";
	}
	if($��չ��½2�ֶ���!="")				{
		print "<input type=\"hidden\" name=\"$��չ��½2�ֶ���\" id=\"$��չ��½2�ֶ���\" value=\"".$��չ��½2�ֶ�ֵ."\">";
	}
	if($��չ��½3�ֶ���!="")				{
		print "<input type=\"hidden\" name=\"$��չ��½3�ֶ���\" id=\"$��չ��½3�ֶ���\" value=\"".$��չ��½3�ֶ�ֵ."\">";
	}
	print "</form></body></html>";

	exit;
}


page_css("��������ϵͳ");

if($_GET['action']=="�ύ���õ�¼ϵͳ")						{

	$��� = $_GET['���'];
	$sql = "select * from other_system_config where ���='$���'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$sql = "select * from other_system_userlogin where ϵͳ='$���' and �û�='$LOGIN_USER_ID'";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	//print_R($rsX_a);

	if($rsX_a[0]['�û�']!="")			{
		$sql = "update other_system_userlogin set ��¼�û���='".$_POST['��¼�û���']."',��¼����='".base64_encode($_POST['��¼����'])."' where ϵͳ='$���' and �û�='$LOGIN_USER_ID'";
	}
	else			{
		$sql = "insert into other_system_userlogin value('','$���','$LOGIN_USER_ID','".$_POST['��¼�û���']."','".base64_encode($_POST['��¼����'])."');";
	}
	//print_R($_POST);
	//print $sql;
	$db->Execute($sql);
	print_infor("���Ĳ����ѳɹ�!",'trip',"location='?'","?");

	exit;
}




if($_GET['action']=="���õ�¼ϵͳ")						{

	$��� = $_GET['���'];
	$sql = "select * from other_system_config where ���='$���'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$sql = "select * from other_system_userlogin where ϵͳ='$���' and �û�='$LOGIN_USER_ID'";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	//print_R($sql);

	form_begin("form1","?".base64_encode("XX=XX&action=�ύ���õ�¼ϵͳ&���=$���&XX=XX")."");
	table_begin("60%");
	print_title("�û�������������",2);

	//if($rsX_a[0]['��¼�û���']=="") $rsX_a[0]['��¼�û���'] = $LOGIN_USER_ID;;
	?>

   <tr class="TableData">
    <td nowrap class="TableContent" width="120">����ϵͳ���ƣ�</td>
    <td><?=$rs_a[0]['����'];?></td>
   </tr>
   <tr class="TableData">
    <td nowrap class="TableContent">����ϵͳ��ַ��</td>
    <td><?=$rs_a[0]['��¼��ַ']?></td>
   </tr>
   <tr class="TableData">
    <td nowrap class="TableContent">��¼�û�����</td>
    <td>
        <input type="text" name="��¼�û���" value="<?=$rsX_a[0]['��¼�û���']?>" class="BigInput" size="30"> <span style="color: #ff0033">*</span>
    </td>
   </tr>
   <tr class="TableData">
    <td nowrap class="TableContent">��¼���룺</td>
    <td>
        <input type="password" name="��¼����" value="<?=base64_decode($rsX_a[0]['��¼����'])?>" class="BigInput" size="30"> <span style="color: #ff0033">*</span>
    </td>
   </tr>
   <tr>
    <td nowrap  class="TableControl" colspan="2" align="center">
        <input type="submit" value="ȷ ��" class="BigButton" name="button">&nbsp;&nbsp;
<?
if($ID!="")
{
?>
   <input type="button" value="�� ��" class="BigButton" onclick="history.back();">
<?
}
?>
    </td>
  </form>
</table>

<?
exit;
}



	table_begin("100%");
	print_title("��������ϵͳ",3);
	print "<tr class='TableHeader' align='center'>
     <td width='200'>����ϵͳ</td>
     <td width='100'>����</td>
     <td>˵��</td></tr>";

	$sql = "select * from other_system_config where Ȩ�� like '%$LOGIN_USER_ID,%' order by �����";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$���			= $rs_a[$i]['���'];
		$����			= $rs_a[$i]['����'];
		$��¼��ַ		= $rs_a[$i]['��¼��ַ'];
		$��½�û����ֶ�	= $rs_a[$i]['��½�û����ֶ�'];
		$��½�����ֶ�	= $rs_a[$i]['��½�����ֶ�'];
		$�ύ��ʽ		= $rs_a[$i]['�ύ��ʽ'];
		$Ȩ��			= $rs_a[$i]['Ȩ��'];
		$Ȩ��			= $rs_a[$i]['Ȩ��'];
		$��չ��½1�ֶ���	= $rs_a[$i]['��չ��½1�ֶ���'];
		$��չ��½1�ֶ�ֵ	= $rs_a[$i]['��չ��½1�ֶ�ֵ'];
		$��չ��½2�ֶ���	= $rs_a[$i]['��չ��½2�ֶ���'];
		$��չ��½2�ֶ�ֵ	= $rs_a[$i]['��չ��½2�ֶ�ֵ'];
		$��չ��½3�ֶ���	= $rs_a[$i]['��չ��½3�ֶ���'];
		$��չ��½3�ֶ�ֵ	= $rs_a[$i]['��չ��½3�ֶ�ֵ'];
		$��ע				= $rs_a[$i]['��ע'];
		$���� = "<a href=\"?".base64_encode("XX=XX&action=��¼ϵͳ&���=$���&XX=XX")."\" target=_blank>��¼</a> <a href=\"?".base64_encode("XX=XX&action=���õ�¼ϵͳ&���=$���&XX=XX")."\">����</a> ";
		print "<tr class='TableData' align='left' >
				 <td width='200'>&nbsp;$����</td>
				 <td width='100' align='center'>$����</td>
				 <td>&nbsp;$��ע</td></tr>";
	}
	print "</table>";

if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
$PrintText .= "<TR class=TableContent><td ><font color=green >

ʹ��˵����<BR>
&nbsp;&nbsp;�ٴ˴��������Կ�����ʹ�õ�ϵͳ��Ϣ��������ý���������ϵͳ���û��������룬�����¼������ת������ϵͳ��<BR>
&nbsp;&nbsp;�ڷ�������ϵͳ��Ȩ���Լ�������������ֻ�У԰->�����¼�˵��н��С�



</font></td></table>";
	print $PrintText;
}




	exit;
	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����other_system_userlogin_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'other_system_userlogin';
	$parse_filename		=	'other_system_userlogin';
	require_once('include.inc.php');


	?><?
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