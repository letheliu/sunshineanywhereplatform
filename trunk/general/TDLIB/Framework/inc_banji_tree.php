<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


header("Content-Type: text/xml");
require_once('lib.inc.php');
//
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


print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/node_user.gif\">\r\n";

if($SCHOOL_MODEL==1)							{

//��ѧ���SELECT DISTINCT `��ѧ���` FROM `edu_banji`  LIMIT 0 , 30
$sql = "select ѧԺ����,ѧԺ���� from edu_xueyuan order by ѧԺ����";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$ѧԺ���� = $rs_a[$i]['ѧԺ����'];
	$ѧԺ���� = $rs_a[$i]['ѧԺ����'];
	print "<TreeNode id=\"$ѧԺ����\" text=\"[$ѧԺ����]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$ѧԺ����\" Xml=\"inc_banji_tree.php?DEPT_ID=$ѧԺ����&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=XI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";

}

}//end school_model==1

/*
//��ѧ���SELECT DISTINCT `��ѧ���` FROM `edu_banji`  LIMIT 0 , 30
$sql = "SELECT DISTINCT `��ѧ���` FROM `edu_banji`";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['��ѧ���'];
	$DEPT_NAME = $rs_a[$i]['��ѧ���'];
	$NewYear = $DEPT_NAME+$ѧ����Ϣ;
	print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$DEPT_NAME\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
}
*/

}//������ѧ����б���


//�г�ϵ
if(($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="XI")||($SCHOOL_MODEL==2&&$PRIV_NO_FLAG=="")||($SCHOOL_MODEL==1&&$DEPT_PARENT!=""&&$PRIV_NO_FLAG=="XI"))				{

if($SCHOOL_MODEL==1)		{
	$sql = "select ϵ����,ϵ���� from edu_xi where ����ѧԺ='$DEPT_PARENT' order by ϵ����";
}
else	{
	$sql = "select ϵ����,ϵ���� from edu_xi order by ϵ����";
}

$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$ϵ���� = $rs_a[$i]['ϵ����'];
	$ϵ���� = $rs_a[$i]['ϵ����'];
	//href=\"../Interface/$DIR/edu_zhuanye_newai.php?����ϵ=$ϵ����\" target=\"edu_main\"
	print "<TreeNode id=\"$ϵ����\" text=\"[$ϵ����]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$ϵ����\" Xml=\"inc_banji_tree.php?DEPT_ID=$ϵ����&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=JIBIE&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$ϵ����]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$ϵ����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$ϵ����\"/>\r\n";
}
}

/*
//�г�רҵ--֮����ϵ/�꼶/����֯�ṹȡ��
if(($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="ZHUANYE")||($SCHOOL_MODEL==3&&$PRIV_NO_FLAG=="")||($SCHOOL_MODEL<3&&$DEPT_PARENT!=""&&$PRIV_NO_FLAG=="ZHUANYE"))				{
//רҵ
if($SCHOOL_MODEL==3)		{
	$sql = "select רҵ����,רҵ���� from edu_zhuanye order by רҵ����";
}
else	{
	$sql = "select רҵ����,רҵ���� from edu_zhuanye where ����ϵ = '$DEPT_PARENT' order by רҵ����";
}

$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$רҵ���� = $rs_a[$i]['רҵ����'];
	$רҵ���� = $rs_a[$i]['רҵ����'];
	//href=\"../Interface/$DIR/edu_banji_newai.php?����רҵ=$רҵ����\" target=\"edu_main\"
	print "<TreeNode id=\"$רҵ����\" text=\"[$רҵ����]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$רҵ����\" Xml=\"inc_banji_tree.php?DEPT_ID=$רҵ����&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=BANJI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$ϵ����]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$ϵ����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$ϵ����\"/>\r\n";
}
}
*/


