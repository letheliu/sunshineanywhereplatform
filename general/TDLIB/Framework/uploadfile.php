<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();

$common_html=returnsystemlang('common_html');
$name=$_FILES['filename']['name'];
$type=$_FILES['filename']['type'];
$tmp_name=$_FILES['filename']['tmp_name'];
$error=$_FILES['filename']['error'];
$sessionkeyName =$_POST['sessionkey']; 
$var1=isset($_GET['var1'])?$_GET['var1']:"ATTACHMENT_ID";
$var2=isset($_GET['var2'])?$_GET['var2']:"ATTACHMENT_NAME";


if($_GET['action']=='uploadfile'&&$error==0)		{
	$path="../attachment";
	$timeline=time();
	$dirpath=$path."/".$timeline;
	is_dir($path)?'':mkdir($path);
	is_dir($dirpath)?'':mkdir($dirpath);
	$filepath=$dirpath."/".$name;
	copy($tmp_name,$filepath);

	print "<SCRIPT language=JavaScript>\n 
			var parent_window = parent.dialogArguments;\n\n
			function add_value(user_id,user_name)	{\n\n
				TO_VAL=parent.window.form1.$var1.value;\n\n
				if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)  {\n
					parent.ID_Array.push(user_id);
					parent.NAME_Array.push(user_name);
					//
					parent.form1.$var1.value = parent.ID_Array.toString();\n
					//
					//字段名称赋值
					var TextName = '';
					for(i=0;i<parent.NAME_Array.length-1;i++)		{
						var TempIndex = parent.NAME_Array[i];
						TextName += TempIndex+\"*\";
					}
					TextName += parent.NAME_Array[i];
					parent.form1.$var2.value = TextName;
				}\n
				}\n
			add_value('$timeline','$name');\n";
	print "</SCRIPT>\n";
	$text=$name;
	print "<script>\n";
	print "
	    var br = '';
	    if(parent.uploadArray.length % 2 == 0 && parent.uploadArray.length >1) 
			br = '<BR>';
		else
			br = '';

		var TempValueIndex = parent.uploadArray.length;
		parent.uploadArray.push(\"$text<input class=SmallButton onClick=DeleteFileArray(\"+TempValueIndex+\") type=button name=11 value=".$common_html['common_html']['delete'].">\"+br);
		parent.new_file.innerHTML = parent.uploadArray.toString();
		\n";
	print "</script>\n";
}
else if($_GET['action']=='uploadfile'&&$error!=0)	{
	print "upload file failed !ERROR CODE:$error";exit;
}
$LOGIN_THEME=$_SESSION['SUNSHINE_USER_LOGIN_THEME'];
$LOGIN_THEME==""?$LOGIN_THEME=1:'';
?>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="../theme/<?=$LOGIN_THEME?>/style.css" rel=stylesheet>
<script type="text/javascript" language="javascript" src="../Enginee/lib/common.js"></script>
<BODY class=bodycolor2 topMargin=5 >
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

<form name=form1 method=POST onsubmit="return FormCheck();"  action=uploadfile.php?action=uploadfile  enctype=multipart/form-data>
<tr width="100%" class=TableData>
<td valign=top width="100%" align=left class=TableData>
<input type=file name=filename class=Smallinput>
<input type="hidden" name=sessionkey value=<?=$sessionkey?>>
<input type=submit value="<?=$common_html['common_html']['uploadfile']?>" name=send class=SmallButton>
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