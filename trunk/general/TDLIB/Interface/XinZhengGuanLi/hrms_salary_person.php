<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');//

$GLOBAL_SESSION=returnsession();
//echo 'hello';
$部门=$_GET['bumen'];$姓名=$_GET['name'];$年份=$_GET['y'];$月份=$_GET['m'];
//echo $部门.$姓名.$年份.$月份;
page_css("薪酬统计");
$信息=InFo($姓名,$年份,$月份);
//print_r($信息);
echo '<table class="TableBlock" align="center">';echo '<tr class="TableHeader">';
echo '<td>类别</td>';echo '<td>金额</td>';echo '</tr>';

for($i=0;$i<sizeof($信息);$i++){
  echo '<tr class="TableData" align="center">';
  echo '<td>'.$信息[$i]['费用名称'].'</td>';
   echo '<td>'.$信息[$i]['金额'].'</td>';
  echo '</tr>';
}
echo '</table>';
?>

<?
function InFo($name,$y,$m){
 global $db;
 $sql="select 费用名称,金额 from hrms_salary_detail where 费用人员='".$name."' and 年份='".$y."' and 月份='".$m."'";
 $rs=$db->Execute($sql);
$rs_a = $rs -> GetArray();
		if(!is_array($rs_a))
		$rs_a = array();
		$信息 = $rs_a;
		return $信息;

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