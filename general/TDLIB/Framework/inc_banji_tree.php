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




//强制系统组织结构为2####################################################################
if($SCHOOL_MODEL==1) $SCHOOL_MODEL = 2;
if($SCHOOL_MODEL==3) $SCHOOL_MODEL = 4;
//强制系统组织结构为2####################################################################




//得到年制信息
//$sql = "select 学制信息 from edu_xueqi";
//$rs = $db->Execute($sql);
//$rs_a = $rs->GetArray();
//$学制信息 = $rs_a[0]['学制信息'];
$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];


print "<?xml version=\"1.0\" encoding=\"gbk\"?>\r\n";
print "<TreeNode>\r\n";
//单位名称
if($DEPT_PARENT==0)				{
$sql = "select UNIT_NAME from unit";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$UNIT_NAME = $rs_a[0]['UNIT_NAME'];



	@require_once("../Enginee/lib/version.php");


	$SHOWTEXTINFOR = "注册通达数字化校园";

	if(is_file("../Framework/license.ini"))		{
		$ini_file = parse_ini_file("../Framework/license.ini");
		$UNIT_NAME = $ini_file['SCHOOL_NAME'];
	}
	else	{
		$UNIT_NAME = $SHOWTEXTINFOR;
	}


print "<TreeNode id=\"0\" text=\"$UNIT_NAME\" Xml=\"\" img_src=\"images/node_user.gif\">\r\n";

if($SCHOOL_MODEL==1)							{

//入学年份SELECT DISTINCT `入学年份` FROM `edu_banji`  LIMIT 0 , 30
$sql = "select 学院代码,学院名称 from edu_xueyuan order by 学院代码";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$学院代码 = $rs_a[$i]['学院代码'];
	$学院名称 = $rs_a[$i]['学院名称'];
	print "<TreeNode id=\"$学院代码\" text=\"[$学院名称]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$学院名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$学院代码&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=XI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";

}

}//end school_model==1

/*
//入学年份SELECT DISTINCT `入学年份` FROM `edu_banji`  LIMIT 0 , 30
$sql = "SELECT DISTINCT `入学年份` FROM `edu_banji`";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['入学年份'];
	$DEPT_NAME = $rs_a[$i]['入学年份'];
	$NewYear = $DEPT_NAME+$学制信息;
	print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$DEPT_NAME\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
}
*/

}//结束入学年份列表部分


//列出系
if(($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="XI")||($SCHOOL_MODEL==2&&$PRIV_NO_FLAG=="")||($SCHOOL_MODEL==1&&$DEPT_PARENT!=""&&$PRIV_NO_FLAG=="XI"))				{

if($SCHOOL_MODEL==1)		{
	$sql = "select 系代码,系名称 from edu_xi where 所属学院='$DEPT_PARENT' order by 系代码";
}
else	{
	$sql = "select 系代码,系名称 from edu_xi order by 系代码";
}

$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$系代码 = $rs_a[$i]['系代码'];
	$系名称 = $rs_a[$i]['系名称'];
	//href=\"../Interface/$DIR/edu_zhuanye_newai.php?所属系=$系代码\" target=\"edu_main\"
	print "<TreeNode id=\"$系代码\" text=\"[$系名称]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$系名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$系代码&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=JIBIE&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$系名称]\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$系名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$系名称\"/>\r\n";
}
}

/*
//列出专业--之后用系/年级/班组织结构取代
if(($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="ZHUANYE")||($SCHOOL_MODEL==3&&$PRIV_NO_FLAG=="")||($SCHOOL_MODEL<3&&$DEPT_PARENT!=""&&$PRIV_NO_FLAG=="ZHUANYE"))				{
//专业
if($SCHOOL_MODEL==3)		{
	$sql = "select 专业代码,专业名称 from edu_zhuanye order by 专业代码";
}
else	{
	$sql = "select 专业代码,专业名称 from edu_zhuanye where 所属系 = '$DEPT_PARENT' order by 专业代码";
}

$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$专业代码 = $rs_a[$i]['专业代码'];
	$专业名称 = $rs_a[$i]['专业名称'];
	//href=\"../Interface/$DIR/edu_banji_newai.php?所属专业=$专业代码\" target=\"edu_main\"
	print "<TreeNode id=\"$专业代码\" text=\"[$专业名称]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$专业名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$专业代码&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=BANJI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$系名称]\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$系名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$系名称\"/>\r\n";
}
}
*/


