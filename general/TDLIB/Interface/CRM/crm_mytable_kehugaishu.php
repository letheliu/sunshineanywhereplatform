<?
ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION = returnsession();
page_css('CRM客户概述');

$user_id = $_SESSION["LOGIN_USER_ID"];
$module_desc = "CRM客户概述";
$module_body = "";

//定义时间变量
$to_sta_date    = date('Y-m-d 0:0:0');
$to_end_date    = date('Y-m-d 23:59:59');
$week_sta_date  = date('Y-m-d 0:0:0',mktime(0,0,0,date('m'),date('d')-7,date('Y')));
$month_sta_date = date('Y-m-d 0:0:0',mktime(0,0,0,date('m')-1,date('d'),date('Y')));
$year_sta_date  = date('Y-m-d 0:0:0',mktime(0,0,0,date('m'),date('d'),date('Y')-1));

$sql_con = "select COUNT(*) AS NUM from crm_customer where 创建人='".$user_id."'";
//echo $sql_con."<br>";
$rs = $db->Execute($sql_con);
$rs_con = $rs->fields['NUM'];

$sql_today = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$to_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_today."<br>";
$rs = $db->Execute($sql_today);
$rs_today = $rs->fields['NUM'];

$sql_week = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$week_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_week."<br>";
$rs = $db->Execute($sql_week);
$rs_week = $rs->fields['NUM'];

$sql_mon = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$month_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_mon."<br>";
$rs = $db->Execute($sql_mon);
$rs_mon = $rs->fields['NUM'];

$sql_year = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$year_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_year."<br>";
$rs = $db->Execute($sql_year);
$rs_year = $rs->fields['NUM'];

$module_body .= "<table border=0 class=TableBlock width=100%>";
$module_body .= "<tr align=\"left\" class=\"TableHeader\">
                 <td colspan=10>&nbsp;<a href=\"crm_customer_person_newai.php\" title=\"CRM客户管理\">".$module_desc."</a></td></tr>";
$module_body .= "<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"crm_customer_person_newai.php?action=init_default&创建人=$user_id\" title=\"全部客户\">客户总量 (&nbsp;".number_format($rs_con,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"crm_customer_person_newai.php?action=init_default&action1=today&创建人=$user_id&date=$to_sta_date\" title=\"今日新增\">今日新增 (&nbsp;".number_format($rs_today,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				<td valign=bottom align=left>
				<img src=\"images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"crm_customer_person_newai.php?action=init_default&action1=week&创建人=$user_id&date=$week_sta_date\" title=\"本周新增\">本周新增 (&nbsp;".number_format($rs_week,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"crm_customer_person_newai.php?action=init_default&action1=month&创建人=$user_id&date=$month_sta_date\" title=\"本月新增\">本月新增 (&nbsp;".number_format($rs_mon,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				<td valign=bottom align=left>
				<img src=\"images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"crm_customer_person_newai.php?action=init_default&action1=year&创建人=$user_id&date=$year_sta_date\" title=\"本年新增\">本年新增 (&nbsp;".number_format($rs_year,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>&nbsp;
				</td>
				</tr>";
$module_body .= "</table>";

echo $module_body;

?>