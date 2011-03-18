<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
//提供用户自定义类型：用于增加和编辑数据时
function userDefineLinkman_add($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	global $departprivte;

	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];
	$fieldName2 = $fields['name'][$i+2];
	$fieldName3 = $fields['name'][$i+3];
	$fieldName4 = $fields['name'][$i+4];
	$fieldName5 = $fields['name'][$i+5];
	$fieldName6 = $fields['name'][$i+6];
	$fieldName7 = $fields['name'][$i+7];
	$fieldName8 = $fields['name'][$i+8];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];
	$fieldValue2 = $fields['value'][$fieldName2];
	$fieldValue3 = $fields['value'][$fieldName3];
	$fieldValue4 = $fields['value'][$fieldName4];
	$fieldValue5 = $fields['value'][$fieldName5];
	$fieldValue6 = $fields['value'][$fieldName6];
	$fieldValue7 = $fields['value'][$fieldName7];
	$fieldValue8 = $fields['value'][$fieldName8];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];
	$fieldHtml2 = $html_etc[$tablename][$fieldName2];
	$fieldHtml3 = $html_etc[$tablename][$fieldName3];
	$fieldHtml4 = $html_etc[$tablename][$fieldName4];
	$fieldHtml5 = $html_etc[$tablename][$fieldName5];
	$fieldHtml6 = $html_etc[$tablename][$fieldName6];
	$fieldHtml7 = $html_etc[$tablename][$fieldName7];
	$fieldHtml8 = $html_etc[$tablename][$fieldName8];

	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname."_ALL"];
	
	 //用户类型限制条件##########################开始
	 global $fields;
	 //print_R($fields['USER_PRIVATE']);
	 if($fields['USER_PRIVATE'][$fieldname]!="")	{
		 $readonly = $fields['USER_PRIVATE'][$fieldname];
		 $class = "SmallStatic";
		 $class2 = "BigStatic";
	 }
	 else	{
		 $readonly = "";
		 $class = "SmallInput";
		 $class2 = "BigInput";
	 }
	 //用户类型限制条件##########################结束

	print "<TR>\n";
    print "<TD class=TableData noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	$TableInfor['Content'][$fieldHtml]  = "		<input type=input size=6 $readonly name=$fieldname class=$class value='".$fieldvalue."'>";
	$TableInfor['Content'][$fieldHtml1] = "		<input type=input size=6 $readonly name=$fieldName1 class=$class value='".$fieldValue1."'>";
	$TableInfor['Content'][$fieldHtml2] = "		<input type=input size=6 $readonly name=$fieldName2 class=$class value='".$fieldValue2."'>";
	$TableInfor['Content'][$fieldHtml3] = "		<input type=input size=6 $readonly name=$fieldName3 class=$class value='".$fieldValue3."'>";
	$TableInfor['Content'][$fieldHtml4] = "		<input type=input size=6 $readonly name=$fieldName4 class=$class value='".$fieldValue4."'>";
	$TableInfor['Content'][$fieldHtml5] = "		<input type=input size=6 $readonly name=$fieldName5 class=$class value='".$fieldValue5."'>";
	$TableInfor['Content'][$fieldHtml6] = "		<input type=input size=6 $readonly name=$fieldName6 class=$class value='".$fieldValue6."'>";
	$TableInfor['Content'][$fieldHtml7] = "		<input type=input size=6 $readonly name=$fieldName7 class=$class value='".$fieldValue7."'>";
	$TableInfor['Content'][$fieldHtml8] = "		<textarea cols=42 $readonly name=\"$fieldName8\" rows=\"2\" class=\"$class2\" wrap=\"yes\">".$fieldValue8."</textarea>";
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	$TableInfor['cols'][$fieldHtml2] = "1";
	$TableInfor['cols'][$fieldHtml3] = "1";
	$TableInfor['cols'][$fieldHtml4] = "1";
	$TableInfor['cols'][$fieldHtml5] = "1";
	$TableInfor['cols'][$fieldHtml6] = "1";
	$TableInfor['cols'][$fieldHtml7] = "3";
	$TableInfor['cols'][$fieldHtml8] = "8";
	TableInforOutPut4($TableInfor,"60%");
	print "</TD>\n";
	print "</TR>\n";
}

