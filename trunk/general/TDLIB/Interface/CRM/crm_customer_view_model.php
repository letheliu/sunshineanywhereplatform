<?
	require_once("lib.inc.php");
	page_css("�ͻ��ۺ���Ϣ����",$IE_TITLE);


//��kehu_search.php����������!
    if($_GET['�ͻ����'] != ""){
	   $��� = $_GET['�ͻ����'];
	}



	if($_GET['���']!="")	{
		$��� = $_GET['���'];;
	}


	print "<div align=center>";
	print " <input type=button accesskey=p name=print value=��ӡ��ҳ class=SmallButton onClick=\"document.execCommand('Print');\" >";
	if($_GET['actionAdd']=="close")		{
		print " <input type=button accesskey=p name=print value=�ر� class=SmallButton onClick=\"javascript:window.close();\" >";
	}
	else	{
		print " <input type=button accesskey=p name=print value=���� class=SmallButton onClick=\"location='".$_GET['GOBACK']."?XX=XX&���=".$���."&pageid=".$_GET['pageid']."'\" >";
	}
	print "</div>";
	//print_R($_GET);
	print "<BR>";
	switch($_GET['action2'])		{
		default:
			CustomerInforView($���);
			break;
	}

	exit;

function CustomerInforView($���)		{
	global $db,$smarty;
	global $sessionkey,$ѧУ����,$SYTEM_CONFIG_TABLE;

	$sql = "select * from crm_customer where (���='$���')";
	$rs = $db->CacheExecute(5,$sql);
	$rs_a = $rs->GetArray();

	$html_etc = returnsystemlang("crm_customer",$SYTEM_CONFIG_TABLE);
	$html_etc = $html_etc['crm_customer'];

?>
<table class=TableBlock  align=center width=80% >
<TR><TD class=TableHeader align=center colSpan=6>
&nbsp;<?=$UnitName?>�ͻ�������Ϣ����&nbsp &nbsp </TD>
</TR>
	<TR>
    <td nowrap  colspan=6><B>�ͻ�����:</B><B><font color='#FF0000'><?=$rs_a[0]['�ͻ�����']?></font></B>
  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp <B>�ͻ�����:</B><B><font color='#FF0000'><?=$rs_a[0]['�ͻ�����']?></font></B> &nbsp &nbsp &nbsp &nbsp&nbsp���:<B><font color='#FF0000'><?=$rs_a[0]['�ͻ����']?></font></B></td>
  </tr>

<tr class=TableHeader>
<td nowrap class="TableContent" >�ͻ�����:</td>
<td class="TableData" colspan=1 nowrap><?=$rs_a[0]['�ͻ�����']?></td>
<td nowrap class="TableContent" >�ͻ���Դ:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�ͻ���Դ']?></td>
<td nowrap class="TableContent" width=20%>�ͻ��ȼ�:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�ͻ��ȼ�']?></td>
</tr>
<trclass=TableHeader>
<td nowrap class="TableContent"  >��������:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['��������']?></td>
<td nowrap class="TableContent"  >��������:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['��������']?></td>
<td nowrap class="TableContent"  >����ʱ��:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['����ʱ��']?></td>
</tr>
<tr>
<td nowrap class="TableContent"  >��������:</td>
<td class="TableData" colspan=5 nowrap>&nbsp;<?=$rs_a[0]['��������']?></td>
</tr>

<tr>
<td nowrap class="TableContent"  >��һ��ϵ��:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['��һ��ϵ��']?></td>
<td nowrap class="TableContent"  >ְ��:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['ְ��']?> </td>
<td nowrap class="TableContent"  >�ֻ�:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�ֻ�']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >�绰:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�绰']?></td>
<td nowrap class="TableContent"  >����:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['����']?> </td>
<td nowrap class="TableContent"  >EMAIL:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['EMAIL']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >��ַ:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['��ַ']?></td>
<td nowrap class="TableContent"  >�ʱ�:</td>
<td class="TableData" colspan=3 nowrap>&nbsp;<?=$rs_a[0]['�ʱ�']?> </td>
</tr>
<tr>
<td nowrap class="TableContent"  >��ַ:</td>
<td class="TableData" colspan=5>&nbsp;<?=$rs_a[0]['��ַ']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >���:</td>
<td class="TableData" colspan=5>&nbsp;<?=$rs_a[0]['���']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >��ע:</td>
<td class="TableData" colspan=5>&nbsp;<?=$rs_a[0]['��ע']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >ִ���ۿ�Э��:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['ִ���ۿ�Э��']?></td>
<td nowrap class="TableContent"  >��������:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['��������']?> </td>
<td nowrap class="TableContent"  >�����˻�:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�����˻�']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >���������˻�:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['���������˻�']?></td>
<td nowrap class="TableContent"  ><?=$html_etc['�Զ����ֶ�һ']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�Զ����ֶ�һ']?> </td>
<td nowrap class="TableContent"  ><?=$html_etc['�Զ����ֶζ�']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�Զ����ֶζ�']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  ><?=$html_etc['�Զ����ֶ���']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�Զ����ֶ���']?></td>
<td nowrap class="TableContent"  ><?=$html_etc['�Զ����ֶ���']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�Զ����ֶ���']?> </td>
<td nowrap class="TableContent"  ><?=$html_etc['�Զ����ֶ���']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['�Զ����ֶ���']?> </td>
</tr>

