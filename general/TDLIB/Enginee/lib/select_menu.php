<?
/*****************************************************************\
1����ϵͳΪ��ҵ������ܹ�������Ȩ���������κ��˲�����
ԭ����δͬ��Ļ����Ͻ��п������������ҵ��;��
2�����ΰ汾Ϊ�ǿ�Դ�棬�����ʹ�ã���ע���ȡ���֤��
3����ϵͳ���߱���һ����ص�֪ʶ��Ȩ
\*****************************************************************/
function returntablefield2($����,$arr,$����ֶ�)
{
	global $db;
	$addsql = "";
	$sql = "select `".$����ֶ�."` from `".$����."` where 1=1 ";
	$NewArrayValues = @array_values($arr);
	$NewArrayKeys	= @array_keys($arr);
	for($i=0;$i<sizeof($NewArrayKeys);$i++)
	{
		if($NewArrayValues[$i] != "")
		{
		  $addsql = " and ".$NewArrayKeys[$i]." = '".$NewArrayValues[$i]."'";
		  $sql.=$addsql;
		}
	}
	$rs = $db->CacheExecute(30,$sql);
	return trim($rs->fields[$����ֶ�]);
}
function gettablefield($tablename,$field_value,$field_name,$value)		{
	global $db;
	if($value=='') return '';
	$sql="select distinct $field_name from $tablename where $field_value='$value'";
	$rs=$db->CacheExecute(30,$sql);
	return trim($rs->fields[$field_name]);
}
//�õ�һ�ֶ�ֵ
function returntablefield($tablename,$what,$value,$return,$groupfield='',$groupvalue='')		{
	global $db,$_SESSION;
	//���ж����ݿ��жϲ���
	switch(substr($tablename,0,5))					{
		case 'flow_':
			if($_SESSION['SYSTEM_IS_TD_OA']=='1')
					$tablename = "TD_OA.$tablename";
			break;
	}
	if($value=='') return '';
	if($groupfield!=""&&$groupvalue!="")			{
		$sql="select distinct $return from $tablename where $what='$value' and $groupfield='$groupvalue'";//print $sql."<BR>";//exit;
	}
	else	{
		$sql="select distinct $return from $tablename where $what='$value'";//print $sql."<BR>";//exit;
	}
	$rs=$db->CacheExecute(30,$sql);
	//print $sql."<BR>";
	$returnArray = explode(',',$return);
	if(@$returnArray[1]!="")
		return $rs->fields;					//��������
	else
		return trim($rs->fields[$return]);	//����ĳһ�ֶε�ֵ
}




//�趨һ�ֶ�ֵ
function updatetablefield($tablename,$what,$value,$return,$returnValue)		{
	global $db;
	$sql="update $tablename set $return = '$returnValue' where $what='$value'";
	$rs=$db->Execute($sql);
	return $rs->EOF;
}
//�趨һ�ֶ�ֵ
function settablefield($tablename,$what,$value,$return,$returnValue)		{
	return updatetablefield($tablename,$what,$value,$return,$returnValue);
}


