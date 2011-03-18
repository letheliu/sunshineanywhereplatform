<script language="JavaScript">
function GetResult(str)
{
var oBao = new ActiveXObject("Microsoft.XMLHTTP");
oBao.open("POST","XmlHttpServer.php?sel="+str,false);
oBao.send();
//服务器端处理返回的是经过escape编码的字符串.
//通过XMLHTTP返回数据,开始构建Select.
BuildSel(unescape(oBao.responseText),document.all.SelectName2)
}
function BuildSel(str,sel)
{
sel.options.length=0;
var arrstr = new Array();
arrstr = str.split(",");

for(var i=0;i<arrstr.length;i++)
{
sel.options[sel.options.length]=new Option(arrstr[i],arrstr[i])
}
}
</script>
<select name="SelectName" onChange="GetResult(this.value)">
<option value="">请选择
<option value="福建省">福建省</option>
<option value="湖北省">湖北省</option>
<option value="辽宁省">辽宁省</option>
<select>
<select name="SelectName2">
<option value="">====</option>
</select><?
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