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



$TextHeader = "客户关系按部门管理权限设置";
$PHP_SELF = "crm_customer_newai.php";


$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$PHP_SELF_SELF = array_pop($PHP_SELF_ARRAY);

page_css($TextHeader);
table_begin("100%");
print "<tr class=TableHeader><td colspan=5>&nbsp;".$TextHeader."</td></tr>";
print "<tr class=TableHeader><td>&nbsp;所属部门</td><td>&nbsp;编辑权限</td><td>&nbsp;管理人员</td></tr>";

for($i=0;$i<sizeof($rsX_a);$i++)			{
	$部门名称  = $rsX_a[$i]['DEPT_NAME'];
	$sql = "select * from systemprivateinc where MODULE='".$部门名称."' and FILE='$PHP_SELF'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if($部门名称!="")			{
		print "<tr class=TableData><td>&nbsp;".$部门名称."</td><td>&nbsp;<a href=\"inc_crm_priv_set_user.php?".base64_encode("FileNameSELF=".$PHP_SELF_SELF."&FileName=".$PHP_SELF."&ModuleName=".$部门名称."")."\">编辑权限</a></td>
			<td>&nbsp;".$rs_a[0]['USER_NAME']."</td>
			</tr>";
	}
}
table_end();
print "<BR>";
table_begin("100%");	
print "<tr class=TableHeader><td>事项说明:</td></tr>";
print "<tr class=TableData><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;每一个访问模块(子菜单)中,可管理人员为空时,表示此模块只有查看权限,OA管理员角色拥有所有权限.</td></tr>";
table_end();
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>