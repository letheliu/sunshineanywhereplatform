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
//JS�ű����ֿ�ʼ
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
    document.form1.s2.options[0] = new Option('==��ѡ��==','');
    document.form1.s3.length = 0;
    document.form1.s3.options[0] = new Option('==��ѡ��==','');
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
    document.form1.s3.options[0] = new Option('==��ѡ��==','');
    for (i=0; i<subval.length; i++)
    {
        if (subval[i][1] == locationid)
        {document.form1.s3.options[document.form1.s3.length] = new Option(subval[i][4],subval[i][3]);}
    }
}
//-->
</script>
	";
//JS�ű�����

	print "<TR>";
    print "<TD class=TableData noWrap>ʡ��:</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"s1\" onChange=\"changeselect1(this.value)\">\n";
	print "<option value=\"\">==��ѡ��==</option>";
	for($i=0;$i<sizeof($ProvinceArrayCode);$i++)		{
		print "<option value=\"".$ProvinceArrayCode[$i]."\">".$ProvinceArrayName[$i]."</option>";
	}
	print "<option value=\"10\">1-10</option>";
	print "<option value=\"20\">11-20</option>";
	print "</select>\n";
	print "</TD></TR>\n";
	//�����˵�����
	print "<TR>";
    print "<TD class=TableData noWrap>���У�</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"s2\"  onChange=\"changeselect2(this.value)\"> \n";
	print "<option>==��ѡ��==</option>\n";
	print "</select>\n";
	print "</TD></TR>\n";	

	//�����˵�����
	print "<TR>";
    print "<TD class=TableData noWrap>���أ�</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select name=\"s3\"> \n";
	print "<option>==��ѡ��==</option>\n";
	print "</select>\n";
	print "</TD></TR>\n";
	//if($value!="")		{
		//$field_name_value = //returntablefield("scrm_customer",$field_value,$value,$field_name);
	//}
	//print "<input type=hidden name = \"$field_name\" value=\"$field_name_value\"";
		
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