//列出级别
if(($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="JIBIE")||($SCHOOL_MODEL==3&&$PRIV_NO_FLAG=="")||($SCHOOL_MODEL<3&&$DEPT_PARENT!=""&&$PRIV_NO_FLAG=="JIBIE"))				{
	//判断是否需要进行201003类型的显示
	$模式201003 = "1";	//初始化为0
	$sql = "select distinct 备注,入学年份 from edu_banji where 所属系='$DEPT_PARENT' and 毕业时间>='".date("Y-m-d")."' and 备注!='' order by 入学年份 desc";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$备注 = $rs_a[$i]['备注'];
		$入学年份 = $rs_a[$i]['入学年份'];
		$NewArray = explode($入学年份,$备注);
		if(strlen($NewArray[1])==2)			{
			//类似于201003模式
			//$模式201003 = "1";
		}
		else	{
			$模式201003 = "0";
		}
	}
	if(sizeof($rs_a)==0)		{
		$模式201003 = "0";
	}
	if($模式201003=="0")					{
		//正常模式
		$ACTION_MODE_201003 = "BANJI";
	}
	else	{
		//模式201003
		$ACTION_MODE_201003 = "MODE_201003";
	}
	//专业
	$sql = "select distinct 入学年份 from edu_banji where  所属系='$DEPT_PARENT' and 毕业时间>='".date("Y-m-d")."' order by 入学年份 desc";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	//print $DIR;exit;
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$入学年份 = $rs_a[$i]['入学年份'];
		$入学年份 = $rs_a[$i]['入学年份'];
		//href=\"../Interface/$DIR/edu_banji_newai.php?所属专业=$专业代码\" target=\"edu_main\"
		print "<TreeNode id=\"$入学年份\" text=\"[$入学年份]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$入学年份\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_PARENT&amp;PARA_URL1=$入学年份&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=$ACTION_MODE_201003&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	}
}

//模式201003
if($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="MODE_201003"&&$SCHOOL_MODEL!=4)				{
//班级
$入学年份 = $_GET['PARA_URL1'];
$datetime = date("Y-m-d");
	//模式201003
	$sql = "select distinct 入学年份,备注 from edu_banji where 所属系='$DEPT_PARENT' and 入学年份='$入学年份'  and 毕业时间>='".date("Y-m-d")."' and 备注 like '$入学年份%' order by 入学年份 desc,备注";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	//print $DIR;exit;
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$备注 = $rs_a[$i]['备注'];
		$入学年份 = $rs_a[$i]['入学年份'];
		//href=\"../Interface/$DIR/edu_banji_newai.php?所属专业=$专业代码\" target=\"edu_main\"
		print "<TreeNode id=\"$入学年份\" text=\"[$备注]".$AddInfor."\"  href=\"#\" target=\"_self\"  img_src=\"images/node_user.gif\" title=\"$备注\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_PARENT&amp;PARA_URL1=$入学年份&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=BANJI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=$备注&amp;DIR=$DIR\"/>\r\n";
	}
}


