<?php
function partyfeein_Value($fieldvalue,$fields,$i)		{
    global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$��Ա��� = $fields['value'][$i]['���'];
	$��֧������ = $fields['value'][$i]['��������'];
	$���� = $fields['value'][$i]['����'];
	$�뵳ʱ�� = $fields['value'][$i]['�뵳ʱ��'];
	$����ְ�� = $fields['value'][$i]['����ְ��'];
	$����ְ�� = $fields['value'][$i]['����ְ��'];
	$sql = "select sum(���ɽ��) as ���ɽ��, Date_Format(����ʱ��,'%Y') as ������� from edu_partyfee where ��Ա��� ='".$��Ա���."' group by ������� order by ������� desc";
	//print $sql;
	$rs = $db -> Execute($sql);
	$rs_a = $rs -> GetArray();
	
	for($i=0;$i<sizeof($rs_a);$i++)
	{
		if($rs_a[$i]['�������']==Date("Y"))
		$thisyear_txt.=$rs_a[$i]['�������']."����ɵ���".$rs_a[$i]['���ɽ��']."Ԫ";
		else if($i<sizeof($rs_a)-1)
		$otheryear_txt.=$rs_a[$i]['�������']."����ɵ���".$rs_a[$i]['���ɽ��']."Ԫ\n";
		else
		$otheryear_txt.=$rs_a[$i]['�������']."����ɵ���".$rs_a[$i]['���ɽ��']."Ԫ";
	}
	$Text .= "(";
	$Text .="<a class = OrgAdd TITLE='$otheryear_txt' href =\"xingzheng_partyfeein_newai.php?action=add_default&��Ա���=$��Ա���&��Ա���_NAME=���&��Ա���_disabled=disabled&��������=$��֧������&��������_NAME=��֧������&��������_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&�뵳ʱ��=$�뵳ʱ��&�뵳ʱ��_NAME=�뵳ʱ��&�뵳ʱ��_disabled=disabled&����ְ��=$����ְ��&����ְ��_NAME=����ְ��&����ְ��_disabled=disabled&����ְ��=$����ְ��&����ְ��_NAME=����ְ��&����ְ��_disabled=disabled\">���ɵ���</a>";

	$Text .=" <a class = OrgAdd href=\"xingzheng_partyfeein_newai.php?action=init_default&��Ա���=$��Ա���&��Ա���_NAME=��Ա���&��Ա���_disabled=disabled\">���˽ɷѼ�¼</a>";
	$Text .=")";

	$Text.=$thisyear_txt;
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