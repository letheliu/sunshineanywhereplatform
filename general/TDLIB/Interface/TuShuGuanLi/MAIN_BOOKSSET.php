<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

require_once('systemprivateinc.php');

$TARGET_TITLE = "数字化图书馆-图书管理";

$TARGET_ARRAY = $PRIVATE_SYSTEM['数字化图书馆']['图书管理'];

$MenuArray = SystemPrivateInc($TARGET_ARRAY,$TARGET_TITLE);

$fileName = $MenuArray[0][0];

if(count($MenuArray)==1)  {
	//当只有一个页面时,自动跳转页面
	EDU_Indextopage($fileName,$nums='0');
	exit;
}


 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<HEAD><TITLE>图书管理</TITLE>
<LINK href="/theme/<?=$LOGIN_THEME ?>/style.css" type=text/css rel=stylesheet>
<frameset rows="30,*"  cols="*" frameborder="0" border="0" framespacing="0" id="frame1">
    <frame name="file_title" scrolling="no" noresize src="MAIN_BOOKSSET_MENU.php" frameborder="0">
    <frame name="edu_main2" scrolling="auto" src="<?=$fileName ?>" frameborder="0">
</frameset>
