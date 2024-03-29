<?
/****************************************************************\
1、本系统为商业软件，受国家著作权法保护，任何人不得在
原作者未同意的基础上进行拷贝，或进行商业用途。
2、本次版本为非开源版，如果你使用，请注意获取许可证。
3、本系统作者保留一切相关的知识产权
\****************************************************************/
//----------------------------------------------------------------
//表单型操作函数集合
//----------------------------------------------------------------
//################################################################
//表格函数输出####################################################
//################################################################
function TableInforOutPut($TableInfor,$width="80%")		{

	$array_keys = @array_keys($TableInfor['Content']);
	print "<table width=$width class=TableBlock border=0 align=left>";
	if($array_keys[0]=="")	array_shift($array_keys);
	for($i=0;$i<sizeof($array_keys);$i=$i+2)	{
		$Element1 = $array_keys[$i];
		$Element2 = $array_keys[$i+1];

		$colapan1 = $TableInfor['cols'][$Element1];
		$colapan2 = $TableInfor['cols'][$Element2];

		if($colapan1==3)		{
			print "<tr >
			<td align=left nowrap>".$Element1."</td>\n
			<td align=left colspan=$colapan1 nowrap>".$TableInfor['Content'][$Element1]."</td>\n
			</tr>";
		}
		else if($colapan1==1)		{
			print "<tr >\n";
			//if($TableInfor['Content'][$Element1]!="")
			print "<td align=left nowrap>".$Element1."</td>\n
			<td align=left colspan=$colapan1 nowrap>".$TableInfor['Content'][$Element1]."</td>\n";

			//if($TableInfor['Content'][$Element2]!="")
			print "<td align=left nowrap>".$Element2."</td>\n
			<td align=left colspan=$colapan2 nowrap>".$TableInfor['Content'][$Element2]."</td>\n
			</tr>";
		}
	}
	print "</table>";
}
function TableInforOutPut3($TableInfor,$width="80%")		{
	$array_keys = @array_keys($TableInfor['Content']);
	print "<table width=$width  border=0  align=left>";
	for($i=0;$i<sizeof($array_keys);$i=$i+3)	{
		$Element1 = $array_keys[$i];
		$Element2 = $array_keys[$i+1];
		$Element3 = $array_keys[$i+2];

		$colapan1 = $TableInfor['cols'][$Element1];
		$colapan2 = $TableInfor['cols'][$Element2];
		$colapan3 = $TableInfor['cols'][$Element3];

		print "<tr >\n";

		//if($TableInfor['Content'][$Element1]!="")
		print "<td align=left nowrap>".$Element1."</td>\n
		<td align=left colspan=$colapan1  nowrap>".$TableInfor['Content'][$Element1]."&nbsp;</td>\n";

		//if($TableInfor['Content'][$Element2]!="")
		print "<td align=left nowrap>".$Element2."</td>\n
		<td align=left colspan=$colapan2  nowrap>".$TableInfor['Content'][$Element2]."&nbsp;</td>\n";

		//if($TableInfor['Content'][$Element3]!="")
		print "<td align=left nowrap>".$Element3."</td>\n
		<td align=left colspan=$colapan3  nowrap>".$TableInfor['Content'][$Element3]."&nbsp;</td>\n";

		print "</tr>";
	}
	print "</table>";
}
function TableInforOutPut4($TableInfor,$width="80%")		{
	$array_keys = @array_keys($TableInfor['Content']);
	print "<table width=$width  border=0  align=left>";
	for($i=0;$i<sizeof($array_keys);$i=$i+4)	{
		$Element1 = $array_keys[$i];
		$Element2 = $array_keys[$i+1];
		$Element3 = $array_keys[$i+2];
		$Element4 = $array_keys[$i+3];

		$colapan1 = $TableInfor['cols'][$Element1];
		$colapan2 = $TableInfor['cols'][$Element2];
		$colapan3 = $TableInfor['cols'][$Element3];
		$colapan4 = $TableInfor['cols'][$Element4];
		print "<tr >\n";

		//if($TableInfor['Content'][$Element1]!="")
		print "<td align=left nowrap>".$Element1."</td>\n
		<td align=left colspan=$colapan1  nowrap>".$TableInfor['Content'][$Element1]."&nbsp;</td>\n";

		//if($TableInfor['Content'][$Element2]!="")
		print "<td align=left nowrap>".$Element2."</td>\n
		<td align=left colspan=$colapan2  nowrap>".$TableInfor['Content'][$Element2]."&nbsp;</td>\n";

		//if($TableInfor['Content'][$Element3]!="")
		print "<td align=left nowrap>".$Element3."</td>\n
		<td align=left colspan=$colapan3  nowrap>".$TableInfor['Content'][$Element3]."&nbsp;</td>\n";

		//if($TableInfor['Content'][$Element4]!="")
		print "<td align=left nowrap>".$Element4."</td>\n
		<td align=left colspan=$colapan4  nowrap>".$TableInfor['Content'][$Element4]."&nbsp;</td>\n";

		print "</tr>";
	}
	print "</table>";
}
//################################################################
//HTML编码有限扩展函数############################################
//################################################################

function htmlentitiesUser($string)	{
	$string2= ereg_replace('"','&quot;',$string);
	//$string2 = htmlentities($string);
	return $string2;
}

function custom_type($type)		{
	switch($type)		{
		case 'number':
			$custom_type  =" onkeyup=\"value=value.replace(/[^\d]/g,'')\" \n";
			$custom_type .=" onbeforepaste=\"clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))\"\n";
			//$custom_type .=" ondrop=\"return regInput(this,/^[0-9]*$/,event.dataTransfer.getData('Text'))\"\n";
			break;
	}
	return $custom_type;
}

//################################################################
//################################################################
//################################################################

function returnboolean($value)	{
	global $common_html,$lang;
	if($value==1)	{
		$index='是';
	}
	else	{
		$index='否';
	}
	return $index;
}

function returnboolean_gif($value)	{
	global $common_html,$lang;
	if(is_file("images/right.gif"))		{
		$returnboolean_gif1 = "images/right.gif";
		$returnboolean_gif2 = "images/error.gif";
	}
	else	{
		$returnboolean_gif1 = "../../Framework/images/right.gif";
		$returnboolean_gif2 = "../../Framework/images/error.gif";
	}

	if($value==1)	{
		$index="<img src=\"$returnboolean_gif1\" border=0>";
	}
	else	{
		$index="<img src=\"$returnboolean_gif2\" border=0>";
	}
	return $index;
}

function returncheckbox($value)	{
	global $common_html,$lang;
	if($value=="on"||$value=="On")	{
		$return = "<font color=green>".trim($common_html['common_html']['yes'])."</font>";
	}
	else	{
		$return = "<font color=orange>".trim($common_html['common_html']['no'])."</font>";
	}
	return $return;
}
function returnsex($value)		{
	global $common_html,$lang;
	if($value==1)	{
		$index='male';
	}
	else	{
		$index='female';
	}
	return trim($common_html['common_html'][$index]);
}
function returnsexcolor($value)		{
	global $common_html,$lang;
	if($value==1)	{
		$index="<font color=green>".$common_html['common_html']['male']."</font>";
	}
	else	{
		$index="<font color=red>".$common_html['common_html']['female']."</font>";
	}
	return $index;
}
function returndate($value,$mode)	{
	global $common_html,$lang;
	if($mode==1)	{
		return $value;
	}
	else if($mode=='Y-m-d')	{
		return date($value,$mode);
	}
	else if($mode=='Y-m-d H:i:s')	{
		return date($value,$mode);
	}
}

