<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	page_css("MYSQL 性能监控");


	//自动清除七天以前的历史记录
	$sql = "delete from system_logall where datediff(now(),当前时间)>=7";
	$db->Execute($sql);


	$sql = "select DATE_FORMAT(当前时间,'%Y-%m-%d') AS 当前时间
		from system_logall
		group by DATE_FORMAT(当前时间,'%Y-%m-%d')
		order by 当前时间 desc
		";
	$rs = $db->CacheExecute(5,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$当前时间TEXT .= "<a href='?".base64_encode("XX=XX&&当前时间=".$rs_a[$i]['当前时间']."&&XX=XX")."'>".$rs_a[$i]['当前时间']."</a> ";
	}

	if($_GET['当前时间']!='')	$统计时间 = $_GET['当前时间'];
	else						$统计时间 = $rs_a[0]['当前时间'];



	table_begin("100%");
	print "<tr class=TableData ><td>MYSQL 运行情况监控 时间:".$统计时间." $当前时间TEXT
	<input type=\"button\" class=\"SmallButton\" value=\"返回\" onclick=\"location='database_setting.php'\">
	<input type=\"button\" class=\"SmallButton\" value=\"明细\" onclick=\"location='system_logall_newai.php'\">
	</td></tr>";
	table_end();
	print "<BR>";


	table_begin("780");
	print_title("MYSQL 线程运行情况监控[以小时为单位统计] <a href=\"system_logall_mysqlthreads.php?".base64_encode("XX=XX&&统计时间=".$统计时间."&统计单位=秒&XX=XX")."\" target=_blank>查看以秒为单位的统计图</a>");
	print "<tr class=TableData ><td><img src='system_logall_mysqlthreads.php?".base64_encode("XX=XX&&统计时间=".$统计时间."&&XX=XX")."' width=100% border=0></td></tr>";
	print_title("MYSQL 查询缓存运行情况监控[以小时为单位统计] <a href=\"system_logall_querycache.php?".base64_encode("XX=XX&&统计时间=".$统计时间."&统计单位=秒&XX=XX")."\" target=_blank>查看以秒为单位的统计图</a>");
	print "<tr class=TableData ><td><img src='system_logall_querycache.php?".base64_encode("XX=XX&&统计时间=".$统计时间."&&XX=XX")."' width=100% border=0></td></tr>";
	table_end();

?><?
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