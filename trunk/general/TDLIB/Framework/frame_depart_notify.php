<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


//----------------------------------------------------------
//本函数来自于sms_index/目录
//----------------------------------------------------------
require_once('lib.inc.php');
session_start();

?>
<HTML>
<HEAD>
<TITLE>数字化校园系统</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" type=text/css rel=stylesheet>
<script type="text/javascript" language="javascript" src="../Enginee/lib/common.js"></script>
<FRAMESET id=bottom1 border=1 frameSpacing=0 rows=230,* frameBorder=YES cols=*>
<FRAMESET id=bottom2 border=1 frameSpacing=0 rows=* frameBorder=YES cols=*,0>
<FRAME name=user src="./select_departmentlist.php?tablename=<?=$_GET['tablename']?>&fieldid=<?=$_GET['fieldid']?>&fieldname=<?=$_GET['fieldname']?>&field=<?=$_GET['field']?>&field2=<?=$_GET['field2']?>&type=<?=$_GET['type']?>&title=<?=$_GET['title']?>">
</FRAMESET>
<FRAME name=bottom3 src="otherinfor.php?action=bottom" frameBorder=NO scrolling=no></FRAMESET>

</HTML>