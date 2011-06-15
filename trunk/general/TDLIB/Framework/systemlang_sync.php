<?
require_once('lib.inc.php');

print '<TITLE>数据语言</TITLE>
	<META http-equiv=Content-Type content="text/html; charset=gb2312">
	<LINK href="http://edu.sndg.net:80/theme/3/style.css" type=text/css rel=stylesheet>
	<script type="text/javascript" language="javascript" src="http://edu.sndg.net:80/general/EDU/Enginee/lib/common.js"></script>
	<STYLE>@media print{input{display:none}}</STYLE>
	<BODY class=bodycolor topMargin=5 >';



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

/*
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
*/


print "<BR>systemprivate CONTENT权限##################################################################################################<BR>";
$sql	= "select * from td_edu.systemprivate where ID='1'";
$rs		= $db->CacheExecute(150,$sql);
$rs_a	= $rs->GetArray();
$CONTENT	= $rs_a[0]['CONTENT'];
print "update systemprivate set CONTENT='$CONTENT' where ID='1';";

print "<BR>systemprivate CONTENT权限##################################################################################################<BR>";
$sql	= "select * from td_crm.systemprivatetdlib where ID='1'";
$rs		= $db->CacheExecute(150,$sql);
$rs_a	= $rs->GetArray();
$CONTENT	= $rs_a[0]['CONTENT'];
print "update systemprivatetdlib set CONTENT='$CONTENT' where ID='1';";


?>