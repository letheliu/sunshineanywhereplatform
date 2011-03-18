<?
function return_parent_group_all($group_array,$select_text,$user_session)	{
	global $db;
	switch($db->databaseType)		{
		case 'mssql':
			$sql_all="select $select_text from [".$group_array['tablename']."] where [".$group_array['sql_text']['user']."]='$user_session'";
			break;
		case 'mysql':
		default:
			$sql_all="select $select_text from ".$group_array['tablename']." where ".$group_array['sql_text']['user']."='$user_session'";
			break;
	}//end switch

	//print $sql_all;

	$rs_all=$db->Execute($sql_all);
	$ra_all=$rs_all->GetArray();
	$navigation=array();
	foreach($ra_all as $list)	{
		$navigation['index'][(string)$list[(string)$group_array['sql_text'][id]]]=$list[(string)$group_array['sql_text'][id]];
		$navigation['parent'][(string)$list[(string)$group_array['sql_text'][id]]]=$list[(string)$group_array['sql_text'][parent]];
		$navigation['index_name'][(string)$list[(string)$group_array['sql_text'][id]]]=$list[(string)$group_array['sql_text'][name]];
	}//print_R($navigation);
	return $navigation;
}

function return_parent_js($navigation,$showtext,$showfield,$value,$colspan)				{
	global $db;
	$parent=array_keys($navigation['parent']);
	$value=array_values($navigation['parent']);
	//print_R($navigation);print "<BR>";
	print "<TR>";
	print "<TD class=TableData noWrap>".$showtext."</TD>\n";
	print "<TD class=TableData noWrap colspan=\"$colspan\">\n";
	print "<select class=\"SmallSelect\" name=\"$showfield\" onkeydown=\"if(event.keyCode==13)event.keyCode=9\" >\n";
	print "<option value=\"0\">Root</option>\n";
	for($i=0;$i<sizeof($parent);$i++)			{
		$temp=return_navigation($navigation,$parent[$i]);
		$counter=0;
		foreach($temp as $list)		{
			$array[$counter++]=$navigation['index_name'][$list].'/';
		}
		$text=join('',$array);
		print "<option value=\"$list\">".$text."</option>\n";
	}
	print "</select>\n";
	print "</TD></TR>\n";
	
}

function select_return_navigation($showtext,$showfield,$value,$colspan)		{
	global $common_html,$db,$group_user;
	global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
	$group_array=return_parent_group();//print_R($group_array);
	$array_pop=array_pop($group_array['sql_text']);

	switch($db->databaseType)		{
		case 'mssql':
			$select_text="[".join('],[',$group_array['sql_text'])."]";
			break;
		case 'mysql':
		default:
			$select_text=join(',',$group_array['sql_text']);
			break;
	}//end switch

	$user_session=$_SESSION[$SUNSHINE_USER_NAME_VAR];

	switch($array_pop)		{
		case 'user':
			break;
		case 'group':
			$temp_field=$group_array['sql_text'][user];
			$user_session=$_GET[$temp_field];
			break;
		default:
			break;
	}//print_R($group_array);

	$navigation=return_parent_group_all($group_array,$select_text,$user_session);
	$navigation['index_name'][0]='Root';
	return_parent_js($navigation,$showtext,$showfield,$value,$colspan);
	return $navigation;
}

