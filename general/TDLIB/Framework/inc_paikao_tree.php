<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


header("Content-Type: text/xml");
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();



//$MenuArray[] = array('290','node_user','�����ſ�������Ϣ˵��','EDU/Interface/EDU/edu_teacher_zhicheng_newai.php');
//$MenuArray[1]['title'] = '��ʼ����׼���뵼��';
//$MenuArray[1]['menucode'] = 'node_user';
//$MenuArray[1]['content'][] = array('302','node_user','�ο�ѧ�����ݵ���','EDU/Interface/EDU/dict_kechouclassnumber1_newai.php');
//$MenuArray[1]['content'][] = array('302','node_user','�༶���Կγ̶�Ӧ���ݵ���','EDU/Interface/EDU/dict_kechouclassnumber2_newai.php');
//$MenuArray[1]['content'][] = array('302','node_user','���ۿι��������㷽��','EDU/Interface/EDU/dict_kechouworking_newai.php');
//$MenuArray[1]['content'][] = array('302','node_user','��ʦ��ʱ���ʽ������','EDU/Interface/EDU/kechou_setting.php');
$MenuArray[] = array('302','node_user','���뿼��ѧ������','EDU/Interface/EDU/paikao_student_newai.php?action=import_default');
$MenuArray[] = array('286','node_user','������ѧ������','EDU/Interface/EDU/paikao_student_newai.php');
$MenuArray[] = array('268','node_user','����༶���Կγ�����','EDU/Interface/EDU/paikao_banjikemu_newai.php?action=import_default');
$MenuArray[] = array('286','node_user','����༶���Կγ�����','EDU/Interface/EDU/paikao_banjikemu_newai.php');
$MenuArray[] = array('286','node_user','������ע��ѧ������','EDU/Interface/EDU/paikao_student_newai.php?action=import_alreadyzhuce');
$MenuArray[] = array('286','node_user','����δע��ѧ������','EDU/Interface/EDU/paikao_student_newai.php?action=import_notzhuce');
$MenuArray[] = array('286','node_user','���Խ������ݹ���','EDU/Interface/EDU/paikao_jiaoshi_newai.php');
$MenuArray[] = array('286','node_user','���Խ�ѧ¥�������','EDU/Interface/EDU/paikao_building_newai.php');
//$MenuArray[] = array('286','node_user','�趨�ſ����ȼ�','EDU/Interface/EDU/paikao_prisetting_newai.php');
$MenuArray[] = array('286','node_user','����ϵͳ�Զ��ſ�','EDU/Interface/EDU/paikao_automation.php');
$MenuArray[] = array('286','node_user','ϵͳ�ſ�����鿴','EDU/Interface/EDU/paikao_automation_newai.php');
$MenuArray[] = array('286','node_user','�����ſ�����(��������)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default');
$MenuArray[] = array('286','node_user','�����ſ�����(��Ժϵ)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default1');
$MenuArray[] = array('286','node_user','�����ſ�����(��רҵ)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default2');
$MenuArray[] = array('286','node_user','�����ſ�����(���ƾ�ϵ)','EDU/Interface/EDU/paikao_automation_newai.php?action=export_default3');
$MenuArray[] = array('286','node_user','��ӡ׼��֤(��Ժϵ)','EDU/Interface/EDU/paikao_exportzhunkaozheng.php');
//$MenuArray[] = array('286','node_user','��ӡ׼��֤(������)','EDU/Interface/EDU/dict_zhicheng_newai.php');
//$MenuArray[] = array('286','node_user','��ӡ�����࿼��','EDU/Interface/EDU/dict_zhicheng_newai.php');
$MenuArray[] = array('286','node_user','ͳ�ƿ���ʱ��/�������ֲ�','EDU/Interface/EDU/paikao_tongji.php');
$MenuArray[] = array('286','node_user','ͳ�ƽ���/�������ֲ�','EDU/Interface/EDU/paikao_tongji_jiaoshi.php');
//$MenuArray[] = array('286','node_user','ͳ�ƽ�ʦ�࿼����','EDU/Interface/EDU/dict_zhicheng_newai.php');
$MenuArray[] = array('268','node_user','Ȩ�޷����趨','EDU/Framework/inc_paikao_priv.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];

print "<?xml version=\"1.0\" encoding=\"gbk\"?>\r\n";
print "<TreeNode>\r\n";
//��λ����
if($DEPT_PARENT=="")											{

$UNIT_NAME = "�����Զ��ſ�������";

print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/056001.gif\">\r\n";


$LastMenu = array_pop($MenuArray);

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][1];
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($�˵�����);
	if($MenuArray[$i]['title']!="")			{
		$�˵����� = $MenuArray[$i]['title'];
		$�˵����� = $MenuArray[1]['menucode'];
		print "<TreeNode id=\"$i\" text=\"[$�˵�����]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/".$�˵�����.".gif\" title=\"$ѧԺ����\" Xml=\"inc_kechou_tree.php?DEPT_PARENT=$i&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=XI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	}
	else	{
		if($returnPrivMenu)print "<TreeNode id=\"$�˵�����\" text=\"[$�˵�����]\" href=\"../../".$�˵���ַ."\" target=\"edu_main\" img_src=\"images/".$�˵�����.".gif\" title=\"[$�˵�����]\"/>\r\n";
	}
}

//���һ��Ȩ�޹�����
if($_SESSION['LOGIN_USER_ID']=="admin"&&is_array($LastMenu))    {
	$�˵����� = $LastMenu[1];
	$�˵����� = $LastMenu[2];
	$�˵���ַ = $LastMenu[3];
	print "<TreeNode id=\"$�˵�����\" text=\"[$�˵�����]\" href=\"../../".$�˵���ַ."\" target=\"edu_main\" img_src=\"images/".$�˵�����.".gif\" title=\"[$�˵�����]\"/>\r\n";
}

}//DEPT_PARENT==0


if($DEPT_PARENT!=""&&strlen($DEPT_PARENT)>0)				{

$MenuArray = $MenuArray[$DEPT_PARENT]['content'];

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][1];
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][3];
	print "<TreeNode id=\"$�˵�����\" text=\"[$�˵�����]\" href=\"../../".$�˵���ַ."\" target=\"edu_main\" img_src=\"images/".$�˵�����.".gif\" title=\"[$�˵�����]\"/>\r\n";
}

}



print "</TreeNode>\r\n";

if($DEPT_PARENT=="")				{
print "</TreeNode>\r\n";
}
?>