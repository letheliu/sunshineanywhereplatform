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
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>