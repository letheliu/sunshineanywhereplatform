<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("学生管理-综合事务-党员","人力资源-党员管理-民主评议党员登记表");

	if($_GET['action']=="view_default"){
	header( "Location:   edu_dangyuan_dayin.php?编号=".$_GET['编号']."");
	}

	$filetablename		=	'edu_dangyuan_work_check_register';
	$parse_filename		=	'edu_dangyuan_work_check_register';
	require_once('include.inc.php');

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
	&nbsp;&nbsp;备注：本模块通过工作流实现操作，此处仅用于管理工作流生成之后的数据。<BR>
	&nbsp;&nbsp;关键性概念说明：<BR>
&nbsp;&nbsp;①本模块的党员管理主要用于管理教师籍和行政人员所属党员信息的管理，不同于学生管理里面党员只用于管理在校学生的设计。<BR>
&nbsp;&nbsp;②本模块除了管理党员、党费、党活动情况之外，重点对党员的年度信息进行量化考核和党员的民主评议进行登记管理。<BR>
&nbsp;&nbsp;③党员年度量化考核是由党员本身发起的工作流，先由自己对自己进行评分，后由党小组负责人，党员支部书记，党委书记进行评分，最后汇总入数字化校园的数据库，形成可以进行汇总和统计的结构化数据。<BR>
&nbsp;&nbsp;④民主评议党员登记表是由党员本身发起的工作流，先由党员本身填写一些信息，后由党小组负责人，党员支部书记，党委书记进行评价，最后汇总入数字化校园的数据库，形成可以进行汇总和统计的结构化数据。</font></td></table>";
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