//�õ�һ�ֶ�ֵ-���ֵΪ��,�����ж�������ֵ,������TABLEFILTERCOLOR����
function returntablefieldColorFilterGray($tablename,$what,$value,$return,$groupfield='',$groupvalue='',$�ֶ�����='')		{
	/*
	global $return_sql_line;
	$where_sql = $return_sql_line['where_sql'];;
	$where_sql_array = explode("where",$where_sql);
	if(trim($where_sql_array[1])!=""&&$�ֶ�����!="")		{
		$ADD_SQL_WHERE_TEXT = " and $return in (select distinct $�ֶ����� $where_sql)";
	}
	else	{
		$ADD_SQL_WHERE_TEXT = "";
	}
	*/
	global $db;
	if($groupfield!=""&&$groupvalue!="")		{
		$sql = "select distinct $return,$what from $tablename where $groupfield='$groupvalue' $ADD_SQL_WHERE_TEXT";
		$TEMP_TAR = 1;
	}
	else	{
		$sql = "select distinct $return,$what from $tablename where 1=1 $ADD_SQL_WHERE_TEXT";
		$TEMP_TAR = 0;
	}
	//print $sql."<BR>";
	$return2 = '';
	$rs=$db->CacheExecute(300,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$updateValue = $rs_a[$i][$what];
		if($updateValue==$value)		{
			if($rs_a[$i][$return]=="")		{	//�������ֵΪ��,���ô���ֵ���
				$return2 = "<font color=gray>$value</font>";
			}
			else	{							//������ɫ����
				$returnColorArray = returnColorArrayTableFilter();
				$colorIndex = $i%8;
				$colorValue = $returnColorArray[$colorIndex];
				$return2 = "<font color=$colorValue>".$rs_a[$i][$return]."</font>";
			}
		}
		else	{
			//����������
		}
	}
	//print $return2;exit;
	//if($TEMP_TAR == 1)	print_R($return2);
	return $return2;
}
//�õ�һ�ֶ�ֵ-����ֵ��ɫ
function returntablefieldColor($tablename,$what,$value,$return,$groupfield='',$groupvalue='',$�ֶ�����='')		{
	/*
	global $return_sql_line;
	$where_sql = $return_sql_line['where_sql'];;
	if($where_sql!=""&&$�ֶ�����!="")		{
		$ADD_SQL_WHERE_TEXT = " and $return in (select distinct $�ֶ����� $where_sql)";
	}
	else	{
		$ADD_SQL_WHERE_TEXT = "";
	}
	*/
	global $db;
	if($groupfield!=""&&$groupvalue!="")		{
		$sql = "select distinct $return,$what from $tablename where $groupfield='$groupvalue' $ADD_SQL_WHERE_TEXT";
		$TEMP_TAR = 1;
	}
	else	{
		$sql = "select distinct $return,$what from $tablename where 1=1 $ADD_SQL_WHERE_TEXT";
		$TEMP_TAR = 0;
	}
	$rs=$db->CacheExecute(300,$sql);
	$rs_a = $rs->GetArray();
	//print $sql."<BR>";
	$return2 = '';
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$updateValue = $rs_a[$i][$what];
		if($updateValue==$value)		{
			$returnColorArray = returnColorArrayTableFilter();
			$colorIndex = $i%8;
			$colorValue = $returnColorArray[$colorIndex];

			$return2 = "<font color=$colorValue>".$rs_a[$i][$return]."</font>";
		}
		else	{
			//$return2 = "";
		}
	}
	//if($TEMP_TAR == 1)	print_R($return2);
	return $return2;
}
//�õ�һ�ֶ�ֵ-���ֶθ���
function returntablefieldGroup($tablename,$what,$value,$return,$groupfield='',$groupvalue='')		{
	$return2 = '';
	global $db;
	if($groupfield!=""&&$groupvalue!="")		{
		$sql = "select distinct $return,$what from $tablename where $groupfield='$groupvalue'";
		$TEMP_TAR = 1;
	}
	else	{
		$sql = "select distinct $return,$what from $tablename";
		$TEMP_TAR = 0;
	}//print $sql;
	$rs=$db->CacheExecute(30,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$updateValue = $rs_a[$i][$what];
		if($updateValue==$value)		{
			$returnColorArray = returnColorArrayTableFilter();
			$colorIndex = $i%8;
			$colorValue = $returnColorArray[$colorIndex];

			$return2 = "<font color=$colorValue>".$rs_a[$i][$return]."</font>";
		}
		else	{
			//$return2 = "";
		}
	}
	//if($TEMP_TAR == 1)	print_R($return2);
	return $return2;
}
/******************************************************************************
 *@ϵͳ��Ŀ��Sunshine Anywhere Application Platform(SAAP)1.2
 *@����˵��������TablefilterColor��ʾ����ÿ����õ�ɫ����Ϣ����
 *@�������ߣ�������
 *@�������ڣ�2006-4-20
 */
