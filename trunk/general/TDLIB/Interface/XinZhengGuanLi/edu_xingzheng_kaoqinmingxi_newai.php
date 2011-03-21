<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-行政考勤-考勤数据");
	$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
	if($_GET['学期']=="") $_GET['学期'] = $当前学期;

	增加对查询日期快捷方式的支持("日期");

	$filetablename='edu_xingzheng_kaoqinmingxi';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default')		{
		$PrintText .= "<BR><table class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >
		考勤数据：<BR>
		&nbsp;&nbsp;①就是排班工作完成以后，系统会根据排班信息自动生成相关人员的打卡记录，打卡记录分为：上班实际刷卡、上班考勤状态、下班实际刷卡、下班考勤状态、上班刷卡开始时间、上班刷卡结束时间、下班刷卡开始时间、下班刷卡结束时间、上班迟到时间、迟到分钟数、下班早退时间、早退分钟数等几个信息。
		</font></td></table>";
		print $PrintText;
	}
	?>