<? /*eNqFkltKw0AYRrfSDQRmMrlMX9WN1NSFtUOhtHkwpTEmzcVqSWJCk2BqWgreRVARxBvVh2KHLuB/P+ebA/MP0/jNXR8+xV2iEQ2T+n6TSoqqYZmqDQkjihtNlSJJPrCfk69yWbHqyuyYD0Houtwsi/za7qc+ZKe/ZcH0oGe1L2+YM/12p7MQcpgeZ04Wht694fO3zInZyUajjyQ6/olT2DZ8znt9iLw4sbreqijmlh/kt/Zi9h5nkNNi2yarPXATw30EaxwRIVVARECY6RDN/+P8JXrly8yB6O0yFQiCl+ftwd12dWNRAUkbqwZJ415uWl7iwSmYyHVKZZFQGUJriKhYUOqKQkRFARv4kZmLyoIbnHKSJy1+qElRsaN+cRqtdnf2xn/OeviZn6lI/Ad/ECwS*/
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');


$GLOBAL_SESSION=returnsession();

$MenuArray[] = array('290','node_user','报修信息','../WuYeGuanLi/wygl_baoxiuxinxi1_view.php');
$MenuArray[] = array('302','node_user','报修受理','../WuYeGuanLi/wygl_baoxiuxinxi2_view.php');
$MenuArray[] = array('286','node_user','修复确认','../WuYeGuanLi/wygl_baoxiuxinxi3_view.php');
$MenuArray[] = array('268','node_user','用料登记','../WuYeGuanLi/wygl_baoxiuxinxi4_view.php');
$MenuArray[] = array('268','node_user','费用结算','../WuYeGuanLi/wygl_baoxiuxinxi5_view.php');
$MenuArray[] = array('268','node_user','服务评价','../WuYeGuanLi/wygl_weixiupingjia_view.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "物业管理";

page_css("物业管理");

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
   <span>物业管理</span></li>\n
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