function returnColorArrayTableFilter()			{
	$ColorArray[0]="green";
	$ColorArray[1]="red";
	$ColorArray[2]="CC0033";
	$ColorArray[3]="0x6600FF";
	$ColorArray[4]="0x42FF8E";
	$ColorArray[5]="0x6600FF";
	$ColorArray[6]="0x66FF00";
	$ColorArray[7]="0x00FFFF";
	return $ColorArray;
 }
//�õ�һ�ֶ�ֵ
function ajaxtablefield($tablename,$what,$value,$return,$Counter,$tablename2,$updateField,$primaryKey,$primarykeyValue)		{
	global $db;
	$field_name = $return;
	$field_value = $what;
	$sql="select distinct $field_value,$field_name from $tablename";
	$rs=$db->CacheExecute(30,$sql);
	$selectName = $field_name."_".$Counter;
	$filename = returnpath();
	$filename = $filename."Enginee/lib/XmlHttpServer_Ajax.php";
	$Text .= "<select class=\"SmallSelect\" name=$selectName onChange=GetResult(this.value)>\n";
	while(!$rs->EOF)			{
		if($value==trim($rs->fields[$field_value]))		$temp='selected';
		$Base64Code = $filename."?action=ajax&tablename=$tablename2&updateField=$updateField&newValue=".$rs->fields[$field_value]."&primaryKey=$primaryKey&primarykeyValue=$primarykeyValue";
		$Text .= "<option value=\"$Base64Code\" $temp>".$rs->fields[$field_name]."</option>\n";
		$temp='';
		$rs->MoveNext();
	}
	$Text .= "</select> &nbsp;\n";
	return $Text;
}




































































