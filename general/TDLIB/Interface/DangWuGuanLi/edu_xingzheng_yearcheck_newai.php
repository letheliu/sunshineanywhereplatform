<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-人员考核-行政人员年度考核量化表");

	if($_GET['action']=="edit_default_data")		{
	//	print_R($_GET);
		//print_R($_POST);
			global $db;
		$学期=$_POST['学期'];$用户名=$_POST['用户名'];

        $品德态度能力自测得分=$_POST['品德态度能力自测得分'];
		$出勤表现自测得分=$_POST['出勤表现自测得分'];
		$工作量自测得分=$_POST['工作量自测得分'];
		$工作纪律自测得分=$_POST['工作纪律自测得分'];
		$工作规范自测得分=$_POST['工作规范自测得分'];
		$工作效果自测得分=$_POST['工作效果自测得分'];
		$班主任工作自测得分=$_POST['班主任工作自测得分'];
		$临时工作自测得分=$_POST['临时工作自测得分'];
		$教研论文及成果自测得分=$_POST['教研论文及成果自测得分'];
		$教学效果自测得分=$_POST['教学效果自测得分'];
		$自测SUM=$品德态度能力自测得分+$出勤表现自测得分+$工作量自测得分+$工作纪律自测得分+$工作规范自测得分+$工作效果自测得分+$班主任工作自测得分+$临时工作自测得分+$教研论文及成果自测得分+$教学效果自测得分;

		$品德态度能力核实得分=$_POST['品德态度能力核实得分'];
		$出勤表现核实得分=$_POST['出勤表现核实得分'];
		$工作量核实得分=$_POST['工作量核实得分'];
		$工作纪律核实得分=$_POST['工作纪律核实得分'];
		$工作规范核实得分=$_POST['工作规范核实得分'];
		$工作效果核实得分=$_POST['工作效果核实得分'];
		$班主任工作核实得分=$_POST['班主任工作核实得分'];
		$临时工作核实得分=$_POST['临时工作核实得分'];
		$教研论文及成果核实得分=$_POST['教研论文及成果核实得分'];
		$教学效果核实得分=$_POST['教学效果核实得分'];
		$核实SUM=$品德态度能力核实得分+$出勤表现核实得分+$工作量核实得分+$工作纪律核实得分+$工作规范核实得分+$工作效果核实得分+$班主任工作核实得分+$临时工作核实得分+$教研论文及成果核实得分+$教学效果核实得分;


		$sql="update edu_xingzheng_yearcheck set 品德态度能力自测得分=$品德态度能力自测得分,出勤表现自测得分=$出勤表现自测得分,工作量自测得分=$工作量自测得分,工作纪律自测得分=$工作纪律自测得分,工作规范自测得分=$工作规范自测得分,工作效果自测得分=$工作效果自测得分,班主任工作自测得分=$班主任工作自测得分,临时工作自测得分=$临时工作自测得分,教研论文及成果自测得分=$教研论文及成果自测得分,教学效果自测得分=$教学效果自测得分,总评自测得分=$自测SUM";
		$sql.=",品德态度能力核实得分=$品德态度能力核实得分,出勤表现核实得分=$出勤表现核实得分,工作量核实得分=$工作量核实得分,工作纪律核实得分=$工作纪律核实得分,工作规范核实得分=$工作规范核实得分,工作效果核实得分=$工作效果核实得分,班主任工作核实得分=$班主任工作核实得分,临时工作核实得分=$临时工作核实得分,教研论文及成果核实得分=$教研论文及成果核实得分,教学效果核实得分=$教学效果核实得分,总评核实得分=$核实SUM";
		$sql.=" where 学期='$学期' and 用户名='$用户名'";
		//print $sql;
    $db->Execute($sql);
		//exit;

	}

	//数据表模型文件,对应Model目录下面的edu_xingzheng_yearcheck_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'edu_xingzheng_yearcheck';
	$parse_filename		=	'edu_xingzheng_yearcheck';
	require_once('include.inc.php');
	if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >备注:本模块通过工作流实现操作,此处仅用于管理工作流生成之后的数据</font></td></table>";
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