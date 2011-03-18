<?php
@ini_set('display_errors', 1);
@ini_set('error_reporting', E_ALL);
@error_reporting(E_WARNING | E_ERROR);
@ini_set("default_charset","gb2312");
@ini_set("memory_limit","128M");
@ini_set("max_execution_time","1200");
@ini_set("max_input_time","1200");


function OpenConnection( )
{
    global $connection;
    global $MYSQL_SERVER;
    global $MYSQL_USER;
    global $MYSQL_PASS;
    global $MYSQL_DB;
    if ( !$connection )
    {
        $C = @mysql_pconnect( $MYSQL_SERVER, $MYSQL_USER, $MYSQL_PASS, MYSQL_CLIENT_COMPRESS );
    }
    else
    {
        $C = $connection;
    }
    mysql_query( "SET CHARACTER SET GBK", $C );
    if ( !$C )
    {
        printerror( "不能连接到MySQL数据库" );
        exit( );
    }
    $result = mysql_select_db( $MYSQL_DB, $C );
    if ( !$result )
    {
        printerror( "数据库 ".$MYSQL_DB."不存在" );
    }
    return $C;
}

function exequery( $C, $Q )
{
    if ( stristr( $Q, " union select" ) )
    {
        exit( );
    }
    $cursor = mysql_query( $Q, $C );
    if ( !$cursor )
    {
        printerror( "<b>SQL语句:</b> ".$Q );
    }
    return $cursor;
}

function PrintError( $MSG )
{
    echo "<fieldset>  <legend><b>错误</b></legend>";
    echo "<b>#".mysql_errno( ).":</b> ".mysql_error( )."<br>";
    global $SCRIPT_FILENAME;
    echo $MSG."<br>";
    echo "<b>文件:</b> ".$SCRIPT_FILENAME;
    if ( mysql_errno( ) == 1030 )
    {
        echo "<br>数据库错误。";
    }
    echo "</fieldset>";
}
//print_R($_SERVER);
require_once($_SERVER['DOCUMENT_ROOT']."/inc/oa_config.php");
include_once( "../../../config.inc.php" );

$connection = openconnection( );


function Message( $TITLE, $CONTENT, $STYLE = "" )
{
    $WIDTH = strlen( $CONTENT ) * 10 + 140;
    $WIDTH = 500 < $WIDTH ? 500 : $WIDTH;
    if ( $STYLE == "blank" )
    {
        $WIDTH -= 70;
    }
    if ( $STYLE == "" )
    {
        if ( $TITLE == "错误" )
        {
            $STYLE = "error";
        }
        else if ( $TITLE == "警告" )
        {
            $STYLE = "warning";
        }
        else if ( $TITLE == "停止" )
        {
            $STYLE = "stop";
        }
        else if ( $TITLE == "禁止" )
        {
            $STYLE = "forbidden";
        }
        else if ( $TITLE == "帮助" )
        {
            $STYLE = "help";
        }
        else
        {
            $STYLE = "info";
        }
    }
    echo "<table class=\"MessageBox\" align=\"center\" width=\"";
    echo $WIDTH;
    echo "\">\r\n  <tr>\r\n    <td class=\"msg ";
    echo $STYLE;
    echo "\">\r\n";
    if ( $TITLE != "" )
    {
        echo "      <h4 class=\"title\">";
        echo $TITLE;
        echo "</h4>\r\n";
    }
    echo "      <div class=\"content\">";
    echo $CONTENT;
    echo "</div>\r\n    </td>\r\n  </tr>\r\n</table>\r\n";
}




//重新初始化变更,应对REGISTER_GLOBALS为OFF时的情况
$_GETKeyArray = @array_keys($_GET);
for($i=0;$i<sizeof($_GETKeyArray);$i++)			{
	$_GETKey	= $_GETKeyArray[$i];
	$$_GETKey	= $_GET[$_GETKey];
}

$_POSTKeyArray = @array_keys($_POST);
for($i=0;$i<sizeof($_POSTKeyArray);$i++)			{
	$_POSTKey	= $_POSTKeyArray[$i];
	$$_POSTKey	= $_POST[$_POSTKey];
}


$_COOLIESKeyArray = @array_keys($_COOLIES);
for($i=0;$i<sizeof($_COOLIESKeyArray);$i++)			{
	$_COOLIESKey	= $_COOLIESKeyArray[$i];
	$$_COOLIESKey	= $_COOLIES[$_COOLIESKey];
}

$_SESSIONKeyArray = @array_keys($_SESSION);
for($i=0;$i<sizeof($_SESSIONKeyArray);$i++)			{
	$_SESSIONKey	= $_SESSIONKeyArray[$i];
	$$_SESSIONKey	= $_SESSION[$_SESSIONKey];
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