//�˺�����ͨ�õ�SELECTMENU��������Ҫ��������ƾ��ڴ˺���������ơ�
function print_select($showtext,$showfield,$value,$tablename2,$field_value,$field_name,$colspan=1,$setfieldname='',$setfieldvalue='',$setfieldboolean='',$initvalue='')		{
	global $db,$_GET;
	global $_SESSION;
	global $FORM_SELECT_DISABLED;
	global $html_etc,$tablename;
	global $SYSTEM_SELECT_MENU_SHOW_KEY;
	//print $SYSTEM_SELECT_MENU_SHOW_KEY;

	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$showfield]);
	 if($fields['USER_PRIVATE'][$showfield]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$showfield];
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallSelect";
	 }

	 if($_GET["".$showfield."_disabled"]=="disabled")		{
		 $readonly = "disabled";
		 $class = "SmallStatic";
		 $showfieldName = "".$showfield."_NAME";
		 if($_GET[$showfieldName]!="")
			 $showfieldName = $_GET[$showfieldName];
		 else
			 $showfieldName = $showfield;
		 //���¶����ֶβ�Ϊ��ʱ�Ķ����µ�����
		 if($html_etc[$tablename][$showfieldName]!="")	{
			 $showtext = $html_etc[$tablename][$showfieldName];
		 }
		 //print_R($html_etc);

		 //ʵʱ���½�������˵��
		 $showtext = FilterFieldName($showtext,$showfield);


		 $showFieldName = returntablefield($tablename2,$field_value,$_GET[$showfield],$showfieldName);
		 if($showFieldName=="")			{
			 $showFieldName = $_GET[$showfield];
		 }
		 print "<TR>";
		 print "<TD class=TableData noWrap>".$showtext."</TD>\n";
		 print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
		 print "<input type=hidden name=\"$showfield\" value=\"".$_GET[$showfield]."\"/>\n";
		 if($SYSTEM_SELECT_MENU_SHOW_KEY==1)			{
			 print "<font color=green>".$showFieldName."[".$_GET[$showfield]."]</font>\n";
		 }
		 else	{
			 print "<font color=green>$showFieldName</font>\n";
		 }
		 print "</TD></TR>\n";
		 return;
	 }
	 //print_R($_GET);
	 //�û�������������##########################����
	 global $fields;
	 global $columns;
	 //print_R($columns);
	 //print_R($initvalue);exit;

	$sql="select distinct $field_value,$field_name from $tablename2";
	if($initvalue!="")			{
		$columnschild=returntablecolumn($tablename2);
		$������ = $columnschild[$initvalue];
		if($_GET[$������]!="")		{
			//print_R($_GET);
			$sql = $sql." where $������ = ".$_GET[$������]."";
		}
	}


	//$����ֶ�
	//print $sql;
	$rs=$db->CacheExecute(30,$sql);

	//ʵʱ���½�������˵��
	$showtext = FilterFieldName($showtext,$showfield);

	print "<TR>";
    print "<TD class=TableData noWrap>".$showtext."</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	//#########################################################
	//����ָ�������ֶο��ù���ģ��
	if($setfieldname!=""&&$setfieldvalue!=""&&$setfieldboolean!="")	{
		//��ʱ�趨δʹ�ã�����Ϊ���һ��ʱ����Ϊ����ʹ��״̬
		if($setfieldvalue != $value)
			$FORM_SELECT_DISABLED[$setfieldname] = 'disabled' ;
		print "
		<script>
		function changeselect".$setfieldname."(locationid)
		{
			if(locationid == '".$setfieldvalue."')		{
				document.form1.".$setfieldname.".disabled = false;
			}
			else	{
				document.form1.".$setfieldname.".disabled = true;
			}
		}
		</script>
	";
	}
	//#########################################################
	print "<input type=hidden name='".$showfield."_ԭʼֵ' value='$value'>\n";
	print "<select class=\"$class\" name=\"$showfield\" title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' ";
	//�޸Ĺ��ܣ���ָ����Ϊδʹ�ù���
	if($setfieldname!=""&&$setfieldvalue!=""&&$setfieldboolean!="")	{
		print " onChange=\"changeselect".$setfieldname."(this.value)\" ";
	}
	//ϵͳ��ʼ��ʱ���Ƿ�ʹ��;
	print $FORM_SELECT_DISABLED[$showfield];
	//��س�ΪTab Key����
	print " onkeydown=\"if(event.keyCode==13)event.keyCode=9\" $readonly>\n";

	//����������==00
	if($tablename2 == 'department')		{
		print "<option value=''>======[��λ]</option>\n";
	}
	//����������
	while(!$rs->EOF)			{
		if($value==$rs->fields[$field_value]||$_GET[$showfield]==$rs->fields[$field_value])		$temp='selected';
		//�Բ�����Ϣ�����ر���
		if($tablename2 == 'department'&&$value=="")		{
			$SUNSHINE_USER_DEPT = $_SESSION['SUNSHINE_USER_DEPT'];
			if($rs->fields[$field_value] == $SUNSHINE_USER_DEPT)		{
				$temp = 'selected';
			}
		}
		//���û���Ϣ�����ر���
		if($tablename2 == 'user'&&$value=="")		{
			$SUNSHINE_USER_NAME = $_SESSION['SUNSHINE_USER_NAME'];
			if($rs->fields[$field_value] == $SUNSHINE_USER_NAME)		{
				$temp = 'selected';
			}
		}
		//�������

		//���������˵�ʱ,�Ƿ���ʾKEY�ֶ�
		if($SYSTEM_SELECT_MENU_SHOW_KEY==1)			{
			print "<option value=\"".$rs->fields[$field_value]."\" $temp>".$rs->fields[$field_name]."[".$rs->fields[$field_value]."]</option>\n";
		}
		else		{
			print "<option value=\"".$rs->fields[$field_value]."\" $temp>".$rs->fields[$field_name]."</option>\n";
		}
		$temp='';
		$rs->MoveNext();
	}
	print "</select>\n";
	print $addtext = FilterFieldAddText($addtext,$showfield);
	//print_R($_SESSION);
	//���Ա�����
	//print_R($FORM_SELECT_DISABLED);print $FORM_SELECT_DISABLED[$showfield];
	print "</TD></TR>\n";
}


