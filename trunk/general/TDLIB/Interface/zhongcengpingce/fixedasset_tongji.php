<?
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

page_css("�̶��ʲ���Ϣ������ʱ����зֿ��ҷ����ͳ��");
print "<link rel='stylesheet' type='text/css' href='/theme/$LOGIN_THEME/style.css'>\n";
	print "<SCRIPT>\n";
	print "function td_calendar(fieldname) {\n";
	print "myleft=document.body.scrollLeft+event.clientX-event.offsetX-80;\n";
	print "mytop=document.body.scrollTop+event.clientY-event.offsetY+140;\n";
	print "window.showModalDialog(fieldname,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:280px;dialogHeight:220px;dialogTop:\"+mytop+\"px;dialogLeft:\"+myleft+\"px\");\n";
	print "}\n";
	print "function SubmitForm() { 
		var ��ʼʱ�� = document.form1.��ʼʱ��.value;
		var ����ʱ�� = document.form1.����ʱ��.value;
		URL = \"?action=Stat&��ʼʱ��=\"+��ʼʱ��+\"&����ʱ��=\"+����ʱ��+\"\";
		location = URL;
		
		}\n";
	print "</SCRIPT>\n";
print "<form name=form1><table border=0 cellspacing=0 class=small bordercolor=#000000 cellpadding=3 width=800 style=\"border-collapse:collapse\"><tr><td nowrap>
";

if($_GET['��ʼʱ��']=="") $_GET['��ʼʱ��'] = date("Y-m-d",mktime(date("H"),date("i"),date("s"),date("m")-1,date("d"),date("Y")));;
if($_GET['����ʱ��']=="") $_GET['����ʱ��'] = date("Y-m-d",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));;

print "<INPUT class=SmallInput size=10  name=��ʼʱ�� value='".$_GET['��ʼʱ��']."' title='' onkeydown='if(event.keyCode==13)event.keyCode=9' >
<input type='button'  title=''  value='ѡ��' class='SmallButton' onclick=\"td_calendar('../../Framework/sms_index/calendar_begin.php?datetime=��ʼʱ��');\" title='ѡ��' name='button'>&nbsp;&nbsp;
<INPUT class=SmallInput size=10  name=����ʱ�� value='".$_GET['����ʱ��']."' title='' onkeydown='if(event.keyCode==13)event.keyCode=9' >
<input type='button'  title=''  value='ѡ��' class='SmallButton' onclick=\"td_calendar('../../Framework/sms_index/calendar_begin.php?datetime=����ʱ��');\" title='ѡ��' name='button'>&nbsp;&nbsp;&nbsp;<input type='button'  title=''  value='��ʼ��ѯ' class='SmallButton' onclick=\"SubmitForm()\" title='��ʼ��ѯ' name='button'>
<input type=button accesskey=p name=print value=\"��ӡ\" class=SmallButton onClick=\"document.execCommand('Print');\" title=\"��ݼ�:ALT+p\">
";
//print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-3,date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">�������</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-7,date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">���һ��</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-15,date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">�������</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-30,date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">���һ����</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-60,date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">���������</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-90,date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">���������</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("��ʼʱ��=".date("Y-m-d",mktime(0,0,1,date("m")-6,date("d"),date("Y")))."&����ʱ��=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">���������</a>";
print "</td></tr></table></form>  ";


//��ʼ�����շ�(�跽)���˷�(����)���ֽ��ռ��˱�


print "<table  class=TableBlock align=center width=800>
<TR><TD class=TableHeader align=left colSpan=40>&nbsp;�̶��ʲ���Ϣ������ʱ����зֿ��ҷ����ͳ�� <a href='fixedasset_tongjijianjie.php?��ʼʱ��=".$_GET['��ʼʱ��']."&����ʱ��=".$_GET['����ʱ��']."'>���ͳ��</a></TD></TR>
";


$��ʼʱ�� = $_GET['��ʼʱ��'];
$����ʱ�� = $_GET['����ʱ��'];
$��ʼʱ��ARRAY  = explode('-',$��ʼʱ��);
$����ʱ��ARRAY  = explode('-',$����ʱ��);
$��ʼʱ�� = date("Y-m-d H:i:s",mktime(0,0,1,$��ʼʱ��ARRAY[1],$��ʼʱ��ARRAY[2],$��ʼʱ��ARRAY[0]));
$����ʱ�� = date("Y-m-d H:i:s",mktime(0,0,1,$����ʱ��ARRAY[1],$����ʱ��ARRAY[2]+1,$����ʱ��ARRAY[0]));

