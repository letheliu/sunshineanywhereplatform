<?php
session_start();

include_once( "../user_select/setting.inc.php" );
//
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
if ( $USER_PRIV == "" )
{
    if ( $MANAGE_FLAG )
    {
        $query = "SELECT USER_ID,USER_NAME from USER,USER_PRIV where DEPT_ID=".$DEPT_ID." and USER.USER_PRIV=USER_PRIV.USER_PRIV order by PRIV_NO,USER_NO,USER_NAME";
    }
    else
    {
        $query = "SELECT USER_ID,USER_NAME from USER,USER_PRIV where DEPT_ID=".$DEPT_ID." and USER.USER_PRIV=USER_PRIV.USER_PRIV and NOT_LOGIN!='1' order by PRIV_NO,USER_NO,USER_NAME";
    }
}
else if ( $MANAGE_FLAG )
{
    $query = "SELECT USER_ID,USER_NAME from USER where USER_PRIV='".$USER_PRIV."' and DEPT_ID!=0 order by USER_NO,USER_NAME";
}
else
{
    $query = "SELECT USER_ID,USER_NAME from USER where USER_PRIV='".$USER_PRIV."' and DEPT_ID!=0 and NOT_LOGIN!='1' order by USER_NO,USER_NAME";
}
$cursor = exequery( $connection, $query );
$USER_COUNT = 0;
while ( $ROW = mysql_fetch_array( $cursor ) )
{
    ++$USER_COUNT;
    $USER_ID = $ROW['USER_ID'];
    $USER_NAME = $ROW['USER_NAME'];
    if ( $USER_COUNT == 1 )
    {
        echo "<table class=\"TableBlock\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>ѡ����Ա</b></td>\r\n</tr>\r\n\r\n";
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
    message( "", "û�ж����û�", "blank" );
}
else
{
    echo "</table>";
}
echo "\r\n</body>\r\n</html>\r\n";
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>