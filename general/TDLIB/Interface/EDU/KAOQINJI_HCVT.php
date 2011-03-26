<?

$考勤数据表名称 = "T_CheckLog";
$考勤表_用户标识字段 = "UserID";
$考勤表_刷卡时间字段Date = "CheckDate";
$考勤表_刷卡时间字段Time = "CheckTime";
$考勤表_主EKY = "ID";
$考勤表_考勤机ID值 = "TermID";

require_once('../../config_mssql_teacherkaoqin.php');
//$conn=mssql_connect($MS_localhost,$MS_userdb_name,$MS_userdb_pwd) or die("FAILED!") ;
//exit;
if($MS_userdb!="EGuard"&&$MS_userdb_name!="sa")		{
	page_css("自动检测是否安装MSSQL数据库信息");
	print_infor("您的服务器没有检测到考勤机SQL SERVER数据库信息,请确认装有指定型号的考勤机类型和数据库后再进行读取考勤信息操作,用户 名和密码配置不正确",'?',"location='?'");
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

if($最近一次考勤记录ID的值>0)		 $AddSqlKaoQinJiText = "where $考勤表_主EKY>'$最近一次考勤记录ID的值'";
else	$AddSqlKaoQinJiText = "where $考勤表_主EKY>'87750'";

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



//读取出有用的数据,并删除,保留暂时没有用的无效数据
$sql = "select * from $考勤数据表名称 $AddSqlKaoQinJiText order by $考勤表_主EKY asc";
$msdbRS = $msdb->SelectLimit($sql,600);
$msdbRSA = $msdbRS->GetArray();
$TempArray = array();

//以下代码原本在MANANGE里面加入,后加入本页面,用于修正最后一个显示数据正确的问题
//print_R($msdbRSA);
//自动处理考勤数据
for($i=0;$i<sizeof($msdbRSA);$i++)				{
	$卡号 = $msdbRSA[$i][$考勤表_用户标识字段];;
	//$卡号 = returnTableFieldMS("Customer","CustomerID",$卡号,"OutID");
	$sou_jh		= $msdbRSA[$i][$考勤表_用户标识字段];;
	$sou_date	= $msdbRSA[$i][$考勤表_刷卡时间字段Date];
	$sou_time	= $msdbRSA[$i][$考勤表_刷卡时间字段Time];

	$考勤机ID值 = $msdbRSA[$i][$考勤表_考勤机ID值];
	$考勤机记录最大ID值 = $msdbRSA[$i][$考勤表_主EKY];
	$用户信息	= returntablefield("TD_OA.user","BYNAME",$卡号,"USER_ID,USER_NAME");
	$用户名		= $用户信息['USER_ID'];
	$教师姓名	= $用户信息['USER_NAME'];
	//print $卡号;
	//取到符合要求的日期和时间
	$考勤日期 = substr($sou_date,0,11);
	$考勤时间 = substr($sou_time,11,8);


	//把时间格式化为小时和分钟用于数据库里面数据的判断
	$考勤时间Array = explode(':',$考勤时间);
	array_pop($考勤时间Array);
	$考勤时间 = join(":",$考勤时间Array);
	//print $考勤日期.$考勤时间;exit;
	//$刷卡时间 = $DateTime;
	//print_R($msdbRSA);
	if($用户名!="")				{
		$DealTimeJieCiShangKe	= DealTimeJieCiShangKe($教师姓名,$用户名,$考勤日期,$考勤时间);
		$DealTimeJieCiXiaKe		= DealTimeJieCiXiaKe($教师姓名,$用户名,$考勤日期,$考勤时间);
		$InsertData++;
		//$考勤机位置		= returnTableFieldMS("Base_Term","TermID",$考勤机ID值,"TermName");
		//$考勤机IP			= returnTableFieldMS("Base_Term","TermID",$考勤机ID值,"TermAddr");
		$考勤机位置			= $msdbRSA[$i]['Address'];;
		$考勤机IP			= "";
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

//处理迟到早退分钟数数据();


exit;
}


?>