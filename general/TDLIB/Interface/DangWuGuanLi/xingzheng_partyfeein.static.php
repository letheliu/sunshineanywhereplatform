<?php
	require_once("lib.inc.php");
	
	$GLOBAL_SESSION=returnsession();
	page_css("���ѽ���ͳ��");
?>
<?php
	$_GET['Year_Month'] == "" ? $_GET['Year_Month'] = Date('Y-m'): "";
	$_GET['Action_Mode'] == "" ? $_GET['Action_Mode'] = "0" : "";

	if($_GET['Year_Month_Select'] != "") 
	$Year_Month = $_GET['Year_Month_Select']; 
	else
	$Year_Month = $_GET['Year_Month'];

	$Action_Mode = $_GET['Action_Mode'];

	$sql = "select ����ʱ�� as ��������,Date_Format(����ʱ��,'%Y-%m') as �����·�,��������,��Ա���,����,sum(���ɽ��) as ���ɽ�� from edu_partyfee group by ��������,��������,��Ա���";
	ShowData();
?>
<?php
	function ShowData()
	{
		global $db,$sql;
		global $_GET,$_POST,$Action_Mode,$Year_Month;
		
		$rs=$db->Execute($sql);
		$rs_a=$rs->GetArray();

		$Year_Pure=substr($Year_Month,0,4);
		$Month_Pure=substr($Year_Month,5,2);

		$headermonth_before=Date("Y-m",mktime(0,0,0,$Month_Pure-1,Date("d"),$Year_Pure));
		$headermonth_after=Date("Y-m",mktime(0,0,0,$Month_Pure+1,Date("d"),$Year_Pure));
		$total_day=Date("t",mktime(0,0,0,$Month_Pure,Date("d"),$Year_Pure));
		
		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$list = $rs_a[$i];
			$�������� = $list['��������'];
			$�����·� = $list['�����·�'];
			$��Ա��� = $list['��Ա���'];
			$�������� = $list['��������'];
			$���� = $list['����'];
			$���ɽ�� = $list['���ɽ��'];

			$by_year[$��������] += $���ɽ��;
			$by_organization_day[$��������][$��������] += $���ɽ��;
			$by_person_day[$��������][$��Ա���][$��������] += $���ɽ��;
			$by_organization_month[$��������][$�����·�] += $���ɽ��;
			$by_person_month[$��������][$��Ա���][$�����·�] += $���ɽ��;
		}
		//����ͷ
		TableHead($Year_Month,$Action_Mode,$headermonth_before,$headermonth_after);

		//��ʾÿ������
		ShowDay($Year_Month,$total_day);

		//������ͳ��
		By_Organization($by_organization_day,$by_organization_month,$by_person_day,$by_person_month,$total_day,$Month_Pure,$Year_Pure);
		
		//����ͳ��
		By_Year($by_year,$total_day,$Year_Pure);

	}
