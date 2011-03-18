<link rel="stylesheet" type="text/css" href="/theme/3/style.css">
<script src="/inc/js/ccorrect_btn.js"></script>

<?
require_once('lib.inc.php');
function 返回签章文本($RUN_ID,$ITEM_ID)		{
	global $db;
	$sql = "select ITEM_DATA from TD_OA.flow_run_data where RUN_ID='$RUN_ID' and ITEM_ID='$ITEM_ID'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$ITEM_DATA = $rs_a[0]['ITEM_DATA'];
	return $ITEM_DATA;
}
	$编号=$_GET['编号'];
	$RUN_ID = $_GET['RUN_ID'];
	$RUN_ID = returntablefield("edu_dangyuan_work_check_register","编号",$编号,"工作流");
	$FLOW_ID = returntablefield("flow_run","RUN_ID",$RUN_ID,"FLOW_ID");

	if($RUN_ID=='')	$RUN_ID = '507';


//print $RUN_ID.$FLOW_ID;exit;

?>
<html>
<head>
<STYLE>@media print{input{display:none}}  .fenye {page-break-after: always}</STYLE>
<style type="text/css">
  .pbreak { PAGE-BREAK-AFTER: always }
</style>

<title>表单打印 - 民主评议党员登记流程(2010-07-05 12:18:01)</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/3/dialog.css">
<style type="text/css">
<!--
.title {  font-family: "宋体"; font-size: 18pt; font-weight: bold}
/*用户自定义样式表*/
-->
</style>

</head>

<body style="background:none;" topmargin="5"  >
<div align=center>
<input type=button accesskey=p name=print value=打印本页 class=SmallButton onClick="document.execCommand('Print');" >
<?
$版本=$_SESSION['SYSTEM_OA_VERSION'];
if($版本=="TDOA2009"){
	print "<script src=\"/inc/js/jquery/jquery.js\"></script>\n";
	}
	else{
	print "<script src=\"/inc/js/attach.js\"></script>\n";
	print "<script src=\"/inc/js/jquery/jquery.min.js\"></script>\n";
	}
?>
<script src="/inc/js/jquery/jquery.js"></script>
<input type=button onClick="javascript:history.back();" value="返回" class=SmallButton >
</div>

<script>
	//定义全局变量
	var g_run_id = "<?=$RUN_ID?>";       //流水号
	var g_flow_id = "<?=$FLOW_ID?>";     //流程ID
	var g_form_view = 2;                 //打印表单
	var doPrint = "";
	var printView = "";
	//用户自定义js脚本
	var sign_info_object="";
	var cursor = "";
	function LoadSignDataSign(data,count,content,version)
	{
	  var vDWebSignSeal=document.getElementById("DWebSignSeal");
		if(!vDWebSignSeal)
		   return;
	  vDWebSignSeal.SetStoreData(data);

	  var strObjectName ;
	  strObjectName = vDWebSignSeal.FindSeal(cursor,0);
		while(strObjectName  != "")
		{
			if(strObjectName.indexOf("SIGN_INFO")>=0)
			{
			   vDWebSignSeal.MoveSealPosition(strObjectName,0, -30, "personal_sign"+count);
			   break;
			}
		  strObjectName = vDWebSignSeal.FindSeal(strObjectName,0);
		}

		vDWebSignSeal.ShowWebSeals();
	  if(version==0)
		vDWebSignSeal.SetSealSignData (strObjectName,"中国兵器工业信息中心");
	  else
		vDWebSignSeal.SetSealSignData (strObjectName,content);
	  vDWebSignSeal.SetMenuItem(strObjectName,4);
	  sign_info_object += strObjectName+",";
	  strObjectName = vDWebSignSeal.FindSeal(strObjectName,0);
	}
	function print_view()
	{
		 window.focus();
		 try{
			document.getElementById("WebBrowser").ExecWB(7,1);
		  }catch(e)
		  {
			alert("如不能打印预览，请调整安全级别！具体方法如下：\n根据当前页面所属安全区域，自定义安全设置，找到设置项“对未标记为可安全执行的脚本的Activex控件进行初始化并执行脚本”，将其设置为“提示”即可。");
		  }
	}
	</script>
