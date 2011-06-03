<?
	require_once("lib.inc.php");
	page_css("客户综合信息查阅",$IE_TITLE);


//从kehu_search.php传参数过来!
    if($_GET['客户编号'] != ""){
	   $编号 = $_GET['客户编号'];
	}



	if($_GET['编号']!="")	{
		$编号 = $_GET['编号'];;
	}


	print "<div align=center>";
	print " <input type=button accesskey=p name=print value=打印本页 class=SmallButton onClick=\"document.execCommand('Print');\" >";
	if($_GET['actionAdd']=="close")		{
		print " <input type=button accesskey=p name=print value=关闭 class=SmallButton onClick=\"javascript:window.close();\" >";
	}
	else	{
		print " <input type=button accesskey=p name=print value=返回 class=SmallButton onClick=\"location='".$_GET['GOBACK']."?XX=XX&班号=".$班号."&pageid=".$_GET['pageid']."'\" >";
	}
	print "</div>";
	//print_R($_GET);
	print "<BR>";
	switch($_GET['action2'])		{
		default:
			CustomerInforView($编号);
			break;
	}

	exit;

function CustomerInforView($编号)		{
	global $db,$smarty;
	global $sessionkey,$学校名称,$SYTEM_CONFIG_TABLE;

	$sql = "select * from crm_customer where (编号='$编号')";
	$rs = $db->CacheExecute(5,$sql);
	$rs_a = $rs->GetArray();

	$html_etc = returnsystemlang("crm_customer",$SYTEM_CONFIG_TABLE);
	$html_etc = $html_etc['crm_customer'];

?>
<table class=TableBlock  align=center width=80% >
<TR><TD class=TableHeader align=center colSpan=6>
&nbsp;<?=$UnitName?>客户基本信息汇总&nbsp &nbsp </TD>
</TR>
	<TR>
    <td nowrap  colspan=6><B>客户编码:</B><B><font color='#FF0000'><?=$rs_a[0]['客户编码']?></font></B>
  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp <B>客户名称:</B><B><font color='#FF0000'><?=$rs_a[0]['客户名称']?></font></B> &nbsp &nbsp &nbsp &nbsp&nbsp简称:<B><font color='#FF0000'><?=$rs_a[0]['客户简称']?></font></B></td>
  </tr>

<tr class=TableHeader>
<td nowrap class="TableContent" >客户类型:</td>
<td class="TableData" colspan=1 nowrap><?=$rs_a[0]['客户类型']?></td>
<td nowrap class="TableContent" >客户来源:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['客户来源']?></td>
<td nowrap class="TableContent" width=20%>客户等级:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['客户等级']?></td>
</tr>
<trclass=TableHeader>
<td nowrap class="TableContent"  >需求主体:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['需求主体']?></td>
<td nowrap class="TableContent"  >需求类型:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['需求类型']?></td>
<td nowrap class="TableContent"  >需求时间:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['需求时间']?></td>
</tr>
<tr>
<td nowrap class="TableContent"  >所属地域:</td>
<td class="TableData" colspan=5 nowrap>&nbsp;<?=$rs_a[0]['所属地域']?></td>
</tr>

<tr>
<td nowrap class="TableContent"  >第一联系人:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['第一联系人']?></td>
<td nowrap class="TableContent"  >职务:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['职务']?> </td>
<td nowrap class="TableContent"  >手机:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['手机']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >电话:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['电话']?></td>
<td nowrap class="TableContent"  >传真:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['传真']?> </td>
<td nowrap class="TableContent"  >EMAIL:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['EMAIL']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >网址:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['网址']?></td>
<td nowrap class="TableContent"  >邮编:</td>
<td class="TableData" colspan=3 nowrap>&nbsp;<?=$rs_a[0]['邮编']?> </td>
</tr>
<tr>
<td nowrap class="TableContent"  >地址:</td>
<td class="TableData" colspan=5>&nbsp;<?=$rs_a[0]['地址']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >简介:</td>
<td class="TableData" colspan=5>&nbsp;<?=$rs_a[0]['简介']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >备注:</td>
<td class="TableData" colspan=5>&nbsp;<?=$rs_a[0]['备注']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >执行折扣协议:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['执行折扣协议']?></td>
<td nowrap class="TableContent"  >开户银行:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['开户银行']?> </td>
<td nowrap class="TableContent"  >付款账户:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['付款账户']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  >其它付款账户:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['其它付款账户']?></td>
<td nowrap class="TableContent"  ><?=$html_etc['自定义字段一']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['自定义字段一']?> </td>
<td nowrap class="TableContent"  ><?=$html_etc['自定义字段二']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['自定义字段二']?> </td>
</tr>

<tr>
<td nowrap class="TableContent"  ><?=$html_etc['自定义字段三']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['自定义字段三']?></td>
<td nowrap class="TableContent"  ><?=$html_etc['自定义字段四']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['自定义字段四']?> </td>
<td nowrap class="TableContent"  ><?=$html_etc['自定义字段五']?>:</td>
<td class="TableData" colspan=1 nowrap>&nbsp;<?=$rs_a[0]['自定义字段五']?> </td>
</tr>

</table>
</form>


<?


function 返回客户详细信息汇总($tablename,$FieldList,$Number,$客户名称,$title="客户费用及沟通成本明细")					{
	global $db;
	$html_etc = returnsystemlang($tablename);
	$sql = "select $FieldList from $tablename where 客户名称='$客户名称' order by 编号 limit $Number";
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


返回客户详细信息汇总('crm_expense',"费用单号,费用沟通概述,客户名称,联系人,发生时间,费用类型,费用金额,是否报销,发票情况,报销对象",10,$rs_a[0]['客户名称'],"客户费用及沟通成本明细");

返回客户详细信息汇总('crm_service',"服务编号,服务阶段,最后期限,服务概述,客户名称,联系人,严重程度,解决人员,解决方法,解决状态",10,$rs_a[0]['客户名称'],"客户服务明细");

返回客户详细信息汇总('crm_contract',"合同编号,客户名称,服务类型,合同总金额,合同签订时间,预计第一次付款时间,预计第一次付款金额,审核人",10,$rs_a[0]['客户名称'],"客户合同明细");

exit;
//$学号 = $rs_a[0]['学号'];

//证书##########################################################################
print	"<BR><table class=TableBlock  align=center
		width=80% style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		资格证书信息</TD></TR>
		";
  print	"<TR class=TableHeader>
		<TD>&nbsp;类别</TD>
		<TD>&nbsp;证书名称</TD>
		<TD>&nbsp;证书编号</TD>
		<TD>&nbsp;发证机构</TD>
		<TD>&nbsp;获证时间</TD>
		<TD>&nbsp;学分</TD>
	  </tr>
	  ";
	$sql = "SELECT * FROM `edu_zhengshuguanli` where  学号='$学号' limit 3";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	 for($i=0;$i<2;$i++)
		{
			print " <TR class=TableData>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['类别']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['证书名称']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['证书编号']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['发证机构']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['获证时间']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['学分']."</TD>
					</tr>";
		}
	print "</table>";


//学籍异动##########################################################################
print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		学籍异动</TD></TR>
		";
//学号  姓名  班级  异动类型  批准人  创建人  创建时间  学生去向  异动原因  审核状态
  print	"<TR class=TableHeader>
		<TD>&nbsp;异动类型</TD>
		<TD>&nbsp;批准人</TD>
		<TD>&nbsp;学生去向</TD>
		<TD>&nbsp;异动原因</TD>
		<TD>&nbsp;审核时间</TD>
		<TD>&nbsp;创建时间</TD>
  </tr>
  ";
	$sql = "SELECT * FROM edu_studentchange where  学号='$学号' limit 3";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$sql = "SELECT * FROM edu_studentflow where  学号='$学号' limit 3";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	if(sizeof($rsX_a)>0)			{
		for($i=0;$i<sizeof($rsX_a);$i++)
		{
			print " <TR class=TableData>
					<TD class=TableData nowrap>&nbsp;转班</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['批准人']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['新班级']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['调班原因']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['创建时间']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rsX_a[$i]['创建时间']."</TD>
					</tr>";
		}
	}
	for($i=0;$i<2;$i++)
		{
			print " <TR class=TableData>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['异动类型']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['批准人']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['学生去向']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['异动原因']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['审核时间']."</TD>
					<TD class=TableData nowrap>&nbsp;".$rs_a[$i]['创建时间']."</TD>
					</tr>";
		}

	print "</table>";

	//毕业条件##########################################################################
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		毕业条件</TD></TR>
		";
		 print "<TR class=TableData>
				<TD nowrap rowspan=5>毕业条件</TD>
				<TD nowrap>必修课情况</TD>
				<TD nowrap> </TD>
				<TD nowrap>分数</TD>
				<TD colspan=2 class=TableData nowrap> </TD>
				</tr>

				<TR class=TableData>
				<TD nowrap>选修课情况</TD>
				<TD nowrap> </TD>
				<TD nowrap>学分</TD>
				<TD colspan=2 class=TableData nowrap> </TD>
				</tr>

				<TR class=TableData>
				<TD nowrap>应达学分</TD>
				<TD nowrap> </TD>
				<TD nowrap>合计</TD>
				<TD colspan=2 class=TableData nowrap> </TD>
				</tr>


				<TR class=TableData>
				<TD nowrap width=10%>专业技能鉴定情况</TD>
				<TD class=TableData nowrap>&nbsp;</TD>
				<TD  nowrap width=10%>思想品德鉴定</TD>
				<TD colspan=2 class=TableData nowrap>&nbsp;</TD>
				</tr>

				<TR class=TableData>
				<TD   nowrap>毕业时间</TD>
				<TD class=TableData nowrap>&nbsp;</TD>
				<TD   nowrap>毕业证号</TD>
				<TD colspan=2 class=TableData nowrap>&nbsp;</TD>
				</tr>
				<TR class=TableData>
				<TD nowrap >毕业鉴定</TD>
				<TD class=TableData nowrap colspan=5><br><br><br></TD>

				</tr>";
			print "</table>";

}
function 打印附属信息($ID)			{
	global $db,$smarty;
	global $sessionkey,$学校名称;
	//学籍
	$sql = "select * from edu_student where (`学号`='$ID')";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if($rs_a[0]['学号']=="")		{//如果以学号判断为空,则以编号为判断源
		$sql = "select * from edu_student where (`编号`='$ID')";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
	}
	$学生信息  = $rs_a;
	$学号 = $rs_a[0]['学号'];
	$班级 = $rs_a[0]['班号'];
	$入学年份 = returntablefield("edu_banji","班级名称",$班级,"入学年份");

	//=================select 出所有【学期名称】================
	$sql = "select distinct 学期名称 FROM `edu_studentkaoqin` where 学期名称!='' and 学号 = '$学号' order by 学期名称 ";
	$rs = $db->Execute($sql);
	$学期数组 = $rs->GetArray();
	if(sizeof($学期数组)<3)		{
		$学期数组[] = '';
		$学期数组[] = '';
		$学期数组[] = '';
		$学期数组[] = '';
	}
	$学期数量 = sizeof($学期数组);
	//=================select 出所有【考勤类型】================
	$sql = "select distinct 考勤类型 FROM `edu_studentkaoqin` where 考勤类型!='' and 审核状态='1' order by 考勤类型";
	$rs = $db->Execute($sql);
	//

	$考勤类型数组 = array("事假","公假","病假","缺课","迟到","早退","睡觉");
	$考勤类型数量 = sizeof($考勤类型数组);

	//=============select 该学生的【姓名 座号】 等信息=================
	$sql = "select * from edu_student where 学号=  '$学号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
	}
	print	"<table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=center colspan=9>&nbsp;
		学生学籍(附属信息)卡</TD></TR>
		<TR class=TableHeader>
		<td nowrap  colspan=9><B>姓名：</B>
		<B><font color='#FF0000'>".$rs_a[0]['姓名']."</font></B>
	  &nbsp &nbsp &nbsp
	  <B> 座号：".$rs_a[0]['座号']."</B>
	  &nbsp &nbsp &nbsp
	  <B> 学号：".$rs_a[0]['学号']."</B>
	  &nbsp &nbsp &nbsp
	  <B> 班级：".$班级."</B>
	  </td>
	  </tr>";


				print " <tr><td nowrap align=center class=TableContent rowspan=".($学期数量+1).">考<br>勤<br>统<br>计</td>";

				$考勤记录 = array();
				$sql = "SELECT 学号,考勤类型,学期名称,COUNT(节次) AS 数量  FROM `edu_studentkaoqin` WHERE 学号 = '$学号' and 学期名称!='' and 审核状态='1'  group by 考勤类型,学期名称 order by 学号";
				//print $sql;
				$rs = $db->Execute($sql);
				$rs_a = $rs->GetArray();
				//print_R($考勤类型数组);
				//处理考勤类型
				print " <td nowrap align=center class=TableContent>考勤类型</td>";
				for($i=0;$i<sizeof($考勤类型数组);$i++){
					print" <td nowrap align=center class=TableContent>".$考勤类型数组[$i]."</td>";
				}
				//形成处理的数组
				for($n=0; $n<sizeof($rs_a);$n++)
				{
					$考勤类型 = $rs_a[$n]['考勤类型'];
					$学期名称 = $rs_a[$n]['学期名称'];
					$NewArray[$学期名称][$考勤类型] = $rs_a[$n]['数量'];
				}
				//处理学期列表
				for($n=0; $n<sizeof($学期数组);$n++)
				{
					$学期名称 = $学期数组[$n]['学期名称'];
					print"<tr><td nowrap align=center class=TableData>".$学期名称."</td>";
					for($m=0; $m<sizeof($考勤类型数组);$m++)
					{
						 $考勤类型=$考勤类型数组[$m];
						 print "<td nowrap align=center class=tabledata>&nbsp;<a href=\"../EDU/edu_studentkaoqinall_newai.php?".base64_encode("action=init_customer&学号=$学号&考勤类型=$考勤类型&学期名称=$学期名称&审核状态=1&action_close=close")."\" target=_blank>".$NewArray[$学期名称][$考勤类型]."<a/></td>";
					}
					print "</tr>";

				}
	print "</table><BR>";


	//学 期 评 语
	print	"<table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		学期评语</TD></TR>
		";
	$sql="SELECT * FROM `edu_qimopingyu` WHERE 学号 = '$学号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>学<br>期<br>评<br>语</td>
        <td nowrap align=center class=TableContent>&nbsp;学期名称</td>
        <td nowrap align=center class=TableContent>评语简要（20个字）</td>
        <td nowrap align=center class=TableContent>个人积分</td>
		<td nowrap align=center class=TableContent>操行等级</td>
        <td nowrap align=center class=TableContent>班主任</td>
     </tr>";

	 //得到个人积分转等级
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
		if($rs_a[$i]['学期']!="")		{
			$sql = "select SUM(项目分数) AS 个人积分 from edu_evaluatepersonal where 学期='".$rs_a[$i]['学期']."' and 学号='$学号'";
			$rsX = $db->CacheExecute(150,$sql);
			$rsX_A = $rsX->GetArray();
			$个人积分 = $rsX_A[0]['个人积分']+90;

			//global $优秀_最大值,$优秀_最小值,$良好_最大值,$良好_最小值,$中等_最大值,$中等_最小值,$及格_最大值,$及格_最小值,$不及格_最大值,$不及格_最小值;
			//print  $优秀_最大值.$优秀_最小值.$良好_最大值.$良好_最小值.$中等_最大值.$中等_最小值.$及格_最大值.$及格_最小值.$不及格_最大值.$不及格_最小值;
			if($个人积分>=$优秀_最小值)		{
				$操行等级 = "优秀";
			}
			else if($个人积分<=$良好_最大值&&$个人积分>=$良好_最小值)		{
				$操行等级 = "良好";
			}
			else if($个人积分<=$中等_最大值&&$个人积分>=$中等_最小值)		{
				$操行等级 = "中等";
			}
			else if($个人积分<=$及格_最大值&&$个人积分>=$及格_最小值)		{
				$操行等级 = "及格";
			}
			else							{
				$操行等级 = "不及格";
			}
		}
		else	{
			$个人积分 = '';
			$操行等级 = "";
		}

		$number=$i+1; //number显示评语次序
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['学期']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['评语']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$个人积分."</td>
		<td nowrap align=center class=TableData>&nbsp;".$操行等级."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['教师']."</td>
		</tr>";
    }

	 print "<tr>
			<td nowrap align=center class=TableData>备注</td>
			<td nowrap align=center class=TableData colspan=4>&nbsp</td>
	  </tr>";
	 print "</table>";



	 //学生任职情况
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		学生任职情况</TD></TR>
		";
	//所属班级  担任职务  任职时间  备注  创建人
	$sql="SELECT * FROM edu_banweiguanli WHERE 学号 = '$学号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>学<br>生<br>任<br>职</td>
        <td nowrap align=center class=TableContent>&nbsp;学期名称</td>
		<td nowrap align=center class=TableContent>担任班级</td>
        <td nowrap align=center class=TableContent>担任职务</td>
        <td nowrap align=center class=TableContent>任职时间</td>
        <td nowrap align=center class=TableContent>备注</td>
     </tr>";
	for($i=0;$i<sizeof($rs_a);$i++)
	{

		$number=$i+1; //number显示评语次序
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['学期']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['所属班级']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['担任职务']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['任职时间']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['备注']."</td>
		</tr>";
    }

	 print "</table>";


	 //学生奖惩
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		学生奖惩情况</TD></TR>
		";
	//学生姓名  处理方式  处理内容  处理日期  备注
	$sql="SELECT * FROM edu_studentjiangcheng WHERE 学生学号 = '$学号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>学<br>生<br>奖<br>惩</td>
        <td nowrap align=center class=TableContent>&nbsp;学期名称</td>
		<td nowrap align=center class=TableContent>奖惩方式</td>
        <td nowrap align=center class=TableContent>处理内容</td>
        <td nowrap align=center class=TableContent>处理日期</td>
        <td nowrap align=center class=TableContent>备注</td>
     </tr>";
	for($i=0;$i<sizeof($rs_a);$i++)
	{

		$number=$i+1; //number显示评语次序
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['学期']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['处理方式']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['处理内容']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['处理日期']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['备注']."</td>
		</tr>";
    }

	 print "</table>";


	 //学生违纪
	print	"<BR><table class=TableBlock  align=center
		width=650 style='line-height=20px'>
		<TR class=TableHeader><TD align=left colSpan=6>&nbsp;
		学生违纪情况</TD></TR>
		";
	//学生姓名  处理方式  处理内容  处理日期  备注
	$sql="SELECT * FROM edu_weijihuizong WHERE 学生学号 = '$学号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if(sizeof($rs_a)<3)		{
		$rs_a[] = '';
		$rs_a[] = '';
		$rs_a[] = '';
	}

	print "<tr>
		<td nowrap align=center class=TableContent rowspan=9>学<br>生<br>违<br>纪</td>
		<td nowrap align=center class=TableContent>违纪类型</td>
        <td nowrap align=center class=TableContent>违纪情况</td>
        <td nowrap align=center class=TableContent>违纪日期</td>
        <td nowrap align=center class=TableContent>信息来源</td>
		<td nowrap align=center class=TableContent>备注</td>
     </tr>";
	for($i=0;$i<sizeof($rs_a);$i++)
	{

		$number=$i+1; //number显示评语次序
		print"
		<tr>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['违纪情况']."</td>
		<td  align=center class=TableData>&nbsp;".$rs_a[$i]['违纪情况']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['违纪日期']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['信息来源']."</td>
		<td nowrap align=center class=TableData>&nbsp;".$rs_a[$i]['备注']."</td>
		</tr>";
    }

	 print "</table>";

}




