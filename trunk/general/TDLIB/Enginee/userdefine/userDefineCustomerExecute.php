<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
//提供用户自定义类型：用于增加和编辑数据时
function userDefineCustomerExecute_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];
	$fieldName2 = $fields['name'][$i+2];
	$fieldName3 = $fields['name'][$i+3];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];
	$fieldValue2 = $fields['value'][$fieldName2];
	$fieldValue3 = $fields['value'][$fieldName3];

	$fieldHtml  = $common_html['common_html']['choose'];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];
	$fieldHtml2 = $html_etc[$tablename][$fieldName2];
	$fieldHtml3 = $html_etc[$tablename][$fieldName3];


	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname];



	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE']);
	 if($fields['USER_PRIVATE'][$fieldname]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$fieldname];
		 $class = "SmallStatic";
		 $class2 = "BigStatic";
		 $disabled = "disabled";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallInput";
		 $class2 = "BigInput";
		 $disabled = "";
	 }
	 //用户类型限制条件##########################结束

	print "<SCRIPT>
		function td_calendar_".$fieldName3."(fieldname) {
		myleft=document.body.scrollLeft+event.clientX-event.offsetX-80;
		mytop=document.body.scrollTop+event.clientY-event.offsetY+140;
		window.showModalDialog(fieldname,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:280px;dialogHeight:200px;dialogTop:\"+mytop+\"px;dialogLeft:\"+myleft+\"px\");
		}
		</SCRIPT>\n";
	
	print "<TR>\n";
    print "<TD class=TableData noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	if($fieldvalue=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml]  = "		<input type=checkbox name=$fieldname $readonly $checked>　";

	$TableInfor['Content'][$fieldHtml1] = "		<select class=\"SmallSelect\" name=\"$fieldName1\"  $disabled>\n";
	for($i=0;$i<6;$i++)			{
		if($fieldValue1==$i)	{
			$Selected = "selected";
		}
		else	{
			$Selected = "";
		}
		$TableInfor['Content'][$fieldHtml1] .= "<option value=$i $Selected >$i</option>\n";
	}
	$TableInfor['Content'][$fieldHtml1] .= "		</select>　\n";
											
    if($fieldValue2=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml2] = "		<input type=checkbox name=$fieldName2 $readonly $checked>　";
	$TableInfor['Content'][$fieldHtml3] = "		<INPUT class=$class size=9 name=$fieldName3 $readonly value='".$fieldValue3."'> <input type=\"button\"  value=\"".$common_html['common_html']['choose']."\"  $readonly class=\"SmallButton\" value='".$fieldValue3."' onclick=\"td_calendar_".$fieldName3."('../../Framework/sms_index/calendar_begin.php?datetime=$fieldName3');\"  name=\"button\">　";
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	$TableInfor['cols'][$fieldHtml2] = "1";
	$TableInfor['cols'][$fieldHtml3] = "1";
	TableInforOutPut4($TableInfor,"100%");
	print "</TD>\n";
	print "</TR>\n";
}

//提供用户自定义类型：用于查阅数据时
function userDefineCustomerExecute_view($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];
	$fieldName2 = $fields['name'][$i+2];
	$fieldName3 = $fields['name'][$i+3];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];
	$fieldValue2 = $fields['value'][$fieldName2];
	$fieldValue3 = $fields['value'][$fieldName3];

	$fieldHtml  = $common_html['common_html']['choose'];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];
	$fieldHtml2 = $html_etc[$tablename][$fieldName2];
	$fieldHtml3 = $html_etc[$tablename][$fieldName3];


	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname];
	
	print "<TR>\n";
    print "<TD class=TableData noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	if($fieldvalue=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml]  = "		<input type=checkbox name=$fieldname disabled $checked>　";

	$TableInfor['Content'][$fieldHtml1] = $fieldValue1;
											
    if($fieldValue2=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml2] = "		<input type=checkbox name=$fieldName2 disabled $checked>　";
	$TableInfor['Content'][$fieldHtml3] = $fieldValue3;
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	$TableInfor['cols'][$fieldHtml2] = "1";
	$TableInfor['cols'][$fieldHtml3] = "1";
	TableInforOutPut4($TableInfor,"40%");
	print "</TD>\n";
	print "</TR>\n";
}

function userDefineCustomerExecute_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	return $fieldvalue;
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