<?
function newai_import($fields,$mode='table')		{
	global $common_html,$html_etc;
	global $return_sql_line,$db;
	global $columns;//print_R($columns);
	global $showlistfieldlist,$showlistfieldlist_key;
	global $foreignkey,$uniquekey,$primarykey;
	$tablename=$fields['table']['name'];
	$SQL=$fields['sql']['SQL'];
	$init=explode('_',$_GET['action']);
	$mark=$init[1];
	if($uniquekey=='') $uniquekey = $primarykey;
	//print $uniquekey;


print "<FORM name=form1 action=\"?action=import_".$mark."_data\" method=post encType=multipart/form-data>\n";
print "<input type=hidden name=hidden_str value=''>\n";
print "<script >";
print "
function temp_function()
	{

	selectid_str=\"\";/*
	for(i=0;i<document.all(\"selectid\").length;i++)
		{

		el=document.all(\"selectid\").item(i);
		if(el.checked)
		{  val=el.value;
         selectid_str+=val + \",\";
		}
	}*/
	form1.hidden_str.value=selectid_str;
	form1.submit();
	}
";
print "</script>";
global $tablewidth,$primarykey,$primarykey_index;
$tablewidth=$tablewidth!=""?$tablewidth:450;
table_begin($tablewidth);
print_title("数据导入操作,请选择表唯一主KEY,不能重复的字段",3);
//print_R($common_html['common_html']['contentimport']);

if($foreignkey!="")			{
$foreignkey_array=explode(':',$foreignkey);
$columns_parent=returntablecolumn($foreignkey_array[1]);
print_R($columns_parent);
print_select('选择考试名称',$columns[(string)$foreignkey_array[3]],$value,$foreignkey_array[1],$columns_parent[(string)$foreignkey_array[3]],$columns_parent[(string)$foreignkey_array[2]],$colspan=3,$columns_parent[(string)$foreignkey_array[4]]);
print_hidden($columns[(string)$foreignkey_array[3]],'foreignkey');
}

print "<TR class=TableData>\n";
print "<TD noWrap align=middle width=50>主键:</TD>\n";
print "<TD colspan=2>";
$uniquekey_array=explode(',',$uniquekey);
$FieldList = array();
for($i=0;$i<sizeof($uniquekey_array);$i++)		{
	$uniquekey_KEY		=	$uniquekey_array[$i];
	if($uniquekey_KEY!="")						{
		$uniquekey_KEY_ADD	=	explode(':',$uniquekey_KEY);
		if($uniquekey_KEY_ADD[1]=="userid")			{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""]."(自动生成)";
		}
		else if($uniquekey_KEY_ADD[1]=="username")		{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""]."(自动生成)";
		}
		else if($uniquekey_KEY_ADD[1]=="datetime")		{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""]."(自动生成)";
		}
		else	{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""];
		}
	}

}
//print_R($uniquekey_array);
//输出不较验主键时的选择列表
$唯一字段显示文本		=	join(',',$FieldList);
print $唯一字段显示文本;
print "</TD>\n";
print "</TR>\n";


	global $importgroup;
	if($importgroup!="")				{
		//print $importgroup;
		print_title('选择要导入的组',3);
		$importgroupArray = explode(':',$importgroup);
		$showfieldIndex = $importgroupArray[0];
		$showFieldName = $columns[$showfieldIndex];
		$showfieldTableName = $importgroupArray[1];
		$showfieldColumns = returntablecolumn($showfieldTableName);
		$showfieldIndexValue = $importgroupArray[2];
		$showfieldIndexName = $importgroupArray[3];
		$showfieldIndexValue = $showfieldColumns[$showfieldIndexName];
		$showfieldIndexName = $showfieldColumns[$showfieldIndexName];
		print_select('选择要导入的组：',$showFieldName,$value='',$showfieldTableName,$showfieldIndexValue,$showfieldIndexName,$colspan=2,$setfieldname='',$setfieldvalue='',$setfieldboolean='');
	}

	print_title('导入EXCEL格式数据文件,请您直接从导出功能模块下载导入模板',3);
	print "<TR class=TableData height=50>\n";
	print "<TD noWrap align=middle >EXCEL格式文件</TD>\n";
	print "<TD colspan=2><input name='uploadfileXLS' type=file size=25 class=SmallInput></TD>\n";
	print "</TR>\n";

	//print_title('导入CSV格式数据文件',3);
	//print "<TR class=TableData height=50>\n";
	//print "<TD noWrap align=middle >MS CSV文件</TD>\n";
	//print "<TD colspan=2><input name='uploadfile' type=file size=25 class=SmallInput></TD>\n";
	//print "</TR>\n";



	print "<tr align=\"center\" class=\"TableControl\">\n<td colspan=\"3\">\n<div align=\"center\"><input type=\"button\" value=\"".$common_html['common_html']['import']."\" class=\"SmallButton\" onClick=\"temp_function();\">　　<input type=\"button\" value=\"".$common_html['common_html']['return']."\" class=\"SmallButton\" onClick=\"history.back();\"></div>\n</td></tr>\n";


	table_end();
	form_end();
	print "<BR>";
	table_begin($tablewidth);
	print_title("EXCEL格式数据正确但导入失败时,请按以下方法进行:");
	print "<TR class=TableData height=50>\n";
	print "<TD colspan=3><font color=green>
	如何过滤EXCEL里面的格式,转化为纯净的EXCEL数据格式文件:<BR>

	&nbsp;&nbsp;1 准备好原始格式数据文件<BR>
	&nbsp;&nbsp;2 新建一个EXCEL文件,即空白文件<BR>
	&nbsp;&nbsp;3 工具栏选择数据->导入外部数据->导入数据,弹出的对话框里面,选择第一步准备好的原始文件<BR>
	&nbsp;&nbsp;4 其它不要动,一切按默认的方法进行操作<BR>
	&nbsp;&nbsp;5 即可得到纯净的EXCEL数据格式文件,把这个文件进行导入即可<BR>
	&nbsp;&nbsp;注意:这种方法只用于解决,数据列数及列名正确,但软件无法识别的情况<BR>
	</font>
	\n";
	print "</TD></TR>\n";
	table_end();
	form_end();
}



