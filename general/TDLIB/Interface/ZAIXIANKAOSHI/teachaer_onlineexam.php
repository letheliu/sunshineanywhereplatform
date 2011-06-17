<?
session_start();
//if(!isset($_SESSION['sunshine_student_code'])){
//	header("Location: index.html");
//}
require_once('lib.inc.php');
page_css("OA在线考试");


?>

<Table class=TableBlock width=100%>


<?
//print_R($_SESSION);
	$学号 = $_SESSION['LOGIN_USER_ID']; //用户名
	$姓名 = $_SESSION['LOGIN_USER_NAME']; //姓名
	$班级 = $_SESSION['LOGIN_DEPT_ID'];//部门ID


if($_GET['action']=="ApplyExamDataFinished")					{
	$考试试卷 = $_GET['考试试卷'];
	$考试名称 = $_GET['考试名称'];
	$sql = "update tiku_examdata set 是否提交='1' where 考试名称='$考试名称' and 试卷名称='$考试试卷' and 学号='$学号'";
	//print $sql;
	//print_R($_GET);
	$db->Execute($sql);
	print "<BR><Table class=TableBlock width=100%>";
	print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' ><input type=\"button\" name=\"button\" class=\"button\" OnClick=\"location='?'\" value=\"你的试卷已经提交,点击返回\" ></td>
            </tr>";
	print "</table>";
	exit;
}




if($_GET['action']=="ApplyExamData")					{
	//print_R($_POST);
	//Array ( [题目_0] => 编号 [题目_1] => 编号 [题目_2] => 编号 [题目_3] => 编号 [题目_4] => 编号 [题目_5] => 编号 [题目_6] => 编号 [题目_7] => 编号 [题目_8] => 编号 [题目_9] => 编号 [题目_10] => 编号 [题目_11] => 编号 [题目_12] => 编号 [题目_13] => 编号 [题目_14] => 编号 [题目_15] => 编号 [题目_16] => 编号 [题目_17] => 编号 [题目_18] => 编号 [题目_19] => 编号 [考试试卷] => 2008级新视野英语大二考试试卷 [题型] => 单选 [button] => 提交该部分题目 )
//	print_R($_POST);exit;

	$考试试卷 = $_POST['考试试卷'];
	$题型 = $_POST['题型'];
	$MaxValue = $_POST['MaxValue'];
	$考试名称 = $_POST['考试名称'];
	$试卷名称 = $_POST['考试试卷'];
 	for($i=0;$i<$MaxValue;$i++)		{
		$POSTName = "编号_".$i;
		$编号 = $_POST['编号_'.$i];
		$题目 = $_POST['题目_'.$i];

		$所选答案 = (array)$_POST['备选答案_'.$i];
		if($题型=='填空')
		{
			//$所选答案 = trim($所选答案);
		  $所选答案 = join('#',$所选答案);
		//print $所选答案q=trim($所选答案x);;
		//exit;
		//$所选答案 = join('#',$所选答案);
		//trim();
		$正确答案 = returntablefield("tiku_shijuanku","编号",$编号,"正确答案");
		$答题时间 = date("Y-m-d H:i:s");
		if($正确答案==$所选答案)		{
			$答题状态 = '正确';
			$所得分值 = returntablefield("tiku_shijuanku","编号",$编号,"分值");
		}
		else				{
			$答题状态 = '错误';
			$所得分值 = '0';
		}
		}
		else
		{
		sort($所选答案);
		$所选答案 = join('',$所选答案);
		$正确答案 = returntablefield("tiku_shijuanku","编号",$编号,"正确答案");
		$答题时间 = date("Y-m-d H:i:s");
		if($正确答案==$所选答案)		{
			$答题状态 = '正确';
			$所得分值 = returntablefield("tiku_shijuanku","编号",$编号,"分值");
		}
		else				{
			$答题状态 = '错误';
			$所得分值 = '0';
		}
		}

		$sql = "select 编号 from tiku_examdata where 考试名称='$考试名称' and 试卷名称='$试卷名称' and 学号='$学号' and 题目='$题目'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		if($rs_a[0]['编号']!='')		{
			$sql = "update tiku_examdata set 题目='$题目',正确答案='$正确答案',所选答案='$所选答案',答题状态='$答题状态',答题时间='$答题时间',所得分值='$所得分值' where 编号='{$rs_a[0]['编号']}'";
		}
		else	{
			$sql = "insert into tiku_examdata values('','$考试名称','$试卷名称','$答题时间','$学号','$姓名','','$题目','$正确答案','$所选答案','$答题状态','$所得分值','是否提交','$班级');";
		}
		//$sql = "insert into tiku_examdata values('','$考试名称','$考试试卷','$答题时间','$学号','$姓名','$班级','$题目','$正确答案','$所选答案','$答题状态','$所得分值');";
		//print $sql."<BR>";
		if($所选答案!="")		$db->Execute($sql);

	}
	print "<div align=center>你的答案已经提交,请返回....</div>";
	print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?action=ApplyExam&考试试卷=$考试试卷&考试名称=$考试名称&题型=$题型\">";
	exit;
}