</table>
</form>


<?


function ���ؿͻ���ϸ��Ϣ����($tablename,$FieldList,$Number,$�ͻ�����,$title="�ͻ����ü���ͨ�ɱ���ϸ")					{
	global $db;
	$html_etc = returnsystemlang($tablename);
	$sql = "select $FieldList from $tablename where �ͻ�����='$�ͻ�����' order by ��� limit $Number";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$FieldListArray = explode(',',$FieldList);

	print "<BR><table class=TableBlock  align=center width=80% >";
	print "<TR class=TableHeader>";
	print "<TD nowrap colspan='".sizeof($FieldListArray)."'>&nbsp;".$title."</td>";
	print "</TR>";
	print "<TR class=TableHeader>";

	for($i=0;$i<sizeof($FieldListArray);$i++)			{
		$FieldName = $FieldListArray[$i];
		print "<TD nowrap>&nbsp;".$html_etc[$tablename][$FieldName]."</td>";
	}
	print "</TR>";


	for($ix=0;$ix<sizeof($rs_a);$ix++)						{
		print "<TR class=TableData>";
		for($i=0;$i<sizeof($FieldListArray);$i++)			{
			$FieldName = $FieldListArray[$i];
			print "<TD nowrap>&nbsp;".$rs_a[$ix][$FieldName]."</td>";
		}
		print "</TR>";
	}
	print "</table>";


}


���ؿͻ���ϸ��Ϣ����('crm_expense',"���õ���,���ù�ͨ����,�ͻ�����,��ϵ��,����ʱ��,��������,���ý��,�Ƿ���,��Ʊ���,��������",10,$rs_a[0]['�ͻ�����'],"�ͻ����ü���ͨ�ɱ���ϸ");

���ؿͻ���ϸ��Ϣ����('crm_service',"������,����׶�,�������,�������,�ͻ�����,��ϵ��,���س̶�,�����Ա,�������,���״̬",10,$rs_a[0]['�ͻ�����'],"�ͻ�������ϸ");

���ؿͻ���ϸ��Ϣ����('crm_contract',"��ͬ���,�ͻ�����,��������,��ͬ�ܽ��,��ͬǩ��ʱ��,Ԥ�Ƶ�һ�θ���ʱ��,Ԥ�Ƶ�һ�θ�����,�����",10,$rs_a[0]['�ͻ�����'],"�ͻ���ͬ��ϸ");

exit;
//$ѧ�� = $rs_a[0]['ѧ��'];

