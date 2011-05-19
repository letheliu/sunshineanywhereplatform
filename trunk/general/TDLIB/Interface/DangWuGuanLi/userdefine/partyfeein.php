<?php
function partyfeein_Value($fieldvalue,$fields,$i)		{
    global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$人员编号 = $fields['value'][$i]['编号'];
	$党支部名称 = $fields['value'][$i]['机构名称'];
	$姓名 = $fields['value'][$i]['姓名'];
	$入党时间 = $fields['value'][$i]['入党时间'];
	$党内职务 = $fields['value'][$i]['党内职务'];
	$党外职务 = $fields['value'][$i]['党外职务'];
	$sql = "select sum(缴纳金额) as 缴纳金额, Date_Format(创建时间,'%Y') as 缴纳年份 from edu_partyfee where 人员编号 ='".$人员编号."' group by 缴纳年份 order by 缴纳年份 desc";
	//print $sql;
	$rs = $db -> Execute($sql);
	$rs_a = $rs -> GetArray();
	
	for($i=0;$i<sizeof($rs_a);$i++)
	{
		if($rs_a[$i]['缴纳年份']==Date("Y"))
		$thisyear_txt.=$rs_a[$i]['缴纳年份']."年缴纳党费".$rs_a[$i]['缴纳金额']."元";
		else if($i<sizeof($rs_a)-1)
		$otheryear_txt.=$rs_a[$i]['缴纳年份']."年缴纳党费".$rs_a[$i]['缴纳金额']."元\n";
		else
		$otheryear_txt.=$rs_a[$i]['缴纳年份']."年缴纳党费".$rs_a[$i]['缴纳金额']."元";
	}
	$Text .= "(";
	$Text .="<a class = OrgAdd TITLE='$otheryear_txt' href =\"xingzheng_partyfeein_newai.php?action=add_default&人员编号=$人员编号&人员编号_NAME=编号&人员编号_disabled=disabled&机构名称=$党支部名称&机构名称_NAME=党支部名称&机构名称_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&入党时间=$入党时间&入党时间_NAME=入党时间&入党时间_disabled=disabled&党内职务=$党内职务&党内职务_NAME=党内职务&党内职务_disabled=disabled&党外职务=$党外职务&党外职务_NAME=党外职务&党外职务_disabled=disabled\">缴纳党费</a>";

	$Text .=" <a class = OrgAdd href=\"xingzheng_partyfeein_newai.php?action=init_default&人员编号=$人员编号&人员编号_NAME=人员编号&人员编号_disabled=disabled\">个人缴费记录</a>";
	$Text .=")";

	$Text.=$thisyear_txt;
	return $Text;
}
?>