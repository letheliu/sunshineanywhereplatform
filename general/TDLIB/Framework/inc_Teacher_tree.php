<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


header("Content-Type: text/xml");
require_once('lib.inc.php');

//$GLOBAL_SESSION=returnsession();

$DEPT_PARENT = $_GET['DEPT_ID'];
$DEPT_PARENT == "" ? $DEPT_PARENT =0 : "" ;
$PARA_URL1 = $_GET['PARA_URL1'];
$PARA_URL2 = $_GET['PARA_URL2'];
$PARA_TARGET = $_GET['PARA_TARGET'];
$PARA_URL2 == "" ? $PARA_URL2 = "growFiles.php" : '';
$PRIV_NO_FLAG = $_GET['PRIV_NO_FLAG'];
$DIR = $_GET['DIR'];
$DIR == ""?$DIR='EDU':'';


//print_R($_GET);

$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
if(is_file($filename))	{
	$file = parse_ini_file($filename);			//print_R($file);
	$SCHOOL_MODEL = $file['SCHOOL_MODEL'];
}
else	{
	$SCHOOL_MODEL = 1;
}




//ǿ��ϵͳ��֯�ṹΪ2####################################################################
if($SCHOOL_MODEL==1) $SCHOOL_MODEL = 2;
if($SCHOOL_MODEL==3) $SCHOOL_MODEL = 4;
//ǿ��ϵͳ��֯�ṹΪ2####################################################################




//�õ�������Ϣ
//$sql = "select ѧ����Ϣ from edu_xueqi";
//$rs = $db->Execute($sql);
//$rs_a = $rs->GetArray();
//$ѧ����Ϣ = $rs_a[0]['ѧ����Ϣ'];
$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];


print "<?xml version=\"1.0\" encoding=\"gbk\"?>\r\n";
print "<TreeNode>\r\n";
//��λ����
if($DEPT_PARENT==0)				{
$sql = "select UNIT_NAME from unit";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$UNIT_NAME = $rs_a[0]['UNIT_NAME'];



	@require_once("../Enginee/lib/version.php");

	$SHOWTEXTINFOR = "ע��ͨ�����ֻ�У԰";

	if(is_file("../Framework/license.ini"))		{
		$ini_file = parse_ini_file("../Framework/license.ini");
		$UNIT_NAME = $ini_file['SCHOOL_NAME'];
	}
	else	{
		$UNIT_NAME = $SHOWTEXTINFOR;
	}


print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/node_dept.gif\">\r\n";

}//������λ����


//�г�����
if($PRIV_NO_FLAG=="" || $PRIV_NO_FLAG == 'DEPT')				{

$sql = "select DEPT_ID,DEPT_NAME from department where DEPT_PARENT='$DEPT_PARENT' order by DEPT_NO,DEPT_NAME";

$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['DEPT_ID'];
	$DEPT_NAME = $rs_a[$i]['DEPT_NAME'];
	//href=\"../Interface/$DIR/edu_zhuanye_newai.php?����ϵ=$DEPT_ID\" target=\"edu_main\"
	//�ж��Ƿ����Ӳ���,���û��,��ֱ����ʾ�û��б�
	$sql = "select COUNT(*) AS NUM from department where DEPT_PARENT='$DEPT_ID'";
	$rs = $db->Execute($sql);
	$NUM = $rs->fields['NUM'];
	$sql = "select COUNT(*) AS NUM from user where DEPT_ID='$DEPT_ID' and DEPT_ID>'0' order by USER_NO,USER_ID";
	$rs = $db->Execute($sql);
	$NUMX = $rs->fields['NUM'];
	if($NUM==0)			{
		print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME ".$NUMX."��]\"  href=\"#\" target=\"_self\"  img_src=\"images/node_dept.gif\" title=\"$DEPT_NAME\" Xml=\"inc_Teacher_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=USER&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	}
	else		{
		print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME ".$NUMX."��]\"  href=\"#\" target=\"_self\"  img_src=\"images/node_dept.gif\" title=\"$DEPT_NAME\" Xml=\"inc_Teacher_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=DEPT&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	}
	//print "<TreeNode id=\"$USER_ID\" text=\"[$DEPT_NAME]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$DEPT_NAME\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$DEPT_NAME\"/>\r\n";
}//�г����Ž���

$��ѧ��� = $_GET['PARA_URL1'];
$�༶���� = $_GET['PARA_URL2'];
$����ϵ = $DEPT_PARENT;
$datetime = date("Y-m-d");
$sql = "select USER_NAME,USER_ID from user where DEPT_ID = '$DEPT_PARENT' and DEPT_ID>'0' order by USER_NO,USER_ID";
//print $sql;
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$USER_ID = $rs_a[$i]['USER_ID'];
	$USER_NAME = $rs_a[$i]['USER_NAME'];
	print "<TreeNode id=\"$USER_ID\" text=\"[$USER_NAME][$USER_ID]\"  href=\"../Interface/$DIR/".$_GET['PARA_URL2']."?".base64_encode("action=view_default&USER_ID=$USER_ID&pageid=1")."\" target=\"edu_main\"  img_src=\"images/node_user.gif\" title=\"$USER_NAME\"/>\r\n";
}//�г��û�����


}

//�г�ѧ����Ϣ
if($PRIV_NO_FLAG=="USER")				{
//print_R($_GET);
//print $PRIV_NO_FLAG;
//�г��û�
$��ѧ��� = $_GET['PARA_URL1'];
$�༶���� = $_GET['PARA_URL2'];
$����ϵ = $DEPT_PARENT;
$datetime = date("Y-m-d");
$sql = "select USER_NAME,USER_ID from user where DEPT_ID = '$DEPT_PARENT' order by USER_NO,USER_ID";
//print $sql;
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$USER_ID = $rs_a[$i]['USER_ID'];
	$USER_NAME = $rs_a[$i]['USER_NAME'];
	print "<TreeNode id=\"$USER_ID\" text=\"[$USER_NAME][$USER_ID]\"  href=\"../Interface/$DIR/".$_GET['PARA_URL2']."?".base64_encode("action=view_default&USER_ID=$USER_ID&pageid=1")."\" target=\"edu_main\"  img_src=\"images/node_user.gif\" title=\"$USER_NAME\"/>\r\n";
}
}


print "</TreeNode>\r\n";

if($DEPT_PARENT==0)				{
print "</TreeNode>\r\n";
}
?>