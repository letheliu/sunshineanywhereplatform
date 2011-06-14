<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$UNIT_NAME = "数据字典";

$MenuArray[] = array('286','node_user','客户等级','crm_customer_grade_newai.php');
$MenuArray[] = array('286','node_user','客户类型','crm_customer_type_newai.php');
$MenuArray[] = array('286','node_user','客户来源','crm_dict_source_newai.php');
$MenuArray[] = array('286','node_user','需求主体','crm_dict_needsubject_newai.php');
$MenuArray[] = array('286','node_user','费用类型','crm_dict_expensetypes_newai.php');
$MenuArray[] = array('286','node_user','需求类型','crm_dict_needtype_newai.php');
$MenuArray[] = array('286','node_user','需求时间','crm_dict_needtime_newai.php');
$MenuArray[] = array('286','node_user','服务满意度','crm_dict_satisfaction_newai.php');
$MenuArray[] = array('286','node_user','服务阶段','crm_dict_servicepharse_newai.php');
$MenuArray[] = array('286','node_user','服务来源','crm_dict_servicesources_newai.php');
$MenuArray[] = array('286','node_user','服务状态','crm_dict_servicestatus_newai.php');
$MenuArray[] = array('286','node_user','服务类型','crm_dict_servicetypes_newai.php');
$MenuArray[] = array('286','node_user','产品分组','crm_product_group_newai.php');
$MenuArray[] = array('286','node_user','业务类型','crm_yewu_type_newai.php');
$MenuArray[] = array('286','node_user','票据类型','crm_piaoju_type_newai.php');
$MenuArray[] = array('286','node_user','所属分类','crm_suoshufenlei_sq_newai.php');
$MenuArray[] = array('286','node_user','银行账户','crm_yinhangzh_newai.php');
$MenuArray[] = array('286','node_user','桌面显示属性','crm_mytable_xssx_newai.php');
$MenuArray[] = array('286','node_user','桌面显示位置','crm_mytable_wz_newai.php');

//$MenuArray[] = array('286','node_user','测试***1','crm_mytable/crm_notes.php');
//$MenuArray[] = array('286','node_user','测试***2','crm_mytable/crm_google.php');
//$MenuArray[] = array('286','node_user','测试***3','crm_mytable/crm_mytable_kehugaishu.php');
//$MenuArray[] = array('286','node_user','测试***4','crm_mytable/crm_kehu_birthday.php');
//$MenuArray[] = array('286','node_user','测试***5','crm_mytable/kehu_chaxun.php');
//$MenuArray[] = array('286','node_user','测试***6','crm_mytable/crm_mytable_hetong.php');
//$MenuArray[] = array('286','node_user','测试***7','crm_mytable/crm_mytable_fuwu.php');
//$MenuArray[] = array('286','node_user','测试***8','crm_mytable/crm_mytable_feiyong.php');
//$MenuArray[] = array('286','node_user','测试***9','crm_mytable/crm_mytable_dingdan.php');
//$MenuArray[] = array('286','node_user','测试***10','crm_mytable/crm_mytable_tongzhi.php');

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];
page_css($UNIT_NAME);
print "
<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/menu_left.css\" />\n
<script language=\"JavaScript\" src=\"/inc/js/menu_left.js\"></script>\n
<script language=\"JavaScript\" src=\"/inc/js/hover_tr.js\"></script>\n
";

print "\n<style>\nli span{\n
  background: url(\"/theme/$LOGIN_THEME/arrow_d.gif\") no-repeat left;\n
  display:block;\n
  padding-top:3px;\n
  padding-left:16px;\n
}</style>\n";
print "
<ul>\n
   <li>\n
   <span>$UNIT_NAME</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n";

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	if(1)		{
		print "<tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td></tr>";
	}
}
print "</table></div>";
print "</ul>";



?><?
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