<?
function print_select_countryCode($value="410100",$fields)		{
	global $db,$_GET;
	//print $value;
	$showfield0 = "provinces";
	$showfield = "cityCode";
	$showfield2= "areaCode";
	$showfield3= "postcode";
	$tablename = "dict_countrycode";
	$field_value = "countryCode";
	$field_name = "countryName";
	$orderBy = $field_value;
	$postCodeValue = $fields['value']['邮编'];
	//print_R($fields['value']);

	//##########################################################//增加对KEY-VALUE方式的支持
	if($value!="")			{
		$sql = "select count(*) AS NUM from dict_countrycode where $field_name='$value'";
		$rs = $db->Execute($sql);
		$记录条数 = $rs->fields['NUM'];
		if($记录条数>1)			{//则把邮编也计算入过滤条件
			$sql = "select * from dict_countrycode where $field_name='$value' and $showfield3='$postCodeValue'";
			$rs = $db->Execute($sql);
			$记录条数 = $rs->RecordCount();
			//print $记录条数;
		}
		else	{				//根据地市名称即可判断出唯一记录
			$sql = "select * from dict_countrycode where $field_name='$value'";
			$rs = $db->Execute($sql);
			$记录条数 = $rs->RecordCount();
			//print $记录条数;
		}
		$value = $rs->fields[$field_value];
	}
	//##########################################################


	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$showfield0]);
	 if($fields['USER_PRIVATE'][$showfield0]!="")	{
		 $readonly = "disabled";
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallSelect";
	 }
	 //用户类型限制条件##########################结束


	$sql="select $field_name,$field_value,$showfield3 from $tablename order by $orderBy";
	$rs=$db->CacheExecute(15000000,$sql);
	$rs_a = $rs->GetArray();
//JS脚本部分开始
print "
<form name=form1>
<script language=\"JavaScript\">
<!--
var subval = new Array();\n";
$ProvinceArrayCode = array();
$ProvinceArrayName = array();
$TwoSelect = array();
$ThreeSelect = array();
$j = 0;
for($i=0;$i<sizeof($rs_a);$i++)			{
$Element = $rs_a[$i][$field_value];
$CountryName = $rs_a[$i][$field_name];
$postCode = $rs_a[$i][$showfield3];
$postArray[$Element] = $postCode;
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

//二级菜单初始化数组部分
if(substr($Element,0,2)==substr($value,0,2) && substr($Element,4,2)=='00' && substr($Element,2,4)!= '0000')		{
	$TwoSelect[$Element] = $CountryName;
}
//三级菜单初始化数组部分
if(substr($Element,0,4)==substr($value,0,4))		{
	$ThreeSelect[$Element] = $CountryName;
}


if($FourCode!='0000')	{
	print "subval[$j] = new Array('".$OneCode."','$TwoCode','".$ShiName."','$Element','$CountryName','$postCode');\n";
	$j++;
}

}
print "
SelectValue = new Array();
function changeselect1(locationid)
{
    document.form1.".$showfield.".length = 0;
    document.form1.".$showfield.".options[0] = new Option('==请选择==','');
    document.form1.".$showfield2.".length = 0;
    document.form1.".$showfield2.".options[0] = new Option('==请选择==','');
    for (i=0; i<subval.length; i++)
    {
        if (subval[i][0] == locationid)
        {
			if(subval[i][0] == locationid)		{
				if(i == 0 )			{
					document.form1.".$showfield.".options[document.form1.".$showfield.".length] = new Option(subval[i][2],subval[i][1]);
				}
				else if(i>0 && subval[i][1] != subval[i-1][1] )	{
					document.form1.".$showfield.".options[document.form1.".$showfield.".length] = new Option(subval[i][2],subval[i][1]);
				}
				else	{
					//document.form1.".$showfield.".options[document.form1.".$showfield.".length] = new Option(subval[i][2],subval[i][1]);
				}
			}
		}
    }
}

function changeselect2(locationid)
{
    document.form1.".$showfield2.".length = 0;
    document.form1.".$showfield2.".options[0] = new Option('==请选择==','');
    for (i=0; i<subval.length; i++)
    {
        if (subval[i][1] == locationid)
        {document.form1.".$showfield2.".options[document.form1.".$showfield2.".length] = new Option(subval[i][4],subval[i][3]);}
    }
}