function 打印成绩学分($ID)		{
	global $db,$smarty;
	global $sessionkey,$学校名称;
	//学籍
	$sql = "select * from edu_student where (`学号`='$ID')";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	if($rs_a[0]['学号']=="")		{//如果以学号判断为空,则以编号为判断源
		$sql = "select * from edu_student where (`编号`='$ID')";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
	}
	$学生信息  = $rs_a;
	$学号 = $rs_a[0]['学号'];
	$班级 = $rs_a[0]['班号'];
	$入学年份 = returntablefield("edu_banji","班级名称",$班级,"入学年份");
	if($入学年份=='')			{
		print_infor("没有班级的入学年份信息",'trip');
		exit;
	}

	  //学生成绩
	  print	"<table class=TableBlock  style=\"line-height:12px\" align=center width=650>
	  <TR><TD class=TableHeader align=center colSpan=7>
	  &nbsp;学生学籍(成绩学分信息)卡</TD></TR>
	  <TR class=TableHeader><td nowrap colspan=7><B>姓名：</B>
	  <B><font color='#FF0000'>".$学生信息[0]['姓名']."</font></B>
	  &nbsp &nbsp &nbsp&nbsp
	  <B> 座号：".$学生信息[0]['座号']."</B>
	  &nbsp &nbsp &nbsp&nbsp
	  <B> 学号：".$学生信息[0]['学号']."</B>
	  &nbsp &nbsp &nbsp&nbsp
	  <B> 班级：".$班级."</B></td>
	  </tr>
	  <TR class=TableHeader>
			<TD nowrap>学年</TD>
			<TD nowrap>学期</TD>
			<TD nowrap>课程</TD>
			<TD nowrap>分数</TD>
			<TD nowrap>补考</TD>
			<TD nowrap>重修</TD>
			<TD nowrap>学分</TD>
			</TR>
			";
	//<TD nowrap>考试</TD><TD nowrap>性质</TD>

	$总学分 = 0;
	$已获得学分 = 0;

	for($i=$入学年份;$i<$入学年份+3;$i++)		{
		$第二学期 = $i."-".($i+1)."-第二学期";
		//$第一学期 = ($i+1)."-".($i+2)."-第一学期";
		$第一学期 = $i."-".($i+1)."-第一学期";
		//$第二学期索引 = ($i-$入学年份)*2+2;
		//$第一学期索引 = ($i-$入学年份)*2+1;
		$考试2 = returntablefield("edu_examname","学期名称",$第二学期,"考试名称");
		$考试1 = returntablefield("edu_examname","学期名称",$第一学期,"考试名称");



		$课程信息SQL = "select distinct 课程,分数,补考分数,重修分数 from edu_exam where 学号='$学号' and 班级='$班级' and 考试名称='$考试1'";
		$rs = $db->Execute($课程信息SQL);
		$课程信息RSA1 = $rs->GetArray();
		//print $课程信息SQL;print_R($课程信息RSA1);
		//print "<HR>";exit;
		if(sizeof($课程信息RSA1)==0)		{
			$课程信息RSA1[] = '';
			$课程信息RSA1[] = '';
			$课程信息RSA1[] = '';
			$课程信息RSA1[] = '';
			$课程信息RSA1[] = '';
			$课程信息RSA1[] = '';
		}

		$课程信息SQL = "select distinct 课程,分数,补考分数,重修分数 from edu_exam where 学号='$学号' and 班级='$班级' and 考试名称='$考试2'";
		$rs = $db->Execute($课程信息SQL);
		$课程信息RSA2 = $rs->GetArray();
		//print $课程信息SQL;print_R($课程信息RSA2);
		if(sizeof($课程信息RSA2)==0)		{
			$课程信息RSA2[] = '';
			$课程信息RSA2[] = '';
			$课程信息RSA2[] = '';
			$课程信息RSA2[] = '';
			$课程信息RSA2[] = '';
			$课程信息RSA2[] = '';
		}

		//print_R($课程信息RSA1);exit;
		for($X=0;$X<sizeof($课程信息RSA1);$X++)			{
			$课程 = $课程信息RSA1[$X]['课程'];
			$性质SQL = "select 学分,考核 from edu_planexec where 开课学期='$第一学期' and 课程名称='$课程' and 班级名称='$班级'";
			//print $性质SQL;
			$rs = $db->Execute($性质SQL);
			$性质SQLRSA = $rs->GetArray();
			$学分 = $性质SQLRSA[0]['学分'];//exit;
			$性质 = $性质SQLRSA[0]['性质'];

			$分数 = $课程信息RSA1[$X]['分数'];
			$补考 = $课程信息RSA1[$X]['补考分数'];
			$重修 = $课程信息RSA1[$X]['重修分数'];

			if($分数>=60.0||$补考>=60.0||$重修>=60.0)			{
				//获得学分
				$学分 = $学分;
				$总学分 += $学分;
				$已获得学分 += $学分;
			}
			else		{
				//没有学分
				$总学分 += $学分;
				$学分 = "<font color=red>$学分</font>";
				//$已获得学分 += $学分;
			}

			if($分数<60&&$补考>0)	{
				if($补考<60)	$补考 = "<font color=red><I>$补考</I></font>";
				else			$补考 = "<font color=black><I>$补考</I></font>";
			}else				$补考 = '';

			if($补考<60&&$重修>0)	{
				if($重修<60)	$重修 = "<font color=red><I>$重修</I></font>";
				else			$重修 = "<font color=black><I>$重修</I></font>";
			}else				$重修 = '';

			if($X==0)		{

				$学年INFOR = "<TD rowspan=".(sizeof($课程信息RSA2)+sizeof($课程信息RSA1))." nowrap>$i</TD>";
				$学期INFOR = "<TD rowspan=".(sizeof($课程信息RSA1))." nowrap>&nbsp;$第一学期</TD>";
				//$考试INFOR = "<TD rowspan=".(sizeof($课程信息RSA1))." nowrap>&nbsp;$考试2</TD>";
			}
			else	{
				$学年INFOR = "";
				$学期INFOR = "";
				$考试INFOR = "";
			}

			print "<TR class=TableData>

				$学年INFOR
				$学期INFOR

				<TD nowrap>&nbsp;$课程</TD>
				<TD nowrap>&nbsp;$分数</TD>
				<TD nowrap>&nbsp;$补考</TD>
				<TD nowrap>&nbsp;$重修</TD>
				<TD nowrap>&nbsp;$学分</TD>
				</TR>
				";
				//<TD nowrap>&nbsp;$性质</TD>
		}

		//print_R($课程信息RSA2);
		for($X=0;$X<sizeof($课程信息RSA2);$X++)			{
			$课程 = $课程信息RSA2[$X]['课程'];
			$性质SQL = "select 学分,考核 from edu_planexec where 开课学期='$第二学期' and 课程名称='$课程' and 班级名称='$班级'";
			//print $性质SQL;
			$rs = $db->Execute($性质SQL);
			$性质SQLRSA = $rs->GetArray();
			$学分 = $性质SQLRSA[0]['学分'];
			$性质 = $性质SQLRSA[0]['性质'];
			if($性质==''&&$课程!='')			{
				$性质 = returntablefield("edu_course","课程名称",$课程,"考核方式");
			}
			$分数 = $课程信息RSA2[$X]['分数'];
			$补考 = $课程信息RSA2[$X]['补考分数'];
			$重修 = $课程信息RSA2[$X]['重修分数'];

			if($分数>=60.0||$补考>=60.0||$重修>=60.0)			{
				//获得学分
				$学分 = $学分;
				$总学分 += $学分;
				$已获得学分 += $学分;
			}
			else		{
				//没有学分
				$总学分 += $学分;
				$学分 = "<font color=red>$学分</font>";
				//$已获得学分 += $学分;
			}

			if($分数<60&$补考>0)	{
				if($补考<60)	$补考 = "<font color=red><I>$补考</I></font>";
				else			$补考 = "<font color=black><I>$补考</I></font>";
			}else			$补考 = '';

			if($补考<60&&$重修>0)	{
				if($重修<60)	$重修 = "<font color=red><I>$重修</I></font>";
				else			$重修 = "<font color=black><I>$重修</I></font>";
			}else			$重修 = '';

			if($X==0)		{
				$学年INFOR = "";
				$学期INFOR = "<TD rowspan=".(sizeof($课程信息RSA2))." nowrap>&nbsp;$第二学期</TD>";
				//$考试INFOR = "<TD rowspan=".(sizeof($课程信息RSA2))." nowrap>&nbsp;$考试2</TD>";
			}
			else	{
				$学年INFOR = "";
				$学期INFOR = "";
				$考试INFOR = "";
			}

			print "<TR class=TableData>

				$学年INFOR
				$学期INFOR

				<TD nowrap>&nbsp;$课程</TD>
				<TD nowrap>&nbsp;$分数</TD>
				<TD nowrap>&nbsp;$补考</TD>
				<TD nowrap>&nbsp;$重修</TD>
				<TD nowrap>&nbsp;$学分</TD>
				</TR>
				";
			//<TD nowrap>&nbsp;$性质</TD>
		}







	}

	print "<TR class=TableData style='line-height=18px'>

				<TD nowrap colspan=2>&nbsp;总学分</TD>
				<TD nowrap colspan=5>&nbsp;已获得学分:".$已获得学分." 总学分:".$总学分."</TD>
				</TR>
				";

	print "</table> <br>";




}

?>