<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
header("Content-Type: text/xml");
require_once('lib.inc.php');
//
//$GLOBAL_SESSION=returnsession();
?>
<?
$DEPT_PARENT = $_GET['DEPT_ID'];
$DEPT_PARENT == "" ? $DEPT_PARENT =0 : "" ;
$PARA_URL1 = $_GET['PARA_URL1'];
$PARA_URL2 = $_GET['PARA_URL2'];
$PARA_TARGET = $_GET['PARA_TARGET'];
$PARA_URL2 == "" ? $PARA_URL2 = "growFiles.php" : '';

$DIR = $_GET['DIR'];
$DIR == ""?$DIR='EDU':'';


//�õ�������Ϣ
//$sql = "select ѧ����Ϣ from edu_xueqi";
//$rs = $db->Execute($sql);
//$rs_a = $rs->GetArray();
//$ѧ����Ϣ = $rs_a[0]['ѧ����Ϣ'];
$DateY = Date("Y");
$DateM = Date("m");


print "<?xml version=\"1.0\" encoding=\"gbk\"?>\r\n";
print "<TreeNode>\r\n";
//��λ����
if($DEPT_PARENT==0)				{
$sql = "select UNIT_NAME from unit";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$UNIT_NAME = $rs_a[0]['UNIT_NAME'];
if($UNIT_NAME=="")		{
	$UNIT_NAME = "���趨��λ����";
}
print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/node_user.gif\">\r\n";

//��ѧ���SELECT DISTINCT `��ѧ���` FROM `edu_banji`  LIMIT 0 , 30 
$sql = "SELECT DISTINCT `��ѧ���` FROM `edu_banji`  order by ��ѧ���";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['��ѧ���'];
	$DEPT_NAME = $rs_a[$i]['��ѧ���'];
	$NewYear = $DEPT_NAME+$ѧ����Ϣ;
	print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$DEPT_NAME\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
}

}//������ѧ����б���


//�г��༶
if($DEPT_PARENT!="")				{


//�г��༶
$sql = "select * from edu_banji where `��ѧ���`='$DEPT_PARENT' order by �༶����,�༶����";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();

//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$USER_ID = $rs_a[$i]['��Ŵ���'];//��Ŵ���
	$USER_NAME = $rs_a[$i]['��Ŵ���'];
	$NICK_NAME = $rs_a[$i]['�༶����'];
	$��ҵ���� = $rs_a[$i]['��ҵ����'];
	$��ǰ���� = date("Y-m-d");
	
	if($��ҵ����<$��ǰ����)		{
		$AddInfor = "[�Ѿ���ҵ]";
		if($FILENAME=="")		{
			$PARA_URL2 = "edu_student_customer_newai.php";
		}
		print "<TreeNode id=\"$USER_ID\" text=\"[$NICK_NAME]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$NICK_NAME\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$��ҵ����.$��ǰ����\"/>\r\n";
	}
	else	{
		$AddInfor = "";
		print "<TreeNode id=\"$USER_ID\" text=\"[$NICK_NAME]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$NICK_NAME\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$NICK_NAME\"/>\r\n";
	}
	
}
}

print "</TreeNode>\r\n";

if($DEPT_PARENT==0)				{
print "</TreeNode>\r\n";
}
?>