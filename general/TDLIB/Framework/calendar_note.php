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
        $MANAGER_NAME = "<br>�����ˣ�".$rss->fields['USER_NAME'];
    }
    if ( $OVER_STATUS == "" || $OVER_STATUS == "1" )
    {
        if ( $MANAGER_NAME == "" )
        {
            $OVER_STATUS1 = "<br><font color='#00AA00'><b>�����</b></font>";
        }
        else
        {
            $OVER_STATUS1 = "<font color='#00AA00'><b>�����</b></font>";
        }
    }
    else if ( $OVER_STATUS == "0" )
    {
        if ( $MANAGER_NAME == "" )
        {
            $OVER_STATUS1 = "<br><font color='#FF0000'><b>δ���</b></font>";
        }
        else
        {
            $OVER_STATUS1 = "<font color='#FF0000'><b>δ���</b></font>";
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
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>