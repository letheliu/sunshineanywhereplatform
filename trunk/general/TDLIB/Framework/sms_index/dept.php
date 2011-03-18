<?
//require_once('../include.inc.php');
function depart_element($departmentid,$departmentname,$to_id,$to_name)	{
	global $action_page;
	global $_GET;
	$MODE = $_GET['MODE'];
	print   "<TR class=TableControl><TD class=menulines style=\"CURSOR: hand\"    onclick=\"javascript:parent.user.location='./frame_user_user.php?departmentid=$departmentid&action_page=$action_page&TO_ID=$to_id&TO_NAME=$to_name&MODE=$MODE';\"  align=middle>$departmentname</TD></TR>";
}
function depart_list_data($to_id,$to_name)	{
	global $choose_lang;
	$rs=getdepartmentall();
	while(!$rs->EOF)	{
		$departmentid=$rs->fields['DEPT_ID'];
		$departmentname=$rs->fields['DEPT_NAME'];
		depart_element($departmentid,$departmentname,$to_id,$to_name);
		$rs->MoveNext();
	}
}
function depart_list($to_id,$to_name)	{
	global $common_html,$lang;
	print "<TABLE class=small cellSpacing=0 borderColorDark=#ffffff cellPadding=3 width=\"95%\" align=center borderColorLight=#000000 border=1>";
	print "<THEAD class=TableControl><TR><TH align=middle bgColor=#d6e7ef><B>".$common_html['common_html']['choosedepartment']."</B></TH></TR></THEAD>";
	print "<TBODY>";
	depart_list_data($to_id,$to_name);
	print "</TABLE>";
}
function depart_header()	{
	print "<META content=\"MSHTML 6.00.2800.1106\" name=GENERATOR></HEAD><BODY class=bodycolor onmouseover=borderize_on(event) ";
	print "onclick=borderize_on1(event) onmouseout=borderize_off(event) topMargin=5>";
}
function depart_js()	{
?>
<STYLE>.menulines {
	
}
</STYLE>

<SCRIPT>
<!--

var menu_enter="";

function borderize_on(e)
{
 color="#708DDF";
 source3=event.srcElement

 if(source3.className=="menulines" && source3!=menu_enter)
    source3.style.backgroundColor=color;
}

function borderize_on1(e)
{
 for (i=0; i<document.all.length; i++)
 { document.all(i).style.borderColor="";
   document.all(i).style.backgroundColor="";
   document.all(i).style.color="";
   document.all(i).style.fontWeight="";
 }

 color="#003FBF";
 source3=event.srcElement

 if(source3.className=="menulines")
 { source3.style.borderColor="black";
   source3.style.backgroundColor=color;
   source3.style.color="white";
   source3.style.fontWeight="bold";
 }

 menu_enter=source3;
}

function borderize_off(e)
{
 source4=event.srcElement

 if(source4.className=="menulines" && source4!=menu_enter)
    {source4.style.backgroundColor="";
     source4.style.borderColor="";
    }
}

//-->
</SCRIPT>
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