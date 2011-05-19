<?php
	require_once("lib.inc.php");
	
	$GLOBAL_SESSION=returnsession();
	page_css("党费缴纳统计");
?>
<?php
	$_GET['Year_Month'] == "" ? $_GET['Year_Month'] = Date('Y-m'): "";
	$_GET['Action_Mode'] == "" ? $_GET['Action_Mode'] = "0" : "";

	if($_GET['Year_Month_Select'] != "") 
	$Year_Month = $_GET['Year_Month_Select']; 
	else
	$Year_Month = $_GET['Year_Month'];

	$Action_Mode = $_GET['Action_Mode'];

	$sql = "select 缴纳时间 as 缴纳日期,Date_Format(缴纳时间,'%Y-%m') as 缴纳月份,机构名称,人员编号,姓名,sum(缴纳金额) as 缴纳金额 from edu_partyfee group by 缴纳日期,机构名称,人员编号";
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
			$缴纳日期 = $list['缴纳日期'];
			$缴纳月份 = $list['缴纳月份'];
			$人员编号 = $list['人员编号'];
			$机构名称 = $list['机构名称'];
			$姓名 = $list['姓名'];
			$缴纳金额 = $list['缴纳金额'];

			$by_year[$缴纳日期] += $缴纳金额;
			$by_organization_day[$机构名称][$缴纳日期] += $缴纳金额;
			$by_person_day[$机构名称][$人员编号][$缴纳日期] += $缴纳金额;
			$by_organization_month[$机构名称][$缴纳月份] += $缴纳金额;
			$by_person_month[$机构名称][$人员编号][$缴纳月份] += $缴纳金额;
		}
		//画表头
		TableHead($Year_Month,$Action_Mode,$headermonth_before,$headermonth_after);

		//显示每月日期
		ShowDay($Year_Month,$total_day);

		//按机构统计
		By_Organization($by_organization_day,$by_organization_month,$by_person_day,$by_person_month,$total_day,$Month_Pure,$Year_Pure);
		
		//按年统计
		By_Year($by_year,$total_day,$Year_Pure);

	}
?>
<?php
	function TableHead($Year_Month,$Action_Mode,$headermonth_before,$headermonth_after)
	{
		global $db;
		$sql = "select distinct Date_Format(创建时间,'%Y-%m') as 缴纳月份 from edu_partyfee order by 缴纳月份 desc ";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		
		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$month_rs[$i] = $rs_a[$i]['缴纳月份'];
		}
		print "<H2 align=center>党费缴纳信息统计</H2>";
		print "<Table width=950>";
		print	 "<Tr align=right>";
		print		"<Td>";
		print		  "<FORM METHOD=GET ACTION=\"\">";
		print             "<LABEL NAME=\"Year_Month_Label\">查询年月</LABEL>";
		print				"<SELECT NAME=\"Year_Month_Select\">";
							for($i=0;$i<sizeof($month_rs);$i++)
							{
								if($Year_Month==$month_rs[$i]) $Selected = "selected";
								else	$Selected = "";
								print "<OPTION VALUE='".$month_rs[$i]."' $Selected>".$month_rs[$i]."</OPTION>";
							}			
		print				"</SELECT>";
		print			"<INPUT TYPE=\"submit\"  class=SmallButton  VALUE=\"进行查询\">";
		print		  "</FORM>";
		print		"</Td>";
		print	 "</Tr>";
		print "</Table>";

		table_begin(950);
		//表头
		$title.="<font title=".$Year_Month.">".$Year_Month."</font>";
		$title.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?Year_Month=".$headermonth_before."&Action_Mode=$Action_Mode\"><img src=\"../../Framework/images/arrow_l.gif\"></a>&nbsp;&nbsp;<a href=\"?Year_Month=".$headermonth_after."&Action_Mode=$Action_Mode\"><img src=\"../../Framework/images/arrow_r.gif\"></a>";
		print "<Tr class=TableHeader>";
		print "<Td colspan=35 height=22>党费缴纳信息统计 $title</Td></tr>";

	}

	function ShowDay($Year_Month,$total_day)
	{
		print "<Tr class=TableContent>";
		print "<Td noWrap title='日期' colspan=3>日期</Td>";
		for($col=1;$col<=$total_day;$col++)
		{
			$date=Date("Y-m-d",mktime(0,0,0,$month_pure,$i,$year_pure));
			$day=substr($date,-2);
			print "<Td>$col</Td>";
		}
		print "<Td>".substr($Year_Month,-2)."月</Td>";	
		print "</Tr>";
	}

	function By_Organization($by_organization_day,$by_organization_month,$by_person_day,$by_person_month,$total_day,$Month_Pure,$Year_Pure)
	{
		//print_r($by_organization_month);
		global $db;
		//判断总共有多少机构在本月有过操作
		$sql = "select distinct 机构名称 from edu_partyfee where Date_Format(缴纳时间,'%Y-%m')= '".$Year_Pure."-".$Month_Pure."'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();

		//print_r($rs_a);

		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$机构名称=$rs_a[$i]['机构名称'];

			$编号 = @array_keys($by_person_day[$机构名称]);
			$month = Date("Y-m",mktime(0,0,0,$Month_Pure,1,$Year_Pure));
			
				for($j=0;$j<sizeof($编号);$j++)
				{
					for($day=1;$day<=$total_day;$day++)
					{
						$date=Date("Y-m-d",mktime(0,0,0,$Month_Pure,$day,$Year_Pure));	
						 if($day==1)
						{
							if($j==0)
							print "<Tr><Td rowspan=".sizeof($编号)." class=TableContent>".$机构名称."</Td>";
							print "<Td class=TableContent>".$编号[$j]."</Td>";
							$姓名 = returntablefield("edu_partymember","编号",$编号[$j],"姓名");
							print "<Td class=TableContent>".$姓名."</Td>";
							print "<Td class=TableContent>".$by_person_day[$机构名称][$编号[$j]][$date]."</Td>";
						}
						 else
						{
							print "<Td class=TableContent>".$by_person_day[$机构名称][$编号[$j]][$date]."</Td>";
						}
						if($day==$total_day)
						{
							print "<Td class=TableContent>".$by_person_month[$机构名称][$编号[$j]][$month]."</Td>";
							print "</Tr>";
						}
					}	
				}
			//画机构的缴费数据
			for($day=1;$day<=$total_day;$day++)
			{
				$date=Date("Y-m-d",mktime(0,0,0,$Month_Pure,$day,$Year_Pure));	
				if($day==1)
				{	
					print "<Tr><Td class=TableContent colspan=3>".$机构名称."合计</Td>";
					print "<Td class=TableContent>".$by_organization_day[$机构名称][$date]."</Td>";
				}
				else
					print "<Td class=TableContent>".$by_organization_day[$机构名称][$date]."</Td>";
			}
			print "<Td class=TableContent>".$by_organization_month[$机构名称][$month]."</Td></Tr>";
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
		print "<Tr><Td class=TableContent colspan=3>".$Year_Pure."全年</Td>";
		print "<Td class=TableContent colspan=34 align=center>".$By_Year[$Year_Pure]."</Td></Tr>";
		print "<Tr></Tr>";
		print "<Tr class=TableContent><Td colspan=".($total_day+4)." align=center><B>使用说明:用户可以点击最上排的三角符号来获得上个月（下个月）的信息统计记录，也可以选择下拉框里的月份进行查询</B></Td></Tr>";	
		table_end();
	}
?>