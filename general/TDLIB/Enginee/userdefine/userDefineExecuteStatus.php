<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//��INIT��ͼ��Ϊ���ṩֵ�Ĺ��˷���
//�˺������Ի�����̫ǿ����������
function userDefineExecuteStatus_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$CustomerID = $fields['value'][$i]['CustomerID'];
	$sql = "select * from $tablename where CustomerID='$CustomerID'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$FilterArray = array (
		'CommunicationNeeds'=>"����ͨ",
		'AuthorProgramme'=>"����׫д",               
		'StylePagesPhase1'=>"���ҳ�׶�",               
		'ContractNegotiations'=>"��ͬǢ̸",               
		'ContractConfirmation'=>"��ͬȷ��",               
		'WebsiteAllDesign'=>"��վ�������",               
		'RecordTransmitted'=>"�İ�ִ��",               
		'ProgrameExecute'=>"ȫ��ִ��",               
		'WebsiteDesign'=>"��վ����",               
		'WebsiteDevelopment'=>"��վ����",               
		'InternalInspection'=>"�ڲ�����",           
		'CustomerAcceptance'=>"�ͻ�����",            
		'WebsiteReleased'=>"��վ����"
		);

	$FilterKeys = array_keys($FilterArray);

	$array_combine = array_combine($FilterKeys);
	$returnColorArray = returnColorArrayTableFilter();

	for($k=0;$k<sizeof($FilterKeys);$k++)			{
		$KeyElement = $FilterKeys[$k];
		if($rs_a[0][$KeyElement]!="")		{
			$fieldvalue = $FilterArray[$KeyElement];
			$KeyElement2 = $FilterKeys[$k+1];

			//�õ�ɫ��ֵ
			$Index = $array_combine[$KeyElement];
			$colorIndex = $Index%8;
			$colorValue = $returnColorArray[$colorIndex];

			if($FilterArray[$KeyElement2]=="")	{
				$MarkMEMO = "���������һ����".$FilterArray[$KeyElement];
			}
			else	{
				$MarkMEMO = "��һ����".$FilterArray[$KeyElement2];
			}
		}

	}
	
	//��������
	$sql = "update crm_customer set ExecuteStatus = '".$fieldvalue."' where CustomerID='$CustomerID'";
	$db->Execute($sql);
	//print $sql;

	$fieldvalue = "<font color=$colorValue title='$MarkMEMO'>$fieldvalue</font>";	

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