<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$MenuArray[] = array('290','node_user','优惠活动介绍','EDU/Interface/EDU/Telephone_infor.html');
$MenuArray[] = array('302','node_user','开始挑我的号码','EDU/Interface/EDU/edu_telephone_choose.php');
$MenuArray[] = array('302','node_user','取消我选的号码','EDU/Interface/EDU/edu_telephone_cancel.php');
$MenuArray[] = array('302','node_user','查阅已选号码','EDU/Interface/EDU/edu_telephone_alreadychoose.php');
$MenuArray[] = array('302','node_user','管理所有号码','EDU/Interface/EDU/edu_telephone_newai.php');
$MenuArray[] = array('286','node_user','导出挑选结果','EDU/Interface/EDU/edu_telephone_newai.php?action=export_default');
$MenuArray[] = array('268','node_user','权限分配设定','EDU/Framework/inc_Telephone_priv.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "电信天翼手机优惠活动";

page_css("电信天翼手机优惠活动");

print "<table class=\"TableBlock\" width=\"100%\" align=\"center\">";

$LastMenu = array_pop($MenuArray);

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