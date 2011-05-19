<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$MenuArray[] = array('290','node_user','教学内容管理','');
$MenuArray[] = array('290','node_user','教师教案管理','EDU/Interface/Teacher/edu_jiaoan_view.php');
$MenuArray[] = array('290','node_user','教师授课日志','EDU/Interface/Teacher/school_teachinglog_view.php');
$MenuArray[] = array('290','node_user','教师家访记录','EDU/Interface/Teacher/edu_jiafang_view.php');
$MenuArray[] = array('290','node_user','教师课外辅导记录','EDU/Interface/Teacher/edu_kewaifudao_view.php');
$MenuArray[] = array('302','node_user','班级通知管理','EDU/Interface/Teacher/school_notify_view.php');
$MenuArray[] = array('302','node_user','学生作业管理','EDU/Interface/Teacher/school_homework_view.php');
$MenuArray[] = array('286','node_user','课件下载管理','EDU/Interface/Teacher/school_download_view.php');
$MenuArray[] = array('268','node_user','学生考勤管理','EDU/Interface/Teacher/edu_studentkaoqin_view.php');
$MenuArray[] = array('268','node_user','学生留言管理','EDU/Interface/Teacher/school_gb_view.php');

$SCHOOL_MODEL = parse_ini_file("SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "教师信息查询";

page_css("教师信息查询");

print "
<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/menu_left.css\" />\n
<script language=\"JavaScript\" src=\"/inc/js/menu_left.js\"></script>\n
<script language=\"JavaScript\" src=\"/inc/js/hover_tr.js\"></script>\n
";

print "\n<style>\nli span{\n
  background: url(\"/theme/$LOGIN_THEME/arrow_d.gif\") no-repeat left;\n
  display:block;\n
  padding-top:3px;\n
  padding-left:16px;\n
}</style>\n";
print "
<ul>\n
   <li>\n
   <span>教师信息查询</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
		   </tr>
		   ";
	}
}
print "</table>
   </div>";
/*
print "
<li>
	<a href=\"group\" onclick=\"\" target=\"address_main\" title=\"管理分组\" id=\"link_4\">
	<span>管理分组</span>
	</a>
</li>";
*/
print "</ul>";

?>