<?php



$isBase64 = isBase64();
//进行_GET变量转换
$isBase64==1?CheckBase64():'';
session_start();
include_once( "inc/conn.php" );
include_once( "inc/utility_all.php" );

echo "\r\n<html>\r\n<head>\r\n
<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/".$LOGIN_THEME."/style.css\">
<title>权限管理</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\"><script src=\"/inc/js/module.js\"></script>\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"5\">\r\n\r\n";
$query = "select * from td_edu.systemprivateinc where `FILE`='".$_GET['FileName']."' and `MODULE`='".$_GET['ModuleName']."'";
$cursor = exequery( $connection, $query );
if ( $ROW = mysql_fetch_array( $cursor ) )
{	//( [0] => 1 [ID] => 1 [1] => inc_NewStudent_priv.php [FILE] => inc_NewStudent_priv.php [2] => 权限分配设定 [MODULE] => 权限分配设定 [3] => 1, [DEPT_ID] => 1, [4] => 系统管理组, [DEPT_NAME] => 系统管理组, [5] => 2,4,1,3,5, [ROLE_ID] => 2,4,1,3,5, [6] => 总经理,部门经理,OA 管理员,财务主管,职员, [ROLE_NAME] => 总经理,部门经理,OA 管理员,财务主管,职员, [7] => [USER_ID] => [8] => [USER_NAME] => ) 
	//print_R($ROW);exit;
    $PRIV_DEPT  = $ROW['DEPT_ID'];
    $PRIV_ROLE  = $ROW['ROLE_ID'];
    $PRIV_USER  = $ROW['USER_ID'];
	$PRIV_DEPT_NAME  = $ROW['DEPT_NAME'];
	$PRIV_ROLE_NAME  = $ROW['ROLE_NAME'];
	$PRIV_USER_NAME  = $ROW['USER_NAME'];
	//print_R($_GET);
}
echo "\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\" class=\"small\">\r\n  <tr>\r\n    <td class=\"small\"><img src=\"/images/edit.gif\" WIDTH=\"22\" HEIGHT=\"20\" align=\"absmiddle\"><span class=\"big3\"> 指定权限</span>\r\n";
echo "本模块子菜单默认条件下所有用户都可访问,设定可访问人员或范围以后只被允许访问人员可访问";
echo "    </td>\r\n  </tr>\r\n</table>\r\n\r\n<table class=\"TableBlock\" width=\"100%\" align=\"center\">\r\n  <form action=\"inc_crm_priv_user_submit.php\"  method=\"post\" name=\"form1\">\r\n   <tr>\r\n      <td nowrap class=\"TableContent\"\" align=\"center\">授权范围：<br>（人员）</td>\r\n      <td class=\"TableData\">\r\n        <input type=\"hidden\" name=\"COPY_TO_ID\" value=\"";
echo $PRIV_USER;
echo "\">\r\n        <textarea cols=40 name=\"COPY_TO_NAME\" rows=6 class=\"BigStatic\" wrap=\"yes\" readonly>";
echo $PRIV_USER_NAME;
echo "</textarea>\r\n        &nbsp;<input type=\"button\" value=\"添 加\" class=\"SmallButton\" onClick=\"SelectUser('','COPY_TO_ID','COPY_TO_NAME')\" title=\"选择人员\" name=\"button\">\r\n        &nbsp;<input type=\"button\" value=\"清 空\" class=\"SmallButton\" onClick=\"ClearUser('COPY_TO_ID','COPY_TO_NAME')\" title=\"清空人员\" name=\"button\">\r\n      </td>\r\n   </tr>\r\n   <tr>\r\n    <td nowrap  class=\"TableControl\" colspan=\"2\" align=\"center\">\r\n      <input type=\"hidden\" name=\"DISK_ID\" value=\"";
echo $DISK_ID;
echo "\">\r\n 

<input type=\"hidden\" name=\"ModuleName\" value=\"".$_GET['ModuleName']."\"/>
<input type=\"hidden\" name=\"FileName\" value=\"".$_GET['FileName']."\"/>
<input type=\"hidden\" name=\"FileNameSELF\" value=\"".$_GET['FileNameSELF']."\"/>
<input type=\"hidden\" name=\"FIELD_NAME\" value=\"";
echo $FIELD_NAME;
echo "\">\r\n        <input type=\"submit\" value=\"确定\" class=\"BigButton\">&nbsp;&nbsp;\r\n        \r\n    </td>\r\n  </form>\r\n</table>\r\n\r\n</body>\r\n</html>\r\n";


//判断GET变量是否为BASE64编码，不是很科学，需要进一步改进此函数
function isBase64()		{
	global $_SERVER;
	$QUERY_STRING = $_SERVER['QUERY_STRING'];
	$Code = base64_decode($QUERY_STRING);//print base64_decode($Code);
	$Array = explode('=',$Code);
	if(sizeof($Array)>1)		{
		return 1;
	}
	else 
		return 0;
}

//重置_GET变量
function CheckBase64()	{
	global $_GET,$_SERVER;
	$QUERY_STRING = $_SERVER['QUERY_STRING'];
	$QUERY_STRING_ARRAY = explode('&',$QUERY_STRING);
	$QUERY_STRING = $QUERY_STRING_ARRAY[0];
	$QUERY_STRING = base64_decode($QUERY_STRING);
	$Array = explode('&',$QUERY_STRING);
	$_GET = array();
	//形成新的_GET变量信息
	$NewArray = array();
	for($i=0;$i<sizeof($Array);$i++)		{
		if($Array[$i]!="")		{
			$ElementArray = explode('=',$Array[$i]);
			$_GET[(String)$ElementArray[0]] = $ElementArray[1];
			$NewArray[$i] = $ElementArray[0]."=".$ElementArray[1];
		}
	}
	//附加GET变量形成部分
	for($i=1;$i<sizeof($QUERY_STRING_ARRAY);$i++)		{
		if($QUERY_STRING_ARRAY[$i]!="")		{
			$ElementArray = explode('=',$QUERY_STRING_ARRAY[$i]);
			$_GET[(String)$ElementArray[0]] = $ElementArray[1];
			$NewArray[$i] = $ElementArray[0]."=".$ElementArray[1];
		}
	}
	//形成新的_SERVER变量信息
	$_SERVER['QUERY_STRING'] = join('&',$NewArray);	
	$_SERVER['REQUEST_URI'] = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
}



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