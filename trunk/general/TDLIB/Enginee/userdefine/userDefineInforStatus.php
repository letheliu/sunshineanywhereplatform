<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩ�û��Զ������ͣ��������Ӻͱ༭����ʱ
function userDefineInforStatus_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	
	$fieldname_Apply = $fields['name'][$i-1];

	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];

	$fieldname_Apply_Value = $fields['value'][$fieldname_Apply];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];

	
	$fieldHtml_ALL  = $html_etc[$tablename]['inforstatusmanagement'];
	
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	if($fieldname_Apply_Value=="on"||$fieldname_Apply_Value==1)		{
		$Apply_Check = "";
		$title = "�ÿͻ������뱨��";
	}
	else	{
		$Apply_Check = "disabled";
		$title = "�ÿͻ�δ���뱨��";
	}

	if($fieldvalue=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml]  = "		<input type=checkbox name=$fieldname title='$title' $checked $Apply_Check>	  ";

	if($fieldValue1=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml1] = "		<input type=checkbox name=$fieldName1 $checked>����";

	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";

	TableInforOutPut($TableInfor,"40%");
	print "</TD>\n";
	print "</TR>\n";
}

//�ṩ�û��Զ������ͣ����ڲ�������ʱ
function userDefineInforStatus_view($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];

	
	$fieldHtml_ALL  = $html_etc[$tablename]['inforstatusmanagement'];
	
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	if($fieldvalue=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml]  = "		<input type=checkbox name=$fieldname disabled $checked>��";

	if($fieldValue1=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml1] = "		<input type=checkbox name=$fieldName1 disabled $checked>��";

	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";

	TableInforOutPut($TableInfor,"40%");
	print "</TD>\n";
	print "</TR>\n";
}


function userDefineInforStatus_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	return $fieldvalue;
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