<?
require_once('cache.inc.php');
?>
<html>
<head>
<title>功能菜单区</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="images/style.css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-family: "宋体"}
-->
</style>

<script Language=JavaScript>

// ------ 定时刷新页面 -------
window.setTimeout('this.location.reload();',600000);  <!-- 定时刷新  -->


// <!--屏蔽鼠标右键开始-->
if (window.Event)
  document.captureEvents(Event.MOUSEUP);

function nocontextmenu()
{
 event.cancelBubble = true
 event.returnValue = false;

 return false;
}

function norightclick(e)
{
 if (window.Event)
 {
  if (e.which == 2 || e.which == 3)
   return false;
 }
 else
  if (event.button == 2 || event.button == 3)
  {
   event.cancelBubble = true
   event.returnValue = false;
   return false;
  }

}
document.oncontextmenu = nocontextmenu;  // for IE5+
document.onmousedown = norightclick;     // for all others
// <!--屏蔽鼠标右键结束-->

</script>
</head>


<body onselectstart="return false" style="margin:0;padding:0;">


<div style="background:url(images/pannel-top.gif);border-bottom:1px solid #778FAF;height:47px;">
<div class="obutton type1" id="menu_1" onclick="parent.view_menu(1)"><?=$菜单信息一名称?></div>
<div class="obutton type2" id="menu_2" onclick="parent.view_menu(2)" ><?=$菜单信息二名称?></div>
<div class="obutton type3" id="menu_3" onclick="parent.view_menu(3)" ><?=$菜单信息三名称?></div>
</div>
</body>
</html>
