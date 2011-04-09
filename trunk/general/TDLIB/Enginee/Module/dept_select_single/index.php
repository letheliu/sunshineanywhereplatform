<?php

function dept_tree_list( $DEPT_ID, $PRIV_OP )
{
    global $DEEP_COUNT;
    global $connection;
    $query = "SELECT * from DEPARTMENT where DEPT_PARENT='".$DEPT_ID."' order by DEPT_NO";
    $cursor = exequery( $connection, $query );
    $OPTION_TEXT = "";
    $DEEP_COUNT1 = $DEEP_COUNT;
    $DEEP_COUNT .= "　";
    while ( $ROW = mysql_fetch_array( $cursor ) )
    {
        ++$COUNT;
        $DEPT_ID = $ROW['DEPT_ID'];
        $DEPT_NAME = $ROW['DEPT_NAME'];
        $DEPT_PARENT = $ROW['DEPT_PARENT'];
        $DEPT_NAME = str_replace( "<", "&lt", $DEPT_NAME );
        $DEPT_NAME = str_replace( ">", "&gt", $DEPT_NAME );
        $DEPT_NAME = stripslashes( $DEPT_NAME );
        if ( $PRIV_OP == 1 )
        {
            $DEPT_PRIV = is_dept_priv( $DEPT_ID );
        }
        else
        {
            $DEPT_PRIV = 1;
        }
        $OPTION_TEXT_CHILD = dept_tree_list( $DEPT_ID, $PRIV_OP );
        if ( $DEPT_PRIV == 1 )
        {
            $OPTION_TEXT .= "     <tr class=TableData>       <td class='menulines' id='".$DEPT_ID."' name='".$DEPT_NAME."' onclick=javascript:click_dept('".$DEPT_ID."') style=cursor:hand>".$DEEP_COUNT1."├".$DEPT_NAME."</a></td>     </tr>";
        }
        if ( $OPTION_TEXT_CHILD != "" )
        {
            $OPTION_TEXT .= $OPTION_TEXT_CHILD;
        }
    }
    $DEEP_COUNT = $DEEP_COUNT1;
    return $OPTION_TEXT;
}


session_start();

include_once( "../user_select/setting.inc.php" );

if ( $TO_ID == "" || $TO_ID == "undefined" )
{
    $TO_ID = "TO_ID";
    $TO_NAME = "TO_NAME";
}
if ( $PRIV_OP == "undefined" )
{
    $PRIV_OP = "";
}
echo "
<html>
<head>
<title>选择部门</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />
<style>
	.menulines{}
</style>
<script Language=\"JavaScript\">
var parent_window = dialogArguments;
function click_dept(dept_id)   {
	targetelement=document.all(dept_id);
	dept_name=targetelement.name;
	parent_window.form1.";
echo $TO_ID;
echo ".value=dept_id;
parent_window.form1.";
echo $TO_NAME;
echo ".value=dept_name;
window.close();   }
function borderize_on(targetelement)	{
	color=\"#003FBF\";
	targetelement.style.borderColor=\"black\";
	targetelement.style.backgroundColor=color;
	targetelement.style.color=\"white\";
	targetelement.style.fontWeight=\"bold\";
}
function begin_set()					{
	TO_VAL=parent_window.form1.";
echo $TO_ID;
echo ".value;
	for (step_i=0; step_i<document.all.length; step_i++)			{
		if(document.all(step_i).className==\"menulines\")       {
			dept_id=document.all(step_i).id;
			if(TO_VAL==dept_id)
			borderize_on(document.all(step_i));
		}
	}
}
</script>
</head>
<body topmargin=\"1\" leftmargin=\"0\" class=\"bodycolor\" onload=\"begin_set()\">";
if ( $DEPT_ID == "" )
{
    $DEPT_ID = 0;
}
$OPTION_TEXT = dept_tree_list( $DEPT_ID, $PRIV_OP );
if ( $OPTION_TEXT == "" )
{
    message( "提示", "未定义或无可管理部门", "blank" );
    echo "<div align=\"center\"><input type=\"button\" class=\"BigButton\" value=\"返回\" onclick=\"javascript:location='dept_list.php?PRIV_OP=";
    echo $PRIV_OP;
    echo "';\"></div>   ";
}
else
{
    echo "<table class=\"TableBlock\" width=\"95%\">   ";
    echo $OPTION_TEXT;
}
echo "</body></html>   ";
?>
