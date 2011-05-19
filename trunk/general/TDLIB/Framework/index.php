<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('lib.inc.php');
$sessionkey=returnSessKey();
$GLOBAL_SESSION=returnsession();



?><html>
<head>
<title><?=$IE_TITLE?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script language="JavaScript">
self.moveTo(0,0);
self.resizeTo(screen.availWidth,screen.availHeight);
self.focus();
// 状态栏显示文字
window.defaultStatus="<?=$单位名称?>";
</script>
</head>

<frameset rows="51,*,20" cols="*" frameborder="NO" border="0" framespacing="0" id="frame1"><!-- 上下方式分割为3块 -->
  <frame src="index_top.php" name="topFrame" scrolling="NO" noresize ><!--//顶部页面  -->
  <frameset rows="*" cols="7,190,5,9,*" framespacing="0" frameborder="NO" border="0" id="frame2"><!--//中部再分为几块,左右方式分割 -->
    <frame src="menu_leftbar.php" name="menu_leftbar" scrolling="NO" noresize><!-- //菜单左边条 -->
	<frame src="function_panel_index.php" name="function_panel_index" scrolling="NO" noresize><!--//左边的菜单页 -->
    <frame src="menu_rightbar.php" name="menu_rightbar" scrolling="NO" noresize><!--//菜单右边条 -->
	<frame src="controlmenu.php" name="controlmenu" scrolling="no" frameborder="0" noresize><!--//中间页，控制左边菜单的显隐 -->
	<frame src="table_index.php" name="table_index" scrolling="no" frameborder="0" noresize><!--//右边的内容页面，显示菜单点击页面 -->
  </frameset>

  <frame src="status_bar.php" name="status_bar" scrolling="NO" noresize ><!--//底部的状态页面 -->
</frameset>

<noframes>您的浏览器不支持框架页面，请使用IE6.0以上的浏览器！</noframes>
</html>