?>
<?php
	function TableHead($Year_Month,$Action_Mode,$headermonth_before,$headermonth_after)
	{
		global $db;
		$sql = "select distinct Date_Format(����ʱ��,'%Y-%m') as �����·� from edu_partyfee order by �����·� desc ";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		
		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$month_rs[$i] = $rs_a[$i]['�����·�'];
		}
		print "<H2 align=center>���ѽ�����Ϣͳ��</H2>";
		print "<Table width=950>";
		print	 "<Tr align=right>";
		print		"<Td>";
		print		  "<FORM METHOD=GET ACTION=\"\">";
		print             "<LABEL NAME=\"Year_Month_Label\">��ѯ����</LABEL>";
		print				"<SELECT NAME=\"Year_Month_Select\">";
							for($i=0;$i<sizeof($month_rs);$i++)
							{
								if($Year_Month==$month_rs[$i]) $Selected = "selected";
								else	$Selected = "";
								print "<OPTION VALUE='".$month_rs[$i]."' $Selected>".$month_rs[$i]."</OPTION>";
							}			
		print				"</SELECT>";
		print			"<INPUT TYPE=\"submit\"  class=SmallButton  VALUE=\"���в�ѯ\">";
		print		  "</FORM>";
		print		"</Td>";
		print	 "</Tr>";
		print "</Table>";

		table_begin(950);
		//��ͷ
		$title.="<font title=".$Year_Month.">".$Year_Month."</font>";
		$title.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?Year_Month=".$headermonth_before."&Action_Mode=$Action_Mode\"><img src=\"../../Framework/images/arrow_l.gif\"></a>&nbsp;&nbsp;<a href=\"?Year_Month=".$headermonth_after."&Action_Mode=$Action_Mode\"><img src=\"../../Framework/images/arrow_r.gif\"></a>";
		print "<Tr class=TableHeader>";
		print "<Td colspan=35 height=22>���ѽ�����Ϣͳ�� $title</Td></tr>";

	}

	function ShowDay($Year_Month,$total_day)
	{
		print "<Tr class=TableContent>";
		print "<Td noWrap title='����' colspan=3>����</Td>";
		for($col=1;$col<=$total_day;$col++)
		{
			$date=Date("Y-m-d",mktime(0,0,0,$month_pure,$i,$year_pure));
			$day=substr($date,-2);
			print "<Td>$col</Td>";
		}
		print "<Td>".substr($Year_Month,-2)."��</Td>";	
		print "</Tr>";
	}

	function By_Organization($by_organization_day,$by_organization_month,$by_person_day,$by_person_month,$total_day,$Month_Pure,$Year_Pure)
	{
		//print_r($by_organization_month);
		global $db;
		//�ж��ܹ��ж��ٻ����ڱ����й�����
		$sql = "select distinct �������� from edu_partyfee where Date_Format(����ʱ��,'%Y-%m')= '".$Year_Pure."-".$Month_Pure."'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();

		//print_r($rs_a);

		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$��������=$rs_a[$i]['��������'];

			$��� = @array_keys($by_person_day[$��������]);
			$month = Date("Y-m",mktime(0,0,0,$Month_Pure,1,$Year_Pure));
			
				for($j=0;$j<sizeof($���);$j++)
				{
					for($day=1;$day<=$total_day;$day++)
					{
						$date=Date("Y-m-d",mktime(0,0,0,$Month_Pure,$day,$Year_Pure));	
						 if($day==1)
						{
							if($j==0)
							print "<Tr><Td rowspan=".sizeof($���)." class=TableContent>".$��������."</Td>";
							print "<Td class=TableContent>".$���[$j]."</Td>";
							$���� = returntablefield("edu_partymember","���",$���[$j],"����");
							print "<Td class=TableContent>".$����."</Td>";
							print "<Td class=TableContent>".$by_person_day[$��������][$���[$j]][$date]."</Td>";
						}
						 else
						{
							print "<Td class=TableContent>".$by_person_day[$��������][$���[$j]][$date]."</Td>";
						}
						if($day==$total_day)
						{
							print "<Td class=TableContent>".$by_person_month[$��������][$���[$j]][$month]."</Td>";
							print "</Tr>";
						}
					}	
				}
			//�������Ľɷ�����
			for($day=1;$day<=$total_day;$day++)
			{
				$date=Date("Y-m-d",mktime(0,0,0,$Month_Pure,$day,$Year_Pure));	
				if($day==1)
				{	
					print "<Tr><Td class=TableContent colspan=3>".$��������."�ϼ�</Td>";
					print "<Td class=TableContent>".$by_organization_day[$��������][$date]."</Td>";
				}
				else
					print "<Td class=TableContent>".$by_organization_day[$��������][$date]."</Td>";
			}
			print "<Td class=TableContent>".$by_organization_month[$��������][$month]."</Td></Tr>";
		}
	}

	function By_Year($by_year,$total_day,$Year_Pure)
	{
		$date = @array_keys($by_year);
		for($i=0;$i<sizeof($date);$i++)
		{
			if(substr($date[$i],0,4)==$Year_Pure)
			$By_Year[$Year_Pure]+=$by_year[$date[$i]];
		}
		$By_Year[$Year_Pure]=="" ? $By_Year[$Year_Pure]=0:"";
		print "<Tr><Td class=TableContent colspan=3>".$Year_Pure."ȫ��</Td>";
		print "<Td class=TableContent colspan=34 align=center>".$By_Year[$Year_Pure]."</Td></Tr>";
		print "<Tr></Tr>";
		print "<Tr class=TableContent><Td colspan=".($total_day+4)." align=center><B>ʹ��˵��:�û����Ե�������ŵ����Ƿ���������ϸ��£��¸��£�����Ϣͳ�Ƽ�¼��Ҳ����ѡ������������·ݽ��в�ѯ</B></Td></Tr>";	
		table_end();
	}
?>