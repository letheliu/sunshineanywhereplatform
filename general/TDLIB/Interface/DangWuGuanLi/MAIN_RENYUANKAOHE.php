<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
 
// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

require_once('systemprivateinc.php');

$TARGET_TITLE = "人力资源-人员考核";

$TARGET_ARRAY = $PRIVATE_SYSTEM['人力资源']['人员考核'];

$MenuArray = SystemPrivateInc($TARGET_ARRAY,$TARGET_TITLE);

$fileName = $MenuArray[0][0];

//print_R($MenuArray);
//下属子菜单的情况
$GROUP_ONE_MENU_NAME = $MenuArray[0][1];
$TARGET_TITLE = $TARGET_TITLE."-".$GROUP_ONE_MENU_NAME;
$TARGET_ARRAY = $TARGET_ARRAY[$GROUP_ONE_MENU_NAME];
$MenuArray = SystemPrivateInc($TARGET_ARRAY,$TARGET_TITLE);
//print_R($MenuArray);
//如果下属子菜单也只有一个菜单项,那么直接沿用下属菜单的那个菜单项
if(count($MenuArray)==1)	{
	$fileName = $MenuArray[0][0];
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<HEAD><TITLE>人员考核</TITLE>
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" type=text/css rel=stylesheet>
<frameset rows="30,*"  cols="*" frameborder="0" border="0" framespacing="0" id="frame1">
    <frame name="file_title" scrolling="no" noresize src="MAIN_RENYUANKAOHE_MENU.php" frameborder="0">
    <frame name="MAIN" scrolling="auto" src="<?=$fileName?>" frameborder="0">
</frameset>
