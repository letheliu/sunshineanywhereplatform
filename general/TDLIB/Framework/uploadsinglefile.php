<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('lib.inc.php');
//$GLOBAL_SESSION=returnsession();
//
$common_html=returnsystemlang('common_html');
$name=$_FILES['filename']['name'];
$type=$_FILES['filename']['type'];
$tmp_name=$_FILES['filename']['tmp_name'];
$error=$_FILES['filename']['error'];
$_GET['varname']!="" ? $getvarname = $_GET['varname'] : $getvarname = "PHOTO";

if($getvarname=="PHOTO"||$getvarname=="��Ƭ"||$getvarname=="�໤��һ��Ƭ"||$getvarname=="�໤�˶���Ƭ")	{
	$fileText = "�ϴ���Ƭ";
}
else	{
	$fileText = "�ϴ�����";
}
//print_R($_SESSION);
//print_R($sessionkey);
if($_GET['action']=='uploadfile'&&$error==0)		{
	$path="../attachment";
	$timeline=time();
	$dirpath=$path."/".$timeline;
	is_dir($path)?'':mkdir($path);
	is_dir($dirpath)?'':mkdir($dirpath);
	$filepath=$dirpath."/".$name;
	copy($tmp_name,$filepath);

	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$IndexNumber = sizeof($PHP_SELF_ARRAY)-2;
	$DirNameSelf = $PHP_SELF_ARRAY[$IndexNubmer];
	if($DirNameSelf!="Framework")		{
		$varname="../../Framework/download.php?action=picturefile&sessionkey=$sessionkey&attachmentid=$timeline&attachmentname=$name";
	}
	else			{
		$varname="download.php?action=picturefile&sessionkey=$sessionkey&attachmentid=$timeline&attachmentname=$name";
	}
	print "<SCRIPT language=JavaScript>\n\n";
	print "parent.form1.$getvarname.value=\"$varname\";\n";
	print "</SCRIPT>\n";
	$gif = substr($name,-3,3);
	$gif = strtolower($gif);
	if($gif=="gif"||$gif=="jpg")		{
		$text="<img src='$varname' width=100 border=0>";	
	}
	else	{
		$text="<a href='$varname'>����:$name</a>";		
	}
	print "<script>\n";
	print "parent.new_file_".$getvarname.".innerHTML=\"$text\";\n";
	print "</script>\n";
}
else if($_GET['action']=='uploadfile'&&$error!=0)	{
	print "�ļ��ϴ�ʧ�ܣ����룺$error";exit;
}
?>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" rel=stylesheet>
<script type="text/javascript" language="javascript" src="../Enginee/lib/common.js"></script>
<BODY  topMargin=5 >
<table cellSpacing=0 cellPadding=3 width="100%" border=0 valign=absmiddle height=100%  class=small>
<tbody>
<script language = "JavaScript"> 
function FormCheck() 
{

if (document.form1.filename.value == "") 
{
alert("filename:notnull");
return false;
}

}
</script>
<form name=form1 method=POST onsubmit="return FormCheck();"  action="?action=uploadfile&varname=<?=$_GET['varname']?>"  enctype=multipart/form-data>
<tr width="100%" class=TableData>
<td valign=top width="100%" align=left class=TableData>
<input type=file name=filename class=Smallinput size=15>
<input type=submit value=<?=$fileText?> name=send class=SmallButton>
</td>
</tr>
</form>
</table><?
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