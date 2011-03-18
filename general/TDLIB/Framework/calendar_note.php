<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
echo "<html>";
$query  = "select * from CALENDAR where CAL_ID='".$CAL_ID."' and USER_ID='{$LOGIN_USER_ID}'";
$rs		= $db->Execute($query);
if (!$rs->EOF)
{
    $CAL_TIME = $rs->fields['CAL_TIME'];
    $END_TIME = $rs->fields['END_TIME'];
    $CONTENT  = $rs->fields['CONTENT'];
    $OVER_STATUS = $rs->fields['OVER_STATUS'];
    $CONTENT = str_replace( "<", "&lt", $CONTENT );
    $CONTENT = str_replace( ">", "&gt", $CONTENT );
    $CONTENT = stripslashes( $CONTENT );
    $MANAGER_ID = $rs->fields['MANAGER_ID'];
    $MANAGER_NAME = "";
    if ( $MANAGER_ID != "" )
    {
        $query		= "SELECT * from USER where USER_ID='".$MANAGER_ID."'";
        $rss		= $db->Execute($query);
        $MANAGER_NAME = "<br>安排人：".$rss->fields['USER_NAME'];
    }
    if ( $OVER_STATUS == "" || $OVER_STATUS == "1" )
    {
        if ( $MANAGER_NAME == "" )
        {
            $OVER_STATUS1 = "<br><font color='#00AA00'><b>已完成</b></font>";
        }
        else
        {
            $OVER_STATUS1 = "<font color='#00AA00'><b>已完成</b></font>";
        }
    }
    else if ( $OVER_STATUS == "0" )
    {
        if ( $MANAGER_NAME == "" )
        {
            $OVER_STATUS1 = "<br><font color='#FF0000'><b>未完成</b></font>";
        }
        else
        {
            $OVER_STATUS1 = "<font color='#FF0000'><b>未完成</b></font>";
        }
    }
    $TITLE = csubstr( $CONTENT, 0, 10 );
    $CAL_TIME = substr( $CAL_TIME, 0, -3 );
    $END_TIME = substr( $END_TIME, 11, -3 );
}
echo "<head><title>";
echo $TITLE;
echo " </title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\"></head><body bgcolor=\"#FFFFCC\" topmargin=\"5\"><div class=\"small\">";
echo $CAL_TIME;
echo " - ";
echo $END_TIME;
echo " ";
echo $OVER_STATUS1;
echo " ";
echo $MANAGER_NAME;
echo " <hr>";
echo $CONTENT;
echo "</div></body></html>";
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