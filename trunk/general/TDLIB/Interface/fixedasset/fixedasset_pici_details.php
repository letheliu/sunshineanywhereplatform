<?php
	require_once("lib.inc.php");
	
	$GLOBAL_SESSION=returnsession();

	$common_html=returnsystemlang('common_html');
	$_GET['action']=checkreadaction('init_customer');
	
	if($_GET['action']=="")		{
		$sql = "update fixedasset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		$sql = "update fixedasset set 金额=单价*数量";
		$db->Execute($sql);
	}

	$_GET['所属状态'] = "购置未分配,购置已分配,资产已分配,资产己归还";//资产己报废
	$_GET['searchfield'] = '资产批次';
	$_GET['searchvalue'] = $_GET['资产批次'];
	$_GET['action'] = 'init_customer_search';
	
	

	//$NEWAIINIT_VALUE_SYSTEM = "select `编号`,`资产编号`,`资产名称`,`资产批次`,`规格型号`,`所属状态`,`单位`,`数量`,`单价`,`金额`,`发票号码`,`所属部门`,`使用人员`,`购买日期`,`资产类别`,`凭证号码`,`存放地点`,`备注`,`创建人`,`创建时间` from fixedasset where (`所属状态`='购置未分配' or `所属状态`='购置已分配' or `所属状态`='资产已分配' or `所属状态`='资产己归还') order by 编号 desc";
	//$NEWAIINIT_VALUE_SYSTEM_NUM = "select count(`编号`) as num from fixedasset where (`所属状态`='购置未分配' or `所属状态`='购置已分配' or `所属状态`='资产已分配' or `所属状态`='资产己归还')";
	//print_R($_GET);

	$filetablename='fixedasset';
	$parse_filename = "fixedasset_pici_details";
	
	//$_GET['action']  = 'init_customer';
	require_once('include.inc.php');
	print "<BR>";
	print_close();
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