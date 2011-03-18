<?
//##########################################################
//格式：_add _view _Value				说明性表述方式
//userDefineNextElementControl_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineNextElementControl_view		查阅视图函数说明
//userDefineNextElementControl_Value	列表视图说明
//#########################################################
//提供用户自定义类型：用于增加和编辑数据时
function userDefineNextElementControl_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];

	
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$fieldHtml.":</TD>\n";
    print "<TD class=TableData colspan=$colspan>";
	if($fieldvalue==1||$fieldvalue=="on")	{
		print "<label>";
		print "<input type=\"radio\" class=Smallradio name=$fieldname value=\"1\" checked onClick=\"javasrcipt:document.form1.$fieldName1.disabled=false;\">".$common_html['common_html']['yes']."\n";
		print "<input type=\"radio\" name=$fieldname value=\"0\" onClick=\"javasrcipt:document.form1.$fieldName1.disabled=true;\">".$common_html['common_html']['no']."\n";
		print "</label>";

	}else	{
		print "<label>";
		print "<input type=\"radio\" class=Smallradio name=$fieldname value=\"1\" onClick=\"javasrcipt:document.form1.$fieldName1.disabled=false;\">".$common_html['common_html']['yes']."\n";
		print "<input type=\"radio\" name=$fieldname  checked  value=\"0\" onClick=\"javasrcipt:document.form1.$fieldName1.disabled=true;\">".$common_html['common_html']['no']."\n";
		print "</label>";
	}
	print $addtext;
	print "</TD>\n";
	print "</TR>\n";
}

//提供用户自定义类型：用于查阅数据时
function userDefineNextElementControl_view($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];

	
	$fieldHtml_ALL  = $html_etc[$tablename]['inforstatusmanagement'];
	
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";

	if($fieldvalue=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml]  = "		<input type=checkbox name=$fieldname disabled $checked>　";

	if($fieldValue1=="on")	$checked = "checked";
	else	$checked = "";
	$TableInfor['Content'][$fieldHtml1] = "		<input type=checkbox name=$fieldName1 disabled $checked>　";

	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";

	TableInforOutPut($TableInfor,"40%");
	print "</TD>\n";
	print "</TR>\n";
}


function userDefineNextElementControl_Value($fieldvalue,$fields,$i)		{
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