<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


//$MenuArray[] = array('290','node_user','教师职称学历设置','EDU/Interface/EDU/edu_teacher_zhicheng_newai.php');
//$MenuArray[1]['title'] = '课酬计算参数设置';
//$MenuArray[1]['menucode'] = 'node_user';
$MenuArray[] = array('302','node_user','普通课程班级系数表','EDU/Interface/DICT/dict_kechouclassnumber1_newai.php');
//$MenuArray[] = array('302','node_user','实训课程班级系数表','EDU/Interface/EDU/dict_kechouclassnumber2_newai.php');
$MenuArray[] = array('302','node_user','理论课工作量计算方法','EDU/Interface/DICT/dict_kechouworking_newai.php');
//$MenuArray[] = array('302','node_user','教师课时工资金额设置','EDU/Interface/EDU/kechou_setting.php');
$MenuArray[] = array('302','node_user','教师课表工作量计算','EDU/Interface/EDU/edu_kechoujisuan_kechou.php');
$MenuArray[] = array('286','node_user','课表工作量列表显示','EDU/Interface/EDU/edu_kechoujisuan_newai.php');
//$MenuArray[] = array('268','node_user','其他教学及教辅工作量设置','EDU/Interface/EDU/edu_kechoutongji_qitagongzuoliang.php');
$MenuArray[] = array('268','node_user','教师工作量统计输出','EDU/Interface/EDU/edu_kechoutongji.php');
$MenuArray[] = array('268','node_user','其他教学工作量管理','EDU/Interface/EDU/edu_kechouqita_newai.php');
$MenuArray[] = array('268','node_user','教辅教学工作量管理','EDU/Interface/EDU/edu_kechoujiaofu_newai.php');
$MenuArray[] = array('268','node_user','部门工作量汇总','EDU/Interface/EDU/edu_kechoutongji_bumen.php');
//$MenuArray[] = array('302','node_user','教学科研相关业务工作量计算','EDU/Interface/EDU/edu_kechoukeyan_newai.php');
//$MenuArray[] = array('286','node_user','教学科研相关业务薪酬计算','EDU/Interface/EDU/edu_kechoukeyan_newai.php');
//$MenuArray[] = array('286','node_user','教师学历信息设置','EDU/Interface/EDU/dict_education_newai.php');
//$MenuArray[] = array('286','node_user','教师职称信息设置','EDU/Interface/EDU/dict_zhicheng_newai.php');
//$MenuArray[] = array('268','node_user','权限分配设定','EDU/Framework/inc_kechou_priv.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "教师工作量计算管理";

page_css("教师工作量计算管理");



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
   <span>教师工作量计算</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$菜单代码 = $MenuArray[$i][1];
	$菜单名称 = $MenuArray[$i][2];
	$菜单地址 = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($菜单名称);
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='../../".$菜单地址."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$菜单名称</td>
		   </tr>
		   ";
	}
}
print "</table>
   </div>";
/*
print "
<li>
	<a href=\"group\" onclick=\"\" target=\"address_main\" title=\"管理分组\" id=\"link_4\">
	<span>管理分组</span>
	</a>
</li>";
*/
print "</ul>";



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