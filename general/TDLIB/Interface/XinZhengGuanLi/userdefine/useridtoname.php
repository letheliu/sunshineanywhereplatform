<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
$useridtoname = "�������û�IDת��ΪNAME";
//#########################################################
function useridtoname_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$��Ա���� = $fieldvalue;
	$USER_NAME_TEXT = '';
	$��Ա����Array = explode(',',$��Ա����);
	for($i=0;$i<sizeof($��Ա����Array);$i++)		{
		if($��Ա����Array[$i]!="")
			$USER_NAME_TEXT	.= returntablefield("user","USER_ID",$��Ա����Array[$i],"USER_NAME").",";
	}
	return substr_cut($USER_NAME_TEXT,120);
}



function useridtoname_view($fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldValue = $fields['value'][$fieldname];
	$showtext  = $html_etc[$tablename][$fieldname];

	$��Ա���� = $fieldValue;
	$USER_NAME_TEXT = '';
	$��Ա����Array = explode(',',$��Ա����);
	for($i=0;$i<sizeof($��Ա����Array);$i++)		{
		if($��Ա����Array[$i]!="")
			$USER_NAME_TEXT	.= returntablefield("user","USER_ID",$��Ա����Array[$i],"USER_NAME").",";
	}

	print "<TR>";
	print "<TD class=TableContent noWrap>".$showtext.":</TD>\n";
	print "<TD class=TableData colspan=\"$colspan\">\n";
	print "";
	print $USER_NAME_TEXT;
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