<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩ�ʲ����������ʲ�״̬�Ĳ�����Ϣ�趨��
//#########################################################
$renshiguanli = "ע��";
function renshiguanli_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$����״̬ = strip_tags($fields['value'][$i]['����״̬']);
	$���� = strip_tags($fields['value'][$i]['����']);
	$���� = strip_tags($fields['value'][$i]['����']);
	$��������  = strip_tags($fields['value'][$i]['��������']);
	$�Ա� = strip_tags($fields['value'][$i]['�Ա�']);
	$���� = strip_tags($fields['value'][$i]['����']);
	$ѧ�� = strip_tags($fields['value'][$i]['ѧ��']);
	$�������� = strip_tags($fields['value'][$i]['��������']);
		$�绰 = strip_tags($fields['value'][$i]['�绰']);



	$Text .= $����״̬."(";

	if($����״̬=="��ְ") {$Text .= "<a class=OrgAdd href=\"hrms_file_lizhi_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled&�Ա�=$�Ա�&�Ա�_NAME=�Ա�&�Ա�_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&ѧ��=$ѧ��&ѧ��_NAME=ѧ��&ѧ��_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled&�绰=$�绰&�绰_NAME=�绰&�绰_disabled=disabled")."\">��ְ</a> ";




	$Text .= "<a class=OrgAdd href=\"hrms_worker_hetong_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">��ͬ</a> ";

	$Text .= "<a class=OrgAdd href=\"hrms_reward_punishment_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">����</a> ";



	$Text .= "<a class=OrgAdd href=\"hrms_worker_zhengzhao_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">֤��</a> ";


	$Text .= "<a class=OrgAdd href=\"hrms_transfer_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">����</a> ";


	$Text .= "<a class=OrgAdd href=\"hrms_worker_zhicheng_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">ְ��</a> ";

	/*
   ѧϰ����  ��������  �Ͷ�����   ����ϵ
	*/
   $Text .= "<a class=OrgAdd href=\"hrms_educationalexperience_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">ѧϰ����</a> ";

    $Text .= "<a class=OrgAdd href=\"hrms_workexperience_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">��������</a> ";


    $Text .= "<a class=OrgAdd href=\"hrms_laboringskill_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">�Ͷ�����</a> ";


	$Text .= "<a class=OrgAdd href=\"hrms_socialrelation_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled")."\">����ϵ</a> ";

	}

if($����״̬=="��ְ") $Text .= "<a class=OrgAdd href=\"hrms_file_fuzhi_newai.php?".base64_encode("action=add_default&����=$����&����_NAME=����&����_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled&�Ա�=$�Ա�&�Ա�_NAME=�Ա�&�Ա�_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&ѧ��=$ѧ��&ѧ��_NAME=ѧ��&ѧ��_disabled=disabled&��������=$��������&��������_NAME=��������&��������_disabled=disabled&�绰=$�绰&�绰_NAME=�绰&�绰_disabled=disabled")."\">��ְ</a> ";



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