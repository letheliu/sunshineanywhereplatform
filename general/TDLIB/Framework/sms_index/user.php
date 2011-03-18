<?
function getuserdepartment($departmentid)		{
	global $db;
	switch($db->databaseType)		{
		case 'mssql':
			$sql="select [USER_ID],[USER_NAME],[NICK_NAME] from [user] where DEPT_ID='$departmentid'";
			break;
		case 'mysql':
			$sql="select USER_ID,USER_NAME,NICK_NAME from user where DEPT_ID='$departmentid'";
			break;
		case 'oracle':
			break;
		default:
			$sql="select USER_ID,USER_NAME,NICK_NAME from user where DEPT_ID='$departmentid'";
			break;
	}
	$rs=$db->CacheExecute(15,$sql);
	return $rs;
}
function frame_user_element($userid,$nickname)	{
	print "<TR class=TableControl><TD class=menulines style=\"CURSOR: hand\"    onclick=\"javascript:add_user('$userid','$nickname')\" align=middle>$nickname</TD></TR>\n";
}
function frame_user_element_single($userid,$nickname)	{
	print "<TR class=TableControl><TD class=menulines style=\"CURSOR: hand\"    onclick=\"javascript:add_user_one('$userid','$nickname')\" align=middle>$nickname</TD></TR>\n";
}
function frame_user_data($departmentid)	{
	global $lang,$common_html;
	global $_GET;
	print "<TABLE class=small onmouseover=borderize_on(event) onclick=borderize_on1(event) \n";
	print "onmouseout=borderize_off(event) cellSpacing=0 borderColorDark=#ffffff \n";
	print "cellPadding=3 width=\"100%\" borderColorLight=#000000 border=1>\n";
	print "<THEAD class=TableControl><TR>\n";
	print "<TH bgColor=#d6e7ef colSpan=2>\n<B>".$common_html['common_html']['chooseuser']."</B></TH>\n</TR></THEAD>\n";
	if($_GET['MODE']=='single')		{
	}
	else	{
		print "<TBODY><TR class=TableContent>\n<TD class=menulines style=\"CURSOR: hand\" onclick=javascript:add_all(); align=middle>".$common_html['common_html']['adduserall']."</TD></TR>\n";
	}
	$rs=getuserdepartment($departmentid);
	while(!$rs->EOF)	{
		$userid=$rs->fields['USER_NAME'];
		$nickname=$rs->fields['NICK_NAME'];
		if($_GET['MODE']=='single')		{
			frame_user_element_single($userid,$nickname);
		}
		else	{
			frame_user_element($userid,$nickname);
		}
		$rs->Movenext();
	}
	print "</table>";
}
function frame_user_data_one($departmentid)	{
	global $common_html,$lang;
	print "<TABLE class=small onmouseover=borderize_on(event) onclick=borderize_on1(event) \n";
	print "onmouseout=borderize_off(event) cellSpacing=0 borderColorDark=#ffffff \n";
	print "cellPadding=3 width=\"100%\" borderColorLight=#000000 border=1>\n";
	print "<THEAD class=TableControl><TR>\n";
	print "<TH bgColor=#d6e7ef colSpan=2>\n<B>".$common_html['common_html']['chooseuser']."</B></TH>\n</TR></THEAD>\n";
	$rs=getuserdepartment($departmentid);
	while(!$rs->EOF)	{
		$userid=$rs->fields[USER_ID];
		$nickname=$rs->fields[USER_NAME];
		print "<TR class=TableControl><TD class=menulines style=\"CURSOR: hand\"    onclick=\"javascript:add_user_one('$userid','$nickname')\" align=middle>$nickname</TD></TR>\n";
		$rs->Movenext();
	}
	print "</table>";
}
function frame_user_header()	{
	print "<META content=\"MSHTML 6.00.2800.1106\" name=GENERATOR></HEAD><BODY class=bodycolor onmouseover=borderize_on(event) \n";
	print "onclick=borderize_on1(event) onmouseout=borderize_off(event) topMargin=5>\n";
}

function frame_user_js($departmentid,$TO_ID='TO_ID',$TO_NAME='TO_NAME')	{
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

<SCRIPT language=JavaScript>
var parent_window = parent.dialogArguments;

function add_user(user_id,user_name)
{
  TO_VAL=parent_window.form1.<?=$TO_ID?>.value;
  if(TO_VAL.indexOf(","+user_id+",")<0 && TO_VAL.indexOf(user_id+",")!=0)
  {
    parent_window.form1.<?=$TO_ID?>.value += user_id+",";
    parent_window.form1.<?=$TO_NAME?>.value += user_name+",";
  }
}

function add_user_one(user_id,user_name)
{
  TO_VAL=parent_window.form1.<?=$TO_ID?>.value;
  if(TO_VAL.indexOf(","+user_id+",")<0 && TO_VAL.indexOf(user_id+",")!=0)
  {
    parent_window.form1.<?=$TO_ID?>.value = user_id;
    parent_window.form1.<?=$TO_NAME?>.value = user_name;
  }
}

</SCRIPT>
<?
	add_all($departmentid);
}

function add_all($departmentid)	{
	print "<SCRIPT language=JavaScript>\n";
	print "function add_all()	{\n";
	$rs=getuserdepartment($departmentid);
	while(!$rs->EOF)	{
		$USER_NAME=$rs->fields[USER_NAME];
		$NICK_NAME=$rs->fields[NICK_NAME];
		print "add_user('$USER_NAME','$NICK_NAME');\n";
		$rs->Movenext();
	}
	print "}	</SCRIPT>\n";
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