<?
header("Content-type:text/html;charset=gbk");

require_once("lib.inc.php");
//?dd=as&TableName=edu_student&FieldName=ѧ��&dddd=dddsss&FieldValue=0929645086

if($_GET['TableName']!=""&&$_GET['FieldName']!=""&&$_GET['FieldValue']!="")
{

	$FieldName	= strip_tags(addslashes($_GET['FieldName']));
	$FieldValue = strip_tags(addslashes($_GET['FieldValue']));
	$TableName	= strip_tags(addslashes($_GET['TableName']));
	$sql = "select $FieldName from $TableName where $FieldName='$FieldValue'";
	$rs=$db->Execute($sql);
	$rs_a=$rs->GetArray();
	if($rs_a[0][$FieldName]!="")			{
		print "<font color=red>��ֵ�Ѿ�����,�뻻������ֵ</font>";
	}
	else	{
		print "<font color=green>��ֵ������,�����Լ�������</font>";
	}
}

?>