<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('general/EDU/smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->compile_dir="theme/templates_c";
require_once('general/EDU/config.inc.php');
require_once('general/EDU/lib.inc.php');
$OA_PRODUCT_NAME=$IE_TITLE;
$IE_TITLE=$IE_TITLE;

//phpinfo();
if(is_file("update/1.php")&&$_GET['action']!='UPDATE')		{
	print "<a href=\"?action=UPDATE\">开始升级,务必用管理员进行操作</a>";
	exit;
}
if($_GET['action']=='UPDATE')			{
	print "开始升级中....<BR>";
	include("update/1.php");
	@unlink("update/1.php");
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>\n";
	exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE><?=$IE_TITLE?></TITLE>
<META content="text/html; charset=gb2312" http-equiv=Content-Type>
<META name=description content="单点科技,通达OA教育管理组件,数字化校园">
<META name=keywords content="单点科技,通达OA教育管理组件,数字化校园">
<META name=GENERATOR content="MSHTML 8.00.6001.18904">
<LINK rel=stylesheet href="images/style.css"></HEAD>
<BODY class=bodycolor2 onload=javascript:form1.username.focus(); scroll=no>
<SCRIPT language=JavaScript>
//-------------------- 防止出错 ---------------------------
function killErrors()
{
  return true;
}
window.onerror = killErrors;

//------------------- 窗口最大化 --------------------------
self.moveTo(0,0);                                  <!-- 将当前窗口缩小为 -->
self.resizeTo(screen.availWidth,screen.availHeight); <!-- 将当前窗口设置为屏幕大小 -->
self.focus();

// 状态栏显示文字
window.defaultStatus="";

function Login()
{


lang_str = "";
for(i=0;i<document.all("language").length;i++)
{
el=document.all("language").item(i);
if(el.checked)
{
	val=el.value;
        lang_str = val;
}
}


strURL = "logincheck.php?sessionKey=8248932dc4eec2e5e6529ae953fa9d47%53bfddfa068178a275d00f058fbcdb65&username=" + document.form1.username.value + "&password=" + document.form1.password.value + "&language=" + lang_str + "";
URL = strURL;
}


</SCRIPT>

<STYLE type=text/css>BODY {
	BACKGROUND-IMAGE: none
}
</STYLE>

<FORM method=post name=form1 action=logincheck.php>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%" align=center
height="100%">
  <TBODY>
  <TR>
    <TD vAlign=center align=middle>
      <TABLE class=small border=0 cellSpacing=0 cellPadding=0 width=542
      align=center height=285>
        <TBODY>
        <TR>
          <TD vAlign=top
          background=images/login.gif
          align=right>
            <DIV class=login><BR><B><FONT color=#0077b2>用户名:</FONT></B> <INPUT
            onkeydown=if(event.keyCode==13)event.keyCode=9 class=SmallInput
            maxLength=30 size=12 name=username><BR><BR><B><FONT
            color=#0077b2>密&nbsp;&nbsp;&nbsp;码:</FONT></B> <INPUT
            class=SmallInput maxLength=30 size=12 type=password name=password>
            <BR><BR><INPUT class=SmallButton value=" 登录 " type=submit name=Submit>
            &nbsp;&nbsp;&nbsp;<INPUT class=SmallButton value=" 重填 " type=reset name=Submit>
            </DIV><BR><BR></TD></TR></TBODY></TABLE><BR></TD></TR></TBODY></TABLE>
<TABLE class=small border=0 cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD width=80 noWrap><A style="CURSOR: hand"
      onClick="this.style.behavior='url(#default#homepage)';this.setHomePage(self.location);return false;" ><FONT
      color=#0077b2>设为首页</FONT></A></TD>
    <TD width=80><A
      href="javascript:window.external.AddFavorite(self.location,'<?=$IE_TITLE?>')"
      target=_self><FONT color=#0077b2>收藏地址</FONT></A> </TD>
    <TD width=80><A href="http://www.sndg.net/" target=_blank><FONT
      color=#0077b2>官方主站</FONT></A></TD>
    <TD>
      <DIV align=right><FONT color=#999999>欢迎使用<?=$IE_TITLE?><FONT
      color=#0077b2><B><?=$VERSION_INFO?></B></FONT>，本系统推荐运行在IE6.0下。</FONT></DIV></TD></TR></TBODY></TABLE></FORM></BODY></HTML>
