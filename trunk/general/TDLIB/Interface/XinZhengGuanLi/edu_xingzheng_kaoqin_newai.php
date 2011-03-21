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
?>