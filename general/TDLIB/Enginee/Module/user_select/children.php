<?php
session_start();

function user_tree_list( $DEPT_ID )
{
    global $connection;
    global $DEEP_COUNT;
    global $USER_COUNT;
    global $MANAGE_FLAG;
    $query = "SELECT DEPT_ID,DEPT_NAME from DEPARTMENT where DEPT_PARENT='".$DEPT_ID."' order by DEPT_NO";
    $cursor1 = exequery( $connection, $query );
    $OPTION_TEXT = "";
    $DEEP_COUNT1 = $DEEP_COUNT;
    $DEEP_COUNT .= "��";
    while ( $ROW = mysql_fetch_array( $cursor1 ) )
    {
        ++$COUNT;
        $DEPT_ID = $ROW['DEPT_ID'];
        $DEPT_NAME = $ROW['DEPT_NAME'];
        $DEPT_NAME = htmlspecialchars( $DEPT_NAME );
        $OPTION_TEXT .= "<tr class='TableHeader'><td><b>".$DEEP_COUNT1."��".$DEPT_NAME."</b></td></tr>";
        if ( $MANAGE_FLAG )
        {
            $query = "SELECT USER_ID,USER_NAME from USER,USER_PRIV where DEPT_ID=".$DEPT_ID." and USER.USER_PRIV=USER_PRIV.USER_PRIV order by PRIV_NO,USER_NO,USER_NAME";
        }
        else
        {
            $query = "SELECT USER_ID,USER_NAME from USER,USER_PRIV where DEPT_ID=".$DEPT_ID." and USER.USER_PRIV=USER_PRIV.USER_PRIV and NOT_LOGIN!='1' order by PRIV_NO,USER_NO,USER_NAME";
        }
        $cursor = exequery( $connection, $query );
        while ( $ROW = mysql_fetch_array( $cursor ) )
        {
            ++$USER_COUNT;
            $USER_ID = $ROW['USER_ID'];
            $USER_NAME = $ROW['USER_NAME'];
            $OPTION_TEXT .= "<tr class='TableData' onclick=javascript:click_user('".$USER_ID."') style='cursor:hand' align='center'>\r\n           <td class='menulines' id='".$USER_ID."' name='".$USER_NAME."' flag='1'>\r\n           ".htmlspecialchars( $USER_NAME )."</td></tr>";
        }
        $OPTION_TEXT .= user_tree_list( $DEPT_ID );
    }
    $DEEP_COUNT = $DEEP_COUNT1;
    return $OPTION_TEXT;
}

