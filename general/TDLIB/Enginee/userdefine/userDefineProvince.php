<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
function userDefineProvince_add($fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldvalue = $fields['value'][$fieldname];
	switch(strlen($fieldvalue))			{
		case '2':
			$fieldvalue = $fieldvalue."0000";
			break;
		case '4':
			$fieldvalue = $fieldvalue."00";
			break;
		case '6':
			break;
	}
	$sql = "select countryName from dict_countrycode where countryCode = '$fieldvalue'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$fieldvalue = $rs_a[0]['countryName'];
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$html_etc[$tablename][$fieldname]." </TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">".$fieldvalue."</TD>\n";
	print "</TR>\n";
}

function userDefineProvince_view($fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldvalue = $fields['value'][$fieldname];
	switch(strlen($fieldvalue))			{
		case '2':
			$fieldvalue = $fieldvalue."0000";
			break;
		case '4':
			$fieldvalue = $fieldvalue."00";
			break;
		case '6':
			break;
	}
	$sql = "select countryName from dict_countrycode where countryCode = '$fieldvalue'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$fieldvalue = $rs_a[0]['countryName'];
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$html_etc[$tablename][$fieldname]." </TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">".$fieldvalue."</TD>\n";
	print "</TR>\n";
}

function userDefineProvince_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	switch(strlen($fieldvalue))			{
		case '2':
			$fieldvalue = $fieldvalue."0000";
			break;
		case '4':
			$fieldvalue = $fieldvalue."00";
			break;
		case '6':
			break;
	}
	$sql = "select countryName from dict_countrycode where countryCode = '$fieldvalue'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$fieldvalue = $rs_a[0]['countryName'];
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