function print_goback()	{
	global $html_etc,$common_html;
	global $lang;
	print "<div align=center ><INPUT class=SmallButton onclick=history.back(); type=button value='".$common_html['common_html']['goback']."'></div>\n";
}
function table_begin($width="450",$class="TableBlock")	{
	 print "<table class=$class align=center width=$width >";//2008-12-5
	 //print "<table border=1 cellspacing=0 class=$class bordercolor=#000000 cellpadding=3 align=center width=$width style=\"border-collapse:collapse\">";//2008-12-5
	 //print "<table border=0 cellspacing=0 class=$class cellpadding=3 align=center width=$width>";
}
function table_end()	{
	print "</table>\n";
}
function formcheck($formname,$infor)	{
	global $custom_type;
	global $common_html;
	//print_R($infor);
	if(is_array($infor))				{
	print "<script language = \"JavaScript\"> \n";
	print "function FormCheck() \n";
	print "{\n";
	//print_r($infor);
	foreach ($infor as $list )	{
		switch($list['inputtype'])	{
			case 'notnull':
				switch($list['inputfilter'])	{
					case 'input':
					case 'usertoname':
					case 'usertoid':
					case 'jumpcourse':
					case 'jumpclassroom':
					case 'jumpdorm':
					case 'jumpstudentall':
					case 'number':
					case 'userdefine':
					case 'date0':
					case 'textarea':
					case 'money':
					case 'select_input':
						print "if (document.".$formname.".".$list['inputname'].".value == \"\") {\n";
						print "alert(\"".$list['inputtext']."\");\n ";
						print "return false;}\n";
						break;
					//case 'select_input':
					//case 'radiofilter':
					//	print "if (document.".$formname.".".$list['inputname'].".selectedIndex == \"\") {\n";
					//	print "alert(\"".$list['inputtext']."\");\n ";
					//	print "return false;}\n";
					//	break;
				}
				break;
			case 'password':

				print "if (document.".$formname.".".$list['inputname'].".value == \"\") {\n";
				print "alert(\"".$list['inputtext']."".$common_html['common_html']['notnull']."\");\n ";
				print "return false;}\n";

				//print "  var passwordValue = document.".$formname.".".$list['inputname'].".value;\n";
				//print "  var Test = new RegExp(/^(-|\+)?\d+$/).test(passwordValue)\n";
				//print "  if(Test)	{	\n";
				//print "	 alert(\"".$common_html['common_html']['notpullnumber']."\")\n";
				//print "  return false;	}\n";
				break;
			case 'email':

				//print "if (document.".$formname.".".$list['inputname'].".value == \"\") {\n";
				//print "alert(\"".$list['inputtext']."".$common_html['common_html']['notnull']."\");\n ";
				//print "return false;}\n";

				print "  var EmailValue = document.".$formname.".".$list['inputname'].".value;\n";
				//print "  var reEmail = /^([A-Za-z0-9])(\w)+@(\w)+(\.)(com|com\.cn|net|cn|net\.cn|org|biz|info|gov|gov\.cn|edu|edu\.cn)/;\n";
				//print "  if (!email.match(reEmail)&&email!=\"\")\n";
				///^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				///^([A-Za-z0-9])(\w)+@(\w)+(\.)(com|com\.cn|net|cn|net\.cn|org|biz|info|gov|gov\.cn|edu|edu\.cn)/

				print "  var EmailTest = new RegExp(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/).test(EmailValue)\n";
				print "  if(document.".$formname.".".$list['inputname'].".value == \"\"||EmailTest)	{\n		} else	{	\n";
				print "	 alert(\"".$common_html['common_html']['emailformaterror']."\")\n";
				print "  return false;	}\n";
				break;
			case 'number':
				$custom_type=custom_type($type);
				break;
			case 'null':
				break;
			case 'spacetime':
				print "
					edit_str = \"\";
					counter=0;
					for(i=0;i<".$formname.".all(\"selectid\").length;i++)
					{
						el=".$formname.".all(\"selectid\").item(i);
						if(el.checked)
						{
							val=el.value;
							edit_str+=val + \",\";
							counter++;
						}
					}
					".$formname.".".$list['inputname'].".value=edit_str;
					";
				break;
			case '':
				break;
		}

	}
	print "}\n";
	//print "function userdefine() \n";
	//print "{\n";
	//print "document.form1.userdefine.value = 'userdefine';\n";
	//print "document.form1.submit();\n";
	//print "}\n";
	print "</script>\n";
	}
}
function form_begin($name="form1",$action="init",$method="post",$infor='')	{
	if(is_array($infor))	{
		formcheck($name,$infor);
		print "<FORM name=$name onsubmit=\"return FormCheck();\" \n action=\"$PHP_SELF?$action&pageid=".$_GET['pageid']."\" method=$method encType=multipart/form-data>\n";
	}
	else	{
		print "<FORM name=$name action=\"$PHP_SELF?$action&pageid=".$_GET['pageid']."\" method=$method encType=multipart/form-data>\n";
	}
	//print "<input type=hidden name=userdefine value=''>";
}
function form_begin_page($name="form1",$action="",$method="post")	{
	print "<FORM name=$name onsubmit=\"return FormCheck();\" \n action=$action&pageid=".$_GET['pageid']." method=$method encType=multipart/form-data>\n";
}
function form_end()	{
	print "</form>\n";
}
function print_search($showtext,$var,$action)	{
	global $html_etc,$common_html;
	global $lang;
	 form_begin("form1",$action);
	 table_begin();
	 print "<TR>\n";
     print "<TD class=TableData noWrap>$showtext </TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\"1><INPUT class=SmallInput maxLength=200 size=25 name=$var>&nbsp; &nbsp; &nbsp; &nbsp;\n";
	 print_submit($html_etc['查询'],1,"simple");
	 print "</TD>\n";
	 print "</TR>\n";
	 table_end();
	 form_end();
}
function print_tr($showtext,$var,$var_value="",$size="25",$colspan=1,$class="SmallInput",$addtext="",$type='text',$readonly='',$i='',$fieldtype='')	{
	 global $custom_type;
	 global $common_html,$tablename;
	 global $uniquekey,$columns;
	 $唯一字段名称 = $columns[$uniquekey];
	 if($唯一字段名称==$var&&$var!='')		{
		 //print_R($columns);
	 }

	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE']);print $var;exit;
	 if($fields['USER_PRIVATE'][$var]!=""&&$readonly=="")	{
		 $readonly = $fields['USER_PRIVATE'][$var];
		 $class = "SmallStatic";
	 }
	 else if($readonly=="readonly")	{
		 $readonly = "readonly";
	 }
	 else	{
		 $readonly = "";
	 }
	 //用户类型限制条件##########################结束

	 //$var_value=htmlentitiesUser($var_value);
	 switch($fieldtype)		{
		 case '':
			 $onkeypress = "";
			 $addtext!=""?$addtext="(".$addtext.")":'';
		     break;
		 case 'Number':
			 //$custom_type  =" onkeyup=\"value=value.replace(/[^\d]/g,'')\" \n";
			 //$custom_type .=" onbeforepaste=\"clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))\"\n";
			 $onkeypress = "style=\"ime-mode:disabled\" onKeyPress=\"if (event.keyCode!=46 && event.keyCode!=45 && (event.keyCode<48 || event.keyCode>57)) event.returnValue=false\"  onBlur=\"if (event.keyCode!=46 && event.keyCode!=45 && (event.keyCode<48 || event.keyCode>57)) event.returnValue=false\" onpaste=\"return false\"";

			 $addtext!=""?$addtext=$addtext." && ":'';
			 //$addtext = "(".$addtext.$common_html['common_html']['mustbenumber'].")";
			 $addtext = $addtext.$common_html['common_html']['mustbenumber'];
			 break;
		 case 'Money':
			 $onkeypress = "onkeypress=\"check_input_num('MONEY')\"";
		     $addtext!=""?$addtext=$addtext." && ":'';
			 //$addtext = "(".$addtext.$common_html['common_html']['mustbemoney'].")";
			 $addtext = $addtext.$common_html['common_html']['mustbemoney'];
			 break;
	 }

	 //实时更新界面语言说明
	 if($ShowTitleTEXT=='') $ShowTitleTEXT = $showtext;

	 $showtext = FilterFieldName($showtext,$var);
	 $ShowTitleTEXT = $fields['USER_PRIVATE_TEXT'][$var];

	 //兼容对复制现有一行记录的支持,2010-7-2增加
	 //当在增加视图中,GET中某一变量不为空,而其自身正好为空时,沿用GET中的值
	 if($_GET['action']=="add_default"&&$_GET[$var]!=""&&$var_value=='')		{
		 $var_value = $_GET[$var];
	 }
	 print "<TR>\n";
     print "<TD class=TableData noWrap width=20%>$showtext</TD>\n";
	 print "<input type=hidden name='".$var."_原始值' value='$var_value'>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\">";
	 //实时判断是否有重复
	 if($唯一字段名称==$var&&$var!='')								{
		 //进行相关JS输出
		 print "
		 <script>
			//设定客户端信息
			function GetResult_Unique_".$唯一字段名称."(str)
			{
				var oBao = new ActiveXObject(\"Microsoft.XMLHTTP\");
				oBao.open(\"GET\",str,false);
				oBao.send();
				//服务器端处理返回的是经过escape编码的字符串.
				//通过XMLHTTP返回数据,开始构建Select.
				//alert(unescape(oBao.responseText));
				//document.form1.".$唯一字段名称.".value	= unescape(oBao.responseText);
				TEXT_".$唯一字段名称.".innerHTML		= unescape(oBao.responseText)+\"&nbsp;&nbsp;\";
			}
		 </script>
		 ";
		 if(is_dir("../Enginee"))			{
			$TempDirPath = "../Interface/EDU/";
		 }
		 else if(is_file("../../Enginee"))	 {
			$TempDirPath = "../../Interface/EDU/";
		 }
		 else	{
			$TempDirPath = "../../Interface/EDU/";
		 }
		 $openDir = "dd=as&TableName=$tablename&FieldName=$唯一字段名称&dddd=dddsss";
		 $openDir = $TempDirPath."newai_unique.php?".base64_encode($openDir);
		 print "
			<INPUT type=\"$type\" title='".$ShowTitleTEXT."'
				onkeydown=\"if(event.keyCode==13)event.keyCode=9\"
				accesskey='$i'
				class=\"$class\"
				$custom_type
				maxLength=200
				size=\"$size\"
				name='$var'
				value=\"$var_value\"
					onkeyup=\"GetResult_Unique_".$唯一字段名称."('".$openDir."&FieldValue='+this.value);\"
				$onkeypress
				$readonly
				>&nbsp;\n";
		print "<span id='TEXT_".$唯一字段名称."'></span>";
	 }
	 //普通输出INPUT
	 else		{
		 print "<INPUT type=\"$type\" title='".$ShowTitleTEXT."'
			onkeydown=\"if(event.keyCode==13)event.keyCode=9\" accesskey='$i' class=\"$class\" $custom_type maxLength=200 size=\"$size\"
			name='$var' value=\"$var_value\" $onkeypress $readonly>&nbsp;\n";
	 }
	 //实时更新字段信息后面的补充语言信息-定义部分
	 print $addtext = FilterFieldAddText($addtext,$var);
	 print "</TD></TR>\n";
	 unset($custom_type);
}

function print_notshow($showtext,$var,$var_value="",$size="25",$colspan=1,$class="SmallInput",$addtext="",$type='text',$readonly='',$i='',$fieldtype='')	{
	 global $custom_type;
	 global $common_html,$tablename;
	 global $uniquekey,$columns;
	 print "<INPUT type=hidden maxLength=200 size=\"$size\" name='$var' value=\"$var_value\" >";
}

//实时更新字段的界面语言-定义部分
function FilterFieldName($showtext,$var)		{
	global $sessionkey,$tablename;
	global $_SESSION;
	//2011-01-02 直接返回，不再单独过滤字段值
	return $showtext;exit;
	$SUNSHINE_USER_NAME = $_SESSION['SUNSHINE_USER_NAME'];
	if($SUNSHINE_USER_NAME=="admin")		{
	 $fieldname = $var;
	 //print_R($_SESSION);
	 $showtextArray = explode(':',$showtext);
	 $showtext = $showtextArray[0];
	 $language = $_SESSION['SUNSHINE_USER_LANG'];
	 $openDir = "sessionkey=$sessionkey&action=systemlang&tablename=$tablename&fieldname=$fieldname&language=$language";
	 if(is_file("newai_ajax.php"))	 $TempDirPath = "./";
	 else if(is_file("../../Framework/newai_ajax.php"))	 $TempDirPath = "../../Framework/";
	 else $TempDirPath = '';
	 $openDir = $TempDirPath."newai_ajax.php?".$openDir;
	 $showtext = "<SPAN onclick=\"listTable_editfieldlang(this,'$openDir')\">".$showtext."</SPAN>:";
	}
	return $showtext;
}


//实时更新字段信息后面的补充语言信息-定义部分
function FilterFieldAddText($showtext,$var)		{
	global $sessionkey,$tablename,$db;
	global $_SESSION,$html_etc;
	//print_R($html_etc);

	//用于支持PGSQL
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
	$FileDirName = array_pop($PHP_SELF_ARRAY);
	//用于PGSQL下面不进行数据较验
	if($FileDirName=="PGSQL")				{
		return '';
		exit;
	}
	$fieldname = $var;
	//print_R($_SESSION);
	$showtextArray = explode('(',$showtext);
	if(sizeof($showtextArray)>1)	{
		$showtext = $showtextArray[1];
	}
	else	{
		$showtext = $showtextArray[0];
	}
	$showtextArray = explode(')',$showtext);
	$showtext = $showtextArray[0];

	//判断REMARK标识 2011-04-21更改显示方便,改由html_etc变更进行显示备注信息
	//$sql = "select remark,fieldname from systemlang where tablename ='$tablename'";
	//$rs = $db->CacheExecute(150,$sql);
	//$rs_a = $rs->GetArray();
	//$remark = TRIM($rs_a[0]['remark']);
	$remark = $html_etc[$tablename][$var."_remark"];

	if($remark!="")		$showtext = $remark;

	if(strlen($showtext)>20) $showtext = "<BR>".$showtext;

	return $showtext;
}

function print_tr_Static($showtext,$var,$var_value="",$size="25",$colspan=1,$class="SmallStatic",$addtext="")	{
	 //$var_value=htmlentitiesUser($var_value);
	 //实时更新界面语言说明
	 $showtext = FilterFieldName($showtext,$var);
	 $addtext = FilterFieldAddText($addtext,$var);
	 print "<TR>\n";
     print "<TD class=TableData noWrap width=20%>$showtext </TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\"><INPUT class=\"$class\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" maxLength=200 size=\"$size\" name=\"$var\" readonly value=\"$var_value\">$addtext</TD>\n";
	 print "</TR>\n";
}
function print_checkbox($showid,$showtext,$showpic="hrms.gif",$showpicalt="人力资源",$align="center")	{
	print "<tr class=\"TableLine2\"><td>&nbsp;<input type=\"checkbox\" name=\"$showtext\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" value=\"$showid\">\n";
    print "</td>\n";
    print "<td align=\"$align\">\n";
    print "<img src=\"./images/$showpic\" alt=\"$showpicalt\">$showtext\n";
    print "</td>\n";
	print "</tr>\n";
}
function print_radio($showtext,$showfield,$value,$tablename,$field_value,$field_name,$colspan=2,$initValue='',$groupfield='',$groupvalue='')		{
	//实时更新界面语言说明
	 $showtext = FilterFieldName($showtext,$showfield);
	global $db,$_GET;
	if($groupfield!=""&&$groupvalue!="")		{
		$sql="select $field_value,$field_name from $tablename where $groupfield='$groupvalue'";
	}
	else	{
		$sql="select $field_value,$field_name from $tablename";
	}
	$rs=$db->CacheExecute(150,$sql);
	print "<TR>";
    print "<TD class=TableData noWrap>".$showtext."</TD>\n";
    print "<TD class=TableData colspan=\"$colspan\">\n";
	print "<p>\n";
	print "<label>\n";
	print "<input type=hidden name='".$showfield."_原始值' value='$value'>\n";


	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$showfield]);
	 if($fields['USER_PRIVATE'][$showfield]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$showfield];
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
	 }
	 //用户类型限制条件##########################结束


	$i = 1 ;
	while(!$rs->EOF)			{
		//if(($i==1&&$value=="")||($value!=""&&$value==$rs->fields[$field_value])||$_GET[$showfield]==$rs->fields[$field_value])
		if(($value!=""&&$value==$rs->fields[$field_value])||$_GET[$showfield]==$rs->fields[$field_value])
			$temp='checked';
		else
			$temp = '';
		print "<input type=\"radio\" name=\"".$showfield."\" title='".$rs->fields[$field_value]."".$fields['USER_PRIVATE_TEXT'][$showfield]."' value=\"".$rs->fields[$field_value]."\"";
		print $temp;
		print " $readonly>".$rs->fields[$field_name]."</label>\n";
		$temp='';
		$i ++ ;
		$rs->MoveNext();
	}
	print $addtext = FilterFieldAddText($addtext,$showfield);
	print "</p>\n";

	print "</TD></TR>\n";
}
function print_tr_text($showtext,$var,$var_value="",$size="25",$colspan=1,$class="SmallStatic",$addtext="")	{
	 $var_value=nl2br($var_value);
	 print "<TR>\n";
     print "<TD class=TableData noWrap width=20%>$showtext </TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\"><INPUT class=$class onkeydown=\"if(event.keyCode==13)event.keyCode=9\" maxLength=200 size=\"$size\" name=\"$var\" readonly value=\"$var_value\">$addtext</TD>\n";
	 print "</TR>\n";
}
function print_text_text($showtext,$var,$colspan=2)	{
	 //$var=nl2br($var);
	 //数据加入时已经对其NL2BR数据过滤
	 print "<tr>\n<td nowrap class=\"TableContent\" width=\"20%\">$showtext</td>\n";
	 print "<td class=\"TableData\" style=\"word-break: break-all\" colspan=$colspan width=\"80%\">$var</td>\n</tr>\n";
}
function print_text_html($showtext,$var,$colspan=3)	{
	 $var=html_entity_decode($var);
	 //print "<tr><td nowrap class=\"TableData\" align=left colspan=$colspan>$showtext</td></tr>\n";
	 print "<tr><td class=\"TableData\" colspan=$colspan>$var</td>\n</tr>\n";
	 //print "<tr><td class=\"TableData\" colspan=$colspan>\n";
	 //print "<table border=1 cellspacing=0 class=small bordercolor=#000000 cellpadding=0 align=center width=100% style=\"border-collapse:collapse\"><TR><TD class=TableData noWrap align=middle  colspan=3>$var</TD></TR>\n";
	 //print "</table>\n";
	 //print "</td>\n</tr>\n";
}
function print_text_text_one($var,$colspan=3)	{
	 $var=nl2br($var);
	 print "<tr>\n";
	 print "<td class=\"TableData\" colspan=$colspan>$var</td>\n</tr>\n";
}
function print_text_tr($showtext,$var,$colspan=2,$picture='',$addtext='')	{
	 $var=nl2br($var);
	 print "<tr>\n<td nowrap class=\"TableContent\" width=20%>$showtext</td>\n";
	 print "<td class=\"TableData\" colspan=$colspan>$var</td>\n";
	 if($picture!="")		{
		 print "<TD class=TableData noWrap colspan=\"1\" width=172 rowspan=4>\n";
		 print $picture;
		 print "</TD>";
	 }
	 print "</tr>\n";
}
function print_text_tr_http($showtext,$var,$colspan=1)	{
	 print "<tr>\n<td nowrap class=\"TableContent\" width=20%>$showtext</td>\n";
	 print "<td class=\"TableData\" colspan=$colspan><a href=\"$var\" target=_blank>$var</a></td>\n</tr>\n";
}
function print_file_url($showtext,$var,$colspan=1,$fileorpic='')	{
	 if($fileorpic=='pic')		{
	 print "<tr>\n<td nowrap class=\"TableContent\" width=20%>$showtext</td>\n";
	 print "<td class=\"TableData\" colspan=$colspan><a href=\"$var\" target=_blank><img src=$var border=0></a></td>\n</tr>\n";
	 }
	 else	{
	 print "<tr>\n<td nowrap class=\"TableData\" width=20%>$showtext</td>\n";
	 print "<td class=\"TableData\" colspan=$colspan><a href=\"$var\" target=_blank>$var</a></td>\n</tr>\n";
	 }
}
function print_text_tr_single($url,$url_desc)	{
	 print "<TR class=TableContent align=middle><TD width=20%><A href=\"$url\" target=blank>$url_desc</A>&nbsp;&nbsp; </TD></TR>";
}
function print_text_tr_mail($showtext,$var,$colspan=1)	{
	 print "<tr>\n<td nowrap class=\"TableContent\" width=20%>$showtext</td>\n";
	 print "<td class=\"TableData\" colspan=$colspan><a href=\"mailto:$var\">$var</a></td>\n</tr>\n";
}
function print_text_textone($var,$colspan=2)	{
	 $var=nl2br($var);
	 print "<tr>\n";
	 print "<td class=\"TableData\" colspan=$colspan width=20%>&nbsp;$var</td></tr>\n";
}
function print_file($showtext,$var,$var_value="",$size="25",$colspan=1)	{
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
     print "<TD class=TableData colspan=\"$colspan\">\n";
	 print "<SPAN id=new_file_".$var."></SPAN><BR>\n";
	 print "";
	 global $_SERVER;
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 if($PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2] == "Framework")	{
		 $filename = "uploadfile.php";
	 }
	 else	{
		 $filename = "../../Framework/uploadfile.php";
	 }

	 //$var1=isset($_GET['var1'])?$_GET['var1']:"ATTACHMENT_ID";
	 //$var2=isset($_GET['var2'])?$_GET['var2']:"ATTACHMENT_NAME";

	 print "<script>
		var uploadArray = Array();
		var TempArray = new Array();
		var ID_Array = Array();
		var NAME_Array = Array();
		function DeleteFileArray(valueOf)	{
			var Temp = new Array();
			var TempValue = new Array();
			TempArray = uploadArray.slice(0,valueOf);
			if(TempArray.length > 0)
				Temp.push(TempArray);
			TempArray = uploadArray.slice(valueOf+1,uploadArray.length);
			if(TempArray.length > 0)
				Temp.push(TempArray);

			TempValue = uploadArray.splice(valueOf,1,'');
			var ID = Array();
			var NAME = Array();
			ID_Array.splice(valueOf,1,'');
			NAME_Array.splice(valueOf,1,'');
			//字段值赋值
			document.form1.ATTACHMENT_ID.value = ID_Array.toString();
			//字段名称赋值
			var TextName = '';
			for(i=0;i<NAME_Array.length-1;i++)		{
				var TempIndex = NAME_Array[i];
				TextName += TempIndex+\"*\";
			}
			TextName += NAME_Array[i];
			document.form1.ATTACHMENT_NAME.value = TextName;
			if(Temp.length > 0)
				new_file_".$var.".innerHTML = Temp.toString();
			else
				new_file_".$var.".innerHTML = '';
		}
		</script>\n";
		//数据的计划是输出时进行数组重组，实际不对数组进行重组。
	 print "<iframe name=uploadfile frameborder=0 width=100% height=40 scrolling=no src=$filename></iframe>\n";
	 print "<INPUT type=hidden name=$var value=\"$var_value\">\n";
	 print "&nbsp; </TD>\n";
	 print "</TR>\n";
}
function print_singlefile($showtext,$var,$var_value="",$size="25",$colspan=1)	{
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	 print "<SPAN id=new_file_".$var."></SPAN><BR>\n";
	 //print $var_value;
	 if($var_value!="")				{
		 $var_value = ereg_replace ("&amp;", "&", $var_value);
		 //print $var_value;
		 $parse_url = parse_url($var_value);
		 $query = $parse_url['query'];
		 parse_str($query,$output);
		 $attachmentid = $output['attachmentid'];
		 $attachmentname = $output['attachmentname'];
		 //$attachmentid = $output['attachmentname'];
		 //print_R($parse_url);
		 $filename_newfile = "../../attachment/$attachmentid/$attachmentname";
		 if(is_file($filename_newfile))		{
				$filtervalue=trim($var_value);
				$filtervalue_file = explode('=',$filtervalue);
				//print_R($filtervalue_file);
				$filtervalue_sizeof = sizeof($filtervalue_file)-1;
				$filename = $filtervalue_file[$filtervalue_sizeof];
				$filtervalue = "<a href='".$filtervalue."'>$filename</a>";
				print "<script>\n";
				print "new_file_".$var.".innerHTML=\"$filtervalue\";\n";
				print "</script>\n";
		 }
		//if(is_file($filename_newfile))		{
		//	$text="<a href='$filename_newfile'>$attachmentname</a>";
		//	print "<script>\n";
		//	print "new_file_".$var.".innerHTML=\"$text\";\n";
		//	print "</script>\n";
		//	//print "sss";
		//}
	 }
	 //加载日期文件判断
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 $Framework = $PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2];
	 if($Framework == "Framework")	{
		 $filename = "uploadsinglefile.php?varname=$var";
	 }
	 else	{
		 $filename = "../../Framework/uploadsinglefile.php?varname=$var";
	 }
	 print "<iframe name=uploadsinglefile frameborder=0 width=100% height=40 scrolling=no src=\"$filename\"></iframe>\n";
	 print "<INPUT type=hidden name=$var value=\"$var_value\">\n";
	 print "&nbsp; </TD>\n";
	 print "</TR>\n";
}
function print_picturefile($showtext,$var,$var_value="",$size="25",$colspan=1)	{
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
     print "<TD class=TableData noWrap height=30 colspan=\"$colspan\">\n";
	 print "<SPAN id=new_file_".$var."></SPAN>\n";
	 //print $var_value;
	 if($var_value!=""&&strlen($var_value)>10)		{
		$text="<img src='$var_value' border=0 width=100>";
		print "<script>\n";
		print "new_file_".$var.".innerHTML=\"$text\";\n";
		print "</script>\n";
	 }
	 //加载日期文件判断
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 $Framework = $PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2];
	 if($Framework == "Framework")	{
		 $filename = "uploadsinglefile.php?varname=$var";
	 }
	 else	{
		 $filename = "../../Framework/uploadsinglefile.php?varname=$var";
	 }
	 print "<iframe name=uploadsinglefile frameborder=0 width=100%  height=30 scrolling=no src=\"$filename\"></iframe>\n";
	 print "<INPUT type=hidden name='$var' value=\"$var_value\">\n";
	 print "&nbsp; </TD>\n";
	 print "</TR>\n";
}
function print_tdoafile($showtext,$var,$var_value="",$size="25",$colspan=1)	{
	 //形成通达OA下载文件所需要的变量格式
	 //print_R($_SESSION);
	 $var_value_array = explode('||',$var_value);
	 $ATTACHMENT_ID	=	$var_value_array[1];
	 $ATTACHMENT_NAME = $var_value_array[0];

	print "<tr class=\"TableData\" id=\"attachment2\">
      <td nowrap>附件文档:</td>
      <td nowrap colspan='$colspan'>";
	if(strlen($var_value)<3)
	   echo "无附件";
	else
	   echo attach_link($ATTACHMENT_ID,$ATTACHMENT_NAME,1,1,1,1,1,1,1,1);

     print "  </td>\n";
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
     print "<TD class=TableData noWrap height=30 colspan=\"$colspan\">\n";
	 if(is_file("../DanDian/Enginee/lib/attach.js"))
		 print "<script src=\"../DanDian/Enginee/lib/attach.js\"></script>";
	 else if(is_file("../../Enginee/lib/attach.js"))
		 print "<script src=\"../../Enginee/lib/attach.js\"></script>";
	 $QUERY_STRING = $_SERVER['QUERY_STRING'];
	 $FormPageAction=FormPageAction('action',$_GET['action'],'DeleteField',$var,'',"actionDeleteFile",'DeleteFile');
	 //print $FormPageAction;
	 print "<script>
			 var upload_limit=1,limit_type=\"php,php3,php4,php5,\";
			 function InsertImage(src)
				{
				   //AddImage2Editor('CARE_CONTENT', src);
				}
			function delete_attach(ATTACHMENT_ID,ATTACHMENT_NAME)
				{
				  msg=\"确定要删除文件 '\"+ ATTACHMENT_NAME +\"' 吗?\";
				  if(window.confirm(msg))
				  {
					URL=\"?$FormPageAction&ATTACHMENT_ID=\"+ATTACHMENT_ID+\"&ATTACHMENT_NAME=\"+ATTACHMENT_NAME;
					window.location=URL;
				  }
				}
			</script>\n";
	 if($_SESSION['SYSTEM_IS_TD_OA']!='1')			{
		 print "<script>ShowAddFile(\"\",0);ShowAddImage();</script>\n";
	 }
	 else	{
		 print "<script>ShowAddFile();ShowAddImage();</script>\n";
	 }
	 print "<INPUT type=hidden name='通达格式上传文件' value=\"$var\">\n";

	 print "
        <input type=\"hidden\" name=\"ATTACHMENT_ID_OLD\" value=\"$ATTACHMENT_ID\">\n
        <input type=\"hidden\" name=\"ATTACHMENT_NAME_OLD\" value=\"$ATTACHMENT_NAME\">\n";
	 print "</TD>\n";
	 print "</TR>\n";
}
function print_textarea($showtext,$var,$var_value="",$rows=5,$cols=40,$colspan=1,$addtext='')	{
	 //$var_value=htmlentitiesUser($var_value);

	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$var]);
	 if($fields['USER_PRIVATE'][$var]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$var];
		 $class = "BigStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "BigInput";
	 }
	 //用户类型限制条件##########################结束
	 $addtext = FilterFieldAddText($addtext,$var);
	 print "<TR>\n";
     print "<TD class=TableData noWrap width=20%>$showtext</TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\"><TEXTAREA class=$class name=$var  title='".$fields['USER_PRIVATE_TEXT'][$var]."' wrap=yes rows=$rows cols=$cols $readonly>$var_value</TEXTAREA>$addtext&nbsp;\n";
	 print " </TD></TR>\n";
}
function print_textarea_readonly($showtext,$var,$var_value="",$rows=5,$cols=40,$colspan=1,$addtext='')	{
	 //$var_value=htmlentitiesUser($var_value);

	 //用户类型限制条件##########################开始
	 global $fields;
	 $class = "BigStatic";
	 //用户类型限制条件##########################结束
	 $addtext = FilterFieldAddText($addtext,$var);
	 print "<TR>\n";
     print "<TD class=TableData noWrap width=20%>$showtext$addtext</TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\"><TEXTAREA class=$class name=$var  title='".$fields['USER_PRIVATE_TEXT'][$var]."' readonly wrap=yes rows=$rows cols=$cols $readonly>$var_value</TEXTAREA>&nbsp;\n";
	 print " </TD></TR>\n";
}

