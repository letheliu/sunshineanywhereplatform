<?

	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);

	// display warnings and errors
	error_reporting(E_WARNING | E_ERROR);


	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();

	page_css("网络学习系统-在线报名-在线报名统计管理");

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
			 <Td colspan=60 align=left>网络学习系统统计条件</Td>
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
?>