<?
function action_submit()											{
	global $sectionArray;
	//模块动作
	//add_default:new:n,export_default:export:x,import_default:import:i
	//submit:new:n,cancel:cancel:c
	$array = array("保存"=>"submit:save:s","打印"=>"print:print:p","返回"=>"cancel:cancel:c");
	print "<TR><TD class=TableContent align=left width=25% colSpan=1>&nbsp;模块动作:</TD><TD class=TableContent align=left colSpan=1>&nbsp;\n";
	checkbox_array($array,"action_submit",$sectionArray['action_submit']);
	print "</TD></TR>";

}

function sectionName()												{
	global $_GET,$actionModel;
	global $filename;
	global $SYSTEM_MODE_DIR;
	print "<table border=1 cellspacing=0 class=small bordercolor=#000000 cellpadding=3 align=center width=100% style=\"border-collapse:collapse\">\n";
	print "<TR><TD class=TableHeader align=left colSpan=4>&nbsp;模块明细 模块名称：".$_GET['sectionName']." 文件源：$filename</TD></TR>";
	switch($_GET['sectionName'])		{
		case 'init_default':
			$ImportAction = "init";
			break;
		case 'init_customer':
			$ImportAction = "init2";
			break;
		case 'edit_default':
			$ImportAction = "edit";
			break;
		case 'view_default':
			$ImportAction = "view";
			break;
		case 'view_customer':
			$ImportAction = "view2";
			break;
		case 'report_default':
			$ImportAction = "report";
			break;
		case 'statistics_default':
			$ImportAction = "statistics";
			break;
	}
	if($actionModel!="")			{
		print "
		<TR><TD class=TableControl noWrap align=middle  colspan=2>
		<div align=center>
		<INPUT class=SmallButton title=保存 type=submit value=\" 保 存 \" name=button>
		<INPUT class=SmallButton onclick=\"location='?Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."'\" type=button value='回到菜单'>
		<INPUT class=SmallButton onclick=\"location='?Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&action=".$ImportAction."importfromaddview'\" type=button value='从新增视图导入'>
		<script Language=\"JavaScript\">
		function LoadWindow()
		{
			URL=\"../Interface/".$SYSTEM_MODE_DIR."/perview_system.php?Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&action=".$_GET['sectionName']."\";
			loc_x=document.body.scrollLeft+event.clientX-event.offsetX-100;
			loc_y=document.body.scrollTop+event.clientY-event.offsetY+150;
  			window.showModalDialog(URL,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:600px;dialogHeight:550px;dialogTop:\"+loc_y+\"px;dialogLeft:\"+loc_x+\"px\");
		}
		</script>
		<INPUT class=SmallButton onclick=\"LoadWindow();\" type=button value='模块预览'>
		</div>
		";
	}


}
function tablename()												{
	global $sectionArray;
	print "<TR><TD class=TableContent align=left width=25% colSpan=1 nowrap>&nbsp;对象名(表名:英文名):</TD><TD class=TableContent align=left width=75% colSpan=1>&nbsp;<input name=tabletitle type=text class=SmallStatic size=55  value=\"".$sectionArray['tablename']."\"></TD></TR>";

}
function tabletitle()												{
	global $sectionArray;
	print "<TR><TD class=TableContent align=left width=25% colSpan=1>&nbsp;表格标题(标题说明):</TD><TD class=TableContent align=left colSpan=1>&nbsp;<input name=tabletitle type=text class=SmallStatic size=55  value=\"".$sectionArray['tabletitle']."\"></TD></TR>";

}
function tablewidth()												{
	global $sectionArray;
	$array = array("100%"=>"100%","85%"=>"85%","80%"=>"80%","65%"=>"65%");
	print "<TR><TD class=TableContent align=left width=25% colSpan=1>&nbsp;表格宽度:</TD><TD class=TableContent align=left colSpan=1>&nbsp;\n";
	radio_array($array,"tablewidth",$sectionArray['tablewidth']);
	print "</TD></TR>";

}
function showfield_radio()											{
	global $sectionArray,$columns;
	$array = array_keys_values($columns);
	print "<TR><TD class=TableContent align=left width=25% colSpan=1>&nbsp;所选属性:</TD><TD class=TableContent align=left colSpan=1>";
	Checkbox_array2($array,"showlistfieldlist",$sectionArray['showlistfieldlist']);
	print "</TD></TR>";

}
function returnmodel()												{
	global $sectionArray;
	//返回路径设置
	//add_default  init_default,filename.php
	print "<TR><TD class=TableContent align=left width=20% colSpan=1>&nbsp;返回路径参数:</TD><TD class=TableContent align=left colSpan=1>&nbsp;<input name=returnmodel type=text class=SmallInput size=55 value=\"".$sectionArray['returnmodel']."\"><BR>\n";
	print "&nbsp;[默认返回路径:init_default 可以追加参数形成:init_default,***.php&nbsp;]</TD></TR>";

}
function group_filter()												{
	global $sectionArray;
	//返回路径设置
	//add_default  init_default,filename.php
	print "<TR><TD class=TableContent align=left width=20% colSpan=1>&nbsp;导出参数过滤:</TD><TD class=TableContent align=left colSpan=1>&nbsp;<input name=group_filter type=text class=SmallInput size=55 value=\"".$sectionArray['group_filter']."\"><BR>\n";
	print "&nbsp;[沿用列表视图GROUP_FILTER规则如&nbsp;2:user:1:2&nbsp;主要用于导出时可以按用户组来进行权限细分 支持:hidden属性]</TD></TR>";

}

function primary_key($information = "表主键选项")					{
	global $sectionArray,$columns,$Tablerealname,$_GET,$html_etc;
	for($i=0;$i<sizeof($columns);$i++)		{
		$indexName = $columns[$i];
		$htmlName = $html_etc[$Tablerealname][$indexName];
		$newArray[$htmlName] = $i;
	}
	$newArray['不较验主键'] = 'X';
	//主键操作

	print "<TR><TD class=TableContent align=left width=20% colSpan=1>&nbsp;表主键:</TD><TD class=TableContent align=left colSpan=1>&nbsp;<input name=primarykey type=text class=SmallInput size=55 value=\"".$sectionArray['primarykey']."\"><BR>\n";
	print "&nbsp;导入时使用:不较验主键:X 多字段导入示例: 2,3,4:userid,9:datetime,5:username</TD></TR>";
}
function unique_key($information = "表唯一键选项")					{
	global $sectionArray,$columns,$Tablerealname,$_GET,$html_etc;
	for($i=0;$i<sizeof($columns);$i++)		{
		$indexName = $columns[$i];
		$htmlName = $html_etc[$Tablerealname][$indexName];
		$newArray[$htmlName] = $i;
	}
	//唯一键操作
	print "<TR><TD class=TableContent align=left width=25% colSpan=1>&nbsp;$information:</TD><TD class=TableContent align=left colSpan=1>&nbsp;\n";
	select_array($newArray,"uniquekey",$sectionArray['uniquekey']);
	print "</TD></TR>";

}
function table_infor()					{
	global $sectionArray,$file_ini,$columns,$Tablename,$_GET,$GlobalModel;

	print "<TR><TD class=TableContent align=left width=25% colSpan=2>\n";
	print $GlobalModel;
	print "<table border=1 cellspacing=0 class=small bordercolor=#000000 cellpadding=3 align=center width=100% style=\"border-collapse:collapse\">\n";
	print "<TR><TD class=TableContent align=left colSpan=4>&nbsp;类型属性明细</TD></TR>";
	//字段表头信息
	print "<TR>";
	print "<TD class=TableContent align=left colSpan=1>&nbsp;属性名称</TD>\n";
	print "<TD class=TableContent align=left colSpan=1>&nbsp;是否启用</TD>\n";
	$GlobalModel=="init" ? print "<TD class=TableContent align=left colSpan=1>&nbsp;搜索选项</TD>\n" : '';
	$GlobalModel=="init" ? print "<TD class=TableContent align=left colSpan=1>&nbsp;高级搜索</TD>\n" : '';
	$GlobalModel=="init" ? print "<TD class=TableContent align=left colSpan=1>&nbsp;分组信息</TD>\n" : '';
	$GlobalModel=="statistics" ? print "<TD class=TableContent align=left colSpan=1>&nbsp;图表类型</TD>\n" : '';
	$ModelArray = array("add","edit");
	in_array($GlobalModel,$ModelArray) ? print "<TD class=TableContent align=left colSpan=1>&nbsp;是否空值</TD>\n" : '';
	print "<TD class=TableContent align=left colSpan=1>&nbsp;字段排序/可写权限</TD>\n";
	print "<TD class=TableContent align=left colSpan=1>&nbsp;字段属性</TD>\n";
	print "</TR>";
	$showlistfieldlist = $sectionArray['showlistfieldlist'];
	$showlistfieldlistArray = explode(',',$showlistfieldlist);
	$listKeys = array_keys($showlistfieldlistArray);
	$listValues = array_values($showlistfieldlistArray);
	$list_keys_values = array_keys_values($showlistfieldlistArray);
	//$showlistfieldlistArrayReverse = array_reverse($showlistfieldlistArray);
	//print_R($showlistfieldlistArrayReverse);
	//字段空值表
	$showlistnull = $sectionArray['showlistnull'];
	$showlistnullArray = explode(',',$showlistnull);
	//字段过滤表
	$showlistfieldfilter = $sectionArray['showlistfieldfilter'];
	$showlistfieldfilterArray = explode(',',$showlistfieldfilter);
	//字段过滤表
	$showlistfieldtype = $sectionArray['showlistfieldtype'];
	$showlistfieldtypeArray = explode(',',$showlistfieldtype);
	//字段可写权限
	$showlistfieldprivate = $sectionArray['showlistfieldprivate'];
	$showlistfieldprivateArray = explode(',',$showlistfieldprivate);

	$Tablename = $_GET['Tablename'];
	//空值信息设定
	$radio_array = array("空值"=>"null","非空"=>"notnull");
	//统计图表类型设定
	$radio_statistics = array("饼图"=>"pieF","横柱图"=>"hBarF","竖柱图"=>"vBarF");
	//统计区为可选项条件性判断
	$FILTER_ARRAY = array("tablefilter","tablefiltercolor","radiofilter");
	//字段启用设定
	$radio_boolean = array("开"=>"1","关"=>"0");
	//搜索信息设定
	$action_search = $sectionArray['action_search'];
	$action_searchArray = explode(',',$action_search);
	$radio_search = array("搜索"=>"1","禁用"=>"0");

	//print_R($file_ini);

	//高级搜索设定
	$exportadv_default_section = $file_ini['exportadv_default'];
	$showlistfieldlist_section = $exportadv_default_section['showlistfieldlist'];
	$showlistfieldfilter_section = $exportadv_default_section['showlistfieldfilter'];
	$action_search_advArray = explode(',',$showlistfieldlist_section);
	$radio_search_adv = array("高级搜索"=>"1","禁用"=>"0");

	//分组信息设定
	$group_filter = $sectionArray['group_filter'];
	$group_filterArray = explode(',',$group_filter);
	$newGroupArray = array();
	$IsGroupArrayHidden = array();
	for($i=0;$i<sizeof($group_filterArray);$i++)		{
		$tempArray = explode(":",$group_filterArray[$i]);
		$tempArray_INDEX = $tempArray[0];
		if($tempArray[4]=="")		{
			$GroupFilterArrayADD[$tempArray_INDEX] = $tempArray[1].":".$tempArray[2].":".$tempArray[3];
		}
		else	{
			$GroupFilterArrayADD[$tempArray_INDEX] = $tempArray[1].":".$tempArray[2].":".$tempArray[3].":".$tempArray[4];
		}
		//print_R($tempArray);
		if(isset($tempArray[0]))		{
			array_push($newGroupArray,$tempArray[0]);
		}
		if(isset($tempArray[4]))		{
			array_push($IsGroupArrayHidden,$tempArray[0]);
		}
		//print_R($newGroupArray);
	}
	$radio_group = array("分组"=>"1","禁用"=>"0");//print_R($newGroupArray);
	//权限部门供述
	print "<input type=hidden name=departprivte value=".$sectionArray['departprivte'].">";
	//字段信息设定
	global $html_etc;
	for($i=0;$i<sizeof($columns);$i++)			{
		$columnName = $columns[$i];
		$indexName = $html_etc[$Tablename][$columnName];
		$listIndex = $list_keys_values[$i];
		$nullIndex = $showlistnullArray[$listIndex];
		$filterIndex = $showlistfieldfilterArray[$listIndex];
		$typeIndex = $showlistfieldtypeArray[$listIndex];
		$privateIndex = $showlistfieldprivateArray[$listIndex];
		print "<TR><TD class=TableContent align=left colSpan=1 nowrap>";
		print $i.".".$indexName."[".$columnName."]";
		print "</TD><TD class=TableContent align=left colSpan=1 nowrap>\n";
		//select_array($array,$columnName,$columnValue);
		//print "<input type=text name=".$columnName."_list class=SmallInput size=15 value=".$columnName.">";
		if(in_array($i,$showlistfieldlistArray))		{
			$boolean = 1;
			$readonly = "";
			$inputClass = "SmallInput";
		}
		else			{
			$boolean = 0;
			$readonly = "";
			$inputClass = "SmallStatic";
		}
		if(in_array($i,$action_searchArray)&&$boolean==1)
			$boolean_search = 1;
		else
			$boolean_search = 0;

		if(in_array($i,$action_search_advArray)&&$boolean==1)
			$boolean_search_adv = 1;
		else
			$boolean_search_adv = 0;

		//print_R($newGroupArray);
		if(in_array($i,$newGroupArray)&&$boolean==1)
			$boolean_group = 1;
		else
			$boolean_group = 0;

		//print_R($IsGroupArrayHidden);
		if(in_array($i,$IsGroupArrayHidden)&&$boolean==1)
			$boolean_hidden = 1;
		else
			$boolean_hidden = 0;


		//统计字段开启数据初始化组
		$filterIndexArray = explode(':',$filterIndex);
		if($GlobalModel=="statistics")							{
			if(in_array($filterIndexArray[0],$FILTER_ARRAY))	{
				$boolean = 1;
			}
			else	{
				$boolean = 0;
			}
		}

		//字段开启信息
		//radio_array($radio_boolean,$columnName."_boolean",$boolean,"onclick",$i);

		if($boolean)	{
			$boolean_checked_boolean = "checked";
		}
		else	{
			$boolean_checked_boolean = '';
		}
		print "<input type=checkbox name=".$columnName."_boolean  $boolean_checked_boolean/> <font color=green>启用</font>";


		//构建Radio函数
		print "<script>\n";
		print "function onClickUser_".$i."_1()	{\n";
		if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "	document.form1.".$columnName."_null.disabled = true;\n";
		}//空值判断
		//if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "	document.form1.".$columnName."_filter.disabled = true;\n";
		//}//过滤判断
		//if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "	document.form1.".$columnName."_select.disabled = true;\n";
		//}//
		if($GlobalModel=="init")		{
			print "	document.form1.".$columnName."_search.disabled = true;\n";
			print "	document.form1.".$columnName."_group.disabled = true;\n";
		}
		print "}\n";
		print "function onClickUser_".$i."_0()	{\n";
		if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "	document.form1.".$columnName."_null.disabled = false;\n";
		}
		//if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "	document.form1.".$columnName."_filter.disabled = false;\n";
		//}
		//if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "	document.form1.".$columnName."_select.disabled = false;\n";
		//}
		if($GlobalModel=="init")		{
			print "	document.form1.".$columnName."_search.disabled = false;\n";
			print "	document.form1.".$columnName."_group.disabled = false;\n";
		}
		print "}\n";
		print "</script>\n";

		print "</TD>\n";

		//搜索信息设定
		if($GlobalModel=="init")		{
			print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
			//radio_array($radio_search,$columnName."_search",$boolean_search);
			if($boolean_search)	{
				$boolean_checked_search = "checked";
			}
			else	{
				$boolean_checked_search = '';
			}
			print "<input type=checkbox name=".$columnName."_search  $boolean_checked_search/> <font color=green>搜索</font>";
			print "</TD>\n";
		}

		//高级搜索设定
		if($GlobalModel=="init")		{
			print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
			//radio_array($radio_search,$columnName."_search",$boolean_search);
			if($boolean_search_adv)	{
				$boolean_checked_search_adv = "checked";
			}
			else	{
				$boolean_checked_search_adv = '';
			}
			print "<input type=checkbox name=".$columnName."_search_adv  $boolean_checked_search_adv/> <font color=gray>高级搜索</font>";
			print "</TD>\n";
		}

		//分组信息设定
		if($GlobalModel=="init")		{
			//print_R($boolean_group);
			print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
			//radio_array($radio_group,$columnName."_group",$boolean_group);
			if($boolean_group)	{
				$boolean_checked_group = "checked";
			}
			else	{
				$boolean_checked_group = '';
			}
			print "<input type=checkbox name=".$columnName."_group  $boolean_checked_group/> <font color=red>分组</font>";
			if($boolean_hidden==1)	{
				$boolean_checked_hidden = "checked";
			}
			else	{
				$boolean_checked_hidden = '';
			}
			//print_R($filterIndexArray);
			if($filterIndexArray[0]=="userdefine")		{
				$分组是否被重定义 = "";
			}
			else		{
				$分组是否被重定义 = "";
			}
			//print_R($GroupFilterArrayADD);
			if($GroupFilterArrayADD[$i]!="")			{
				$GROUP_FILTER_TEXT = $GroupFilterArrayADD[$i];
			}
			else	{
				$GROUP_FILTER_TEXT = "";
			}
			print "<input type=checkbox name=".$columnName."_hidden $boolean_checked_hidden/> <font color=green title='$GROUP_FILTER_TEXT'>隐藏$GROUP_FILTER_TEXT</font>";
			print "<input type=hidden name=".$columnName."_hidden_group_filter value='$GROUP_FILTER_TEXT'/>";

			print "</TD>\n";
		}

		//统计信息设定

		if($GlobalModel=="statistics")		{
			print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
			//if(in_array($filterIndexArray[0],$FILTER_ARRAY))		{
				radio_array($radio_statistics,$columnName."_type",$typeIndex);
			//}
			print "</TD>\n";
		}


		//空值信息设定 限定此信息是否显示。
		if($nullIndex=="notnull")
			$NullValue = 1;
		else
			$NullValue = 0;
		$ModelArray = array("add","edit");
		if($GlobalModel=="add"||$GlobalModel=="edit")	{
			print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
			Checkbox_One("不允许空值",$columnName."_null",$NullValue,$boolean);
			print "</TD>";
		}

		//字段排序
		print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
		print "<input type=text name=".$columnName."_Order class=$inputClass size=5 value=".$list_keys_values[$i]."> ";
		//可写权限
		print "<input type=text name=".$columnName."_private class=$inputClass size=5 value=".$privateIndex."> ";
		print "</td>";

		//空值信息限制信息结束
		print "<TD class=TableContent align=left colSpan=1 nowrap>\n";
		print "<input type=text name=".$columnName."_filter $readonly class=$inputClass size=20 value=".$filterIndex."> ";
		global $SYSTEM_MODE_DIR;
		print "
		<script Language=\"JavaScript\">
		function LoadWindow_$columnName()
		{
			URL=\"LoadWindowsFrame.php?action=Detail&parentName=".$columnName."_filter&sectionName=input&SYSTEM_MODE=".$SYSTEM_MODE_DIR."\";
			loc_x=250;
			loc_y=150;
  			window.showModalDialog(URL,self,\"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:570px;dialogHeight:550px;dialogTop:\"+loc_y+\"px;dialogLeft:\"+loc_x+\"px\");
		}
		</script>
			";
		print "<input type=button name = ".$columnName."_select onclick='LoadWindow_$columnName();' class=SmallButton value=选择>";
		print "</td></TR>";
	}
	print "</table>";
}

