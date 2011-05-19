<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="images/style.css">
<title>菜单选项</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<script>


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

<body topmargin="0" leftmargin="0" onselectstart="return false" onload="parent.init_menu()" style="background:#000 url(images/side-bottom-bg.gif) repeat-x;">


</body>
</html>
