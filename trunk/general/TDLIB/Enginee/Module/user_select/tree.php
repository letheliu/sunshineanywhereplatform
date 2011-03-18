<?php


function deptListTree( $PARENT_ID )
{
    global $connection;
    global $LOGIN_USER_ID;
    global $LOGIN_DEPT_ID;
    global $LOGIN_USER_PRIV;
    global $PRIV_NO_FLAG;
    global $PARA_URL;
    global $PARA_TARGET;
    global $PARA_ID;
    global $PARA_VALUE;
    global $showButton;
    $query = "SELECT * from DEPARTMENT where DEPT_PARENT='".$PARENT_ID."' order by DEPT_NO";
    $cursor1 = exequery( $connection, $query );
    while ( $ROW = mysql_fetch_array( $cursor1 ) )
    {
        $DEPT_ID1 = $ROW['DEPT_ID'];
        $DEPT_NAME1 = $ROW['DEPT_NAME'];
        $DEPT_NAME1 = htmlspecialchars( $DEPT_NAME1 );
        $DEPT_NAME1 = str_replace( "\"", "&quot;", $DEPT_NAME1 );
        $DEPT_NAME1 = stripslashes( $DEPT_NAME1 );
        $CHILD_COUNT = 0;
        $query = "SELECT 1 from DEPARTMENT where DEPT_PARENT='".$DEPT_ID1."'";
        $cursor2 = exequery( $connection, $query );
        if ( $ROW1 = mysql_fetch_array( $cursor2 ) )
        {
            ++$CHILD_COUNT;
        }
        if ( $PRIV_NO_FLAG )
        {
            $DEPT_PRIV1 = is_dept_priv( $DEPT_ID1 );
        }
        else
        {
            $DEPT_PRIV1 = 1;
        }
        if ( $DEPT_PRIV1 == 1 )
        {
            $XML_TEXT_DEPT .= "<TreeNode id=\"".$DEPT_ID1."\" text=\"[{$DEPT_NAME1}]\" ";
        }
        else
        {
            $XML_TEXT_DEPT .= "<TreeNode id=\"".$DEPT_ID1."\" text=\"{$DEPT_NAME1}\" ";
        }
        if ( $showButton )
        {
            $XML_TEXT_DEPT .= "onclick=\"click_node('".$DEPT_ID1."',this.checked,'{$PARA_ID}','".str_replace( ".", "&amp;", $PARA_VALUE )."');\" ";
        }
        if ( $PARA_URL != "" && $DEPT_PRIV1 == 1 )
        {
            if ( $PARA_ID == "" )
            {
                $URL = "{$PARA_URL}?DEPT_ID={$DEPT_ID1}";
            }
            else
            {
                $URL = "{$PARA_URL}?DEPT_ID={$DEPT_ID1}&amp;{$PARA_ID}=".str_replace( ".", "&amp;", $PARA_VALUE );
            }
            $XML_TEXT_DEPT .= "href=\"".$URL."\" target=\"{$PARA_TARGET}\"";
        }
        else
        {
            $XML_TEXT_DEPT .= "href=\"javascript:;\" target=\"_self\"";
        }
        $XML_TEXT_DEPT .= " img_src=\"../../../Framework/images/endnode.gif\" title=\"".$DEPT_NAME1."\"";
        if ( 0 < $CHILD_COUNT )
        {
            $XML_TEXT_DEPT .= " Xml=\"tree.php?DEPT_ID=".$DEPT_ID1."&amp;PARA_URL={$PARA_URL}&amp;PARA_TARGET={$PARA_TARGET}&amp;PRIV_NO_FLAG={$PRIV_NO_FLAG}&amp;PARA_ID={$PARA_ID}&amp;PARA_VALUE={$PARA_VALUE}&amp;showButton={$showButton}\"";
        }
        $XML_TEXT_DEPT .= "/>\n";
    }
    return $XML_TEXT_DEPT;
}

include_once( "../user_select/setting.inc.php" );
//
ob_end_clean( );
header( "Content-type: text/xml" );
$PARENT_ID = $DEPT_ID;
echo "<?xml version=\"1.0\" encoding=\"gb2312\"?>\n<TreeNode>\n";
if ( $PARENT_ID == 0 )
{
    $query = "SELECT * from UNIT";
    $cursor = exequery( $connection, $query );
    if ( $ROW = mysql_fetch_array( $cursor ) )
    {
        $UNIT_NAME = $ROW['UNIT_NAME'];
    }
    $UNIT_NAME = htmlspecialchars( $UNIT_NAME );
    $UNIT_NAME = str_replace( "\"", "&quot;", $UNIT_NAME );
    $UNIT_NAME = stripslashes( $UNIT_NAME );
    echo "  <TreeNode id=\"0\"";
    if ( $showButton )
    {
        echo " onclick=\"click_node('0',this.checked,'".$PARA_ID."','".str_replace( ".", "&amp;", $PARA_VALUE )."');\"";
    }
    echo " text=\"";
    echo $UNIT_NAME;
    echo "\" Xml=\"\" img_src=\"../../../Framework/images/endnode.gif\">\n";
    echo deptlisttree( $PARENT_ID );
    echo "  </TreeNode>\n";
}
else
{
    echo deptlisttree( $PARENT_ID );
}
echo "</TreeNode>\n";
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