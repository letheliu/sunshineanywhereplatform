<?
require_once('lib.inc.php');

print '<TITLE>数据语言</TITLE>
	<META http-equiv=Content-Type content="text/html; charset=gb2312">
	<LINK href="http://edu.sndg.net:80/theme/3/style.css" type=text/css rel=stylesheet>
	<script type="text/javascript" language="javascript" src="http://edu.sndg.net:80/general/EDU/Enginee/lib/common.js"></script>
	<STYLE>@media print{input{display:none}}</STYLE>
	<BODY class=bodycolor topMargin=5 >';

$sql	= "select * from td_crm.systemprivatetdlib where ID='1'";
$rs		= $db->CacheExecute(15,$sql);
$rs_a	= $rs->GetArray();
$CONTENT	= $rs_a[0]['CONTENT'];
print "<BR>systemprivate CONTENT权限##################################################################################################<BR>";
print "update systemprivate set CONTENT='$CONTENT' where ID='1';";

//$sql	= "select * from td_crm.systemprivate where ID='1'";
//$rs		= $db->Execute($sql);
//$rs_a	= $rs->GetArray();
//$CONTENT	= $rs_a[0]['CONTENT'];
//print "<BR>systemprivate CONTENT权限##################################################################################################<BR>";
//print "update systemprivate set CONTENT='$CONTENT' where ID='1';";
/*
//强制过滤CRM中缺失的语言信息
$sql	= "select * from td_crm.systemlang where tablename like 'crm%' order by systemlangid ";
$rs		= $db->Execute($sql);
$rs_a	= $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)		{
	$Element  = $rs_a[$i];
	$sql = "select COUNT(*) AS NUM FROM td_edu.systemlang where fieldname='".$Element['fieldname']."' and tablename='".$Element['tablename']."'";
	$rsx = $db->Execute($sql);
	if($rsx->fields['NUM']==0)			{
		$Element['systemlangid'] = '';
		$sql = 数组转SQL($Element,"td_edu.systemlang");
		//$db->Execute($sql);
		//print $sql."<BR>";
	}
	else	{
		$sql = "delete from td_crm.systemlang where systemlangid = '".$Element['systemlangid']."'";
		$db->Execute($sql);
		print $sql."<BR>";
	}
}
exit;
*/

print "<BR>";

$sql	= "select * from td_edu.systemlang order by systemlangid desc limit 1";
$rs		= $db->Execute($sql);
$rs_a	= $rs->GetArray();
$NUMEDU	= $rs_a[0]['systemlangid'];

$sql	= "select * from td_crm.systemlang order by systemlangid desc limit 1";
$rs		= $db->Execute($sql);
$rs_a	= $rs->GetArray();
$NUMCRM	= $rs_a[0]['systemlangid'];

//print_R($NUMCRM);


if($NUMCRM>$NUMEDU)							{
	$sql	= "select * from td_crm.systemlang where systemlangid>'$NUMEDU' order by systemlangid";
	$rs		= $db->Execute($sql);
	$rs_a	= $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$Element  = $rs_a[$i];
		$sql = 数组转SQL($Element,"td_edu.systemlang");
		print $sql."<BR>";
		$db->Execute($sql);
	}
	print "12 CRM BIG!";
}
elseif($NUMCRM<$NUMEDU)				{
	$sql	= "select * from td_edu.systemlang where systemlangid>'$NUMCRM' order by systemlangid";
	$rs		= $db->Execute($sql);
	$rs_a	= $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$Element  = $rs_a[$i];
		$sql = 数组转SQL($Element,"td_crm.systemlang");
		print $sql."<BR>";
		$db->Execute($sql);
	}
	print "12 EDU BIG!";
}
else	{
	print "12 OK!";
}


function 数组转SQL($Element,$tablename)				{
	$KEYS = array_keys($Element);
	$VALUES = array_values($Element);
	$KEYSTEXT = join(',',$KEYS);
	$VALUESTEXT = "'".join("','",$VALUES)."'";
	$sql = "insert into $tablename($KEYSTEXT) values($VALUESTEXT);";
	return $sql;
}

