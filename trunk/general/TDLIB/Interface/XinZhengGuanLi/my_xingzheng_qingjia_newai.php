<?
	require_once('lib.inc.php');//

	$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("人力资源-行政考勤-我的考勤");
page_css('请假外出');
$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
if($_GET['学期']=="") $_GET['学期'] = $当前学期;
$学期名称 = $当前学期;


	$_GET['人员'] = $_SESSION['LOGIN_USER_NAME'];
	$_GET['人员用户名'] = $_SESSION['LOGIN_USER_ID'];
	//$_GET['部门'] = returntablefield("department","DEPT_ID",$_SESSION['LOGIN_DEPT_ID'],"DEPT_NAME");


if($_GET['action']=='QingJiaDataDeal')				{

	$部门 = $_GET['部门'];
	$班次 = $_GET['班次'];
	$日期 = $_GET['日期'];
	$周次 = $_GET['周次'];
	$人员 = $_SESSION['LOGIN_USER_NAME'];
	$新上班时间Array = explode(' ',$_POST['新上班时间']);
	$新上班时间 = $新上班时间Array[0];
	$新班次 = $新上班时间Array[1];
	$编号 = $_POST['编号'];
	$query = "insert into td_edu.edu_xingzheng_qingjia values('','$学期名称','$部门','$人员','$日期','$周次','$班次','','0','$RUN_ID','$审核人','$审核时间','".$_SESSION['LOGIN_USER_ID']."');";
	//print_R($_GET);
	//print $query;exit;
	print "<BR><BR><div align=center><font color=green>你的操作己经处理!</font></div>";
	//exequery($connection,$query);
	$db->Execute($query);
	print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?action=add_default&RUN_ID=$RUN_ID'>\n";
	exit;
}

if($_GET['action']=='QingJiaDelete')				{

	$部门 = $_GET['部门'];
	$班次 = $_GET['班次'];
	$人员 = $_SESSION['LOGIN_USER_NAME'];
	//如果数据存在则进行数据编辑操作
	//$query = "delete from td_edu.edu_xingzheng_qingjia where 编号='$编号' and 班次='$班次' and 学期='$学期名称' and 调休审核状态='0'";
	$编号 = $_GET['编号'];
	$query = "delete from td_edu.edu_xingzheng_qingjia where 编号='$编号'  and 审核状态='0'";
	//print $query;
	print "<BR><BR><div align=center><font color=green>你的操作己经处理!</font></div>";
	//exequery($connection,$query);
	$db->Execute($query);
	print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?action=add_default&RUN_ID=$RUN_ID'>\n";
	exit;
}
if($_GET['action2']=='QingJiaDelete')				{

	$部门 = $_GET['部门'];
	$班次 = $_GET['班次'];
	$人员 = $_SESSION['LOGIN_USER_NAME'];
	//如果数据存在则进行数据编辑操作
	//$query = "delete from td_edu.edu_xingzheng_qingjia where 编号='$编号' and 班次='$班次' and 学期='$学期名称' and 调休审核状态='0'";
	$编号 = $_GET['编号'];
	$query = "delete from td_edu.edu_xingzheng_qingjia where 编号='$编号'  and 审核状态='0'";
	//print $query;
	print "<BR><BR><div align=center><font color=green>你的操作己经处理!</font></div>";
	//exequery($connection,$query);
	$db->Execute($query);
	print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?RUN_ID=$RUN_ID'>\n";
	exit;
}