//对多行记录编辑其中一个字段时使用这个函数 2010-1-15
function print_textarea_mluti_readonly($showtext,$var,$var_value="",$rows=5,$cols=40,$colspan=1,$addtext='')	{
	 //$var_value=htmlentitiesUser($var_value);
	 //print_R($_GET);
	 //用户类型限制条件##########################开始
	 global $fields,$tablename,$primarykey_index;
	 $class = "BigStatic";
	 //用户类型限制条件##########################结束
	 $selectidArray = explode(',',$_GET['selectid']);
	 $ShowText = '';
	 for($i=0;$i<sizeof($selectidArray);$i++)		{
		 $selectidText = $selectidArray[$i];
		 if($selectidText!="")				{
			$ShowText .= returntablefield($tablename,$primarykey_index,$selectidText,$var).",";
		 }
	 }
	 $addtext = FilterFieldAddText($addtext,$var);
	 print "<TR>\n";
     print "<TD class=TableData noWrap width=20%>$showtext$addtext</TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\"><TEXTAREA class=$class name=$var  title='".$fields['USER_PRIVATE_TEXT'][$var]."' readonly wrap=yes rows=$rows cols=$cols $readonly>$ShowText</TEXTAREA>&nbsp;\n";
	 print "<input type=hidden name=selectid value='".$_GET['selectid']."'>";
	 print " </TD></TR>\n";
}

