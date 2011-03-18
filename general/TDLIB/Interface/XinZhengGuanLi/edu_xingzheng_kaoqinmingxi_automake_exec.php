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
//CheckSystemPrivate("教务管理-日常教学管理-教师考勤");
//######################教育组件-权限较验部分##########################


$CurXueQi = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");


$_GET['行政人员'] = $_SESSION['LOGIN_USER_NAME'];
$人员用户名  = $_SESSION['LOGIN_USER_ID'];
$_REQUEST['开始时间'] = date("Y-m-d");

if($_GET['行政人员']=='')	{print "没有初始化人员的姓名信息";exit;}

$SHOWTEXT = "1";

page_css("初始化调整");

require_once("lib.xingzheng.inc.php");
//XiaoLiArray();

//调班时间按时间进行批量执行


//print_R($_REQUEST);
$开始时间 = $_REQUEST['开始时间'];
$结束时间 = $_REQUEST['结束时间'];
$开始时间Array = explode('-',$开始时间);
$结束时间Array = explode('-',$结束时间);
$行政人员 = $_GET['行政人员'];


//默认180天,初始化,如果超过,则进行跳出
for($i=-1;$i<14;$i++)		{

		$Datetime	= date("Y-m-d",mktime(1,1,1,$开始时间Array[1],$开始时间Array[2] + $i,$开始时间Array[0]));
		$最迟填写时间 = date("Y-m-d",mktime(1,1,1,$开始时间Array[1],$开始时间Array[2] + $i + 10,$开始时间Array[0]));
		$当天时间 = date("Y-m-d");

		//print "<BR>开始处理当前教师数据:###############<BR>";
		执行插入某人某天考勤信息($CurXueQi,$行政人员,$人员用户名,$Datetime);
		同步某人某天考勤机数据到考勤明细表($行政人员,$人员用户名,$Datetime);
		//print "<font color=green>处理".$_REQUEST['行政人员']."教师日期:".$Datetime."</font><BR>";
		//初始化教学日记
		//$sql = "update edu_xingzheng_kaoqinmingxi set 最迟填写时间 = '$最迟填写时间' where 人员='".$行政人员."' and 考勤日期='$Datetime'";
		//$db->Execute($sql);
		$sql = "update `edu_xingzheng_kaoqinmingxi` set 上班实际刷卡='上班缺打卡',上班考勤状态  ='上班缺打卡' where 上班实际刷卡='' and 上班考勤状态  ='' and 人员用户名='".$人员用户名."' and 日期<'$当天时间'";
		$db->Execute($sql);
		$sql = "update `edu_xingzheng_kaoqinmingxi` set 下班实际刷卡='下班缺打卡',下班考勤状态  ='下班缺打卡' where 下班实际刷卡='' and 下班考勤状态  ='' and 人员用户名='".$人员用户名."' and 日期<'$当天时间'";
		$db->Execute($sql);
		if($SHOWTEXT) print "<BR><font color=red>*******:$sql <BR></font>";
}

处理迟到早退分钟数数据();






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