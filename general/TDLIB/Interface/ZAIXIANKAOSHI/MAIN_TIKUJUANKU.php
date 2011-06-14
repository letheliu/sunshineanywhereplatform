<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

require_once('systemprivateinc.php');

CheckSystemPrivate("网络学习系统-题库卷库");

$fileName = "../../Framework/inc_zaixianbaomingkaoshi_page.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<HEAD><TITLE>题库卷库</TITLE>
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" type=text/css rel=stylesheet>

<frameset rows="*"  cols="160,*" frameborder="0" border="0" framespacing="0" id="frame2">
       <frame name="left" scrolling="auto" resize src="<?=$fileName?>" frameborder="0">
       <frame name="edu_main" scrolling="auto" src="../Help/zaixianbaoming.php" frameborder="0">
</frameset>