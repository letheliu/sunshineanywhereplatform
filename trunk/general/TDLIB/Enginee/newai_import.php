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
print_title("���ݵ������,��ѡ���Ψһ��KEY,�����ظ����ֶ�",3);
//print_R($common_html['common_html']['contentimport']);

if($foreignkey!="")			{
$foreignkey_array=explode(':',$foreignkey);
$columns_parent=returntablecolumn($foreignkey_array[1]);
print_R($columns_parent);
print_select('ѡ��������',$columns[(string)$foreignkey_array[3]],$value,$foreignkey_array[1],$columns_parent[(string)$foreignkey_array[3]],$columns_parent[(string)$foreignkey_array[2]],$colspan=3,$columns_parent[(string)$foreignkey_array[4]]);
print_hidden($columns[(string)$foreignkey_array[3]],'foreignkey');
}

print "<TR class=TableData>\n";
print "<TD noWrap align=middle width=50>����:</TD>\n";
print "<TD colspan=2>";
$uniquekey_array=explode(',',$uniquekey);
$FieldList = array();
for($i=0;$i<sizeof($uniquekey_array);$i++)		{
	$uniquekey_KEY		=	$uniquekey_array[$i];
	if($uniquekey_KEY!="")						{
		$uniquekey_KEY_ADD	=	explode(':',$uniquekey_KEY);
		if($uniquekey_KEY_ADD[1]=="userid")			{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""]."(�Զ�����)";
		}
		else if($uniquekey_KEY_ADD[1]=="username")		{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""]."(�Զ�����)";
		}
		else if($uniquekey_KEY_ADD[1]=="datetime")		{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""]."(�Զ�����)";
		}
		else	{
			$FieldList[]		=	$columns["".$uniquekey_KEY_ADD[0].""];
		}
	}

}
//print_R($uniquekey_array);
//�������������ʱ��ѡ���б�
$Ψһ�ֶ���ʾ�ı�		=	join(',',$FieldList);
print $Ψһ�ֶ���ʾ�ı�;
print "</TD>\n";
print "</TR>\n";


	global $importgroup;
	if($importgroup!="")				{
		//print $importgroup;
		print_title('ѡ��Ҫ�������',3);
		$importgroupArray = explode(':',$importgroup);
		$showfieldIndex = $importgroupArray[0];
		$showFieldName = $columns[$showfieldIndex];
		$showfieldTableName = $importgroupArray[1];
		$showfieldColumns = returntablecolumn($showfieldTableName);
		$showfieldIndexValue = $importgroupArray[2];
		$showfieldIndexName = $importgroupArray[3];
		$showfieldIndexValue = $showfieldColumns[$showfieldIndexName];
		$showfieldIndexName = $showfieldColumns[$showfieldIndexName];
		print_select('ѡ��Ҫ������飺',$showFieldName,$value='',$showfieldTableName,$showfieldIndexValue,$showfieldIndexName,$colspan=2,$setfieldname='',$setfieldvalue='',$setfieldboolean='');
	}

	print_title('����EXCEL��ʽ�����ļ�,����ֱ�Ӵӵ�������ģ�����ص���ģ��',3);
	print "<TR class=TableData height=50>\n";
	print "<TD noWrap align=middle >EXCEL��ʽ�ļ�</TD>\n";
	print "<TD colspan=2><input name='uploadfileXLS' type=file size=25 class=SmallInput></TD>\n";
	print "</TR>\n";

	//print_title('����CSV��ʽ�����ļ�',3);
	//print "<TR class=TableData height=50>\n";
	//print "<TD noWrap align=middle >MS CSV�ļ�</TD>\n";
	//print "<TD colspan=2><input name='uploadfile' type=file size=25 class=SmallInput></TD>\n";
	//print "</TR>\n";



	print "<tr align=\"center\" class=\"TableControl\">\n<td colspan=\"3\">\n<div align=\"center\"><input type=\"button\" value=\"".$common_html['common_html']['import']."\" class=\"SmallButton\" onClick=\"temp_function();\">����<input type=\"button\" value=\"".$common_html['common_html']['return']."\" class=\"SmallButton\" onClick=\"history.back();\"></div>\n</td></tr>\n";


	table_end();
	form_end();
	print "<BR>";
	table_begin($tablewidth);
	print_title("EXCEL��ʽ������ȷ������ʧ��ʱ,�밴���·�������:");
	print "<TR class=TableData height=50>\n";
	print "<TD colspan=3><font color=green>
	��ι���EXCEL����ĸ�ʽ,ת��Ϊ������EXCEL���ݸ�ʽ�ļ�:<BR>

	&nbsp;&nbsp;1 ׼����ԭʼ��ʽ�����ļ�<BR>
	&nbsp;&nbsp;2 �½�һ��EXCEL�ļ�,���հ��ļ�<BR>
	&nbsp;&nbsp;3 ������ѡ������->�����ⲿ����->��������,�����ĶԻ�������,ѡ���һ��׼���õ�ԭʼ�ļ�<BR>
	&nbsp;&nbsp;4 ������Ҫ��,һ�а�Ĭ�ϵķ������в���<BR>
	&nbsp;&nbsp;5 ���ɵõ�������EXCEL���ݸ�ʽ�ļ�,������ļ����е��뼴��<BR>
	&nbsp;&nbsp;ע��:���ַ���ֻ���ڽ��,����������������ȷ,������޷�ʶ������<BR>
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
					print_nouploadfile("���ϴ��Ĳ���CSV��ʽ���ļ�!");
					exit;
				}
				if(!is_dir("FileCache")) mkdir("FileCache");
				$uploadfile_name = "FileCache/".$uploadfile_name;
				$TempFile = $uploadfile_name;
				copy($_FILES['uploadfile']['tmp_name'],$uploadfile_name);
				$file=file($TempFile);

				$first_row=trim($file[0]);
				$first_row_array=explode(',',$first_row);//�����������ֶ��б�
				for($iii=0;$iii<sizeof($first_row_array);$iii++)	{
					$first_row_array[$iii] = TRIM($first_row_array[$iii]);
				}
				$first_row_array_keys=array_keys($first_row_array);
				$first_row_array_values=array_values($first_row_array);
				//���м��
				for($i=0;$i<sizeof($first_row_array_keys);$i++)			{
					$first_row_array_new[$first_row_array_values[$i]]=$first_row_array_keys[$i];
				}
				$primarykey_index_num=$first_row_array_new[$_POST[primarykey]];

				//print_R($first_row_array);


				//�õ��ֶι�����Ϣ�б�
				$newstring=array();
				$showlistfieldlistArray=explode(',',$showlistfieldlist);
				$showlistfieldfilterArray=explode(',',$showlistfieldfilter);
				$ColumnsReverse = array_flip($columns);
				$showlistfieldlist_keyArrayReverse = array_flip($showlistfieldlistArray);
				//������������б�
				for($i=0;$i<sizeof($showlistfieldlistArray);$i++)		{
					if($showlistfieldlistArray[$i]!='')		{
						$ElementTableField = $showlistfieldlistArray[$i];
						$ElementFieldName = $Columns[$ElementTableField];
						array_push($newstring,$ElementFieldName);
						}
				}
				//��ù�ֵͬ
				//print_R($newstring);
				$result = array_intersect ($newstring, $first_row_array);
				//print_R($result);
				$newstring_text=join(',',$newstring);
				//print_R($newstring_text);

				page_css('���ݵ���');
				//table_begin(500);
				//�����м��
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
					//��ǰ��SIZEOF�õ���line_array���������Ϊfirst_row_array�����ڶ�ӦһЩû�з����ı仯
					for($j=0;$j<sizeof($first_row_array);$j++)		{
						$primarykey_values = $line_array[$primarykey_index_num];
						$primarykey_values = addslashes($primarykey_values);
						$ColumnName=$first_row_array[$j];
						$in_array=in_array($ColumnName,$result);
						if($in_array)		{
							//����'"'֮����ַ� -htmlentitiesUser
							//�ֶ�����
							$Field_Insert_Name = trim($first_row_array[$j]);//�ֶ�����
							//�õ��ֶ���������
							$getFieldNumberofTable = $ColumnsReverse[$Field_Insert_Name];
							//�õ��ֶ�����������������λ��
							$showlistfieldlistArrayFlip = array_flip($showlistfieldlistArray);
							$getImportKeyIndex = $showlistfieldlistArrayFlip[$getFieldNumberofTable];
							//��ȡ���ֶ�������TableFilter��������
							$getImportKeyFilter = $showlistfieldfilterArray[$getImportKeyIndex];
							//ͨ��������Ϣ�ı��ҵ���Ӧ��ԭʼ�ֶ�
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
							//���ڹ�����ѡ��ı���
							$choice_index = $first_row_array[$j];
							if($showFieldName==$choice_index)		{
								//print $ResultFieldCode = $_POST[$showFieldName];
							}
							//��������
							array_push($newline_array,htmlentitiesUser($ResultFieldCode));
							//���ֶ�����KEY��ͬʱ,���ڸ��±��г���
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
					//page_css('���ݵ���');
					//table_begin(500);
					//print "<tr align=\"center\" class=\"TableData\">\n<td colspan=\"3\" noWrap>\n<div align=\"left\">";
					if($rs_a[0]['num']==0)		{
						if($_POST['exists']==1)		{
							$rs = $db->Execute($insert_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Insert_RIGHT += 1;
							else			$Insert_ERROR += 1 ;
							//insert_sql_text
							//print "<font color=green>���1".$insert_sql_text." �����ݣ�����ɹ�<BR></font>";
							//print "&nbsp;&nbsp;";
						}
						else	{
							//$Insert_Not
							//print "<font color=green>���2".$insert_sql_text." �����ݣ�û�е���<BR></font>";
						}
					}
					else		{
						if($_POST['update']==1)		{
							$db->Execute($update_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Update_RIGHT += 1;
							else			$Update_RIGHT += 1 ;
							//print "<font color=blue>���3".$update_sql_text."<BR></font>";
						}
						else	{
							$Update_NOT += 1 ;
							//print "<font color=blue>���4".$update_sql_text.". �����ݣ�û�и���<BR></font>";
						}
					}
					//print "</TD></TR>\n";
					//table_end();
				}
				//table_end();
				//�������ݽ������
				$Insert_Text = "�������ݳɹ�:{$Insert_RIGHT} �� ʧ��:{$Insert_ERROR} �� <BR>�������ݳɹ�:{$Update_RIGHT} �� ʧ��:{$Update_ERROR} ��";

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
				<font color=red >".$common_html['common_html']['importsuccess']."<BR><BR>$Insert_Text<BR><BR><input type=button accesskey='c' name='cancel' value=' ������� ' class=SmallButton onClick='history.back();' title='��ݼ�:ALT+c'></font>
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
	$IsDoSQL = 1; //Ĭ���������Ϊִ���ⷽ��Ĳ���


	//Ψһ���ж�
	global $uniquekey,$primarykey;
	if($uniquekey=='') $uniquekey = $primarykey;
	$uniquekey_array=explode(',',$uniquekey);
	$FieldList = array();
	$Ψһ���ж��ֶ��б� = array();
	$Ψһ���ж��ֶ��б�[] = " 1=1 ";
	for($i=0;$i<sizeof($uniquekey_array);$i++)		{
		$uniquekey_KEY			=	$uniquekey_array[$i];
		if($uniquekey_KEY!="")						{
			$uniquekey_KEY_ADD	=	explode(':',$uniquekey_KEY);
			if($uniquekey_KEY_ADD[1]=="userid")				{
				$�û�Ĭ��ֵ				=	$columns["".$uniquekey_KEY_ADD[0].""];
				$�û�Ĭ��ֵNOCHECK		=	$uniquekey_KEY_ADD[2];
				$Ψһ���ж��ֶ��б�USERIDNAME['USERID']	=	$columns["".$uniquekey_KEY_ADD[0].""];
			}
			else if($uniquekey_KEY_ADD[1]=="username")		{
				$�û�Ĭ��ֵNAME			=	$columns["".$uniquekey_KEY_ADD[0].""];
				$�û�Ĭ��ֵNAMENOCHECK	=	$uniquekey_KEY_ADD[2];
				$Ψһ���ж��ֶ��б�USERIDNAME['USERNAME']	=	$columns["".$uniquekey_KEY_ADD[0].""];

			}
			else if($uniquekey_KEY_ADD[1]=="datetime")		{
				$ʱ��Ĭ��ֵ				=	$columns["".$uniquekey_KEY_ADD[0].""];
				$ʱ��Ĭ��ֵNOCHECK		=	$uniquekey_KEY_ADD[2];
			}
			else	{
				$Ψһ���ж��ֶ��б�[]	=	$columns["".$uniquekey_KEY_ADD[0].""];
			}
		}

	}

		if(is_uploaded_file($_FILES['uploadfileXLS']['tmp_name']))			{
				$uploadfile_self=$_FILES['uploadfileXLS']['tmp_name'];
				$uploadfile_name=$_FILES['uploadfileXLS']['name'];
				$checkFileType = substr($uploadfile_name,-3);
				if($checkFileType!="xls")	{
					print_nouploadfile("���ϴ��Ĳ���EXCEL��ʽ���ļ�!");
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

				//���ж�ȡ������,ת��Ϊ���ж�ȡ������
				$MainData = $tmp[0];
				$ColumnNumber = sizeof(array_values($MainData));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ColumnArray = $MainData[$i];
					//print_R($ColumnArray);
					for($ii=0;$ii<sizeof($ColumnArray);$ii++)			{
						$ContentText[$ii][$i] = $ColumnArray[$ii];
						$ContentText[$ii][$i] = str_replace(",","��", $ContentText[$ii][$i]);
					}
				}
				//���������ı�
				$ColumnNumber = sizeof(array_keys($ContentText));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ContentArray = $ContentText[$i];
					$ContentTextArray[] = join(',',$ContentArray);
					//print_R($ContentArray);
				}

				//print_r($ContentTextArray);
				//exit;

				//���ݶԽ���
				$file = $ContentTextArray;

				//#######################################################################################
				//����ΪCSV��ʽ������,��ͬʹ�ô�����
				//#######################################################################################

				$first_row=trim($file[0]);
				$first_row_array=explode(',',$first_row);//�����������ֶ��б�
				for($iii=0;$iii<sizeof($first_row_array);$iii++)	{
					$first_row_array[$iii] = TRIM($first_row_array[$iii]);
				}
				$first_row_array_keys=array_keys($first_row_array);
				$first_row_array_values=array_values($first_row_array);
				//���м��
				for($i=0;$i<sizeof($first_row_array_keys);$i++)			{
					$first_row_array_new[$first_row_array_values[$i]]=$first_row_array_keys[$i];
				}
				$primarykey_index_num=$first_row_array_new[$_POST[primarykey]];

				//print_R($first_row_array);


				//�õ��ֶι�����Ϣ�б�
				$newstring=array();
				$showlistfieldlistArray=explode(',',$showlistfieldlist);
				$showlistfieldfilterArray=explode(',',$showlistfieldfilter);
				$ColumnsReverse = array_flip($columns);
				$showlistfieldlist_keyArrayReverse = array_flip($showlistfieldlistArray);
				//������������б�
				for($i=0;$i<sizeof($showlistfieldlistArray);$i++)		{
					if($showlistfieldlistArray[$i]!='')		{
						$ElementTableField = $showlistfieldlistArray[$i];
						$ElementFieldName = $Columns[$ElementTableField];
						array_push($newstring,$ElementFieldName);
						}
				}
				//��ù�ֵͬ
				//print_R($newstring);
				$result = array_intersect ($newstring, $first_row_array);
				//print_R($result);
				$newstring_text=join(',',$newstring);
				//print_R($newstring_text);

				//print_R($�û�Ĭ��ֵ);exit;
				//�Բ�����䲿�ֽ����û���ʱ���� 2010-10-10
				if(!in_array($�û�Ĭ��ֵ,$result)&&$�û�Ĭ��ֵ!="")			{
					$result[] = $�û�Ĭ��ֵ;
					//
				}
				if(!in_array($�û�Ĭ��ֵNAME,$result)&&$�û�Ĭ��ֵNAME!="")			{
					$result[] = $�û�Ĭ��ֵNAME;
					//
				}
				if(!in_array($ʱ��Ĭ��ֵ,$result)&&$ʱ��Ĭ��ֵ!="")			{
					$result[] = $ʱ��Ĭ��ֵ;
					//
				}

				//print_R($result);
				page_css('���ݵ���');
				//table_begin(500);
				//�����м��
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
					$Ψһ���ж��ֶ��б�SQL	= array();
					//��ǰ��SIZEOF�õ���line_array���������Ϊfirst_row_array�����ڶ�ӦһЩû�з����ı仯
					for($j=0;$j<sizeof($first_row_array);$j++)		{
						$primarykey_values = $line_array[$primarykey_index_num];
						$primarykey_values = addslashes($primarykey_values);
						$ColumnName=$first_row_array[$j];
						$in_array=in_array($ColumnName,$result);
						if($in_array)					{
							//����'"'֮����ַ� -htmlentitiesUser
							//�ֶ�����
							$Field_Insert_Name = trim($first_row_array[$j]);//�ֶ�����
							//�õ��ֶ���������
							$getFieldNumberofTable = $ColumnsReverse[$Field_Insert_Name];
							//�õ��ֶ�����������������λ��
							$showlistfieldlistArrayFlip = array_flip($showlistfieldlistArray);
							$getImportKeyIndex = $showlistfieldlistArrayFlip[$getFieldNumberofTable];
							//��ȡ���ֶ�������TableFilter��������
							$getImportKeyFilter = $showlistfieldfilterArray[$getImportKeyIndex];
							//ͨ��������Ϣ�ı��ҵ���Ӧ��ԭʼ�ֶ�
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
									//�������֤����Ϣ,�������û��ͨ��,�򲻽���ִ��
									$ResultFieldCode = $line_array[$j];
									$���֤��״̬ = system_CheckIdNum($ResultFieldCode,$line_array[6]);
									if($���֤��״̬!="��ʽ��ȷ")		{
										print "<font color=red>$i ".$line_array[3]." ".$line_array[4]." ".$line_array[5]." ".$line_array[6]." ���֤�Ÿ�ʽ����ȷ,����:$���֤��״̬</font>";
										$IsDoSQL = '0';
									}
									else	{
										$IsDoSQL = '1';
										print "<font color=green>$i ".$line_array[3]." ".$line_array[4]." ".$line_array[5]." ".$line_array[6]." ���֤�Ÿ�ʽ��ȷ,����:$���֤��״̬</font><BR>";

									}
									print "";
									break;
								default:
									$ResultFieldCode = $line_array[$j];
									break;
							}
							if($i==10)	{
								//print_R($���֤��״̬);
								//exit;
							}
							//���ڹ�����ѡ��ı���
							$choice_index = $first_row_array[$j];
							if($showFieldName==$choice_index)		{
								//print $ResultFieldCode = $_POST[$showFieldName];
							}
							//��������
							array_push($newline_array,htmlentitiesUser($ResultFieldCode));
							//���ֶ�����KEY��ͬʱ,���ڸ��±��г���
							if($first_row_array[$j]!=$primarykey)		{
								//print $primarykey;
								$update_sql[] = $first_row_array[$j]."='".htmlentitiesUser($ResultFieldCode)."'";
							}

							//����Ψһ���ж�SQL 2010-10-10
							if(in_array($Field_Insert_Name,$Ψһ���ж��ֶ��б�))			{
								$Ψһ���ж��ֶ��б�SQL[] = "$Field_Insert_Name = '".htmlentitiesUser($ResultFieldCode)."'";
							}

						}
					}

					if($Ψһ���ж��ֶ��б�USERIDNAME['USERID']!='')			{
						$Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT .= " and ".$Ψһ���ж��ֶ��б�USERIDNAME['USERID']."='".$_SESSION['LOGIN_USER_ID']."'";
					}
					if($Ψһ���ж��ֶ��б�USERIDNAME['USERNAME']!='')			{
						$Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT .= " and ".$Ψһ���ж��ֶ��б�USERIDNAME['USERNAME']."='".$_SESSION['LOGIN_USER_NAME']."'";
					}

					if(sizeof($Ψһ���ж��ֶ��б�SQL)>0)			{
						$Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT = " ".$Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT;
					}
					else		{
						$Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT = " 1=1 ".$Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT;
					}

					//����nocheck�����Ժ�,���ٽ���SQL�ж�,������ֵҪ�ӽ�ȥ
					if($�û�Ĭ��ֵ!="")		{
						$newline_array[]	= $_SESSION['LOGIN_USER_ID'];
						if($�û�Ĭ��ֵNOCHECK!="nocheck")	$update_sql[]			= $�û�Ĭ��ֵ."='".$_SESSION['LOGIN_USER_ID']."'";
					}
					if($�û�Ĭ��ֵNAME!="")		{
						$newline_array[]	= $_SESSION['LOGIN_USER_NAME'];
						if($�û�Ĭ��ֵNAMENOCHECK!="nocheck")	$update_sql[]		= $�û�Ĭ��ֵNAME."='".$_SESSION['LOGIN_USER_NAME']."'";
					}
					if($ʱ��Ĭ��ֵ!="")		{
						$newline_array[]	= date('Y-m-d H:i:s');
						if($ʱ��Ĭ��ֵNOCHECK!="nocheck")		$update_sql[]			= $ʱ��Ĭ��ֵ."='".date('Y-m-d H:i:s')."'";
					}

					//print_R($update_sql);exit;
					$update_sql_text="update $tablename set ".join(',',$update_sql)." where ".join(" and ",$Ψһ���ж��ֶ��б�SQL)." $Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT";
					//print_R($update_sql_text);//exit;
					//print "<BR>";

					$insert_sql_text="insert into ".$tablename."(".join(',',$result).") values('".join("','",$newline_array)."')";
					//print $insert_sql_text."<BR>";exit;

					$exists_sql_text="select count(*) as num from $tablename where ".join(" and ",$Ψһ���ж��ֶ��б�SQL)." $Ψһ���ж��ֶ��б�USERIDNAME_SQL_TEXT";
					//print $exists_sql_text."<BR>";exit;


					//print $exists_sql_text;
					//�������������ʱ��ѡ���б�
					$rs=$db->Execute($exists_sql_text);
					$rs_a = $rs->GetArray();
					//print_R($rs_a);exit;
					if($IsDoSQL)								{//����ִ��;
						if($rs_a[0]['num']==0)					{
							$rs = $db->Execute($insert_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Insert_RIGHT += 1;
							else			$Insert_ERROR += 1;
							//insert_sql_text
							//print "<font color=green>����:1 ".$insert_sql_text." �����ݣ�����ɹ�<BR></font>";
						}
						else		{
							$db->Execute($update_sql_text);
							$EOF = $rs->EOF;
							if($EOF)		$Update_RIGHT += 1;
							else			$Update_RIGHT += 1 ;
							//print "<font color=blue>����:3 ".$update_sql_text."<BR></font>";
						}
					}//$IsDoSQL����
					//print "</TD></TR>\n";
					//table_end();
				}
				//table_end();
				//�������ݽ������
				$Insert_Text = "�������ݳɹ�:{$Insert_RIGHT} �� ʧ��:{$Insert_ERROR} �� <BR>�������ݳɹ�:{$Update_RIGHT} �� ʧ��:{$Update_ERROR} ��";

				//����ֵ�����ж�,����ǻص���ҳ,��ֱ��������,������ֱ�ӷ���
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
				<font color=red >".$common_html['common_html']['importsuccess']."<BR><BR>$Insert_Text<BR><BR><input type=button accesskey='c' name='cancel' value=' ������� ' class=SmallButton onClick=\"$returnmodel_TEXT\" title='��ݼ�:ALT+c'></font>
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


//EXCEL���ݹ�����
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
					print_nouploadfile("���ϴ��Ĳ���EXCEL��ʽ���ļ�!");
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

				//���ж�ȡ������,ת��Ϊ���ж�ȡ������
				$MainData = $tmp[0];
				$ColumnNumber = sizeof(array_values($MainData));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ColumnArray = $MainData[$i];
					//print_R($ColumnArray);
					for($ii=0;$ii<sizeof($ColumnArray);$ii++)			{
						$ContentText[$ii][$i] = $ColumnArray[$ii];
					}
				}
				//���������ı�
				$ColumnNumber = sizeof(array_keys($ContentText));
				for($i=0;$i<$ColumnNumber;$i++)			{
					$ContentArray = $ContentText[$i];
					$ContentTextArray[] = join(',',$ContentArray);
					//print_R($ContentArray);
				}

				//print_r($ContentTextArray);
				//exit;

				//���ݶԽ���
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
					print_nouploadfile("���ϴ��Ĳ���CSV��ʽ���ļ�!");
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

				$returnText = "ʱ���ʽ����ȷ<BR>";

			}
			else	{
				$ShortDate = system_checkBirthday($ShortDate);
				$returnText = "���֤�ų������ں�����ĳ������ڸ�ʽ����Ӧ<BR>";
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
				$returnText = "ʱ���ʽ����ȷ<BR>";
			}
			else	{
				$ShortDate = system_checkBirthday($ShortDate);
				$returnText = "���֤�ų������ں�����ĳ������ڸ�ʽ����Ӧ<BR>";
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
			return "���֤�Ÿ�ʽ����ȷ";
			break;
	}
	return '��ʽ��ȷ';
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