function parent_group()				{
	global $common_html,$db,$group_user,$_GET;
	global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
	$group_array=return_parent_group();//print_R($group_array['sql_text']);
	$array_pop=array_pop($group_array['sql_text']);
	
	switch($db->databaseType)		{
		case 'mssql':
			$select_text="[".join('],[',$group_array['sql_text'])."]";
			break;
		case 'mysql':
		default:
			$select_text=join(',',$group_array['sql_text']);
			break;
	}//end switch

	$user_session=$_SESSION[$SUNSHINE_USER_NAME_VAR];
	$parentvalue=isset($parentvalue)?$parentvalue:$_GET[(string)$group_array['sql_text'][id]];
	$parentvalue=isset($parentvalue)?$parentvalue:0;
	$_GET['GROUP_TWO']=isset($_GET['GROUP_TWO'])?$_GET['GROUP_TWO']:0;

	switch($array_pop)		{
		case 'user':
			break;
		case 'group':
			$temp_field=$group_array['sql_text'][user];
			$user_session=$_GET[$temp_field];
			$add_text_group=$group_array['sql_text'][user]."=".$user_session."";
			break;
		default:
			break;
	}//print_R($group_array);

	//$sql="select $select_text from ".$group_array['tablename']." where ".$group_array['sql_text'][user]."='$user_session' and ".$group_array['sql_text'][parent]."='$parentvalue'";

	switch($db->databaseType)		{
		case 'mssql':
			$sql="select $select_text from [".$group_array['tablename']."] where [".$group_array['sql_text'][user]."]='$user_session' and [".$group_array['sql_text'][parent]."]='$parentvalue'";
			break;
		case 'mysql':
		default:
			$sql="select $select_text from ".$group_array['tablename']." where ".$group_array['sql_text'][user]."='$user_session' and ".$group_array['sql_text'][parent]."='$parentvalue'";
			break;
	}//end switch

	$rs=$db->Execute($sql);
	$navigation=return_parent_group_all($group_array,$select_text,$user_session);
	$navigation['index_name'][0]='Root';
	
	$navigation_name=$_GET[(string)$group_array['sql_text'][id]];
	$navigation_name=isset($navigation_name)?$navigation_name:0;
	$nav_array=return_navigation($navigation,$navigation_name);
	
	print "<TR bgColor='#FFFFFF' onMouseOut=bgColor='#FFFFFF'  onMouseOver=bgColor='#E6F2FF'>\n";
	print "<TD noWrap align=left colspan=32>&nbsp;&nbsp;&nbsp;&nbsp;\n";
	for($i=0;$i<sizeof($nav_array);$i++)		{
		$return_parent=FormPageAction($group_array['sql_text'][id],$nav_array[$i]);
		//$return_parent=returnpageaction($mode='group_filter',array('index_name'=>$group_array['sql_text'][id],'index_id'=>$nav_array[$i]));
		//if($i!=sizeof($nav_array)-1)	{
			print "<a href=\"?$return_parent\">".$navigation['index_name'][(string)$nav_array[$i]]."</a> >> ";
		//}
		//else	{
		//	print $navigation['index_name'][(string)$nav_array[$i]];
		//}
	}
	print "</TD></TR>\n";
	global $row_element;
	while(!$rs->EOF)		{
		$counter++;
		print "<TR bgColor='#FFFFFF' onMouseOut=bgColor='#FFFFFF'  onMouseOver=bgColor='#E6F2FF'>\n";
		print "<TD noWrap align=left colspan=32>&nbsp;&nbsp;&nbsp;&nbsp;\n";
		//$return=returnpageaction($mode='group_filter',array('index_name'=>$group_array['sql_text'][id],'index_id'=>$rs->fields[(string)$group_array['sql_text'][id]]));
		$return=FormPageAction($group_array['sql_text'][id],$rs->fields[(string)$group_array['sql_text'][id]]);
		print "<a href=\"?$return\">".$rs->fields[(string)$group_array['sql_text'][name]]."</a>\n";
		if($row_element!='')				{
		print "　[<a href='?action=edit_group&".$group_array['sql_text'][id]."=".$rs->fields[(string)$group_array['sql_text'][id]]."&".$group_array['sql_text'][parent]."=".$rs->fields[(string)$group_array['sql_text'][parent]]."&$add_text_group'>".$common_html['common_html']['edit']."</a>\n";
		print "<a href=\"javascript:if(confirm('".$common_html['common_html']['reallydeletefolder']."'))location='?action=delete_group&".$group_array['sql_text'][id]."=".$rs->fields[(string)$group_array['sql_text'][id]]."&".$group_array['sql_text'][parent]."=".$rs->fields[(string)$group_array['sql_text'][parent]]."&$add_text_group'\">".$common_html['common_html']['delete']."</a>]\n";
		}//end if--row_element
		print "</TD>\n";
		print "</TR>\n";
		$rs->MoveNext();
	}
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