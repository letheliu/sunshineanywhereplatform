<?
function print_select_menu_product($showtext,$showFieldName,$showFieldID,$showtext2,$showFieldName2,$showFieldValue,$tableName,$SelectFieldName,$SelectFieldname2,$colspan=1)	{
global $db;
$sql="select $showFieldName,$showFieldID,$showFieldName2 from $tableName order by $showFieldName";//print $sql;//exit;
$rst=$db->Execute($sql);
print "<SCRIPT language=JavaScript>\n";
//-----data
print "var onecount;\n";
print "onecount=0;\n";
print "subcat = new Array();\n";
$i=0;
while(!$rst->EOF)	{
	print "subcat[$i] = new Array(\"".$rst->fields[$showFieldName]."\",\"".$rst->fields[$showFieldID]."\",\"".$rst->fields[$showFieldName2]."\");\n";
	$i++;
	$rst->MoveNext();
}
print "onecount=$i;\n";
//----deal_data_begin
print "  function changelocation(locationid)\n";
print "   {\n";
print "    document.form1.".$SelectFieldname2.".length = 0; \n";
print "    var locationid=locationid;\n";
print "    var i;\n";
print "    for (i=0;i<onecount;i++)\n";
print "        {\n";
print "          if (subcat[i][1] == locationid)\n";
print "            { \n";
print "             document.form1.".$SelectFieldname2.".value = subcat[i][2];\n";
print "            }    \n";    
print "        }\n";
print "    }    \n";
print "</SCRIPT>\n";
//-----deal_data_end
$html_etc_where_table=returnsystemlang($where_table);


$sql="select $showFieldName,$showFieldID,$showFieldName2 from $tableName order by $showFieldName";
$rse=$db->Execute($sql);
print "<TR><TD class=TableData noWrap>".$showtext."</TD><TD class=TableData noWrap>\n";
print "<SELECT id=$showFieldName onkeydown=\"if(event.keyCode==13)event.keyCode=9\" class=\"SmallSelect\" onchange=changelocation(document.form1.$showFieldName.options[document.form1.$showFieldName.selectedIndex].value) \n";
print "size=1 name=$SelectFieldName>\n";

$TestSelect = false;
while(!$rse->EOF)	{
	if($rse->fields[$showFieldID]==$showFieldValue)		{
		$selected='selected';
		$TestSelect=true;
		$ValueTextField = $rse->fields[$showFieldName2]; 
	}
	else	{
		$selected='';
	}
	print "<OPTION value=\"".$rse->fields[$showFieldID]."\" $selected>".$rse->fields[$showFieldName]."</OPTION>\n";
	$rse->MoveNext();
}
if(!$TestSelect)	{
	print "<OPTION value=\"\" selected>=========</OPTION>\n";
}
print "</SELECT> </TD></TR>\n";
print "<TR><TD class=TableData noWrap width=20%>".$showtext2."</TD><TD class=TableData noWrap>\n";
$ValueTextField!=""?'':$ValueTextField='=========';
print "<INPUT class=SmallStatic maxLength=20 name=".$SelectFieldname2." readonly value=\"".$ValueTextField."\"  onkeydown=\"if(event.keyCode==13)event.keyCode=9\">";
print "&nbsp; </TD></TR>\n";
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