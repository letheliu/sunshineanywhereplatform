<?
//#######################################################################################
//同步集美原有财务系统到数字化校园之中 原有财务是福建省统一下发使用的财务单机版本软件
//#######################################################################################


require_once('lib.inc.php');

//编号  学号  姓名  班级  缴费金额  缴费时间  缴费年份  发票编号  发票验证码  判断编号  缴费明细
//同步MYSQL财务数据
$sql = "select * from edu_caiwutemp where 判断编号!='1' order by 编号";
$rs = $db->SelectLimit($sql,300);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$编号		= $rs_a[$i]['编号'];;
	$学号		= $rs_a[$i]['学号'];;
	$姓名		= $rs_a[$i]['姓名'];;
	$班级		= $rs_a[$i]['班级'];;
	$缴费金额		= $rs_a[$i]['缴费金额'];;
	$缴费时间		= $rs_a[$i]['缴费时间'];;
	$缴费年份		= $rs_a[$i]['缴费年份'];;
	$发票编号		= $rs_a[$i]['发票编号'];;
	$发票验证码		= $rs_a[$i]['发票验证码'];;
	$判断编号		= $rs_a[$i]['判断编号'];;
	$缴费明细		= $rs_a[$i]['缴费明细'];;
	$专业代码 = returntablefield("edu_banji","班级名称",$班级,"所属专业");
	$专业名称 = returntablefield("edu_zhuanye","专业代码",$专业代码,"专业名称");
	学生批量缴费自动扣款函数($学号,$姓名,$班级,$专业名称,$缴费年份,$缴费金额,$发票编号,$缴费时间,$发票验证码);
	$sql = "update edu_caiwutemp set 判断编号='1' where 编号='$编号'";
	$db->Execute($sql);
	print $sql."<BR>";

}




//#######################################################################################
//使用MSSQL数据连接部分代码-开始
//#######################################################################################

$MS_localhost	= "10.105.140.83";
$MS_userdb_name = "cwk";
$MS_userdb_pwd	= "heartsea0038";
$MS_userdb		= "BS_2010";


//同步MSSQL数据库数据
require_once('../../adodb/adodb.inc.php');
$msdb =&ADONewConnection('odbc_mssql');
$dsn = "Driver={SQL Server};Server=$MS_localhost;Database=$MS_userdb;";
$msdb->Connect($dsn,$MS_userdb_name,$MS_userdb_pwd) or die("SQL SERVER连接失败,请确认以下信息是否正确.主机:$MS_localhost 数据名:$MS_userdb 登录用户:$MS_userdb_name 密码:$MS_userdb_pwd");
$MetaTables = $msdb->MetaTables();
//print_R($MetaTables);//exit;

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
page_css("同步数据");

if(1)					{
$sql = "select max(编号) AS NUM from edu_caiwutemp";
$rs = $db->SelectLimit($sql,30);
print $最大编号 = (int)$rs->fields['NUM'];

//读取出有用的数据,并删除,保留暂时没有用的无效数据
$sql = "select * from T001_Nk_Kp_Pj1 where F_Lx='002001001' and F_Qt1!='' and (F_Qt1 like '%082900%' or F_Qt1 like '%092964%' or F_Qt1 like '%102964%') and F_ID>'$最大编号' and F_Date>='20101019'";
$msdbRS = $msdb->SelectLimit($sql,3000);
$msdbRSA = $msdbRS->GetArray();
$TempArray = array();
print $sql;

//print_R($msdbRSA);exit;
//以下代码原本在MANANGE里面加入,后加入本页面,用于修正最后一个显示数据正确的问题

//自动处理考勤数据
for($i=0;$i<sizeof($msdbRSA);$i++)				{
	$学号		= $msdbRSA[$i]['F_Qt1'];;
	$姓名		= returntablefield("edu_student","学号",$学号,"姓名");
	$班级		= returntablefield("edu_student","学号",$学号,"班号");
	$缴费金额	= $msdbRSA[$i]['F_Je'];
	$缴费时间   = substr($msdbRSA[$i]['F_Date'],0,4)."-".substr($msdbRSA[$i]['F_Date'],4,2)."-".substr($msdbRSA[$i]['F_Date'],6,2);
	$缴费年份	= $msdbRSA[$i]['F_Year'];
	$发票编号	= $msdbRSA[$i]['F_Bh'];
	$发票验证码 = $msdbRSA[$i]['F_Reg'].$msdbRSA[$i]['F_Key'];

	$判断编号   = $msdbRSA[$i]['F_ID'];
	//$缴费明细   = $msdbRSA[$i]['F_ID'];

	//明细
	$sql = "select * from T001_Nk_Kp_Pj2 where F_ID='$判断编号'";
	$msdbRS = $msdb->Execute($sql);
	$msdb2RSA = $msdbRS->GetArray();
	$缴费明细 = '';
	for($ic=0;$ic<sizeof($msdb2RSA);$ic++)				{
		$明细金额  = $msdb2RSA[$ic]['F_Je'];;
		$明细名称  = $msdb2RSA[$ic]['F_XmMc'];;
		$缴费明细 .= "$明细名称:$明细金额||";
	}


	$sql = "select COUNT(*) AS NUM from edu_caiwutemp where 判断编号='$判断编号'";
	$msdbRS = $msdb->Execute($sql);
	$NUM = $msdbRS->fields['NUM'];

	if($NUM=='')				{
		$sql = "insert into edu_caiwutemp values('$判断编号','$学号','$姓名','$班级','$缴费金额','$缴费时间','$缴费年份','$发票编号','$发票验证码','$判断编号','$缴费明细')";
		$db->Execute($sql);
		$InsertData++;
	}
	else	{
		//此卡号为无效卡号
		//print "<font color=red>卡号:$卡号 为无效卡号,无法在用户表中对应教师信息.<BR>";
		$InsertData2++;
	}
}
//print_R($msdbRSA);
$Text = "处理数据结果明细: 成功匹配数据:".(int)$InsertData."条,无效数据:".(int)$InsertData2."条";
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
<font color=red >$Text<BR><BR><input type=button accesskey='c' name='cancel' value=' 返 回 ' class=BigButton onClick=\"location='edu_teacherkaoqinmingxi_automake.php'\" title='快捷键:ALT+c'></font>
</td>
</tr>
<tr>
</table>";

//exit;
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