//�˺�����SELECT_PRIV���
function print_selectpriv($showtext,$showfield,$value,$tablename,$field_value,$field_name,$colspan=1,$USER_PRIV_VALUE='')		{
	global $db,$_GET;
	global $_SESSION,$common_html;

	    global $FORM_SELECT_DISABLED;
		$USER_PRIV_ID = $_SESSION['SUNSHINE_USER_PRIV'];
		$USER_PRIV = returntablefield("user_priv","USER_PRIV",$USER_PRIV_ID,"PRIV_NO");
		$USER_PRIV_NAME = returntablefield("systemprivate","ID",$USER_PRIV_VALUE,"NAME");
		switch($USER_PRIV)		{
			case 1:
			case 2:
			case $USER_PRIV_VALUE:
				$Disabled = "";
				break;
			default:
				$Disabled = "disabled";
				break;
		}

	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$showfield]);
	 if($fields['USER_PRIVATE'][$showfield]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$showfield];
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = $Disabled;
		 $class = "SmallSelect";
	 }
	 //�û�������������##########################����


	$sql="select distinct $field_value,$field_name from $tablename";
	$rs=$db->CacheExecute(30,$sql);
	print "<TR>";
    print "<TD class=TableData noWrap>".$showtext."</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	//#########################################################
	print "<select class=\"$class\" name=\"$showfield\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."'";
	//��س�ΪTab Key����
	print " onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";
	//����������
	while(!$rs->EOF)			{
		if($value==$rs->fields[$field_value]||$_GET[$showfield]==$rs->fields[$field_value])		$temp='selected';
		//�Բ�����Ϣ�����ر���
		if($tablename == 'department'&&$value=="")		{
			$SUNSHINE_USER_DEPT = $_SESSION['SUNSHINE_USER_DEPT'];
			if($rs->fields[$field_value] == $SUNSHINE_USER_DEPT)		{
				$temp = 'selected';
			}
		}
		//���û���Ϣ�����ر���
		if($tablename == 'user'&&$value=="")		{
			$SUNSHINE_USER_NAME = $_SESSION['SUNSHINE_USER_NAME'];
			if($rs->fields[$field_value] == $SUNSHINE_USER_NAME)		{
				$temp = 'selected';
			}
		}
		//�������
		print "<option value=\"".$rs->fields[$field_value]."\" $temp>".$rs->fields[$field_name]."</option>\n";
		$temp='';
		$rs->MoveNext();
	}
	print "</select>\n";
	//ע����--
	print "<font color=green>".$common_html['common_html']['editprivate'].":".$USER_PRIV_NAME."&ϵͳ����Ա<font>";
	//--------

	//print $USER_PRIV_VALUE;
	//print_R($_SESSION);
	//���Ա�����
	//print_R($FORM_SELECT_DISABLED);print $FORM_SELECT_DISABLED[$showfield];
	print "</TD></TR>\n";
}

function print_select2($showtext,$showfield,$showfieldValue,$value,$tablename,$field_value,$field_name,$colspan=1)		{
	global $db,$_GET;

	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$showfield]);
	 if($fields['USER_PRIVATE'][$showfield]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$showfield];
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallSelect";
	 }
	 //�û�������������##########################����

	//ʵʱ���½�������˵��
	$showtext = FilterFieldName($showtext,$showfield);

	$sql="select distinct $field_value,$field_name from $tablename";
	$rs=$db->CacheExecute(30,$sql);
	print "<TR>";
    print "<TD class=TableData noWrap>".$showtext."</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select class=\"$class\" name=\"$showfield\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";
	print "<option value=\"\" $temp>=======</option>\n";
	while(!$rs->EOF)			{
		if($value==$rs->fields[$field_value]||$_GET[$showfield]==$rs->fields[$field_value])		$temp='selected';
		print "<option value=\"".$rs->fields[$field_value]."\" $temp>".$rs->fields[$field_name]."</option>\n";
		$temp='';
		$rs->MoveNext();
	}
	print "</select>\n";
	$showfieldValueName = returntablefield($tablename,$field_value,$value,$field_name);
	print "<input type=hidden name=$showfieldValue value=\"$showfieldValueName\">\n";
	print $addtext = FilterFieldAddText($addtext,$showfield);
	print "</TD></TR>\n";
}