if($_GET['action']=='add_default')
{
// print_R($_GET);exit;
 ?>
 
 
<form name=form1>
<table class="TableList" width="100%">
    <tr class="TableHeader">
      <td nowrap align="center">部门</td>
      <td nowrap align="center">班次</td>
	  <td nowrap align="center">上班时间</td>
      <td nowrap align="center">班次</td>
      <td nowrap align="center">操作</td>
    </tr>
<?
  $人员 = $_SESSION['LOGIN_USER_NAME'];

  $开始时间 = date("Y-m-d",mktime(1,1,1,date('m'),date('d')-1,date('Y')));
  $结束时间 = date("Y-m-d",mktime(1,1,1,date('m'),date('d')+14,date('Y')));

  $开始时间 = date("Y-m-d",mktime(1,1,1,date('m'),date('d')-1,date('Y')));
  $结束时间 = date("Y-m-d",mktime(1,1,1,date('m'),date('d')+14,date('Y')));

  $query = "select 星期,班次,人员,班次,日期,部门,编号,周次 from  td_edu.edu_xingzheng_kaoqinmingxi  where 人员='$人员' and 日期>='$开始时间' and 日期<='$结束时间' and 下班考勤状态!='请假外出' order by 日期,班次,人员";
  //print $query;
 // $cursor = exequery($connection,$query);
	$rs=$db->CaCheExecute(30,$query);
	$ROW=$rs->GetArray();
  // print_R($_GET);exit;
  //行计数器
  $LINE_COUNTER = 0;
  for($i=0;$i<sizeof($ROW);$i++) {
	 // while($ROW = mysql_fetch_array($cursor)) {
    $编号= $ROW[$i]["编号"];
	$人员= $ROW[$i]["人员"];
	$周次= $ROW[$i]["周次"];
	$星期= $ROW[$i]["星期"];
	$班次= $ROW[$i]["班次"];
	$部门= $ROW[$i]["部门"];
	$日期= $ROW[$i]["日期"];


	//如果数据存在则进行数据编辑操作
	$query = "select 编号 from td_edu.edu_xingzheng_qingjia where 学期='$学期名称' and 人员='$人员' and 时间='$日期' and 班次='$班次' and  工作流ID号='$RUN_ID'";
	//$cursorX = exequery($connection,$query);
	//$ROWX	 = mysql_fetch_array($cursorX);
	$rs=$db->Execute($query);
	$ROWX=$rs->GetArray();
	$请假编号		= $ROWX[0]["编号"];

	$query = "select 编号 from td_edu.edu_xingzheng_qingjia where 学期='$学期名称' and 人员='$人员' and 时间='$日期' and 班次='$班次' and  工作流ID号='$RUN_ID' and  审核状态=1";
	$rs=$db->Execute($query);
	$ROWXX=$rs->GetArray();
	$通过编号		= $ROWXX[0]["编号"];



	print "
		 <tr class=\"TableData\">
	   <td nowrap align=\"center\">$部门</td>
	   <td nowrap align=\"center\">$班次</td>
	   <td nowrap align=\"center\">$日期</td>
	   <td nowrap align=\"center\">$班次</td>
	   <td nowrap align=\"center\">";
   print "<input size=6 type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_VALUE' value='1'/>";

   if($通过编号!="")	{
	   print " <a><font color=red>己申请通过</font></a>";
	   //$新上班时间 = $日期;
   }
   else
	{
	   if($请假编号!="")	{
		   print "&nbsp;己申请 <a href=\"?action=QingJiaDelete&RUN_ID=$RUN_ID&人员=$人员&班次=$班次&星期=$星期&班次=$班次&日期=$日期&编号=$请假编号&部门=$部门&周次=$周次\" >删除</a>";
		   //$新上班时间 = $日期;
	   }
	   else		{
		   print "<a href=\"?action=QingJiaDataDeal&RUN_ID=$RUN_ID&人员=$人员&班次=$班次&星期=$星期&班次=$班次&日期=$日期&编号=$请假编号&部门=$部门&周次=$周次\" >请假外出</a>";
		   $新上班时间 = '';
	   }
  
   }
   
   print "
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_ID' value='$请假编号'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_BANJI' value='$人员'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_KECHENG' value='$班次'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_OLDDATE' value='$日期'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_OLDJIECI' value='$班次'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_NEWDATE' value='$请假编号'/>
   </td>
	</tr>
	";
	$LINE_COUNTER++;
  }


if($LINE_COUNTER==0)	{
	$Disabled = " Disabled ";
}
else	{
	$Disabled = "";
}
?>
	<tr class="TableData" align="right">
		  <td nowrap colspan=11 align=center>
		  <input type=hidden size=6  class=SmallInput name='ALL_SELECTED' value='<?=$LINE_COUNTER?>'/>
		    <input type=button accesskey='c' name='cancel' value=' 返回 ' class=SmallButton onClick="location='?'" title='快捷键:ALT+c'>
		</td>
		</tr>

</table>
<div id=HTMLSHOW></div>
</form>
 
 <?
	 exit;
}



	$filetablename='edu_xingzheng_qingjia';
	$parse_filename = 'my_xingzheng_qingjia';

	require_once('include.inc.php');
		require_once('../Help/module_xingzhengworkflow.php');

?>