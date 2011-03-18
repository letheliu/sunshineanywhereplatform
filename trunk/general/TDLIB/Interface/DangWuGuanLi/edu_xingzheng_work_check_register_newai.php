<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-人员考核-行政人员工作考核登记表");
	$版本=$_SESSION['SYSTEM_OA_VERSION'];
	function 返回签章文本($RUN_ID,$ITEM_ID)		{
	global $db;
	$sql = "select ITEM_DATA from TD_OA.flow_run_data where RUN_ID='$RUN_ID' and ITEM_ID='$ITEM_ID'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$ITEM_DATA = $rs_a[0]['ITEM_DATA'];
	return $ITEM_DATA;
}

		if($_GET['action']=="view_default")		{

		$编号=$_GET['编号'];
		$RUN_ID = $_GET['RUN_ID'];
	$RUN_ID = returntablefield("edu_xingzheng_work_check_register","编号",$编号,"工作流");
	$FLOW_ID = returntablefield("flow_run","RUN_ID",$RUN_ID,"FLOW_ID");

	if($RUN_ID=='')		$RUN_ID = '507';

	global $db;
	$RS=$db->Execute("select * from edu_xingzheng_work_check_register where 编号=$编号");
//	print_r($RS);

	 print "<div align=center>";
	print " <input type=button accesskey=p name=print value=打印本页 class=SmallButton onClick=\"document.execCommand('Print');\" >";
		if($版本=="TDOA2009"){
	print "<script src=\"/inc/js/jquery/jquery.js\"></script>\n";
	}
	else{
	print "<script src=\"/inc/js/attach.js\"></script>\n";
	print "<script src=\"/inc/js/jquery/jquery.min.js\"></script>\n";
	}

		?>
 <!-- <INPUT TYPE="button" VALUE="导出" class=SmallButton ONCLICK="location='?pageAction=ExportDataToFile&编号=<?=$_GET['编号']?>&action=<?=$_GET['action']?>'"> -->
		<?
	print " <input type=button accesskey=p name=print value=返回 class=SmallButton onClick=\"location='?XX=XX&pageid=".$_GET['pageid']."'\" >";

	print " <input type=button accesskey=p name=print value=A4 class=SmallButton onClick=\"location='?type=A4&action=view_default&编号=".$编号."'\" >";

	print " <input type=button accesskey=p name=print value=B4 class=SmallButton onClick=\"location='?type=B4&action=view_default&编号=".$编号."'\" >";

	print "</div>";
	?>
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

if($LOGIN_THEME!="") $LOGIN_THEME_TEXT = $LOGIN_THEME;
else	$LOGIN_THEME_TEXT = '3';
print "<TITLE></TITLE>
<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
<LINK href=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/theme/$LOGIN_THEME_TEXT/style.css\" type=text/css rel=stylesheet>

<LINK href=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/theme/print.css\" type=text/css rel=stylesheet>
<script type=\"text/javascript\" language=\"javascript\" src=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/general/EDU/Enginee/lib/common.js\"></script><STYLE>@media print{input{display:none}}  .fenye {page-break-after: always}</STYLE>
<BODY class=bodycolor topMargin=5 >";


	$ITEM_DATA_111 = 返回签章文本($RUN_ID,'111');
	$ITEM_DATA_117 = 返回签章文本($RUN_ID,'117');
	$ITEM_DATA_121 = 返回签章文本($RUN_ID,'121');
	$ITEM_DATA_124= 返回签章文本($RUN_ID,'124');
	//print $FLOW_ID;exit;
	//print $ITEM_DATA;


if($_GET['type'] == 'B4'){
  print "<form name=\"form1\" method=\"post\" action=\"\">\n";
	print "<div class=fenye><div class=framework><ul><li><table class=TableBlock  align=center width=600  height=700 ><TR class=TableData><td>

<p class=MsoNormal style='text-indent:76.75pt;mso-char-indent-count:2.94;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:26.0pt;line-height:250%;font-family:黑体'>集美轻工业学校行政职工<span
lang=EN-US><o:p></o:p></span></span></b></p>

<p class=MsoNormal style='text-indent:119.35pt;mso-char-indent-count:3.5;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:24.0pt;line-height:250%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;letter-spacing:5.0pt'>年度工作考核表</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:24.0pt;
line-height:250%;letter-spacing:5.0pt'><o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center;line-height:200%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:200%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:176.4pt;mso-char-indent-count:12.55;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体'>".XNONE($RS->fields['学年'])."</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体'>—<span lang=EN-US>".XNTWO($RS->fields['学年'])."</span></span></b><span style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri'>学年</span><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>科</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>室</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></b><b style='mso-bidi-font-weight:
normal'><u><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%;mso-fareast-font-family:创艺简行楷'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span></span></u></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:创艺简行楷;mso-ascii-font-family:Calibri'>".$RS->fields['科室']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;mso-fareast-font-family:创艺简行楷'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></u></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>姓</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>名</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><u><span
style='mso-spacerun:yes'>&nbsp;</span></u></span></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>".$RS->fields['姓名']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></u></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%'><span style='mso-spacerun:yes'>&nbsp;&nbsp;</span><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体'>职<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span><span
class=GramE>务</span><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
</span><u><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span></u></span><u>".$RS->fields['职务']."<span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></u></span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;</span></span><b style='mso-bidi-font-weight:
normal'><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>填表日期</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span></b><st1:chsdate Year=2009
Month=7 Day=8 IsLunarDate=False IsROCDate=False w:st=on><b
 style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
 mso-bidi-font-size:11.0pt;line-height:150%;font-family:宋体'>".YMD($RS->fields['填表日期'])."</span></b><b></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>
</td></TR></table></li><li><table class=TableBlock  align=center  width=50 height=700 ><tr></tr></table></li>";


print "<li><table class=TableBlock  align=center width=600   >
  <TR class=TableData><td align=center height=50>岗位职责与年度目标任务</td></TR>
    <TR class=TableData><td align=left height=350 valign=top>  <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['岗位职责与年度目标任务']."</p>   </td></TR>

	<TR class=TableData><td align=center height=50>  当年奖惩情况   </td></TR>
	<TR class=TableData><td align=left valign=top height=350> <p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['当年奖惩情况']." </p>  </td></TR></table></li></ul></div></div>
	<div class=framework><ul><li><table class=TableBlock  align=center width=600   ><TR class=TableData><td align=center height=50>   个人总结  </td></TR>
	<TR class=TableData><td align=left  valign=top height=800>
   <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['个人总结']."</p>
   <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  <DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_111 ></div>
		<input type=hidden name=DATA_111 value='".$ITEM_DATA_111."' title='签章控件:本人签名盖章'>
		<input type=hidden name=DATA_79 value='2010-06-17' title='教研组意见日期'><p align=right>".YMD($RS->fields['个人总结签字签章日期'])."</p>
	</DIV></td></TR></table></li>
	 <li><table class=TableBlock  align=center  width=50 height=700 ><tr></tr></table></li>
	<li>
	<table class=TableBlock  align=center width=600   >
	<TR class=TableData><td align=center height=50>  科室测评意见   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['科室测评意见']." </p>
	<p>考核等级：".$RS->fields['科室测评考核等级']."</p>
	<p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_117 ></div>
		<input type=hidden name=DATA_117 value='".$ITEM_DATA_117."' title='签章控件:科室签名签章'>
		<p align=right>".YMD($RS->fields['科室测评意见日期'])."</p>
	</DIV>
	</td></TR>
<TR class=TableData><td align=center height=50>  校考核领导小组审核意见   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['学校考核小组意见']." </p>
	<p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_121 ></div>
		<input type=hidden name=DATA_121 value='".$ITEM_DATA_121."' title='签章控件:校考核领导小组签字签章'>
		<p align=right>".YMD($RS->fields['学校考核小组意见日期'])."</p>
	</DIV>
	</td></TR>
	<TR class=TableData><td align=center height=50>  被考核者意见   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['本人意见']." </p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_124 ></div>
		<input type=hidden name=DATA_124 value='".$ITEM_DATA_124."' title='签章控件:被考核者签字签章'>
		<p align=right>".YMD($RS->fields['本人意见日期'])."</p>
	</DIV>
	</form>
	<script>
	function showSign(feed_id)
	{
		$(\"sign_body\").innerHTML='<iframe frameborder=0 width=\"100%\" height=\"100px\" id=\"fra_sign\" src=\"./input_form/sing_info.php?RUN_ID=".$RUN_ID."&FEED_ID='+feed_id+'\"></iframe>';
		ShowDialog(\"personal_sign\");
	}
	</script>
	<div id=MyWebBrowser><OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 height=0 width=0 VIEWASTEXT></OBJECT></div>
	<object id=DWebSignSeal classid='CLSID:77709A87-71F9-41AE-904F-886976F99E3E' style='position:absolute;width:0px;height:0px;left:0px;top:0px;' codebase='/module/websign/websign.dll#version=4,0,4,6'></object><script>
	var sign_check={\"DATA_111\":\"\",\"DATA_117\":\"\",\"DATA_121\":\"\",\"DATA_124\":\"\"};
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
	  sign_str=\"DATA_111,DATA_117,DATA_121,DATA_124,\";
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
	</script>
	</td></TR>
</table></li></ul></div>";

exit;
}

/*****************************************************************************************************
  B4结束  A4开始
******************************************************************************************************/
if($_GET['type'] == 'A4' || $_GET['type'] == ''){
	print "<form name=\"form1\" method=\"post\" action=\"\">\n";
print "<div class=fenye><table class=TableBlock  align=center width=600  height=700 ><TR class=TableData><td>

<p class=MsoNormal style='text-indent:76.75pt;mso-char-indent-count:2.94;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:26.0pt;line-height:250%;font-family:黑体'>集美轻工业学校行政职工<span
lang=EN-US><o:p></o:p></span></span></b></p>

<p class=MsoNormal style='text-indent:119.35pt;mso-char-indent-count:3.5;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:24.0pt;line-height:250%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;letter-spacing:5.0pt'>年度工作考核表</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:24.0pt;
line-height:250%;letter-spacing:5.0pt'><o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center;line-height:200%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:200%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:176.4pt;mso-char-indent-count:12.55;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体'>".XNONE($RS->fields['学年'])."</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体'>—<span lang=EN-US>".XNTWO($RS->fields['学年'])."</span></span></b><span style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri'>学年</span><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>科</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>室</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></b><b style='mso-bidi-font-weight:
normal'><u><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%;mso-fareast-font-family:创艺简行楷'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span></span></u></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:创艺简行楷;mso-ascii-font-family:Calibri'>".$RS->fields['科室']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;mso-fareast-font-family:创艺简行楷'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></u></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>姓</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:宋体;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>名</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><u><span
style='mso-spacerun:yes'>&nbsp;</span></u></span></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>".$RS->fields['姓名']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></u></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%'><span style='mso-spacerun:yes'>&nbsp;&nbsp;</span><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
宋体'>职<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span><span
class=GramE>务</span><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
</span><u><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span></u></span><u>".$RS->fields['职务']."<span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></u></span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='line-height:150%'><span lang=EN-US style='font-size:
14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;</span></span><b style='mso-bidi-font-weight:
normal'><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:宋体;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>填表日期</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span></b><st1:chsdate Year=2009
Month=7 Day=8 IsLunarDate=False IsROCDate=False w:st=on><b
 style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
 mso-bidi-font-size:11.0pt;line-height:150%;font-family:宋体'>".YMD($RS->fields['填表日期'])."</span></b><b></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>
</td></TR></table></div>";


print "<div class=fenye><table class=TableBlock  align=center width=600   >
  <TR class=TableData><td align=center height=50>岗位职责与年度目标任务</td></TR>
    <TR class=TableData><td align=left height=350 valign=top>  <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['岗位职责与年度目标任务']."</p>   </td></TR>

	<TR class=TableData><td align=center height=50>  当年奖惩情况   </td></TR>
	<TR class=TableData><td align=left valign=top height=350> <p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['当年奖惩情况']." </p>  </td></TR></table></div>
	<div class=fenye><table class=TableBlock  align=center width=600   ><TR class=TableData><td align=center height=50>   个人总结  </td></TR>
	<TR class=TableData><td align=left  valign=top height=800>
   <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['个人总结']."</p>
   <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_111 >&nbsp;</div>
		<input type=hidden name=DATA_111 value='".$ITEM_DATA_111."' title='签章控件:本人签名盖章'>
		<p align=right>".YMD($RS->fields['个人总结签字签章日期'])."</p>
	</DIV>
     </td></TR></table></div>

	<table class=TableBlock  align=center width=600   >
	<TR class=TableData><td align=center height=50>  科室测评意见   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['科室测评意见']." </p>
	<p>考核等级：".$RS->fields['科室测评考核等级']."</p>
	<p>&nbsp;</p><p>&nbsp;</p>
<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_117 ></div>
		<input type=hidden name=DATA_117 value='".$ITEM_DATA_117."' title='签章控件:科室签名签章'>
		<p align=right>".YMD($RS->fields['科室测评意见日期'])."</p>
	</DIV>
	</td></TR>
<TR class=TableData><td align=center height=50>  校考核领导小组审核意见   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['学校考核小组意见']." </p>
	<p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_121 ></div>
		<input type=hidden name=DATA_121 value='".$ITEM_DATA_121."' title='签章控件:校考核领导小组签字签章'>
		<p align=right>".YMD($RS->fields['学校考核小组意见日期'])."</p>
	</DIV>
	</td></TR>
	<TR class=TableData><td align=center height=50>  被考核者意见   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['本人意见']." </p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>签名（盖章）&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_124 ></div>
		<input type=hidden name=DATA_124 value='".$ITEM_DATA_124."' title='签章控件:被考核者签字签章'>
		<p align=right>".YMD($RS->fields['本人意见日期'])."</p>
	</DIV>
    </form>
	<script>
	function showSign(feed_id)
	{
		$(\"sign_body\").innerHTML='<iframe frameborder=0 width=\"100%\" height=\"400px\" id=\"fra_sign\" src=\"./input_form/sing_info.php?RUN_ID=".$RUN_ID."&FEED_ID='+feed_id+'\"></iframe>';
		ShowDialog(\"personal_sign\");
	}
	</script>


	<div id=MyWebBrowser><OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 height=0 width=0 VIEWASTEXT></OBJECT></div>
	<object id=DWebSignSeal classid='CLSID:77709A87-71F9-41AE-904F-886976F99E3E' style='position:absolute;width:0px;height:0px;left:0px;top:0px;' codebase='/module/websign/websign.dll#version=4,0,4,6'></object><script>
 var sign_check={\"DATA_111\":\"\",\"DATA_117\":\"\",\"DATA_121\":\"\",\"DATA_124\":\"\"};
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
	  sign_str=\"DATA_111,DATA_117,DATA_121,DATA_124,\";
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
	</script>

	</td></TR>
</table>";

  exit;
}
			}



	//数据表模型文件,对应Model目录下面的edu_xingzheng_work_check_register_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'edu_xingzheng_work_check_register';
	$parse_filename		=	'edu_xingzheng_work_check_register';
	require_once('include.inc.php');
	if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >备注:本模块通过工作流实现操作,此处仅用于管理工作流生成之后的数据</font></td></table>";
	print $PrintText;
}
	?>










	<?
	function YMD($date){
		$list=explode("-",$date);
	 $DATE=$list[0].'年'.$list[1].'月'.$list[2].'日';
	 return $DATE;
	}

	function XNONE($xn){
		$xn=str_replace("学年","",$xn);
		$list=explode("--",$xn);
	 return $list[0];
	}
	function XNTWO($xn){
		$xn=str_replace("学年","",$xn);
		$list=explode("--",$xn);
	 return $list[1];
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