function print_image($showtext,$var_value="",$width='120',$colspan=1)	{
	 global $common_html;
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
	 print "<TD class=TableData noWrap width=60% colspan=\"1\">".$common_html['common_html']['viewpicture']."</TD>\n";
	 print "<TD class=TableData noWrap width=60% colspan=\"1\" rowspan=3>\n";
	 if(is_file($var_value))	{
		 print "<img src=\"$var_value\" border=0 width=$width>\n";
	 }
	 else	{
		 print "<img src=\"images/logo_sndg.gif\" border=0 width=172>\n";
	 }
	 print "</TD>\n";
	 print "</TR>\n";
}
//2008-12-13
function print_image_view($showtext,$var_value="",$width='120',$colspan=1)	{
	 global $common_html;
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
	 print "<TD class=TableData noWrap width=60% colspan=\"$colspan\">\n";
	 print "$var_value\n";
	 print "</TD>\n";
	 print "</TR>\n";
}
function print_idnumimage($showtext,$var_value="",$width='120',$colspan=1)	{
	 global $common_html;
	 print "<TR>\n";
     print "<TD class=TableContent noWrap width=20%>$showtext </TD>\n";
	 print "<TD class=TableData noWrap width=60% colspan=\"1\">".$common_html['common_html']['viewpicture']."</TD>\n";
	 print "<TD class=TableData noWrap width=60% colspan=\"1\" rowspan=3>\n";
	 $var_value="idnumimage/".$var_value.".JPG";
	 if(is_file($var_value))	{
		 print "<img src=\"$var_value\" border=0 width=$width>\n";
	 }
	 else	{
		 print "<img src=\"images/logo_sndg.gif\" border=0 width=172>\n";
	 }
	 print "</TD>\n";
	 print "</TR>\n";
}
function print_purview($showtext,$var,$var_value="",$rows=5,$cols=40,$colspan=1)	{
	 //$var_value=htmlentities($var_value);
	 print "<TR>\n";
     print "<TD class=TableContent noWrap colspan=\"2\">\n";
	 print "<input type=hidden name=$var value=''>\n";
	 require_once('userpriv_control.php');
	 print "</TD>\n";
	 print "</TR>\n";

}
function print_htmlarea($showtext,$var,$var_value="",$rows=10,$cols=40,$colspan=4)	{
	 global $_SERVER;
	 print "<TR>\n";
     print "<TD class=TableData noWrap colspan=\"3\">\n";
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 if($PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2] == "Framework")	{
		 $filename = "tinymce/index.inc.php";
	 }
	 else	{
		 $filename = "../../Framework/tinymce/index.inc.php";
	 }
	 require_once($filename);
	 print "&nbsp; </TD>\n";
	 print "</TR>\n";
}
function print_date($showtext,$var="BEGIN_DATE",$openfile="./sms_index/calendar_begin.php",$var_value="",$colspan=1,$addtext='')	{
	 global $_SERVER,$common_html;

	 //实时更新界面语言说明
	$showtext = FilterFieldName($showtext,$var);

	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$var]);
	 if($fields['USER_PRIVATE'][$var]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$var];
		 $disabled = "disabled";
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallInput";
	 }
	 //用户类型限制条件##########################结束

	 //加载日期文件判断
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 $Framework = $PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2];
	 if($Framework == "Framework")	{
		 $filename = "./sms_index/calendar_begin.php?datetime=$var";
	 }
	 else	{
		 $filename = "../../Framework/sms_index/calendar_begin.php?datetime=$var";
	 }
	 //日期清空设定
	 print "<script Language=\"JavaScript\">\n";
	 print "function clear_$var()\n";
	 print "{\n";
	 print "  document.form1.$var.value=\"\";\n";
	 print "}\n";
	 print "</script>";
	 print "<TR><TD class=TableContent noWrap width=20%>$showtext</TD>\n";
	 print "<TD class=TableData colspan=\"$colspan\"><INPUT class=$class maxLength=20 $readonly name=$var value=\"$var_value\" title='".$fields['USER_PRIVATE_TEXT'][$var]."' onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";
	 //print "<IMG style=\"CURSOR: hand\" onclick=\"td_calendar('$filename');\" src=\"./images/calendar.gif\" border=0>\n";
	 print "<input type=\"button\" $disabled title='".$fields['USER_PRIVATE_TEXT'][$var]."'  value=\"".$common_html['common_html']['select']."\" class=\"SmallButton\" onclick=\"td_calendar('$filename');\" title=\"".$common_html['common_html']['select']."\" name=\"button\">&nbsp;&nbsp;";
	 print "<input type=\"button\" $disabled title='".$fields['USER_PRIVATE_TEXT'][$var]."'  value=\"".$common_html['common_html']['clear']."\" class=\"SmallButton\" onClick=\"clear_$var()\" title=\"".$common_html['common_html']['clear']."\" name=\"button\">";
	 print $addtext = FilterFieldAddText($addtext,$var);
	 print "</TD></TR>\n";
}
//用于搜索报表时，选择时间的一个区间时用到，大概的区间范围是在上个月的今日到本月的今日
function print_report_date($showtext,$var="BEGIN_DATE")	{
	 global $_SERVER;
	 $var_value1 = date("Y-m-d",mktime(0,0,0,date("m")-1,date("d"),date("Y")));
	 $var_value2 = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
	 $filename = "./sms_index/calendar_begin.php";
	 //print_R($_SERVER);
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 if($PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2] == "Framework")	{
		 $filename1 = "./sms_index/calendar_begin.php?datetime=".$var."1";
		 $filename2 = "./sms_index/calendar_begin.php?datetime=".$var."2";
	 }
	 else	{
		 $filename1 = "../../Framework/sms_index/calendar_begin.php?datetime=".$var."1";
		 $filename2 = "../../Framework/sms_index/calendar_begin.php?datetime=".$var."2";
	 }
	 print "<TR><TD class=TableContent noWrap width=20%>$showtext</TD>\n";
	 print "<TD class=TableData colspan=\"1\" valign=bottom><INPUT class=SmallStatic maxLength=20 name=".$var."1 readonly value=\"".$var_value1."\">\n";
	 print "<IMG style=\"CURSOR: hand\" onclick=\"td_calendar('".$filename1."');\" src=\"./images/calendar.gif\" border=0></TD>\n";
	 print "<TD class=TableData colspan=\"1\"><INPUT class=SmallStatic maxLength=20 name=".$var."2 readonly value=\"".$var_value2."\">\n";
	 print "<IMG style=\"CURSOR: hand\" onclick=\"td_calendar('".$filename2."');\" src=\"./images/calendar.gif\" border=0></TD>\n";
	 print "</TR>\n";
}
//日期选项函数必须加载的函数
function print_date_js()	{
	global $lang;
	print "<SCRIPT>\n";
	print "function td_calendar(fieldname) {\n";
	print "myleft=document.body.scrollLeft+event.clientX-event.offsetX-80;\n";
	print "mytop=document.body.scrollTop+event.clientY-event.offsetY+140;\n";
	if($lang=='en')		{
		print "window.showModalDialog(fieldname,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:300px;dialogHeight:200px;dialogTop:\"+mytop+\"px;dialogLeft:\"+myleft+\"px\");\n";
	}
	else		{
		print "window.showModalDialog(fieldname,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:280px;dialogHeight:200px;dialogTop:\"+mytop+\"px;dialogLeft:\"+myleft+\"px\");\n";
	}
	print "}\n";
	print "</SCRIPT>\n";
}