<?

$ITEM_DATA_86 = 返回签章文本($RUN_ID,'86');
	$ITEM_DATA_89 = 返回签章文本($RUN_ID,'89');
	$ITEM_DATA_92 = 返回签章文本($RUN_ID,'92');
	//$ITEM_DATA_124= 返回签章文本($RUN_ID,'124');
	//print $ITEM_DATA_92;exit;
                       $编号=$_GET['编号'];
						$sql="select * from edu_dangyuan_work_check_register where 编号='$编号'";
						$rs = $db->Execute($sql);
						$rs_a = $rs->GetArray();
						for($i=0;$i<sizeof($rs_a);$i++){
						$学校名称=$rs_a[$i]['学校名称'];
						$学年=$rs_a[$i]['学年'];
						$姓名=$rs_a[$i]['姓名'];
						$曾用名=$rs_a[$i]['曾用名'];
						$用户名=$rs_a[$i]['用户名'];
						$科室=$rs_a[$i]['科室'];
						$性别=$rs_a[$i]['性别'];
						$出生年月=$rs_a[$i]['出生年月'];
						$籍贯=$rs_a[$i]['籍贯'];
						$民族=$rs_a[$i]['民族'];
						$职务=$rs_a[$i]['职务'];
						$学历=$rs_a[$i]['学历'];
						$入党时间=$rs_a[$i]['入党时间'];
						$转正时间=$rs_a[$i]['转正时间'];
						$参加工作时间=$rs_a[$i]['参加工作时间'];
						$个人小结=$rs_a[$i]['个人小结'];
						$民主评议情况=$rs_a[$i]['民主评议情况'];
						$支部意见=$rs_a[$i]['支部意见'];
						$支部书记签字签章日期=$rs_a[$i]['支部书记签字签章日期'];
						$上级党组织意见=$rs_a[$i]['上级党组织意见'];
						$上级党组织签字签章日期=$rs_a[$i]['上级党组织签字签章日期'];
						$本人意见=$rs_a[$i]['本人意见'];
						$本人签字签章日期=$rs_a[$i]['本人签字签章日期'];
						$备注=$rs_a[$i]['备注'];

						}


?>
<form name="form1" method="post" action="">
<DIV align=center><BR>
<BR><BR><SPAN style="FONT-SIZE: 16pt"><STRONG>&nbsp;</STRONG>
<DIV align=center><SPAN style="FONT-SIZE: 16pt"><STRONG>民主评议党员登记表</STRONG></SPAN></DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center><SPAN style="FONT-SIZE: 16pt">
<?=$学年?>
</SPAN></DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;<SPAN style="FONT-SIZE: 16pt">姓名 <U><SPAN><?=$姓名?><input type=hidden name=DATA_67 value='系统管理员' title='姓名'>
<BR><BR></SPAN></U></SPAN></DIV>
<DIV align=center>&nbsp;</DIV>

<DIV align=center>&nbsp;<SPAN style="FONT-SIZE: 16pt">单位 <U><SPAN><?=$学校名称?><input type=hidden name=DATA_68 value='集美轻工业学校' title='单位'>
</SPAN></U></SPAN></DIV>
<DIV style="TEXT-INDENT: 104pt">&nbsp;</DIV>
<DIV style="TEXT-INDENT: 104pt">&nbsp;</DIV>
<DIV style="TEXT-INDENT: 104pt">&nbsp;</DIV>
<DIV style="TEXT-INDENT: 104pt">&nbsp;</DIV>
<DIV style="TEXT-INDENT: 104pt">&nbsp;</DIV>
<div class=fenye></div>
<TABLE style="BORDER-RIGHT: medium none; BORDER-TOP: medium none; BORDER-LEFT: medium none; BORDER-BOTTOM: medium none; BORDER-COLLAPSE: collapse" cellSpacing=0 cellPadding=0 border=1>
<TBODY>
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43 rowSpan=2>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">姓名</SPAN></DIV></TD>


<!-- 现名 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 54pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=72>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">现&nbsp;名</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$姓名?></DIV></TD>

<!-- 性别 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">性&nbsp;别</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$性别?></DIV></TD>