##################################################################################################
//更新不同库
##################################################################################################


$db02=NewADOConnection("mysql");
$db02->Connect('localhost:3336',$userdb_name,$userdb_pwd,'td_crm');
$db02->Execute("set names gbk");

print "<BR>";
$sql	= "select * from td_edu.systemlang order by systemlangid desc limit 1";
$rs		= $db->Execute($sql);
$rs_a	= $rs->GetArray();
$NUMEDU	= $rs_a[0]['systemlangid'];

$sql	= "select * from td_crm.systemlang order by systemlangid desc limit 1";
$rs		= $db02->Execute($sql);
$rs_a	= $rs->GetArray();
$NUMCRM	= $rs_a[0]['systemlangid'];

//print_R($NUMCRM);


if($NUMCRM>$NUMEDU)							{
	$sql	= "select * from td_crm.systemlang where systemlangid>'$NUMEDU' order by systemlangid";
	$rs		= $db02->Execute($sql);
	$rs_a	= $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$Element  = $rs_a[$i];
		$sql = 数组转SQL($Element,"td_edu.systemlang");
		print $sql."<BR>";
		$db->Execute($sql);
	}
	print "02 CRM BIG!";
}
elseif($NUMCRM<$NUMEDU)				{
	$sql	= "select * from td_edu.systemlang where systemlangid>'$NUMCRM' order by systemlangid";
	$rs		= $db->Execute($sql);
	$rs_a	= $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$Element  = $rs_a[$i];
		$sql = 数组转SQL($Element,"td_crm.systemlang");
		print $sql."<BR>";
		$db02->Execute($sql);
	}
	print "02 EDU BIG!";
}
else	{
	print "02 OK!";
}



##################################################################################################
//得到不同的SYSTEMLANG日志记录
##################################################################################################

print "<BR>得到EDU_SNDG_NET的SYSTEMLANGID最大值##################################################################################################<BR>";
//$得到EDU_SNDG_NET的SYSTEMLANGID最大值
$file			= @file('http://edu.sndg.net/general/EDU/Interface/EDU/systemlang.php?limit=1');
$FileText		= join('',$file);
$FileTextArray	= explode("','",strip_tags($FileText));
$FileTextArray	= explode("'",$FileTextArray[0]);
$EDU_SNDG_ID	= $FileTextArray[1];

$sql = "select * from systemlang where systemlangid>'$EDU_SNDG_ID' order by systemlangid desc";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($iii=0;$iii<sizeof($rs_a);$iii++)						{
	$Line = array_values($rs_a[$iii]);
	$LineText = "'".join("','",$Line)."'";
	$sql = "insert into systemlang values ($LineText);";
	print $sql."<BR>";
	//$db->Execute($sql);
}

exit;
print "<BR>得到JIYUN512_CRM的SYSTEMLANGID最大值##################################################################################################<BR>";
//$得到JIYUN512_CRM的SYSTEMLANGID最大值
$file			= @file('http://jiyun512.web1.us01-host.com/general/TDLIB/Interface/CRM/systemlang.php?limit=1');
$FileText		= join('',$file);
$FileTextArray	= explode("','",strip_tags($FileText));
$FileTextArray	= explode("'",$FileTextArray[0]);
$JIYUN_CRM_ID	= $FileTextArray[1];

$sql = "select * from systemlang where systemlangid>'$JIYUN_CRM_ID' order by systemlangid desc";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($iii=0;$iii<sizeof($rs_a);$iii++)						{
	$Line = array_values($rs_a[$iii]);
	$LineText = "'".join("','",$Line)."'";
	$sql = "insert into systemlang values ($LineText);";
	print $sql."<BR>";
	//$db->Execute($sql);
}

print $JIYUN_CRM_ID;
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