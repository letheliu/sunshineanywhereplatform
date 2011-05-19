<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("学生管理-综合事务-社团");
$fileName = "../../Framework/inc_shetuan_page.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<HEAD><TITLE>社团管理</TITLE>
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" type=text/css rel=stylesheet>

<frameset rows="*"  cols="160,*" frameborder="0" border="0" framespacing="0" id="frame2">
       <frame name="left" scrolling="auto" resize src="<?=$fileName?>" frameborder="0">
       <frame name="edu_main" scrolling="auto" src="xingzheng_association_newai.php" frameborder="0">
</frameset>