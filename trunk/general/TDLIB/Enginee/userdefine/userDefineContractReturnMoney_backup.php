<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩ�û��Զ������ͣ��������Ӻͱ༭����ʱ
function userDefineContractReturnMoney_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldvalue=="0000-00-00"?$fieldvalue="":'';
	$fieldValue1 = $fields['value'][$fieldName1];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];

	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname."_ALL"];

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

	print "<SCRIPT>
		function td_calendar_".$fieldname."(fieldname) {
		myleft=document.body.scrollLeft+event.clientX-event.offsetX-80;
		mytop=document.body.scrollTop+event.clientY-event.offsetY+140;
		window.showModalDialog(fieldname,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:280px;dialogHeight:200px;dialogTop:\"+mytop+\"px;dialogLeft:\"+myleft+\"px\");
		}
		</SCRIPT>\n";
	
	print "<TR>\n";
    print "<TD class=TableData noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	$TableInfor['Content'][$fieldHtml] = "		<INPUT class=$class size=13 name=$fieldname $readonly value='".$fieldvalue."'> <input type=\"button\"  value=\"".$common_html['common_html']['choose']."\"  $readonly class=\"SmallButton\" onclick=\"td_calendar_".$fieldname."('../../Framework/sms_index/calendar_begin.php?datetime=$fieldname');\"  name=\"button\">��";

	$TableInfor['Content'][$fieldHtml1]  = "		<input type=text size=15 class=$class  name=$fieldName1 $readonly value='".$fieldValue1."' $checked>��(".$html_etc[$tablename]['RMB'].")";

	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	TableInforOutPut($TableInfor,"65%");
	print "</TD>\n";
	print "</TR>\n";
}

//�ṩ�û��Զ������ͣ����ڲ�������ʱ
function userDefineContractReturnMoney_view($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldvalue=="0000-00-00"?$fieldvalue="":'';
	$fieldValue1 = $fields['value'][$fieldName1];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];

	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname."_ALL"];
	
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	$TableInfor['Content'][$fieldHtml] = $fieldvalue;
	$TableInfor['Content'][$fieldHtml1] = $fieldValue1.$html_etc[$tablename]['RMB'];
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	TableInforOutPut($TableInfor,"65%");
	print "</TD>\n";
	print "</TR>\n";
}

function userDefineContractReturnMoney_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	return $fieldvalue;
}
?>