<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();
$IsWin = IsWin();
$fileName = "inc_fixedasset_page.php?FILENAME=TeacherInforViewTeacherInfor.php&DIR=InforSearch";
 ?>
<HEAD><TITLE>¹Ì¶¨×Ê²ú</TITLE>

    <frameset rows="*"  cols="140,*" frameborder="0" border="0" framespacing="0" id="frame2">
       <frame name="left" scrolling="auto" resize src="<?=$fileName ?>" frameborder="0">
       <frame name="edu_main" scrolling="auto" src="TeacherInforViewTeacherInfor.php" frameborder="0">
    </frameset>