//֤��##########################################################################
print	"<BR><table class=TableBlock  align=center
		width=80% style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		�ʸ�֤����Ϣ</TD></TR>
		";
  print	"<TR class=TableHeader>
		<TD>&nbsp;���</TD>
		<TD>&nbsp;֤������</TD>
		<TD>&nbsp;֤����</TD>
		<TD>&nbsp;��֤����</TD>
		<TD>&nbsp;��֤ʱ��</TD>
		<TD>&nbsp;ѧ��</TD>
	  </tr>
	  ";
	$sql = "SELECT * FROM `edu_zhengshuguanli` where  ѧ��='$ѧ��' limit 3";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	 for($i=0;$i<2;$i++)
		{
			print " <TR class=TableData>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['���']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['֤������']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['֤����']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['��֤����']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['��֤ʱ��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['ѧ��']."</TD>
					</tr>";
		}
	print "</table>";


//ѧ���춯##########################################################################
print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		ѧ���춯</TD></TR>
		";
//ѧ��  ����  �༶  �춯����  ��׼��  ������  ����ʱ��  ѧ��ȥ��  �춯ԭ��  ���״̬
  print	"<TR class=TableHeader>
		<TD>&nbsp;�춯����</TD>
		<TD>&nbsp;��׼��</TD>
		<TD>&nbsp;ѧ��ȥ��</TD>
		<TD>&nbsp;�춯ԭ��</TD>
		<TD>&nbsp;���ʱ��</TD>
		<TD>&nbsp;����ʱ��</TD>
  </tr>
  ";
	$sql = "SELECT * FROM edu_studentchange where  ѧ��='$ѧ��' limit 3";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$sql = "SELECT * FROM edu_studentflow where  ѧ��='$ѧ��' limit 3";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	if(sizeof($rsX_a)>0)			{
		for($i=0;$i<sizeof($rsX_a);$i++)
		{
			print " <TR class=TableData>
					<TD class=TableData nowrap>&nbsp;ת��</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['��׼��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['�°༶']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['����ԭ��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['����ʱ��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['����ʱ��']."</TD>
					</tr>";
		}
	}
	for($i=0;$i<2;$i++)
		{
			print " <TR class=TableData>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['�춯����']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['��׼��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['ѧ��ȥ��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['�춯ԭ��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['���ʱ��']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['����ʱ��']."</TD>
					</tr>";
		}

	print "</table>";

	//��ҵ����##########################################################################
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		��ҵ����</TD></TR>
		";
		 print "<TR class=TableData>
				<TD nowrap rowspan=5>��ҵ����</TD>
				<TD nowrap>���޿����</TD>
				<TD nowrap> </TD>
				<TD nowrap>����</TD>
				<TD colspan=2 class=TableData nowrap> </TD>
				</tr>

				<TR class=TableData>
				<TD nowrap>ѡ�޿����</TD>
				<TD nowrap> </TD>
				<TD nowrap>ѧ��</TD>
				<TD colspan=2 class=TableData nowrap> </TD>
				</tr>

				<TR class=TableData>
				<TD nowrap>Ӧ��ѧ��</TD>
				<TD nowrap> </TD>
				<TD nowrap>�ϼ�</TD>
				<TD colspan=2 class=TableData nowrap> </TD>
				</tr>


				<TR class=TableData>
				<TD nowrap width=10%>רҵ���ܼ������</TD>
				<TD class=TableData nowrap>&nbsp;</TD>
				<TD  nowrap width=10%>˼��Ʒ�¼���</TD>
				<TD colspan=2 class=TableData nowrap>&nbsp;</TD>
				</tr>

				<TR class=TableData>
				<TD   nowrap>��ҵʱ��</TD>
				<TD class=TableData nowrap>&nbsp;</TD>
				<TD   nowrap>��ҵ֤��</TD>
				<TD colspan=2 class=TableData nowrap>&nbsp;</TD>
				</tr>
				<TR class=TableData>
				<TD nowrap >��ҵ����</TD>
				<TD class=TableData nowrap colspan=5><br><br><br></TD>

				</tr>";
			print "</table>";

}
function ��ӡ������Ϣ($ID)			{
	global $db,$smarty;
	global $sessionkey,$ѧУ����;
	//ѧ��
	$sql = "select * from edu_student where (`ѧ��`='$ID')";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if($rs_a[0]['ѧ��']=="")		{//�����ѧ���ж�Ϊ��,���Ա��Ϊ�ж�Դ
		$sql = "select * from edu_student where (`���`='$ID')";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
	}
	$ѧ����Ϣ  = $rs_a;
	$ѧ�� = $rs_a[0]['ѧ��'];
	$�༶ = $rs_a[0]['���'];
	$��ѧ��� = returntablefield("edu_banji","�༶����",$�༶,"��ѧ���");

	//=================select �����С�ѧ�����ơ�================
	$sql = "select distinct ѧ������ FROM `edu_studentkaoqin` where ѧ������!='' and ѧ�� = '$ѧ��' order by ѧ������ ";
	$rs = $db->Execute($sql);
	$ѧ������ = $rs->GetArray();
	if(sizeof($ѧ������)<3)		{
		$ѧ������[] = '';
		$ѧ������[] = '';
		$ѧ������[] = '';
		$ѧ������[] = '';
	}
	$ѧ������ = sizeof($ѧ������);
	//=================select �����С��������͡�================
	$sql = "select distinct �������� FROM `edu_studentkaoqin` where ��������!='' and ���״̬='1' order by ��������";
	$rs = $db->Execute($sql);
	//

	$������������ = array("�¼�","����","����","ȱ��","�ٵ�","����","˯��");
	$������������ = sizeof($������������);

	//=============select ��ѧ���ġ����� ���š� ����Ϣ=================
	$sql = "select * from edu_student where ѧ��=  '$ѧ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
	}
	print	"<table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=center colspan=9>&nbsp;
		ѧ��ѧ��(������Ϣ)��</TD></TR>
		<TR class=TableHeader>
		<td nowrap  colspan=9><B>������</B>
		<B><font color='#FF0000'>".$rs_a[0]['����']."</font></B>
	  &nbsp &nbsp &nbsp
	  <B> ���ţ�".$rs_a[0]['����']."</B>
	  &nbsp &nbsp &nbsp
	  <B> ѧ�ţ�".$rs_a[0]['ѧ��']."</B>
	  &nbsp &nbsp &nbsp
	  <B> �༶��".$�༶."</B>
	  </td>
	  </tr>";


				print " <tr><td nowrap align=center class=TableContent rowspan=".($ѧ������+1).">��<br>��<br>ͳ<br>��</td>";

				$���ڼ�¼ = array();
				$sql = "SELECT ѧ��,��������,ѧ������,COUNT(�ڴ�) AS ����  FROM `edu_studentkaoqin` WHERE ѧ�� = '$ѧ��' and ѧ������!='' and ���״̬='1'  group by ��������,ѧ������ order by ѧ��";
				//print $sql;
				$rs = $db->Execute($sql);
				$rs_a = $rs->GetArray();
				//print_R($������������);
				//����������
				print " <td nowrap align=center class=TableContent>��������</td>";
				for($i=0;$i<sizeof($������������);$i++){
					print" <td nowrap align=center class=TableContent>".$������������[$i]."</td>";
				}
				//�γɴ��������
				for($n=0; $n<sizeof($rs_a);$n++)
				{
					$�������� = $rs_a[$n]['��������'];
					$ѧ������ = $rs_a[$n]['ѧ������'];
					$NewArray[$ѧ������][$��������] = $rs_a[$n]['����'];
				}
				//����ѧ���б�
				for($n=0; $n<sizeof($ѧ������);$n++)
				{
					$ѧ������ = $ѧ������[$n]['ѧ������'];
					print"<tr><td nowrap align=center class=TableData>".$ѧ������."</td>";
					for($m=0; $m<sizeof($������������);$m++)
					{
						 $��������=$������������[$m];
						 print "<td nowrap align=center class=tabledata>&nbsp;<a href=\"../EDU/edu_studentkaoqinall_newai.php?".base64_encode("action=init_customer&ѧ��=$ѧ��&��������=$��������&ѧ������=$ѧ������&���״̬=1&action_close=close")."\" target=_blank>".$NewArray[$ѧ������][$��������]."<a/></td>";
					}
					print "</tr>";

				}
	print "</table><BR>";


	//ѧ �� �� ��
	print	"<table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		ѧ������</TD></TR>
		";
	$sql="SELECT * FROM `edu_qimopingyu` WHERE ѧ�� = '$ѧ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>ѧ<br>��<br>��<br>��</td>
        <td nowrap align=center class=TableContent>&nbsp;ѧ������</td>
        <td nowrap align=center class=TableContent>�����Ҫ��20���֣�</td>
        <td nowrap align=center class=TableContent>���˻���</td>
		<td nowrap align=center class=TableContent>���еȼ�</td>
        <td nowrap align=center class=TableContent>������</td>
     </tr>";

	 //�õ����˻���ת�ȼ�
	$goalfile = "../BanJiGuanLi/config_banzhuren_gerenjifendengji_inc.ini";
	$file = file($goalfile);
	$Text = join('',$file);
	$_POST = unserialize($Text);
	$array_keys = @array_keys($_POST);
	for($i=0;$i<sizeof($array_keys);$i++)		{
		$KeyIndex = $array_keys[$i];
		$$KeyIndex = $_POST[$KeyIndex];
	}
	for($i=0;$i<sizeof($rs_a);$i++)
	{
		if($rs_a[$i]['ѧ��']!="")		{
			$sql = "select SUM(��Ŀ����) AS ���˻��� from edu_evaluatepersonal where ѧ��='".$rs_a[$i]['ѧ��']."' and ѧ��='$ѧ��'";
			$rsX = $db->CacheExecute(150,$sql);
			$rsX_A = $rsX->GetArray();
			$���˻��� = $rsX_A[0]['���˻���']+90;

			//global $����_���ֵ,$����_��Сֵ,$����_���ֵ,$����_��Сֵ,$�е�_���ֵ,$�е�_��Сֵ,$����_���ֵ,$����_��Сֵ,$������_���ֵ,$������_��Сֵ;
			//print  $����_���ֵ.$����_��Сֵ.$����_���ֵ.$����_��Сֵ.$�е�_���ֵ.$�е�_��Сֵ.$����_���ֵ.$����_��Сֵ.$������_���ֵ.$������_��Сֵ;
			if($���˻���>=$����_��Сֵ)		{
				$���еȼ� = "����";
			}
			else if($���˻���<=$����_���ֵ&&$���˻���>=$����_��Сֵ)		{
				$���еȼ� = "����";
			}
			else if($���˻���<=$�е�_���ֵ&&$���˻���>=$�е�_��Сֵ)		{
				$���еȼ� = "�е�";
			}
			else if($���˻���<=$����_���ֵ&&$���˻���>=$����_��Сֵ)		{
				$���еȼ� = "����";
			}
			else							{
				$���еȼ� = "������";
			}
		}
		else	{
			$���˻��� = '';
			$���еȼ� = "";
		}

		$number=$i+1; //number��ʾ�������
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['ѧ��']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['����']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$���˻���."</td>
		<td nowrap align=center class=TableData>&nbsp;".$���еȼ�."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��ʦ']."</td>
		</tr>";
    }

	 print "<tr>
			<td nowrap align=center class=TableData>��ע</td>
			<td nowrap align=center class=TableData colspan=4>&nbsp</td>
	  </tr>";
	 print "</table>";



	 //ѧ����ְ���
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		ѧ����ְ���</TD></TR>
		";
	//�����༶  ����ְ��  ��ְʱ��  ��ע  ������
	$sql="SELECT * FROM edu_banweiguanli WHERE ѧ�� = '$ѧ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>ѧ<br>��<br>��<br>ְ</td>
        <td nowrap align=center class=TableContent>&nbsp;ѧ������</td>
		<td nowrap align=center class=TableContent>���ΰ༶</td>
        <td nowrap align=center class=TableContent>����ְ��</td>
        <td nowrap align=center class=TableContent>��ְʱ��</td>
        <td nowrap align=center class=TableContent>��ע</td>
     </tr>";
	for($i=0;$i<sizeof($rs_a);$i++)
	{

		$number=$i+1; //number��ʾ�������
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['ѧ��']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['�����༶']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['����ְ��']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��ְʱ��']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��ע']."</td>
		</tr>";
    }

	 print "</table>";


	 //ѧ������
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		ѧ���������</TD></TR>
		";
	//ѧ������  ����ʽ  ��������  ��������  ��ע
	$sql="SELECT * FROM edu_studentjiangcheng WHERE ѧ��ѧ�� = '$ѧ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>ѧ<br>��<br>��<br>��</td>
        <td nowrap align=center class=TableContent>&nbsp;ѧ������</td>
		<td nowrap align=center class=TableContent>���ͷ�ʽ</td>
        <td nowrap align=center class=TableContent>��������</td>
        <td nowrap align=center class=TableContent>��������</td>
        <td nowrap align=center class=TableContent>��ע</td>
     </tr>";
	for($i=0;$i<sizeof($rs_a);$i++)
	{

		$number=$i+1; //number��ʾ�������
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['ѧ��']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['����ʽ']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['��������']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��������']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��ע']."</td>
		</tr>";
    }

	 print "</table>";


	 //ѧ��Υ��
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		ѧ��Υ�����</TD></TR>
		";
	//ѧ������  ����ʽ  ��������  ��������  ��ע
	$sql="SELECT * FROM edu_weijihuizong WHERE ѧ��ѧ�� = '$ѧ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>ѧ<br>��<br>Υ<br>��</td>
		<td nowrap align=center class=TableContent>Υ������</td>
        <td nowrap align=center class=TableContent>Υ�����</td>
        <td nowrap align=center class=TableContent>Υ������</td>
        <td nowrap align=center class=TableContent>��Ϣ��Դ</td>
		<td nowrap align=center class=TableContent>��ע</td>
     </tr>";
	for($i=0;$i<sizeof($rs_a);$i++)
	{

		$number=$i+1; //number��ʾ�������
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['Υ�����']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['Υ�����']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['Υ������']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��Ϣ��Դ']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['��ע']."</td>
		</tr>";
    }

	 print "</table>";

}




