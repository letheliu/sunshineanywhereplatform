<?
require_once('lib.inc.php');

print '<TITLE>��������</TITLE>
	<META http-equiv=Content-Type content="text/html; charset=gb2312">
	<LINK href="http://edu.sndg.net:80/theme/3/style.css" type=text/css rel=stylesheet>
	<script type="text/javascript" language="javascript" src="http://edu.sndg.net:80/general/EDU/Enginee/lib/common.js"></script>
	<STYLE>@media print{input{display:none}}</STYLE>
	<BODY class=bodycolor topMargin=5 >';

$sql	= "select * from td_crm.systemprivatetdlib where ID='1'";
$rs		= $db->CacheExecute(15,$sql);
$rs_a	= $rs->GetArray();
$CONTENT	= $rs_a[0]['CONTENT'];
print "<BR>systemprivate CONTENTȨ��##################################################################################################<BR>";
print "update systemprivate set CONTENT='$CONTENT' where ID='1';";

//$sql	= "select * from td_crm.systemprivate where ID='1'";
//$rs		= $db->Execute($sql);
//$rs_a	= $rs->GetArray();
//$CONTENT	= $rs_a[0]['CONTENT'];
//print "<BR>systemprivate CONTENTȨ��##################################################################################################<BR>";
//print "update systemprivate set CONTENT='$CONTENT' where ID='1';";
/*
//ǿ�ƹ���CRM��ȱʧ��������Ϣ
$sql	= "select * from td_crm.systemlang where tablename like 'crm%' order by systemlangid ";
$rs		= $db->Execute($sql);
$rs_a	= $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)		{
	$Element  = $rs_a[$i];
	$sql = "select COUNT(*) AS NUM FROM td_edu.systemlang where fieldname='".$Element['fieldname']."' and tablename='".$Element['tablename']."'";
	$rsx = $db->Execute($sql);
	if($rsx->fields['NUM']==0)			{
		$Element['systemlangid'] = '';
		$sql = ����תSQL($Element,"td_edu.systemlang");
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
		$sql = ����תSQL($Element,"td_edu.systemlang");
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
		$sql = ����תSQL($Element,"td_crm.systemlang");
		print $sql."<BR>";
		$db->Execute($sql);
	}
	print "12 EDU BIG!";
}
else	{
	print "12 OK!";
}


function ����תSQL($Element,$tablename)				{
	$KEYS = array_keys($Element);
	$VALUES = array_values($Element);
	$KEYSTEXT = join(',',$KEYS);
	$VALUESTEXT = "'".join("','",$VALUES)."'";
	$sql = "insert into $tablename($KEYSTEXT) values($VALUESTEXT);";
	return $sql;
}

##################################################################################################
//���²�ͬ��
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
		$sql = ����תSQL($Element,"td_edu.systemlang");
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
		$sql = ����תSQL($Element,"td_crm.systemlang");
		print $sql."<BR>";
		$db02->Execute($sql);
	}
	print "02 EDU BIG!";
}
else	{
	print "02 OK!";
}



##################################################################################################
//�õ���ͬ��SYSTEMLANG��־��¼
##################################################################################################

print "<BR>�õ�EDU_SNDG_NET��SYSTEMLANGID���ֵ##################################################################################################<BR>";
//$�õ�EDU_SNDG_NET��SYSTEMLANGID���ֵ
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
print "<BR>�õ�JIYUN512_CRM��SYSTEMLANGID���ֵ##################################################################################################<BR>";
//$�õ�JIYUN512_CRM��SYSTEMLANGID���ֵ
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
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>