<?
ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION = returnsession();
page_css('CRM�ͻ�����');

$user_id = $_SESSION["LOGIN_USER_ID"];
$module_desc = "CRM�ͻ�����";
$module_body = "";

//����ʱ�����
$to_sta_date    = date('Y-m-d 0:0:0');
$to_end_date    = date('Y-m-d 23:59:59');
$week_sta_date  = date('Y-m-d 0:0:0',mktime(0,0,0,date('m'),date('d')-7,date('Y')));
$month_sta_date = date('Y-m-d 0:0:0',mktime(0,0,0,date('m')-1,date('d'),date('Y')));
$year_sta_date  = date('Y-m-d 0:0:0',mktime(0,0,0,date('m'),date('d'),date('Y')-1));

$sql_con = "select COUNT(*) AS NUM from crm_customer where ������='".$user_id."'";
//echo $sql_con."<br>";
$rs = $db->CacheExecute(150,$sql_con);
$rs_con = $rs->fields['NUM'];

$sql_today = "select COUNT(*) AS NUM from crm_customer where ������='$user_id' and ����ʱ��>='$to_sta_date' and ����ʱ��<'$to_end_date'";
//echo $sql_today."<br>";
$rs = $db->CacheExecute(150,$sql_today);
$rs_today = $rs->fields['NUM'];

$sql_week = "select COUNT(*) AS NUM from crm_customer where ������='$user_id' and ����ʱ��>='$week_sta_date' and ����ʱ��<'$to_end_date'";
//echo $sql_week."<br>";
$rs = $db->CacheExecute(150,$sql_week);
$rs_week = $rs->fields['NUM'];

$sql_mon = "select COUNT(*) AS NUM from crm_customer where ������='$user_id' and ����ʱ��>='$month_sta_date' and ����ʱ��<'$to_end_date'";
//echo $sql_mon."<br>";
$rs = $db->CacheExecute(150,$sql_mon);
$rs_mon = $rs->fields['NUM'];

$sql_year = "select COUNT(*) AS NUM from crm_customer where ������='$user_id' and ����ʱ��>='$year_sta_date' and ����ʱ��<'$to_end_date'";
//echo $sql_year."<br>";
$rs = $db->CacheExecute(150,$sql_year);
$rs_year = $rs->fields['NUM'];

$module_body .= "<table border=0 class=TableBlock width=100% hight=100%>";
$module_body .= "<tr align=\"left\" class=\"TableHeader\">
                 <td colspan=10>&nbsp;".$module_desc."</td></tr>";
$module_body .= "<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&������=$user_id\" title=\"ȫ���ͻ�\">�ͻ����� (&nbsp;".number_format($rs_con,'','',',')."&nbsp;)&nbsp;��</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=today&������=$user_id&date=$to_sta_date\" title=\"��������\">�������� (&nbsp;".number_format($rs_today,'','',',')."&nbsp;)&nbsp;��</a>
				</td>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=week&������=$user_id&date=$week_sta_date\" title=\"��������\">�������� (&nbsp;".number_format($rs_week,'','',',')."&nbsp;)&nbsp;��</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=month&������=$user_id&date=$month_sta_date\" title=\"��������\">�������� (&nbsp;".number_format($rs_mon,'','',',')."&nbsp;)&nbsp;��</a>
				</td>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=year&������=$user_id&date=$year_sta_date\" title=\"��������\">�������� (&nbsp;".number_format($rs_year,'','',',')."&nbsp;)&nbsp;��</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>&nbsp;
				</td>
				</tr>";
$module_body .= "</table>";

echo $module_body;


/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>