function changeDefaultValue(locationid)		{
	//document.form1.".$showfield3.".value = subval[locationid][5];
	for (i=0; i<subval.length; i++)
    {
        if (subval[i][3] == locationid)      {
			document.form1.".$showfield3.".value = subval[i][5];
		}
    }
}

//-->
</script>
	";
//JS脚本结束

	print "<TR>";
    print "<TD class=TableData noWrap>省份:</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"$showfield0\" class=$class $readonly title='".$fields['USER_PRIVATE_TEXT'][$showfield0]."' onChange=\"changeselect1(this.value)\">\n";
	print "<option value=\"\">==请选择省份==</option>";
	$ValueText = substr($value,0,2);
	for($i=0;$i<sizeof($ProvinceArrayCode);$i++)		{
		if($ValueText==$ProvinceArrayCode[$i])	{
			$SelectText = "selected";
		}
		else	{
			$SelectText = "";
		}
		print "<option value=\"".$ProvinceArrayCode[$i]."\" $SelectText>".$ProvinceArrayName[$i]."</option>";
	}
	print "</select>\n";
	//print "<BR>";
	//print "</TD></TR>\n";
	//二级菜单部分
	//print "<TR>";//print_R($TwoSelect);
    //print "<TD class=TableData noWrap>地市：</TD>\n";
    //print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"".$showfield."\" class=$class  $readonly title='".$fields['USER_PRIVATE_TEXT'][$showfield0]."' onChange=\"changeselect2(this.value)\"> \n";
	print "<option>==请选择地市==</option>\n";
	$TwoSelectKeys = array_keys($TwoSelect);
	$TwoSelectValues = array_values($TwoSelect);
	for($i=0;$i<sizeof($TwoSelectKeys);$i++)		{
		$TempSelect = substr($TwoSelectKeys[$i],0,4);
		$ValueSelect = substr($value,0,4);
		if($TempSelect==$ValueSelect)	{
			$SelectText = "selected";
		}
		else	{
			$SelectText = "";
		}
		print "<option value=\"".substr($TwoSelectKeys[$i],0,4)."\" $SelectText>".$TwoSelectValues[$i]."</option>\n";
	}
	print "</select>\n";
	//print "</TD></TR>\n";

	//三级菜单部分
	//print "<TR>";
    //print "<TD class=TableData noWrap>区县：</TD>\n";
    //print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"".$showfield2."\" class=$class $readonly title='".$fields['USER_PRIVATE_TEXT'][$showfield0]."' onChange=\"changeDefaultValue(this.value)\"> \n";
	print "<option value=''>==请选择区县==</option>\n";
	$ThreeSelectKeys = array_keys($ThreeSelect);
	$ThreeSelectValues = array_values($ThreeSelect);
	for($i=0;$i<sizeof($ThreeSelectKeys);$i++)		{
		$TempSelect = $ThreeSelectKeys[$i];
		$ValueSelect = $value;
		if($TempSelect==$ValueSelect)	{
			$SelectText = "selected";
		}
		else	{
			$SelectText = "";
		}
		print "<option value=\"".$ThreeSelectKeys[$i]."\" $SelectText>".$ThreeSelectValues[$i]."</option>\n";
	}
	print "</select>\n";
	//print "<BR>";
	if($postCodeValue=="")	{
			$postCodeValue = $postArray[$value];
	}
	print "邮编：<input type=text class=SmallInput name = \"$showfield3\" size=7 value=\"".$postCodeValue."\">";
	//print_R($value);
	print "</TD></TR>\n";
	//if($value!="")		{
		//$field_name_value = //returntablefield("scrm_customer",$field_value,$value,$field_name);
	//}
	print "<input type=hidden name = \"$field_name\" value=\"".$ThreeSelect[$value]."\"/>";
	//print "
	//<script language=\"JavaScript\">
	//<!--
	//changeselect1('".substr($value,0,2)."');
	//changeselect2('".substr($value,0,4)."');
	//-->
	//</script>";
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