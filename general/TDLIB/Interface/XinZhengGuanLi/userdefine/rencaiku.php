<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩ�ʲ����������ʲ�״̬�Ĳ�����Ϣ�趨��
//#########################################################
$rencaiku = "ע��";
function rencaiku_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$¼��״̬ = strip_tags($fields['value'][$i]['¼��״̬']);
	$�Ա� = strip_tags($fields['value'][$i]['�Ա�']);
		$��ϵ��ʽ = strip_tags($fields['value'][$i]['��ϵ��ʽ']);
	$���� = strip_tags($fields['value'][$i]['����']);
	$���֤��  = strip_tags($fields['value'][$i]['���֤��']);
	$���� = strip_tags($fields['value'][$i]['����']);
	$�������� = strip_tags($fields['value'][$i]['��������']);
	$������ò = strip_tags($fields['value'][$i]['������ò']);
	$���� = strip_tags($fields['value'][$i]['����']);
	$ѧ�� = strip_tags($fields['value'][$i]['ѧ��']);
	$ְ�� = strip_tags($fields['value'][$i]['ְ��']);
	$��ҵԺУ = strip_tags($fields['value'][$i]['��ҵԺУ']);
	$רҵ = strip_tags($fields['value'][$i]['רҵ']);
	$�����ʼ� = strip_tags($fields['value'][$i]['�����ʼ�']);



	$Text .= $¼��״̬."(";

	if($¼��״̬=="¼��") $Text .= " ";

	if($¼��״̬=="δ�鿴") $Text .= "<a class=OrgAdd href=\"hrms_file_luyong_newai.php?".base64_encode("action=add_default&�Ա�=$�Ա�&�Ա�_NAME=�Ա�&�Ա�_disabled=disabled&���֤��=$���֤��&���֤��_NAME=���֤��&���֤��_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��ϵ��ʽ=$��ϵ��ʽ&��ϵ��ʽ_NAME=��ϵ��ʽ&��ϵ��ʽ_disabled=disabled&�����ʼ�=$�����ʼ�&�����ʼ�_NAME=�����ʼ�&�����ʼ�_disabled=disabled&רҵ=$רҵ&רҵ_NAME=רҵ&רҵ_disabled=disabled&��ҵԺУ=$��ҵԺУ&��ҵԺУ_NAME=��ҵԺУ&��ҵԺУ_disabled=disabled&ְ��=$ְ��&ְ��_NAME=ְ��&ְ��_disabled=disabled&ѧ��=$ѧ��&ѧ��_NAME=ѧ��&ѧ��_disabled=disabled&������ò=$������ò&������ò_NAME=������ò&������ò_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled")."\">¼��</a>";









	if($¼��״̬=="¼��") $Text .= " <font color=green>����Ա��������¼��״̬</font>";

	$Text .= ")";


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