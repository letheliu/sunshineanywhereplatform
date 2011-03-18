<?
function print_select_countryCode($value="410000")		{
	global $db,$_GET;
	
	$showfield = "countryName";
	$showfield2= "countryCode"; 
	$tablename = "dict_countrycode";
	$field_value = "countryCode";
	$field_name = "countryName";
	$sql="select $field_name,$field_value from $tablename order by $showfield2";
	$rs=$db->CacheExecute(1500,$sql);
	$rs_a = $rs->GetArray();	
//JS脚本部分开始
print "
<form name=form1>
<script language=\"JavaScript\">
<!--
var subval = new Array();\n";
$ProvinceArrayCode = array();
$ProvinceArrayName = array();
$j = 0;
for($i=0;$i<sizeof($rs_a);$i++)			{
$Element = $rs_a[$i][$field_value];
$CountryName = $rs_a[$i][$field_name];
$OneCode = substr($Element,0,2);
$TwoCode = substr($Element,0,4);
$FourCode = substr($Element,2,4);
if(!in_array($OneCode,$ProvinceArrayCode))	{
	array_push($ProvinceArrayCode,$OneCode);
	array_push($ProvinceArrayName,$CountryName);
}

if(substr($Element,4,2)=='00')		{
	$ShiName = $CountryName;
}

if($FourCode!='0000')	{
	print "subval[$j] = new Array('".$OneCode."','$TwoCode','".$ShiName."','$Element','$CountryName');\n";
	$j++;
}

}
print "
function changeselect1(locationid)
{
    document.form1.s2.length = 0;
    document.form1.s2.options[0] = new Option('==请选择==','');
    document.form1.s3.length = 0;
    document.form1.s3.options[0] = new Option('==请选择==','');
    for (i=0; i<subval.length; i++)
    {
        if (subval[i][0] == locationid)
        {
			document.form1.s2.options[document.form1.s2.length] = new Option(subval[i][2],subval[i][1]);
		}
    }
}

function changeselect2(locationid)
{
    document.form1.s3.length = 0;
    document.form1.s3.options[0] = new Option('==请选择==','');
    for (i=0; i<subval.length; i++)
    {
        if (subval[i][1] == locationid)
        {document.form1.s3.options[document.form1.s3.length] = new Option(subval[i][4],subval[i][3]);}
    }
}
//-->
</script>
	";
//JS脚本结束

	print "<TR>";
    print "<TD class=TableData noWrap>省份:</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"s1\" onChange=\"changeselect1(this.value)\">\n";
	print "<option value=\"\">==请选择==</option>";
	for($i=0;$i<sizeof($ProvinceArrayCode);$i++)		{
		print "<option value=\"".$ProvinceArrayCode[$i]."\">".$ProvinceArrayName[$i]."</option>";
	}
	print "<option value=\"10\">1-10</option>";
	print "<option value=\"20\">11-20</option>";
	print "</select>\n";
	print "</TD></TR>\n";
	//二级菜单部分
	print "<TR>";
    print "<TD class=TableData noWrap>地市：</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"s2\"  onChange=\"changeselect2(this.value)\"> \n";
	print "<option>==请选择==</option>\n";
	print "</select>\n";
	print "</TD></TR>\n";	

	//三级菜单部分
	print "<TR>";
    print "<TD class=TableData noWrap>区县：</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"s3\"> \n";
	print "<option>==请选择==</option>\n";
	print "</select>\n";
	print "</TD></TR>\n";
	//if($value!="")		{
		//$field_name_value = //returntablefield("scrm_customer",$field_value,$value,$field_name);
	//}
	//print "<input type=hidden name = \"$field_name\" value=\"$field_name_value\"";
		
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