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
					//×Ö¶ÎÃû³Æ¸³Öµ
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
</table>