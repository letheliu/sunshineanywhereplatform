<?
function getpagedata($sql,$sql_num,$pageid,$functionname,$tablename,$add,$add_var,$width="450",$pagenum="15",$isshowtableheader='',$action_page='action_page',$action_page_value='action_page_value')	{
global $db;
global $html_etc;
global $common_html;
print_R($common_html['common_html']);
//require_once('lang/getpagedata_html.php');
$rs = &$db->CacheExecute(15,$sql_num);
$rc=$rs->fields['num'];
$ROWS_PAGE=$pagenum;
$pagenums=ceil($rc/$ROWS_PAGE);
if($pageid==""||empty($pageid)){$pageid=1;}
if($pageid>$pagenums){$pageid=$pagenums;}
$from=($pageid-1)*$ROWS_PAGE;
$rsl=$db->SelectLimit($sql,$ROWS_PAGE,$from);
//require_once("./js/choose_all_$choose_lang.js");
table_begin($width);
if($isshowtableheader=='')				{
$function_header="show".$tablename."_header";
$function_header();
}
else if($notshowtableheader=='notshowtableheader')		{
}
else if($isshowtableheader!='notshowtableheader'&&$isshowtableheader!='')	{
$isshowtableheader();
}
else {
}
while(!$rsl->EOF)	{
	$functionname($rsl);
	$rsl->MoveNext();
}
//print "<TABLE class=small cellSpacing=1 cellPadding=3 width=$width align=center border=0>";
print "<tr><td class=TableData noWrap colspan=10>";
if($add!=""&&$add_var!="")	{
if($pageid<=1) {echo "".$common_html['common_html']['firstpage']."　";echo "".$common_html['common_html']['prevpage']."　";}  
else {	
	echo "<a href=\"$PHP_SELF?$add=$add_var&$action_page=$action_page_value&pageid=1\" title=\"".$common_html['common_html']['firstpage']."\">".$common_html['common_html']['firstpage']."</a>　";
	echo "<a href=\"$PHP_SELF?$add=$add_var&$action_page=$action_page_value&pageid=".($pageid-1)."\" title=\"".$common_html['common_html']['prevpage']."\">".$common_html['common_html']['prevpage']."</a>　";
	}//end if
if($pageid==$pagenums) {echo "".$common_html['common_html']['nextpage']."　";echo "".$common_html['common_html']['lastpage']."";}
else {	
	echo "<a href=\"$PHP_SELF?$add=$add_var&$action_page=$action_page_value&pageid=".($pageid+1)."\" title=\"".$common_html['common_html']['nextpage']."\">".$common_html['common_html']['nextpage']."</a>　";
	echo "<a href=\"$PHP_SELF?$add=$add_var&$action_page=$action_page_value&pageid=$pagenums\" title=\"".$common_html['common_html']['lastpage']."\">".$common_html['common_html']['lastpage']."</a>　";
	}//end if
}
else	{
	if($pageid<=1) {echo "".$common_html['common_html']['firstpage']."　";echo "".$common_html['common_html']['prevpage']."　";}  
else {	
	echo "<a href=\"$PHP_SELF?pageid=1&$action_page=$action_page_value\" title=\"".$common_html['common_html']['firstpage']."\">".$common_html['common_html']['firstpage']."</a>　";
	echo "<a href=\"$PHP_SELF?$action_page=$action_page_value&pageid=".($pageid-1)."\" title=\"".$common_html['common_html']['prevpage']."\">".$common_html['common_html']['prevpage']."</a>　";
	}//end if
if($pageid==$pagenums) {echo "".$common_html['common_html']['nextpage']."　";echo "".$common_html['common_html']['lastpage']."　";}
else {	
	echo "<a href=\"$PHP_SELF?$action_page=$action_page_value&pageid=".($pageid+1)."\" title=\"".$common_html['common_html']['nextpage']."\">".$common_html['common_html']['nextpage']."</a>　";
	echo "<a href=\"$PHP_SELF?$action_page=$action_page_value&pageid=$pagenums\" title=\"".$common_html['common_html']['lastpage']."\">".$common_html['common_html']['lastpage']."</a>　";
	}//end if
}
print "( ".$common_html['common_html']['page']." ".$pageid."/".$pagenums."　 ".$rc ." )\n";	
print "<input type=\"hidden\" name=\"ADD_INPUT\" value=\"$add\">\n";
print "<input type=\"hidden\" name=\"ADD_VAR_INPUT\" value=\"$add_var\">\n";
print "<input type=\"hidden\" name=\"action_page\" value=\"$action_page\">\n";
print "<input type=\"hidden\" name=\"action_page_value\" value=\"$action_page_value\">\n";
print "<input type=\"button\" value=\"".$common_html['common_html']['indexto']."\" class=\"SmallButton\" onclick=\"set_page();\" title=\"".$common_html['common_html']['indexto']."\">&nbsp;\n";
print "<input type=\"text\" name=\"PAGE_NUM\" value=\"$pageid\" class=\"SmallInput\" size=\"2\">&nbsp;&nbsp;\n";
print "</td></tr></table>";	
}



//###############################################################################
//
//
//
//###############################################################################


