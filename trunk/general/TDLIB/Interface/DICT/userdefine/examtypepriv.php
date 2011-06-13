<?

function examtypepriv_Value( $fieldvalue, $fields, $i )
{
				global $db;
				global $tablename;
				global $html_etc;
				global $common_html;
				global $SYSTEM_PRIV_ROW;

				return $fieldvalue;
}

function examtypepriv_Value_PRIV( $fieldvalue, $fields, $i )
{
				global $db;
				global $tablename;
				global $html_etc;
				global $common_html;
				switch ( $fieldvalue )
				{
					case "ÆÚÄ©¿¼ÊÔ" :
					case "ÆÚÖÐ¿¼ÊÔ" :
						$SYSTEM_STOP_ROW = 1;
						break;
				}
				return $SYSTEM_STOP_ROW;
}
?>