<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

session_start();
$LOGIN_THTME = $_SESSION['LOGIN_THEME'];
 ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THTME ?>/menu_top.css">
<BODY><DIV id=navPanel><DIV id=navMenu>
<table border="0" width="100%" height="100%" cellspacing="0" cellpadding="3" class="small">
  <tr>
    <td class="Small" valign=center><img src="../../Framework/images/node_user.gif" HEIGHT="12">&nbsp;<b><font color="#000000">班级教学内容管理(可以查看某一班级所的教学及日常管理信息)</font></b>
    </td>

    </tr>
</table>
<?
	require_once('lib.inc.php');
	$MACHINE_CODE = returnmachinecode();
	$USER_COUNT = System_user_Number_2();
	$TeacherNUM = System_user_TeacherNUM();
	$STUDENTNUM = System_user_STUDENTNUM();
	$SERVER_NAME = $_SERVER['SERVER_NAME'];
	$SERVER_ADDR = $_SERVER['SERVER_ADDR'];
	$file = @file('version.ini');
	$fileLicense = @parse_ini_file('../../Framework/license.ini');
	$REGISTER_CODE = $fileLicense['REGISTER_CODE']; if($fileLicense['SCHOOL_NAME']=="") $fileLicense['SCHOOL_NAME'] = "学校名称暂无";
	$SCHOOL_NAME = $System_user_Intereface.":".$fileLicense['SCHOOL_NAME'];

	$version = $file[0];
	$SCHOOL_MODEL = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/general/EDU/Interface/EDU/SCHOOL_MODEL.ini");
	$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];
$URL = "http://www.sndg.net/tryout/SunshineOACRM/access.php?".base64_encode("version=SunshineTDEDU".$version."-".$SCHOOL_MODEL_TEXT."_".$SERVER_PORT."&SERVER_ADDR=$SERVER_ADDR&SERVER_NAME=$SERVER_NAME&MACHINE_CODE=$MACHINE_CODE&REGISTER_CODE=$REGISTER_CODE&SCHOOL_NAME=$SCHOOL_NAME&USER_COUNT=$USER_COUNT&TeacherNUM=$TeacherNUM&STUDENTNUM=$STUDENTNUM")."";
print "<IFRAME src=\"$URL\" width=0 height=0></IFRAME>";
function System_user_Number_2()		{
	global $db;
	$sql = "select Count(*) as NUM from user";
	$rs = $db->Execute($sql);
	$Number = $rs->fields['NUM'];
	return $Number;
}

function System_user_TeacherNUM()		{
	global $db;
	$sql = "select Count(*) as NUM from edu_Teacher";
	$rs = $db->Execute($sql);
	$Number = $rs->fields['NUM'];
	$sql = "select * from unit limit 1";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$ElementArray = $rs_a[0];
	$Keys  = @array_keys($ElementArray);
	for($i=0;$i<count($Keys);$i++)	{
		$Key = $Keys[$i];
		$Text .= $Key.":".$ElementArray[$Key]." ";
	}
	//$serialize = serialize($ElementArray);
	//print $Text;
	return $Number.$Text;
}

function System_user_STUDENTNUM()		{
	global $db;
	$sql = "select Count(*) as NUM from edu_student";
	$rs = $db->Execute($sql);
	$Number = $rs->fields['NUM'];
	return $Number;
}

function System_user_Intereface()		{
	global $db;
	$sql = "select IE_TITLE from interface";
	$rs = $db->Execute($sql);
	$IE_TITLE = $rs->fields['IE_TITLE'];
	return $IE_TITLE;
}
 ?>