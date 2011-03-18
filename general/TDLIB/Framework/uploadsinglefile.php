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

if($getvarname=="PHOTO"||$getvarname=="照片"||$getvarname=="监护人一相片"||$getvarname=="监护人二相片")	{
	$fileText = "上传相片";
}
else	{
	$fileText = "上传附件";
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
		$text="<a href='$varname'>下载:$name</a>";		
	}
	print "<script>\n";
	print "parent.new_file_".$getvarname.".innerHTML=\"$text\";\n";
	print "</script>\n";
}
else if($_GET['action']=='uploadfile'&&$error!=0)	{
	print "文件上传失败！代码：$error";exit;
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
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>