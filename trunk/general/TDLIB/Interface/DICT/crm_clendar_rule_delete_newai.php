<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();


	//定义下拉菜单时,是否显示KEY字段
	$SYSTEM_SELECT_MENU_SHOW_KEY = 1;

	$SYSTEM_ADD_SQL = " and 类型='DELETE'";



	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		global $db;
		$_POST['类型'] = "DELETE";
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}




	if($_GET['action']==''||$_GET['action']=='init_default')		{
		//print_R($_SESSION);
		$操作文本 = "删除数据触发类型";
		$动作文本 = "add_default";
		$操作名称 = "操作名称";
		$操作数组 = explode(',',$操作文本);;
		$动作数组 = explode(',',$动作文本);;
		$操作_lin .= "";
		for($i=0;$i<sizeof($操作数组);$i++)
		{
			$操作名称 = $操作数组[$i];
			$操作_lin .= "&nbsp;<a href='?".base64_encode("XX=XX&action=".$动作数组[$i]."&$操作名称=".$操作名称."&XX=XX")."'>$操作名称</a>";
		}
		//如果未设定,指为全部班级
		if($_GET[$操作名称]=="")		{
			$_GET[$操作名称] = $操作数组[0];
		}
		else	{
		}
		$PrintText .= "<table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableData><td ><font color=green >
		请先手动选择触发类型:".$操作_lin."
		</font></td></table><BR>";
		print $PrintText;
	}


	//数据表模型文件,对应Model目录下面的crm_clendar_rule_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'crm_clendar_rule';
	$parse_filename		=	'crm_clendar_rule_delete';
	require_once('include.inc.php');

	require_once('../Help/module_message.php');

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