<?


function get_code_name( $CODE_NO, $PARENT_NO )
{
    global $db,$_SESSION;
	if($_SESSION['SYSTEM_IS_TD_OA']==1)			{
		$query = "SELECT CODE_NAME from TD_OA.SYS_CODE where PARENT_NO='".$PARENT_NO."' and find_in_set(CODE_NO,'{$CODE_NO}')";
	}
	else	{
		$query = "SELECT CODE_NAME from SYS_CODE where PARENT_NO='".$PARENT_NO."' and find_in_set(CODE_NO,'{$CODE_NO}')";
	}
	//print $query;
    $rs = $db->Execute($query);
    while ( !$rs->EOF )
    {
        $CODE_NAME .= $rs->fields['CODE_NAME']."，";
		$rs->MoveNext();
    }
    return substr( $CODE_NAME, 0, -2 );
}


function compare_time( $TIME1, $TIME2 )
{
    $STR = strtok( $TIME1, ":" );
    $HOUR1 = $STR;
    $STR = strtok( ":" );
    $MIN1 = $STR;
    $STR = strtok( ":" );
    $SEC1 = $STR;
    $STR = strtok( $TIME2, ":" );
    $HOUR2 = $STR;
    $STR = strtok( ":" );
    $MIN2 = $STR;
    $STR = strtok( ":" );
    $SEC2 = $STR;
    if ( $HOUR2 < $HOUR1 )
    {
        return 1;
    }
    if ( $HOUR1 < $HOUR2 )
    {
        return -1;
    }
    if ( $MIN2 < $MIN1 )
    {
        return 1;
    }
    if ( $MIN1 < $MIN2 )
    {
        return -1;
    }
    if ( $SEC2 < $SEC1 )
    {
        return 1;
    }
    if ( $SEC1 < $SEC2 )
    {
        return -1;
    }
    return 0;
}


function csubstr( &$str, $start = 0, $long = 0, $ltor = TRUE, $cn_len = 2 )
{
    if ( $long == 0 )
    {
        $long = strlen( $str );
    }
    if ( !$ltor )
    {
        $str = cstrrev( $str );
    }
    if ( $cn_len == 1 )
    {
        $i = 0;
        $fs = 0;
        for ( ; $i < $start; ++$fs )
        {
            $i += ord( $str[$fs] ) <= 160 ? 1 : 0.5;
        }
        $i = 0;
        $fe = $fs;
        for ( ; $i < $long; ++$fe )
        {
            $i += ord( $str[$fe] ) <= 160 ? 1 : 0.5;
        }
        $long = $fe - $fs;
    }
    else
    {
        $fs = is_chinese( &$str, $start ) == 1 ? $start - 1 : $start;
        $fe = $long + $start - 1;
        $end = is_chinese( &$str, $fe ) == -1 ? $fe - 1 : $fe;
        $long = $end - $fs + 1;
    }
    $f_str = substr( $str, $fs, $long );
    if ( !$ltor )
    {
        $f_str = cstrrev( $f_str );
    }
    return $f_str;
}


function is_chinese( &$str, $location )
{
    $ch = TRUE;
    $i = $location;
    while ( 160 < ord( $str[$i] ) && 0 <= $i )
    {
        $ch = !$ch;
        --$i;
    }
    if ( $i != $location )
    {
        $f_str = $ch ? 1 : -1;
        return $f_str;
    }
    $f_str = FALSE;
    return $f_str;
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