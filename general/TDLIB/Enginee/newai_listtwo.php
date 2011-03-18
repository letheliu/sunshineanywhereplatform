<?
function newai_list_two()			{
	global $db,$common_html,$tablename_one,$tablename_two,$link;
	global $html_etc_one,$html_etc_two,$columns_one,$columns_two;
	global $tablename,$SYTEM_CONFIG_TABLE;
	print "<SCRIPT language=JavaScript>
	function clickMenu(ID){ 
	 targetelement=document.all(ID);
	if (targetelement.style.display=='none')
			targetelement.style.display='';
	else
	   targetelement.style.display='none';
	 }
	</SCRIPT>
	";
	$one_array=explode(':',$tablename_one);
	$two_array=explode(':',$tablename_two);
	$link_array=explode(':',$link);
	$columns=returntablecolumn($tablename);
	$columns_one=returntablecolumn($one_array[0]);
	$html_etc_one=returnsystemlang($one_array[0],$SYTEM_CONFIG_TABLE);
	$columns_two=returntablecolumn($two_array[0]);
	$html_etc_two=returnsystemlang($two_array[0],$SYTEM_CONFIG_TABLE);
	$sql_one="select ".$columns_one[(string)$one_array[1]].",".$columns_one[(string)$one_array[2]]." from ".$one_array[0]."";
	$rs_one=$db->Execute($sql_one);
	$Number = $rs_one->RecordCount();
	if($Number==0)			{
		print_infor($common_html['common_html']['norecord'],'trip');
		exit;
	}

	while(!$rs_one->EOF)		{
	print "
	<TABLE class=small cellSpacing=1 cellPadding=0 width='100%' align=center bgColor=#000000 border=0>
	<TBODY>
	<TR bgColor='#d3e5fa' title='' style='CURSOR: hand'	 onclick=clickMenu('".$rs_one->fields[(string)$columns_one[(string)$one_array[1]]]."')>
	<TD noWrap align=middle><table class=small cellPadding=3 align=center width=100% border=0 onmouseover=bgColor='#ffffff' onmouseout=bgColor='#d3e5fa'>
	<Tr><td align=middle><B>".$rs_one->fields[(string)$columns_one[(string)$one_array[2]]]."</B></TD></TR>
	</table></TD></TR>
	</TBODY></TABLE>\n";
	
	$one_id=$rs_one->fields[(string)$columns_one[(string)$one_array[1]]];
	$sql_two="select ".$columns_two[(string)$two_array[1]].",".$columns_two[(string)$two_array[2]]." from ".$two_array[0]." where ".$columns_two[(string)$two_array[3]]."='$one_id'";
	$rs_two=$db->Execute($sql_two);//print $sql_two;//exit;
	print "
	<TABLE class=small id=$one_id style='DISPLAY: none'
	cellSpacing=1 cellPadding=0 width='100%' bgColor=#000000 border=0>
	<TBODY>\n";
	while(!$rs_two->EOF)		{
	$two_id=$rs_two->fields[(string)$columns_two[(string)$two_array[1]]];
	$two_name=$rs_two->fields[(string)$columns_two[(string)$two_array[2]]];
	print "<TR class=TableData align=middle height=20>
	<TD noWrap><A href='".$link_array[0]."?".$link_array[1]."=".$link_array[2]."&".$columns[(string)$link_array[3]]."=$two_id&".$columns_one[(string)$one_array[1]]."=$one_id' target=\"main_body\">".$two_name."</A>
	</TD></TR>\n";
	$rs_two->MoveNext();
	}
	print "</TBODY></TABLE>\n";
	
	$rs_one->MoveNext();
	}

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