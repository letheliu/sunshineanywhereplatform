<?php

require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();

?>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/style.css" />
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/menu_left.css" />
<script src="../../../../../inc/js/ccorrect_btn.js"></script>
<?

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
echo ".value=\"\";\r\n}\r\n\r\n</script>\r\n</head>\r\n\r\n<body class=\"bodycolor\"  topmargin=\"0\" leftmargin=\"0\">\r\n\r\n<table border=\"0\" cellspacing=\"1\" width=\"100%\" class=\"small\"  cellpadding=\"2\" align=\"center\">\r\n   <tr>\r\n     <td nowrap align=\"right\">\r\n     \t<input type=\"button\" class=\"SmallButton\" value=\"清 空\" onclick=\"clear_user();\">&nbsp;&nbsp;\r\n     \t<input type=\"button\" class=\"SmallButton\" value=\"关 闭\" onclick=\"window.close();\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n     </td>\r\n   </tr>\r\n</table>\r\n\r\n</body>\r\n</html>\r\n";
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