//�г�����
if(($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="JIBIE")||($SCHOOL_MODEL==3&&$PRIV_NO_FLAG=="")||($SCHOOL_MODEL<3&&$DEPT_PARENT!=""&&$PRIV_NO_FLAG=="JIBIE"))				{
	//�ж��Ƿ���Ҫ����201003���͵���ʾ
	$ģʽ201003 = "1";	//��ʼ��Ϊ0
	$sql = "select distinct ��ע,��ѧ��� from edu_banji where ����ϵ='$DEPT_PARENT' and ��ҵʱ��>='".date("Y-m-d")."' and ��ע!='' order by ��ѧ��� desc";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$��ע = $rs_a[$i]['��ע'];
		$��ѧ��� = $rs_a[$i]['��ѧ���'];
		$NewArray = explode($��ѧ���,$��ע);
		if(strlen($NewArray[1])==2)			{
			//������201003ģʽ
			//$ģʽ201003 = "1";
		}
		else	{
			$ģʽ201003 = "0";
		}
	}
	if(sizeof($rs_a)==0)		{
		$ģʽ201003 = "0";
	}
	if($ģʽ201003=="0")					{
		//����ģʽ
		$ACTION_MODE_201003 = "BANJI";
	}
	else	{
		//ģʽ201003
		$ACTION_MODE_201003 = "MODE_201003";
	}
	//רҵ
	$sql = "select distinct ��ѧ��� from edu_banji where  ����ϵ='$DEPT_PARENT' and ��ҵʱ��>='".date("Y-m-d")."' order by ��ѧ��� desc";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	//print $DIR;exit;
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$��ѧ��� = $rs_a[$i]['��ѧ���'];
		$��ѧ��� = $rs_a[$i]['��ѧ���'];
		//href=\"../Interface/$DIR/edu_banji_newai.php?����רҵ=$רҵ����\" target=\"edu_main\"
		print "<TreeNode id=\"$��ѧ���\" text=\"[$��ѧ���]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$��ѧ���\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_PARENT&amp;PARA_URL1=$��ѧ���&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=$ACTION_MODE_201003&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	}
}

//ģʽ201003
if($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="MODE_201003"&&$SCHOOL_MODEL!=4)				{
//�༶
$��ѧ��� = $_GET['PARA_URL1'];
$datetime = date("Y-m-d");
	//ģʽ201003
	$sql = "select distinct ��ѧ���,��ע from edu_banji where ����ϵ='$DEPT_PARENT' and ��ѧ���='$��ѧ���'  and ��ҵʱ��>='".date("Y-m-d")."' and ��ע like '$��ѧ���%' order by ��ѧ��� desc,��ע";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	//print $DIR;exit;
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$��ע = $rs_a[$i]['��ע'];
		$��ѧ��� = $rs_a[$i]['��ѧ���'];
		//href=\"../Interface/$DIR/edu_banji_newai.php?����רҵ=$רҵ����\" target=\"edu_main\"
		print "<TreeNode id=\"$��ѧ���\" text=\"[$��ע]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$��ע\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_PARENT&amp;PARA_URL1=$��ѧ���&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=BANJI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=$��ע&amp;DIR=$DIR\"/>\r\n";
	}
}


