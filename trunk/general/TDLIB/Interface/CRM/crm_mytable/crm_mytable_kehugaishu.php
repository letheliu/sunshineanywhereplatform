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
$rs = $db->CacheExecute(150,$sql_con);
$rs_con = $rs->fields['NUM'];

$sql_today = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$to_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_today."<br>";
$rs = $db->CacheExecute(150,$sql_today);
$rs_today = $rs->fields['NUM'];

$sql_week = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$week_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_week."<br>";
$rs = $db->CacheExecute(150,$sql_week);
$rs_week = $rs->fields['NUM'];

$sql_mon = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$month_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_mon."<br>";
$rs = $db->CacheExecute(150,$sql_mon);
$rs_mon = $rs->fields['NUM'];

$sql_year = "select COUNT(*) AS NUM from crm_customer where 创建人='$user_id' and 创建时间>='$year_sta_date' and 创建时间<'$to_end_date'";
//echo $sql_year."<br>";
$rs = $db->CacheExecute(150,$sql_year);
$rs_year = $rs->fields['NUM'];

$module_body .= "<table border=0 class=TableBlock width=100% hight=100%>";
$module_body .= "<tr align=\"left\" class=\"TableHeader\">
                 <td colspan=10>&nbsp;".$module_desc."</td></tr>";
$module_body .= "<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&创建人=$user_id\" title=\"全部客户\">客户总量 (&nbsp;".number_format($rs_con,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=today&创建人=$user_id&date=$to_sta_date\" title=\"今日新增\">今日新增 (&nbsp;".number_format($rs_today,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=week&创建人=$user_id&date=$week_sta_date\" title=\"本周新增\">本周新增 (&nbsp;".number_format($rs_week,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=month&创建人=$user_id&date=$month_sta_date\" title=\"本月新增\">本月新增 (&nbsp;".number_format($rs_mon,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				<td valign=bottom align=left>
				<img src=\"../images/node_user.gif\" align=\"absmiddle\">&nbsp;<a href=\"../crm_customer_person_newai.php?action=init_default&action1=year&创建人=$user_id&date=$year_sta_date\" title=\"本年新增\">本年新增 (&nbsp;".number_format($rs_year,'','',',')."&nbsp;)&nbsp;个</a>
				</td>
				</tr>
				<tr class=TableBlock>
				<td valign=bottom align=left>&nbsp;
				</td>
				</tr>";
$module_body .= "</table>";

echo $module_body;


/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>