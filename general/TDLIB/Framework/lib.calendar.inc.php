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
        $CODE_NAME .= $rs->fields['CODE_NAME']."£¬";
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

?>