<?php
session_start();

include_once( "../user_select/setting.inc.php" );

print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />";
echo "\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n</head>\r\n<script Language=\"JavaScript\">\r\nvar parent_window = parent.dialogArguments;\r\n";
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
echo ".value;\r\n\r\n  for (step_i=0; step_i<document.all.length; step_i++)\r\n  {\r\n    if(document.all(step_i).className.indexOf(\"menulines\")>=0)\r\n    {\r\n       user_id=document.all(step_i).id;\r\n       if(TO_VAL.indexOf(\",\"+user_id+\",\")>0 || TO_VAL.indexOf(user_id+\",\")==0)\r\n          borderize_on(document.all(step_i));\r\n    }\r\n  }\r\n}\r\n\r\nfunction add_all()\r\n{\r\n  TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n  for (step_i=0; step_i<document.all.length; step_i++)\r\n  {\r\n    if(document.all(step_i).className.indexOf(\"menulines\")>=0)\r\n    {\r\n       user_id=document.all(step_i).id;\r\n       user_name=document.all(step_i).name;\r\n\r\n       if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)\r\n       {\r\n         parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value+=user_id+\",\";\r\n         parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value+=user_name+\",\";\r\n         borderize_on(document.all(step_i));\r\n       }\r\n    }\r\n  }\r\n}\r\n\r\nfunction del_all()\r\n{\r\n  for (step_i=0; step_i<document.all.length; step_i++)\r\n  {\r\n    TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n    if(document.all(step_i).className.indexOf(\"menulines\")>=0)\r\n    {\r\n       user_id=document.all(step_i).id;\r\n       user_name=document.all(step_i).name;\r\n       if(TO_VAL.indexOf(user_id+\",\")==0)\r\n       {\r\n          parent_window.";
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
echo ".value.replace(\",\"+user_name+\",\",\",\");\r\n          borderize_off(document.all(step_i));\r\n       }\r\n    }\r\n  }\r\n}\r\n</script>\r\n<body class=\"bodycolor\" topmargin=\"5\" leftmargin=\"2\" onload=\"begin_set();\">\r\n\r\n<table class=\"TableBlock\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\">人员查询</td>\r\n</tr>\r\n";
$query = "SELECT USER_ID,USER_NAME from USER where (USER_ID like '%".$USER_NAME."%' or USER_NAME like '%{$USER_NAME}%') and DEPT_ID!=0 and NOT_LOGIN!='1' order by USER_NO,USER_NAME";
$cursor = exequery( $connection, $query );
$USER_COUNT = 0;
while ( $ROW = mysql_fetch_array( $cursor ) )
{
    ++$USER_COUNT;
    $USER_ID = $ROW['USER_ID'];
    $USER_NAME = $ROW['USER_NAME'];
    if ( $USER_COUNT == 1 )
    {
        echo "<tr class=\"TableData\">\r\n  <td onclick=\"javascript:add_all();\" style=\"cursor:hand\" align=\"center\">全部添加</td>\r\n</tr>\r\n<tr class=\"TableData\">\r\n  <td onclick=\"javascript:del_all();\" style=\"cursor:hand\" align=\"center\">全部删除</td>\r\n</tr>\r\n";
    }
    echo "<tr class=\"TableData\" onclick=\"javascript:click_user('";
    echo $USER_ID;
    echo "')\" style=\"cursor:hand\" align=\"center\">\r\n  <td class=\"menulines\" id=\"";
    echo $USER_ID;
    echo "\" name=\"";
    echo $USER_NAME;
    echo "\">\r\n  ";
    echo htmlspecialchars( $USER_NAME );
    echo "  </td>\r\n</tr>\r\n\r\n";
}
if ( $USER_COUNT == 0 )
{
    echo "<tr class=\"TableData\">\r\n  <td align=\"center\">未查询到用户</td>\r\n</tr>\r\n";
}
echo "\r\n</table>\r\n</body>\r\n</html>";
?><?
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