<!-- 出生年月 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">出生年月</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 69.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=93>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$出生年月?></DIV></TD></TR>
<TR>

<!-- 曾用名 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 54pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=72>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">曾用名</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$曾用名?></DIV></TD>

<!-- 民族 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">民&nbsp;族</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$民族?></DIV></TD>

<!-- 籍贯 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">籍<SPAN>&nbsp;&nbsp;&nbsp; </SPAN>贯</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 69.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=93>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$籍贯?></DIV></TD></TR>

<!-- 入党时间 -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 86.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=115 colSpan=2>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">入党时间</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$入党时间?>
</DIV></TD>

<!--  转正时间-->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">转正时间</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$转正时间?></DIV></TD>

<!--参加工作时间 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">参加工作时<SPAN>&nbsp;&nbsp;&nbsp; </SPAN>间</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 69.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=93>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$参加工作时间?>
</DIV></TD></TR>


<!-- 学历 -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 86.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=115 colSpan=2>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">学<SPAN>&nbsp;&nbsp;&nbsp; </SPAN>历</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$学历?></DIV></TD>

<!-- 现任职务 -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">现任职务</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 195.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=261 colSpan=3>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$现任职务?></DIV></TD></TR>

<!-- 个人小结 -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 426.1pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=568 colSpan=7>
<DIV style="LINE-HEIGHT: 150%" align=center><B><SPAN style="FONT-SIZE: 16pt; LINE-HEIGHT: 150%">个人小结</SPAN></B></DIV></TD></TR>
<TR >

<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 426.1pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=568 colSpan=7>
<DIV style="LINE-HEIGHT: 150%" align=center>&nbsp;</DIV>
<DIV style="LINE-HEIGHT: 150%;height:600px;" align=center><?=nl2br($个人小结)?></DIV>



<DIV style="LINE-HEIGHT: 150%" align=center>&nbsp;</DIV></TD></TR>

<tr style="PAGE-BREAK-AFTER:always;"><tr>

<!--民主评议情况  -->
<TR >
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 30pt" align=center><SPAN style="FONT-SIZE: 14pt">民主评议情况</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV style="LINE-HEIGHT: 150%;height:80px;" align=center><?=nl2br($民主评议情况)?></DIV></TD></TR>

<!-- <div class=fenye></div>  -->
<!-- 支部意见 -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 38pt" align=center><B><SPAN style="FONT-SIZE: 16pt">支</SPAN></B></DIV>
<DIV style="LINE-HEIGHT: 38pt" align=center><B><SPAN style="FONT-SIZE: 16pt">部意见</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV align=center>&nbsp;</DIV>
<DIV style="LINE-HEIGHT: 150%;height:120px;" align=center><?=nl2br($支部意见)?></DIV>

<DIV style="TEXT-INDENT: 12pt">支部书记签字或盖章
<? print "<div id=SIGN_POS_DATA_86>&nbsp;</div>
<input type=hidden name=DATA_86 value='".$ITEM_DATA_86."' title='签章控件:支部书记签字签章'>"; ?>

</DIV>
<DIV align=center>&nbsp;</DIV></TD></TR>


<!-- 本人意见 -->
<TR style="HEIGHT: 92pt">
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; HEIGHT: 92pt; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 20pt" align=center><B><SPAN style="FONT-SIZE: 16pt">本人意见</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; HEIGHT: 92pt; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV style="LINE-HEIGHT: 150%;height:120px;" align=center><?=$本人意见?>
</DIV>

<DIV style="TEXT-INDENT: 12pt"><SPAN style="FONT-SIZE: 12pt">签字或盖章<SPAN>&nbsp;&nbsp;
<? print "<div id=SIGN_POS_DATA_89></div>
<input type=hidden name=DATA_89 value='".$ITEM_DATA_89."' title='签章控件:本人签字签章'>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </SPAN><?=$本人签字签章日期?>
</SPAN></DIV></TD></TR>

<!--上级党组织意见  -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 26pt" align=center><B><SPAN style="FONT-SIZE: 16pt">上级党组织意见</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV align=center>&nbsp;</DIV>
<DIV style="LINE-HEIGHT: 150%;height:160px;" align=center><?=$上级党组织意见?>
</DIV>

