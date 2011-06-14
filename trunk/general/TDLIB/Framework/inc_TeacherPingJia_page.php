<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$提示信息设置['测评教师平均【P】']	= "评价算法执行过程";
$提示信息设置['教师测评统计算法']	= "评价算法详细介绍";
$提示信息设置['教师测评汇总排名']	= "评价结果汇总排名";


$MenuArray[] = array('290','node_user','教师评价设定','EDU/Interface/JiaXuePingJia/edu_pingjia_newai.php');
$MenuArray[] = array('290','node_user','教师评价明细','EDU/Interface/JiaXuePingJia/edu_pingjiamingxi_newai.php');
$MenuArray[] = array('290','node_user','教师评价统计初始化','EDU/Interface/JiaXuePingJia/edu_pingjiamingxi_init.php');
$MenuArray[] = array('286','node_user','所有测评信息汇总','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji.php');
$MenuArray[] = array('286','node_user','测评教师平均【P】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_p.php');
$MenuArray[] = array('286','node_user','测评班级平均【BP】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_bp.php');
$MenuArray[] = array('286','node_user','课程均值减BP【TD】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_td.php');
$MenuArray[] = array('286','node_user','教师TD均值【TDP】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_tdp.php');
$MenuArray[] = array('286','node_user','课室教师均值【ZP】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_zp.php');
$MenuArray[] = array('286','node_user','全校教师均值【XP】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_xp.php');
$MenuArray[] = array('286','node_user','最终均值【X】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_x.php');
$MenuArray[] = array('286','node_user','教师测评成绩【M】','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_m.php');
$MenuArray[] = array('286','node_user','教师测评汇总排名','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_result.php');
$MenuArray[] = array('286','node_user','教师测评统计算法','EDU/Interface/JiaXuePingJia/help.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "教师评价管理";
page_css("教师评价管理");


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
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";
print "<tr class=TableHeader align=left>
				<td nowrap>&nbsp;&nbsp;教师课堂教学评价</td>
				</tr>";
for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($提示信息设置[$菜单名称]!="")			{
		print "<tr class=TableHeader align=left>
				<td nowrap>&nbsp;&nbsp;".$提示信息设置[$菜单名称]."</td>
				</tr>";
	}
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