<?
	require_once('lib.inc.php');//

	$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("������Դ-��������-�ҵĿ���");
page_css('������');
$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;
$ѧ������ = $��ǰѧ��;


	$_GET['��Ա'] = $_SESSION['LOGIN_USER_NAME'];
	$_GET['��Ա�û���'] = $_SESSION['LOGIN_USER_ID'];
	//$_GET['����'] = returntablefield("department","DEPT_ID",$_SESSION['LOGIN_DEPT_ID'],"DEPT_NAME");


if($_GET['action']=='QingJiaDataDeal')				{

	$���� = $_GET['����'];
	$��� = $_GET['���'];
	$���� = $_GET['����'];
	$�ܴ� = $_GET['�ܴ�'];
	$��Ա = $_SESSION['LOGIN_USER_NAME'];
	$���ϰ�ʱ��Array = explode(' ',$_POST['���ϰ�ʱ��']);
	$���ϰ�ʱ�� = $���ϰ�ʱ��Array[0];
	$�°�� = $���ϰ�ʱ��Array[1];
	$��� = $_POST['���'];
	$query = "insert into td_edu.edu_xingzheng_qingjia values('','$ѧ������','$����','$��Ա','$����','$�ܴ�','$���','','0','$RUN_ID','$�����','$���ʱ��','".$_SESSION['LOGIN_USER_ID']."');";
	//print_R($_GET);
	//print $query;exit;
	print "<BR><BR><div align=center><font color=green>��Ĳ�����������!</font></div>";
	//exequery($connection,$query);
	$db->Execute($query);
	print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?action=add_default&RUN_ID=$RUN_ID'>\n";
	exit;
}

if($_GET['action']=='QingJiaDelete')				{

	$���� = $_GET['����'];
	$��� = $_GET['���'];
	$��Ա = $_SESSION['LOGIN_USER_NAME'];
	//������ݴ�����������ݱ༭����
	//$query = "delete from td_edu.edu_xingzheng_qingjia where ���='$���' and ���='$���' and ѧ��='$ѧ������' and �������״̬='0'";
	$��� = $_GET['���'];
	$query = "delete from td_edu.edu_xingzheng_qingjia where ���='$���'  and ���״̬='0'";
	//print $query;
	print "<BR><BR><div align=center><font color=green>��Ĳ�����������!</font></div>";
	//exequery($connection,$query);
	$db->Execute($query);
	print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?action=add_default&RUN_ID=$RUN_ID'>\n";
	exit;
}
if($_GET['action2']=='QingJiaDelete')				{

	$���� = $_GET['����'];
	$��� = $_GET['���'];
	$��Ա = $_SESSION['LOGIN_USER_NAME'];
	//������ݴ�����������ݱ༭����
	//$query = "delete from td_edu.edu_xingzheng_qingjia where ���='$���' and ���='$���' and ѧ��='$ѧ������' and �������״̬='0'";
	$��� = $_GET['���'];
	$query = "delete from td_edu.edu_xingzheng_qingjia where ���='$���'  and ���״̬='0'";
	//print $query;
	print "<BR><BR><div align=center><font color=green>��Ĳ�����������!</font></div>";
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
      <td nowrap align="center">����</td>
      <td nowrap align="center">���</td>
	  <td nowrap align="center">�ϰ�ʱ��</td>
      <td nowrap align="center">���</td>
      <td nowrap align="center">����</td>
    </tr>
<?
  $��Ա = $_SESSION['LOGIN_USER_NAME'];

  $��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date('m'),date('d')-1,date('Y')));
  $����ʱ�� = date("Y-m-d",mktime(1,1,1,date('m'),date('d')+14,date('Y')));

  $��ʼʱ�� = date("Y-m-d",mktime(1,1,1,date('m'),date('d')-1,date('Y')));
  $����ʱ�� = date("Y-m-d",mktime(1,1,1,date('m'),date('d')+14,date('Y')));

  $query = "select ����,���,��Ա,���,����,����,���,�ܴ� from  td_edu.edu_xingzheng_kaoqinmingxi  where ��Ա='$��Ա' and ����>='$��ʼʱ��' and ����<='$����ʱ��' and �°࿼��״̬!='������' order by ����,���,��Ա";
  //print $query;
 // $cursor = exequery($connection,$query);
	$rs=$db->CaCheExecute(30,$query);
	$ROW=$rs->GetArray();
  // print_R($_GET);exit;
  //�м�����
  $LINE_COUNTER = 0;
  for($i=0;$i<sizeof($ROW);$i++) {
	 // while($ROW = mysql_fetch_array($cursor)) {
    $���= $ROW[$i]["���"];
	$��Ա= $ROW[$i]["��Ա"];
	$�ܴ�= $ROW[$i]["�ܴ�"];
	$����= $ROW[$i]["����"];
	$���= $ROW[$i]["���"];
	$����= $ROW[$i]["����"];
	$����= $ROW[$i]["����"];


	//������ݴ�����������ݱ༭����
	$query = "select ��� from td_edu.edu_xingzheng_qingjia where ѧ��='$ѧ������' and ��Ա='$��Ա' and ʱ��='$����' and ���='$���' and  ������ID��='$RUN_ID'";
	//$cursorX = exequery($connection,$query);
	//$ROWX	 = mysql_fetch_array($cursorX);
	$rs=$db->Execute($query);
	$ROWX=$rs->GetArray();
	$��ٱ��		= $ROWX[0]["���"];

	$query = "select ��� from td_edu.edu_xingzheng_qingjia where ѧ��='$ѧ������' and ��Ա='$��Ա' and ʱ��='$����' and ���='$���' and  ������ID��='$RUN_ID' and  ���״̬=1";
	$rs=$db->Execute($query);
	$ROWXX=$rs->GetArray();
	$ͨ�����		= $ROWXX[0]["���"];



	print "
		 <tr class=\"TableData\">
	   <td nowrap align=\"center\">$����</td>
	   <td nowrap align=\"center\">$���</td>
	   <td nowrap align=\"center\">$����</td>
	   <td nowrap align=\"center\">$���</td>
	   <td nowrap align=\"center\">";
   print "<input size=6 type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_VALUE' value='1'/>";

   if($ͨ�����!="")	{
	   print " <a><font color=red>������ͨ��</font></a>";
	   //$���ϰ�ʱ�� = $����;
   }
   else
	{
	   if($��ٱ��!="")	{
		   print "&nbsp;������ <a href=\"?action=QingJiaDelete&RUN_ID=$RUN_ID&��Ա=$��Ա&���=$���&����=$����&���=$���&����=$����&���=$��ٱ��&����=$����&�ܴ�=$�ܴ�\" >ɾ��</a>";
		   //$���ϰ�ʱ�� = $����;
	   }
	   else		{
		   print "<a href=\"?action=QingJiaDataDeal&RUN_ID=$RUN_ID&��Ա=$��Ա&���=$���&����=$����&���=$���&����=$����&���=$��ٱ��&����=$����&�ܴ�=$�ܴ�\" >������</a>";
		   $���ϰ�ʱ�� = '';
	   }
  
   }
   
   print "
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_ID' value='$��ٱ��'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_BANJI' value='$��Ա'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_KECHENG' value='$���'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_OLDDATE' value='$����'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_OLDJIECI' value='$���'/>
   <input size=6  type=hidden class=SmallInput name='NAME_".$LINE_COUNTER."_NEWDATE' value='$��ٱ��'/>
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
		    <input type=button accesskey='c' name='cancel' value=' ���� ' class=SmallButton onClick="location='?'" title='��ݼ�:ALT+c'>
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