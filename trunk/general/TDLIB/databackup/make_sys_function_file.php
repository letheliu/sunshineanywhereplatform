<?

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
@set_time_limit(120000);


$SERVER_NAME = $_SERVER['SERVER_NAME'];



require_once('../adodb/adodb.inc.php');
require_once('../config.inc.php');
require_once('../setting.inc.php');
require_once('../Enginee/lib/function_system.php');




###############################################################################
//重写菜单文件开始
###############################################################################



$MetaDatabases = $db->MetaDatabases();
if(in_array("TD_OA",$MetaDatabases))		{

	$filename_all = "sys_function_all.php";
	$filename_all_text = "<?\n\$SYS_FUNCTION = array(\n";

	$filename_sinlge = "sys_function.php";
	$filename_sinlge_text = "<?\n\$SYS_FUNCTION = array(\n";

	$sql = "select * from TD_OA.sys_menu order by MENU_ID";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	for($iX=0;$iX<sizeof($rsX_a);$iX++)			{
		$MENU_ID = $rsX_a[$iX]['MENU_ID'];
		$MENU_NAME = $rsX_a[$iX]['MENU_NAME'];
		$IMAGE = $rsX_a[$iX]['IMAGE'];
		$filename_all_text .= "   \"m$MENU_ID\" => array(\"MENU_ID\" => \"$MENU_ID\", \"FUNC_NAME\" => \"$MENU_NAME\", \"IMAGE\" => \"$IMAGE\"),\n";

		$sql = "select * from TD_OA.sys_function where MENU_ID like '$MENU_ID%' order by MENU_ID";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)			{
			$FUNC_ID = $rs_a[$i]['FUNC_ID'];
			$MENU_ID = $rs_a[$i]['MENU_ID'];
			$FUNC_NAME = $rs_a[$i]['FUNC_NAME'];
			$FUNC_CODE = $rs_a[$i]['FUNC_CODE'];
			$FUNC_CODE_ARRAY = explode('/',$FUNC_CODE);;
			$IMAGE = $FUNC_CODE_ARRAY[0];
			$filename_all_text .= "   \"$FUNC_ID\" => array(\"FUNC_ID\" => \"$FUNC_ID\", \"MENU_ID\" => \"$MENU_ID\", \"FUNC_NAME\" => \"$FUNC_NAME\", \"FUNC_CODE\" => \"$FUNC_CODE\", \"IMAGE\" => \"$IMAGE\"),\n";
			$filename_sinlge_text .= "   \"$FUNC_ID\" => \"$FUNC_CODE\",\n";

		}

	}

	$filename_all_text .= ");\n?>\n";
	$filename_sinlge_text .= ");\n?>\n";

	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	writeFile11111($DOCUMENT_ROOT."inc/".$filename_all,$filename_all_text);
	writeFile11111($DOCUMENT_ROOT."inc/".$filename_sinlge,$filename_sinlge_text);


}
###############################################################################
//重写菜单文件结束
###############################################################################
function writeFile11111($filename,$text)        {
	if(strlen($text)==0)    return;
	@!$handle = @fopen($filename, 'w');
	if (!@fwrite($handle, $text)) {
		exit;
		}
	@fclose($handle);
	//highlight_string($text);
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