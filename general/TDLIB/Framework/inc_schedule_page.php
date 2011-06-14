<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
if(is_file($filename))	{
	$file = parse_ini_file($filename);			//print_R($file);
	$SCHOOL_MODEL = $file['SCHOOL_MODEL'];
}
else	{
	$SCHOOL_MODEL = 1;
}

//专业科科长,以及副科长权限时进行生成,所有系统只能有查看权限,所以不显示具有可操作性的菜单
//样例:if($_SESSION['SUNSHINE_BANJI_LIST']=="")			XXXX

require_once('../Interface/EDU/systemprivateinc.php');

$TARGET_TITLE = "教务管理-课表";

$TARGET_ARRAY = $PRIVATE_SYSTEM['教务管理']['课表'];

$MenuArray = SystemPrivateInc($TARGET_ARRAY,$TARGET_TITLE);


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "课表管理模块";

page_css("课表管理模块");



$提示信息设置['按老师查课表']	= "课表信息查询";
$提示信息设置['作息时间表设定']	= "课表相关工具集";



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
				<td nowrap>&nbsp;&nbsp;课表管理</td>
				</tr>";
for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][0];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($提示信息设置[$菜单名称]!="")			{
		print "<tr class=TableHeader align=left>
				<td nowrap>&nbsp;&nbsp;".$提示信息设置[$菜单名称]."</td>
				</tr>";
	}
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main_frame.location='../Interface/EDU/".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
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