<?
$_GET2 = $_GET;

require_once('lib.inc.php');
SESSION_START();
if($_GET['pageAction']!="write")				{
	require_once("systemprivateinc.php");

	$GLOBAL_SESSION=returnsession();
	CheckSystemPrivate("学校基本信息设置-学校基本信息一览表","综合信息查询-学生信息查询");
}



if($_GET['pageAction']=="ExportDataToFile")						{

	$PHP_SELF = $_SERVER['PHP_SELF'];
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$FILE_NAME = array_pop($PHP_SELF_ARRAY);
	$PHP_SELF = @join('/',$PHP_SELF_ARRAY);
	$filename = "FileCache/".$FILE_NAME."_".date("Y-m-d-H").".xls";

	$hostname = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."".$PHP_SELF."/$FILE_NAME?action=".$_GET['action']."&班级名称=".$_GET['班级名称']."&pageAction=write";
	//print_R($hostname);;exit;
	$file = file($hostname);
	$FILE_CONTENT = join('',$file);
	//$handle = fopen($filename, 'w');
	//fwrite($handle, $FILE_CONTENT);
	//fclose($handle);

	header('Content-Encoding: none');
	header('Content-Type: application/octetstream');
	header('Content-Disposition: attachment;filename='.$_GET['FNAME'].'['.date("Y-m-d-H").'].xls');
	header('Content-Length: '.strlen($FILE_CONTENT));
	header('Pragma: no-cache');
	header('Expires: 0');
	echo $FILE_CONTENT;
	exit;
}

if($LOGIN_THEME!="") $LOGIN_THEME_TEXT = $LOGIN_THEME;
else	 $LOGIN_THEME_TEXT = 3;
print "<TITLE>学生信息查询</TITLE>
<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
<LINK href=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/theme/$LOGIN_THEME_TEXT/style.css\" type=text/css rel=stylesheet>
<script type=\"text/javascript\" language=\"javascript\" src=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/general/EDU/Enginee/lib/common.js\"></script><STYLE>@media print{input{display:none}}</STYLE>
<BODY class=bodycolor topMargin=5 >";

print "<H2 align=center>学生信息查询</H2>";

