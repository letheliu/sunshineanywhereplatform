<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
$common_html=returnsystemlang('common_html');
$lang=returnsystemlang();
$_GET['action']=isset($_GET['action'])?$_GET['action']:'bottom';
switch($_GET['action'])				{
	case 'bottom':

?>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" type=text/css rel=stylesheet>
<script type="text/javascript" language="javascript" src="../Enginee/lib/common.js"></script>

<BODY class=bodycolor topMargin=5>
<DIV align=right>
<INPUT class=SmallButton onclick=parent.close(); type=button value='<?=$common_html['common_html']['close']?>'</DIV></BODY></HTML>

<?
	break;
}
?>