//自动编码问题解决方案
function print_tr_auto_increment($showtext,$var,$var_value='',$colspan=1)		{
	global $db,$primarykey_index,$tablename;
	$sql = "select max($var) as NUM from $tablename limit 1";//print $sql;
	$rs = $db->Execute($sql);
	$number = $rs->fields[NUM];
	$number += 1;
	$number = format_auto_increment($number);
	$var_value==""?$var_value=$number:'';
	$auto_increment_name = "AUTO_INCREMENT_".$var;

	//实时更新界面语言说明
	$showtext = FilterFieldName($showtext,$var);

	print "<TR><TD class=TableContent noWrap width=20%>$showtext</TD>\n";
	print "<TD class=TableData colspan=\"$colspan\"><INPUT class=SmallStatic maxLength=20 name=$var readonly value=\"$var_value\"  onkeydown=\"if(event.keyCode==13)event.keyCode=9\"><INPUT class=SmallStatic maxLength=20 name=$auto_increment_name type=hidden value=".$auto_increment_name." onkeydown=\"if(event.keyCode==13)event.keyCode=9\">\n";
	print "</TD></TR>\n";
}


//自动编码问题解决方案
function print_tr_auto_incrementdate($showtext,$var,$var_value='',$colspan=1,$addText='')		{
	global $db,$primarykey_index,$tablename;

	$var_value = returnDateAutoIncrement($var,$tablename,$var_value,$addText);

	//实时更新界面语言说明
	$showtext = FilterFieldName($showtext,$var);

	print "<TR><TD class=TableContent noWrap width=20%>$showtext</TD>\n";
	print "<TD class=TableData colspan=\"$colspan\"><INPUT class=SmallStatic maxLength=20 name=$var readonly value=\"$var_value\"  onkeydown=\"if(event.keyCode==13)event.keyCode=9\">\n";
	print $addtext = FilterFieldAddText($addtext,$var);
	print "</TD></TR>\n";
}

//自动编码问题解决方案-日期-值
function returnDateAutoIncrement($FieldName,$tablename,$value="",$addText="")		{
	global $db;
	global $primarykey_index;
	if($primarykey_index!="")		{
		$MAX_FIELD = $primarykey_index;
	}
	else	{
		$MAX_FIELD = $FieldName;
	}
	$sql = "select max($MAX_FIELD) as NUM from $tablename";//print $sql;
	$rs = $db->Execute($sql);
	$number = $rs->fields['NUM'];
	$sql = "select $FieldName from $tablename where $MAX_FIELD='$number'";//print $sql;
	$rs = $db->Execute($sql);
	$PKNAME = $rs->fields[$FieldName];
	$substr = substr($PKNAME,-4);
	if($PKNAME!="")					{
		$LeftNumber = $PKNAME+1;
	}
	else	{
		$LeftNumber = Date("Ym")."0000";
		$LeftNumber = (int)$LeftNumber;
		$LeftNumber += 1;
	}
	$LeftNumber = $addText.$LeftNumber;
	if($value!="")	return $value;
	else		return $LeftNumber;
}

//自动增量值形成
function format_auto_increment($number)	{
	if(strlen($number)<6)	{
		$number = 100000+$number;
	}
	return $number;
}

