<?
require_once('cache.inc.php');
?>
<html>
<head>
<title>系统标题栏</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="images/style.css">
<script language="JavaScript">

// 显示服务器的当前时间
var OA_TIME = new Date();
function timeview()
{
  timestr=OA_TIME.toLocaleString();
  timestr=timestr.substr(timestr.indexOf(" "));
  OA_TIME.setSeconds(OA_TIME.getSeconds()+1);
  window.setTimeout( "timeview()", 1000 );
}

// 询问注销系统
function iflogout()
{
if(window.confirm('确定重新登录吗？'))
 {
  parent.parent.location="<?=$首页BANNER系统注销?>";        // 页面跳转
 }
}


// 返回桌面
function GoTable()
{
  parent.parent.table_index.table_main.location="MainDataWindows.php";
}

//修改我的密码
function ChangePAD()
{
  parent.parent.table_index.table_main.location="<?=$首页BANNER修改密码?>";
}

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

// <!--屏蔽鼠标右键结束-->

</script>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" padding="0" onselectstart="return false" >
<div id="topWrap">
	<h1><?=$首页BANNER标题?></h1>
	<div id="topInner">

		<div class="topButton" onClick="javascript:iflogout();">
			<div class="topButton-inner">
			<span class="relogin">注销</span>
			</div>
		</div>
		<div class="topButton" onClick="javascript:ChangePAD();">
			<div class="topButton-inner">
			<span class="desktop">修改密码</span>
			</div>
		</div>
		<div class="topButton" onClick="javascript:GoTable();">
			<div class="topButton-inner">
			<span class="desktop">我的桌面</span>
			</div>
		</div>
	</div>
</div>



</body>
</html>
