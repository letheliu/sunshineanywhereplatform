<?php
session_start();

include_once( "../user_select/setting.inc.php" );

print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />";

echo "\r\n<html>\r\n<head>\r\n<title></title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n\r\n";
include_once( "menu_button.js" );
echo "\r\n<script Language=\"JavaScript\">\r\nvar parent_window = parent.dialogArguments;\r\n";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
    $TO_ID = "TO_ID";
    $TO_NAME = "TO_NAME";
}
echo "function add_user(user_id,user_name)\r\n{\r\n  TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n  if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)\r\n  {\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=user_id;\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=user_name;\r\n  }\r\n  parent.close();\r\n}\r\n</script>\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"1\" leftmargin=\"0\" >\r\n\r\n";
if ( $DEPT_ID == "" )
{
    $DEPT_ID = $LOGIN_DEPT_ID;
}
$query = "SELECT USER_ID,USER_NAME from user where (USER_ID like '%".$USER_NAME."%' or USER_NAME like '%{$USER_NAME}%') and DEPT_ID!=0 and NOT_LOGIN!='1' order by USER_NO,USER_NAME";
//print $query;
$cursor = exequery( $connection, $query );
$USER_COUNT = 0;
while ( $ROW = mysql_fetch_array( $cursor ) )
{
    ++$USER_COUNT;
    $USER_ID = $ROW['USER_ID'];
    $USER_NAME = $ROW['USER_NAME'];
    if ( $USER_COUNT == 1 )
    {
        echo "<table class=\"TableBlock\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>人员查询</b></td>\r\n</tr>\r\n\r\n";
    }
    echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" align=\"center\" onclick=\"javascript:add_user('";
    echo $USER_ID;
    echo "','";
    echo $USER_NAME;
    echo "')\" style=\"cursor:hand\">";
    echo $USER_NAME;
    echo "</td>\r\n</tr>\r\n";
}
if ( $USER_COUNT == 0 )
{
    message( "", "没有定义用户", "blank" );
}
else
{
    echo "</table>";
}
echo "\r\n</body>\r\n</html>\r\n";
?>
