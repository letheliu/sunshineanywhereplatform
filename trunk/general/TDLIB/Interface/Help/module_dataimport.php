<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
导入功能使用说明：<BR>
&nbsp;&nbsp;导入使用的EXCEL文件模块,请以导出功能里面导出的文件为准。<BR>
&nbsp;&nbsp;如果有创建人或创建时间等字段,则以当前用户为创建人,当前时间为创建时间。<BR></font></td></table>";
	print $PrintText;
}


?>