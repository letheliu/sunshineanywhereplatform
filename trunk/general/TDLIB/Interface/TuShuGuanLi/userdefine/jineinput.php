<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
//提供用户自定义类型：用于增加和编辑数据时
$jineinput = "用于数量,单价,与金额之间的联动关系,在新建和编辑视图,集美需求";
function jineinput_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	$fieldname = $fields['name'][$i];
	$数量 = $fields['value']['数量'];
	$单价 = $fields['value']['单价'];
	$金额 = $fields['value']['金额'];
	$showtext  = $html_etc[$tablename][$fieldname];
	print "
	<script>
	function DoItInforJinEr()		{
		var 数量 = document.form1.数量.value;
		var 单价 = document.form1.单价.value;
		var 金额 = 数量*单价;
		var 处理后金额 = Math.round(金额*100)/100;
		//alert(数量);alert(单价);alert(金额);
		document.form1.金额.value = 处理后金额;
	}
	</script>
<TR>
<TD class=TableData noWrap width=20%>单价:</TD>
<TD class=TableData noWrap colspan=\"2\"><INPUT type=\"text\" title='' onkeydown=\"if(event.keyCode==13)event.keyCode=9\" accesskey='7' class=\"SmallInput\"  maxLength=200 size=\"30\" name=\"单价\" value=\"$单价\" onkeyup=\"check_input_num('MONEY');DoItInforJinEr();\"
>&nbsp;
</TD></TR>
<TR>
<TD class=TableData noWrap width=20%>数量:</TD>
<TD class=TableData noWrap colspan=\"2\"><INPUT type=\"text\" title='' onkeydown=\"if(event.keyCode==13)event.keyCode=9\" accesskey='6' class=\"SmallInput\"  maxLength=200 size=\"30\" name=\"数量\" value=\"$数量\"  onkeyup=\"value=value.replace(/[^\d]/g,'');DoItInforJinEr();\"  onbeforepaste=\"clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''));DoItInforJinEr();\"  >&nbsp;
</TD></TR>

<TR><TD class=TableData noWrap>金额:</TD>
<TD class=TableData noWrap colspan=\"2\">
<input type=\"hidden\" name=\"\" value=\"\">
<input type=\"text\" name=\"金额\" value=\"$金额\" readonly class=\"SmallStatic\" size=\"20\">(此处由数量和单价自动生成金额)
</TD></TR>
	";
}
//(注:如果需要精确到人,此处设为1,不需要精确到人的资产可以设>1的值)
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