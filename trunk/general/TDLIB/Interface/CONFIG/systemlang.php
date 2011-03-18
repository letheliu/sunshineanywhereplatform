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
	print_infor("您的信息己经保存,请返回","","location='config.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."'");


}



?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>