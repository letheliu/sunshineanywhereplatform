<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

$每月短信配额 = "50";

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$当前时间 = date("Y-m-d");
	$sql = "select USER_ID,USER_NAME from TD_OA.user";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)								{
		$USER_ID	= $rs_a[$i]['USER_ID'];
		$USER_NAME	= $rs_a[$i]['USER_NAME'];
		$sql = "select COUNT(*) AS NUM from edu_userinfo where 用户名='$USER_ID'";
		$rs  = $db->Execute($sql);
		$NUM = $rs->fields['NUM'];
		if($NUM==0&&$USER_ID!='')		{
			$操作时间 = date("Y-m-d H:i:s");
			$sql = "insert into edu_userinfo values('','$USER_ID','$USER_NAME','','$每月短信配额','$操作时间');";
			$db->Execute($sql);
		}
		else		{
			$sql = "update edu_userinfo set 姓名='$USER_NAME' where 用户名='$USER_ID'";
			$db->Execute($sql);
		}
		//print $sql."<BR>";
	}
}


//数据表模型文件,对应Model目录下面的edu_userinfo_newai.ini文件
//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
$filetablename		=	'edu_userinfo';
$parse_filename		=	'edu_userinfo';
require_once('include.inc.php');


if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
	备注:此部分由班主任(辅导员)进行管理,自己所管理班级的学生在学生登录界面查看自己的班级通知.</font></td></table>";
	//print $PrintText;
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