//提供用户自定义类型：用于查阅数据时
function userDefineLinkman_view($fields,$i)		{
	global $db;	
	global $tablename,$html_etc,$common_html;
	global $departprivte,$columns,$SUNSHINE_USER_NAME_VAR;

	//######################################################
	//判断是否要进行用户定义的非角色只读非编辑选项 -- 开始
	$USER_PRIV_ID = $_SESSION['SUNSHINE_USER_PRIV'];
	$USER_PRIV = returntablefield("user_priv","USER_PRIV",$USER_PRIV_ID,"PRIV_NO");

	$fieldname = $fields['name'][$i];
	$fieldName1 = $fields['name'][$i+1];
	$fieldName2 = $fields['name'][$i+2];
	$fieldName3 = $fields['name'][$i+3];
	$fieldName4 = $fields['name'][$i+4];
	$fieldName5 = $fields['name'][$i+5];
	$fieldName6 = $fields['name'][$i+6];
	$fieldName7 = $fields['name'][$i+7];
	$fieldName8 = $fields['name'][$i+8];

	$fieldvalue = $fields['value'][$fieldname];
	$fieldValue1 = $fields['value'][$fieldName1];
	$fieldValue2 = $fields['value'][$fieldName2];
	$fieldValue3 = $fields['value'][$fieldName3];
	$fieldValue4 = $fields['value'][$fieldName4];
	$fieldValue5 = $fields['value'][$fieldName5];
	$fieldValue6 = $fields['value'][$fieldName6];
	$fieldValue7 = $fields['value'][$fieldName7];
	$fieldValue8 = $fields['value'][$fieldName8];

	$fieldHtml  = $html_etc[$tablename][$fieldname];
	$fieldHtml1 = $html_etc[$tablename][$fieldName1];
	$fieldHtml2 = $html_etc[$tablename][$fieldName2];
	$fieldHtml3 = $html_etc[$tablename][$fieldName3];
	$fieldHtml4 = $html_etc[$tablename][$fieldName4];
	$fieldHtml5 = $html_etc[$tablename][$fieldName5];
	$fieldHtml6 = $html_etc[$tablename][$fieldName6];
	$fieldHtml7 = $html_etc[$tablename][$fieldName7];
	$fieldHtml8 = $html_etc[$tablename][$fieldName8];

	$fieldHtml_ALL  = $html_etc[$tablename][$fieldname."_ALL"];
	//用户角色级别权限判断
	if($departprivte!="")		{
		$departprivteSQLArray = array();
		$departprivteArray = explode('::',$departprivte);
		for($k=0;$k<sizeof($departprivteArray);$k++)	{
			$privText = $departprivteArray[$k];
			$privTextArray = explode(':',$privText);
			switch($privTextArray[0])		{
				case 'user':
					$ColumnIndex1 = $privTextArray[1];
					$USER_NAME = $_SESSION[$SUNSHINE_USER_NAME_VAR];
					$ColumnName1 = $columns[$ColumnIndex1];
					break;
			}//end swtich
		}//end for
	}
	//############################################################
	//变量$SYSTEM_RECORD_EDIT_PRIV说明：控制EDIT、DELETE行记录行为
	//print_R($fields['value'][$ColumnName1]);//print $USER_NAME;
	//print $ColumnName1;
	if($fields['value'][$ColumnName1]!=""&&$ColumnName1!="")		{
		if($USER_NAME==$fields['value'][$ColumnName1] || $USER_PRIV==1 || $USER_PRIV==2 || $USER_PRIV==3)			{
			//可行，不用重新写值
		}
		else		{
			//没有权限，重新写值
			$fieldvalue = "***";
			$fieldValue1 = "***";
			$fieldValue2 = "***";
			$fieldValue3 = "***";
			$fieldValue4 = "***";
			$fieldValue5 = "***";
			$fieldValue6 = "***";
			$fieldValue7 = "***";
			$fieldValue8 = "***";
		}
	}
	else		{
		//可行，不用重新写值
	}
	//print $SYSTEM_RECORD_EDIT_PRIV;
	////SYSTEM_RECORD_EDIT_PRIV  为0时不显示选项，为1时显示选项
	//############################################################





	
	
	print "<TR>\n";
    print "<TD class=TableContent noWrap width=20%>".$fieldHtml_ALL.":</TD>\n";
    print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	$TableInfor['Content'][$fieldHtml]  = $fieldvalue;
	$TableInfor['Content'][$fieldHtml1] = $fieldValue1;
	$TableInfor['Content'][$fieldHtml2] = $fieldValue2;
	$TableInfor['Content'][$fieldHtml3] = $fieldValue3;
	$TableInfor['Content'][$fieldHtml4] = $fieldValue4;
	$TableInfor['Content'][$fieldHtml5] = $fieldValue5;
	$TableInfor['Content'][$fieldHtml6] = $fieldValue6;
	$TableInfor['Content'][$fieldHtml7] = $fieldValue7;
	$TableInfor['Content'][''] = '';
	$TableInfor['Content'][$fieldHtml8] = nl2br($fieldValue8);
	
	$TableInfor['cols'][$fieldHtml]  = "1";
	$TableInfor['cols'][$fieldHtml1] = "1";
	$TableInfor['cols'][$fieldHtml2] = "1";
	$TableInfor['cols'][$fieldHtml3] = "1";
	$TableInfor['cols'][$fieldHtml4] = "1";
	$TableInfor['cols'][$fieldHtml5] = "1";
	$TableInfor['cols'][$fieldHtml6] = "1";
	$TableInfor['cols'][$fieldHtml7] = "3";
	$TableInfor['cols'][''] = "1";
	$TableInfor['cols'][$fieldHtml8] = "8";
	TableInforOutPut3($TableInfor,"60%");
	print "</TD>\n";
	print "</TR>\n";
}

function userDefineLinkman_Value($fieldvalue)		{
	global $db;
	global $fields,$tablename,$html_etc,$common_html;
	return $fieldvalue;
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