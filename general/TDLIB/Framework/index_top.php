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