function ��ӡ�ɼ�ѧ��($ID)		{
	global $db,$smarty;
	global $sessionkey,$ѧУ����;
	//ѧ��
	$sql = "select * from edu_student where (`ѧ��`='$ID')";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if($rs_a[0]['ѧ��']=="")		{//�����ѧ���ж�Ϊ��,���Ա��Ϊ�ж�Դ
		$sql = "select * from edu_student where (`���`='$ID')";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
	}
	$ѧ����Ϣ  = $rs_a;
	$ѧ�� = $rs_a[0]['ѧ��'];
	$�༶ = $rs_a[0]['���'];
	$��ѧ��� = returntablefield("edu_banji","�༶����",$�༶,"��ѧ���");
	if($��ѧ���=='')			{
		print_infor("û�а༶����ѧ�����Ϣ",'trip');
		exit;
	}

	  //ѧ���ɼ�
	  print	"<table class=TableBlock  style=\"line-height:12px\" align=center width=650>
	  <TR><TD class=TableHeader align=center colSpan=7>
	  &nbsp;ѧ��ѧ��(�ɼ�ѧ����Ϣ)��</TD></TR>
	  <TR class=TableHeader><td nowrap colspan=7><B>������</B>
	  <B><font color='#FF0000'>".$ѧ����Ϣ[0]['����']."</font></B>
	  &nbsp &nbsp &nbsp&nbsp
	  <B> ���ţ�".$ѧ����Ϣ[0]['����']."</B>
	  &nbsp &nbsp &nbsp&nbsp
	  <B> ѧ�ţ�".$ѧ����Ϣ[0]['ѧ��']."</B>
	  &nbsp &nbsp &nbsp&nbsp
	  <B> �༶��".$�༶."</B></td>
	  </tr>
	  <TR class=TableHeader>
			<TD nowrap>ѧ��</TD>
			<TD nowrap>ѧ��</TD>
			<TD nowrap>�γ�</TD>
			<TD nowrap>����</TD>
			<TD nowrap>����</TD>
			<TD nowrap>����</TD>
			<TD nowrap>ѧ��</TD>
			</TR>
			";
	//<TD nowrap>����</TD><TD nowrap>����</TD>

	$��ѧ�� = 0;
	$�ѻ��ѧ�� = 0;

	for($i=$��ѧ���;$i<$��ѧ���+3;$i++)		{
		$�ڶ�ѧ�� = $i."-".($i+1)."-�ڶ�ѧ��";
		//$��һѧ�� = ($i+1)."-".($i+2)."-��һѧ��";
		$��һѧ�� = $i."-".($i+1)."-��һѧ��";
		//$�ڶ�ѧ������ = ($i-$��ѧ���)*2+2;
		//$��һѧ������ = ($i-$��ѧ���)*2+1;
		$����2 = returntablefield("edu_examname","ѧ������",$�ڶ�ѧ��,"��������");
		$����1 = returntablefield("edu_examname","ѧ������",$��һѧ��,"��������");



		$�γ���ϢSQL = "select distinct �γ�,����,��������,���޷��� from edu_exam where ѧ��='$ѧ��' and �༶='$�༶' and ��������='$����1'";
		$rs = $db->Execute($�γ���ϢSQL);
		$�γ���ϢRSA1 = $rs->GetArray();
		//print $�γ���ϢSQL;print_R($�γ���ϢRSA1);
		//print "<HR>";exit;
		if(sizeof($�γ���ϢRSA1)==0)		{
			$�γ���ϢRSA1[] = '';
			$�γ���ϢRSA1[] = '';
			$�γ���ϢRSA1[] = '';
			$�γ���ϢRSA1[] = '';
			$�γ���ϢRSA1[] = '';
			$�γ���ϢRSA1[] = '';
		}

		$�γ���ϢSQL = "select distinct �γ�,����,��������,���޷��� from edu_exam where ѧ��='$ѧ��' and �༶='$�༶' and ��������='$����2'";
		$rs = $db->Execute($�γ���ϢSQL);
		$�γ���ϢRSA2 = $rs->GetArray();
		//print $�γ���ϢSQL;print_R($�γ���ϢRSA2);
		if(sizeof($�γ���ϢRSA2)==0)		{
			$�γ���ϢRSA2[] = '';
			$�γ���ϢRSA2[] = '';
			$�γ���ϢRSA2[] = '';
			$�γ���ϢRSA2[] = '';
			$�γ���ϢRSA2[] = '';
			$�γ���ϢRSA2[] = '';
		}

		//print_R($�γ���ϢRSA1);exit;
		for($X=0;$X<sizeof($�γ���ϢRSA1);$X++)			{
			$�γ� = $�γ���ϢRSA1[$X]['�γ�'];
			$����SQL = "select ѧ��,���� from edu_planexec where ����ѧ��='$��һѧ��' and �γ�����='$�γ�' and �༶����='$�༶'";
			//print $����SQL;
			$rs = $db->Execute($����SQL);
			$����SQLRSA = $rs->GetArray();
			$ѧ�� = $����SQLRSA[0]['ѧ��'];//exit;
			$���� = $����SQLRSA[0]['����'];

			$���� = $�γ���ϢRSA1[$X]['����'];
			$���� = $�γ���ϢRSA1[$X]['��������'];
			$���� = $�γ���ϢRSA1[$X]['���޷���'];

			if($����>=60.0||$����>=60.0||$����>=60.0)			{
				//���ѧ��
				$ѧ�� = $ѧ��;
				$��ѧ�� += $ѧ��;
				$�ѻ��ѧ�� += $ѧ��;
			}
			else		{
				//û��ѧ��
				$��ѧ�� += $ѧ��;
				$ѧ�� = "<font color=red>$ѧ��</font>";
				//$�ѻ��ѧ�� += $ѧ��;
			}

			if($����<60&&$����>0)	{
				if($����<60)	$���� = "<font color=red><I>$����</I></font>";
				else			$���� = "<font color=black><I>$����</I></font>";
			}else				$���� = '';

			if($����<60&&$����>0)	{
				if($����<60)	$���� = "<font color=red><I>$����</I></font>";
				else			$���� = "<font color=black><I>$����</I></font>";
			}else				$���� = '';

			if($X==0)		{

				$ѧ��INFOR = "<TD rowspan=".(sizeof($�γ���ϢRSA2)+sizeof($�γ���ϢRSA1))." nowrap>$i</TD>";
				$ѧ��INFOR = "<TD rowspan=".(sizeof($�γ���ϢRSA1))." nowrap>&nbsp;$��һѧ��</TD>";
				//$����INFOR = "<TD rowspan=".(sizeof($�γ���ϢRSA1))." nowrap>&nbsp;$����2</TD>";
			}
			else	{
				$ѧ��INFOR = "";
				$ѧ��INFOR = "";
				$����INFOR = "";
			}

			print "<TR class=TableData>

				$ѧ��INFOR
				$ѧ��INFOR

				<TD nowrap>&nbsp;$�γ�</TD>
				<TD nowrap>&nbsp;$����</TD>
				<TD nowrap>&nbsp;$����</TD>
				<TD nowrap>&nbsp;$����</TD>
				<TD nowrap>&nbsp;$ѧ��</TD>
				</TR>
				";
				//<TD nowrap>&nbsp;$����</TD>
		}

		//print_R($�γ���ϢRSA2);
		for($X=0;$X<sizeof($�γ���ϢRSA2);$X++)			{
			$�γ� = $�γ���ϢRSA2[$X]['�γ�'];
			$����SQL = "select ѧ��,���� from edu_planexec where ����ѧ��='$�ڶ�ѧ��' and �γ�����='$�γ�' and �༶����='$�༶'";
			//print $����SQL;
			$rs = $db->Execute($����SQL);
			$����SQLRSA = $rs->GetArray();
			$ѧ�� = $����SQLRSA[0]['ѧ��'];
			$���� = $����SQLRSA[0]['����'];
			if($����==''&&$�γ�!='')			{
				$���� = returntablefield("edu_course","�γ�����",$�γ�,"���˷�ʽ");
			}
			$���� = $�γ���ϢRSA2[$X]['����'];
			$���� = $�γ���ϢRSA2[$X]['��������'];
			$���� = $�γ���ϢRSA2[$X]['���޷���'];

			if($����>=60.0||$����>=60.0||$����>=60.0)			{
				//���ѧ��
				$ѧ�� = $ѧ��;
				$��ѧ�� += $ѧ��;
				$�ѻ��ѧ�� += $ѧ��;
			}
			else		{
				//û��ѧ��
				$��ѧ�� += $ѧ��;
				$ѧ�� = "<font color=red>$ѧ��</font>";
				//$�ѻ��ѧ�� += $ѧ��;
			}

			if($����<60&$����>0)	{
				if($����<60)	$���� = "<font color=red><I>$����</I></font>";
				else			$���� = "<font color=black><I>$����</I></font>";
			}else			$���� = '';

			if($����<60&&$����>0)	{
				if($����<60)	$���� = "<font color=red><I>$����</I></font>";
				else			$���� = "<font color=black><I>$����</I></font>";
			}else			$���� = '';

			if($X==0)		{
				$ѧ��INFOR = "";
				$ѧ��INFOR = "<TD rowspan=".(sizeof($�γ���ϢRSA2))." nowrap>&nbsp;$�ڶ�ѧ��</TD>";
				//$����INFOR = "<TD rowspan=".(sizeof($�γ���ϢRSA2))." nowrap>&nbsp;$����2</TD>";
			}
			else	{
				$ѧ��INFOR = "";
				$ѧ��INFOR = "";
				$����INFOR = "";
			}

			print "<TR class=TableData>

				$ѧ��INFOR
				$ѧ��INFOR

				<TD nowrap>&nbsp;$�γ�</TD>
				<TD nowrap>&nbsp;$����</TD>
				<TD nowrap>&nbsp;$����</TD>
				<TD nowrap>&nbsp;$����</TD>
				<TD nowrap>&nbsp;$ѧ��</TD>
				</TR>
				";
			//<TD nowrap>&nbsp;$����</TD>
		}







	}

	print "<TR class=TableData style='line-height=18px'>

				<TD nowrap colspan=2>&nbsp;��ѧ��</TD>
				<TD nowrap colspan=5>&nbsp;�ѻ��ѧ��:".$�ѻ��ѧ��." ��ѧ��:".$��ѧ��."</TD>
				</TR>
				";

	print "</table> <br>";




}

?>