<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

//专业科科长,以及副科长权限时进行生成,所有系统只能有查看权限,所以不显示具有可操作性的菜单
//样例:if($_SESSION['SUNSHINE_BANJI_LIST']=="")			XXXX

if($_SESSION['SUNSHINE_BANJI_LIST']=="")		$MenuArray[] = array('302','node_user','教师考勤初始化','EDU/Interface/EDU/edu_teacherkaoqinmingxi_administrator_change.php');
$MenuArray[] = array('290','node_user','教师原始打卡数据','EDU/Interface/EDU/edu_teacherkaoqin_newai.php');
$MenuArray[] = array('302','node_user','教师考勤数据明细','EDU/Interface/EDU/edu_teacherkaoqinmingxi_newai.php');
$MenuArray[] = array('286','node_user','教师考勤数据统计','EDU/Interface/EDU/edu_teacherkaoqin_static.php');
$MenuArray[] = array('302','node_user','教师调课记录明细','EDU/Interface/EDU/edu_scheduletiaoke_newai.php');
$MenuArray[] = array('302','node_user','教师代课记录明细','EDU/Interface/EDU/edu_scheduledaike_newai.php');
$MenuArray[] = array('302','node_user','教师考勤补登明细','EDU/Interface/EDU/edu_teacherkaoqinbudeng_newai.php');
$MenuArray[] = array('302','node_user','教学日记补登明细','EDU/Interface/EDU/edu_jiaoxuerijibudeng_newai.php');
$MenuArray[] = array('302','node_user','教师相互调课明细','EDU/Interface/EDU/edu_scheduletiaokexianghu_newai.php');
$MenuArray[] = array('302','node_user','教师停课复课明细','EDU/Interface/EDU/edu_scheduletingke_newai.php');
//$MenuArray[] = array('302','node_user','教师复课记录明细','EDU/Interface/EDU/edu_schedulefuke_newai.php');
$MenuArray[] = array('290','node_user','考勤机使用说明','EDU/Interface/Help/TeacherKaoQin.php');
$MenuArray[] = array('290','node_user','设定教师别名信息','EDU/Interface/EDU/edu_teacherkaoqinmingxi_setting.php');
if($_SESSION['SUNSHINE_BANJI_LIST']=="")		$MenuArray[] = array('290','node_user','设定打卡有效时间区间','EDU/Interface/EDU/edu_teacherkaoqinmingxi_type.php');
$MenuArray[] = array('290','node_user','设定节次上课时间信息','EDU/Interface/EDU/schedule_timesetting.php');
if($_SESSION['SUNSHINE_BANJI_LIST']=="")		$MenuArray[] = array('290','node_user','自动获取考勤机数据','EDU/Interface/EDU/edu_teacherkaoqinmingxi_automake.php');
$MenuArray[] = array('290','node_user','教师考勤操作工具集','EDU/Interface/EDU/edu_teacherkaoqin_tools.php');
$MenuArray[] = array('290','node_user','教师考勤操作流程图','EDU/Interface/Help/flowgraph_teacherkaoqin.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "教师考勤管理";
page_css("教师考勤管理");


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
   <span>教师上课考勤</span></li>\n
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