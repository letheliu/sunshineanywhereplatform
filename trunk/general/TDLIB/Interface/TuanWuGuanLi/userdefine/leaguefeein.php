<?php
function leaguefeein_Value($fieldvalue,$fields,$i)		{
    global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$��Ա��� = $fields['value'][$i]['���'];
	$�������� = $fields['value'][$i]['��������'];
	$���� = $fields['value'][$i]['����'];
	$����ʱ�� = $fields['value'][$i]['����ʱ��'];

	$sql = "select sum(���ɽ��) as ���ɽ��, Date_Format(����ʱ��,'%Y') as ������� from edu_leaguefee where ��Ա��� =".$��Ա���." group by ������� order by ������� desc";

	$rs = $db -> Execute($sql);
	$rs_a = $rs -> GetArray();
	
	for($i=0;$i<sizeof($rs_a);$i++)
	{
		if($rs_a[$i]['�������']==Date("Y"))
		$thisyear_txt.=$rs_a[$i]['�������']."������ŷ�".$rs_a[$i]['���ɽ��']."Ԫ";
		else if($i<sizeof($rs_a)-1)
		$otheryear_txt.=$rs_a[$i]['�������']."������ŷ�".$rs_a[$i]['���ɽ��']."Ԫ\n";
		else
		$otheryear_txt.=$rs_a[$i]['�������']."������ŷ�".$rs_a[$i]['���ɽ��']."Ԫ";
	}
	$Text .= "(";
	$Text .="<a class = OrgAdd TITLE='$otheryear_txt' href =\"xingzheng_leaguefeein_newai.php?action=add_default
	&��Ա���=$��Ա���&��Ա���_NAME=���&��Ա���_disabled=disabled&��������=$��������&��������_NAME=��֧������&��������_disabled=disabled&����=$����&����_NAME=����&����_disabled=disabled&����ʱ��=$����ʱ��&����ʱ��_NAME=����ʱ��&����ʱ��_disabled=disabled\">�����ŷ�</a>";

	$Text .=" <a class = OrgAdd href=\"xingzheng_leaguefeein_newai.php?action=init_default
	&��Ա���=$��Ա���&��Ա���_NAME=��Ա���&��Ա���_disabled=disabled\">���˽ɷѼ�¼</a>";
	$Text .=")";

	$Text.=$thisyear_txt;
	return $Text;
}
?>