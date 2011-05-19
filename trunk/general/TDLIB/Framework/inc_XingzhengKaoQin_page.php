<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$MenuArray[] = array('290','node_user','�������ڻ�ʹ��˵��','EDU/Interface/Help/XingzhengKaoQin.php');
$MenuArray[] = array('290','node_user','�����������','EDU/Interface/XinZhengGuanLi/edu_xingzheng_group_newai.php');
$MenuArray[] = array('290','node_user','�����������','EDU/Interface/XinZhengGuanLi/edu_xingzheng_banci_newai.php');
$MenuArray[] = array('290','node_user','�����Ű�����','EDU/Interface/XinZhengGuanLi/edu_xingzheng_paiban.php');
$MenuArray[] = array('290','node_user','�Զ���ȡ���ڻ���������','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_automake.php');
$MenuArray[] = array('290','node_user','������Աԭʼ��������','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqin_newai.php');
$MenuArray[] = array('302','node_user','������Ա����������ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_newai.php');
$MenuArray[] = array('286','node_user','������Ա��������ͳ��','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqin_static.php');
$MenuArray[] = array('302','node_user','������Ա���ڲ�����ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinbudeng_newai.php');
$MenuArray[] = array('302','node_user','������Ա��������ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_qingjia_newai.php');
$MenuArray[] = array('302','node_user','������Ա�Ӱಹ����ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_jiabanbuxiu_newai.php');
$MenuArray[] = array('302','node_user','������Ա���ݲ�����ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_tiaoxiububan_newai.php');
$MenuArray[] = array('302','node_user','������Ա������ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_tiaoban_newai.php');
$MenuArray[] = array('302','node_user','������Ա�໥������ϸ','EDU/Interface/XinZhengGuanLi/edu_xingzheng_tiaobanxianghu_newai.php');
$MenuArray[] = array('302','node_user','������Ա���ڳ�ʼ��','EDU/Interface/XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_administrator_change.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "������Ա���ڹ���";
page_css("������Ա���ڹ���");

print "<table class=\"TableBlock\" width=\"100%\" align=\"center\">";

//$LastMenu = array_pop($MenuArray);

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][1];
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($�˵�����);
	if($returnPrivMenu)print "<tr class=TableContent style='CURSOR: hand'><td title=\"[$�˵�����]\" onClick=\"parent.edu_main.location='../../".$�˵���ַ."'\"><img src='images/".$�˵�����.".gif' border=0>&nbsp;&nbsp;$�˵�����</td></tr>";
}

//���һ��Ȩ�޹�����
if($_SESSION['LOGIN_USER_ID']=="admin"&&is_array($LastMenu))    {
	$�˵����� = $LastMenu[1];
	$�˵����� = $LastMenu[2];
	$�˵���ַ = $LastMenu[3];
	print "<tr class=TableContent style='CURSOR: hand'><td title=\"[$�˵�����]\" class=menulines onClick=\"parent.edu_main.location='../../".$�˵���ַ."'\"><img src='images/".$�˵�����.".gif' border=0>&nbsp;&nbsp;$�˵�����</td></tr>";
}

print "</table>";


?>