//�˺������ڷ��ص�����SELECT��MENU��HTMLֵ��
function print_select_single_select($showfield,$value,$tablename,$field_value,$field_name,$colspan=1)		{
	global $db,$_GET;
	$sql="select `$field_value`,`$field_name` from `$tablename`";
	$rs=$db->CacheExecute(30,$sql);//print_R($rs->GetArray());
	print "<select class=\"SmallSelect\" name=\"$showfield\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";
	print "<option value=\"\" $temp>=======</option>\n";
	while(!$rs->EOF)			{
		if($value==$rs->fields[$field_value])		$temp='selected';
		print "<option value=\"".$rs->fields[$field_value]."\" $temp>".$rs->fields[$field_name]."</option>\n";
		$temp='';
		$rs->MoveNext();
	}
	print "</select>\n";
}

//�˺������ڷ��ص�����SELECT��MENU��HTMLֵ��
function print_select_single_select2($showfield,$initvalue,$tablename,$field_value,$field_name,$value='',$groupfield='',$groupvalue='')		{
	global $db,$_GET;
	if($groupfield!=""&&$groupvalue!="")		{
		$sql="select `$field_value`,`$field_name` from `$tablename` where $groupfield='$groupvalue'";
	}
	else	{
		$sql="select `$field_value`,`$field_name` from `$tablename`";
	}
	//print $sql;

	$rs=$db->CacheExecute(30,$sql);//print_R($rs->GetArray());
	print "<select class=\"SmallSelect\" name=\"$showfield\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";
	while(!$rs->EOF)			{
		if($initvalue==$rs->fields[$field_value])		$temp='selected';
		if($value==$rs->fields[$field_value])		$temp='selected';
		print "<option value=\"".$rs->fields[$field_value]."\" $temp>".$rs->fields[$field_name]."</option>\n";
		$temp='';
		$rs->MoveNext();
	}
	print "</select>\n";
}


