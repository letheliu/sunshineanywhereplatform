<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


GLOBAL $HTTP_SESSION_VARS;
include('./adodb/adodb.inc.php');
include('./adodb/adodb-session.php');
adodb_sess_open(false,false,false);
session_start();
$key=returnSessKey();
$sndg_community=$HTTP_SESSION_VARS[sndg_community];
$sess_val=adodb_sess_read($key) ;
if(!session_is_registered("sndg_community"))	{
//echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=error/notlogin.php'>";
}
//----------------------------------------------------------
//本函数来自于sms_index/目录
//----------------------------------------------------------
$elementid=$HTTP_GET_VARS[elementid];
$elementname=$HTTP_GET_VARS[elementname];
if($elementid==""||empty($elementid))		{	$elementid="TO_ID2df";		}
if($elementname==""||empty($elementname))	{	$elementname="TO_NAME2df";	}
require_once('lib.inc.php');
require_once('./sms_index/single_select.php');
//$choose_lang=getuser_lang($sndg_community);
page_css('Department list');
frame_user_js_($elementid,$elementname);
frame_user_header_();
frame_user_data_department(2);
?>
<br>
<hr>
<DIV align=center><INPUT class=BigButton onclick=parent.close(); type=button value=关闭> 
</DIV>
