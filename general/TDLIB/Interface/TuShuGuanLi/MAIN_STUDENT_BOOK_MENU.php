<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME ?>/menu_top.css">
<script>
window.onload=function()
{
   var type=2-2;
   var menu_id=0,menu=document.getElementById("navMenu");
   if(!menu) return;

   for(var i=0; i<menu.childNodes.length;i++)
   {
      if(menu.childNodes[i].tagName!="A")
         continue;
      if(menu_id==type)
         menu.childNodes[i].className="active";

      menu.childNodes[i].onclick=function(){
         var menu=document.getElementById("navMenu");
         for(var i=0; i<menu.childNodes.length;i++)
         {
            if(menu.childNodes[i].tagName!="A")
               continue;
            menu.childNodes[i].className="";
         }
         this.className="active";
      }
      menu_id++;
   }
};
</script>
</head>
<body>
<div id="navPanel">
  <div id="navMenu">
<?
require_once('systemprivateinc.php');

$MenuArray[] = array("bookszhuangtai_newai.php","学生借阅");
$MenuArray[] = array("bookssetleibie_newai.php","借阅明细");
$MenuArray[] = array("bookssetleibie_newai.php","丢失赔偿");




for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单地址 = $MenuArray[$i][0];
	$菜单名称 = $MenuArray[$i][1];
	$菜单TITLE = $MenuArray[$i][2];

	print "<A hideFocus title=$菜单名称 href=\"$菜单地址\" target=edu_main22>
	<SPAN><IMG border=0 src=\"images/notify_new.gif\" align=absMiddle>$菜单名称</SPAN></A> ";
}



 ?>
