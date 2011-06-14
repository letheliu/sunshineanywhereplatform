<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	if($_GET['action']=="add_default_data")		{
	   page_css('显示行数限制');
	   $显示行数 = $_POST['显示行数'];
	   if($显示行数 > 4){
	     print "<div align=\"center\" title=\"显示行数限制提醒\">
			    <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			    <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;为了保持桌面模块的整齐一致，显示行数不能大于4，请重新添加.</div>
			    </td></tr></table><br><div align=center>";
		 print "<input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-1);\"></div>";
		 exit;
	   }
    }

	if($_GET['action']=="edit_default_data")    {
	   page_css('显示行数限制');
	   $显示行数 = $_POST['显示行数'];
	   if($显示行数 > 4){
	     print "<div align=\"center\" title=\"显示行数限制提醒\">
			    <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			    <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;为了保持桌面模块的整齐一致，显示行数不能大于4，请重新设置.</div>
			    </td></tr></table><br><div align=center>";
		 print "<input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-1);\"></div>";
		 exit;
	   }
	}

	$filetablename		=	'crm_mytable';
	$parse_filename		=	'crm_mytable';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>说明：<br>
                            &nbsp;&nbsp;&nbsp;1、此模块是管理使用的，具有管理所有用户桌面模块设置的权限。<br>
			                &nbsp;&nbsp;&nbsp;2、如果是第一次登录系统，系统将对CRM桌面模块进行初始化。<br>        
			               </td></TR></table>";
			print $PrintText;
		}
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>