if($_GET['pageAction']!="write")				{
	//学生信息查询 target=_blank
	print "<form name=form1 action='?action=SearchData' method=get>
		<table  class=TableBlock align=center width=800>
		<THEAD class=TableContent>
		<TR><TD noWrap colspan=1>
		<font color=red >&nbsp;单个学生查询,请输入以下信息(三项可选项目一项进行填写)<BR>&nbsp;学号:</font>

		<input  type=\"text\" id=xuehao name=\"学号\" value='".$_GET['学号']."' class=SmallInput size=18 />&nbsp;&nbsp;
		<font color=red >身份证:</font>
		<input name=身份证  value='".$_GET['身份证']."' size=18 class=SmallInput id=shenfenzhenghao >&nbsp;&nbsp;
		<font color=red >姓名:</font>
		<input name=姓名  value='".$_GET['姓名']."' size=12 class=SmallInput id=xingming >&nbsp;&nbsp;
		<input type=submit name=button value='点击进行查询'  class=SmallButton >
		<input name=action value='SearchData' type=hidden>&nbsp;&nbsp;
		<input name=actionAdd value='close' type=hidden>&nbsp;&nbsp;";
	if($_GET['action']=="SearchData")				{
		print "<INPUT TYPE=button VALUE=\"返回\" class=SmallButton ONCLICK=\"location='?'\">";
	}

	print "</td></tr>";
	print  "</table><BR>";
	print  "</form><BR>";

	if($_GET['身份证']==""&&$_GET['学号']==""&&$_GET['姓名']==""&&$_GET['actionAdd']=="close")		{
		print_infor("请输入查询条件!",'');
		exit;
	}




	//加入定制的显示内容

	//********学期信息********//
	if($_GET['学期名称']=="") $_GET['学期名称'] = returntablefield("edu_xueqiexec","当前学期",1,"学期名称");
	$sql = "select 学期名称,当前学期 from edu_xueqiexec";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	$学期名称 = $rs_a;
	$选择学期 = $_GET['学期名称'];


	$sql = "select * from edu_jiaocai";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)
	{
		$教材名称					= $rs_a[$i]['教材名称'];
		$教材名称数组[$教材名称]	= $rs_a[$i];
	}

	//*******************画表查询*******************//
	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader>
			 <Td colspan=8 align=left>学生信息按班级查询</Td>
			</Tr>";

	print	"<Tr class=TableData>";
	//级别
	$sql = "select distinct 入学年份 from edu_banji where 毕业时间>='".date("Y-m-d")."' order by 入学年份 desc";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	if($_GET['级别']=='')		{
		$_GET['级别'] = $rs_a[0]['入学年份'];
	}
	print	 "<Td align=center>级别</Td>";
	print	 "<Td align=center>";
	print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&专业代码=".$_GET['专业代码']."&学期名称=".$选择学期."&班级名称=".$选择班级名称."&级别=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
	for($i=0;$i<sizeof($rs_a);$i++)
	{
	   if($_GET['级别']==$rs_a[$i]['入学年份'])
	   {
		   $Selected = "selected";
	   }
	   else
	   {
		   $Selected = "";
	   }
	   print "<Option value='".$rs_a[$i]['入学年份']."' ".$Selected.">".$rs_a[$i]['入学年份']."</Option>";
	}
	print	 "</Select>";
	print	 "</Td>";
	
	//对中小学进行支持
	$SCHOOL_MODEL = parse_ini_file("../EDU/SCHOOL_MODEL.ini");
	$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];
	if($SCHOOL_MODEL_TEXT!="4")		{
		//专业
		$sql = "	select distinct edu_zhuanye.专业名称,edu_zhuanye.专业代码
					from edu_zhuanye,edu_banji
					where
							edu_banji.所属专业=edu_zhuanye.专业代码
							and edu_banji.入学年份='".$_GET['级别']."'
					order by edu_zhuanye.专业名称 desc";
		//print $sql;
		$rs = $db->CacheExecute(150,$sql);
		$rs_a = $rs -> GetArray();
		if($_GET['专业代码']=='')		{
			$_GET['专业代码'] = $rs_a[0]['专业代码'];
		}
		print	 "<Td align=center>专业</Td>";
		print	 "<Td align=center>";
		print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&级别=".$_GET['级别']."&学期名称=".$选择学期."&班级名称=".$选择班级名称."&action2=按班级查询&专业代码=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
		for($i=0;$i<sizeof($rs_a);$i++)
		{
		   if($_GET['专业代码']==$rs_a[$i]['专业代码'])
		   {
			   $Selected = "selected";
		   }
		   else
		   {
			   $Selected = "";
		   }
		   print "<Option value='".$rs_a[$i]['专业代码']."' ".$Selected.">".$rs_a[$i]['专业名称']."</Option>";
		}
		print	 "</Select>";
		print	 "</Td>";
		
	}
	


	if($_GET['专业代码']!='')		{
		$AddSQL = " and edu_banji.所属专业='".$_GET['专业代码']."'";
	}
	else		{
		$AddSQL = "";
	}

	$sql = "select distinct 班级名称 from edu_banji
				where	edu_banji.入学年份='".$_GET['级别']."'
						$AddSQL
				order by 班级名称
						";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	if($rs_a[0]['班级名称']=='')	{
		$rs_a[0]['班级名称'] = "没有班级信息";
	}
	if($_GET['班级名称']=='')		{
		$_GET['班级名称'] = $rs_a[0]['班级名称'];
	}
	//print $sql;
	print	 "<Td align=center>班级</Td>";
	print	 "<Td align=center>";
	print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&级别=".$_GET['级别']."&专业代码=".$_GET['专业代码']."&action2=按班级查询&学期名称=".$选择学期."&班级名称=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
	for($i=0;$i<sizeof($rs_a);$i++)
	{
	   if($_GET['班级名称']==$rs_a[$i]['班级名称'])
	   {
		   $Selected = "selected";
	   }
	   else
	   {
		   $Selected = "";
	   }
		print "<Option value='".$rs_a[$i]['班级名称']."' ".$Selected.">".$rs_a[$i]['班级名称']."</Option>";
	}
	print	 "</Select>";
	print	 "</Td>";

	print	 "</Table><BR>";




	if($_GET['action']=="SearchData"||$_GET['action2']=="按班级查询")				{

		if($_GET['action']=="SearchData")				{
			$sql = "select 学号,姓名,班号,座号 from edu_student where ((学号 like '%{$_GET['学号']}%' or 学籍号 like '%{$_GET['学号']}%') and 姓名 like '%{$_GET['姓名']}%' and 身份证号 like '%{$_GET['身份证']}%') order by 班号,座号,学号 limit 60";
		}
		elseif($_GET['action2']=="按班级查询")				{
			$sql = "select 学号,姓名,班号,座号 from edu_student where 班号='".$_GET['班级名称']."' order by 班号,座号,学号";
		}

		$rs = $db->CacheExecute(150,$sql);
		$rs_a = $rs->GetArray();
		//print $sql;print_R($rs_a);
		print "\n\t\r<table border=0 width=100% class=small>\n\t\r";
		for($i=0;$i<sizeof($rs_a);$i++)					{
			$座号 = $rs_a[$i]['座号'];
			$学号 = $rs_a[$i]['学号'];
			$姓名 = $rs_a[$i]['姓名'];
			$班级 = $rs_a[$i]['班号'];
			//$班主任 = returntablefield("edu_banji","班级名称",$rs_a[$i]['班号'],"班主任");
			//$班主任信息 = returntablefield("user","USER_ID",$班主任,"USER_NAME,TEL_NO_DEPT");
			//$班主任姓名 = $班主任信息['USER_NAME'];
			//$班主任电话 = $班主任信息['TEL_NO_DEPT'];
			if($班主任姓名!="")		{
				//$SHOWTEXT = "[班主任:$班主任姓名 $班主任电话]";
			}
			else	{
				//$SHOWTEXT = "";
			}
			if($ii%4==0) print "\n\t\r<tr>\n\t\r";
			print "<td nowrap>&nbsp;<a href=\"edu_student_newai.php?".base64_encode2("action=view_default&学号=$学号&GOBACK=../InforSearch/StudentInfor.php")."\" title='学号:$学号 座号:$座号' target=_blank>{$姓名}[{$班级}]$SHOWTEXT</a></td>\n\t\r";
			$ii = $i+1;

		}
		print "</table>\n\t\r";

	}



}





 ?>