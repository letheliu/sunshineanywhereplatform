<?

$salary9 = "薪酬";
function salary9_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = 0;
	$所属部门=strip_tags($fields['value'][$i]['所属部门']);
	$姓名=strip_tags($fields['value'][$i]['姓名']);
	$年份=strip_tags($fields['value'][$i]['年份']);
	//$一月 = strip_tags($fields['value'][$i]['一月']);
	
	//$二月 = strip_tags($fields['value'][$i]['二月']);
	//$三月 = strip_tags($fields['value'][$i]['三月']);
	//$四月  = strip_tags($fields['value'][$i]['四月']);
	//$五月 = strip_tags($fields['value'][$i]['五月']);
	//$六月 = strip_tags($fields['value'][$i]['六月']);
	//$七月 = strip_tags($fields['value'][$i]['七月']);
	//$八月 = strip_tags($fields['value'][$i]['八月']);
	$九月 = strip_tags($fields['value'][$i]['九月']);
	//$十月 = strip_tags($fields['value'][$i]['十月']);
	//$十一月 = strip_tags($fields['value'][$i]['十一月']);
	//$十二月 = strip_tags($fields['value'][$i]['十二月']);
	
	//if($一月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=1\">'.$一月.'</a>';
	
	//if($二月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=2\">'.$二月.'</a>';
	//if($三月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=3\">'.$三月.'</a>';
	//if($四月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=4\">'.$四月.'</a>';
	//if($五月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=5\">'.$五月.'</a>';
	//if($六月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=6\">'.$六月.'</a>';
	//if($七月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=7\">'.$七月.'</a>';
	//if($八月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=8\">'.$八月.'</a>';
	if($九月 != 0) $Text="<a href='hrms_salary_person.php?bumen=".$所属部门."&name=".$姓名."&y=".$年份."&m=9'>".$九月.'</a>';
	//if($十月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=10\">'.$十月.'</a>';
	//if($十一月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=11\">'.$十一月.'</a>';
	//if($十二月 != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$所属部门&name=$姓名&y=$年份&m=12\">'.$十二月.'</a>';
	
	




	return $Text;
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