//�г��༶-רҵ-ϵ
if($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="BANJI"&&$SCHOOL_MODEL!=4)				{
//�༶
$��ѧ��� = $_GET['PARA_URL1'];
$MANAGE_FLAG = $_GET['MANAGE_FLAG'];//ģʽ201003
if($MANAGE_FLAG!="")	$ADDSQLTEMP = " and ��ע='$MANAGE_FLAG'";	else	$ADDSQLTEMP = "";//ģʽ201003
$����ϵ = $DEPT_PARENT;
$datetime = date("Y-m-d");
$sql = "select �༶����,�༶���� from edu_banji where ����ϵ = '$����ϵ'  and ��ѧ��� = '$��ѧ���'  and ��ҵʱ��>='$datetime' $ADDSQLTEMP order by �༶����";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$�༶���� = $rs_a[$i]['�༶����'];
	$�༶���� = $rs_a[$i]['�༶����'];
	//print "<TreeNode id=\"$�༶����\" text=\"[$�༶����]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?XZB=$�༶����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$�༶����\" Xml=\"inc_banji_tree.php?DEPT_ID=$�༶����&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$�༶����\" text=\"[$�༶����][$�༶����]\" href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&���=$�༶����&pageid=1")."\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$�༶����\"/>\r\n";
	print "<TreeNode id=\"$�༶����\" text=\"[$�༶����][$�༶����]\"  href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&���=$�༶����&pageid=1")."\" target=\"edu_main\"  img_src=\"images/node_user.gif\" title=\"$�༶����\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_PARENT&amp;PARA_URL1=$��ѧ���&amp;PARA_URL2=$�༶����&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=STUDENT&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$ϵ����]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$ϵ����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$ϵ����\"/>\r\n";
}
}
//�г�ѧ����Ϣ
if($PRIV_NO_FLAG=="STUDENT"&&$SCHOOL_MODEL!=4)				{
//�༶
$��ѧ��� = $_GET['PARA_URL1'];
$�༶���� = $_GET['PARA_URL2'];
$����ϵ = $DEPT_PARENT;
$datetime = date("Y-m-d");
$sql = "select ѧ��,����,���� from edu_student where ��� = '$�༶����'  and ѧ��״̬='����״̬' order by ���";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$ѧ�� = $rs_a[$i]['ѧ��'];
	$���� = $rs_a[$i]['����'];
	//print "<TreeNode id=\"$�༶����\" text=\"[$�༶����]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?XZB=$�༶����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$�༶����\" Xml=\"inc_banji_tree.php?DEPT_ID=$�༶����&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$�༶����\" text=\"[$�༶����][$�༶����]\" href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&���=$�༶����&pageid=1")."\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$�༶����\"/>\r\n";
	//http://localhost/general/EDU/Framework/inc_banji_tree.php?DEPT_ID=04&amp;PARA_TARGET=&amp;PRIV_NO_FLAG=STUDENT&amp;PARA_URL1=2008&amp;PARA_URL2=����0801��&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=EDU
	print "<TreeNode id=\"$ѧ��\" text=\"[$����][$ѧ��]\"  href=\"../Interface/$DIR/edu_student_newai.php?".base64_encode("action=view_default&ѧ��=$ѧ��&pageid=1")."\" target=\"edu_main\"  img_src=\"images/node_user.gif\" title=\"$����\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$ϵ����]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$ϵ����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$ϵ����\"/>\r\n";
}
}
//########################################################################################################################
//########################################################################################################################
//########################################################################################################################
//�б���
if($SCHOOL_MODEL==4&&$PRIV_NO_FLAG=="")										{
//��ѧ���SELECT DISTINCT `��ѧ���` FROM `edu_banji`  LIMIT 0 , 30
$sql = "SELECT DISTINCT `��ѧ���` FROM `edu_banji` order by ��ѧ���";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['��ѧ���'];
	$DEPT_NAME = $rs_a[$i]['��ѧ���'];
	$NewYear = $DEPT_NAME+$ѧ����Ϣ;
	print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$DEPT_NAME\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=BANJI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
}
}
//����
//�г��༶
if($PRIV_NO_FLAG=="BANJI"&&$SCHOOL_MODEL==4)				{
//�༶
$datetime = date("Y-m-d");
$sql = "select �༶����,�༶���� from edu_banji where ��ѧ��� = '$DEPT_PARENT' and ��ҵʱ��>='$datetime' order by �༶����";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$�༶���� = $rs_a[$i]['�༶����'];
	$�༶���� = $rs_a[$i]['�༶����'];
	//print "<TreeNode id=\"$�༶����\" text=\"[$�༶����]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?XZB=$�༶����\" target=\"edu_main\" img_src=\"images/node_user42.gif\" title=\"$�༶����\" Xml=\"inc_banji_tree.php?DEPT_ID=$�༶����&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	print "<TreeNode id=\"$�༶����\" text=\"[$�༶����][$�༶����]\" href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&���=$�༶����&pageid=1")."\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$�༶����\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$ϵ����]\" href=\"../Interface/$DIR/".$PARA_URL2."?���=$ϵ����\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$ϵ����\"/>\r\n";
}
}
/*
//�г��༶
if($DEPT_PARENT!="")				{


//�г��༶
$sql = "select * from edu_banji where `��ѧ���`='$DEPT_PARENT'";
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
		$AddInfor = "[������ҵ]";
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
*/

print "</TreeNode>\r\n";

if($DEPT_PARENT==0)				{
print "</TreeNode>\r\n";
}
?>