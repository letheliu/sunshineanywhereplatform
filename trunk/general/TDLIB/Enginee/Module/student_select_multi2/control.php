<?php

require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();

$sunshine_teacher_banzhuren_class = $_SESSION['sunshine_teacher_banzhuren_class'];
$sunshine_teacher_classTEXT  = $sunshine_teacher_banzhuren_class;
$sunshine_teacher_class_array = explode(',',$sunshine_teacher_classTEXT);

sort($sunshine_teacher_class_array);

if($_GET['班号']=="")		{
	$_GET['班号'] = $sunshine_teacher_class_array[0];
}

?>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/style.css" />
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/menu_left.css" />
<script src="../../../../../inc/js/ccorrect_btn.js"></script>
<?

//print_R($_GET);
$sql = "select 学号,姓名 from edu_student where 班号='".$_GET['班号']."' and 学生状态='正常状态' order by 座号,学号,姓名";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$姓名TEXT .= $rs_a[$i]['姓名'].",";
	$学号TEXT .= $rs_a[$i]['学号'].",";
}

echo "\n<script Language=\"JavaScript\">\r\nvar parent_window = parent.dialogArguments;\r\n";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
	$TO_ID = "TO_ID";
	$TO_NAME = "TO_NAME";
}
if ( $FORM_NAME == "" || $FORM_NAME == "undefined" )
{
	$FORM_NAME = "form1";
}
echo "\r\nfunction clear_user()\r\n{\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=\"\";\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=\"\";\r\n
}
\r\n
function add_all_user()  {
	parent_window.{$FORM_NAME}.{$TO_ID}.value = '$学号TEXT';
	parent_window.{$FORM_NAME}.{$TO_NAME}.value = '$姓名TEXT';
}
\r\n
</script>
\r\n</head>\r\n\r\n<body class=\"bodycolor\"  topmargin=\"0\" leftmargin=\"0\">\r\n\r\n<table border=\"0\" cellspacing=\"1\" width=\"100%\" class=\"small\"  cellpadding=\"2\" align=\"center\">\r\n   <tr>\r\n
<td nowrap align=\"right\">\r\n     \t<input type=\"button\" class=\"SmallButton\" value=\"清 空\" onclick=\"clear_user();\">&nbsp;&nbsp;\r\n     \t
<input type=\"button\" class=\"SmallButton\" value=\"关 闭\" onclick=\"window.close();\">&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n
</td>\r\n   </tr>\r\n</table>\r\n\r\n</body>\r\n</html>\r\n";
//print $学号TEXT;
?>
