<?php

include_once( "inc/auth.php" );
$MENU_LEFT = array( );
$target = "user_main";
$user_list = array(
	"PARA_URL1" => "",
	"PARA_URL2" => "/general/system/user/user_edit.php",
	"PARA_TARGET" => $target,
	"PRIV_NO_FLAG" => "3",
	"MANAGE_FLAG" => "1",
	"xname" => "system_user",
	"showButton" => "0",
	"include_file" => "inc/user_list/index.php"
);
$MENU_LEFT[count( $MENU_LEFT )] = array(
	"text" => "在职人员",
	"href" => "",
	"onclick" => "clickMenu",
	"target" => $target,
	"title" => "点击伸缩列表",
	"img" => "",
	"module" => $user_list,
	"module_style" => ""
);
$query = "SELECT * from USER where USER_ID='".$LOGIN_USER_ID."'";
$cursor = exequery( $connection, $query );
if ( $ROW = mysql_fetch_array( $cursor ) )
{
	$POST_PRIV = $ROW['POST_PRIV'];
}
if ( $POST_PRIV == "1" )
{
	$query = "SELECT * from USER_PRIV where USER_PRIV=".$LOGIN_USER_PRIV;
	$cursor = exequery( $connection, $query );
	if ( $ROW = mysql_fetch_array( $cursor ) )
	{
		$PRIV_NO = $ROW['PRIV_NO'];
	}
	$user_out = "<table class=\"TableBlock\" width=\"100%\" align=\"center\">";
	if ( $LOGIN_USER_PRIV != "1" )
	{
		$query = "SELECT * from USER,USER_PRIV where DEPT_ID=0 and USER.USER_PRIV=USER_PRIV.USER_PRIV and USER_PRIV.PRIV_NO>".$PRIV_NO." and USER_PRIV.USER_PRIV!=1 order by PRIV_NO,USER_NO,USER_NAME";
	}
	else
	{
		$query = "SELECT * from USER,USER_PRIV where DEPT_ID=0 and USER.USER_PRIV=USER_PRIV.USER_PRIV order by PRIV_NO,USER_NO,USER_NAME";
	}
	$cursor = exequery( $connection, $query );
	while ( $ROW = mysql_fetch_array( $cursor ) )
	{
		++$USER_COUNT;
		$USER_ID = $ROW['USER_ID'];
		$USER_NAME = $ROW['USER_NAME'];
		$USER_PRIV = $ROW['USER_PRIV'];
		$query1 = "SELECT * from USER_PRIV where USER_PRIV='".$USER_PRIV."'";
		$cursor1 = exequery( $connection, $query1 );
		if ( $ROW = mysql_fetch_array( $cursor1 ) )
		{
			$USER_PRIV = $ROW['PRIV_NAME'];
		}
		$user_out .= "\r\n   <tr class=\"TableData\" align=\"center\">\r\n     <td nowrap width=\"80\">".$USER_PRIV."</td>\r\n     <td nowrap><a href=\"user_edit.php?USER_ID=".$USER_ID."&DEPT_ID=0\" target=".$target.">".$USER_NAME."</a></td>\r\n   </tr>";
	}
	$user_out .= "</table>";
	$module_style = "display:none;";
	
}

include_once( "inc/menu_left.php" );
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