function array_keys_values($array)		{
	$keys = array_keys($array);
	$values = array_values($array);
	$newArray = array();
	for($i=0;$i<sizeof($values);$i++)	{
		$newArray[(String)$values[$i]] = $keys[$i];
	}
	return $newArray;
}

//RADIO FUNCTION
function radio_array($array,$name,$value,$onClick="",$m = "0")			{
	$array_keys = array_keys($array);
	$array_values = array_values($array);
	if(!in_array($value,$array)&&$value!="")		{
		array_push($array_keys,$value);
		array_push($array_values,$value);
	}
	$valueArray = explode(":",$value);
	$value2 = $valueArray[0];
	for($i=0;$i<sizeof($array_keys);$i++)		{
		//第一次过滤
		//if($array_values[$i]==$value2)		{
		//	$checked = "checked";

		//}
		//else		{
			//$checked = "";
		//}
		//第二次过滤
		if($array_values[$i]==$value)		{
			$checked = "checked";

		}
		else		{
			$checked = "";
		}

		if($onClick!="")		{
			$onClickText = "onclick=\"onClickUser_".$m."_".$i."();\"";
			//$nameText = $name;
		}
		else	{
			//$nameText = $name."_".$i;
		}
		print "<input $onClickText type=radio name=\"$name\" $checked value=\"".$array_values[$i]."\">".$array_keys[$i]."";
	}
}


