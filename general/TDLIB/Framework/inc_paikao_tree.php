<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


header("Content-Type: text/xml");
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();



//$MenuArray[] = array('290','node_user','考试排考数据信息说明','EDU/Interface/EDU/edu_teacher_zhicheng_newai.php');
//$MenuArray[1]['title'] = '初始数据准备与导入';
//$MenuArray[1]['menucode'] = 'node_user';
//$MenuArray[1]['content'][] = array('302','node_user','参考学生数据导入','EDU/Interface/EDU/dict_kechouclassnumber1_newai.php');
//$MenuArray[1]['content'][] = array('302','node_user','班级考试课程对应数据导入','EDU/Interface/EDU/dict_kechouclassnumber2_newai.php');
//$MenuArray[1]['content'][] = array('302','node_user','理论课工作量计算方法','EDU/Interface/EDU/dict_kechouworking_newai.php');
//$MenuArray[1]['content'][] = array('302','node_user','教师课时工资金额设置','EDU/Interface/EDU/kechou_setting.php');
$MenuArray[] = array('302','node_user','导入考试学生数据','EDU/Interface/EDU/paikao_student_newai.php?action=import_default');
$MenuArray[] = array('286','node_user','管理考试学生数据','EDU/Interface/EDU/paikao_student_newai.php');
$MenuArray[] = array('268','node_user','导入班级考试课程数据','EDU/Interface/EDU/paikao_banjikemu_newai.php?action=import_default');
$MenuArray[] = array('286','node_user','管理班级考试课程数据','EDU/Interface/EDU/paikao_banjikemu_newai.php');
$MenuArray[] = array('286','node_user','导入已注册学生数据','EDU/Interface/EDU/paikao_student_newai.php?action=import_alreadyzhuce');
$MenuArray[] = array('286','node_user','导入未注册学生数据','EDU/Interface/EDU/paikao_student_newai.php?action=import_notzhuce');
$MenuArray[] = array('286','node_user','考试教室数据管理','EDU/Interface/EDU/paikao_jiaoshi_newai.php');
$MenuArray[] = array('286','node_user','考试教学楼例外管理','EDU/Interface/EDU/paikao_building_newai.php');
//$MenuArray[] = array('286','node_user','设定排考优先级','EDU/Interface/EDU/paikao_prisetting_newai.php');
$MenuArray[] = array('286','node_user','进行系统自动排考','EDU/Interface/EDU/paikao_automation.php');
$MenuArray[] = array('286','node_user','系统排考结果查看','EDU/Interface/EDU/paikao_automation_newai.php');
$MenuArray[] = array('286','node_user','导出排考数据(所有数据)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default');
$MenuArray[] = array('286','node_user','导出排考数据(按院系)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default1');
$MenuArray[] = array('286','node_user','导出排考数据(按专业)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default2');
$MenuArray[] = array('286','node_user','导出排考数据(按制卷系)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default3');
$MenuArray[] = array('286','node_user','打印准考证(按院系)','EDU/Interface/EDU/paikao_exportzhunkaozheng.php');
//$MenuArray[] = array('286','node_user','打印准考证(按考场)','EDU/Interface/EDU/dict_zhicheng_newai.php');
//$MenuArray[] = array('286','node_user','打印考场监考表','EDU/Interface/EDU/dict_zhicheng_newai.php');
$MenuArray[] = array('286','node_user','统计考试时间/考场数分布','EDU/Interface/EDU/paikao_tongji.php');
$MenuArray[] = array('286','node_user','统计教室/考场数分布','EDU/Interface/EDU/paikao_tongji_jiaoshi.php');
//$MenuArray[] = array('286','node_user','统计教师监考次数','EDU/Interface/EDU/dict_zhicheng_newai.php');
$MenuArray[] = array('268','node_user','权限分配设定','EDU/Framework/inc_paikao_priv.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];

print "<?xml version=\"1.0\" encoding=\"gbk\"?>\r\n";
print "<TreeNode>\r\n";
//单位名称
if($DEPT_PARENT=="")											{

$UNIT_NAME = "考试自动排考场管理";

print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/056001.gif\">\r\n";


$LastMenu = array_pop($MenuArray);

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($MenuArray[$i]['title']!="")			{
		$菜单名称 = $MenuArray[$i]['title'];
		$菜单代码 = $MenuArray[1]['menucode'];
		print "<TreeNode id=\"$i\" text=\"[$菜单名称]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/".$菜单代码.".gif\" title=\"$学院名称\" Xml=\"inc_kechou_tree.php?DEPT_PARENT=$i&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=XI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	}
	else	{
		if($returnPrivMenu)print "<TreeNode id=\"$菜单代码\" text=\"[$菜单名称]\" href=\"../../".$菜单地址."\" target=\"edu_main\" img_src=\"images/".$菜单代码.".gif\" title=\"[$菜单名称]\"/>\r\n";
	}
}

//最后一个权限管理部分
if($_SESSION['LOGIN_USER_ID']=="admin"&&is_array($LastMenu))    {
	$菜单代码 = $LastMenu[1];
	$菜单名称 = $LastMenu[2];
	$菜单地址 = $LastMenu[3];
	print "<TreeNode id=\"$菜单代码\" text=\"[$菜单名称]\" href=\"../../".$菜单地址."\" target=\"edu_main\" img_src=\"images/".$菜单代码.".gif\" title=\"[$菜单名称]\"/>\r\n";
}

}//DEPT_PARENT==0


if($DEPT_PARENT!=""&&strlen($DEPT_PARENT)>0)				{

$MenuArray = $MenuArray[$DEPT_PARENT]['content'];

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	print "<TreeNode id=\"$菜单代码\" text=\"[$菜单名称]\" href=\"../../".$菜单地址."\" target=\"edu_main\" img_src=\"images/".$菜单代码.".gif\" title=\"[$菜单名称]\"/>\r\n";
}

}



print "</TreeNode>\r\n";

if($DEPT_PARENT=="")				{
print "</TreeNode>\r\n";
}
?>