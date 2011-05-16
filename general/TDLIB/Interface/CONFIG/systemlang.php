<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

//print_R($_GET);
page_css("系统设置");
if($_SESSION['LOGIN_USER_ID']!="admin")			{
	print_infor("超越权限!",'',"window.close();");;
	exit;
}

$Tablename = $_GET['Tablename'];

$Columns=returntablecolumn($Tablename);
$html_etc=returnsystemlang($Tablename);



if($_GET['ACTION_NAME']=="html_etc")			{
	$sql = "select * from systemlang where tablename = '".strtolower($Tablename)."'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	//print_R($rs_a);
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$TempArray = $rs_a[$i];
		$fieldName = $TempArray['fieldname'];
		$NewArray[$fieldName] = $TempArray;
	}
	print "<FORM name=form1 action=\"?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&ACTION_NAME=html_etc_data&XX=XX")."\" method=post encType=multipart/form-data>";
	print "<table class=TableBlock  align=center width=600 >\n";
	print "<TR><TD class=TableHeader align=left colSpan=4>&nbsp;语言信息编辑</TD></TR>\n";
	print "<TR><TD class=TableContent align=left colSpan=1>&nbsp;字段名称</TD><TD class=TableContent align=left colSpan=1>&nbsp;中文信息</TD><TD class=TableContent align=left colSpan=1>&nbsp;英文信息(暂不使用)</TD><TD class=TableContent align=left colSpan=1>&nbsp;备注信息</TD></TR>\n";
	$columnsList = $Columns;
	array_push($columnsList,strtolower($Tablename));
	array_push($columnsList,"list".strtolower($Tablename));
	array_push($columnsList,"new".strtolower($Tablename));
	array_push($columnsList,"edit".strtolower($Tablename));
	array_push($columnsList,"view".strtolower($Tablename));
	array_push($columnsList,"import".strtolower($Tablename));
	array_push($columnsList,"export".strtolower($Tablename));
	array_push($columnsList,"report".strtolower($Tablename));
	array_push($columnsList,"statistics".strtolower($Tablename));

	for($i=0;$i<sizeof($columnsList);$i++)		{
		$indexName = $columnsList[$i];
		if($NewArray[$indexName]['chinese']=="")	{
			$NewArray[$indexName]['chinese'] = $indexName;
			//默认插入数据库部分
			$sql = "insert into systemlang values('','$indexName','$Tablename','$indexName','$indexName','');";
			$db->Execute($sql);
			//print $sql;
		}
		if($NewArray[$indexName]['english']=="")	{
			$NewArray[$indexName]['english'] = $indexName;
		}
		print "<TR>\n";
		print "<TD class=TableData align=left colSpan=1 nowrap>&nbsp;字段[ $indexName ]:<input type=hidden size=15 class=SmallStatic name=".$indexName."_fieldname readonly value=".$NewArray[$indexName]['fieldname']."></TD>\n";
		print "<TD class=TableData align=left colSpan=1 width=30%><input type=text size=20 class=SmallInput name=".$indexName."_chinese value=".$NewArray[$indexName]['chinese']."></TD>\n";
		print "<TD class=TableData align=left colSpan=1 width=30%><input type=text size=20 class=SmallInput name=".$indexName."_english value=".$NewArray[$indexName]['english']."></TD>\n";
		print "<TD class=TableData align=left colSpan=1 width=30%><input type=text size=20 class=SmallInput name=".$indexName."_remark value=".$NewArray[$indexName]['remark']."></TD>\n";
		print "</TR>\n";
	}
	print "<TR><TD class=TableContent align=center colSpan=4>&nbsp;<INPUT class=SmallButton title=保存 type=submit value='保存' size = 8 name=button>　<INPUT class=SmallButton onclick=\"location='config.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."'\" type=button value='返回'></TD></TR>\n";
}



if($_GET['ACTION_NAME']=="html_etc_data")				{
	$Tablename = $_GET['Tablename'];
	$columnsList = $Columns;
	array_push($columnsList,strtolower($Tablename));
	array_push($columnsList,"list".strtolower($Tablename));
	array_push($columnsList,"new".strtolower($Tablename));
	array_push($columnsList,"edit".strtolower($Tablename));
	array_push($columnsList,"view".strtolower($Tablename));
	array_push($columnsList,"import".strtolower($Tablename));
	array_push($columnsList,"export".strtolower($Tablename));
	array_push($columnsList,"report".strtolower($Tablename));
	array_push($columnsList,"statistics".strtolower($Tablename));
	for($i=0;$i<sizeof($columnsList);$i++)		{
		$fieldname = $columnsList[$i];
		$chinese = $_POST[$fieldname."_chinese"];
		$english = $_POST[$fieldname."_english"];
		$remark = $_POST[$fieldname."_remark"];
		$selectSql = "select Count(*) as Num from systemlang where tablename = '$Tablename' and fieldname = '$fieldname'";
		$rs = $db->Execute($selectSql);
		$Num = $rs->fields['Num'];
		if($Num>0)			{
			$sql = "update systemlang set chinese = '$chinese',english = '$english',remark = '$remark' where tablename = '$Tablename' and fieldname = '$fieldname'";
		}
		else			{
			$sql = "insert into systemlang values('','".$fieldname."','".strtolower($Tablename)."','$chinese','$english','$chinese');";
		}
		if($chinese!="")		{
			//print $sql."<BR>";
			$db->Execute($sql);
		}
	}
	// [XX] => XX [action] => init_default [Tablename] => officeproduct [FileIniname] => officeproduct [FileDirName] => officeproduct [actionconfig] => config [GOBACKFILENAME] => officeproduct_newai.php [pageid] => 1
	print_infor("您的信息已经保存,请返回","","location='config.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."'");


}



?>