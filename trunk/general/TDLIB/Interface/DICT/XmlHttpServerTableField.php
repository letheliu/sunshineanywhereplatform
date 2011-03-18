<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

header("Content-Type:text/html;charset=gbk");
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

global $db;

///*以下为旧版处理方式,新版本从教学计划中获取对应信息
if($_GET['action']=="showdatas"&&$_GET['TableName']!="")
{
	$MetaColumnNames = $db->MetaColumnNames($_GET['TableName']);
	$MetaColumnNames = @array_keys($MetaColumnNames);

	$sql	= "SHOW TABLE STATUS FROM td_edu LIKE '".$_GET['TableName']."%'";
	$rs		= $db->Execute($sql);
	$表备注 = $rs->fields['Comment'];

	print join(',',$MetaColumnNames);
	print ";";
	//您好,您有新的办公用品入库信息,办公用品名称:{办公用品名称},办公用品编号:{办公用品名称编号},入库仓库:{入库仓库},入库数量:{入库数量},经手人:{经手人},批准人:{批准人},备注:{备注},创建人:{创建人},单价:{单价},数量:{数量},金额:{金额}
	$ElementArray = array();
	array_shift($MetaColumnNames);
	for($i=0;$i<sizeof($MetaColumnNames);$i++)			{
		$字段 = $MetaColumnNames[$i];
		$ElementArray[] .= $字段.":{".$字段."}";
	}
	print "您有的新的".$表备注."信息,".join(',',$ElementArray)."";
	exit;
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