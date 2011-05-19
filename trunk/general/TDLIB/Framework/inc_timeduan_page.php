<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

//$MenuArray[] = array('294','node_user','班主任管理档案时间设置','EDU/Interface/EDU/edu_banzhuren_manager_banji_setting.php');

//$MenuArray[] = array('294','node_user','班主任管理档案时间设置','EDU/Interface/EDU/edu_banzhuren_manager_banji_setting.php');


$MenuArray[] = array('294','node_user','班主任管理档案时间','EDU/Interface/EDU/edu_banzhuren_manager_banji_setting.php');
$MenuArray[] = array('301','node_user','班主任管理校友时间','EDU/Interface/EDU/edu_banzhuren_xiaoyou_setting.php');
$MenuArray[] = array('301','node_user','学生管理档案时间设置','EDU/Interface/EDU/edu_student_manager_setting.php');
$MenuArray[] = array('301','node_user','班主任/教师录入成绩时间','EDU/Interface/EDU/Exam_class_TimeDuan.php');
$MenuArray[] = array('294','node_user','班主任填写期末评语时间','EDU/Interface/EDU/edu_banzhuren_manager_qimopingyu_setting.php');
$MenuArray[] = array('301','node_user','班主任填写毕业鉴定时间','EDU/Interface/EDU/edu_banzhuren_manager_biyejianding_setting.php');
$MenuArray[] = array('301','node_user','教师修改教材信息时间','EDU/Interface/EDU/edu_teacher_changejiaocaitime_setting.php');
$MenuArray[] = array('301','node_user','班主任修改教材信息时间','EDU/Interface/EDU/edu_banzhuren_changejiaocaitime_setting.php');

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];

$UNIT_NAME = "时效性管理模块";

page_css("时效性管理模块");


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
   <span>时间有效性设置</span></li>\n
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
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='../../".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
		   </tr>
		   ";
	}
}
print "</table>
   </div>";
print "</ul>";




?>