function getpagedata_checkall($sql,$sql_num,$pageid,$functionname,$tablename,$add,$add_var,$width="450",$pagenum="15",$isshowtableheader='',$disabled='',$action_page='action_page',$action_page_value='action_page_value')	{
global $db;
global $html_etc;
global $common_html;

//require_once('lang/getpagedata_html.php');
$rs = &$db->Execute($sql_num);
$rc=$rs->fields['num'];
if($rc==0)		{
	print_infor($common_html['common_html']['norecord'],'trip',"location='?action=init'");
	exit;
}
$ROWS_PAGE=$pagenum;
$pagenums=ceil($rc/$ROWS_PAGE);
if($pageid==""||empty($pageid)){$pageid=1;}
if($pageid>$pagenums){$pageid=$pagenums;}
$from=($pageid-1)*$ROWS_PAGE;
$rsl=$db->SelectLimit($sql,$ROWS_PAGE,$from);
require_once("./lib/choose_all_en.js");
table_begin($width);

if($isshowtableheader=='')				{
$function_header="show".$tablename."_header";
$function_header();
}
else if($notshowtableheader=='notshowtableheader')		{
}
else if($isshowtableheader!='notshowtableheader'&&$isshowtableheader!='')	{
$isshowtableheader();
}
else {
}

while(!$rsl->EOF)	{
	$functionname($rsl,$pageid);
	$rsl->MoveNext();
}

print "<tr><td class=TableData noWrap colspan=20>";

if($rc==0)		{
	print "<input type=\"checkbox\" name=\"allbox\" disabled onClick=\"check_all();\">".$common_html['common_html']['chooseall']." &nbsp;&nbsp;\n";
	print "<input type=\"button\"  value=\"".$common_html['common_html']['delete']."\" class=\"SmallButton\" disabled onClick=\"delete_mail();\" title=\"".$common_html['common_html']['delete']."\"> &nbsp;&nbsp;&nbsp;&nbsp;\n";
}
else	{
	print "<input type=\"checkbox\" name=\"allbox\"  onClick=\"check_all();\">".$common_html['common_html']['chooseall']." &nbsp;&nbsp;\n";
	print "<input type=\"button\"  value=\"".$common_html['common_html']['delete']."\" class=\"SmallButton\" $disabled onClick=\"delete_mail();\" title=\"".$common_html['common_html']['delete']."\"> &nbsp;&nbsp;&nbsp;&nbsp;\n";
}

if($add!=""&&$add_var!="")	{
if($pageid<=1) {echo "".$common_html['common_html']['firstpage']."　";echo "".$common_html['common_html']['prevpage']."　";}  
else {	
	echo "<a href=\"$PHP_SELF?$add=$add_var&pageid=1\" title=\"".$common_html['common_html']['firstpage']."\">".$common_html['common_html']['firstpage']."</a>　";
	echo "<a href=\"$PHP_SELF?$add=$add_var&pageid=".($pageid-1)."\" title=\"".$common_html['common_html']['prevpage']."\">".$common_html['common_html']['prevpage']."</a>　";
	}//end if
if($pageid==$pagenums) {echo "".$common_html['common_html']['nextpage']."　";echo "".$common_html['common_html']['lastpage']."";}
else {	
	echo "<a href=\"$PHP_SELF?$add=$add_var&pageid=".($pageid+1)."\" title=\"".$common_html['common_html']['nextpage']."\">".$common_html['common_html']['nextpage']."</a>　";
	echo "<a href=\"$PHP_SELF?$add=$add_var&pageid=$pagenums\" title=\"".$common_html['common_html']['lastpage']."\">".$common_html['common_html']['lastpage']."</a>　";
	}//end if
}
else	{
	if($pageid<=1) {echo "".$common_html['common_html']['firstpage']."　";echo "".$common_html['common_html']['prevpage']."　";}  
else {	
	echo "<a href=\"$PHP_SELF?pageid=1\" title=\"".$common_html['common_html']['firstpage']."\">".$common_html['common_html']['firstpage']."</a>　";
	echo "<a href=\"$PHP_SELF?pageid=".($pageid-1)."\" title=\"".$common_html['common_html']['prevpage']."\">".$common_html['common_html']['prevpage']."</a>　";
	}//end if
if($pageid==$pagenums) {echo "".$common_html['common_html']['nextpage']."　";echo "".$common_html['common_html']['lastpage']."　";}
else {	
	echo "<a href=\"$PHP_SELF?pageid=".($pageid+1)."\" title=\"".$common_html['common_html']['nextpage']."\">".$common_html['common_html']['nextpage']."</a>　";
	echo "<a href=\"$PHP_SELF?pageid=$pagenums\" title=\"".$common_html['common_html']['lastpage']."\">".$common_html['common_html']['lastpage']."</a>　";
	}//end if
}
print "( ".$common_html['common_html']['page']." ".$pageid."/".$pagenums."　 ".$rc ." )\n";
if($add==''||$add_var=='')	{
	$add='add';
	$add_var='add_var';
}
print "<input type=\"hidden\" name=\"ADD_INPUT\" value=\"$add\">\n";
print "<input type=\"hidden\" name=\"ADD_VAR_INPUT\" value=\"$add_var\">\n";
print "<input type=\"hidden\" name=\"action_page\" value=\"$action_page\">\n";
print "<input type=\"hidden\" name=\"action_page_value\" value=\"$action_page_value\">\n";
print "<input type=\"button\"  value=\"".$common_html['common_html']['indexto']."\" class=\"SmallButton\" onclick=\"set_page();\" title=\"".$common_html['common_html']['indexto']."\">&nbsp;\n";
print "<input type=\"text\" name=\"PAGE_NUM\" value=\"$pageid\" class=\"SmallInput\" size=\"2\">&nbsp;&nbsp;\n";
print "</td></tr>\n";
print "</table>";	
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