//Checkbox FUNCTION
function Checkbox_One($Text,$name,$value,$disabled=0)			{

		if($value==1)
			$checked = "checked";
		else
			$checked = "";

		if($disabled==0)
			$disabled = "disabled";
		else
			$disabled = "";
		//print "<script>\n";
		//print "function Checkbox_Input".$name."()	{\n";
		//print "	document.form1.".$name.".disabled = false;\n";
		//print "}\n";
		//print "</script>\n";
		//print "<input type=hidden name=$name>";
		print "<input type=Checkbox name=\"$name\" $checked $disabled >".$Text."";
		//onClick=\"Checkbox_Input".$name."('$name')\"
}

function Checkbox_array2($array,$name,$value)				{
	global $html_etc;//print_R($html_etc);
	global $Tablename;
	//print $Tablename;
	$array_keys = array_keys($array);
	$array_values = array_values($array);
	for($i=0;$i<sizeof($array_keys);$i++)				{
		$valueArray = explode(',',$value);
		//过滤指定权限信息文字形成
		switch($name)								{
			case 'action_model':
				$ValueArray2 = explode(':',$valueArray[$i]);
				if(sizeof($ValueArray2)>3)		{
					array_pop($ValueArray2);
					$RealValue = $valueArray[$i];
					$valueArray[$i] = join(':',$ValueArray2);
				}
				else	{
					$RealValue = $array_values[$i];
				}
				break;
			default:
				$RealValue = $array_values[$i];
				break;
		}
		//判断是否为CHECKED
		if(in_array($array_values[$i],$valueArray))
			$checked = "checked";
		else
			$checked = "";
		print "&nbsp;$i <input type=Checkbox name=\"".$name."_$i\" $checked value=\"".$RealValue."\">".$html_etc[$Tablename][(string)$array_keys[$i]]."<BR>";
		//if($i%5==0&&$i>1)		print "<BR>";
	}
}

