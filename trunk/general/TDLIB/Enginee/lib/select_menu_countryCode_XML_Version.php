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
		//�������˴����ص��Ǿ���escape������ַ���.
		//ͨ��XMLHTTP��������,��ʼ����Select.
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
    print "<TD class=TableData noWrap>ʡ��:</TD>\n";
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
	//�����˵�
	print "<TR>";
    print "<TD class=TableData noWrap>���У�</TD>\n";
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
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>