function newai_import_CSV($Columns)				{
	global $_FILES,$_POST,$_GET,$db;
	global $showlistfieldlist,$showlistfieldfilter;
	global $common_html,$html_etc;
	global $return_sql_line,$db;
	global $columns;//print_R($columns);
	global $showlistfieldlist,$showlistfieldlist_key;
	global $foreignkey,$showFieldName,$tablename;
		if(is_uploaded_file($_FILES['uploadfile']['tmp_name']))			{
				$uploadfile_self=$_FILES['uploadfile']['tmp_name'];
				$uploadfile_name=$_FILES['uploadfile']['name'];
				$checkFileType = substr($uploadfile_name,-3);
				if($checkFileType!="csv")	{
					print_nouploadfile("你上传的不是CSV格式的文件!");
					exit;
				}
				if(!is_dir("FileCache")) mkdir("FileCache");
				$uploadfile_name = "FileCache/".$uploadfile_name;
				$TempFile = $uploadfile_name;
				copy($_FILES['uploadfile']['tmp_name'],$uploadfile_name);
				$file=file($TempFile);

				$first_row=trim($file[0]);
				$first_row_array=explode(',',$first_row);//导入数据中字段列表
				for($iii=0;$iii<sizeof($first_row_array);$iii++)	{
					$first_row_array[$iii] = TRIM($first_row_array[$iii]);
				}
				$first_row_array_keys=array_keys($first_row_array);
				$first_row_array_values=array_values($first_row_array);
				//列行检测
				for($i=0;$i<sizeof($first_row_array_keys);$i++)			{
					$first_row_array_new[$first_row_array_values[$i]]=$first_row_array_keys[$i];
				}
				$primarykey_index_num=$first_row_array_new[$_POST[primarykey]];

				//print_R($first_row_array);


				//得到字段过滤信息列表
				$newstring=array();
				$showlistfieldlistArray=explode(',',$showlistfieldlist);
				$showlistfieldfilterArray=explode(',',$showlistfieldfilter);
				$ColumnsReverse = array_flip($columns);
				$showlistfieldlist_keyArrayReverse = array_flip($showlistfieldlistArray);
				//可以允许导入的列表
				for($i=0;$i<sizeof($showlistfieldlistArray);$i++)		{
					if($showlistfieldlistArray[$i]!='')		{
						$ElementTableField = $showlistfieldlistArray[$i];
						$ElementFieldName = $Columns[$ElementTableField];
						array_push($newstring,$ElementFieldName);
						}
				}
				//求得共同值
				//print_R($newstring);
				$result = array_intersect ($newstring, $first_row_array);
				//print_R($result);
				$newstring_text=join(',',$newstring);
				//print_R($newstring_text);

				page_css('数据导入');
				//table_begin(500);
				//数据行检测
				$Insert_RIGHT = 0;
				$Insert_ERROR = 0;
				$Update_RIGHT = 0;
				$Update_ERROR = 0;
				$primarykey = $_POST['primarykey'];
				for($i=1;$i<sizeof($file);$i++)			{
					$line_array=explode(',',trim($file[$i]));
					//print_R($line_array);
					$line_array_text=join("','",$line_array);
					$newline_array=array();
					//以前的SIZEOF用的是line_array变量，后变为first_row_array，用于对应一些没有发生的变化
					for($j=0;$j<sizeof($first_row_array);$j++)		{
						$primarykey_values = $line_array[$primarykey_index_num];
						$primarykey_values = addslashes($primarykey_values);
						$ColumnName=$first_row_array[$j];
						$in_array=in_array($ColumnName,$result);
						if($in_array)		{
							//过滤'"'之类的字符 -htmlentitiesUser
							//字段名称
							$Field_Insert_Name = trim($first_row_array[$j]);//字段名称
							//得到字段名称索引
							$getFieldNumberofTable = $ColumnsReverse[$Field_Insert_Name];
							//得到字段名称索引的数据排位置
							$showlistfieldlistArrayFlip = array_flip($showlistfieldlistArray);
							$getImportKeyIndex = $showlistfieldlistArrayFlip[$getFieldNumberofTable];
							//获取该字段类型如TableFilter过滤类型
							$getImportKeyFilter = $showlistfieldfilterArray[$getImportKeyIndex];
							//通过过滤信息文本找到相应的原始字段
							$getImportKeyFilterArray = explode(':',$getImportKeyFilter);
							//print "Field_Insert_Name:$Field_Insert_Name<BR>";
							//print "getFieldNumberofTable:$getFieldNumberofTable<BR>";
							//print "getImportKeyIndex:$getImportKeyIndex<BR>";
							//print "getFieldNumberofTable:$getFieldNumberofTable<BR>";
							//print "getImportKeyFilter:$getImportKeyFilter<BR>";
							//print_R($showlistfieldlistArrayFlip);print "<BR>";
							switch($getImportKeyFilterArray[0])		{
								case 'tablefilter':
									$ImportKeycolumns=returntablecolumn($getImportKeyFilterArray[1]);
									$ImportFieldCode = $ImportKeycolumns[(String)$getImportKeyFilterArray[2]];
									$ImportFieldName = $ImportKeycolumns[(String)$getImportKeyFilterArray[3]];
									$ResultFieldCode = returntablefield($getImportKeyFilterArray[1],$ImportFieldName,$line_array[$j],$ImportFieldCode);
									//print $getImportKeyFilterArray[1]."<BR>";
									//print $ImportFieldName."<BR>";
									//print $line_array[$j]."<BR>";
									//print $ImportFieldCode."<BR>";
									if($ResultFieldCode=="") $ResultFieldCode = $line_array[$j];
									break;
								default:
									$ResultFieldCode = $line_array[$j];
									break;
							}
							//用于过滤组选项的变量
							$choice_index = $first_row_array[$j];
							if($showFieldName==$choice_index)		{
								//print $ResultFieldCode = $_POST[$showFieldName];
							}
							//分析结束
							array_push($newline_array,htmlentitiesUser($ResultFieldCode));
							//当字段与主KEY相同时,不在更新表中出现
							if($first_row_array[$j]!=$primarykey)		{
								//print $primarykey;
								$update_sql[$j] = $first_row_array[$j]."='".htmlentitiesUser($ResultFieldCode)."'";
							}
						}
					}
					//print_R($update_sql);
					$update_sql_text="update $tablename set ".join(',',$update_sql)." where ".$primarykey."='$primarykey_values'";//print "<BR>";

					$insert_sql_text="insert into ".$tablename."(".join(',',$result).") values('".join("','",$newline_array)."')";//print $update_sql_text."<BR>";exit;

					$exists_sql_text="select count($primarykey) as num from $tablename where $primarykey='$primarykey_values'";//print "<BR>";

					//print $exists_sql_text;
					$rs=$db->Execute($exists_sql_text);
					$rs_a = $rs->GetArray();
					//page_css('数据导入');
					//table_begin(500);
					//print "<tr align=\"center\" class=\"TableData\">\n<td colspan=\"3\" noWrap>\n<div align=\"left\">";
					if($rs_a[0]['num']==0)		{
						if($_POST['exists']==1)		{
							$rs = $db->Execute($insert_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Insert_RIGHT += 1;
							else			$Insert_ERROR += 1 ;
							//insert_sql_text
							//print "<font color=green>编号1".$insert_sql_text." 的数据：导入成功<BR></font>";
							//print "&nbsp;&nbsp;";
						}
						else	{
							//$Insert_Not
							//print "<font color=green>编号2".$insert_sql_text." 的数据：没有导入<BR></font>";
						}
					}
					else		{
						if($_POST['update']==1)		{
							$db->Execute($update_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Update_RIGHT += 1;
							else			$Update_RIGHT += 1 ;
							//print "<font color=blue>编号3".$update_sql_text."<BR></font>";
						}
						else	{
							$Update_NOT += 1 ;
							//print "<font color=blue>编号4".$update_sql_text.". 的数据：没有更新<BR></font>";
						}
					}
					//print "</TD></TR>\n";
					//table_end();
				}
				//table_end();
				//导入数据结果较验
				$Insert_Text = "新增数据成功:{$Insert_RIGHT} 条 失败:{$Insert_ERROR} 条 <BR>更新数据成功:{$Update_RIGHT} 条 失败:{$Update_ERROR} 条";

				print "
				<style type='text/css'>.style1 {
				color: #FFFFFF;
				font-weight: bold;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 14px;
				}
				</style>
				<BR><BR>
				<table width='450'  border='0' align='center' cellpadding='0' cellspacing='0' class='small' style='border:1px solid #006699;'>
				<tr><td height='110' align='middle' colspan=2  bgcolor='#E0F2FC'>
				<font color=red >".$common_html['common_html']['importsuccess']."<BR><BR>$Insert_Text<BR><BR><input type=button accesskey='c' name='cancel' value=' 点击返回 ' class=SmallButton onClick='history.back();' title='快捷键:ALT+c'></font>
				</td></tr><tr></table>";
				//print "<META HTTP-EQUIV=REFRESH CONTENT='$SYSTEM_SECOND;URL=?action=init_default'>\n";
				//print_infor($common_html['common_html']['importsuccess'],'trip',"location='?action=init_default'",'?action=init_default');
				@unlink($TempFile);
				exit;
				}
				else			{

					//print "ERROR!";
					print_nouploadfile();
				}
}



function newai_import_XLS($Columns)				{
	global $_FILES,$_POST,$_GET,$db;
	global $showlistfieldlist,$showlistfieldfilter;
	global $common_html,$html_etc;
	global $return_sql_line,$db;
	global $columns;//print_R($columns);
	global $showlistfieldlist,$showlistfieldlist_key;
	global $foreignkey,$showFieldName,$tablename;
	$IsDoSQL = 1; //默认情况下面为执行这方面的操作


	//唯一性判断
	global $uniquekey,$primarykey;
	if($uniquekey=='') $uniquekey = $primarykey;
	$uniquekey_array=explode(',',$uniquekey);
	$FieldList = array();
	$唯一性判断字段列表 = array();
	$唯一性判断字段列表[] = " 1=1 ";
	for($i=0;$i<sizeof($uniquekey_array);$i++)		{
		$uniquekey_KEY			=	$uniquekey_array[$i];
		if($uniquekey_KEY!="")						{
			$uniquekey_KEY_ADD	=	explode(':',$uniquekey_KEY);
			if($uniquekey_KEY_ADD[1]=="userid")				{
				$用户默认值				=	$columns["".$uniquekey_KEY_ADD[0].""];
				$用户默认值NOCHECK		=	$uniquekey_KEY_ADD[2];
				$唯一性判断字段列表USERIDNAME['USERID']	=	$columns["".$uniquekey_KEY_ADD[0].""];
			}
			else if($uniquekey_KEY_ADD[1]=="username")		{
				$用户默认值NAME			=	$columns["".$uniquekey_KEY_ADD[0].""];
				$用户默认值NAMENOCHECK	=	$uniquekey_KEY_ADD[2];
				$唯一性判断字段列表USERIDNAME['USERNAME']	=	$columns["".$uniquekey_KEY_ADD[0].""];

			}
			else if($uniquekey_KEY_ADD[1]=="datetime")		{
				$时间默认值				=	$columns["".$uniquekey_KEY_ADD[0].""];
				$时间默认值NOCHECK		=	$uniquekey_KEY_ADD[2];
			}
			else	{
				$唯一性判断字段列表[]	=	$columns["".$uniquekey_KEY_ADD[0].""];
			}
		}

	}

		if(is_uploaded_file($_FILES['uploadfileXLS']['tmp_name']))			{
				$uploadfile_self=$_FILES['uploadfileXLS']['tmp_name'];
				$uploadfile_name=$_FILES['uploadfileXLS']['name'];
				$checkFileType = substr($uploadfile_name,-3);
				if($checkFileType!="xls")	{
					print_nouploadfile("你上传的不是EXCEL格式的文件!");
					exit;
				}
				//print $checkFileType;exit;
				if(!is_dir("FileCache")) mkdir("FileCache");
				$uploadfile_name = "FileCache/".$uploadfile_name;
				copy($_FILES['uploadfileXLS']['tmp_name'],$uploadfile_name);

				if(is_file("../../PHPExcelParser4/readExcel.php"))	{
					require_once "../../PHPExcelParser4/readExcel.php";
				}
				else if(is_file("../DANDIAN/PHPExcelParser4/readExcel.php"))	{
					require_once "../DANDIAN/PHPExcelParser4/readExcel.php";
				}
				else {
					require_once "../PHPExcelParser4/readExcel.php";
				}
				$a = new ReadExcel($uploadfile_name);
				$tmp = $a->read();

				//按列读取的数据,转换为按行读取的数据
				$MainData = $tmp[0];
				$ColumnNumber = sizeof(array_values($MainData));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ColumnArray = $MainData[$i];
					//print_R($ColumnArray);
					for($ii=0;$ii<sizeof($ColumnArray);$ii++)			{
						$ContentText[$ii][$i] = $ColumnArray[$ii];
						$ContentText[$ii][$i] = str_replace(",","，", $ContentText[$ii][$i]);
					}
				}
				//重新生成文本
				$ColumnNumber = sizeof(array_keys($ContentText));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ContentArray = $ContentText[$i];
					$ContentTextArray[] = join(',',$ContentArray);
					//print_R($ContentArray);
				}

				//print_r($ContentTextArray);
				//exit;

				//数据对接区
				$file = $ContentTextArray;

				//#######################################################################################
				//以下为CSV格式处理区,共同使用代码区
				//#######################################################################################

				$first_row=trim($file[0]);
				$first_row_array=explode(',',$first_row);//导入数据中字段列表
				for($iii=0;$iii<sizeof($first_row_array);$iii++)	{
					$first_row_array[$iii] = TRIM($first_row_array[$iii]);
				}
				$first_row_array_keys=array_keys($first_row_array);
				$first_row_array_values=array_values($first_row_array);
				//列行检测
				for($i=0;$i<sizeof($first_row_array_keys);$i++)			{
					$first_row_array_new[$first_row_array_values[$i]]=$first_row_array_keys[$i];
				}
				$primarykey_index_num=$first_row_array_new[$_POST[primarykey]];

				//print_R($first_row_array);


				//得到字段过滤信息列表
				$newstring=array();
				$showlistfieldlistArray=explode(',',$showlistfieldlist);
				$showlistfieldfilterArray=explode(',',$showlistfieldfilter);
				$ColumnsReverse = array_flip($columns);
				$showlistfieldlist_keyArrayReverse = array_flip($showlistfieldlistArray);
				//可以允许导入的列表
				for($i=0;$i<sizeof($showlistfieldlistArray);$i++)		{
					if($showlistfieldlistArray[$i]!='')		{
						$ElementTableField = $showlistfieldlistArray[$i];
						$ElementFieldName = $Columns[$ElementTableField];
						array_push($newstring,$ElementFieldName);
						}
				}
				//求得共同值
				//print_R($newstring);
				$result = array_intersect ($newstring, $first_row_array);
				//print_R($result);
				$newstring_text=join(',',$newstring);
				//print_R($newstring_text);

				//print_R($用户默认值);exit;
				//对插入语句部分进行用户和时间检测 2010-10-10
				if(!in_array($用户默认值,$result)&&$用户默认值!="")			{
					$result[] = $用户默认值;
					//
				}
				if(!in_array($用户默认值NAME,$result)&&$用户默认值NAME!="")			{
					$result[] = $用户默认值NAME;
					//
				}
				if(!in_array($时间默认值,$result)&&$时间默认值!="")			{
					$result[] = $时间默认值;
					//
				}

				//print_R($result);
				page_css('数据导入');
				//table_begin(500);
				//数据行检测
				$Insert_RIGHT = 0;
				$Insert_ERROR = 0;
				$Update_RIGHT = 0;
				$Update_ERROR = 0;
				$primarykey = $_POST['primarykey'];

				for($i=1;$i<sizeof($file);$i++)			{
					$line_array=explode(',',trim($file[$i]));
					//print_R($line_array);
					$line_array_text=join("','",$line_array);
					$newline_array			= array();
					$update_sql				= array();
					$唯一性判断字段列表SQL	= array();
					//以前的SIZEOF用的是line_array变量，后变为first_row_array，用于对应一些没有发生的变化
					for($j=0;$j<sizeof($first_row_array);$j++)		{
						$primarykey_values = $line_array[$primarykey_index_num];
						$primarykey_values = addslashes($primarykey_values);
						$ColumnName=$first_row_array[$j];
						$in_array=in_array($ColumnName,$result);
						if($in_array)					{
							//过滤'"'之类的字符 -htmlentitiesUser
							//字段名称
							$Field_Insert_Name = trim($first_row_array[$j]);//字段名称
							//得到字段名称索引
							$getFieldNumberofTable = $ColumnsReverse[$Field_Insert_Name];
							//得到字段名称索引的数据排位置
							$showlistfieldlistArrayFlip = array_flip($showlistfieldlistArray);
							$getImportKeyIndex = $showlistfieldlistArrayFlip[$getFieldNumberofTable];
							//获取该字段类型如TableFilter过滤类型
							$getImportKeyFilter = $showlistfieldfilterArray[$getImportKeyIndex];
							//通过过滤信息文本找到相应的原始字段
							$getImportKeyFilterArray = explode(':',$getImportKeyFilter);
							//print "Field_Insert_Name:$Field_Insert_Name<BR>";
							//print "getFieldNumberofTable:$getFieldNumberofTable<BR>";
							//print "getImportKeyIndex:$getImportKeyIndex<BR>";
							//print "getFieldNumberofTable:$getFieldNumberofTable<BR>";
							//print "getImportKeyFilter:$getImportKeyFilter<BR>";
							//print_R($showlistfieldlistArrayFlip);print "<BR>";


							switch($getImportKeyFilterArray[0])		{
								case 'tablefilter':
									$ImportKeycolumns= returntablecolumn($getImportKeyFilterArray[1]);
									$ImportFieldCode = $ImportKeycolumns[(String)$getImportKeyFilterArray[2]];
									$ImportFieldName = $ImportKeycolumns[(String)$getImportKeyFilterArray[3]];
									$ResultFieldCode = returntablefield($getImportKeyFilterArray[1],$ImportFieldName,$line_array[$j],$ImportFieldCode);
									//print $getImportKeyFilterArray[1]."<BR>";
									//print $ImportFieldName."<BR>";
									//print $line_array[$j]."<BR>";
									//print $ImportFieldCode."<BR>";
									if($ResultFieldCode=="") $ResultFieldCode = $line_array[$j];
									//exit;
									break;
								case 'cardidnum':
									//较验身份证号信息,如果较难没有通过,则不进行执行
									$ResultFieldCode = $line_array[$j];
									$身份证号状态 = system_CheckIdNum($ResultFieldCode,$line_array[6]);
									if($身份证号状态!="格式正确")		{
										print "<font color=red>$i ".$line_array[3]." ".$line_array[4]." ".$line_array[5]." ".$line_array[6]." 身份证号格式不正确,返回:$身份证号状态</font>";
										$IsDoSQL = '0';
									}
									else	{
										$IsDoSQL = '1';
										print "<font color=green>$i ".$line_array[3]." ".$line_array[4]." ".$line_array[5]." ".$line_array[6]." 身份证号格式正确,返回:$身份证号状态</font><BR>";

									}
									print "";
									break;
								default:
									$ResultFieldCode = $line_array[$j];
									break;
							}
							if($i==10)	{
								//print_R($身份证号状态);
								//exit;
							}
							//用于过滤组选项的变量
							$choice_index = $first_row_array[$j];
							if($showFieldName==$choice_index)		{
								//print $ResultFieldCode = $_POST[$showFieldName];
							}
							//分析结束
							array_push($newline_array,htmlentitiesUser($ResultFieldCode));
							//当字段与主KEY相同时,不在更新表中出现
							if($first_row_array[$j]!=$primarykey)		{
								//print $primarykey;
								$update_sql[] = $first_row_array[$j]."='".htmlentitiesUser($ResultFieldCode)."'";
							}

							//生成唯一性判断SQL 2010-10-10
							if(in_array($Field_Insert_Name,$唯一性判断字段列表))			{
								$唯一性判断字段列表SQL[] = "$Field_Insert_Name = '".htmlentitiesUser($ResultFieldCode)."'";
							}

						}
					}

					if($唯一性判断字段列表USERIDNAME['USERID']!='')			{
						$唯一性判断字段列表USERIDNAME_SQL_TEXT .= " and ".$唯一性判断字段列表USERIDNAME['USERID']."='".$_SESSION['LOGIN_USER_ID']."'";
					}
					if($唯一性判断字段列表USERIDNAME['USERNAME']!='')			{
						$唯一性判断字段列表USERIDNAME_SQL_TEXT .= " and ".$唯一性判断字段列表USERIDNAME['USERNAME']."='".$_SESSION['LOGIN_USER_NAME']."'";
					}

					if(sizeof($唯一性判断字段列表SQL)>0)			{
						$唯一性判断字段列表USERIDNAME_SQL_TEXT = " ".$唯一性判断字段列表USERIDNAME_SQL_TEXT;
					}
					else		{
						$唯一性判断字段列表USERIDNAME_SQL_TEXT = " 1=1 ".$唯一性判断字段列表USERIDNAME_SQL_TEXT;
					}

					//加入nocheck参数以后,不再进行SQL判断,但是其值要加进去
					if($用户默认值!="")		{
						$newline_array[]	= $_SESSION['LOGIN_USER_ID'];
						if($用户默认值NOCHECK!="nocheck")	$update_sql[]			= $用户默认值."='".$_SESSION['LOGIN_USER_ID']."'";
					}
					if($用户默认值NAME!="")		{
						$newline_array[]	= $_SESSION['LOGIN_USER_NAME'];
						if($用户默认值NAMENOCHECK!="nocheck")	$update_sql[]		= $用户默认值NAME."='".$_SESSION['LOGIN_USER_NAME']."'";
					}
					if($时间默认值!="")		{
						$newline_array[]	= date('Y-m-d H:i:s');
						if($时间默认值NOCHECK!="nocheck")		$update_sql[]			= $时间默认值."='".date('Y-m-d H:i:s')."'";
					}

					//print_R($update_sql);exit;
					$update_sql_text="update $tablename set ".join(',',$update_sql)." where ".join(" and ",$唯一性判断字段列表SQL)." $唯一性判断字段列表USERIDNAME_SQL_TEXT";
					//print_R($update_sql_text);//exit;
					//print "<BR>";

					$insert_sql_text="insert into ".$tablename."(".join(',',$result).") values('".join("','",$newline_array)."')";
					//print $insert_sql_text."<BR>";exit;

					$exists_sql_text="select count(*) as num from $tablename where ".join(" and ",$唯一性判断字段列表SQL)." $唯一性判断字段列表USERIDNAME_SQL_TEXT";
					//print $exists_sql_text."<BR>";exit;


					//print $exists_sql_text;
					//输出不较验主键时的选择列表
					$rs=$db->Execute($exists_sql_text);
					$rs_a = $rs->GetArray();
					//print_R($rs_a);exit;
					if($IsDoSQL)								{//允许执行;
						if($rs_a[0]['num']==0)					{
							$rs = $db->Execute($insert_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Insert_RIGHT += 1;
							else			$Insert_ERROR += 1;
							//insert_sql_text
							//print "<font color=green>插入:1 ".$insert_sql_text." 的数据：导入成功<BR></font>";
						}
						else		{
							$db->Execute($update_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Update_RIGHT += 1;
							else			$Update_RIGHT += 1 ;
							//print "<font color=blue>更新:3 ".$update_sql_text."<BR></font>";
						}
					}//$IsDoSQL结束
					//print "</TD></TR>\n";
					//table_end();
				}
				//table_end();
				//导入数据结果较验
				$Insert_Text = "新增数据成功:{$Insert_RIGHT} 条 失败:{$Insert_ERROR} 条 <BR>更新数据成功:{$Update_RIGHT} 条 失败:{$Update_ERROR} 条";

				//返回值链接判断,如果是回到首页,则直接用链接,否则则直接返回
				global $returnmodel;
				//print $returnmodel;
				if($returnmodel=="import_default")		{
					$returnmodel_TEXT = "history.back();";
				}
				else	{
					$returnmodel_TEXT = "location='?action=$returnmodel'";
				}

				print "
				<style type='text/css'>.style1 {
				color: #FFFFFF;
				font-weight: bold;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 14px;
				}
				</style>
				<BR><BR>
				<table width='450'  border='0' align='center' cellpadding='0' cellspacing='0' class='small' style='border:1px solid #006699;'>
				<tr><td height='110' align='middle' colspan=2  bgcolor='#E0F2FC'>
				<font color=red >".$common_html['common_html']['importsuccess']."<BR><BR>$Insert_Text<BR><BR><input type=button accesskey='c' name='cancel' value=' 点击返回 ' class=SmallButton onClick=\"$returnmodel_TEXT\" title='快捷键:ALT+c'></font>
				</td></tr><tr></table>";
				//print "<META HTTP-EQUIV=REFRESH CONTENT='$SYSTEM_SECOND;URL=?action=init_default'>\n";
				//print_infor($common_html['common_html']['importsuccess'],'trip',"location='?action=init_default'",'?action=init_default');
				//print $uploadfile_name;
				unlink($uploadfile_name);
				exit;
				}
				else			{

					//print "ERROR!";
					print_nouploadfile();
				}
}


//EXCEL数据过滤区
function newai_import_FilterXLS()				{
	global $_FILES,$_POST,$_GET,$db;
	global $showlistfieldlist,$showlistfieldfilter;
	global $common_html,$html_etc;
	global $return_sql_line,$db;
	global $columns;//print_R($columns);
	global $showlistfieldlist,$showlistfieldlist_key;
	global $foreignkey,$showFieldName,$tablename;
		if(is_uploaded_file($_FILES['uploadfileXLS']['tmp_name']))			{
				$uploadfile_self=$_FILES['uploadfileXLS']['tmp_name'];
				$uploadfile_name=$_FILES['uploadfileXLS']['name'];
				$checkFileType = substr($uploadfile_name,-3);
				if($checkFileType!="xls")	{
					print_nouploadfile("你上传的不是EXCEL格式的文件!");
					exit;
				}
				//print $checkFileType;exit;
				if(!is_dir("FileCache")) mkdir("FileCache");
				$uploadfile_name = "FileCache/".$uploadfile_name;
				copy($_FILES['uploadfileXLS']['tmp_name'],$uploadfile_name);

				if(is_file("../../PHPExcelParser4/readExcel.php"))	{
					require_once "../../PHPExcelParser4/readExcel.php";
				}
				else	{
					require_once "../PHPExcelParser4/readExcel.php";
					require_once "../PHPExcelParser4/readExcel.php";
				}
				$a = new ReadExcel($uploadfile_name);
				$tmp = $a->read();

				//按列读取的数据,转换为按行读取的数据
				$MainData = $tmp[0];
				$ColumnNumber = sizeof(array_values($MainData));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ColumnArray = $MainData[$i];
					//print_R($ColumnArray);
					for($ii=0;$ii<sizeof($ColumnArray);$ii++)			{
						$ContentText[$ii][$i] = $ColumnArray[$ii];
					}
				}
				//重新生成文本
				$ColumnNumber = sizeof(array_keys($ContentText));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ContentArray = $ContentText[$i];
					$ContentTextArray[] = join(',',$ContentArray);
					//print_R($ContentArray);
				}

				//print_r($ContentTextArray);
				//exit;

				//数据对接区
				$file = $ContentTextArray;

		}
		return $file;
}


