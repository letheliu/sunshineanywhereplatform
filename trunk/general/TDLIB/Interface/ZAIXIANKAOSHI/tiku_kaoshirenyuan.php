<?
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();
/*
select BJMC,XH,BZ,XM,SFLX,CZRQ,SSHJ,
SFXM01,SFXM02,SFXM03,SFXM04,SFXM05,SFXM06,SFXM07,SFXM08,SFXM09,SFXM10,
SFXM01+SFXM02+SFXM03+SFXM04+SFXM05+SFXM06+SFXM07+SFXM08+SFXM09+SFXM10 as ��ѧ�꽻��
from yhsjb
where XH='20053021223' and XN='2005-2006' order by XN
*/
$�������� = $_GET['��������'];
$��� = $_GET['���'];

page_css("�ο���Ա�嵥");

if($��������!=""&&$���!="")										{

$sql = "select * from tiku_kaoshi where ���='$���'";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$�μӿ��԰༶ = $rs_a[0]['�μӿ��԰༶'];
$�μӿ�����Ա = $rs_a[0]['�μӿ�����Ա'];
$�ų��ο���Ա = $rs_a[0]['�ų��ο���Ա'];
$�������� = $rs_a[0]['��������'];
$�����ص� = $rs_a[0]['�����ص�'];
//print_R($rs_a);

$sql = "select * from edu_student where ���='$�μӿ��԰༶'";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();


table_begin("100%");
print_title("�ο���Ա����: [��������:$�������� ��������:$�������� �����ص�:$�����ص�]",4);
print "<tr class=TableHeader><td>ѧ��</td><td>����</td><td>ѧ��</td><td>����</td></tr>";

for($i=0;$i<sizeof($rs_a);$i++)			{
	if($i%2==0)		print "<tr class=TableData>";
	$ѧ�� = $rs_a[$i]['ѧ��'];
	$���� = $rs_a[$i]['����'];
	$ѧ��2 = $rs_a[$i+1]['ѧ��'];
	$����2 = $rs_a[$i+1]['����'];
	print "<td>".($i+1)." $ѧ��</td><td>$����</td>";
}
if($i%2==1)		print "<td>&nbsp;</td><td>&nbsp;</td>";
table_end();

print "<BR><div align=center><input type=button accesskey=p name=print value=\" ��ӡ \" class=SmallButton onClick=\"document.execCommand('Print');\" title=\"��ݼ�:ALT+p\">
<input type=button accesskey=c name=cancel value=\" �ر� \" class=SmallButton onClick=\"window.close();\" title=\"��ݼ�:ALT+c\"></div>";
exit;
}
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>