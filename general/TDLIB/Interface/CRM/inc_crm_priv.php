<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$sql = "select distinct DEPT_NAME  from department order by DEPT_NO";
$rs = $db->Execute($sql);
$rsX_a = $rs->GetArray();



$TextHeader = "�ͻ���ϵ�����Ź���Ȩ������";
$PHP_SELF = "crm_customer_newai.php";


$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$PHP_SELF_SELF = array_pop($PHP_SELF_ARRAY);

page_css($TextHeader);
table_begin("100%");
print "<tr class=TableHeader><td colspan=5>&nbsp;".$TextHeader."</td></tr>";
print "<tr class=TableHeader><td>&nbsp;��������</td><td>&nbsp;�༭Ȩ��</td><td>&nbsp;������Ա</td></tr>";

for($i=0;$i<sizeof($rsX_a);$i++)			{
	$��������  = $rsX_a[$i]['DEPT_NAME'];
	$sql = "select * from systemprivateinc where MODULE='".$��������."' and FILE='$PHP_SELF'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if($��������!="")			{
		print "<tr class=TableData><td>&nbsp;".$��������."</td><td>&nbsp;<a href=\"inc_crm_priv_set_user.php?".base64_encode("FileNameSELF=".$PHP_SELF_SELF."&FileName=".$PHP_SELF."&ModuleName=".$��������."")."\">�༭Ȩ��</a></td>
			<td>&nbsp;".$rs_a[0]['USER_NAME']."</td>
			</tr>";
	}
}
table_end();
print "<BR>";
table_begin("100%");	
print "<tr class=TableHeader><td>����˵��:</td></tr>";
print "<tr class=TableData><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ÿһ������ģ��(�Ӳ˵�)��,�ɹ�����ԱΪ��ʱ,��ʾ��ģ��ֻ�в鿴Ȩ��,OA����Ա��ɫӵ������Ȩ��.</td></tr>";
table_end();
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