<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩ�û��Զ������ͣ��������Ӻͱ༭����ʱ
function userDefineCustomerOA37_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	//print $i;
	$fieldname = $fields['name'][3];
	$fieldName1 = $fields['name'][4];
	$fieldName2 = $fields['name'][5];
	$fieldName3 = $fields['name'][9];
	$fieldName4 = $fields['name'][6];
	$fieldName5 = $fields['name'][7];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];
	$fieldValue2 = $fields['value'][$fieldName2];
	$fieldValue3 = $fields['value'][$fieldName3];
	$fieldValue4 = $fields['value'][$fieldName4];
	$fieldValue5 = $fields['value'][$fieldName5];

	$fieldHtml  = $html_etc[$tablename]['Name'];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];
	$fieldHtml2 = $html_etc[$tablename][$fieldName2];
	$fieldHtml3 = $html_etc[$tablename][$fieldName3];
	$fieldHtml4 = $html_etc[$tablename][$fieldName4];
	$fieldHtml5 = $html_etc[$tablename][$fieldName5];


	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname];



	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE']);
	 if($fields['USER_PRIVATE'][$fieldname]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$fieldname];
		 $class = "SmallStatic";
		 $class2 = "BigStatic";
		 $disabled = "disabled";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallInput";
		 $class2 = "BigInput";
		 $disabled = "";
	 }
	 //�û�������������##########################����
	print "<TR>\n";
    print "<TD class=TableData noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	$TableInfor['Content'][$fieldHtml]  = "		<input class=$class type=input size=12 name=$fieldname $readonly  value=\"$fieldvalue\">��";
	$TableInfor['Content'][$fieldHtml1]  = "	<input class=$class type=input size=12 name=$fieldName1 $readonly value=\"$fieldValue1\">��";
	$TableInfor['Content'][$fieldHtml2]  = "	<input class=$class type=input size=12 name=$fieldName2 $readonly value=\"$fieldValue2\">��";
	$TableInfor['Content'][$fieldHtml3]  = "	<input class=$class type=input size=12 name=$fieldName3 $readonly value=\"$fieldValue3\">��";
	$TableInfor['Content'][$fieldHtml4]  = "	<input class=$class type=input size=12 name=$fieldName4 $readonly value=\"$fieldValue4\">��";
	$TableInfor['Content'][$fieldHtml5]  = "	<input class=$class type=input size=12 name=$fieldName5 $readonly value=\"$fieldValue5\">��";
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	$TableInfor['cols'][$fieldHtml2] = "1";
	$TableInfor['cols'][$fieldHtml3] = "1";
	$TableInfor['cols'][$fieldHtml4] = "1";
	$TableInfor['cols'][$fieldHtml5] = "1";
	TableInforOutPut3($TableInfor,"100%");
	print "</TD>\n";
	print "</TR>\n";
}

//�ṩ�û��Զ������ͣ����ڲ�������ʱ
function userDefineCustomerOA37_view($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	//print $i;
	$fieldname = $fields['name'][3];
	$fieldName1 = $fields['name'][4];
	$fieldName2 = $fields['name'][5];
	$fieldName3 = $fields['name'][9];
	$fieldName4 = $fields['name'][6];
	$fieldName5 = $fields['name'][7];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];
	$fieldValue2 = $fields['value'][$fieldName2];
	$fieldValue3 = $fields['value'][$fieldName3];
	$fieldValue4 = $fields['value'][$fieldName4];
	$fieldValue5 = $fields['value'][$fieldName5];

	$fieldHtml  = $html_etc[$tablename]['Name'];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];
	$fieldHtml2 = $html_etc[$tablename][$fieldName2];
	$fieldHtml3 = $html_etc[$tablename][$fieldName3];
	$fieldHtml4 = $html_etc[$tablename][$fieldName4];
	$fieldHtml5 = $html_etc[$tablename][$fieldName5];


	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname];



	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE']);
	 if($fields['USER_PRIVATE'][$fieldname]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$fieldname];
		 $class = "SmallStatic";
		 $class2 = "BigStatic";
		 $disabled = "disabled";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallInput";
		 $class2 = "BigInput";
		 $disabled = "";
	 }
	 //�û�������������##########################����
	print "<TR>\n";
    print "<TD class=TableData noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	$TableInfor['Content'][$fieldHtml]   = $fieldvalue;
	$TableInfor['Content'][$fieldHtml1]  = $fieldValue1;
	$TableInfor['Content'][$fieldHtml2]  = $fieldValue2;
	$TableInfor['Content'][$fieldHtml3]  = $fieldValue3;
	$TableInfor['Content'][$fieldHtml4]  = $fieldValue4;
	$TableInfor['Content'][$fieldHtml5]  = $fieldValue5;
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	$TableInfor['cols'][$fieldHtml2] = "1";
	$TableInfor['cols'][$fieldHtml3] = "1";
	$TableInfor['cols'][$fieldHtml4] = "1";
	$TableInfor['cols'][$fieldHtml5] = "1";
	TableInforOutPut($TableInfor,"100%");
	print "</TD>\n";
	print "</TR>\n";
}

function userDefineCustomerOA37_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	return $fieldvalue;
}
?>