<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
$shijuanku = "�Ծ��";
function shijuanku_value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;

	//�û�������������##########################����
	$sql = "select COUNT(*) AS NUM from tiku_shijuanku where �Ծ�����='$fieldvalue'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUM = $rs_a[0]['NUM'];
	$Text  = $fieldvalue;

	if($NUM==0)		{
		$Text .= " <a href=\"?action2=MakeShiJuan&�Ծ����=$fieldvalue\"><font color=green>��ʼ�����Ծ�</font></a>";
	}
	else	{
		$sql = "select COUNT(*) AS NUM from tiku_examdata where �Ծ�����='$fieldvalue'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		$NUM2 = $rs_a[0]['NUM'];
		if($NUM2==0)		$Text .= " <a href=\"?action2=MakeShiJuan&�Ծ����=$fieldvalue\"><font color=blue>���������Ծ�</font></a>";
		$Text .= " <a href=\"tiku_shijuanku_newai.php?�Ծ�����=$fieldvalue\" target=_blank><font color=blue>�����Ծ�(��������:$NUM)</font></a>";
	}


	return $Text;
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