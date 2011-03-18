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
</html><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>