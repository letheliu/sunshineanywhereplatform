<?
session_start();
//if(!isset($_SESSION['sunshine_student_code'])){
//	header("Location: index.html");
//}
require_once('lib.inc.php');
page_css("OA���߿���");


?>

<Table class=TableBlock width=100%>


<?
//print_R($_SESSION);
	$ѧ�� = $_SESSION['LOGIN_USER_ID']; //�û���
	$���� = $_SESSION['LOGIN_USER_NAME']; //����
	$�༶ = $_SESSION['LOGIN_DEPT_ID'];//����ID


if($_GET['action']=="ApplyExamDataFinished")					{
	$�����Ծ� = $_GET['�����Ծ�'];
	$�������� = $_GET['��������'];
	$sql = "update tiku_examdata set �Ƿ��ύ='1' where ��������='$��������' and �Ծ�����='$�����Ծ�' and ѧ��='$ѧ��'";
	//print $sql;
	//print_R($_GET);
	$db->Execute($sql);
	print "<BR><Table class=TableBlock width=100%>";
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
			$sql = "insert into tiku_examdata values('','$��������','$�Ծ�����','$����ʱ��','$ѧ��','$����','','$��Ŀ','$��ȷ��','$��ѡ��','$����״̬','$���÷�ֵ','�Ƿ��ύ','$�༶');";
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

		print "<tr class=TableHeader>";
		for($i=0;$i<sizeof($rs_a);$i++)			{
			$���� = $rs_a[$i]['����'];
			print "<td height='26' align='center' nowrap>
			<a href=\"?".base64_encode("action=ApplyExam&�����Ծ�={$_GET['�����Ծ�']}&��������={$_GET['��������']}&����=$����")."\">
			<font color=red><B>$����</B></font></a>
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



			if($rs_a[$i]['��ĿͼƬ']!="")		{
				//ͼƬ����
				$PHP_SELF_ARRAY = explode('/',$rs_a[$i]['��ĿͼƬ']);
				$FileNameIndex = sizeof($PHP_SELF_ARRAY)-1;
				$DirNameIndex = sizeof($PHP_SELF_ARRAY)-2;
				$FileName2 = $PHP_SELF_ARRAY[$FileNameIndex];
				$DirName2 = $PHP_SELF_ARRAY[$DirNameIndex];
				$rs_a[$i]['��ĿͼƬ'] = "../../Framework/download.php?action=picturefile&sessionkey=$sessionkey&attachmentid=$DirName2&attachmentname=$FileName2";
				$��ĿͼƬIMG = "<img src=".$rs_a[$i]['��ĿͼƬ']." border=0 width=130>";
			}
			else	{
				$��ĿͼƬIMG = "";
			}




			//�õ����x��
			$sql = "select ��ѡ�� from tiku_examdata where ��������='{$_GET['��������']}' and �Ծ�����='{$_GET['�����Ծ�']}' and ѧ��='$ѧ��' and ��Ŀ='$��Ŀ'";
			$rsX = $db->Execute($sql);
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
			print "<td align='left' class=TableData colspan=30  nowrap>&nbsp;&nbsp;".($i+1)."&nbsp;&nbsp;$��Ŀ(��ֵ:$��ֵ) $��ĿͼƬIMG</td>";
			print "</tr>";
			print "<tr> ";
			if($����=="���")
			{
				print "<td height='26' align='left' class=TableData colspan=30 >";
				for($x=0;$x<sizeof($��ȷ��arr);$x++)
				{
					print "<input type=input name=��ѡ��_{$i}[$x] value=$��ѡ��arr[$x]> ";

				}
				print "</td></tr>";
			}
			else
			{
				print "<td height='26' align='left' class=TableData colspan=30 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$DaAnText</td>";
				print "</tr>";
			}


		}

		print "<input type=hidden name=�����Ծ� value='".$_GET['�����Ծ�']."'>";
		print "<input type=hidden name=���� value='".$����."'>";
		print "<input type=hidden name=�������� value='".$_GET['��������']."'>";
		print "<input type=hidden name=MaxValue value='".sizeof($rs_a)."'>";

		$sql = "select count( ��� ) as ������ from tiku_shijuanku where �Ծ�����='".$_GET['�����Ծ�']."'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		$������ = $rs_a[0]['������'];

	    $sql = "select count( ��� ) as �ύ�� from tiku_examdata where �Ծ�����='".$_GET['�����Ծ�']."' and ѧ��='$ѧ��'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		$�ύ�� = $rs_a[0]['�ύ��'];

		print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' >
			  <font color=red>һ���С�".$������."��С��,���Ѿ��ύ��".$�ύ��."����</font>
			  <input type=\"submit\" name=\"button\" class=\"smallbutton\" value=\"�ύ�ò�����Ŀ\" ></td>
            </tr>";
		print "</table></form>";

		print "<BR><Table class=TableBlock width=100%><FORM name=form1 action=\"?".base64_encode("action=ApplyExamDataFinished&�����Ծ�={$_GET['�����Ծ�']}&��������={$_GET['��������']}")."\" method=post encType=multipart/form-data>";
		print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' >
			  <input type=\"button\" name=\"button\" class=\"smallbutton\" onClick=\"javascript:if(confirm('�Ծ��ύ�����ٽ��б��ο��ԵĴ���,��ȷʵҪ�ύ����Ծ�ô,')) location='?".base64_encode("action=ApplyExamDataFinished&�����Ծ�={$_GET['�����Ծ�']}&��������={$_GET['��������']}")."'\" value=\"����ύ����ɱ��ο���\" ></td>
            </tr>";
		print "</table></form>";
		//print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?\">";
		exit;
}
//<Table class=TableBlock width=100%>
?>

			<Tr class=TableHeader>
                <td align="center"  nowrap>���</td>
				<td  align="center" nowrap>��������</td>
				<td  align="center"  nowrap>�����Ծ�</td>
				<td align="center"  nowrap>��������</td>
                <td  align="center"  nowrap>�μӿ��԰༶</td>
				<td  align="center" nowrap>����</td>
              </tr>
<?
		//$ѧ�� = $_SESSION['sunshine_student_code'];

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
		//print $ѧ��;
		$sql = "select * from tiku_kaoshi where ��������='$��������' and �μӿ�����Ա like '%$ѧ��,%'";
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
			print "<tr class=TableData>
                <td width='5%' align=center nowrap>".($i+1)."</td>
                <td width='30%'  align=center nowrap>$��������</td>
				<td width='30%'  align=center nowrap>$�����Ծ�</td>
				<td width='10%'  align=center nowrap>$��������</td>
				<td  width='10%' align=center nowrap>$�μӿ��԰༶</td>
				<td width='15%'  align=center nowrap>$����</td>
              </tr>";
		}

?>


            </table>