//###############################################################################
//-------------------------------------------------------------------------------
//选择信息部分开始
//-------------------------------------------------------------------------------
//###############################################################################
function select_form($type='input',$showtext="",$var1,$var2,$filename,$value1,$value2,$mode='',$large='')	{
	global $html_etc,$common_html;
	global $lang;

	//用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$var]);
	 if($fields['USER_PRIVATE'][$var1]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$var1];
		 $disabled = "disabled";
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallInput";
	 }
	 //用户类型限制条件##########################结束

	//form begin js
	if($mode=='fixed')							{
		$temp='disabled';
	}
	if($large=="CustomerBig")		{
		$cols = "45";
		$rows = "4";
	}
	else	{
		$cols = "30";
		$rows = "3";
	}
	print "<script Language=\"JavaScript\">\n";
	print "function clear_user_$var1()\n";
	print "{\n";
	print "  document.form1.$var1.value=\"\";\n";
	print "  document.form1.$var2.value=\"\";\n";
	print "}\n";
	print "function LoadWindow_$var1(filename)\n";
	print "{\n";
	print "  URL=filename;\n";
	print " loc_x=document.body.scrollLeft+event.clientX-event.offsetX-100;\n";
	print " loc_y=document.body.scrollTop+event.clientY-event.offsetY+200;\n";
  	print "window.showModalDialog(URL,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:320px;dialogHeight:285px;dialogTop:\"+loc_y+\"px;dialogLeft:\"+loc_x+\"px\");\n";
	print "}\n";
	print "</script>\n";
	//form end js

	 global $_SERVER;
	 $PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	 if($PHP_SELF_ARRAY[sizeof($PHP_SELF_ARRAY)-2] == "Framework")	{
		 $filename = $filename;
	 }
	 else	{
		 $filename = "../../Framework/".$filename;
	 }

	print "<tr><td nowrap class=\"TableData\" width=20%>$showtext</td>\n";
	print "<td class=\"TableData\" colspan=2><input type=\"hidden\"  name=\"$var1\" value=\"$value1\">\n";
	switch($type)			{
		case 'input':
			print "<input name=\"$var2\" value=\"$value2\" title='".$fields['USER_PRIVATE_TEXT'][$var1]."' onkeydown=\"if(event.keyCode==13)event.keyCode=9\" class=\"SmallStatic\" readonly>&nbsp;\n";
			print "<input type=\"button\"  $temp $disabled title='".$fields['USER_PRIVATE_TEXT'][$var1]."' value=\"".$common_html['common_html']['add']."\" class=\"SmallButton\" onClick=\"LoadWindow_$var1('$filename')\" title=\"".$common_html['common_html']['add']."\" name=\"button\" $disabled>&nbsp;\n";
			print "<input type=\"button\" $temp $disabled title='".$fields['USER_PRIVATE_TEXT'][$var1]."' value=\"".$common_html['common_html']['clear']."\" class=\"SmallButton\" onClick=\"clear_user_$var1()\" title=\"".$common_html['common_html']['clear']."\" name=\"button\">";
			break;
		case 'textarea':
			print "<textarea id='$var2' cols=$cols name=\"$var2\" rows=\"$rows\" title='".$fields['USER_PRIVATE_TEXT'][$var1]."' class=\"BigStatic\" wrap=\"yes\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" readonly>$value2</textarea>\n";
			if($large=="CustomerBig")		{
			}
			else		{
				print "<input type=\"button\" $temp $disabled title='".$fields['USER_PRIVATE_TEXT'][$var1]."' value=\"".$common_html['common_html']['add']."\" class=\"SmallButton\" onClick=\"LoadWindow_$var1('$filename')\" title=\"".$common_html['common_html']['add']."\" name=\"button\">&nbsp;\n";
				print "<input type=\"button\" $temp $disabled title='".$fields['USER_PRIVATE_TEXT'][$var1]."' value=\"".$common_html['common_html']['clear']."\" class=\"SmallButton\" onClick=\"clear_user_$var1()\" title=\"".$common_html['common_html']['clear']."\" name=\"button\">";
			}
			print "<input type=hidden name=comma_parse value='$var1'>\n";
			print "<input type=hidden name=comma_parse_value value='$var2'>\n";
			break;
	}
	print "</td></tr>\n";
}
function select_form_change($showtext="",$var1,$var2,$var)	{
	global $html_etc,$common_html;
	global $lang;
	print "<tr><td nowrap class=\"TableData\" width=20%>$showtext</td>\n";
	print "<td class=\"TableData\"><input type=\"hidden\" name=\"$var1\" value=\"\">\n";
	print "<input name=\"$var2\"  class=\"SmallStatic\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" value=\"$var\"readonly>&nbsp;\n";
	print "<input type=\"button\" value=\"".$common_html['common_html']['edit']."\" class=\"SmallButton\" onClick=\"LoadWindow()\" title=\"".$common_html['common_html']['edit']."\" name=\"button\">&nbsp;\n";
	print "<input type=\"button\" value=\"".$common_html['common_html']['clear']."\" class=\"SmallButton\" onClick=\"clear_user()\" title=\"".$common_html['common_html']['clear']."\" name=\"button\">\n";
	print "</td></tr>\n";
}
function select_js_load($loadfile="single_select.php")	{
	global $html_etc,$common_html;
	global $lang;
	print "function clear_user()\n";
	print "{\n";
	print " document.form1.TO_NAME.value=\"\";\n";
	print " document.form1.TO_ID.value=\"\";\n";
	print "}\n";
	print "function LoadWindow(){\n";
	print "URL=\"$loadfile\";\n";
	print "loc_x=document.body.scrollLeft+event.clientX-event.offsetX-100;\n";
	print "loc_y=document.body.scrollTop+event.clientY-event.offsetY+140;\n";
  	print "window.showModalDialog(URL,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:320px;dialogHeight:265px;dialogTop:\"+loc_y+\"px;dialogLeft:\"+loc_x+\"px\");}\n";
}
function select_js_clear($var1,$var2)	{
	global $html_etc,$common_html;
	global $lang;
	print "function clear_user(){\n";
	print "document.form1.$var2.value=\"\";\n";
	print "document.form1.$var1.value=\"\";}\n";
}
function select_js_check($showinfo='请添加信息',$var1)	{
	global $html_etc,$common_html;
	global $lang;
	print "function CheckForm(){\n";
	print "if(document.form1.$var1.value==\"\")\n";
	print "{ alert(\"$showinfo\");\n";
	print "return (false);}\n";
	print "return (true);}\n";
}
function select_js($loadfile="single_select.php",$var1,$var2)	{
	global $html_etc,$common_html;
	global $lang;
	print "<script Language=\"JavaScript\">\n";
	select_js_check($html_etc['请添加信息']."！",$var1);
	select_js_clear($var1,$var2);
	select_js_load($loadfile);
	print "</script>\n";
}
//-----------------------------------------------------------------------------------
//选择信息部分结束
//-----------------------------------------------------------------------------------
function print_hidden($var_value,$name="editid")	{
	//$var_value=htmlentities($var_value);
	print "<input type=hidden class=SmallInput name=$name value=\"$var_value\">\n";
}
function print_submit($submit='',$colspan=2,$status="all",$return='history.back();')	{
	$common_html=returnsystemlang("common_html");
	if($submit=='')		{
		$submit=$common_html['common_html']['submit'];
	}
	if($status=="all")	{
	print "<TR><TD class=TableControl noWrap align=middle  colspan=\"$colspan\">\n";
	print "<div align=\"center\">\n<INPUT class=SmallButton name=$submit title=$submit type=submit value=\"$submit\" name=button>\n　<INPUT class=SmallButton onclick=\"$return\" type=button value='".$common_html['common_html']['cancel']."'>\n</div>\n";
    print "</TD></TR>\n";
	}
	if($status=="simple")	{
	print "<INPUT class=SmallButton title=\"$submit\" type=submit value=\"$submit\" name=button> \n";
	}
}
function print_submit_element_array($array,$align='middle')	{
	global $html_etc,$common_html;
	global $lang,$fields;
	print "<TR><TD class=TableControl noWrap align=middle  colspan=\"3\">\n";
	print "<div align=\"$align\">\n";
	if(!is_array($array))	$array = array();
	foreach($array as $list)		{
		print "<input type=".$list['type']." accesskey=\"".$list['shortcut']."\" name=\"".Trim($list['name'])."\" value=\"".$list['value']."\" class=".$list['class']." onClick=\"".$list['url']."\" title=\"".$common_html['common_html']['accesskey'].":ALT+".$list['shortcut']."\">\n";
	}
	print "</div>\n";
    print "</TD></TR>\n";
}
function print_new_element($var,$method="?action=add",$class="SmallButton")	{
	global $html_etc,$common_html;
	global $lang;
	print "<div align=\"center\"><input type=\"button\" value=\"$var\" class=$class onClick=\"location='$method';\" title=\"$var\"></div>\n";
	print "<br>\n";
}

function print_search_element_array($name,$value,$mark='default',$affixation=array(),$affixation_index)	{
	global $common_html,$db,$action_model,$action_search,$location_title;
	global $read_type,$email_filter,$sms_filter,$_GET,$html_etc,$tablename;
	global $primarykey_index;
	global $fields;
	$action="init_".$mark."_search";
	if(isset($action_search))								{
	form_begin('Form2',"$action",'get');
	print "<THEAD >\n";
	print "<TR>";
    print "<TD noWrap colspan=".$fields['table']['colspan'].">\n";

	print "<table width=100% class=Small border=0><THEAD ><tr ><td  noWrap>";

?>
<SCRIPT language=javascript type=text/javascript>

//判断登录
function checkLoginSearch()
{
    var searchvalue = $F("searchvalue");

	var ShowMsg = new Array(3);
	ShowMsg[0] = "<font color=red>您输入的字符长度不能小于"+PWD_MIN_LEN+",或大于"+PP_MAX_LEN+"!</font>";

	if(!LimitLen(searchvalue,PWD_MIN_LEN,PP_MAX_LEN)){
	    return Focus('searchvalue', "Searchvalue_CSS", ShowMsg[0], 120);
	}
	else{
		ClearCss("Searchvalue_CSS",1);
		document.Form2.submit();
	}

}
</SCRIPT>
<?
	if(isset($action_model))
		show_new_element($action_model,$location_title);
	//print $common_html['common_html']['search'].":\n";
	$addtext=$affixation[0]['index_name'];
	//print_R($affixation);&&$_GET['actionadv']==''
	//当高级搜索打开时,此部分不进行显示,高级搜索关闭时,此部分显示
	if($_GET['actionadv']=='')			{
	print "<input type=hidden name=action value=$action>";
	print "<input type=hidden name='".$addtext."' value='".$_GET[$addtext]."'>";

	print "<select class=\"SmallSelect\" name=\"searchfield\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";

	//当GETSEARCHFIELD不为空时,进行SESSION注册操作
	if($_GET['searchfield']!="")		{
		session_register("SYSTEM_INITVIEW_SEARCH_LIST_DEFAULT");
		$_SESSION['SYSTEM_INITVIEW_SEARCH_LIST_DEFAULT'] = $_GET['searchfield'];
	}

	for($i=0;$i<sizeof($name);$i++)	{
		if($_SESSION['SYSTEM_INITVIEW_SEARCH_LIST_DEFAULT']==$value[$i])	{
			$temp = "selected";
		}
		else
			$temp = "";
		print "<option value=\"".$value[$i]."\" $temp>".$name[$i]."</option>\n";
	}

	print "</select>\n";
	print "<INPUT type=\"text\" class=\"SmallInput\" maxLength=200 size=\"9\" name=\"searchvalue\" value=\"\">\n";
	print "<INPUT class=SmallButton title=\"".$common_html['common_html']['accesskey'].":ALT+F\"\" type=button onclick=\"checkLoginSearch();\" accesskey=\"f\"  value=\"".$common_html['common_html']['search']."\" name=button>\n";

	}//高级搜索部分判断结束

	//print_R($affixation);
	global $SYTEM_CONFIG_TABLE;
	$SYTEM_CONFIG_TABLE!=""?$tablename=$SYTEM_CONFIG_TABLE:'';
	if(is_array($affixation)&&sizeof($affixation)>0)		{
	foreach($affixation as $list)		{
		switch($list['attribute'])		{
			case 'text':
				print "<select class=\"SmallSelect\" >\n";
				print "<option value=\"\" >".$affixation_index."</option>\n";
				print "</select>\n";
				break;
			case 'hidden':
				break;
			case 'fixed':
				break;
			default:
				//$return=returnpageaction($mode='group_filter',array('index_name'=>$list['index_name'],'index_id'=>''));
				//print $_GET['DEPT_ID_NAME'];;
				$FormPageAction=FormPageAction("action",$_GET[action]);
				//print "<font color=black>".$html_etc[$tablename][$list['index_name']].":</font>&nbsp;";
				print "<select class=\"SmallSelect\" onChange=\"var jmpURL='?".$FormPageAction."&".$list['index_name']."=' + this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}\" name=\"".$list['index_name']."_NAME\" >\n";
				//print "<option value=\"\" >".$common_html['common_html']['allrecords']."</option>\n";
				print "<option value=\"\" >".$html_etc[$tablename][$list['index_name']]."[".$common_html['common_html']['allrecords']."]</option>\n";

				for($i=0;$i<sizeof($list['fieldid']);$i++)	{

					print "<option value=\"".$list['fieldid'][$i]."\" ".$list['selected'][$i].">".$list['fieldname'][$i]."</option>\n";
				}
				print "</select>\n";
		}//end switch
	}//end foreach
	}//end if



	if($email_filter!="")
		$temp=$email_filter;
	else if($sms_filter!='')
		$temp=$sms_filter;
	else $temp='';

	if($temp)									{
		$array_filter=explode(',',$temp);
		if($_GET['action']=='init_default')			{
			$_GET['action']=='init_inbox';
		}
		print "<select class=\"SmallSelect\" onChange=\"var jmpURL=this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}\" name=\"".$list['index_name']."_NAME\" >\n";
		for($i=0;$i<sizeof($array_filter);$i++)	{
			if("init_".$array_filter[$i]==$_GET['action'])	$selected='selected';
			else	$selected='';
			print "<option value=\"?action=init_".$array_filter[$i]."\" $selected>".$common_html['common_html'][(String)$array_filter[$i]]."</option>\n";
		}
		print "</select>\n";
	}

	global $增加对查询日期快捷方式的支持_是否启用;
	if($增加对查询日期快捷方式的支持_是否启用==1&&$_SESSION['增加对查询日期快捷方式的支持']=='设置为0')		{
		print "&nbsp;&nbsp;<a href='?".FormPageAction("增加对查询日期快捷方式的支持GET","设置为1")."'><font color=gray title=\"启用'增加对查询日期快捷方式的支持'功能\">打开查询日期显示</font></a>";
	}
	//提示信息显示
	print "</td>\n";
	print "<td nowrap width=60%><DIV class=InputError id=Searchvalue_CSS></DIV></td>\n";
	print "</tr></THEAD></table>";

	print "</TD></TR>\n";
	print "</THEAD>\n";
	form_end();


	//###############################################################################
	//###############################################################################
	//###############################################################################
	global $USER_DEFINE_FUNCTION_PAGE_NAME;
	if($USER_DEFINE_FUNCTION_PAGE_NAME!= "")	{
		$USER_DEFINE_FUNCTION_PAGE_NAME();
	}

	}
}


