<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩͼ���������ͼ��״̬�Ĳ�����Ϣ�趨��
//#########################################################
$bookstatus = "��ͼ���б���ͼ���ֹ������״̬��ͼ��";
function bookstatus_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$����״̬ = strip_tags($fields['value'][$i]['����״̬']);
	$ͼ���� = strip_tags($fields['value'][$i]['ͼ����']);
	$ͼ������ = strip_tags($fields['value'][$i]['ͼ������']);
	$ͼ����� = strip_tags($fields['value'][$i]['ͼ�����']);
	$�ɹ���ʶ = strip_tags($fields['value'][$i]['�ɹ���ʶ']);
	$�������� = strip_tags($fields['value'][$i]['��������']);
	
	$Text .= $����״̬."(";
	
	if($����״̬!="ͼ���ѷ���"&&$����״̬!="ͼ�鼺����"&&$����״̬!="ͼ�鼺��ʧ") $Text .= "<a class=OrgAdd href=\"bookssetout_newai.php?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">����</a> ";

	if($����״̬!="ͼ�鼺����"&&$����״̬!="ͼ�鼺��ʧ") $Text .= "<a class=OrgAdd href=\"bookstuihuan_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">�黹</a> ";

	if($����״̬!="ͼ�鼺����"&&$����״̬!="ͼ�鼺��ʧ") $Text .= "<a class=OrgAdd href=\"bookssetin_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled&�ɹ���ʶ=$�ɹ���ʶ&ͼ�����=$ͼ�����")."\">�ɹ�</a> ";
	
	if($����״̬!="ͼ�鼺����"&&$����״̬!="ͼ�鼺��ʧ") $Text .= "<a class=OrgAdd href=\"bookstiaobo_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&ԭ����������=$��������&ԭ����������_NAME=DEPT_NAME&ԭ����������_disabled=disabled")."\">����</a> ";

	if($����״̬!="ͼ�鼺����"&&$����״̬!="ͼ�鼺��ʧ") $Text .= "<a class=OrgAdd href=\"booksdiushi_newai.php?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">��ʧ</a> ";

	if($����״̬!="ͼ�鼺����"&&$����״̬!="ͼ�鼺��ʧ") $Text .= "<a class=OrgAdd href=\"bookssetbaofei_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">����</a>";

	if($����״̬=="ͼ�鼺����") $Text .= "<font color=green>��ͼ�鼺�����ڱ���״̬
	</font>";
	if($����״̬=="ͼ�鼺��ʧ") $Text .= "<font color=green>��ͼ�鼺�����ڶ�ʧ״̬
    </font>";
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