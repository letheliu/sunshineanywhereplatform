<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css("CRM客户查询");

$module_desc = "CRM客户查询";
$module_body = "";
$module_body .= "<table border=0 class=TableBlock width=100% hight=100%>";
$module_body .= "<tr align=\"left\" class=\"TableHeader\"><td colspan=10>&nbsp;".$module_desc."</td></tr>";
$module_body .= "<form action=\"../crm_customer_person_newai.php\" name=\"form1\" method=\"get\">";
$module_body .= "<tr class=TableBlock>
				<td valign=Middle align=left>&nbsp;客户名称：<input type=\"text\" name=\"searchvalue\" class=\"SmallInput\" size=\"26.5\" maxlength=\"25\"></td></tr>";
$module_body .= "<tr class=TableBlock>
				<td valign=Middle align=left>
					<input type=hidden name='action' value='init_default_search'>
					<input type=hidden name='searchfield' value='客户名称'>
					&nbsp;客户类型：<select name=\"客户类型\" class=\"SmallSelect\" style=\"width:128pt\">
				                <option value=\"\" selected></option>";
								$sql = "select 名称 from crm_customer_type order by 名称";
								$rs = $db->CacheExecute(150,$sql);
								$rs_a = $rs->GetArray();
								for($i=0;$i<sizeof($rs_a);$i++)			{
                                   $module_body .= "<option value=".$rs_a[$i]['名称'].">".$rs_a[$i]['名称']."</option>";
								}
				$module_body .= "</select></td></tr>";
$module_body .= "<tr class=TableBlock>
				<td valign=Middle align=left>&nbsp;&nbsp;<input type=\"submit\" value=\"查询\" class=\"SmallButton\" title=\"模糊查询\" name=\"button\">&nbsp;<input type=\"reset\" value=\"清空\" class=\"SmallButton\" title=\"清空数据\" name=\"button1\">
			    </td></tr>";
$module_body .= "<tr class=TableBlock><td valign=Middle align=left>&nbsp;</td></tr>";
$module_body .= "</form>";
$module_body .= "</table>";

echo $module_body;

?>

<?
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