function newai_import_FilterCSV()				{
	global $_FILES,$_POST,$_GET,$db;
	global $showlistfieldlist,$showlistfieldfilter;
	global $common_html,$html_etc;
	global $return_sql_line,$db;
	global $columns;//print_R($columns);
	global $showlistfieldlist,$showlistfieldlist_key;
	global $foreignkey,$showFieldName,$tablename;
		if(is_uploaded_file($_FILES['uploadfile']['tmp_name']))			{
				$uploadfile_self=$_FILES['uploadfile']['tmp_name'];
				$uploadfile_name=$_FILES['uploadfile']['name'];
				$checkFileType = substr($uploadfile_name,-3);
				if($checkFileType!="csv")	{
					print_nouploadfile("你上传的不是CSV格式的文件!");
					exit;
				}
				if(!is_dir("FileCache")) mkdir("FileCache");
				$uploadfile_name = "FileCache/".$uploadfile_name;
				$TempFile = $uploadfile_name;
				copy($_FILES['uploadfile']['tmp_name'],$uploadfile_name);
				$file=file($TempFile);
		}
		return $file;
}









function system_CheckIdNum($body,$ShortDate='')		{
	$Length = strlen($body);
	//print $NewID;

	//411324830719425
	switch($Length)	{
		case '15':
			$ShortDateBody = substr($body,6,6);
			if($ShortDate=="")					{
				$Year = substr($ShortDate,0,2);
				if($Year<50)	{	$Year = "20".$Year; $ShortDate = "20".$ShortDate;	}
				else			{	$Year = "19".$Year; $ShortDate = "19".$ShortDate;	}

				$returnText = "时间格式不正确<BR>";

			}
			else	{
				$ShortDate = system_checkBirthday($ShortDate);
				$returnText = "身份证号出生日期和输入的出生日期格式不对应<BR>";
			}
			$Year = substr($ShortDateBody,0,4);
			$Month = substr($ShortDateBody,4,2);
			$Day = substr($ShortDateBody,6,2);

			$Datetime = date("Ymd",mktime(1,1,1,$Month,$Day,$Year));
			//print $Month;
			//print $Year;
			if($ShortDate!=$Datetime)	{
				return $returnText;
			}
			break;
		case '18':
			$ShortDateBody = substr($body,6,8);
			if($ShortDate=="")					{
				$returnText = "时间格式不正确<BR>";
			}
			else	{
				$ShortDate = system_checkBirthday($ShortDate);
				$returnText = "身份证号出生日期和输入的出生日期格式不对应<BR>";
			}
			$Year = substr($ShortDateBody,0,4);
			$Month = substr($ShortDateBody,4,2);
			$Day = substr($ShortDateBody,6,2);
			$Datetime = date("Ymd",mktime(1,1,1,$Month,$Day,$Year));
			//print $ShortDate."<BR>";
			//print $Datetime."<BR>";
			if($ShortDate!=$Datetime)	{
				return $returnText;
			}
			break;
		default:
			return "身份证号格式不正确";
			break;
	}
	return '格式正确';
};


function system_checkBirthday($Day)		{
	$DayArray = explode('-',$Day);
	$Year = $DayArray[0];
	$Month = $DayArray[1];
	$Day = $DayArray[2];
	$Datetime = date("Ymd",mktime(1,1,1,$Month,$Day,$Year));
	return $Datetime;
}

?>