<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$MenuArray[] = array('286','node_user','学校校区信息','EDU/Interface/EDU/edu_xiaoqu_newai.php');
$MenuArray[] = array('302','node_user',"学校".$_SESSION['SUNSHINE_REGISTER_XI'].'设置','EDU/Interface/EDU/edu_xi_newai.php');
$MenuArray[] = array('290','node_user','学校专业设置','EDU/Interface/EDU/edu_zhuanye_newai.php');


//$MenuArray[] = array('302','node_user','学院信息设置','EDU/Interface/EDU/edu_xueyuan_newai.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "学校基本信息";

page_css("学校基本信息");

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
print "<ul>";
print "<li><span>学校基本信息</span></li>\n
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
print "</table></div>";


/*
//上报教育局数据
$MenuArray2[] = array('290','node_user','学校基本信息','EDU/Interface/EDU/edu_schoolbaseinfor_newai.php');
$MenuArray2[] = array('290','node_user','主要资产信息','EDU/Interface/EDU/edu_schoolmainasset_newai.php');
$MenuArray2[] = array('290','node_user','组织机构及教职工','EDU/Interface/EDU/edu_schooldeptteacher_newai.php');
$MenuArray2[] = array('290','node_user','学校办学情况','EDU/Interface/EDU/edu_schoolbanxueinfor_newai.php');

print "<li><span>上报教育局数据</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";

for($i=0;$i<sizeof($MenuArray2);$i++)			{
	$菜单代码 = $MenuArray2[$i][1];
	$菜单名称 = $MenuArray2[$i][2];
	$菜单地址 = $MenuArray2[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='../../".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
		   </tr>
		   ";
	}
}
print "</table></div>";




//开始上报数据
$MenuArray3[] = array('100','node_user','数据上报操作',"EDU/Interface/JIAOYUJU2/jiaoyuju_submitlog_data.php","数据上报操作");
$MenuArray3[] = array('100','node_user','数据上报日志',"EDU/Interface/JIAOYUJU2/jiaoyuju_submitlog_newai.php","数据上报日志");
$MenuArray3[] = array('100','node_user','系统在线状态',"EDU/Interface/JIAOYUJU2/check_server_offline_online.php","系统在线状态");
$MenuArray3[] = array('100','node_user','中心服务器设置',"EDU/Interface/JIAOYUJU2/jiaoyuju_centerserver_config.php","中心服务器设置");

print "<li><span>开始上报数据</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";

for($i=0;$i<sizeof($MenuArray3);$i++)			{
	$菜单代码 = $MenuArray3[$i][1];
	$菜单名称 = $MenuArray3[$i][2];
	$菜单地址 = $MenuArray3[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='../../".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
		   </tr>
		   ";
	}
}
print "</table></div>";
*/
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