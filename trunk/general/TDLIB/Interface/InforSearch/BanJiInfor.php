<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();
$IsWin = IsWin();
$fileName = "../../Framework/inc_banji_page.php?FILENAME=BanJiInforViewBanjiInfor.php&DIR=InforSearch";
 ?>
<HEAD><TITLE>教师教学内容管理</TITLE>
<frameset rows="30,*"  cols="*" frameborder="0" border="0" framespacing="0" id="frame1">
    <frame name="file_title" scrolling="no" noresize src="BanJiInforHeader.php" frameborder="0">
    <frameset rows="*"  cols="230,*" frameborder="0" border="0" framespacing="0" id="frame2">
       <frame name="left" scrolling="auto" resize src="<?=$fileName ?>" frameborder="0">
       <frame name="edu_main" scrolling="auto" src="BanJiInforViewBanjiInfor.php" frameborder="0">
    </frameset>
</frameset>