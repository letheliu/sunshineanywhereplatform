<?
session_start();
?>
<link rel="stylesheet" type="text/css" href="/theme/<?=$_SESSION['LOGIN_THEME']?>/style.css">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>状态栏</title>
<SCRIPT LANGUAGE="JavaScript">
function killErrors()
{
  return true;
}
window.onerror = killErrors;

var ctroltime;
var status_text=null;

function MyLoad()
{
  setTimeout("online_mon()",1000);
  clearTimeout(ctroltime);
  ctroltime=setTimeout("sms_mon()",3000);
  setTimeout("email_mon()",11000);
  new marquee('status_text');
  status_text.setDelay(5*1000);
  status_text.init(new Array("创示范性学校，办人民满意教育","学做文明人，争做文明事，创建文明校","依法治校 以德立校 科研兴校 特色办学 质量树校","以人为本，诚毅务实，规范高效，追求卓越"));
  setTimeout("text_mon()",3600000);
}

function online_mon(req)
{

}

function email_mon(req)
{

}

function sms_mon(req)
{

}
function text_mon(req)
{
  if(isUndefined(req))
  {
     _get("status_text.php","",text_mon);
     setTimeout("text_mon()",3600000);
  }
  else if(req.status==200)
  {
     if(status_text && status_text.DelayInterval) clearInterval(status_text.DelayInterval);
     if(status_text && status_text.ScrollInterval) clearInterval(status_text.ScrollInterval);
     new marquee('status_text');
     status_text.setDelay(5*1000);
     status_text.init(eval("new Array("+req.responseText+")"));
  }
}
function set_no_sms()
{
   $("new_sms").innerHTML="";
   $("new_sms_sound").innerHTML="";
}
function show_sms()
{
   set_no_sms();
   clearTimeout(ctroltime);
   ctroltime=window.setTimeout('sms_mon()',50000);

   mytop=screen.availHeight-160;
   myleft=0;
   window.open("sms_show.php","show_sms_2","height=120,width=390,status=0,toolbar=no,menubar=no,location=no,scrollbars=no,top="+mytop+",left="+myleft+",resizable=yes");
}

function show_email()
{
   $("new_letter").innerHTML="";
   parent.table_index.main.location="/general/email/";
}

function show_online()
{
   parent.leftmenu.view_menu(2);
}

function main_refresh()
{
   parent.table_index.main.location.reload();
}

menu_flag=0;
var STATUS_BAR_MENU;

function show_menu()
{
   mytop=screen.availHeight-480;
   myleft=screen.availWidth-260;
   if(menu_flag==0)
       STATUS_BAR_MENU=window.open("/general/ipanel/menu.php?OA_SUB_WINDOW=1","STATUS_BAR_MENUP020","height=400,width=200,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=no");

   STATUS_BAR_MENU.focus();
}

function show_feedback()
{
   mytop=(screen.availHeight-430)/2;
   myleft=(screen.availWidth-600)/2;
   window.open("/module/feedback/","","height=450,width=600,status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+mytop+",left="+myleft+",resizable=yes");
}

function MyUnload()
{
   if(menu_flag==1 && STATUS_BAR_MENU)
   {
     STATUS_BAR_MENU.focus();
     STATUS_BAR_MENU.MAIN_CLOSE=1;
     STATUS_BAR_MENU.close();
   }
}
</script>
</head>

<body class="statusbar" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">

<table border="0" width="100%" cellspacing="1" cellpadding="0" class="small">
  <tr>
    <td align="center" width="120">

    </td>
    <td align="center" width="80">&nbsp;
       <span id="new_sms"></span>
       <span id="new_sms_sound" style="width:1px;height:1px;"></span>
    </td>
    <td id="status_text_container" align="center" style="font-weight: bold;">
    </td>
    <td align="center" width="80">&nbsp;
       <span id="new_letter"></span>
    </td>
    <td align="center" width="150">&nbsp;
    </td>
  </tr>
</table>
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