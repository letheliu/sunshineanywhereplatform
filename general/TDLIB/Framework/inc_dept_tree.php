<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


header("Content-Type: text/xml");
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$DEPT_PARENT = $_GET['DEPT_ID'];
$DEPT_PARENT == "" ? $DEPT_PARENT =0 : "" ;
$PARA_URL1 = $_GET['PARA_URL1'];
$PARA_URL2 = $_GET['PARA_URL2'];
$PARA_TARGET = $_GET['PARA_TARGET'];
$DEPT_PARENT = $_GET['DEPT_ID'];
print "<?xml version=\"1.0\" encoding=\"gb2312\"?>\r\n";
print "<TreeNode>\r\n";
//公司名称
if($DEPT_PARENT==0)				{
	$sql = "select UNIT_NAME from unit";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$UNIT_NAME = $rs_a[0]['UNIT_NAME'];
	print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/endnode.gif\"
		href=\"../Interface/Framework/department_newai.php\"
		target=\"edu_main\"
		>\r\n";
}




//得到下面有以及没有有分组的部门信息
$sql = "select DEPT_ID,DEPT_NAME,DEPT_PARENT from department where DEPT_PARENT='$DEPT_PARENT' order by DEPT_PARENT asc ,DEPT_NO asc";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['DEPT_ID'];
	$DEPT_NAME = $rs_a[$i]['DEPT_NAME'];
	$DEPT_PARENT = $rs_a[$i]['DEPT_PARENT'];
	$sql = "select DEPT_ID,DEPT_NAME,DEPT_PARENT from department where DEPT_PARENT='$DEPT_ID' order by DEPT_PARENT asc ,DEPT_NO asc";
	$rs2 = $db->Execute($sql);
	$rs2_a = $rs2->GetArray();
	if($rs2_a[0]['DEPT_ID']!='')				{//下面有子部门
		print "<TreeNode id=\"$DEPT_ID\"
		text=\"".$DEPT_NAME."".$用户数量数组[$DEPT_ID]."\"
		img_src=\"./images/endnode.gif\"
		title=\"$DEPT_NAME\"
		Xml=\"./inc_dept_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=\"
		href=\"../Interface/Framework/department_newai.php?FF=FF&amp;DEPT_PARENT=$DEPT_ID&amp;\"
		target=\"edu_main\"
		/>\r\n";
	}
	else	{//下面没有子部门
		print "<TreeNode id=\"$USER_ID\" text=\"".$DEPT_NAME."\" href=\"../Interface/Framework/department_newai.php?FF=FF&amp;DEPT_ID=$DEPT_ID&amp;action=edit_default&amp;FF=FF\" target=\"edu_main\" img_src=\"images/endnode.gif\" title=\"$DEPT_NAME\"/>\r\n";
	}

}


print "</TreeNode>\r\n";
if($DEPT_PARENT==0)				{
print "</TreeNode>\r\n";
}
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