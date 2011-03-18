<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//header("Content-Type:text/html;charset=gbk");
//######################教育组件-权限较验部分##########################
require_once("lib.inc.php");
require_once("lib.xingzheng.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
//CheckSystemPrivate("教务管理-日常教学管理-教师考勤");
//######################教育组件-权限较验部分##########################


//作用:只用于同步考勤机数据到edu_teacherkaoqin表,注:己经在教师考勤中实现,此处属于备份使用
//2010-2-26修改

$CurXueQi = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");

$考勤数据表名称 = "as_record";
$考勤表_用户标识字段 = "CustomerID";
$考勤表_刷卡时间字段 = "OpDT";
$考勤表_主EKY = "ID";
$考勤表_考勤机ID值 = "TermID";




/*

TRUNCATE TABLE `edu_xingzheng_kaoqinmingxi` ;
TRUNCATE TABLE `edu_teacherkaoqin` ;

*/

//得到现有MYSQL里面最近一次考勤记录ID的值
$sql = "select max(考勤机ID值) AS 编号 from edu_teacherkaoqin";
$rs = $db->Execute($sql);
$最近一次考勤记录ID的值 = $rs->fields['编号'];
if($最近一次考勤记录ID的值>0)		 $AddSqlKaoQinJiText = "where $考勤表_主EKY>'$最近一次考勤记录ID的值'";
else	$AddSqlKaoQinJiText = "";





//#######################################################################################
//使用MSSQL数据连接部分代码-开始
//#######################################################################################

require_once('../../config_mssql_teacherkaoqin.php');
//$conn=mssql_connect($MS_localhost,$MS_userdb_name,$MS_userdb_pwd) or die("FAILED!") ;
//exit;
if($MS_userdb=="KQXT"&&$MS_userdb_name=="sa"&&$MS_userdb_pwd=="sa")		{
	page_css("自动检测是否安装MSSQL数据库信息");
	print_infor("您的服务器没有检测到考勤机SQL SERVER数据库信息,请确认装有指定型号的考勤机类型和数据库后再进行读取考勤信息操作",'?',"location='?'");
	exit;
}
require_once('../../adodb/adodb.inc.php');
$msdb =&ADONewConnection('odbc_mssql');
$dsn = "Driver={SQL Server};Server=$MS_localhost;Database=$MS_userdb;";
$msdb->Connect($dsn,$MS_userdb_name,$MS_userdb_pwd) or die("SQL SERVER连接失败,请确认以下信息是否正确.主机:$MS_localhost 数据名:$MS_userdb 登录用户:$MS_userdb_name 密码:$MS_userdb_pwd");
//MS下面定义的函数
function returnTableFieldMS($tablename,$what,$value,$return)		{
	global $msdb;
	$sql="select $return from $tablename where $what='$value'";//print $sql."<BR>";//exit;
	$msdbRS=$msdb->Execute($sql);
	return trim($msdbRS->fields[$return]);
}


//#######################################################################################
//#######################################################################################
//#######################################################################################
//从考勤机同步数据
page_css("从考勤机同步数据-行政人员打卡考勤");

if($_GET['action']=="")					{

print "
<BR><form name=form2 method=post action='?action=DataDeal'>
<table class=TableBlock align=center width=100% >
<TR class=TableHeader ><TD noWrap colspan=5>从考勤机同步数据-行政人员打卡考勤</td></tr>
";

$sql="select count($考勤表_主EKY) AS NUM from $考勤数据表名称 $AddSqlKaoQinJiText ";//print $sql."<BR>";exit;
$msdbRS=$msdb->Execute($sql);
$msdbRSA = $msdbRS->GetArray();
$现有考勤机未处理考勤数据 = $msdbRSA[0]['NUM'];
if($现有考勤机未处理考勤数据==0)		{
	$现有考勤机未处理考勤数据ReadOnly = "disabled";
	$现有考勤机未处理考勤数据Text = "<font color=red>己经是最新的考勤数据,最确定考勤机里面有最新的考勤数据</font>";
}
print "<TR class=TableData height=30>
	<TD noWrap align=left>
	&nbsp;现有考勤机未处理考勤数据:&nbsp;<font color=red><B>$现有考勤机未处理考勤数据</B></font>&nbsp;条
	<input type=hidden class=BigButton name=action value='DATESEARCH'>
	<input type=submit class=BigButton name=submit $现有考勤机未处理考勤数据ReadOnly value='开始同步考勤数据'>&nbsp;&nbsp;$现有考勤机未处理考勤数据Text
	</td></tr>";
print "<TR class=TableData colspan=5>
	<TD noWrap align=left>&nbsp;最近一次考勤记录ID的值:$最近一次考勤记录ID的值</td>";
print "</table></form><BR>";

exit;

}


if($_GET['action']=="DataDeal")					{

if($最近一次考勤记录ID的值>0)		 $AddSqlKaoQinJiText = "where $考勤表_主EKY>'$最近一次考勤记录ID的值'";
else	$AddSqlKaoQinJiText = "";

//读取出有用的数据,并删除,保留暂时没有用的无效数据
$sql = "select * from $考勤数据表名称 $AddSqlKaoQinJiText order by $考勤表_主EKY asc";
$msdbRS = $msdb->SelectLimit($sql,6000);
$msdbRSA = $msdbRS->GetArray();
$TempArray = array();

//以下代码原本在MANANGE里面加入,后加入本页面,用于修正最后一个显示数据正确的问题
//print_R($msdbRSA);
//自动处理考勤数据
for($i=0;$i<sizeof($msdbRSA);$i++)				{
	$卡号 = $msdbRSA[$i][$考勤表_用户标识字段];;
	$卡号 = returnTableFieldMS("Customer","CustomerID",$卡号,"OutID");
	$sou_jh = $msdbRSA[$i][$考勤表_用户标识字段];;
	$sou_date = $msdbRSA[$i][$考勤表_刷卡时间字段];
	$sou_date_Array = explode(' ',$sou_date);
	$考勤机ID值 = $msdbRSA[$i][$考勤表_考勤机ID值];
	$考勤机记录最大ID值 = $msdbRSA[$i][$考勤表_主EKY];
	$用户名		= returntablefield("user","BYNAME",$卡号,"USER_ID");
	$教师姓名   = returntablefield("user","BYNAME",$卡号,"USER_NAME");
	$考勤日期 = $sou_date_Array[0];
	$考勤时间 = $sou_date_Array[1];


	$考勤时间Array = explode(':',$考勤时间);
	array_pop($考勤时间Array);
	$考勤时间 = join(":",$考勤时间Array);
	//$刷卡时间 = $DateTime;
	//print_R($msdbRSA);
	if($用户名!="")				{
		$DealTimeJieCiShangKe = DealTimeJieCiShangKe($教师姓名,$考勤日期,$考勤时间);
		$DealTimeJieCiXiaKe = DealTimeJieCiXiaKe($教师姓名,$考勤日期,$考勤时间);
		$InsertData++;
		$考勤机位置		= returnTableFieldMS("Base_Term","TermID",$考勤机ID值,"TermName");
		$考勤机IP		= returnTableFieldMS("Base_Term","TermID",$考勤机ID值,"TermAddr");
		//###############################################################################
		//把考勤数据同步到MYSQL数据库中去
		$sql = "insert into edu_teacherkaoqin values('','$用户名','$教师姓名','$考勤日期','$考勤时间','$考勤机记录最大ID值','$考勤机位置','$考勤机IP')";
		$db->Execute($sql);
		//print "$i - $InsertData - $考勤机ID值 - ".$msdbRSA[$i]['ID']." - ".$sql."<BR>";
		if($DealTimeJieCiShangKe!="")	{
			print "<font color=green>$i - ".$DealTimeJieCiShangKe."</font>";;;
		}
		if($DealTimeJieCiXiaKe!="")	{
			print "<font color=green>$i - ".$DealTimeJieCiXiaKe."</font>";;;
		}
		//if($i>3000)exit;
	//###################################################################################
		//print "<font color=green>卡号:$卡号 为有效卡号,成功匹配教师表中数据 $教师姓名 $考勤日期 $考勤时间 </font><BR>";
	}
	else	{
		//此卡号为无效卡号
		//print "<font color=red>卡号:$卡号 为无效卡号,无法在用户表中对应教师信息.<BR>";
		$InsertData2++;
	}
	//print $sql."<BR>";
	//$sql = "insert into edu_studentjiesong values('','$卡号','$教师姓名','$姓名','$班号','$类型','$接送人','$接送时间','$监护人相片','$sou_jh');";
	//print $sql;print "<HR>";exit;
	//if($教师姓名!=""&&$卡号!="")$db->Execute($sql);
}
//print_R($msdbRSA);
$Text = "处理数据结果明细: 成功匹配教师考勤数据:".(int)$InsertData."条,非教师考勤数据:".(int)$InsertData2."条";
$DateMonth = substr($考勤日期,0,7);
//print_nouploadfile($Text,"location='?'");
print "<style type='text/css'>
	.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
</style>
<BODY class=bodycolor topMargin=5 >
<BR>
<table width='450'  border='0' align='center' cellpadding='0' cellspacing='0' class='small' style='border:1px solid #006699;'>
<tr>
<td height='80' valign=middle align='middle' colspan=2  bgcolor='#E0F2FC'>
<font color=red >$Text<BR><BR><input type=button accesskey='c' name='cancel' value=' 返 回 ' class=BigButton onClick=\"location='edu_xingzheng_kaoqinmingxi_automake.php'\" title='快捷键:ALT+c'></font>
</td>
</tr>
<tr>
</table>";

处理迟到早退分钟数数据();


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