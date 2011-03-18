<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();




$filetablename		=	'dict_shoufeibiaozhun';
$parse_filename		=	'dict_shoufeibiaozhun';
require_once('include.inc.php');



if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=red ><B>备注:<BR>
	&nbsp;&nbsp;1、如果删除收费标准名称等信息，会自动删除专业收费标准/学生己缴费等模块的对应信息，请谨慎使用。<BR>
	&nbsp;&nbsp;2、如果你只有一个收费标准，填写'普通'就可以了，如果有两种及以上收费标准，直接增加收费标准名称，增加完成以后在'收费标准设置'里面进行设置具体信息。<BR>&nbsp;&nbsp;3、必须至少存在一个收费标准,且名称设为'普通'。</B></font></td></table>";
	print $PrintText;
}


$sql = "select * from dict_shoufeibiaozhun where 名称='普通'";
$rs = $db->Execute($sql);
if($rs->fields['名称']!="普通")			{
	$sql = "insert into dict_shoufeibiaozhun values('','普通');";
	$db->Execute($sql);
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