<?php
session_start();

include_once( "../user_select/setting.inc.php" );
//
print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />
<script type=\"text/javascript\" language=\"javascript\" src=\"../../lib/common.js\"></script>
";

echo "
<html>
<head>
<title></title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">
<script Language=\"JavaScript\"> var parent_window = parent.dialogArguments; ";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
    $TO_ID = "TO_ID";
    $TO_NAME = "TO_NAME";
}
if ( $FORM_NAME == "" || $FORM_NAME == "undefined" )
{
    $FORM_NAME = "form1";
}
echo " function clear_user() {     parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=\"\";     parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=\"\"; }
</script>
</head>
<body class=\"bodycolor\"  topmargin=\"0\" leftmargin=\"0\">
<table border=\"0\" cellspacing=\"1\" width=\"100%\" class=\"small\"  cellpadding=\"2\" align=\"center\">
<tr>
<td nowrap align=\"right\">
<input type=\"button\" class=\"SmallButton\" value=\"清 空\" onclick=\"clear_user();\">
&nbsp;&nbsp;
<input type=\"button\" class=\"SmallButton\" value=\"关 闭\" onclick=\"window.close();\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table>
</body> </html> ";
?>
