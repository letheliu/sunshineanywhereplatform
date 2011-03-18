<?
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-固定资产-按批次统计");

page_css("固定资产信息按批次进行统计");
print "<link rel='stylesheet' type='text/css' href='/theme/$LOGIN_THEME/style.css'>\n";
	print "<SCRIPT>\n";
	print "function td_calendar(fieldname) {\n";
	print "myleft=document.body.scrollLeft+event.clientX-event.offsetX-80;\n";
	print "mytop=document.body.scrollTop+event.clientY-event.offsetY+140;\n";
	print "window.showModalDialog(fieldname,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:280px;dialogHeight:220px;dialogTop:\"+mytop+\"px;dialogLeft:\"+myleft+\"px\");\n";
	print "}\n";
	print "function SubmitForm() {
		var 开始时间 = document.form1.开始时间.value;
		var 结束时间 = document.form1.结束时间.value;
		URL = \"?action=Stat&开始时间=\"+开始时间+\"&结束时间=\"+结束时间+\"\";
		location = URL;

		}\n";
	print "</SCRIPT>\n";
print "<form name=form1><table border=0 cellspacing=0 class=small bordercolor=#000000 cellpadding=3 width=800 style=\"border-collapse:collapse\"><tr><td nowrap>
";

if($_GET['开始时间']=="") $_GET['开始时间'] = date("Y-m-d",mktime(date("H"),date("i"),date("s"),date("m")-12,date("d"),date("Y")));;
if($_GET['结束时间']=="") $_GET['结束时间'] = date("Y-m-d",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));;

print "<INPUT class=SmallInput size=10  name=开始时间 value='".$_GET['开始时间']."' title='' onkeydown='if(event.keyCode==13)event.keyCode=9' >
<input type='button'  title=''  value='选择' class='SmallButton' onclick=\"td_calendar('../../Framework/sms_index/calendar_begin.php?datetime=开始时间');\" title='选择' name='button'>&nbsp;&nbsp;
<INPUT class=SmallInput size=10  name=结束时间 value='".$_GET['结束时间']."' title='' onkeydown='if(event.keyCode==13)event.keyCode=9' >
<input type='button'  title=''  value='选择' class='SmallButton' onclick=\"td_calendar('../../Framework/sms_index/calendar_begin.php?datetime=结束时间');\" title='选择' name='button'>&nbsp;&nbsp;&nbsp;<input type='button'  title=''  value='开始查询' class='SmallButton' onclick=\"SubmitForm()\" title='开始查询' name='button'>
<input type=button accesskey=p name=print value=\"打印\" class=SmallButton onClick=\"document.execCommand('Print');\" title=\"快捷键:ALT+p\">
";
//print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("开始时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-3,date("Y")))."&结束时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">最近三天</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("开始时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-30,date("Y")))."&结束时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">最近一个月</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("开始时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d")-90,date("Y")))."&结束时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">最近三个月</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("开始时间=".date("Y-m-d",mktime(0,0,1,date("m")-6,date("d"),date("Y")))."&结束时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">最近六个月</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("开始时间=".date("Y-m-d",mktime(0,0,1,date("m")-12,date("d"),date("Y")))."&结束时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">最近一年</a>";
print "&nbsp;&nbsp;&nbsp;<a href=\"?".base64_encode("开始时间=".date("Y-m-d",mktime(0,0,1,date("m")-24,date("d"),date("Y")))."&结束时间=".date("Y-m-d",mktime(0,0,1,date("m"),date("d"),date("Y")))."")."\">最近两年</a>";
print "</td></tr></table></form>  ";


//开始处理收费(借方)和退费(贷方)的现金日记账表


print "<table  class=TableBlock align=center width=800>
<TR><TD class=TableHeader align=left colSpan=40>&nbsp;固定资产信息按批次进行统计</TD></TR>
";