include_once( "../user_select/setting.inc.php" );
print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />";
echo "\r\n<html>\r\n<head>\r\n<title></title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n<style>\r\n.menulines{}\r\n</style>\r\n\r\n<script Language=\"JavaScript\">\r\nvar parent_window = parent.dialogArguments;\r\n";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
    $TO_ID = "TO_ID";
    $TO_NAME = "TO_NAME";
}
echo "function click_user(user_id)\r\n{\r\n  TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n  targetelement=document.all(user_id);\r\n  user_name=targetelement.name;\r\n  if(TO_VAL.indexOf(\",\"+user_id+\",\")>0 || TO_VAL.indexOf(user_id+\",\")==0)\r\n  {\r\n    if(TO_VAL.indexOf(user_id+\",\")==0)\r\n    {\r\n       parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value.replace(user_id+\",\",\"\");\r\n       parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value.replace(user_name+\",\",\"\");\r\n       borderize_off(targetelement);\r\n    }\r\n    if(TO_VAL.indexOf(\",\"+user_id+\",\")>0)\r\n    {\r\n       parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value.replace(\",\"+user_id+\",\",\",\");\r\n       parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value.replace(\",\"+user_name+\",\",\",\");\r\n       borderize_off(targetelement);\r\n    }\r\n  }\r\n  else\r\n  {\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value+=user_id+\",\";\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value+=user_name+\",\";\r\n    borderize_on(targetelement);\r\n  }\r\n\r\n}\r\n\r\nfunction borderize_on(targetelement)\r\n{\r\n color=\"#003FBF\";\r\n targetelement.style.borderColor=\"black\";\r\n targetelement.style.backgroundColor=color;\r\n targetelement.style.color=\"white\";\r\n targetelement.style.fontWeight=\"bold\";\r\n}\r\n\r\nfunction borderize_off(targetelement)\r\n{\r\n  targetelement.style.backgroundColor=\"\";\r\n  targetelement.style.borderColor=\"\";\r\n  targetelement.style.color=\"\";\r\n  targetelement.style.fontWeight=\"\";\r\n}\r\n\r\nfunction begin_set()\r\n{\r\n  TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n\r\n  for (step_i=0; step_i<document.all.length; step_i++)\r\n  {\r\n    if(document.all(step_i).className.indexOf(\"menulines\")>=0)\r\n    {\r\n       user_id=document.all(step_i).id;\r\n       if(TO_VAL.indexOf(\",\"+user_id+\",\")>0 || TO_VAL.indexOf(user_id+\",\")==0)\r\n          borderize_on(document.all(step_i));\r\n    }\r\n  }\r\n}\r\n\r\nfunction add_all(flag)\r\n{\r\n  TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n  for (step_i=0; step_i<document.all.length; step_i++)\r\n  {\r\n    if(document.all(step_i).className.indexOf(\"menulines\")>=0)\r\n    {\r\n       if(flag!=document.all(step_i).flag)\r\n          continue;\r\n       user_id=document.all(step_i).id;\r\n       user_name=document.all(step_i).name;\r\n\r\n       if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)\r\n       {\r\n         parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value+=user_id+\",\";\r\n         parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value+=user_name+\",\";\r\n         borderize_on(document.all(step_i));\r\n       }\r\n    }\r\n  }\r\n}\r\n\r\nfunction del_all(flag)\r\n{\r\n  for (step_i=0; step_i<document.all.length; step_i++)\r\n  {\r\n    TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n    if(document.all(step_i).className.indexOf(\"menulines\")>=0)\r\n    {\r\n       if(flag!=document.all(step_i).flag)\r\n          continue;\r\n       user_id=document.all(step_i).id;\r\n       user_name=document.all(step_i).name;\r\n       if(TO_VAL.indexOf(user_id+\",\")==0)\r\n       {\r\n          parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value.replace(user_id+\",\",\"\");\r\n          parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value.replace(user_name+\",\",\"\");\r\n          borderize_off(document.all(step_i));\r\n       }\r\n       if(TO_VAL.indexOf(\",\"+user_id+\",\")>0)\r\n       {\r\n          parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value.replace(\",\"+user_id+\",\",\",\");\r\n          parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value.replace(\",\"+user_name+\",\",\",\");\r\n          borderize_off(document.all(step_i));\r\n       }\r\n    }\r\n  }\r\n}\r\n</script>\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"1\" leftmargin=\"0\" onload=\"begin_set();";
if ( $CHECKED == "true" )
{
    echo "add_all('1');";
}
else if ( $CHECKED == "false" )
{
    echo "del_all('1');";
}
echo "\">\r\n\r\n";
if ( $DEPT_ID == "" )
{
    $DEPT_ID = $LOGIN_DEPT_ID;
}
if ( $USER_PRIV == "" )
{
    if ( $MANAGE_FLAG )
    {
        $query = "SELECT USER_ID,USER_NAME from USER,USER_PRIV where DEPT_ID=".$DEPT_ID." and DEPT_ID!=0 and USER.USER_PRIV=USER_PRIV.USER_PRIV order by PRIV_NO,USER_NO,USER_NAME";
    }
    else
    {
        $query = "SELECT USER_ID,USER_NAME from USER,USER_PRIV where DEPT_ID=".$DEPT_ID." and DEPT_ID!=0 and USER.USER_PRIV=USER_PRIV.USER_PRIV and NOT_LOGIN!='1' order by PRIV_NO,USER_NO,USER_NAME";
    }
    $query1 = "select DEPT_NAME from DEPARTMENT where DEPT_ID=".$DEPT_ID;
    $cursor1 = exequery( $connection, $query1 );
    if ( $ROW = mysql_fetch_array( $cursor1 ) )
    {
        $TITLE = $ROW['DEPT_NAME'];
    }
}
else
{
    if ( $MANAGE_FLAG )
    {
        $query = "SELECT USER_ID,USER_NAME from USER where USER_PRIV='".$USER_PRIV."' and DEPT_ID!=0 order by USER_NO,USER_NAME";
    }
    else
    {
        $query = "SELECT USER_ID,USER_NAME from USER where USER_PRIV='".$USER_PRIV."' and DEPT_ID!=0 and NOT_LOGIN!='1' order by USER_NO,USER_NAME";
    }
    $query1 = "select PRIV_NAME from USER_PRIV where USER_PRIV='".$USER_PRIV."'";
    $cursor1 = exequery( $connection, $query1 );
    if ( $ROW = mysql_fetch_array( $cursor1 ) )
    {
        $TITLE = $ROW['PRIV_NAME'];
    }
}
if ( $TITLE == "" )
{
    $TITLE = "ȫ����Ա";
}
echo "\r\n<table class=\"TableBlock\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td colspan=\"2\" align=\"center\"><b>";
echo $TITLE;
echo "</b></td>\r\n</tr>\r\n\r\n";
$cursor = exequery( $connection, $query );
$USER_COUNT = 0;
while ( $ROW = mysql_fetch_array( $cursor ) )
{
    ++$USER_COUNT;
    $USER_ID = $ROW['USER_ID'];
    $USER_NAME = $ROW['USER_NAME'];
    if ( $USER_COUNT == 1 )
    {
        echo "<tr class=\"TableControl\">\r\n  <td onclick=\"javascript:add_all('1');\" style=\"cursor:hand\" align=\"center\">ȫ�����</td>\r\n</tr>\r\n<tr class=\"TableControl\">\r\n  <td onclick=\"javascript:del_all('1');\" style=\"cursor:hand\" align=\"center\">ȫ��ɾ��</td>\r\n</tr>\r\n";
    }
    echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" id=\"";
    echo $USER_ID;
    echo "\" name=\"";
    echo $USER_NAME;
    echo "\" flag=\"1\" align=\"center\" onclick=\"javascript:click_user('";
    echo $USER_ID;
    echo "')\" style=\"cursor:hand\">\r\n  ";
    echo htmlspecialchars( $USER_NAME );
    echo "  </td>\r\n</tr>\r\n\r\n";
}
if ( $USER_PRIV != "" )
{
    $query = "SELECT USER_ID,USER_NAME from USER where (USER_PRIV_OTHER like '".$USER_PRIV.",%' or USER_PRIV_OTHER like '%,{$USER_PRIV},%') and USER_PRIV!='{$USER_PRIV}' and DEPT_ID!=0 ";
    if ( !$MANAGE_FLAG )
    {
        $query .= " and NOT_LOGIN!='1'";
    }
    $query .= " order by USER_NO,USER_NAME";
    $cursor = exequery( $connection, $query );
    $USER_COUNT1 = 0;
    while ( $ROW = mysql_fetch_array( $cursor ) )
    {
        ++$USER_COUNT;
        ++$USER_COUNT1;
        $USER_ID = $ROW['USER_ID'];
        $USER_NAME = $ROW['USER_NAME'];
        if ( $USER_COUNT1 == 1 )
        {
            echo "<tr class=\"TableHeader\">\r\n  <td colspan=\"2\" align=\"center\"><b>������ɫ</b></td>\r\n</tr>\r\n<tr class=\"TableControl\">\r\n  <td onclick=\"javascript:add_all('2');\" style=\"cursor:hand\" align=\"center\">ȫ�����</td>\r\n</tr>\r\n<tr class=\"TableControl\">\r\n  <td onclick=\"javascript:del_all('2');\" style=\"cursor:hand\" align=\"center\">ȫ��ɾ��</td>\r\n</tr>\r\n";
        }
        echo "\r\n<tr class=\"TableData\" onclick=\"javascript:click_user('";
        echo $USER_ID;
        echo "')\" style=\"cursor:hand\" align=\"center\">\r\n  <td class=\"menulines\" id=\"";
        echo $USER_ID;
        echo "\" name=\"";
        echo $USER_NAME;
        echo "\" flag=\"2\">\r\n  ";
        echo htmlspecialchars( $USER_NAME );
        echo "  </td>\r\n</tr>\r\n\r\n";
    }
}
if ( $USER_PRIV == "" && $CHECKED )
{
    if ( $DEPT_ID == 0 )
    {
        echo "<tr class=\"TableControl\">\r\n  <td onclick=\"javascript:add_all('1');\" style=\"cursor:hand\" align=\"center\">ȫ�����</td>\r\n</tr>\r\n<tr class=\"TableControl\">\r\n  <td onclick=\"javascript:del_all('1');\" style=\"cursor:hand\" align=\"center\">ȫ��ɾ��</td>\r\n</tr>\r\n";
    }
    echo user_tree_list( $DEPT_ID );
}
if ( $USER_COUNT == 0 )
{
    echo "<tr class=\"TableControl\">\r\n  <td align=\"center\">δ�����û�</td>\r\n</tr>\r\n";
}
echo "\r\n</table>\r\n</body>\r\n</html>";
?><?
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