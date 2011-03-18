<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-固定资产-部门级管理");

	$common_html=returnsystemlang('common_html');

	if($_GET['action']=="")		{
		$sql = "update fixedasset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		$sql = "update fixedasset set 金额=单价*数量";
		$db->Execute($sql);
	}



	//###########################################
	//较验分部门管理权限部分
	//###########################################
	$SCRIPT_NAME	= "fixedasset_newai.php";
	$LOGIN_USER_ID		= $_SESSION['LOGIN_USER_ID'];
	$sql = "select * from systemprivateinc where `FILE`='$SCRIPT_NAME' and USER_ID like '%".$LOGIN_USER_ID.",%'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$MODULE_ARRAY = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$MODULE_ARRAY[] = $rs_a[$i]['MODULE'];
	}
	$MODULE_TEXT = join(',',$MODULE_ARRAY);
	if($MODULE_TEXT=="")  $MODULE_TEXT = "未指定部门信息";
	//if($_GET['action']==""||$_GET['action']=="init_default")
	$_GET['所属部门'] = $MODULE_TEXT;

	$_GET['所属状态'] = "购置未分配,购置已分配,资产已分配,资产己归还";

	$filetablename='fixedasset';
	$parse_filename = 'fixedasset_department';
	require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
固定资产部门级管理：<BR>
&nbsp;&nbsp;1、权限说明:你只能管理你所属部门的固定资产信息。<BR>
&nbsp;&nbsp;2、使用分配:管理员可以在固定资产管理中设置资产的所属部门,然后在固定资产部分权限管理菜单中分配哪个用户可以管理哪个部门的资产。<BR>

</font></td></table>";
	print $PrintText;
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