$开始时间 = $_GET['开始时间'];
$结束时间 = $_GET['结束时间'];
$开始时间ARRAY  = explode('-',$开始时间);
$结束时间ARRAY  = explode('-',$结束时间);
$开始时间 = date("Y-m-d H:i:s",mktime(0,0,1,$开始时间ARRAY[1],$开始时间ARRAY[2],$开始时间ARRAY[0]));
$结束时间 = date("Y-m-d H:i:s",mktime(0,0,1,$结束时间ARRAY[1],$结束时间ARRAY[2]+1,$结束时间ARRAY[0]));

$NewArray = array();
$SortArray = array();
//处理基本表数据
$sql = "select SUM(数量) AS 资产数量,SUM(数量*单价) AS 资产总金额,资产批次,所属部门,存放地点,购买日期 from fixedasset where 购买日期>='$开始时间' and 购买日期<='$结束时间' and 所属状态!='资产己报废' group by 资产批次 having 资产批次!=''";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Element = $rs_a[$i];
	$资产批次 = $Element['资产批次'];
	$资产数量 = $Element['资产数量'];
	$资产批次列表[$资产批次] = $资产数量;

	$资产信息汇总DEPT['资产总金额'][$资产批次] = $Element['资产总金额'];
	$资产信息汇总DEPT['资产数量'][$资产批次] = $Element['资产数量'];
	$资产信息汇总DEPT['所属部门'][$资产批次] = $Element['所属部门'];
	$资产信息汇总DEPT['存放地点'][$资产批次] = $Element['存放地点'];
	$资产信息汇总DEPT['购买日期'][$资产批次] = $Element['购买日期'];

	$总数 += $资产数量;
}
//print_R($资产信息汇总DEPT);
$资产总金额 = @array_sum($资产信息汇总DEPT['资产总金额']);
//处理最终结果表格输出

print "<tr class=TableHeader>
<td nowrap>序号</td>
<td nowrap>批次信息</td>
<td nowrap>资产数量</td>
<td nowrap>资产金额</td>
<td nowrap>所属部门</td>
<td nowrap>存放地点</td>
<td nowrap>购买日期</td>
</tr>
";


$资产批次列表Array = @array_keys($资产批次列表);
for($IX=0;$IX<sizeof($资产批次列表Array);$IX++)		{
	$资产批次 = $资产批次列表Array[$IX];
	$资产数量 = $资产信息汇总DEPT['资产数量'][$资产批次];
	$资产金额 = $资产信息汇总DEPT['资产总金额'][$资产批次];
	$所属部门 = $资产信息汇总DEPT['所属部门'][$资产批次];
	$存放地点 = $资产信息汇总DEPT['存放地点'][$资产批次];
	$购买日期 = $资产信息汇总DEPT['购买日期'][$资产批次];
	print "<tr class=TableData>
	<td nowrap>&nbsp;".($IX+1)."</td>
	<td nowrap>&nbsp;<a href=\"fixedasset_pici_details.php?资产批次=$资产批次\" target=_blank>$资产批次</a></td>
	<td nowrap>&nbsp;<a href=\"fixedasset_pici_details.php?资产批次=$资产批次\" target=_blank>$资产数量</a></td>
	<td nowrap>&nbsp;$资产金额</td>
	<td nowrap>&nbsp;$所属部门</td>
	<td nowrap>&nbsp;$存放地点</td>
	<td nowrap>&nbsp;$购买日期</td>
	";

}








$现有库存ALL = (int)$现有库存ALL;

$资产总金额 = number_format($资产总金额,2,'.','');
$资产总金额大写 = num2rmb($资产总金额);
print "<tr class=TableContent>
<td nowrap colspan=7>从 ".$_GET['开始时间']." 到 ".$_GET['结束时间']." 数量合计:".$总数."个 金额合计:".$资产总金额."元 $资产总金额大写</td>
";
print "</tr>";
print "</table>";
exit;






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