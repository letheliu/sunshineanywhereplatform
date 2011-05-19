<html>
<head>
<title>菜单左边条</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="/theme/3/style.css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-size:12px;
}
#welcome {
		float: left;
		width: 210px;
		padding-left:8px;
		font-size: 12px;
		text-align: center;
		height:27px;
		line-height:27px;
		background:#D8F9FF;
	}
	#welcome span {
		color:#E94200;
		font-weight:bold;
	}
-->
</style>

<script language="JavaScript">

// 显示服务器的当前时间
var OA_TIME = new Date();
function timeview()
{
  timestr=OA_TIME.toLocaleString();
  timestr=timestr.substr(timestr.indexOf(" "));
  time_area.innerHTML = timestr;
  OA_TIME.setSeconds(OA_TIME.getSeconds()+1);
  window.setTimeout( "timeview()", 1000 );
}

// 跳转菜单部分
function GoMenu(ID)
{
  parent.parent.function_panel_index.menu_main.location="../general/EDU/Framework/menu.php?XX=XX&MENU_ID="+ID+"";
}
</script>
</head>
<body bgcolor="#D6F6FF" onload="timeview();">
<div style="height:27px;">
	<div style="height:27px;">
		<div id="welcome">
		欢迎您，<span>系统管理员</span>
		</div>
		<div id="ico">
					<a href="#" onClick="javascript:GoMenu('20')" class="togo"><img title="系统管理" src="/images/menu/EDU.gif" width=17 border=0 /></a>
		<td align=left width=8>  </td>
					<a href="#" onClick="javascript:GoMenu('c1')" class="togo"><img title="我的资产" src="/images/menu/@EDU.gif" width=17 border=0 /></a>
		<td align=left width=8>  </td>
					<a href="#" onClick="javascript:GoMenu('c2')" class="togo"><img title="我的教学" src="/images/menu/@EDU.gif" width=17 border=0 /></a>
		<td align=left width=8>  </td>
					<a href="#" onClick="javascript:GoMenu('c3')" class="togo"><img title="我的班级" src="/images/menu/@EDU.gif" width=17 border=0 /></a>
		<td align=left width=8>  </td>
					<a href="#" onClick="javascript:GoMenu('c7')" class="togo"><img title="后勤管理" src="/images/menu/EDU.gif" width=17 border=0 /></a>
		<td align=left width=8>  </td>
					<a href="#" onClick="javascript:GoMenu('c8')" class="togo"><img title="数字化校园综合信息系统" src="/images/menu/@EDU.gif" width=17 border=0 /></a>
		<td align=left width=8>  </td>
				<td align=left width=30> &nbsp; </td>

			<a class="goBack" href="javascript:history.back()" ><img src="images/back.gif" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:history.forward()" ><img src="images/forward.gif" align="absmiddle"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="time_area" class=timer> </span>
		</div>
	</div>
</div>
</body>
</html>