//列出班级-专业-系
if($DEPT_PARENT!=""&&$PRIV_NO_FLAG=="BANJI"&&$SCHOOL_MODEL!=4)				{
//班级
$入学年份 = $_GET['PARA_URL1'];
$MANAGE_FLAG = $_GET['MANAGE_FLAG'];//模式201003
if($MANAGE_FLAG!="")	$ADDSQLTEMP = " and 备注='$MANAGE_FLAG'";	else	$ADDSQLTEMP = "";//模式201003
$所属系 = $DEPT_PARENT;
$datetime = date("Y-m-d");
$sql = "select 班级代码,班级名称 from edu_banji where 所属系 = '$所属系'  and 入学年份 = '$入学年份'  and 毕业时间>='$datetime' $ADDSQLTEMP order by 班级名称";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$班级代码 = $rs_a[$i]['班级代码'];
	$班级名称 = $rs_a[$i]['班级名称'];
	//print "<TreeNode id=\"$班级代码\" text=\"[$班级名称]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?XZB=$班级名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$班级名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$班级代码&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$班级代码\" text=\"[$班级名称][$班级代码]\" href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&班号=$班级名称&pageid=1")."\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$班级名称\"/>\r\n";
	print "<TreeNode id=\"$班级代码\" text=\"[$班级名称][$班级代码]\"  href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&班号=$班级名称&pageid=1")."\" target=\"edu_main\"  img_src=\"images/node_user.gif\" title=\"$班级名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_PARENT&amp;PARA_URL1=$入学年份&amp;PARA_URL2=$班级名称&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=STUDENT&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$系名称]\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$系名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$系名称\"/>\r\n";
}
}
//列出学生信息
if($PRIV_NO_FLAG=="STUDENT"&&$SCHOOL_MODEL!=4)				{
//班级
$入学年份 = $_GET['PARA_URL1'];
$班级名称 = $_GET['PARA_URL2'];
$所属系 = $DEPT_PARENT;
$datetime = date("Y-m-d");
$sql = "select 学号,姓名,座号 from edu_student where 班号 = '$班级名称'  and 学生状态='正常状态' order by 班号";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$学号 = $rs_a[$i]['学号'];
	$姓名 = $rs_a[$i]['姓名'];
	//print "<TreeNode id=\"$班级代码\" text=\"[$班级名称]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?XZB=$班级名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$班级名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$班级代码&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	//print "<TreeNode id=\"$班级代码\" text=\"[$班级名称][$班级代码]\" href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&班号=$班级名称&pageid=1")."\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$班级名称\"/>\r\n";
	//http://localhost/general/EDU/Framework/inc_banji_tree.php?DEPT_ID=04&amp;PARA_TARGET=&amp;PRIV_NO_FLAG=STUDENT&amp;PARA_URL1=2008&amp;PARA_URL2=电子0801班&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=EDU
	print "<TreeNode id=\"$学号\" text=\"[$姓名][$学号]\"  href=\"../Interface/$DIR/edu_student_newai.php?".base64_encode("action=view_default&学号=$学号&pageid=1")."\" target=\"edu_main\"  img_src=\"images/node_user.gif\" title=\"$姓名\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$系名称]\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$系名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$系名称\"/>\r\n";
}
}
//########################################################################################################################
//########################################################################################################################
//########################################################################################################################
//列表级别
if($SCHOOL_MODEL==4&&$PRIV_NO_FLAG=="")										{
//入学年份SELECT DISTINCT `入学年份` FROM `edu_banji`  LIMIT 0 , 30
$sql = "SELECT DISTINCT `入学年份` FROM `edu_banji` order by 入学年份";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$DEPT_ID = $rs_a[$i]['入学年份'];
	$DEPT_NAME = $rs_a[$i]['入学年份'];
	$NewYear = $DEPT_NAME+$学制信息;
	print "<TreeNode id=\"$DEPT_ID\" text=\"[$DEPT_NAME]".$AddInfor."\" href=\"#\" target=\"_self\" img_src=\"images/node_user.gif\" title=\"$DEPT_NAME\" Xml=\"inc_banji_tree.php?DEPT_ID=$DEPT_ID&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=BANJI&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
}
}
//级别
//列出班级
if($PRIV_NO_FLAG=="BANJI"&&$SCHOOL_MODEL==4)				{
//班级
$datetime = date("Y-m-d");
$sql = "select 班级代码,班级名称 from edu_banji where 入学年份 = '$DEPT_PARENT' and 毕业时间>='$datetime' order by 班级名称";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$班级代码 = $rs_a[$i]['班级代码'];
	$班级名称 = $rs_a[$i]['班级名称'];
	//print "<TreeNode id=\"$班级代码\" text=\"[$班级名称]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?XZB=$班级名称\" target=\"edu_main\" img_src=\"images/node_user42.gif\" title=\"$班级名称\" Xml=\"inc_banji_tree.php?DEPT_ID=$班级代码&amp;PARA_URL1=&amp;PARA_URL2=$PARA_URL2&amp;PARA_TARGET=$PARA_TARGET&amp;PRIV_NO_FLAG=0&amp;PARA_ID=&amp;PARA_VALUE=&amp;MANAGE_FLAG=&amp;DIR=$DIR\"/>\r\n";
	print "<TreeNode id=\"$班级代码\" text=\"[$班级名称][$班级代码]\" href=\"../Interface/$DIR/".$PARA_URL2."?".base64_encode("action=init_default&班号=$班级名称&pageid=1")."\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$班级名称\"/>\r\n";
	//print "<TreeNode id=\"$USER_ID\" text=\"[$系名称]\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$系名称\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$系名称\"/>\r\n";
}
}
/*
//列出班级
if($DEPT_PARENT!="")				{


//列出班级
$sql = "select * from edu_banji where `入学年份`='$DEPT_PARENT'";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();

//print $DIR;exit;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$USER_ID = $rs_a[$i]['班号代码'];//班号代码
	$USER_NAME = $rs_a[$i]['班号代码'];
	$NICK_NAME = $rs_a[$i]['班级名称'];
	$毕业日期 = $rs_a[$i]['毕业日期'];
	$当前日期 = date("Y-m-d");

	if($毕业日期<$当前日期)		{
		$AddInfor = "[己经毕业]";
		if($FILENAME=="")		{
			$PARA_URL2 = "edu_student_customer_newai.php";
		}
		print "<TreeNode id=\"$USER_ID\" text=\"[$NICK_NAME]".$AddInfor."\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$NICK_NAME\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$毕业日期.$当前日期\"/>\r\n";
	}
	else	{
		$AddInfor = "";
		print "<TreeNode id=\"$USER_ID\" text=\"[$NICK_NAME]\" href=\"../Interface/$DIR/".$PARA_URL2."?班号=$NICK_NAME\" target=\"edu_main\" img_src=\"images/node_user.gif\" title=\"$NICK_NAME\"/>\r\n";
	}

}
}
*/

print "</TreeNode>\r\n";

if($DEPT_PARENT==0)				{
print "</TreeNode>\r\n";
}
?>