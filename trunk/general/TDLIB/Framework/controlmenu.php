<?
session_start();
?>
<html>
<head>
<title>菜单显隐控制条</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<script language="JavaScript">
	var AUTO_HIDE_MENU=0;

var arrowpic1="images/control-button.gif";
var arrowpic2="images/control-button.gif"

//--------------------- 状态初始 ----------------------
var MENU_SWITCH;
function panel_menu_open()
{
 MENU_SWITCH=AUTO_HIDE_MENU;
 panel_menu_ctrl();
}


//------------------ 面板状态切换 ---------------------
function panel_menu_ctrl()
{
   if(MENU_SWITCH==0)
   {
      parent.frame2.cols="7,190,5,9,*,0";
      MENU_SWITCH=1;
      arrow.src=arrowpic1;
   }
   else
   {
      parent.frame2.cols="0,0,0,9,*,0";
      MENU_SWITCH=0;
      arrow.src=arrowpic2;
   }
}


//------------------ 面板状态切换 ---------------------
function enter_menu_ctrl()
{
   if(AUTO_HIDE_MENU==1)    // 判断面板是否允许自动隐藏
   {
     if(MENU_SWITCH==0)
     {
        parent.frame2.cols="7,190,5,9,*,0";
        MENU_SWITCH=1;
        arrow.src=arrowpic1;
     }
     else
     {
        parent.frame2.cols="0,0,0,9,*,0";
        MENU_SWITCH=0;
        arrow.src=arrowpic2;
     }
   }
}


//--------------- 上下框架页显示控制 -----------------
var DB_VIEW=0;                          // 状态值初始
var DB_rows=parent.parent.frame1.rows;  // 保存原始值
function DB_Display()
{
   if (DB_VIEW==0)     // 未隐藏
   {
    parent.parent.frame1.rows="0,0,*,0";
	DB_VIEW=1;
   }
   else                // 已隐藏
   {
    parent.parent.frame1.rows=DB_rows;
    DB_VIEW=0;
   }
}




</script>


</head>
<link rel='stylesheet' type='text/css' href='/theme/<?=$_SESSION['LOGIN_THEME']?>/style.css'>
<body topmargin="0" class=bodycolor leftmargin="0">

<table width="9" height="100%" border="0" cellpadding="0" cellspacing="0"  onMouseMove="enter_menu_ctrl()" >
<tr style="cursor:hand" onclick="panel_menu_ctrl()">
    <td style="background:url(images/control-bg.gif) repeat-y;">
	<img id="arrow" src="images/control-button.gif" width="9" height="57" GALLERYIMG="no"  alt="左键点击控制菜单栏面板，右键点击控制上下状态栏。"/>
	</td>
  </tr>
</table>


</body>
</html>
