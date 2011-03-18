<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//header("Content-Type:text/html;charset=gbk");
//######################教育组件-权限较验部分##########################
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-行政考勤-原始打卡");
//######################教育组件-权限较验部分##########################

$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
if($_GET['学期']=="") $_GET['学期'] = $当前学期;


增加对查询日期快捷方式的支持("考勤日期");

if($_GET['action']=="init_default"||$_GET['action']=="")					{
	//print "		<table border=0 class=TableBlock width=100% height=20>		<tr class=TableData><td valign=bottom align=left>该部分数据从考勤机里面提取,数据格式项:教师用户名,教师姓名,考勤日期,刷卡时间.数据导入前,请先<input type=button accesskey=c name=cancel value=\"删除上月考勤数据\" class=SmallButton onClick=\"location='?".base64_encode("action=DeleteCurMonth")."'\" > <BR></td></tr>		</table><BR>		";
}

if($_GET['action']=="DeleteCurMonth")					{
	page_css("考勤数据清理中...");
	$LikeMonth = date("Y-m-",mktime(1,1,1,date("m")-1,date("d"),date("Y")));
	$sql = "delete from edu_teacherkaoqin where 考勤日期 like '$LikeMonth%'";
	$db->Execute($sql);
	//exit;
	print "
		<table border=0 class=TableBlock width=100% height=20>
		<tr class=TableHeader><td valign=bottom align=left>当月考勤信息己经被删除,你可以重新导入该月考勤数据,系统返回中...<BR></td></tr>
		</table><BR>
		";
	EDU_Indextopage('?',$nums='0');
	exit;
}


$filetablename='edu_teacherkaoqin';
require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{
		$PrintText .= "<BR><table class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >
		原始打卡记录：<BR>
&nbsp;&nbsp;①就是行政人员每天上班下班的打卡记录，一般需要一个班次的开始的时候打卡，结束的时候打卡。<BR>
&nbsp;&nbsp;②这一模块需要数字化校园和考勤机连接，具体连接方法参考“行政考勤－》考勤机”模块。
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