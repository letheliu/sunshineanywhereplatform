<?php
	require_once("lib.inc.php");
	
	$GLOBAL_SESSION=returnsession();
	page_css("团费支出统计");
?>
<?php
	$_GET['Year_Month'] == "" ? $_GET['Year_Month'] = Date('Y-m'): "";
	$_GET['Action_Mode'] == "" ? $_GET['Action_Mode'] = "0" : "";

	if($_GET['Year_Month_Select'] != "") 
	$Year_Month = $_GET['Year_Month_Select']; 
	else
	$Year_Month = $_GET['Year_Month'];

	$Action_Mode = $_GET['Action_Mode'];

	$sql = "select 支出时间 as 支出日期,Date_Format(支出时间,'%Y-%m') as 支出月份,机构名称,sum(支出金额) as 支出金额 from edu_leaguefeeout group by 支出日期,机构名称";

	ShowData();
?>
<?php
	function ShowData()
	{
		global $db,$sql;
		global $_GET,$_POST,$Action_Mode,$Year_Month;
		
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();

		$Year_Pure=substr($Year_Month,0,4);
		$Month_Pure=substr($Year_Month,5,2);

		$headermonth_before=Date("Y-m",mktime(0,0,0,$Month_Pure-1,Date("d"),$Year_Pure));
		$headermonth_after=Date("Y-m",mktime(0,0,0,$Month_Pure+1,Date("d"),$Year_Pure));
		$total_day=Date("t",mktime(0,0,0,$Month_Pure,Date("d"),$Year_Pure));
		

		//print_r($rs_a);
		
		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$list = $rs_a[$i];
			$支出日期 = $list['支出日期'];
			$支出月份 = $list['支出月份'];
			$机构名称 = $list['机构名称'];
			$支出金额 = $list['支出金额'];

			$by_year[$支出日期] += $支出金额;
			$by_month[$支出月份] += $支出金额;
			$by_organization_day[$机构名称][$支出日期] += $支出金额;
			$by_organization_month[$机构名称][$支出月份] += $支出金额;
			$by_organization_year[$机构名称][substr($支出月份,0,4)] += $支出金额;
		}
		
		//画表头
		TableHead($Year_Month,$Action_Mode,$headermonth_before,$headermonth_after);

		//显示每月日期
		ShowDay($Year_Month,$total_day);

		//按机构统计
		By_Organization($by_organization_day,$by_organization_month,$by_organization_year,$total_day,$Month_Pure,$Year_Pure);
		
		//按年统计
		By_Year($by_year,$total_day,$Year_Pure);

	}
?>
<?php
	function TableHead($Year_Month,$Action_Mode,$headermonth_before,$headermonth_after)
	{
		global $db;
		$sql = "select distinct Date_Format(支出时间,'%Y-%m') as 支出月份 from edu_leaguefeeout order by 支出月份 desc ";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		
		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$month_rs[$i] = $rs_a[$i]['支出月份'];
		}
		print "<H2 align=center>团费支出信息统计</H2>";
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
		print "<Td colspan=35 height=22>团费支出信息统计 $title</Td></tr>";

	}

	function ShowDay($Year_Month,$total_day)
	{
		print "<Tr class=TableContent>";
		print "<Td noWrap title='日期' colspan=3 class=TableContent>日期</Td>";
		for($col=1;$col<=$total_day;$col++)
		{
			$date=Date("Y-m-d",mktime(0,0,0,$month_pure,$i,$year_pure));
			$day=substr($date,-2);
			print "<Td>$col</Td>";
		}
		print "<Td>".substr($Year_Month,-2)."月</Td>";	
		print "</Tr>";
	}

	function By_Organization($by_organization_day,$by_organization_month,$by_organization_year,$total_day,$Month_Pure,$Year_Pure)
	{
		//print_r($by_organization_month);
		global $db;
		//判断总共有多少机构在本月有过操作
		$sql = "select distinct 机构名称 from edu_leaguefeeout where Date_Format(支出时间,'%Y-%m')= '".$Year_Pure."-".$Month_Pure."'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();

		//print_r($rs_a);

		for($i=0;$i<sizeof($rs_a);$i++)
		{
			$机构名称 = $rs_a[$i]['机构名称'];

			$编号 = @array_keys($by_person_day[$机构名称]);
			$month = Date("Y-m",mktime(0,0,0,$Month_Pure,1,$Year_Pure));
	
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

		$机构名称_arr = @array_keys($by_organization_year);
		for($i=0;$i<sizeof($机构名称_arr);$i++)
		{
			if($by_organization_year[$机构名称_arr[$i]][$Year_Pure]!="")
			{
				print "<Tr><Td class=TableContent colspan=3>".$机构名称.$Year_Pure."全年</Td>";
				print "<Td class=TableContent colspan=".($total_day+1)." align=center>".$by_organization_year[$机构名称_arr[$i]][$Year_Pure]."</Td></Tr>";
			}
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