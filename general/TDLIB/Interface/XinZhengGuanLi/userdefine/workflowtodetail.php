<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
$workflowtodetail = "������ID�ŵ���������ϸҳ��";
//#########################################################
function workflowtodetail_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$������ID�� = $fieldvalue;
	$RUN_ID = $������ID��;
	if($RUN_ID>0)			{
		$FLOW_ID = returntablefield("flow_run","RUN_ID",$RUN_ID,"FLOW_ID");
		//http://localhost/general/
		//http://localhost/general/workflow/list/flow_view/?RUN_ID=225&FLOW_ID=128
		$������ID�� = "
		<a href=\"../../../workflow/list/print/?RUN_ID=$RUN_ID&FLOW_ID=128\" target=_blank><font color=green>��������</font></a>
		<a href=\"../../../workflow/list/flow_view/?RUN_ID=$RUN_ID&FLOW_ID=128\" target=_blank><font color=green>����ͼ</font></a>";
	}
	else		{
		$������ID�� = '';
	}
	return $������ID��;
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