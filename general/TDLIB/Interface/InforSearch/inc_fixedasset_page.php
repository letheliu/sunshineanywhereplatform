<? /*eNqFkltKw0AYRrfSDQRmMrlMX9WN1NSFtUOhtHkwpTEmzcVqSWJCk2BqWgreRVARxBvVh2KHLuB/P+ebA/MP0/jNXR8+xV2iEQ2T+n6TSoqqYZmqDQkjihtNlSJJPrCfk69yWbHqyuyYD0Houtwsi/za7qc+ZKe/ZcH0oGe1L2+YM/12p7MQcpgeZ04Wht694fO3zInZyUajjyQ6/olT2DZ8znt9iLw4sbreqijmlh/kt/Zi9h5nkNNi2yarPXATw30EaxwRIVVARECY6RDN/+P8JXrly8yB6O0yFQiCl+ftwd12dWNRAUkbqwZJ415uWl7iwSmYyHVKZZFQGUJriKhYUOqKQkRFARv4kZmLyoIbnHKSJy1+qElRsaN+cRqtdnf2xn/OeviZn6lI/Ad/ECwS*/
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');


$GLOBAL_SESSION=returnsession();

$MenuArray[] = array('290','node_user','固定资产信息查阅','../fixedasset/fixedasset_view.php','1');
$MenuArray[] = array('302','node_user','固定资产借领明细','../fixedasset/fixedassetout_view.php');
$MenuArray[] = array('286','node_user','固定资产归还明细','../fixedasset/fixedassettui_view.php');
$MenuArray[] = array('268','node_user','固定资产购置明细','../fixedasset/fixedassetin_view.php');
$MenuArray[] = array('268','node_user','固定资产调拨明细','../fixedasset/fixedassettiaoku_view.php');
$MenuArray[] = array('268','node_user','固定资产维修明细','../fixedasset/fixedassetweixiu_view.php');
$MenuArray[] = array('268','node_user','固定资产报废明细','../fixedasset/fixedassetbaofei_view.php');
$MenuArray[] = array('290','node_user','固定资产按部门统计','../fixedasset/fixedasset_tongjijianjie.php','0');
$MenuArray[] = array('290','node_user','固定资产按批次统计','../fixedasset/fixedasset_pici.php','0');
$MenuArray[] = array('290','node_user','已报废资产明细','../fixedasset/fixedasset_baofei.php','0');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "固定资产";

page_css("固定资产");

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
   <span>固定资产</span></li>\n
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