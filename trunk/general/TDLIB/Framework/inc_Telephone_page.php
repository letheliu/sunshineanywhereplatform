<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$MenuArray[] = array('290','node_user','�Żݻ����','EDU/Interface/EDU/Telephone_infor.html');
$MenuArray[] = array('302','node_user','��ʼ���ҵĺ���','EDU/Interface/EDU/edu_telephone_choose.php');
$MenuArray[] = array('302','node_user','ȡ����ѡ�ĺ���','EDU/Interface/EDU/edu_telephone_cancel.php');
$MenuArray[] = array('302','node_user','������ѡ����','EDU/Interface/EDU/edu_telephone_alreadychoose.php');
$MenuArray[] = array('302','node_user','�������к���','EDU/Interface/EDU/edu_telephone_newai.php');
$MenuArray[] = array('286','node_user','������ѡ���','EDU/Interface/EDU/edu_telephone_newai.php?action=export_default');
$MenuArray[] = array('268','node_user','Ȩ�޷����趨','EDU/Framework/inc_Telephone_priv.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "���������ֻ��Żݻ";

page_css("���������ֻ��Żݻ");

print "<table class=\"TableBlock\" width=\"100%\" align=\"center\">";

$LastMenu = array_pop($MenuArray);

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