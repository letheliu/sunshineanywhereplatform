<?
function menu_table_3($showtext,$url,$pic,$tree_pic="tree_blank.gif",$tree_pic2="tree_line.gif",$tree_pic3='tree_line.gif',$addfile='menu.php')	{
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG src=\"images/$tree_pic2\"></TD>\n";
    print "<TD><IMG src=\"images/$tree_pic3\" border=0></TD>\n";
    print "<TD><IMG src=\"images/$tree_pic\"></TD>\n";
    print "<TD><IMG height=18 alt=\"$showtext\" src=\"images/$pic\" \n";
    print "width=18 border=0></TD>\n";
    print "<TD colSpan=2><A onclick=\"openURL('$url')\" href=\"$addfile#A\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function menu_table_2($showtext,$url,$pic,$tree_pic="tree_blank.gif",$tree_pic2="tree_line.gif",$addfile='menu.php')	{
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG src=\"images/$tree_pic2\"></TD>\n";
    print "<TD><IMG src=\"images/$tree_pic\"></TD>\n";
    print "<TD><IMG height=18 alt=\"$showtext\" src=\"images/$pic\" \n";
    print "width=18 border=0></TD>\n";
    print "<TD colSpan=2><A onclick=\"openURL('$url')\" href=\"$addfile#A\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function parent_table_1($showtext="我的办公桌",$pic="mytable.gif",$id="01",$image='tree_plus.gif',$addfile='menu.php')	{
	global $menu_mark;
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG class=outline id=".$menu_mark.$id." style=\"CURSOR: hand\" src=\"images/$image\"></TD>\n";
    print "<TD><IMG height=18 alt=\"$showtext\" src=\"images/$pic\" width=18 border=0></TD>\n";
    print "<TD colSpan=3><A onclick=".$menu_mark.$id.".click(); href=\"$addfile#A\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function parent_table_2($showtext="电子邮件",$pic="@mail.gif",$id="01",$tree_plus='tree_plus.gif',$tree_pic2='tree_line.gif',$addfile='menu.php')	{
	global $menu_mark;
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG src=\"images/$tree_pic2\" border=0></TD>\n";
    print "<TD><IMG class=outline id=".$menu_mark.$id." style=\"CURSOR: hand\" src=\"images/$tree_plus\"></TD>\n";
    print "<TD><IMG height=18 alt=\"$showtext\" src=\"images/$pic\" width=18 border=0></TD>\n";
    print "<TD colSpan=2><A onclick=".$menu_mark.$id.".click(); href=\"$addfile#A\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function part_table_begin($id="0104")	{
	global $menu_mark;
	print "<TABLE class=small id=".$menu_mark.$id."d style=\"DISPLAY: none\" cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD>\n";
}
function part_table_end()	{
	print "</TD></TR></TBODY></TABLE>\n";
}


function system_menu_js($location='parent.parent.main')	{

?>

<SCRIPT language=JavaScript>
var openedid;
var openedid_ft;
var flag=0,sflag=0;

function clickHandler()
{
	var targetid,srcelement,targetelement;
	var strbuf;
	srcelement=window.event.srcElement;

	//-------- 如果点击了展开或收缩按钮---------
	if(srcelement.className=="outline")
	{
		targetid=srcelement.id+"d";
		targetelement=document.all(targetid);
		if (targetelement.style.display=="none")
		{
			targetelement.style.display='';
			strbuf=srcelement.src;
			if(strbuf.indexOf("plus.gif")>-1)
				srcelement.src="./images/tree_minus.gif";
			else
				srcelement.src="./images/tree_minusl.gif";
		}
		else
		{
			targetelement.style.display="none";
			strbuf=srcelement.src;
			if(strbuf.indexOf("minus.gif")>-1)
				srcelement.src="./images/tree_plus.gif";
			else
				srcelement.src="./images/tree_plusl.gif";
		}
	}
}

document.onclick = clickHandler;

function openURL(URL)
{
    <?=$location?>.location=URL;
}

</SCRIPT>
<?
}
function system_menu_css()		{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312"><LINK 
href="images/style_menu.css" rel=stylesheet>
<STYLE type=text/css>A:link {
	COLOR: #000000; TEXT-DECORATION: none
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
A:active {
	COLOR: #3333ff; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff0000; TEXT-DECORATION: none
}
</STYLE>

<META content="MSHTML 6.00.2800.1106" name=GENERATOR></HEAD>
<BODY bgColor=#d9e8ff leftMargin=0 topMargin=3 rightMargin=0 marginheight="0" 
marginwidth="0"><!-- OA树开始-->
<?
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