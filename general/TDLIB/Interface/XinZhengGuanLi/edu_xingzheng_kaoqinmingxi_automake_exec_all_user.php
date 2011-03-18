<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//header("Content-Type:text/html;charset=gbk");
//######################教育组件-权限较验部分##########################
require_once("lib.inc.php");
//
//$GLOBAL_SESSION=returnsession();
//require_once("systemprivateinc.php");
//CheckSystemPrivate("教务管理-日常教学管理-教师考勤");
//######################教育组件-权限较验部分##########################

//$SHOWTEXT = '1';

//杨成辉
$CurXueQi = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");

require_once("lib.xingzheng.inc.php");

function 排班人员List($考勤日期)			{
	global $db;
	//$开始时间 = date("Y-m-d",mktime(1,1,1,date('m'),date('d')-1,date('Y')));
	//$结束时间 = date("Y-m-d",mktime(1,1,1,date('m'),date('d')+14,date('Y')));
	$sql = "select 排班人员 from edu_xingzheng_paiban where 考勤日期='$考勤日期'";
	$rs = $db -> Execute($sql);
	$rs_a = $rs -> GetArray();
	$排班人员数据 = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$排班人员 = $rs_a[$i]['排班人员'];
		$排班人员Array = explode(',',$排班人员);
		for($iX=0;$iX<sizeof($排班人员Array);$iX++)		{
			$排班人员X = $排班人员Array[$iX];
			$排班人员数据[$排班人员X] = $排班人员X;
		}
	}
	$排班人员数据K = @array_keys($排班人员数据);
	//$排班人员 = join(',',$排班人员数据K);
	return $排班人员数据K;
}


$开始时间Array = explode('-',date("Y-m-d"));


//默认180天,初始化,如果超过,则进行跳出
for($i=-1;$i<5;$i++)		{

		$Datetime	= date("Y-m-d",mktime(1,1,1,$开始时间Array[1],$开始时间Array[2] + $i,$开始时间Array[0]));
		//print "<BR>开始处理当前教师数据:###############<BR>";
		$排班人员数据K = 排班人员List($Datetime);
		for($iX=0;$iX<sizeof($排班人员数据K);$iX++)		{
			$人员用户名 = $排班人员数据K[$iX];
			$行政人员 = returntablefield("user","USER_ID",$人员用户名,"USER_NAME");
			执行插入某人某天考勤信息($CurXueQi,$行政人员,$人员用户名,$Datetime);
			同步某人某天考勤机数据到考勤明细表($行政人员,$人员用户名,$Datetime);
		}
		global $SHOWTEXT; if($SHOWTEXT)		print "<BR><BR><font color=red><B>处理".$行政人员."教师日期:".$Datetime."</B></font><BR>";
}

$当天时间 = date("Y-m-d");
$sql = "update `edu_xingzheng_kaoqinmingxi` set 上班实际刷卡='上班缺打卡',上班考勤状态  ='上班缺打卡' where 上班实际刷卡='' and 上班考勤状态  ='' and 日期<'$当天时间'";
$db->Execute($sql);
$sql = "update `edu_xingzheng_kaoqinmingxi` set 下班实际刷卡='下班缺打卡',下班考勤状态  ='下班缺打卡' where 下班实际刷卡='' and 下班考勤状态  ='' and 日期<'$当天时间'";
$db->Execute($sql);
global $SHOWTEXT; if($SHOWTEXT)		print "<BR><font color=red>*******:$sql <BR></font>";

处理迟到早退分钟数数据();

//print_R($_GET);
$sql = "update TD_OA.office_task set LAST_EXEC='".date( "Y-m-d" )."',EXEC_TIME='".date( "H:i:s" )."' where TASK_CODE = 'XINGZHENG_KAOQIN'";
$db->Execute($sql);


print "+OK";




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