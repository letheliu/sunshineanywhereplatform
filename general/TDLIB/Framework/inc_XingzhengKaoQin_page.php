<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$MenuArray[] = array('290','node_user','行政考勤机使用说明','EDU/Interface/Help/XingzhengKaoQin.php');
$MenuArray[] = array('290','node_user','行政组别设置','EDU/Interface/XinZhengGuanLi/edu_xingzheng_group_newai.php');
$MenuArray[] = array('290','node_user','行政班次设置','EDU/Interface/XinZhengGuanLi/edu_xingzheng_banci_newai.php');
$MenuArray[] = array('290','node_user','行政排班设置','EDU/Interface/XinZhengGuanLi/edu_xingzheng_paiban.php');
$MenuArray[] = array('290','node_user','自动获取考勤机考勤数据','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_automake.php');
$MenuArray[] = array('290','node_user','行政人员原始考勤数据','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqin_newai.php');
$MenuArray[] = array('302','node_user','行政人员考勤数据明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_newai.php');
$MenuArray[] = array('286','node_user','行政人员考勤数据统计','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqin_static.php');
$MenuArray[] = array('302','node_user','行政人员考勤补登明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinbudeng_newai.php');
$MenuArray[] = array('302','node_user','行政人员请假外出明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_qingjia_newai.php');
$MenuArray[] = array('302','node_user','行政人员加班补休明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_jiabanbuxiu_newai.php');
$MenuArray[] = array('302','node_user','行政人员调休补班明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_tiaoxiububan_newai.php');
$MenuArray[] = array('302','node_user','行政人员调班明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_tiaoban_newai.php');
$MenuArray[] = array('302','node_user','行政人员相互调班明细','EDU/Interface/XinZhengGuanLi/edu_xingzheng_tiaobanxianghu_newai.php');
$MenuArray[] = array('302','node_user','行政人员考勤初始化','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_administrator_change.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "行政人员考勤管理";
page_css("行政人员考勤管理");

print "<table class=\"TableBlock\" width=\"100%\" align=\"center\">";

//$LastMenu = array_pop($MenuArray);

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($returnPrivMenu)print "<tr class=TableContent style='CURSOR: hand'><td title=\"[$菜单名称]\" onClick=\"parent.edu_main.location='../../".$菜单地址."'\"><img src='images/".$菜单代码.".gif' border=0>&nbsp;&nbsp;$菜单名称</td></tr>";
}

//最后一个权限管理部分
if($_SESSION['LOGIN_USER_ID']=="admin"&&is_array($LastMenu))    {
	$菜单代码 = $LastMenu[1];
	$菜单名称 = $LastMenu[2];
	$菜单地址 = $LastMenu[3];
	print "<tr class=TableContent style='CURSOR: hand'><td title=\"[$菜单名称]\" class=menulines onClick=\"parent.edu_main.location='../../".$菜单地址."'\"><img src='images/".$菜单代码.".gif' border=0>&nbsp;&nbsp;$菜单名称</td></tr>";
}

print "</table>";


?>