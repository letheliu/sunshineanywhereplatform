<?
session_start();
//if(!isset($_SESSION['sunshine_student_code'])){
//	header("Location: index.html");
//}
require_once('lib.inc.php');
//require_once('page.class.php');

	//--�������ڷ�ҳ��ʾ
		if(!isset($PB_page)){
			$PB_page=1;
			}else{
				$PB_page=$_GET['PB_page'];
			}
			$startpage = ($PB_page-1)*14;

//require_once("header.php");

?><DIV id=main>
<DIV id=title>
<DIV id=title_l></DIV>
<DIV id=title_m>���߿���</DIV>
<DIV id=title_r></DIV></DIV>
<DIV id=content>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#b3d7fb">


<?
	$ѧ�� = $_SESSION['sunshine_student_code']; 
	$���� = $_SESSION['sunshine_student_name']; 
	$�༶ = $_SESSION['sunshine_student_class'];


if($_GET['action']=="ApplyExamDataFinished")					{
	$�����Ծ� = $_GET['�����Ծ�'];
	$�������� = $_GET['��������'];	
	$sql = "update tiku_examdata set �Ƿ��ύ='1' where ��������='$��������' and �Ծ�����='$�����Ծ�' and ѧ��='$ѧ��'";
	//print $sql;
	//print_R($_GET);
	$db->Execute($sql);
	print "<BR><table width=100% border=0 align=center cellpadding=0 cellspacing=1 bgcolor=\"#b3d7fb\">";
	print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' ><input type=\"button\" name=\"button\" class=\"button\" OnClick=\"location='?'\" value=\"����Ծ��Ѿ��ύ,�������\" ></td>
            </tr>";
	print "</table>";
	exit;
}




if($_GET['action']=="ApplyExamData")					{
	//print_R($_POST);
	//Array ( [��Ŀ_0] => ��� [��Ŀ_1] => ��� [��Ŀ_2] => ��� [��Ŀ_3] => ��� [��Ŀ_4] => ��� [��Ŀ_5] => ��� [��Ŀ_6] => ��� [��Ŀ_7] => ��� [��Ŀ_8] => ��� [��Ŀ_9] => ��� [��Ŀ_10] => ��� [��Ŀ_11] => ��� [��Ŀ_12] => ��� [��Ŀ_13] => ��� [��Ŀ_14] => ��� [��Ŀ_15] => ��� [��Ŀ_16] => ��� [��Ŀ_17] => ��� [��Ŀ_18] => ��� [��Ŀ_19] => ��� [�����Ծ�] => 2008������ҰӢ���������Ծ� [����] => ��ѡ [button] => �ύ�ò�����Ŀ ) 
//	print_R($_POST);exit;

	$�����Ծ� = $_POST['�����Ծ�'];
	$���� = $_POST['����'];
	$MaxValue = $_POST['MaxValue'];
	$�������� = $_POST['��������'];
	$�Ծ����� = $_POST['�����Ծ�'];
 	for($i=0;$i<$MaxValue;$i++)		{
		$POSTName = "���_".$i;
		$��� = $_POST['���_'.$i];
		$��Ŀ = $_POST['��Ŀ_'.$i];

		$��ѡ�� = (array)$_POST['��ѡ��_'.$i];
		if($����=='���')
		{
			//$��ѡ�� = trim($��ѡ��);
		  $��ѡ�� = join('#',$��ѡ��);
		//print $��ѡ��q=trim($��ѡ��x);;
		//exit;
		//$��ѡ�� = join('#',$��ѡ��);
		//trim();
		$��ȷ�� = returntablefield("tiku_shijuanku","���",$���,"��ȷ��");
		$����ʱ�� = date("Y-m-d H:i:s");
		if($��ȷ��==$��ѡ��)		{
			$����״̬ = '��ȷ';
			$���÷�ֵ = returntablefield("tiku_shijuanku","���",$���,"��ֵ");
		}
		else				{
			$����״̬ = '����';
			$���÷�ֵ = '0';
		}
		}
		else
		{
		sort($��ѡ��);		
		$��ѡ�� = join('',$��ѡ��);
		$��ȷ�� = returntablefield("tiku_shijuanku","���",$���,"��ȷ��");
		$����ʱ�� = date("Y-m-d H:i:s");
		if($��ȷ��==$��ѡ��)		{
			$����״̬ = '��ȷ';
			$���÷�ֵ = returntablefield("tiku_shijuanku","���",$���,"��ֵ");
		}
		else				{
			$����״̬ = '����';
			$���÷�ֵ = '0';
		}
		}
		
		$sql = "select ��� from tiku_examdata where ��������='$��������' and �Ծ�����='$�Ծ�����' and ѧ��='$ѧ��' and ��Ŀ='$��Ŀ'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		if($rs_a[0]['���']!='')		{
			$sql = "update tiku_examdata set ��Ŀ='$��Ŀ',��ȷ��='$��ȷ��',��ѡ��='$��ѡ��',����״̬='$����״̬',����ʱ��='$����ʱ��',���÷�ֵ='$���÷�ֵ' where ���='{$rs_a[0]['���']}'";
		}
		else	{
			$sql = "insert into tiku_examdata values('','$��������','$�Ծ�����','$����ʱ��','$ѧ��','$����','$�༶','$��Ŀ','$��ȷ��','$��ѡ��','$����״̬','$���÷�ֵ','�Ƿ��ύ');";
		}
		//$sql = "insert into tiku_examdata values('','$��������','$�����Ծ�','$����ʱ��','$ѧ��','$����','$�༶','$��Ŀ','$��ȷ��','$��ѡ��','$����״̬','$���÷�ֵ');";
		//print $sql."<BR>";
		if($��ѡ��!="")		$db->Execute($sql);
		
	}
	print "<div align=center>��Ĵ��Ѿ��ύ,�뷵��....</div>";
	print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?action=ApplyExam&�����Ծ�=$�����Ծ�&��������=$��������&����=$����\">";
	exit;
}