<DIV style="TEXT-INDENT: 12pt"><SPAN style="FONT-SIZE: 12pt">盖章<SPAN>&nbsp;
<? print "<div id=SIGN_POS_DATA_92 ></div>
		<input type=hidden name=DATA_92 value='".$ITEM_DATA_92."' title='签章控件:支部书记签字签章'>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </SPAN><?=$上级党组织签字签章日期?>
</SPAN></DIV></TD></TR>
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV align=center><B><SPAN style="FONT-SIZE: 16pt">备注</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV style="LINE-HEIGHT: 150%;height:100px;" align=center><?=$备注?></DIV>
</TD></TR></TBODY></TABLE>
<DIV style="TEXT-INDENT: 78pt" align=right></SPAN><BR><BR><BR>&nbsp;</DIV></DIV></form>
<?
print "<script>
	function showSign(feed_id)
	{
		$(\"sign_body\").innerHTML='<iframe frameborder=0 width=\"100%\" height=\"100px\" id=\"fra_sign\" src=\"./input_form/sing_info.php?RUN_ID=".$RUN_ID."&FEED_ID='+feed_id+'\"></iframe>';
		ShowDialog(\"personal_sign\");
	}
	</script>
	<div id=MyWebBrowser><OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 height=0 width=0 VIEWASTEXT></OBJECT></div>
	<object id=DWebSignSeal classid='CLSID:77709A87-71F9-41AE-904F-886976F99E3E' style='position:absolute;width:0px;height:0px;left:0px;top:0px;' codebase='/module/websign/websign.dll#version=4,0,4,6'></object><script>
	var sign_check={\"DATA_86\":\"\",\"DATA_89\":\"\",\"DATA_92\":\"\"};
	function GetDataStr(item)
	{
		var str=\"\";
		var separator = \"::\";  // 分隔符
		var TO_VAL=sign_check[item];

		if(TO_VAL!=\"\")
		{
			var item_array = TO_VAL.split(\",\");
		for (i=0; i < item_array.length; i++)
		{
			var MyValue=\"\";
			var obj = eval(\"document.form1.\"+item_array[i]);
			if(obj.type==\"checkbox\")
			{
				if(obj.checked==true)
				   MyValue=\"on\";
				else
					 MyValue=\"\";
			}
			else
			   MyValue=obj.value;
		  if(MyValue.indexOf(\"&quot;\")>=0) MyValue.replace(\"/&quot;/g\",\"'\");   //处理双引号
			if(MyValue.indexOf(\"&#039;\")>=0) MyValue.replace(\"/&#039;/g\",\"'\");   //处理单引号
			str += obj.name + \"separator\" + MyValue + \"\";
		}
	  }
	  return str;
	}

	function LoadSignData()
	{
	  sign_str=\"DATA_86,DATA_89,DATA_92,\";
	  sign_arr=sign_str.split(\",\");
		for(var i=0;i<sign_arr.length;i++)
		{
			if(sign_arr[i]!=\"\")
			{
		  DWebSignSeal.SetStoreData(eval(\"document.form1.\"+sign_arr[i]+\".value\"));
		  }
		}
		DWebSignSeal.ShowWebSeals();

	  var str= \"\";
	  var strObjectName ;
		strObjectName = DWebSignSeal.FindSeal(\"\",0);
		while(strObjectName  != \"\")
		{
			if(strObjectName.indexOf(\"_hw\")>0)
			   item_arr = strObjectName.split(\"_hw\");
			else if(strObjectName.indexOf(\"_seal\")>0)
				 item_arr = strObjectName.split(\"_seal\");
		if(item_arr)
		{
			str = GetDataStr(item_arr[0]);
			DWebSignSeal.SetSealSignData(strObjectName,str);
			DWebSignSeal.SetMenuItem(strObjectName,4);
		  }
			strObjectName = DWebSignSeal.FindSeal(strObjectName,0);
		}
	}
	</script>
	<script>
	jQuery(document).ready(function(){
	LoadSignData();  if(printView == \"1\")
		window.setTimeout(print_view,1000);
	});
	</script>";
?>
<br><br>
</body>
</html><?
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