<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('../include.inc.php');
//
//$GLOBAL_SESSION=returnsession();
$common_html=returnsystemlang('common_html');
//print_R($_GET);
//print_R($_POST);
print "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">
<LINK href=\"../../../theme/9/style.css\" rel=stylesheet>";
$_POST['MACHINE_CODE']==''?exit:'';
//print $_POST['MACHINE_CODE'];
$machinecode=machinecode_sunshine_512_2000($_POST['MACHINE_CODE']);
if($machinecode==$_POST['REGISTER_CODE'])		{
	$filename='license.ini';
	@unlink($filename);
	$somecontent="[section]\n MACHINE_CODE=".$_POST['MACHINE_CODE']."\n REGISTER_CODE=".$_POST['REGISTER_CODE']."\n SERVER_NAME=".$_POST['SERVER_NAME']."\n SCHOOL_NAME=".$_POST['SCHOOL_NAME']."";
	@!$handle = fopen($filename, 'w');
	if (!fwrite($handle, $somecontent)) {
		exit;
	}
	fclose($handle);
	page_css('Register');
	$common_text['zh']='注册成功!';
	$common_text['en']='Register successful!';
	require_once('../Enginee/newai_executesql.php');
	returnRegisterExpireUserNumber();
	print_infor($common_text[$systemlang],'trip',"location='register.php'");
	//print "<div align=center><input type=button class=SmallButton value='返回' onClick=\"location='register.php'\" /></div>";
}
else		{
	$common_text['zh']='注册失败!';
	$common_text['en']='Register failed!';
	page_css('Register');
	print_infor($common_text[$systemlang],'trip',"location='register.php'");
	//print "<div align=center><input type=button class=SmallButton value='返回' onClick=\"location='register.php'\" /></div>";
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