//##############################################################################
//
//
//##############################################################################
function show_new_element($action_model,$location_title='')		{
	global $common_html,$action_model,$_GET,$tablename;
	global $group_user,$_SESSION;
	//权限体系分配；
	$USER_PRIV_ID = $_SESSION['SUNSHINE_USER_PRIV'];
	$USER_PRIV = returntablefield("user_priv","USER_PRIV",$USER_PRIV_ID,"PRIV_NO");

	$action_model_array=explode(',',$action_model);
	for($i=0;$i<sizeof($action_model_array);$i++)	{
		$model_index_array=explode(':',$action_model_array[$i]);
		$index_mid=$model_index_array[0];
		$index=$model_index_array[1];
		if($index=='')	{
			$index_array=explode('_',$index_mid);
			$index=$index_array[0];
		}
		//得到系统文件分配权限
		$USER_PRIV_USER = $model_index_array[3];
		if($USER_PRIV_USER==""||($USER_PRIV_USER==$USER_PRIV||$USER_PRIV=='1'||$USER_PRIV=='2'))		{
		switch($index)		{
			case 'set':
				//$url="?action=".$index_mid."&table_name=$tablename&table_action=".$_GET['action'];
				$actionValue=explode("_",$_GET['action']);
				$actionValueText="";
				for($m=1;$m<sizeof($actionValue);$m++)	{
					$actionValueText.="_".$actionValue[$m];
				}
				$actionValueText="set".$actionValueText;
				$return=FormPageAction("action",$actionValueText,"table_name",$tablename,'',"table_action",$_GET['action'],"returnmodel",$_GET['action']);
				$url="?".$url;
				break;
			case 'setlang':
				$url="systemlang.php?action=init_default&tablename=$tablename";
				break;
			case 'exportadv':
				$return=FormPageAction("actionadv",$index_mid);
				//$return=returnpageaction($mode='init_exportadv',array('index_name'=>'action','index_id'=>$index_mid));
				$url="?$return";
				break;
			case 'export':
				$return=FormPageAction("action",$index_mid);
				//$return=returnpageaction($mode='init_exportadv',array('index_name'=>'action','index_id'=>$index_mid));
				$url="?$return";
				break;
			default:
				$group_array=return_parent_group();//print_R($group_array['sql_text']);
				if(sizeof($group_array['sql_text'])>1)		{
					$temp_get_parent=isset($_GET[(string)$group_array['sql_text']['parent']])?$_GET[(string)$group_array['sql_text']['parent']]:0;
					$temp_get=$_GET[(string)$group_array['sql_text']['id']];
					$temp_get=isset($temp_get)?$temp_get:0;
					switch($group_array['sql_text']['type'])		{
						case 'group':
							$sql_text_user=$group_array['sql_text']['user']."=".$_GET[(string)$group_array['sql_text']['user']];
							break;
						case 'user':
							$sql_text_user='';
							break;
						default:
							$sql_text_user='';
							break;
					}
					$url="?action=".$index_mid."&".$sql_text_user."&".$group_array['sql_text']['parent']."=".$temp_get_parent."&".$group_array['sql_text']['id']."=".$temp_get;
				}
				else		{
					$return=FormPageAction("action",$index_mid);
					//$return=returnpageaction($mode='init_add',array('index_name'=>'action','index_id'=>$index_mid));
					$url="?$return";
					//print $url;
				}
				break;
		}
		$array[$i]['value']=" ".$common_html['common_html'][$index]." ";
		$array[$i]['title']=" ".$common_html['common_html'][$index]." ";
		$array[$i]['url']=$url;
		$array[$i]['shortcut']=$model_index_array[2];
		$array[$i]['class']='SmallButton';
	}//end switch
	}//end 用户权限划分

	//系统调试模式
	global $systemmode;
	if($systemmode=='test')			{
		$array[$i+1]['value']=" ".$common_html['common_html']['setlang']." ";
		$array[$i+1]['title']=" ".$common_html['common_html']['setlang']." ";
		$array[$i+1]['url']="systemlang_newai.php?action=init_default&tablename=$tablename";
		$array[$i+1]['shortcut']='t';
		$array[$i+1]['class']='SmallButton';
	}
	//print_R($array);
	print_new_element_array($array,$location_title);
}


function print_new_element_array($array,$location_title='')	{
	global $html_etc,$common_html;
	global $lang;
	if($location_title!='sunshine_inside')	{
		print "<div align=\"center\">\n";
	}
	if(!is_array($array))	$array = array();
	foreach($array as $list)				{
		if(Trim($list['value'])!=""&&$_GET['actionadv']=='')
			print "<input type=\"button\" accesskey=\"".$list['shortcut']."\" value=\"".$list['value']."\" class=".$list['class']." onClick=\"location='".$list['url']."';\" title=\"".$common_html['common_html']['accesskey'].":ALT+".$list['shortcut']."\">\n";
	}
	if($location_title!='sunshine_inside')	{
		print "</div>\n";
		print "<br>\n";
	}
}


function print_chart_element_array($name,$value,$mark='default')	{
	global $common_html;
	global $chart_type;
	global $chart_type_target;
	$action="chart_".$mark."_data";
	form_begin('Form2',"action=$action",'post');
	table_begin(350);
	print "<TR>";
    print "<TD class=TableData noWrap>".$common_html['common_html']['chart'].":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"1\">\n";
	print "<select class=\"SmallSelect\" name=\"chartfield\" >\n";
	for($i=0;$i<sizeof($name);$i++)	{
		print "<option value=\"".$value[$i]."\" $temp>".$name[$i]."</option>\n";
	}
	print "</select>\n";
	print "<select class=\"SmallSelect\" name=\"chart_type\" >\n";
	for($i=0;$i<sizeof($chart_type);$i++)	{
		print "<option value=\"".$chart_type[$i]."\" $temp>".$chart_type[$i]."</option>\n";
	}
	print "</select>\n";
	print "<INPUT class=SmallButton title=submit type=submit value=\"".$common_html['common_html']['export']."\" name=button>\n";
	print "</TD></TR>\n";
	table_end();
	form_end();
}
function print_chart_picture_array($picture)	{
	global $common_html;
	table_begin();
	print "<TR>";
    print "<TD class=TableData noWrap colspan=\"1\">\n";
	if(sizeof($picture)>0)		{
	foreach($picture as $list)	{
		print "<img src=\"$list\" border=0/><BR>";
	}//end for
	}//end if
	print "</TD></TR>\n";
	table_end();
}
function print_new_element_input($var,$method="?action=add",$class="SmallButton")	{
	global $html_etc,$common_html;
	global $lang;
	print "<input type=\"button\" value=\"$var\" class=$class onClick=\"location='$method';\" title=\"$var\">";

}
function print_show($title,$content,$width="650")	{
	global $html_etc,$common_html;
	global $lang;
	print "<TABLE class=Small cellSpacing=1 cellPadding=3 width=$width align=center  border=0>\n";
	print "<THEAD class=TableContent><TR>\n";
    print "<TD noWrap align=middle><font color=blue size=2><B>$title</B></font></TD>\n";
	print "</TR></THEAD>\n";
	print "<TR class=TableContent>\n";
	print "<TD ><font size=2>$content</font></TD>\n";
    print "</TR>\n";
	table_end();
}
function print_text_pic($showtext,$var,$attachmentname,$rowspan="3")	{
	global $html_etc,$common_html;
	global $lang;
	print "<tr><td nowrap class=\"TableData\" width=\"100\">$showtext</td>\n";
	print "<td class=\"TableData\" width=\"280\">$var\n";
	print "</td><td class=\"TableData\" width=\"100\" rowspan=\"3\"> <center>\n";
	//------------------------------------------------------------------------
	if(file_exists($attachmentname))	{
		print "<img width=\"100\" src=\"$attachmentname\">";
	}
	else	{
		print "".$html_etc['暂无图片']."";
	}
	//------------------------------------------------------------------------
	print "</center></td>\n";
	print "</tr>\n";
}
//------------------------------------------------------------------------------
//页面标题三个函数
//------------------------------------------------------------------------------
function writeline()	{
	print "<TABLE height=3 cellSpacing=0 cellPadding=0 width=\"95%\" border=0><TBODY><TR>\n";
    print "<TD width=\"100%\" background=../images/dian1.gif></TD></TR></TBODY></TABLE>\n";
}
function write_whiteline($align="center",$width="95%")	{
	print "<hr width=\"95%\" height=\"1\" align=\"$align\" color=\"#ffffff\">";
}
//------------------------------------------------------------------------------
function print_title($var,$colspan=3,$align="middle")	{
	print "<TR><TD class=TableHeader align=left colSpan=$colspan>&nbsp;$var</TD></TR>\n";
}
function print_title1($var,$colspan=2,$align="middle")	{
	print "<TR><TD class=TableHeader align=left colSpan=$colspan><B>&nbsp;<font size=+1>$var</font></B></TD></TR>\n";
}
function print_boolean($showtext,$var,$value=0,$size="25",$colspan=1,$class="SmallSelect",$addtext="")	{
	global $common_html;
	global $lang;

	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE']);print $var;exit;
	 if($fields['USER_PRIVATE'][$var]!="")	{
		 $readonly = "disabled";
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
	 }
	 //用户类型限制条件##########################结束

	//实时更新界面语言说明
	 $showtext = FilterFieldName($showtext,$var);

	print "<TR><TD class=TableData noWrap>$showtext</TD>\n";
    print "<TD class=TableData colspan=$colspan>";
	if($value==1)	{
		print "<label>";
		print "<input type=\"radio\" class=Smallradio name=$var value=\"1\" checked $readonly>".$common_html['common_html']['yes']."\n";
		print "<input type=\"radio\" name=$var value=\"0\" $readonly>".$common_html['common_html']['no']."\n";
		print "</label>";

	}else	{
		print "<label>";
		print "<input type=\"radio\" class=Smallradio name=$var value=\"1\" $readonly>".$common_html['common_html']['yes']."\n";
		print "<input type=\"radio\" name=$var  checked  value=\"0\" $readonly>".$common_html['common_html']['no']."\n";
		print "</label>";
	}
	print $addtext = FilterFieldAddText($addtext,$var);
	print "</TD></TR>\n";
}
function print_sex($showtext,$var,$value=1,$size="25",$colspan=1,$class="SmallSelect",$addtext="")	{
	global $html_etc,$common_html;
	global $lang;
	print "<TR><TD class=TableData noWrap>$showtext</TD>\n";
    print "<TD class=TableData colspan=$colspan>";
	if($value==1)	{
		print "<input type=\"radio\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' checked name=\"$var\" value=\"1\"/>".$common_html['common_html']['male']."</label>\n";
		print "<input type=\"radio\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."'  name=\"$var\" value=\"0\"/>".$common_html['common_html']['female']."</label>\n";
	}else	{
		//print "<SELECT class=$class name=$var onkeydown=\"if(event.keyCode==13)event.keyCode=9\" class=\"SmallStatic\"><OPTION value=0 selected>".$common_html['common_html']['female']."</OPTION> <OPTION value=1>".$common_html['common_html']['male']."</OPTION></SELECT>";
		print "<input type=\"radio\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' name=\"$var\" value=\"1\"/>".$common_html['common_html']['male']."</label>\n";
		print "<input type=\"radio\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' checked name=\"$var\" value=\"0\"/>".$common_html['common_html']['female']."</label>\n";
	}
	print $addtext = FilterFieldAddText($addtext,$var);
	print "</TD></TR>\n";
}
function print_avatar($showtext,$var,$var_value="",$size="25",$colspan=1,$class="SmallInput",$addtext="",$type='text')				{
print "<tr>\n";
print "<td nowrap class=\"TableContent\" valign=\"top\">$showtext</td>\n";
print "<td class=\"TableData\" colspan=$colspan>\n";
if($var_value=='')			$var_value=9;
for($i=1;$i<=27;$i++)		{
	if($var_value==$i)		{
		$temp="checked";
	}
	print "<input type=\"radio\" name=\"$var\" value=\"$i\" $temp >\n";
    print "<img src=\"images/avatar/$i.gif\">\n";
	if($i%5==0)	print "<BR>\n";
	$temp='';
}
print "</td>\n";
print "</tr>\n";
}
function print_text_avatar($showtext,$var,$colspan=1)	{
	 if((int)$var>27||(int)$var<1)
		 $var="1";
	 print "<tr>\n<td nowrap class=\"TableContent\" width=20%>$showtext</td>\n";
	 print "<td class=\"TableData\" colspan=$colspan>\n";
	 print "<img src=\"images/avatar/$var.gif\">\n</td>\n</tr>\n";
}




