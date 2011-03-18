<?

	require_once('lib.inc.php');//



	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-行政考勤-部门级管理");



$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
if($_GET['学期']=="") $_GET['学期'] = $当前学期;




	//班次过滤部分,班次字段必须设为隐藏分组属性--开始
	$LOGIN_USER_NAME = $_SESSION['LOGIN_USER_NAME'];
	$sql = "select 班次名称 from edu_xingzheng_banci where 班次管理一='$LOGIN_USER_NAME' or 班次管理二='$LOGIN_USER_NAME'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$班次名称 = array();
	for($i=0;$i<sizeof($rs_a);$i++)						{
		$Element = $rs_a[$i];
		$班次名称[]  = $Element['班次名称'];
	}
	$班次名称TEXT = join(',',$班次名称);
	if($班次名称TEXT=="")	$班次名称TEXT = "没有所管理的班次信息";
	$_GET['加班班次'] = $班次名称TEXT;
	//班次过滤部分,班次字段必须设为隐藏分组属性--结束
$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
if($_GET['学期']=="") $_GET['学期'] = $当前学期;


	$filetablename='edu_xingzheng_jiabanbuxiu';
	$parse_filename = 'my_bumen_xingzheng_jiabanbuxiu';



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