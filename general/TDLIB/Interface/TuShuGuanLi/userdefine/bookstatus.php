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

	if($����״̬!="ͼ���ѷ���"&&$����״̬!="ͼ���ѱ���"&&$����״̬!="ͼ���Ѷ�ʧ") $Text .= "<a class=OrgAdd href=\"bookssetout_newai.php?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">����</a> ";

	if($����״̬!="ͼ���ѱ���"&&$����״̬!="ͼ���Ѷ�ʧ") $Text .= "<a class=OrgAdd href=\"bookstuihuan_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">�黹</a> ";

	if($����״̬!="ͼ���ѱ���"&&$����״̬!="ͼ���Ѷ�ʧ") $Text .= "<a class=OrgAdd href=\"bookssetin_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled&�ɹ���ʶ=$�ɹ���ʶ&ͼ�����=$ͼ�����")."\">�ɹ�</a> ";

	if($����״̬!="ͼ���ѱ���"&&$����״̬!="ͼ���Ѷ�ʧ") $Text .= "<a class=OrgAdd href=\"bookstiaobo_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&ԭ����������=$��������&ԭ����������_NAME=DEPT_NAME&ԭ����������_disabled=disabled")."\">����</a> ";

	if($����״̬!="ͼ���ѱ���"&&$����״̬!="ͼ���Ѷ�ʧ") $Text .= "<a class=OrgAdd href=\"booksdiushi_newai.php?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">��ʧ</a> ";

	if($����״̬!="ͼ���ѱ���"&&$����״̬!="ͼ���Ѷ�ʧ") $Text .= "<a class=OrgAdd href=\"bookssetbaofei_newai.php
?".base64_encode("action=add_default&ͼ����=$ͼ����&ͼ����_NAME=ͼ����&ͼ����_disabled=disabled&ͼ������=$ͼ������&ͼ������_NAME=ͼ������&ͼ������_disabled=disabled&��������=$��������&��������_NAME=DEPT_NAME&��������_disabled=disabled")."\">����</a>";

	if($����״̬=="ͼ���ѱ���") $Text .= "<font color=green>��ͼ���Ѿ����ڱ���״̬
	</font>";
	if($����״̬=="ͼ���Ѷ�ʧ") $Text .= "<font color=green>��ͼ���Ѿ����ڶ�ʧ״̬
    </font>";
	$Text .= ")";


	return $Text;
}
?>