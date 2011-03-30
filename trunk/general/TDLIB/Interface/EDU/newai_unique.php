<?
header("Content-type:text/html;charset=gbk");

require_once("lib.inc.php");
//?dd=as&TableName=edu_student&FieldName=学号&dddd=dddsss&FieldValue=0929645086

if($_GET['TableName']!=""&&$_GET['FieldName']!=""&&$_GET['FieldValue']!="")
{

	$FieldName	= strip_tags(addslashes($_GET['FieldName']));
	$FieldValue = strip_tags(addslashes($_GET['FieldValue']));
	$TableName	= strip_tags(addslashes($_GET['TableName']));
	$sql = "select $FieldName from $TableName where $FieldName='$FieldValue'";
	$rs=$db->Execute($sql);
	$rs_a=$rs->GetArray();
	if($rs_a[0][$FieldName]!="")			{
		print "<font color=red>该值已经存在,请换用其它值</font>";
	}
	else	{
		print "<font color=green>该值不存在,您可以继续向下</font>";
	}
}

?>