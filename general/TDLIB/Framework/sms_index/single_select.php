<?
function getdepartmentall()	{
	global $db;
	$sql="select * from department";
	$rs=$db->CacheExecute(15,$sql);
	return $rs;
}
function frame_user_element_($userid,$nickname)	{
	$nickname=ereg_replace("'",'`',$nickname);
	global $_GET;
	print "<TR class=TableControl>\n<TD class=menulines style=\"CURSOR: hand\"    
		onclick=\"javascript:add_user('$userid','$nickname');window.opener=null;window.close();\" 
		//onclick=\"javascript:add_product('$userid','$nickname')\"
		ondblClick=\"javascript:window.opener=null;window.close();\"  
		title='双击选中记录直接关闭对话框'
		align=middle>\n$nickname\n</TD>\n</TR>\n";
}
function frame_table($title_content="选择部门")	{
	print "<TABLE class=small onmouseover=borderize_on(event) onclick=borderize_on1(event) \n";
	print "onmouseout=borderize_off(event) cellSpacing=0 borderColorDark=#ffffff \n";
	print "cellPadding=3 width=\"100%\" borderColorLight=#000000 border=1>\n";
	print "<THEAD class=TableControl>\n<TR>\n";
	print "<TH bgColor=#d6e7ef colSpan=2><B>$title_content</B></TH>\n</TR></THEAD>\n";
	print "<TBODY>\n";
}
function frame_user_data_department($departmentid=1,$title_content="选择部门")	{
	frame_table($title_content);
	//------部门开始---------------
	$rs=getuserdepartment($departmentid);
	while(!$rs->EOF)	{
		$userid=$rs->fields[userid];
		$nickname=$rs->fields[nickname];
		frame_user_element_($userid,$nickname);
		$rs->Movenext();
	}
	print "</table>";
}
function frame_user_data_departmentlist($tablename='department',$fieldid='DEPT_ID',$fieldname='DEPT_NAME',$title_content="选择部门",$AddUserField='')	{
	global $systemlang;	
	global $common_html;
	global $_SERVER,$_SESSION;
	//中断向量部分　
	switch($tablename)		{
		case 'department':
		case 'edu_teacher':
		case 'crm_product':
		case 'scrm_customer':
		case 'crm_customer':
		case 'crm_contract':
		case 'crm_expense':
		case 'crm_service':
		case 'edu_banji':
		case 'edu_zhuanye':
		case 'edu_xi':
			break;
		case 'user':
			if($fieldid=='USER_NAME'&&$fieldname=='NICK_NAME')	{
			}
			else			{
				exit;
			}
			break;
		default:
			exit;
	}
	//主体代码搜索部分
	$QUERY_STRING = $_SERVER['QUERY_STRING'];
	print "<form name=form2 method=POST action=?$QUERY_STRING>";
	print "<table border=1 cellspacing=0 class=small bordercolor=#000000 cellpadding=0 align=center width=100% style=\"border-collapse:collapse\"><TR><TD class=TableControl align=middle colSpan=3>\n";
	
	print "快速搜索：
		<input onFocus=\"this.value=''\" type=text name=SearchName size=15 maxlength=15 0 tabindex=-1 class=\"SmallInput\" value=\"".$_POST['SearchName']."\">
		<input type=submit name=SearchBotton class=SmallButton value=\"".$common_html['common_html']['search']."\">\n";
		//$QUERY_STRING = $_SERVER['QUERY_STRING'];
		//$QUERY_STRING_Array= explode('&',$QUERY_STRING);
		//sort($QUERY_STRING_Array);
		//for($i=0;$i<sizeof($QUERY_STRING_Array);$i++)		{
			//$Array_Element = explode('=',$QUERY_STRING_Array[$i]);
			//print "<input type=hidden name=\"".$Array_Element[0]."\" value=\"".$Array_Element[1]."\">\n";
		//}
		//print "<input type=hidden name=\"TestText\" //value=\"".$QUERY_STRING."\">\n";
		
		print "</TD></TR></table>";
		//print "</form>\n";
		//搜索部分SQL语句形成
		global $_POST;
		//print_R($_POST);
		//用户自有客户过滤部分
		if($AddUserField!="")				{
			$AddUserField = "$AddUserField = '".$_SESSION['SUNSHINE_USER_NAME']."'";
		}
		else			{
			$AddUserField = '';
		}
		//用户搜索部分
		if($_POST['SearchName']!="")		{
			if($AddUserField!="")	{
				$AddUserField = " and ".$AddUserField;
			}
			$whereText = " $fieldname like '%".$_POST[SearchName]."%' $AddUserField";
		}
		else	{
			$whereText = $AddUserField;
		}
		if($whereText!="")	{
					$whereText = "where ".$whereText;
		}
	//主体代码显示部分
	frame_table($title_content);
	global $lang,$common_html,$html_etc;
	global $db;
	//------标题部分开始
	switch($db->databaseType)		{
		case 'mssql':
			$SQL="select [$fieldid],[$fieldname] from [$tablename] $whereText";
			break;
		case 'mysql':
			$SQL="select $fieldid,$fieldname from $tablename $whereText";
			break;
		case 'oracle':
			break;
		default:
			$SQL="select $fieldid,$fieldname from $tablename $whereText";
			break;
	}//end switch
	//print $SQL;
	$rs=$db->Execute($SQL);
	if($rs->RecordCount()==0)	{
		print "<TR class=TableControl>\n<TD class=menulines align=middle onClick=\"javascript:window.opener=null;window.close();\" title='双击选中记录直接关闭对话框'>\n";
		print $common_html['common_html']['norecord'];
		print "</TD>\n</TR>\n";
	}
	while(!$rs->EOF)	{
		$id=$rs->fields[$fieldid];
		$name=$rs->fields[$fieldname];
		frame_user_element_($id,$name);
		$rs->Movenext();
	}
	print "</table>";
}
function frame_user_header_()	{
	print "<META content=\"MSHTML 6.00.2800.1106\" name=GENERATOR></HEAD>\n<BODY class=bodycolor onmouseover=borderize_on(event) \n";
	print "onclick=borderize_on1(event) onmouseout=borderize_off(event) topMargin=5>\n";
}

function frame_user_js_($var1="TO_ID",$var2="TO_NAME")	{
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
	add_user_php($var1,$var2);
}
function add_user_php($var1="TO_ID",$var2="TO_NAME")		{
	global $_GET;
	print "<SCRIPT language=JavaScript>\n\n";
	print "var parent_window = parent.dialogArguments;\n\n";
	print "function add_user(user_id,user_name)	{\n\n";
	print "TO_VAL=parent_window.form1.$var1.value;\n\n";
	print "if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)  {\n";
	if($_GET['type']!='')		{
		print "parent_window.form1.$var1.value+=user_id+\",\";\n";
		print "parent_window.form1.$var2.value+=user_name+\",\";\n";
	}
	else		{
		print "parent_window.form1.$var1.value=user_id;\n";
		print "parent_window.form1.$var2.value=user_name;\n";
	}
	print "  }\n";
	print "}\n";
	print "</SCRIPT>\n";
}
function add_department_all()	{
	global $choose_lang;
	print "<SCRIPT language=JavaScript>\n";
	print "function add_department_all()	{\n";
	$rs=getdepartmentall();
	while(!$rs->EOF)	{
		$DEPT_ID=$rs->fields[DEPT_ID];
		$name=$rs->fields[DEPT_NAME];
		$name=addslashes($name);
		print "add_user('$DEPT_ID','$name');\n";
		$rs->Movenext();
	}
	print "}\n</SCRIPT>\n";
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