if($_GET['action']=="ApplyExam"&&$_GET['考试试卷']!=""&&$_GET['考试名称']!="")					{
		//较验权限
		$sql = "select 是否提交 from tiku_examdata where 考试名称='{$_GET['考试名称']}' and 试卷名称='{$_GET['考试试卷']}' and 学号='$学号'";
		$TempDb = $db->CacheExecute(30,$sql);
		$是否提交 = $TempDb->fields['是否提交'];
		if($是否提交)	{
			print "<div align=center>你的答案已经提交,不能再进行答题..</div>";
			exit;
		}
		print "<FORM name=form1 action=\"?action=ApplyExamData\" method=post encType=multipart/form-data>";
		$sql = "select distinct 题型 from tiku_shijuanku where 试卷名称='".$_GET['考试试卷']."'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();

		print "<tr class=TableHeader>";
		for($i=0;$i<sizeof($rs_a);$i++)			{
			$题型 = $rs_a[$i]['题型'];
			print "<td height='26' align='center' nowrap>
			<a href=\"?".base64_encode("action=ApplyExam&考试试卷={$_GET['考试试卷']}&考试名称={$_GET['考试名称']}&题型=$题型")."\">
			<font color=red><B>$题型</B></font></a>
			</td>";
		}
		print "</tr>";

		if($_GET['题型']!="")	$题型 = $_GET['题型']; else $题型 = "单选";

		$sql = "select * from tiku_shijuanku where 试卷名称='".$_GET['考试试卷']."' and 题型='$题型'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();

		for($i=0;$i<sizeof($rs_a);$i++)					{
			$编号 = $rs_a[$i]['编号'];
			$题目 = $rs_a[$i]['题目'];
			$题型 = $rs_a[$i]['题型'];
			$分值 = $rs_a[$i]['分值'];



			if($rs_a[$i]['题目图片']!="")		{
				//图片处理
				$PHP_SELF_ARRAY = explode('/',$rs_a[$i]['题目图片']);
				$FileNameIndex = sizeof($PHP_SELF_ARRAY)-1;
				$DirNameIndex = sizeof($PHP_SELF_ARRAY)-2;
				$FileName2 = $PHP_SELF_ARRAY[$FileNameIndex];
				$DirName2 = $PHP_SELF_ARRAY[$DirNameIndex];
				$rs_a[$i]['题目图片'] = "../../Framework/download.php?action=picturefile&sessionkey=$sessionkey&attachmentid=$DirName2&attachmentname=$FileName2";
				$题目图片IMG = "<img src=".$rs_a[$i]['题目图片']." border=0 width=130>";
			}
			else	{
				$题目图片IMG = "";
			}




			//得到所選答案
			$sql = "select 所选答案 from tiku_examdata where 考试名称='{$_GET['考试名称']}' and 试卷名称='{$_GET['考试试卷']}' and 学号='$学号' and 题目='$题目'";
			$rsX = $db->Execute($sql);
			$rs_aX = $rsX->GetArray();
			$所选答案 = $rs_aX[0]['所选答案'];
			if($题型=="填空")
			{
				//print_R($正确答案);
			$所选答案arr = explode("#",$所选答案);
			//print_R($所选答案arr);
			}
			//print $所选答案;
			$CheckedResult = array();

			if($题型=="单选")	$INPUTTYPE = "radio";
			else	if($题型=="多选")	$INPUTTYPE = "checkbox";
			else	if($题型=="判断")	$INPUTTYPE = "radio";
			else	if($题型=="填空")	$INPUTTYPE = "input";
			else	$INPUTTYPE = "radio";
			//处理单选判断
			if($题型=="单选"||$题型=="判断")			{
			switch($所选答案)			{
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
			//处理多选
			if($题型=="多选")					{
				if(preg_match('/A/i',$所选答案))	$CheckedResult['A'] = 'checked';
				if(preg_match('/B/i',$所选答案))	$CheckedResult['B'] = 'checked';
				if(preg_match('/C/i',$所选答案))	$CheckedResult['C'] = 'checked';
				if(preg_match('/D/i',$所选答案))	$CheckedResult['D'] = 'checked';
				if(preg_match('/E/i',$所选答案))	$CheckedResult['E'] = 'checked';
				if(preg_match('/F/i',$所选答案))	$CheckedResult['F'] = 'checked';
			}
			$DaAnText = "";
			//print $题型;
			//print_R($CheckedResult);

			$备选答案A = $rs_a[$i]['备选答案A']; if($备选答案A!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=备选答案_{$i}[] value=A {$CheckedResult['A']}> A:$备选答案A&nbsp;";
			$备选答案B = $rs_a[$i]['备选答案B']; if($备选答案B!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=备选答案_{$i}[] value=B {$CheckedResult['B']}> B:$备选答案B&nbsp;";
			$备选答案C = $rs_a[$i]['备选答案C']; if($备选答案C!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=备选答案_{$i}[] value=C {$CheckedResult['C']}> C:$备选答案C&nbsp;";
			$备选答案D = $rs_a[$i]['备选答案D']; if($备选答案D!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=备选答案_{$i}[] value=D {$CheckedResult['D']}> D:$备选答案D&nbsp;";
			$备选答案E = $rs_a[$i]['备选答案E']; if($备选答案E!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=备选答案_{$i}[] value=E {$CheckedResult['E']}> E:$备选答案E&nbsp;";
			$备选答案F = $rs_a[$i]['备选答案F']; if($备选答案F!="")	$DaAnText .= "&nbsp;<input type=$INPUTTYPE name=备选答案_{$i}[] value=F {$CheckedResult['F']}> F:$备选答案F&nbsp;";
			$正确答案 = $rs_a[$i]['正确答案'];
			if($题型=="填空")
			{
				//print_R($正确答案);
				$正确答案arr = explode("#",$正确答案);
				//print_R($正确答案arr);
			}
			$备选答案A = $rs_a[$i]['备选答案A'];
			$备选答案A = $rs_a[$i]['备选答案A'];
			print "<input type=hidden name=编号_".$i." value='$编号'>";
			print "<input type=hidden name=题目_".$i." value='$题目'>";
			print "<tr> ";
			print "<td align='left' class=TableData colspan=30  nowrap>&nbsp;&nbsp;".($i+1)."&nbsp;&nbsp;$题目(分值:$分值) $题目图片IMG</td>";
			print "</tr>";
			print "<tr> ";
			if($题型=="填空")
			{
				print "<td height='26' align='left' class=TableData colspan=30 >";
				for($x=0;$x<sizeof($正确答案arr);$x++)
				{
					print "<input type=input name=备选答案_{$i}[$x] value=$所选答案arr[$x]> ";

				}
				print "</td></tr>";
			}
			else
			{
				print "<td height='26' align='left' class=TableData colspan=30 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$DaAnText</td>";
				print "</tr>";
			}


		}

		print "<input type=hidden name=考试试卷 value='".$_GET['考试试卷']."'>";
		print "<input type=hidden name=题型 value='".$题型."'>";
		print "<input type=hidden name=考试名称 value='".$_GET['考试名称']."'>";
		print "<input type=hidden name=MaxValue value='".sizeof($rs_a)."'>";

		$sql = "select count( 编号 ) as 总题数 from tiku_shijuanku where 试卷名称='".$_GET['考试试卷']."'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		$总题数 = $rs_a[0]['总题数'];

	    $sql = "select count( 编号 ) as 提交数 from tiku_examdata where 试卷名称='".$_GET['考试试卷']."' and 学号='$学号'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		$提交数 = $rs_a[0]['提交数'];

		print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' >
			  <font color=red>一共有【".$总题数."】小题,您已经提交【".$提交数."】题</font>
			  <input type=\"submit\" name=\"button\" class=\"smallbutton\" value=\"提交该部分题目\" ></td>
            </tr>";
		print "</table></form>";

		print "<BR><Table class=TableBlock width=100%><FORM name=form1 action=\"?".base64_encode("action=ApplyExamDataFinished&考试试卷={$_GET['考试试卷']}&考试名称={$_GET['考试名称']}")."\" method=post encType=multipart/form-data>";
		print "<tr  bgcolor='#FFFFFF'>
              <td colspan=8 height='26' align='center' >
			  <input type=\"button\" name=\"button\" class=\"smallbutton\" onClick=\"javascript:if(confirm('试卷提交后不能再进行本次考试的答题,你确实要提交你的试卷么,')) location='?".base64_encode("action=ApplyExamDataFinished&考试试卷={$_GET['考试试卷']}&考试名称={$_GET['考试名称']}")."'\" value=\"点击提交来完成本次考试\" ></td>
            </tr>";
		print "</table></form>";
		//print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?\">";
		exit;
}
//<Table class=TableBlock width=100%>
?>

			<Tr class=TableHeader>
                <td align="center"  nowrap>编号</td>
				<td  align="center" nowrap>考试名称</td>
				<td  align="center"  nowrap>考试试卷</td>
				<td align="center"  nowrap>考试日期</td>
                <td  align="center"  nowrap>参加考试班级</td>
				<td  align="center" nowrap>操作</td>
              </tr>
<?
		//$学号 = $_SESSION['sunshine_student_code'];

		if($_GET['action']=="CancelWork"&&$_GET['实习单位']!="")					{

			print "<tr  bgcolor='#FFFFFF'>
                <td colspan=8 height='26' align='center' ><font color=red>取消岗位成功</font></td>
              </tr>";
			print "<meta http-equiv=\"REFRESH\" content=\"0;URL=?\">";
			exit;
		}

		//可提交考试列表
		$ClassName = $_SESSION['sunshine_student_class'];
		$考试日期 = date("Y-m-d");
		//$sql = "select * from tiku_kaoshi where 考试日期='$考试日期' and 参加考试班级='$ClassName'";
		//稍候判断部门或者人员
		//print $学号;
		$sql = "select * from tiku_kaoshi where 考试日期='$考试日期' and 参加考试人员 like '%$学号,%'";
		$rs = $db->CacheExecute(30,$sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)			{
			$编号 = $rs_a[$i]['编号'];
			$考试名称 = $rs_a[$i]['考试名称'];
			$考试试卷 = $rs_a[$i]['考试试卷'];
			$考试日期 = $rs_a[$i]['考试日期'];
			$参加考试班级 = $rs_a[$i]['参加考试班级'];
			$sql = "select 是否提交 from tiku_examdata where 考试名称='$考试名称' and 试卷名称='$考试试卷' and 学号='$学号'";
			$TempDb = $db->CacheExecute(30,$sql);
			$是否提交 = $TempDb->fields['是否提交'];
			if(!$是否提交)		{
				$申请 = "<a href='?".base64_encode("action=ApplyExam&考试试卷=$考试试卷&考试名称=$考试名称")."'><font color=green>开始参加考试</font></a>";
			}
			else		{
				$申请 = "<font color=red>你的考试已经提交</font>";
			}

			if($i%2==1)	$AddText = "bgcolor='#E4EFF8'";
			else	$AddText = "";
			print "<tr class=TableData>
                <td width='5%' align=center nowrap>".($i+1)."</td>
                <td width='30%'  align=center nowrap>$考试名称</td>
				<td width='30%'  align=center nowrap>$考试试卷</td>
				<td width='10%'  align=center nowrap>$考试日期</td>
				<td  width='10%' align=center nowrap>$参加考试班级</td>
				<td width='15%'  align=center nowrap>$申请</td>
              </tr>";
		}

?>


            </table>

