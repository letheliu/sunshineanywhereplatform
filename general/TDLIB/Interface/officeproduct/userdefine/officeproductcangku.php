<?
//##########################################################
//��ʽ��_add _view _Value		˵���Ա�����ʽ
//userDefineInforStatus_add		������༭�ĺ������ƣ�����������ǰ��Ϊ����ͼ������Ϊ�ֶ�����ֵ
//userDefineInforStatus_view	������ͼ����˵��
//userDefineInforStatus_Value	�б���ͼ˵��
//#########################################################
//�ṩ�ʲ����������ʲ�״̬�Ĳ�����Ϣ�趨��
//#########################################################
$officeproductcangku = "�ṩ�ʲ����������ʲ�״̬�Ĳ�����Ϣ�趨��";
function officeproductcangku_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$���п�� = $fields['value'][$i]['������'];
	/*
	$�칫��Ʒ��� = $fields['value'][$i]['�칫��Ʒ���'];
	$�칫��Ʒ���� = $fields['value'][$i]['�칫��Ʒ����'];

	//�õ��ð칫��Ʒ�ڲ�ͬ�ֿ�Ŀ��

	$sql = "select SUM(�������) AS �������,���ֿ� from officeproductin where �칫��Ʒ���='$�칫��Ʒ���' group by ���ֿ�";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$������� += $rs_a[$i]['�������'];
		$���ֿ� = $rs_a[$i]['���ֿ�'];
		$�����Ϣ[$���ֿ�] = $rs_a[$i]['�������'];
		$NewArray[$���ֿ�] = $���ֿ�;
	}

	$sql = "select SUM(�˿�����) AS �˿�����,�˿�ֿ� from officeproducttui where �칫��Ʒ���='$�칫��Ʒ���' group by �˿�ֿ�";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$�˿����� += $rs_a[$i]['�˿�����'];
		$�˿�ֿ� = $rs_a[$i]['�˿�ֿ�'];
		$�˿���Ϣ[$�˿�ֿ�] = $rs_a[$i]['�˿�����'];
		$NewArray[$�˿�ֿ�] = $�˿�ֿ�;
	}

	$sql = "select SUM(��������) AS ��������,����ֿ� from officeproductout where �칫��Ʒ���='$�칫��Ʒ���' group by ����ֿ�";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$�������� += $rs_a[$i]['��������'];
		$����ֿ� = $rs_a[$i]['����ֿ�'];
		$������Ϣ[$����ֿ�] = $rs_a[$i]['��������'];
		$NewArray[$����ֿ�] = $����ֿ�;
	}


	$sql = "select SUM(��������) AS ��������,�����ֿ� from officeproductbaofei where �칫��Ʒ���='$�칫��Ʒ���' group by �����ֿ�";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$�������� += $rs_a[$i]['��������'];
		$�����ֿ� = $rs_a[$i]['�����ֿ�'];
		$������Ϣ[$�����ֿ�] = $rs_a[$i]['��������'];
		$NewArray[$�����ֿ�] = $�����ֿ�;
	}


	
	$�ֿ��б� = array();
	$�ֿ��б� = @array_keys($NewArray);

	$���п�� = $�������+$�˿�����-$��������-$��������;
	*/

	//print ";";
	
	$Text = "<font color=red title='���п��'>&nbsp;&nbsp;$���п��</font>";
	
	//$�ֿ��б� = asort($�ֿ��б�);
	//print_R($�������);print ";";
	//print_R($�˿�����);print ";";
	//print_R($��������);print ";";
	//print_R($�����Ϣ);print ";";
	//print_R($�˿���Ϣ);print ";";
	//print_R($������Ϣ);exit;

	for($i=0;$i<sizeof($�ֿ��б�);$i++)			{
		$�ֿ����� = $�ֿ��б�[$i];
		$�òֿ��� = $�����Ϣ[$�ֿ�����]+$�˿���Ϣ[$�ֿ�����]-$������Ϣ[$�ֿ�����]-$������Ϣ[$�ֿ�����];
		$Text2 .= $�ֿ�����.":".$�òֿ���." ";
	}

	//�ѽ�����µ��칫��Ʒ������
	//$sql = "update officeproduct set ������='$���п��' where �칫��Ʒ���='$�칫��Ʒ���'";
	//$db->Execute($sql);
	//print $sql;
	//print_R($NewArray);exit;
	if($Text2!="")		{
		$Text .= "[".$Text2."]";
	}

	return $Text;
}
?>