//Checkbox FUNCTION
function Checkbox_array($array,$name,$value)				{
	$array_keys = array_keys($array);
	$array_values = array_values($array);
	for($i=0;$i<sizeof($array_keys);$i++)				{
		$valueArray = explode(',',$value);
		//过滤指定权限信息文字形成
		switch($name)								{
			case 'action_model':
				$ValueArray2 = explode(':',$valueArray[$i]);
				if(sizeof($ValueArray2)>3)		{
					array_pop($ValueArray2);
					$RealValue = $valueArray[$i];
					$valueArray[$i] = join(':',$ValueArray2);
				}
				else	{
					$RealValue = $array_values[$i];
				}
				break;
			default:
				$RealValue = $array_values[$i];
				break;
		}
		//判断是否为CHECKED
		if(in_array($array_values[$i],$valueArray))
			$checked = "checked";
		else
			$checked = "";
		print "<input type=Checkbox name=\"".$name."_$i\" $checked value=\"".$RealValue."\">".$array_keys[$i]."";
		if($i%5==0&&$i>1)		print "<BR>";
	}
}

//returnCheckboxValue
function returnCheckboxValue($TempAction)			{
global $_POST,$ArrayGroup,$section;
if($_POST[$TempAction."_0"] != ""||$_POST[$TempAction."_1"] != ""||$_POST[$TempAction."_2"] != ""||$_POST[$TempAction."_3"] != ""||$_POST[$TempAction."_4"] != ""||$_POST[$TempAction."_5"] != ""||$_POST[$TempAction."_6"] != ""||$_POST[$TempAction."_7"] != ""||$_POST[$TempAction."_8"] != ""||$_POST[$TempAction."_9"] != ""||$_POST[$TempAction."_10"] != ""||$_POST[$TempAction."_11"] != ""||$_POST[$TempAction."_12"] != ""||$_POST[$TempAction."_13"] != ""||$_POST[$TempAction."_14"] != ""||$_POST[$TempAction."_15"] != ""||$_POST[$TempAction."_16"] != ""||$_POST[$TempAction."_17"] != ""||$_POST[$TempAction."_18"] != ""||$_POST[$TempAction."_19"] != ""||$_POST[$TempAction."_20"] != ""||$_POST[$TempAction."_21"] != "")				{
		$TempArray = array();
		for($i=0;$i<10;$i++)						{
			if($_POST[$TempAction."_".$i]!="")		{
				array_push($TempArray,$_POST[$TempAction."_".$i]);
			}//end if
		}//end for
		sizeof($TempArray)>0?$TempText = join(',',$TempArray):'';
	}//end if
	return $TempText;
}//end function

//SELECT FUNCTION
function select_array($array,$name,$value)			{
	$array_keys = array_keys($array);
	$array_values = array_values($array);
	if(!in_array($value,$array))		{
		array_push($array_keys,$value);
		array_push($array_values,$value);
	}
	print "<select class='SmallSelect' name='$name' onkeydown='if(event.keyCode==13)event.keyCode=9' >
";
	for($i=0;$i<sizeof($array_keys);$i++)		{
		$valueArray = explode(',',$value);
		if(in_array($array_values[$i],$valueArray))
			$selected = "selected";
		else
			$selected = "";
		print "<option value=".$array_values[$i]." $selected>".$array_keys[$i]."</option>";
	}
	print "</select>";
}






?>