if($_GET['action']=="ApplyExam"&&$_GET['�����Ծ�']!=""&&$_GET['��������']!="")					{
		//����Ȩ��
		$sql = "select �Ƿ��ύ from tiku_examdata where ��������='{$_GET['��������']}' and �Ծ�����='{$_GET['�����Ծ�']}' and ѧ��='$ѧ��'";
		$TempDb = $db->CacheExecute(30,$sql);
		$�Ƿ��ύ = $TempDb->fields['�Ƿ��ύ'];
		if($�Ƿ��ύ)	{
			print "<div align=center>��Ĵ��Ѿ��ύ,�����ٽ��д���..</div>";
			exit;
		}
		print "<FORM name=form1 action=\"?action=ApplyExamData\" method=post encType=multipart/form-data>";
		$sql = "select distinct ���� from tiku_shijuanku where �Ծ�����='".$_GET['�����Ծ�']."'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		print "<tr>";
		for($i=0;$i<sizeof($rs_a);$i++)			{
			$���� = $rs_a[$i]['����'];
			print "<td height='26' align='center' bgcolor='#E4EFF8'  nowrap>
			<a href=\"?".base64_encode("action=ApplyExam&�����Ծ�={$_GET['�����Ծ�']}&��������={$_GET['��������']}&����=$����")."\">
			<font color=green><B>$����</B></font></a>
			</td>";
		}
		print "</tr>";
		
		if($_GET['����']!="")	$���� = $_GET['����']; else $���� = "��ѡ";

		$sql = "select * from tiku_shijuanku where �Ծ�����='".$_GET['�����Ծ�']."' and ����='$����'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		
		for($i=0;$i<sizeof($rs_a);$i++)					{
			$��� = $rs_a[$i]['���'];
			$��Ŀ = $rs_a[$i]['��Ŀ'];
			$���� = $rs_a[$i]['����'];
			$��ֵ = $rs_a[$i]['��ֵ'];
			//�õ����x��
			$sql = "select ��ѡ�� from tiku_examdata where ��������='{$_GET['��������']}' and �Ծ�����='{$_GET['�����Ծ�']}' and ѧ��='$ѧ��' and ��Ŀ='$��Ŀ'";
			$rsX = $db->CacheExecute(30,$sql);
			$rs_aX = $rsX->GetArray();
			$��ѡ�� = $rs_aX[0]['��ѡ��'];
			if($����=="���")
			{
				//print_R($��ȷ��);
			$��ѡ��arr = explode("#",$��ѡ��);
			//print_R($��ѡ��arr);
			}
			//print $��ѡ��;
			$CheckedResult = array();

			if($����=="��ѡ")	$INPUTTYPE = "radio";
			else	if($����=="��ѡ")	$INPUTTYPE = "checkbox";
			else	if($����=="�ж�")	$INPUTTYPE = "radio";
			else	if($����=="���")	$INPUTTYPE = "input";
			else	$INPUTTYPE = "radio";
			//����ѡ�ж�
			if($����=="��ѡ"||$����=="�ж�")			{
			switch($��ѡ��)			{
				case 'A':
					$CheckedResult['A'] = 'checked';
					break;
				case 'B':
					$CheckedResult['B'] = 'checked';
					break;
				case 'C':
					$CheckedResult['C'] = 'checked';
					break;
				case 'D':
					$CheckedResult['D'] = 'checked';
					break;
				case 'E':
					$CheckedResult['E'] = 'checked';
					break;
				case 'F':
					$CheckedResult['F'] = 'checked';
					break;
				
			}//end switch
			}
			//�����ѡ
			if($����=="��ѡ")					{
				if(preg_match('/A/i',$��ѡ��))	$CheckedResult['A'] = 'checked';
				if(preg_match('/B/i',$��ѡ��))	$CheckedResult['B'] = 'checked';
				if(preg_match('/C/i',$��ѡ��))	$CheckedResult['C'] = 'checked';
				if(preg_match('/D/i',$��ѡ��))	$CheckedResult['D'] = 'checked';
				if(preg_match('/E/i',$��ѡ��))	$CheckedResult['E'] = 'checked';
				if(preg_match('/F/i',$��ѡ��))	$CheckedResult['F'] = 'checked';
			}
			$DaAnText = "";
			//print $����;
			//print_R($CheckedResult);
			
			$��ѡ��A = $rs_a[$i]['��ѡ��A']; if($��ѡ��A!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=��ѡ��_{$i}[] value=A {$CheckedResult['A']}> A:$��ѡ��A&nbsp;";
			$��ѡ��B = $rs_a[$i]['��ѡ��B']; if($��ѡ��B!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=��ѡ��_{$i}[] value=B {$CheckedResult['B']}> B:$��ѡ��B&nbsp;";
			$��ѡ��C = $rs_a[$i]['��ѡ��C']; if($��ѡ��C!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=��ѡ��_{$i}[] value=C {$CheckedResult['C']}> C:$��ѡ��C&nbsp;";
			$��ѡ��D = $rs_a[$i]['��ѡ��D']; if($��ѡ��D!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=��ѡ��_{$i}[] value=D {$CheckedResult['D']}> D:$��ѡ��D&nbsp;";
			$��ѡ��E = $rs_a[$i]['��ѡ��E']; if($��ѡ��E!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=��ѡ��_{$i}[] value=E {$CheckedResult['E']}> E:$��ѡ��E&nbsp;";
			$��ѡ��F = $rs_a[$i]['��ѡ��F']; if($��ѡ��F!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=��ѡ��_{$i}[] value=F {$CheckedResult['F']}> F:$��ѡ��F&nbsp;";
			$��ȷ�� = $rs_a[$i]['��ȷ��'];
			if($����=="���")
			{
				//print_R($��ȷ��);
			$��ȷ��arr = explode("#",$��ȷ��);
			//print_R($��ȷ��arr);
			}
			$��ѡ��A = $rs_a[$i]['��ѡ��A'];
			$��ѡ��A = $rs_a[$i]['��ѡ��A'];
			print "<input type=hidden name=���_".$i." value='$���'>";
			print "<input type=hidden name=��Ŀ_".$i." value='$��Ŀ'>";
			print "<tr> ";
			print "<td height='26' align='left' bgcolor='#E4EFF8' colspan=30  nowrap>&nbsp;&nbsp;".($i+1)."&nbsp;&nbsp;$��Ŀ(��ֵ:$��ֵ)</td>";
			print "</tr>";	
			print "<tr> ";
			if($����=="���")
			{
				print "<td height='26' align='left' bgcolor='#FFFFFF' colspan=30 >";
				for($x=0;$x<sizeof($��ȷ��arr);$x++)
				{
					print "<input type=input name=��ѡ��_{$i}[$x] value=$��ѡ��arr[$x]> ";
					
				}
				print "</td></tr>";			
			}else
			{
			print "<td height='26' align='left' bgcolor='#FFFFFF' colspan=30 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$DaAnText</td>";
			print "</tr>";	
			}
			
			
		}

		print "<input type=hidden name=�����Ծ� value='".$_GET['�����Ծ�']."'>";
		print "<input type=hidden name=���� value='".$����."'>";
		print "<input type=hidden name=�������� value='".$_GET['��������']."'>";
		print "<input type=hidden name=MaxValue value='".sizeof($rs_a)."'>";
		

		print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' ><input type=\"submit\" name=\"button\" class=\"button\" value=\"�ύ�ò�����Ŀ\" ></td>
            </tr>";
		print "</table></form>";
		
		print "<BR><table width=100% border=0 align=center cellpadding=0 cellspacing=1 bgcolor=\"#b3d7fb\"><FORM name=form1 action=\"?".base64_encode("action=ApplyExamDataFinished&�����Ծ�={$_GET['�����Ծ�']}&��������={$_GET['��������']}")."\" method=post encType=multipart/form-data>";
		print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' ><input type=\"button\" name=\"button\" class=\"button\" onClick=\"javascript:if(confirm('�Ծ��ύ�����ٽ��б��ο��ԵĴ���,��ȷʵҪ�ύ����Ծ�ô,')) location='?".base64_encode("action=ApplyExamDataFinished&�����Ծ�={$_GET['�����Ծ�']}&��������={$_GET['��������']}")."'\" value=\"����ύ����ɱ��ο���\" ></td>
            </tr>";
		print "</table></form>";
		//print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?\">";
		exit;
}

?>
			<tr>       
                <td height="26" align="center" bgcolor="#E4EFF8"  nowrap>���</td>
				<td height="26" align="center" bgcolor="#E4EFF8" >��������</td>
				<td height="26" align="center" bgcolor="#E4EFF8"  nowrap>�����Ծ�</td>
				<td height="26" align="center" bgcolor="#E4EFF8" >��������</td>
                <td height="26" align="center" bgcolor="#E4EFF8"  nowrap>�μӿ��԰༶</td>				
				<td height="26" align="center" bgcolor="#E4EFF8"  nowrap>����</td>
              </tr>
<?
		$ѧ�� = $_SESSION['sunshine_student_code']; 

		if($_GET['action']=="CancelWork"&&$_GET['ʵϰ��λ']!="")					{
			
			print "<tr  bgcolor='#FFFFFF'>
                <td colspan=8 height='26' align='center' ><font color=red>ȡ����λ�ɹ�</font></td>
              </tr>";
			print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?\">";
			exit;
		}

		//���ύ�����б�
		$ClassName = $_SESSION['sunshine_student_class'];
		$�������� = date("Y-m-d");
		//$sql = "select * from tiku_kaoshi where ��������='$��������' and �μӿ��԰༶='$ClassName'";
		//�Ժ��жϲ��Ż�����Ա
		$sql = "select * from tiku_kaoshi where ��������='$��������' ";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)			{
			$��� = $rs_a[$i]['���'];
			$�������� = $rs_a[$i]['��������'];
			$�����Ծ� = $rs_a[$i]['�����Ծ�'];
			$�������� = $rs_a[$i]['��������'];
			$�μӿ��԰༶ = $rs_a[$i]['�μӿ��԰༶'];
			$sql = "select �Ƿ��ύ from tiku_examdata where ��������='$��������' and �Ծ�����='$�����Ծ�' and ѧ��='$ѧ��'";
			$TempDb = $db->CacheExecute(30,$sql);
			$�Ƿ��ύ = $TempDb->fields['�Ƿ��ύ'];
			if(!$�Ƿ��ύ)		{
				$���� = "<a href='?".base64_encode("action=ApplyExam&�����Ծ�=$�����Ծ�&��������=$��������")."'><font color=green>��ʼ�μӿ���</font></a>";
			}
			else		{
				$���� = "<font color=red>��Ŀ����Ѿ��ύ</font>";
			}

			if($i%2==1)	$AddText = "bgcolor='#E4EFF8'";
			else	$AddText = "";
			print "<tr  bgcolor='#FFFFFF'>
                <td width='5%' height='26' align='center'  >".($i+1)."</td>
                <td width='30%'  nowrap>$��������</td>
				<td width='30%'  nowrap>$�����Ծ�</td>
				<td width='10%'  >$��������</td>
				<td  width='10%' align=center nowrap>$�μӿ��԰༶</td>
				<td width='15%'  align=center nowrap>$����</td>
              </tr>";
		}
		
?>

              
            </table>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="50" align="center" >

			</td>
                </tr>
              </table>

</DIV></DIV>
