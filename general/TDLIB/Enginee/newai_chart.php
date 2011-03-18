<?
//不再使用此模块
function newai_chart()	{
	global $common_html;
	global $table,$field,$filter,$mark,$title,$type,$time,$type;
	global $_POST,$_GET;
	$table_array=explode('::',$table);//print_R($table_array);
	$field_array=explode('::',$field);
	$filter_array=explode('::',$filter);
	$mark_array=explode('::',$mark);
	$title_array=explode('::',$title);
	$type_array=explode('::',$type);
	$time_array=explode('::',$time);
	for($i=0;$i<sizeof($table_array);$i++)		{
		$columns=returntablecolumn($table_array[$i]);
		$fieldname=$columns[(string)$field_array[$i]];
		$filter_element_array=explode(':',$filter_array[$i]);

		$columns_filter=returntablecolumn($filter_element_array[1]);
		$showvalue=$columns_filter[(string)$filter_element_array[2]];
		$showfield=$columns_filter[(string)$filter_element_array[3]];

	    $filename=$fieldname."_".$type_array[$i]."_".date(Y_m_d_H).".png";//exit;
		if($_GET['action']=='chart_model'&&$_GET['modelname']!='')	
			$filename=$_GET['modelname']."_".$filename;
		if($_GET['action']=='chart_user'&&$_GET['USER_NAME']!='')	
			$filename=$_GET['USER_NAME']."_".$filename;
		if($_GET['action']=='chart_project'&&$_GET['projectid']!='')	
			$filename=$_GET['projectid']."_".$filename;
		//print $filename;exit;
		$filedirname = "../cache/statics";
		if(!is_dir($filedirname))	
			mkdir($filedirname);
		$filename=$filedirname."/".$filename;
		$showtable=$filter_element_array[1];
		$mode=$filter_element_array[0];//print $filename;exit;
		file_exists($filename)?'':$filename=table_analyze($table_array[$i],$fieldname,$showtable,$showfield,$showvalue,$mode,$type_array[$i],$mark_array[$i],$title_array[$i]);
		file_exists($filename)?print "<div align=center><img src='$filename' border=0/></div><BR>":'';
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