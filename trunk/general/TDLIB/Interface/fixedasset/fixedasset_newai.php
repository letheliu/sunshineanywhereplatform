<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-固定资产-全权限管理");

	$common_html=returnsystemlang('common_html');

	if($_GET['action']==""||$_GET['action']=="init_default")		{
		$sql = "update fixedasset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		//$sql = "update fixedasset set 金额=单价*数量";
		//$db->Execute($sql);
	}

	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		$_POST['单价'] = number_format($_POST['单价'], 2, '.', '');

		$编号 = $_GET['编号'];
		$新资产编号 = $_POST['资产编号'];
		$原资产编号 = returntablefield("fixedasset","编号",$编号,"资产编号");;
		$sql = "update fixedassetin set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassetout set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassettui set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassetbaofei set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassettiaoku set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);
		$sql = "update fixedassetweixiu set 资产编号='$新资产编号' where 资产编号='$原资产编号'";
		$db->Execute($sql);

		$sql = "update fixedasset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		$sql = "update fixedasset set 金额=单价*数量";
		$db->Execute($sql);
	}

	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		$_POST['单价'] = number_format($_POST['单价'], 2, '.', '');
	}

	$_GET['所属状态'] = "购置未分配,购置已分配,资产已分配,资产己归还";

	$filetablename='fixedasset';
	require_once('include.inc.php');

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