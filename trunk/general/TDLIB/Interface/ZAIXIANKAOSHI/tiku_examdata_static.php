<?

	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);


	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();

	page_css("网络学习系统-在线考试-学生考试成绩");


	if($_GET['action'] == "")
	{
	$sql = "select 考试名称 as 名称  from tiku_kaoshi where 参加考试班级 != ''";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	$名称 = $rs_a;
	$选择名称 = $_GET['名称'];

if($_GET['名称']=="") {
	$选择名称 = $名称[0]['名称'];
}

				//********条件检索********//
	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader>
			 <Td colspan=60 align=left>学生考试成绩统计条件</Td>
			</Tr>";

	print	"<Tr class=TableData>";
	print	 "<Form name=factor>";

	print	 "<Td align=center>考试名称</Td>";
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

$sql ="SELECT  `考试名称`,`试卷名称`,`学号`,`姓名`,`班级`,sum(所得分值) as 成绩 FROM `tiku_examdata` where `考试名称` = '$选择名称' group by 考试名称,学号";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs -> GetArray();

	   	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader><Td colspan=6 align=left>（".($选择名称)."）学生考试成绩统计</Td></Tr>";
		print  "<Tr class=TableData>
		<td align=center  nowrap>试卷名称</td>
		<td align=center  nowrap>学号</td><td align=center  nowrap>姓名</td>
		<td align=center  nowrap>班级</td><td align=center  nowrap>成绩</td>
		<td align=center  nowrap>操作</td>
		</Tr>";

	 for($i=0;$i<sizeof($rs_a);$i++)
	 {
		 if($i%2==0) $color="green"; else $color="red";

		 $URL = "tiku_examdata_newai.php?action=init_customer&学号=".$rs_a[$i]['学号']."&考试名称=$选择名称&action_close=close";
		 print "<Tr class=TableData>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['试卷名称']."</font></Td>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['学号']."</font></Td>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['姓名']."</font></Td>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['班级']."</font></Td>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['成绩']."</font></Td>";


		 print "<Td nowrap align=center><a href =\"$URL\" target=_blank><font color=$color>查看试卷</font></a></Td>";
		 print "</Tr>";
	 }
	print "</table>";
	}
?>