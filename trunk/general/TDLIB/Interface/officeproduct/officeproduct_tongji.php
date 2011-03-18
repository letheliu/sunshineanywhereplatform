<?
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-办公用品-仓库统计");

page_css("办公用品信息统计");
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
<TR><TD class=TableHeader align=left colSpan=40>&nbsp;办公用品信息统计</TD></TR>
";


$开始时间 = $_GET['开始时间'];
$结束时间 = $_GET['结束时间'];
$开始时间ARRAY  = explode('-',$开始时间);
$结束时间ARRAY  = explode('-',$结束时间);
$开始时间 = date("Y-m-d H:i:s",mktime(0,0,1,$开始时间ARRAY[1],$开始时间ARRAY[2],$开始时间ARRAY[0]));
$结束时间 = date("Y-m-d H:i:s",mktime(0,0,1,$结束时间ARRAY[1],$结束时间ARRAY[2]+1,$结束时间ARRAY[0]));

$NewArray = array();
$SortArray = array();
//处理出库表数据
$sql = "select 办公用品编号,办公用品名称,SUM(出库数量) AS 出库总数,出库仓库 from officeproductout where 创建时间>='$开始时间' and 创建时间<='$结束时间' group by 办公用品编号,出库仓库";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Element = $rs_a[$i];
	$办公用品编号 = $Element['办公用品编号'];
	$办公用品名称 = $Element['办公用品名称'];
	$出库总数 = $Element['出库总数'];
	$出库仓库 = $Element['出库仓库'];
	$仓库总列表[$出库仓库] = $出库仓库;
	$出库表数据[$办公用品编号][$出库仓库]['办公用品名称'] = $办公用品名称;
	$出库表数据[$办公用品编号][$出库仓库]['出库总数'] = $出库总数;

}

//处理入库表数据
$sql = "select 办公用品编号,办公用品名称,SUM(入库数量) AS 入库总数,入库仓库 from officeproductin where 创建时间>='$开始时间' and 创建时间<='$结束时间' group by 办公用品编号,入库仓库";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Element = $rs_a[$i];
	$办公用品编号 = $Element['办公用品编号'];
	$办公用品名称 = $Element['办公用品名称'];
	$入库总数 = $Element['入库总数'];
	$入库仓库 = $Element['入库仓库'];
	$仓库总列表[$入库仓库] = $出库仓库;
	$入库表数据[$办公用品编号][$入库仓库]['办公用品名称'] = $办公用品名称;
	$入库表数据[$办公用品编号][$入库仓库]['入库总数'] = $入库总数;
}

//处理退库表数据
$sql = "select 办公用品编号,办公用品名称,SUM(退库数量) AS 退库总数,退库仓库 from officeproducttui where 创建时间>='$开始时间' and 创建时间<='$结束时间' group by 办公用品编号,退库仓库";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Element = $rs_a[$i];
	$办公用品编号 = $Element['办公用品编号'];
	$办公用品名称 = $Element['办公用品名称'];
	$退库总数 = $Element['退库总数'];
	$退库仓库 = $Element['退库仓库'];
	$仓库总列表[$退库仓库] = $出库仓库;
	$退库表数据[$办公用品编号][$退库仓库]['办公用品名称'] = $办公用品名称;
	$退库表数据[$办公用品编号][$退库仓库]['退库总数'] = $退库总数;
}



//处理报废表数据
$sql = "select 办公用品编号,办公用品名称,SUM(报废数量) AS 报废总数,所属仓库 AS 报废仓库 from officeproductbaofei where 创建时间>='$开始时间' and 创建时间<='$结束时间' group by 办公用品编号,报废仓库";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Element = $rs_a[$i];
	$办公用品编号 = $Element['办公用品编号'];
	$办公用品名称 = $Element['办公用品名称'];
	$报废总数 = $Element['报废总数'];
	$报废仓库 = $Element['报废仓库'];
	$仓库总列表[$报废仓库] = $报废仓库;
	$报废表数据[$办公用品编号][$报废仓库]['办公用品名称'] = $办公用品名称;
	$报废表数据[$办公用品编号][$报废仓库]['报废总数'] = $报废总数;
}

//处理合并数组
//print_R($出库表数据);

$sql = "select * from officeproduct order by 办公用品编号";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();


//处理最终结果表格输出
print "<tr class=TableHeader>
<td nowrap>序号</td>
<td nowrap>办公用品编号</td>
<td nowrap>办公用品名称</td>
";
$仓库列表 = @array_keys($仓库总列表);
for($i=0;$i<sizeof($仓库列表);$i++)		{
	print "<td nowrap>{$仓库列表[$i]}</td>";
}
print "</tr>";
for($i=0;$i<sizeof($rs_a);$i++)				{
	$Key = $rs_a[$i];
	$办公用品编号 = $Key['办公用品编号'];
	$办公用品名称 = $Key['办公用品名称'];
	$现有库存 = $Key['现有库存'];
	$入库总数 = $入库表数据[$办公用品编号]['入库总数'];
	$出库总数 = $出库表数据[$办公用品编号]['出库总数'];
	$退库总数 = $退库表数据[$办公用品编号]['退库总数'];
	$报废仓库 = $报废表数据[$办公用品编号]['报废仓库'];

print "<tr class=TableData>
<td nowrap><font color=black>".($i+1)."</font></td>
<td nowrap>$办公用品编号</td>
<td nowrap>$办公用品名称</td>
";

for($xi=0;$xi<sizeof($仓库列表);$xi++)		{
	$仓库名称 = $仓库列表[$xi];
	$Index = $入库表数据[$办公用品编号][$仓库名称]['入库总数'] + $退库表数据[$办公用品编号][$仓库名称]['退库总数'] - $出库表数据[$办公用品编号][$仓库名称]['出库总数'] - $报废表数据[$办公用品编号][$仓库名称]['报废总数'];
	print "<td nowrap>$Index</td>";

	$现有库存Array[$仓库名称] += $Index;
	$现有库存ALL += $Index;
}
print "</tr>";



}
$现有库存ALL = (int)$现有库存ALL;
print "<tr class=TableData>
<td nowrap colspan=3>从 ".$_GET['开始时间']." 到 ".$_GET['结束时间']." 合计:$现有库存ALL</td>
";
for($i=0;$i<sizeof($仓库列表);$i++)		{
	$仓库名称 = $仓库列表[$i];
	print "<td nowrap>".$现有库存Array[$仓库名称]."</td>";
}
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