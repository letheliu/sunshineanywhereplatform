<?

	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);

	// display warnings and errors
	error_reporting(E_WARNING | E_ERROR);


	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();

	page_css("在线报名考试-在线报名-在线报名统计管理");

	//*******************画表查询*******************//

	if($_GET['action'] == "")
	{
	$sql = "select 名称  from edu_baomingname";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	$名称 = $rs_a;
	$选择名称 = $_GET['名称'];

if($_GET['名称']=="") {
	$选择名称 = $名称[0]['名称'];
}

	//*******************画表查询*******************//
				//********条件检索********//
	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader>
			 <Td colspan=60 align=left>在线报名考试统计条件</Td>
			</Tr>";

	print	"<Tr class=TableData>";
	print	 "<Form name=factor>";

	print	 "<Td align=center>名称</Td>";
	print	 "<Td align=center>";
	print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&名称=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
			   for($i=0;$i<sizeof($名称);$i++)
			   {
				   if($选择名称==$名称[$i]['名称'])
				   {
					   $Selected = "selected";
				   }
				   else
				   {
					   $Selected = "";
				   }
	print		  "<Option value='".$名称[$i]['名称']."' ".$Selected.">".$名称[$i]['名称']."</Option>";
			   }
	print	 "</Select>";
	print	 "</Td></table><br>";

		  //---------------------------------数据显示区----------------------------

$sql ="SELECT 班级,count(*) as 人数 FROM `edu_baomingdetail` where 名称 = '".$选择名称."' group by `班级`";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs -> GetArray();

	   	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader><Td colspan=2 align=left>（".($选择名称)."）各班级报名情况统计</Td></Tr>";
		print  "<Tr class=TableData>
		<td align=center  nowrap>班级</td><td align=center  nowrap>报名人数</td>";

	 for($i=0;$i<sizeof($rs_a);$i++)
	 {
		 if($i%2==0) $color="green"; else $color="red";
		 //print_R($rs_a);
		 $URL = "edu_baomingdetail_newai.php?action=init_customer&班级=".$rs_a[$i]['班级']."&名称=$选择名称&action_close=close";
		 print "<Tr class=TableData>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['班级']."</font></Td>";
		 print "<Td nowrap align=center><a href =\"$URL\" target=_blank><font color=$color>".$rs_a[$i]['人数']."</font></a></Td>";
		 print "</Tr>";
	 }
	print "</table>";
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