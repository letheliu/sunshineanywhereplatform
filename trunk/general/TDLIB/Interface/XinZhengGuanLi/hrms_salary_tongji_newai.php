<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-薪酬管理-薪酬统计");
	//print_r ($_GET);
	/*
	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);//exit;
		global $db;
		$入库数量 = (int)$_POST['入库数量'];$教材编号 = $_POST['教材编号'];
		$sql = "update edu_jiaocai set 现有库存=现有库存+$入库数量 where 教材编号='".$教材编号."'";
		$rs = $db->Execute($sql);//print $sql;exit;
		$_POST['编作者'] = returntablefield("edu_jiaocai","教材编号",$教材编号,"编作者");
		$_POST['出版社'] = returntablefield("edu_jiaocai","教材编号",$教材编号,"出版社");
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}
	*/

	//数据表模型文件,对应Model目录下面的hrms_salary_tongji_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'hrms_salary_tongji';
	$parse_filename		=	'hrms_salary_tongji';
	require_once('include.inc.php');


	$工资项目=item();
	$g=sizeof($工资项目);
	$g+=2;
	echo '<table width="100%" class="TableBlock" align="center">';

	echo '<tr class="TableHeader" align="center"><td colspan='.$g.'>'.date('Y').'年'.date('m').'月薪酬统计&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="send_salary_email_result.php">发送工资条</a></td></tr>';

	echo '<tr class="TableHeader" align="center">';
	echo '<td>部门</td>';echo '<td>姓名</td>';

	//print_r($工资项目);
	for($i=0;$i<sizeof($工资项目);$i++){
		echo '<td>';
		echo $工资项目[$i]['费用名称'];
		echo '</td>';

	}
	echo '</tr>';
	$name=person();
	for($x=0;$x<sizeof($name);$x++)				{
		echo '<tr class="TableData" align="center">';
		$bm=depart($name[$x]['USER_NAME']);
		echo '<td>'.$bm.'</td><td>'.$name[$x]['USER_NAME'].'</td>';
		for($y=0;$y<sizeof($工资项目);$y++)		{
           $salary_item=person_salary_item($name[$x]['USER_NAME'],$工资项目[$y]['费用名称']);
		   echo '<td>'.$salary_item.'</td>';
		}
		echo '</tr>';
	}

//数据结束
echo '<tr class="TableHeader" align="center" >';
echo '<td colspan="2">合计</td>';
$hhh=Array();
for($i=0;$i<sizeof($工资项目);$i++){
		echo '<td>';
        $summ=item_sum($工资项目[$i]['费用名称']);
		$hhh[$i]=$summ;
		echo $summ;
		echo '</td>';
	}
echo '</tr>';
//合计结束
echo '<tr class="TableHeader" align="center" >';
echo '<td colspan="2">总计</td>';
for($z=0;$z<sizeof($hhh);$z++){
   static $mmm;
    $mmm=$mmm+$hhh[$z];
}
if($mmm!="") echo '<td colspan='.sizeof($hhh).'>'.$mmm.'</td>';
echo '</tr>';
//总计结束

echo '</table>';
//	print_r($hhh);


	function item(){
		global $db;
		$sql="select 费用名称 from hrms_salary_type order by 费用名称 desc";
		$rs=$db->Execute($sql);
		$rs_a=$rs->GetArray();
		if(!is_array($rs_a))
			$rs_a=Array();
		$工资项目=$rs_a;
		return $工资项目;

	}
	function person_salary_item($name,$type){
		global $db;
		$h1=date("Y");
		$h2=date("m");
		//$h2=$h2-1;

		$sql="select 金额 from hrms_salary_detail where 费用人员='".$name."' and 费用名称='".$type."' and 年份='".$h1."' and 月份='".$h2."'";
		$rs=$db->Execute($sql);
		$rs_aa=$rs->fields['金额'];
		//if(!is_array($rs_aa)) $rs_aa=Array();
		return $rs_aa;

	}
    function person(){
	  global $db;
	  $sql="select USER_NAME from user";
	  $rs=$db->Execute($sql);
	  $rs_name=$rs->GetArray();
      if(!is_array($rs_name)) $rs_name=Array();
	  return $rs_name;
	}
	function depart($name){
		 global $db;
		 $bmsql="select department.DEPT_NAME AS DEPT_NAME from department,user where user.DEPT_ID=department.DEPT_ID and user.USER_NAME='".$name."'";
		 $rs=$db->Execute($bmsql);
		 $rs_dp=$rs->fields['DEPT_NAME'];
		 return $rs_dp;

	}
	function item_sum($item){
        global $db;
		$h1=date("Y");
		$h2=date("m");
		//$h2=$h2-1;
	   $sql="select sum(金额) AS 总和 from hrms_salary_detail where 费用名称='".$item."' and 年份='".$h1."' and 月份='".$h2."'";
	   $rs=$db->Execute($sql);
	   $sum=$rs->fields['总和'];
	   return $sum;

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