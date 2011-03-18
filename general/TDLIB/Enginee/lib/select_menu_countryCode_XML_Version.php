<?
function print_select_countryCode($value="410000")		{
	global $db,$_GET;
	
	$showfield = "countryName";
	$showfield2= "countryCode"; 
	$tablename = "dict_countrycode";
	$field_value = "countryCode";
	$field_name = "countryName";
	$sql="select $field_name,$field_value from $tablename where countryCode like '%0000' order by $field_value";
	$rs=$db->Execute($sql);

	if(is_array($value))		{
		$value = $value[$field_value];
	}
	
	print "
	<script language=\"JavaScript\">
	function GetResult(str)
	{
		var oBao = new ActiveXObject(\"Microsoft.XMLHTTP\");
		oBao.open(\"POST\",str,false);
		oBao.send();
		//服务器端处理返回的是经过escape编码的字符串.
		//通过XMLHTTP返回数据,开始构建Select.
		BuildSel(unescape(oBao.responseText),document.all.".$field_value.");
	}
	function BuildSel(str,sel)
	{
		sel.options.length=0;
		var arrstr = new Array();
		arrstr = str.split(\";\");
		NameStr = arrstr[0];
		CodeStr = arrstr[1];
		arrNamestr = NameStr.split(\",\");
		arrCodestr = CodeStr.split(\",\");

		for(var i=0;i<arrNamestr.length;i++)
		{
			sel.options[sel.options.length]=new Option(arrNamestr[i],arrCodestr[i]);
		}
		document.form1.$field_name.value = arrNamestr[0];
		
	}
	function changelocation(locationid)
	{
        document.form1.$field_name.value = locationid;
	}  
	</script>
	";

	print "<TR>";
    print "<TD class=TableData noWrap>省份:</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select class=\"SmallSelect\" name=\"SelectProvinceName\"  onChange=\"GetResult(this.value)\">\n";
	print "<option value=\"\">=====</option>";
	while(!$rs->EOF)			{
		$rs_value = $rs->fields[$field_value];
		if(substr($value,0,2)==substr($rs_value,0,2))		$temp='selected';
		else	$temp = "";
		print "<option value=../../Enginee/lib/XmlHttpServer.php?action=showdatas&add=city&tablename&mode=name&value=".substr($rs_value,0,2)." $temp>".$rs->fields[$field_name]."</option>\n";
		$temp='';
		$rs->MoveNext();
	}
	print "</select>\n";
	print "</TD></TR>\n";
	//二级菜单
	print "<TR>";
    print "<TD class=TableData noWrap>地市：</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"$field_value\" class=SmallSelect onchange=changelocation(document.form1.$field_value.options[document.form1.$field_value.selectedIndex].text) >";
	print "<option value=\"\">=====</option>";
	if($value!="")			{
	$sql="select $field_name,$field_value from $tablename where countryCode like '".substr($value,0,2)."%' order by $field_value";
	$rs=$db->Execute($sql);
	$rs_a = $rs->GetArray();
	array_shift($rs_a);
	for($i=0;$i<sizeof($rs_a);$i++)				{
		if($value==$rs_a[$i][$field_value])		$temp='selected';
		else	$temp = "";
		$rs_value = $rs_a[$i][$field_name];
		print "<option value=".$rs_a[$i][$field_value]." $temp>".$rs_value."</option>\n";
	}
	}
	print "</select>";
	if($value!="")		{
		$field_name_value = returntablefield("scrm_customer",$field_value,$value,$field_name);
	}
	print "<input type=hidden name = \"$field_name\" value=\"$field_name_value\"";
	print "</TD></TR>\n";	
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