$NewArray = array();
$SortArray = array();
//��������������
$sql = "select �ʲ����,�ʲ�����,SUM(����) AS �ʲ�����,SUM(����*����) AS �ʲ��ܽ��,��������,�ʲ�����,�ʲ���� from fixedasset where ��������>='$��ʼʱ��' and ��������<='$����ʱ��' and �ʲ�����!='' group by ��������,�ʲ�����";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Element = $rs_a[$i];
	$�������� = $Element['��������'];
	$�ʲ����� = $Element['�ʲ�����'];
	$�ʲ����� = $Element['�ʲ�����'];
	$�ʲ���� = $Element['�ʲ����'];
	$���������б�[$��������] += $�ʲ�����;
	$�ʲ���Ϣ��Ż���[$�ʲ�����] = $Element['�ʲ����'];
	$�ʲ���Ϣ����[$�ʲ�����]['�ʲ��ܽ��'][$��������] = $Element['�ʲ��ܽ��'];
	$�ʲ���Ϣ����[$�ʲ�����]['�ʲ�����'][$��������] = $Element['�ʲ�����'];

	$�ʲ���Ϣ����DEPT['�ʲ��ܽ��'][$��������] += $Element['�ʲ��ܽ��'];
	$�ʲ���Ϣ����DEPT['�ʲ�����'][$��������] += $Element['�ʲ�����'];
	
	$���� += $�ʲ�����;
}

$�ʲ��ܽ�� = @array_sum($�ʲ���Ϣ����DEPT['�ʲ��ܽ��']);
//�������ս���������

print "<tr class=TableHeader>
<td nowrap>���</td>
<td nowrap>�ʲ����</td>
<td nowrap>�ʲ�����</td>
<td nowrap>�ϼ�</td>
";
$�����б� = @array_keys($���������б�);
for($i=0;$i<sizeof($�����б�);$i++)		{
	print "<td nowrap>{$�����б�[$i]}</td>";
}
print "</tr>";

$�ʲ���Ϣ����Array = @array_keys($�ʲ���Ϣ����);
for($IX=0;$IX<sizeof($�ʲ���Ϣ����Array);$IX++)		{
	$�ʲ����� = $�ʲ���Ϣ����Array[$IX];
	$�ʲ���� = $�ʲ���Ϣ��Ż���[$�ʲ�����];
	print "<tr class=TableData>
	<td nowrap>&nbsp;".($IX+1)."</td>
	<td nowrap>&nbsp;$�ʲ����</td>
	<td nowrap>&nbsp;$�ʲ�����</td>
	";
	$�����ʲ������ϼ� = array_sum($�ʲ���Ϣ����[$�ʲ�����]['�ʲ�����']);
	$�����ʲ��ϼ�ALL += $�����ʲ������ϼ�;
	if($�����ʲ������ϼ�>0)			{
		$�����ʲ��ܽ�� = @array_sum($�ʲ���Ϣ����[$�ʲ�����]['�ʲ��ܽ��']);
		$�����ʲ��ϼ�Text = "����:$�����ʲ������ϼ� ���:$�����ʲ��ܽ��";
	}
	else	$�����ʲ��ϼ�Text = "";
	print "<td nowrap>&nbsp;$�����ʲ��ϼ�Text</td>";
	$�����б� = @array_keys($���������б�);
	for($i=0;$i<sizeof($�����б�);$i++)		{
		$�������� = $�����б�[$i];
		if($�ʲ���Ϣ����[$�ʲ�����]['�ʲ�����'][$��������]>0) {
			$ShowText = "����:".$�ʲ���Ϣ����[$�ʲ�����]['�ʲ�����'][$��������]." ���:".$�ʲ���Ϣ����[$�ʲ�����]['�ʲ��ܽ��'][$��������]."";
		}else	{
			$ShowText = "";
		}
		print "<td nowrap>&nbsp;$ShowText</td>";
	}
	print "</tr>";

}








$���п��ALL = (int)$���п��ALL;
$�ʲ��ܽ�� = number_format($�ʲ��ܽ��,2);
print "<tr class=TableContent>
<td nowrap colspan=4>�� ".$_GET['��ʼʱ��']." �� ".$_GET['����ʱ��']." �����ϼ�:".$����."�� ���ϼ�:".$�ʲ��ܽ��."Ԫ</td>
";
for($xi=0;$xi<sizeof($�����б�);$xi++)		{
	$�������� = $�����б�[$xi];
	$Index = $���������б�[$��������];
	print "<td nowrap>&nbsp;����:".$�ʲ���Ϣ����DEPT['�ʲ�����'][$��������]." ���:".$�ʲ���Ϣ����DEPT['�ʲ��ܽ��'][$��������]."</td>";
	$���п��ALL += $Index;
}
print "</tr>";
print "</table>";
exit;



 


?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>