<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];



$MenuArray[] = array('290','node_user','学生转班记录','EDU/Interface/EDU/edu_studentflow_newai.php');
$MenuArray[] = array('302','node_user','学生转学记录','EDU/Interface/EDU/student_changelist_zhuanxue.php');
$MenuArray[] = array('286','node_user','学生休学记录','EDU/Interface/EDU/student_changelist_xiuxue.php');
$MenuArray[] = array('268','node_user','学生退学记录','EDU/Interface/EDU/student_changelist_tuixue.php');
$MenuArray[] = array('294','node_user','学生开除记录','EDU/Interface/EDU/student_changelist_kaichu.php');
$MenuArray[] = array('302','node_user','学生转班记录导出','EDU/Interface/EDU/edu_studentflow_newai.php?action=export_default');
$MenuArray[] = array('302','node_user','转学休学退学开除记录','EDU/Interface/EDU/student_changelist_all.php?action=export_default');
$MenuArray[] = array('302','node_user','处于异动状态学生记录','EDU/Interface/EDU/edu_studentyidong_newai.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "学生异动信息查阅";
page_css("学生异动信息查阅");

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
   <span>学生异动信息</span></li>\n
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
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main2.location='../../".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
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