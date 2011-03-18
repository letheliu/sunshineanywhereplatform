<?
function newai_list_one()			{
	global $db,$common_html,$tablename_one,$tablename_two,$link;
	global $html_etc_one,$html_etc_two,$columns_one,$columns_two;
	global $tablename,$SYTEM_CONFIG_TABLE;
	global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
	$USER_NAME=$_SESSION[$SUNSHINE_USER_NAME_VAR];
	print "<SCRIPT language=JavaScript>
	function clickMenu(url){
	parent.main_body.location=url;
	}
	</SCRIPT>
	";
	$one_array=explode(':',$tablename_one);//print_R($one_array);
	$link_array=explode(':',$link);//print_R($link_array);
	$columns=returntablecolumn($tablename);
	$columns_one=returntablecolumn($one_array[0]);
	$html_etc_one=returnsystemlang($one_array[0],$SYTEM_CONFIG_TABLE);
	switch($db->databaseType)				{
		case 'mysql':
			switch($one_array[3])			{
				case 'name':
					$sql_one="select ".$columns_one[(string)$one_array[1]].",".$columns_one[(string)$one_array[2]]." from ".$one_array[0]." where ".$columns_one[(string)$one_array[4]]."='".$USER_NAME."'";
					break;
				case 'id':
					$sql_one="select ".$columns_one[(string)$one_array[1]].",".$columns_one[(string)$one_array[2]]." from ".$one_array[0]."";
					break;
				default:
					$sql_one="select ".$columns_one[(string)$one_array[1]].",".$columns_one[(string)$one_array[2]]." from ".$one_array[0]."";
					break;
			}
			break;
		case 'mssql':
			switch($one_array[3])			{
				case 'name':
					$sql_one="select [".$columns_one[(string)$one_array[1]]."],[".$columns_one[(string)$one_array[2]]."] from [".$one_array[0]."] where [".$columns_one[(string)$one_array[4]]."]='".$USER_NAME."'";
					break;
				case 'id':
					$sql_one="select [".$columns_one[(string)$one_array[1]]."],[".$columns_one[(string)$one_array[2]]."] from [".$one_array[0]."]";
					break;
				default:
					$sql_one="select [".$columns_one[(string)$one_array[1]]."],[".$columns_one[(string)$one_array[2]]."] from [".$one_array[0]."]";
					break;
			}
			break;
	}

	//print $sql_one;
	$rs_one=$db->CacheExecute(150,$sql_one);
	if($rs_one->RecordCount()==0)			{
		print_infor($common_html['common_html']['norecord'],'trip');
		exit;
	}
	while(!$rs_one->EOF)		{
	if(StrLen($link_array[3])>2)	$LinkIndexName = (string)$link_array[3];
	else		$LinkIndexName = $columns[(string)$link_array[3]];
	$url=$link_array[0]."?".$link_array[1]."=".$link_array[2]."&".$LinkIndexName."=".$rs_one->fields[(string)$columns_one[(string)$one_array[1]]];
	print "
	<TABLE class=small cellSpacing=1 cellPadding=0 width='100%' align=center bgColor=#000000 border=0>
	<TBODY>
	<TR class=TableContent title='' style='CURSOR: hand'	 onclick=clickMenu('$url')>
	<TD noWrap align=middle><table class=small cellPadding=3 align=center width=100% border=0 onmouseover=bgColor='#ffffff' onmouseout=bgColor='#d3e5fa'>
	<Tr><td align=middle><B>".$rs_one->fields[(string)$columns_one[(string)$one_array[2]]]."</B></TD></TR>
	</table></TD></TR>
	</TBODY></TABLE>\n";
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