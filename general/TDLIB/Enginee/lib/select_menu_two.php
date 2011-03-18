<?
function print_select_two($showtext,$showfield,$showtext2,$fieldname2,$value,$tablename,$field_value,$field_name,$where,$where_value,$where_table,$where_table_value,$where_table_name,$colspan=1,$value2)	{
global $db,$_SESSION,$SUNSHINE_USER_DEPT_VAR;

	 //用户类型限制条件##########################开始
	 global $fields;
	 global $fields2;
	 //print $value;
	 //print_R($fields['value']);
	 //print_R($fields['USER_PRIVATE'][$var]);
	 if($fields['USER_PRIVATE'][$showfield]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$showfield];
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallSelect";
	 }
	 //用户类型限制条件##########################结束


$sql="select $where_table_value,$where_table_name,$where from $where_table order by $where_table_value";
//print $value2;//exit;
$rst=$db->Execute($sql);
print "<SCRIPT language=JavaScript>\n";
//-----data
print "var onecount;\n";
print "onecount=0;\n";
print "subcat = new Array();\n";
$i=0;
while(!$rst->EOF)	{
		//对班级信息进行特殊处理
		if($where_table=="edu_banji")		{ 
			$OneClassStudentNumber = OneClassStudentNumber($rst->fields[$where_table_name]);	
			$OneClassStudentNumber = "(".$OneClassStudentNumber."人)";
		} else	{
			$OneClassStudentNumber = '';
		}

	print "subcat[$i] = new Array(\"".$rst->fields[$where_table_name]."[".$rst->fields[$where_table_value]."]".$OneClassStudentNumber."\",\"".$rst->fields[$where]."\",\"".$rst->fields[$where_table_value]."\");\n";
	$i++;
	$rst->MoveNext();
}
print "onecount=$i;\n";
//----deal_data_begin
print "  function changelocation(locationid)\n";
print "   {\n";
print "    document.form1.$fieldname2.length = 0; \n";
print "    var locationid=locationid;\n";
print "    var i;\n";
print "    for (i=0;i<onecount;i++)\n";
print "        {\n";
print "          if (subcat[i][1] == locationid)\n";
print "            { \n";
print "             document.form1.$fieldname2.options[document.form1.$fieldname2.length] = new Option(subcat[i][0], subcat[i][2]);\n";
print "            }    \n";    
print "        }\n";
print "    }    \n";
print "</SCRIPT>\n";
//-----deal_data_end
$html_etc_where_table=returnsystemlang($where_table);


$sql="select $field_value,$field_name from $tablename order by $field_value";
$rse=$db->Execute($sql);
//print "<BR>".$sql;//exit;
print "<TR><TD class=TableData noWrap>".$showtext."</TD><TD class=TableData noWrap>\n";
print "<SELECT id=$showfield $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' onkeydown=\"if(event.keyCode==13)event.keyCode=9\" class=\"$class\" onchange=changelocation(document.form1.$showfield.options[document.form1.$showfield.selectedIndex].value) \n";
print "size=1 name=$showfield>\n";

$$TestSelect = false;
while(!$rse->EOF)	{
	if($rse->fields[$field_value]==$value)		{
		$selected='selected';
		$TestSelect=true;
	}
	else	{
		$selected='';
	}
	print "<OPTION value=\"".$rse->fields[$field_value]."\" $selected>".$rse->fields[$field_name]."[".$rse->fields[$field_value]."]</OPTION>\n";
	$rse->MoveNext();
}
if(!$TestSelect)	{
	print "<OPTION value=\"\" selected>请选择您所要选中的记录项</OPTION>\n";
}
print "</SELECT> </TD></TR>\n";

$where_value==""?$where_value=$value:'';

//print $where_value;
$sql="select $where_table_value,$where_table_name from $where_table  where $where='$where_value' order by $where_table_name";
//print $sql;//exit;
global $html_etc;



print "<TR><TD class=TableData noWrap>".$showtext2."</TD><TD class=TableData noWrap>\n";
print "<SELECT name=$fieldname2 class=\"$class\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' onkeydown=\"if(event.keyCode==13)event.keyCode=9\">\n";
$rsc=$db->Execute($sql);

while(!$rsc->EOF)	{

	//对班级信息进行特殊处理
	if($where_table=="edu_banji")		{ 
		$OneClassStudentNumber = OneClassStudentNumber($班级名称);	
		$OneClassStudentNumber = "(".$OneClassStudentNumber."人)";
	} else	{
		$OneClassStudentNumber = '';
	}
	
	$value2==$rsc->fields[$where_table_value]?$selected='selected':$selected='';
	print "<OPTION value=\"".$rsc->fields[$where_table_value]."\" $selected>".$rsc->fields[$where_table_name]."[".$rsc->fields[$where_table_value]."]$OneClassStudentNumber</OPTION>\n";
	$rsc->MoveNext();
}
if($rsc->RecordCount()==0)	{
	print "<OPTION value=\"\" $selected>请选择您所要选中的记录项</OPTION>\n";
}
print "</SELECT>&nbsp; ".$rsc->fields[$where_table_value]."</TD></TR>\n";
}


function OneClassStudentNumber($班级名称)	{
	global $db;
	$sql = "select count(姓名) as NUM from edu_student where 班号='$班级名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	return $rs_a[0]['NUM'];
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