function return_select_filter($mode,$value)	{
	$array=return_select_array($mode);
	return $array[$value];
}
function return_select_array($mode)			{
	global $common_html;
	switch($mode)	{
		case 'select_sms':
			$array=array($common_html['common_html']['sms0'],$common_html['common_html']['sms1'],$common_html['common_html']['sms2'],$common_html['common_html']['sms3'],$common_html['common_html']['sms4'],$common_html['common_html']['sms5'],$common_html['common_html']['sms6'],$common_html['common_html']['sms7'],$common_html['common_html']['sms8']);
			break;
		case 'sms_self_status':
			$index0="<img src=\"images/avatar/1.gif\" alt=\"".$common_html['common_html']['sms_type0']."\">";
			$index1="<img src=\"images/sms_type1.gif\" alt=\"".$common_html['common_html']['sms_type1']."\">";
			$index2="<img src=\"images/sms_type2.gif\" alt=\"".$common_html['common_html']['sms_type2']."\">";
			$index3="<img src=\"images/sms_type3.gif\" alt=\"".$common_html['common_html']['sms_type3']."\">";
			$index4="<img src=\"images/sms_type4.gif\" alt=\"".$common_html['common_html']['sms_type4']."\">";
			$index5="<img src=\"images/sms_type5.gif\" alt=\"".$common_html['common_html']['sms_type5']."\">";
			$index6="<img src=\"images/sms_type6.gif\" alt=\"".$common_html['common_html']['sms_type6']."\">";
			$index7="<img src=\"images/sms_type7.gif\" alt=\"".$common_html['common_html']['sms_type7']."\">";
			$array=array($index0,$index1,$index2,$index3,$index4,$index5,$index6,$index7);
			break;
		case 'sms_self_status_text':
			$index0="<img src=\"images/avatar/1.gif\" alt=\"".$common_html['common_html']['sms_type0']."\">".$common_html['common_html']['sms_type0'];
			$index1="<img src=\"images/sms_type1.gif\" alt=\"".$common_html['common_html']['sms_type1']."\">".$common_html['common_html']['sms_type1'];
			$index2="<img src=\"images/sms_type2.gif\" alt=\"".$common_html['common_html']['sms_type2']."\">".$common_html['common_html']['sms_type2'];
			$index3="<img src=\"images/sms_type3.gif\" alt=\"".$common_html['common_html']['sms_type3']."\">".$common_html['common_html']['sms_type3'];
			$index4="<img src=\"images/sms_type4.gif\" alt=\"".$common_html['common_html']['sms_type4']."\">".$common_html['common_html']['sms_type4'];
			$index5="<img src=\"images/sms_type5.gif\" alt=\"".$common_html['common_html']['sms_type5']."\">".$common_html['common_html']['sms_type5'];
			$index6="<img src=\"images/sms_type6.gif\" alt=\"".$common_html['common_html']['sms_type6']."\">".$common_html['common_html']['sms_type6'];
			$index7="<img src=\"images/sms_type7.gif\" alt=\"".$common_html['common_html']['sms_type7']."\">".$common_html['common_html']['sms_type7'];
			$array=array($index0,$index1,$index2,$index3,$index4,$index5,$index6,$index7);
			break;
		case 'sms_delete_status':
			$index0="<img src=\"images/email.gif\" alt=\"".$common_html['common_html']['normal']."\">";
			$index1="<img src=\"images/email_delete.gif\" alt=\"".$common_html['common_html']['addresseedelete']."\">";
			$index2="<img src=\"images/email_delete.gif\" alt=\"".$common_html['common_html']['addresserdelete']."\">";
			$index3="<img src=\"images/email_delete.gif\" alt=\"".$common_html['common_html']['addresserdelete']."\">";
			$index4="<img src=\"images/email_delete.gif\" alt=\"".$common_html['common_html']['addresserdelete']."\">";
			$array=array($index0,$index1,$index2,$index3,$index4);
			break;
		case 'select_education':
			$array=array($common_html['common_html']['education0'],$common_html['common_html']['education1'],$common_html['common_html']['education2'],$common_html['common_html']['education3'],$common_html['common_html']['education4'],$common_html['common_html']['education5'],$common_html['common_html']['education6'],$common_html['common_html']['education7'],$common_html['common_html']['education8']);
			break;
		case 'select_politics':
			$array=array($common_html['common_html']['politics0'],$common_html['common_html']['politics1'],$common_html['common_html']['politics2'],$common_html['common_html']['politics3']);
			break;
		case 'select_marriage':
			$array=array($common_html['common_html']['marriage0'],$common_html['common_html']['marriage1']);
			break;
		case 'select_worklog':
			$array=array($common_html['common_html']['worklog'],$common_html['common_html']['personallog']);
			break;
		case 'email_read_status_outbox':
			$index0="<img src=\"images/email_close.gif\" alt=\"".$common_html['common_html']['addresseenew']."\">";
			$index1="<img src=\"images/email_open.gif\" alt=\"".$common_html['common_html']['addresseeread']."\">";
			$array=array($index0,$index1);
			break;
		case 'email_read_status_inbox':
			$index0="<img src=\"images/email_new.gif\" alt=\"".$common_html['common_html']['newmail']."\">";
			$index1="<img src=\"images/email_open.gif\" alt=\"".$common_html['common_html']['readmail']."\">";
			$array=array($index0,$index1);
			break;
		case 'email_delete_status_outbox':
			$index0="<img src=\"images/email.gif\" alt=\"".$common_html['common_html']['normal']."\">";
			$index1="<img src=\"images/email_delete.gif\" alt=\"".$common_html['common_html']['addresseedelete']."\">";
			$index2="<img src=\"images/email_delete.gif\" alt=\"".$common_html['common_html']['addresserdelete']."\">";
			$array=array($index0,$index1,$index2);
			break;
		case 'notify_read_status':
			$index0="<img src=\"images/new.gif\" alt=\"".$common_html['common_html']['newmail']."\">";
			$index1="<img src=\"images/notify.gif\" alt=\"".$common_html['common_html']['readmail']."\">";
			$array=array($index0,$index1);
			break;
		case 'userlang':
			$index0=$common_html['common_html']['zh'];
			$index1=$common_html['common_html']['en'];
			$array=array('zh'=>$index0,'en'=>$index1);
			break;

		//default :
			//$array=array($common_html['common_html']['sms0'],$common_html['common_html']['sms1']);
	}
	return $array;
}
function print_select_single($showtext,$var,$var_value="",$mode='select_sms',$addtext='',$colspan=1)	{
	global $common_html;
	//ʵʱ���½�������˵��
	 $showtext = FilterFieldName($showtext,$showfield);

	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$var]);
	 if($fields['USER_PRIVATE'][$var]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$var];
		 $class = "SmallStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallSelect";
	 }
	 //�û�������������##########################����

	$array=return_select_array($mode);
	print "<TR>";
    print "<TD class=TableData noWrap>".$showtext."</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	$array_keys=array_keys($array);//print_R($var_value);
	print "<select class=\"$class\" name=\"$var\" $readonly  onkeydown=\"if(event.keyCode==13)event.keyCode=9\">\n";
	for($i=0;$i<sizeof($array);$i++)		{
		if($var_value==$array_keys[$i])		$temp='selected';
		print "<option value=\"".$array_keys[$i]."\" $temp>".$array[(string)$array_keys[$i]]."</option>\n";
		$temp='';
	}
	print "</select>\n";
	print $addtext = FilterFieldAddText($addtext,$showfield);
	print "</TD></TR>\n";
}
function print_select_text($showtext,$value,$showfield,$tablename,$field_value,$field_name,$groupfield='',$groupvalue='',$colspan='2')		{
	global $db;
	if($groupfield!=""&&$groupvalue!="")		{
		$sql="select distinct $field_value,$field_name from $tablename where $field_value='$value' and $groupfield='$groupvalue'";
	}
	else	{
		$sql="select distinct $field_value,$field_name from $tablename where $field_value='$value'";
	}
	//print $sql;
	$rs=$db->CacheExecute(30,$sql);
	print "<TR>";
    print "<TD class=TableContent noWrap>".$showtext."</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print $rs->fields[$field_name];
	print "</TD></TR>\n";

}
function print_radio_sex($counter,$init)	{
	global $choose_lang,$html_etc,$array_sex;

	 //�û�������������##########################��ʼ
	 global $fields;
	 //print_R($fields['USER_PRIVATE'][$var]);
	 if($fields['USER_PRIVATE'][$var]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$var];
	 }
	 else	{
		 $readonly = "";
	 }
	 //�û�������������##########################����

	 $sizeof=sizeof($array_sex[$choose_lang]);
	 for($i=0;$i<$sizeof;$i++)	{
		 if($init==$i)	{
			 print "<label><input type=\"radio\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' checked name=\"".$counter."_sex\" value=\"$i\"/>".$array_sex[$choose_lang][$i]."</label>";
		 }
		 else	{
			 print "<label><input type=\"radio\" $readonly  title='".$fields['USER_PRIVATE_TEXT'][$showfield]."' name=\"".$counter."_sex\" value=\"$i\"/>".$array_sex[$choose_lang][$i]."</label>";
		 }
	 }
}
//$array=array("Сѧ","����","����","��ר","ר��","��","˶ʿ","��ʿ","��ʿ��");
function print_select_sms($init)		{
	global $choose_lang,$html_etc;
	$showtext[en]="SMS Sound";
	$showtext[zn]="����Ϣ����";
	 print "<TR>";
     print "<TD class=TableData noWrap>".$showtext[$choose_lang]."�� </TD>\n";
     print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	 print "<select class=\"SmallSelect\" name=\"sms\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\">\n";
	 $array[zh]=array("��","����1","����2","����","ˮ��","�ֻ�","�绰","����","OICQ");
	 $array[en]=array("None","Sound1","Sound2","Compact","Water","Mobile","Telephone","chicken","OICQ");
	 $sizeof=sizeof($array[$choose_lang]);
	 if($init=="")		{	$init=1;	}
	 for($i=0;$i<$sizeof;$i++)	{
		 if($init==$i)	{
			 print "<option value=\"$i\" selected>".$array[$choose_lang][$i]."</option>\n";
		 }
		 else	{
			 print "<option value=\"$i\">".$array[$choose_lang][$i]."</option>\n";
		 }
	 }
	 print "</select>\n";
	 print "</TD></TR>\n";
}
?>