//###################################################################################
//课表系统专用函数###################################################################
//###################################################################################

function CopyRightHtml($width)			{
	print '
	<table border="1" cellspacing="0" class="small" bordercolor="#000000" cellpadding="3" align="center" width='.$width.' style="border-collapse:collapse">
	<tr align="center" class="TableHeader">
    <td rowspan="1">
	<font color=green>
	CopyRight 2002-2005 DANDIAN INC DESIGN BY DANDIAN INC 2003-2005
	</font>
	</td>
	</tr>
	</table>
	';
}

function ReportHeaderHtml($title,$width)			{
	global $common_html,$tablename;
	$print = $common_html['common_html']['print'];
	$return = $common_html['common_html']['return'];
	print '
	<table border="1" cellspacing="0" class="TableBlock" bordercolor="#000000" cellpadding="3" align="center" width='.$width.' style="border-collapse:collapse">
	<tr align="center" class="TableContent">
    <td rowspan="1" title='.$title.'>'.$title.'
	<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	打印时间：'.date("m-d H:i").'
		<input type=button accesskey="p" value=" '.$print.' " class=SmallButton
			onClick="document.execCommand(\'Print\');" title=" '.$print.' ">
		<input type=button accesskey="c" value=" '.$return.' " class=SmallButton onClick="history.back();" title=" '.$return.' ">
	</td></tr>

	</table>
	<BR>
	';
	//</td></tr><tr align="right" class="TableHeader"><td rowspan="1" >
}

function returnHaveorNot($value)	{
	//global $common_html,$lang;
	if($value==1)	{
		$index='<font color=red>有</font>';
	}
	else	{
		$index='<font color=green>无</font>';
	}
	//return trim($common_html['common_html'][$index]);
	return $index;
}

function returnWeekText($value)		{
	$WeekText[0]="星期日";
	$WeekText[1]="星期一";
	$WeekText[2]="星期二";
	$WeekText[3]="星期三";
	$WeekText[4]="星期四";
	$WeekText[5]="星期五";
	$WeekText[6]="星期六";
	$WeekText[7]="星期日";
	return $WeekText[$value];
}

function returnJieCi($value)		{
	$JieCi[1]="上午1,2节";
	$JieCi[2]="上午3,4节";
	$JieCi[3]="下午1,2节";
	$JieCi[4]="下午3,4节";
	$JieCi[5]="晚上";
	return $JieCi[$value];
}

function print_select_classtable($showtext,$fieldname,$value,$otherinfor)	{
global $db;
$CourseCodeArray=explode(',',$value);//print_R($CourseCodeArray);
$sql="select ".$otherinfor['field'].",".$otherinfor['value']." from ".$otherinfor['tablename']." order by ".$otherinfor['value']."";
$rs=$db->CacheExecute(150,$sql);
$RecordCount = $rs->RecordCount();
if($RecordCount>=10)
	$RecordCount = 10;
print "<script language=\"javascript\">function changetext_".$fieldname."()
{
	var i;
	form1.".$fieldname."showtext.value=\"\";
	for (i=0;i<document.getElementById(\"_".$fieldname."_\").length;i++)
	{
		if (document.getElementById(\"_".$fieldname."_\").options[i].selected)
		{
			if (form1.".$fieldname."showtext.value==\"\")
			{
				form1.".$fieldname."showtext.value=document.getElementById(\"_".$fieldname."_\").options[i].text;
			}
			else
			{
	  			form1.".$fieldname."showtext.value=form1.".$fieldname."showtext.value+\",\"+document.getElementById(\"_".$fieldname."_\").options[i].text;
			}
		}
	}
	//开始值形成
	var i;
	form1.$fieldname.value=\"\";
	for (i=0;i<document.getElementById(\"_".$fieldname."_\").length;i++)
	{
		if (document.getElementById(\"_".$fieldname."_\").options[i].selected)
		{
			if (form1.$fieldname.value==\"\")
			{
				form1.$fieldname.value=document.getElementById(\"_".$fieldname."_\").options[i].value;
			}
			else
			{
	  			form1.$fieldname.value=form1.$fieldname.value+\",\"+document.getElementById(\"_".$fieldname."_\").options[i].value;
			}
		}
	}
}</script>";
print "<TR><TD class=TableData noWrap>$showtext<br>(按Ctrl多选)</TD><TD class=TableData noWrap>";
print "<SELECT width=100 id=\"_".$fieldname."_\" name=\"classtable_".$fieldname."[]\" size=\"$RecordCount\" multiple onchange=\"changetext_".$fieldname."();\" class=DefinedSelect>\n";
//print "<OPTION value=0><没有所授课程></OPTION>\n";
$NewCourseCode=array();
$NewCourseName=array();
while(!$rs->EOF)	{
	$name=trim($rs->fields[$otherinfor['field']]);
	$id=trim($rs->fields[$otherinfor['value']]);
	$selected=0;
	if(in_array($id,$CourseCodeArray))		{
		$selected=1;
		$addText="selected";
		array_push($NewCourseCode,$name);
		array_push($NewCourseName,$name."[".$id."]");
	}
	else	{
		$selected=0;
		$addText="";
	}
	print "<OPTION value=\"$id\" $addText>".$name."[".$id."]</OPTION>\n";

	$rs->MoveNext();
}
print "</select>\n";
$NewCourseCodeText=join(",",$NewCourseCode);
$NewCourseNameText=join(",",$NewCourseName);
print "<br><input class=SmallInput size=45 type=\"text\" name=\"".$fieldname."showtext\" value=\"$NewCourseCodeText\" readonly>";
print "<input size=45 type=\"hidden\" name=\"$fieldname\" value=\"$value\">";
print "</TD></TR>\n";

}

function CheckReturn($value,$Array)	{
	if(in_array($value,$Array))		{
		return "Checked";
	}
	else	{
		return "";
	}
}

function print_select_spacetime($showtext,$fieldname,$value)		{
	global $db;
	print "<TR><TD class=TableData noWrap colspan=3>时间设置:<br>";
	print "<input type=hidden name=\"$fieldname\" value=\"$value\">";
	print "

<table class=TableBlock width=100%>

<TR Class=TableHeader>
<TD noWrap align=middle bgcolor='#CCFFCC'>星期一</TD>
<TD noWrap align=middle bgcolor='#FFCCFF'>星期二</TD>
<TD noWrap align=middle bgcolor='#CCFFCC'>星期三</TD>
<TD noWrap align=middle bgcolor='#FFCCFF'>星期四</TD>
<TD noWrap align=middle bgcolor='#CCFFCC'>星期五</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='10' >  早  上</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='20' >  早  上</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='30' >  早  上</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='40' >  早  上</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='50' >  早  上</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='11' > 1, 2节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='21' > 1, 2节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='31' > 1, 2节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='41' > 1, 2节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='51' > 1, 2节</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='12' > 3, 4节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='22' > 3, 4节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='32' > 3, 4节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='42' > 3, 4节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='52' > 3, 4节</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='13' > 5, 6节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='23' > 5, 6节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='33' > 5, 6节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='43' > 5, 6节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='53' > 5, 6节</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='14' > 7, 8节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='24' > 7, 8节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='34' > 7, 8节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='44' > 7, 8节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='54' > 7, 8节</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='15' > 9,10节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='25' > 9,10节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='35' > 9,10节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='45' > 9,10节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='55' > 9,10节</TD>
</TR>
<TR Class=TableData>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='16' >11,12节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='26' >11,12节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='36' >11,12节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='46' >11,12节</TD>
<TD noWrap align=middle><input type='checkbox' name='时间设置[]' value='56' >11,12节</TD>
</TR>
</Table>

	";
	print "</TD></TR>\n";
}
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>