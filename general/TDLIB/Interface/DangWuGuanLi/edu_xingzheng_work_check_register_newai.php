<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-��Ա����-������Ա�������˵ǼǱ�");
	$�汾=$_SESSION['SYSTEM_OA_VERSION'];
	function ����ǩ���ı�($RUN_ID,$ITEM_ID)		{
	global $db;
	$sql = "select ITEM_DATA from TD_OA.flow_run_data where RUN_ID='$RUN_ID' and ITEM_ID='$ITEM_ID'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$ITEM_DATA = $rs_a[0]['ITEM_DATA'];
	return $ITEM_DATA;
}

		if($_GET['action']=="view_default")		{

		$���=$_GET['���'];
		$RUN_ID = $_GET['RUN_ID'];
	$RUN_ID = returntablefield("edu_xingzheng_work_check_register","���",$���,"������");
	$FLOW_ID = returntablefield("flow_run","RUN_ID",$RUN_ID,"FLOW_ID");

	if($RUN_ID=='')		$RUN_ID = '507';

	global $db;
	$RS=$db->Execute("select * from edu_xingzheng_work_check_register where ���=$���");
//	print_r($RS);

	 print "<div align=center>";
	print " <input type=button accesskey=p name=print value=��ӡ��ҳ class=SmallButton onClick=\"document.execCommand('Print');\" >";
		if($�汾=="TDOA2009"){
	print "<script src=\"/inc/js/jquery/jquery.js\"></script>\n";
	}
	else{
	print "<script src=\"/inc/js/attach.js\"></script>\n";
	print "<script src=\"/inc/js/jquery/jquery.min.js\"></script>\n";
	}

		?>
 <!-- <INPUT TYPE="button" VALUE="����" class=SmallButton ONCLICK="location='?pageAction=ExportDataToFile&���=<?=$_GET['���']?>&action=<?=$_GET['action']?>'"> -->
		<?
	print " <input type=button accesskey=p name=print value=���� class=SmallButton onClick=\"location='?XX=XX&pageid=".$_GET['pageid']."'\" >";

	print " <input type=button accesskey=p name=print value=A4 class=SmallButton onClick=\"location='?type=A4&action=view_default&���=".$���."'\" >";

	print " <input type=button accesskey=p name=print value=B4 class=SmallButton onClick=\"location='?type=B4&action=view_default&���=".$���."'\" >";

	print "</div>";
	?>
	<script>
	//����ȫ�ֱ���
	var g_run_id = "<?=$RUN_ID?>";       //��ˮ��
	var g_flow_id = "<?=$FLOW_ID?>";     //����ID
	var g_form_view = 2;                 //��ӡ��
	var doPrint = "";
	var printView = "";
	//�û��Զ���js�ű�
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
		vDWebSignSeal.SetSealSignData (strObjectName,"�й�������ҵ��Ϣ����");
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
			alert("�粻�ܴ�ӡԤ�����������ȫ���𣡾��巽�����£�\n���ݵ�ǰҳ��������ȫ�����Զ��尲ȫ���ã��ҵ��������δ���Ϊ�ɰ�ȫִ�еĽű���Activex�ؼ����г�ʼ����ִ�нű�������������Ϊ����ʾ�����ɡ�");
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


	$ITEM_DATA_111 = ����ǩ���ı�($RUN_ID,'111');
	$ITEM_DATA_117 = ����ǩ���ı�($RUN_ID,'117');
	$ITEM_DATA_121 = ����ǩ���ı�($RUN_ID,'121');
	$ITEM_DATA_124= ����ǩ���ı�($RUN_ID,'124');
	//print $FLOW_ID;exit;
	//print $ITEM_DATA;


if($_GET['type'] == 'B4'){
  print "<form name=\"form1\" method=\"post\" action=\"\">\n";
	print "<div class=fenye><div class=framework><ul><li><table class=TableBlock  align=center width=600  height=700 ><TR class=TableData><td>

<p class=MsoNormal style='text-indent:76.75pt;mso-char-indent-count:2.94;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:26.0pt;line-height:250%;font-family:����'>�����ṤҵѧУ����ְ��<span
lang=EN-US><o:p></o:p></span></span></b></p>

<p class=MsoNormal style='text-indent:119.35pt;mso-char-indent-count:3.5;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:24.0pt;line-height:250%;font-family:����;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;letter-spacing:5.0pt'>��ȹ������˱�</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:24.0pt;
line-height:250%;letter-spacing:5.0pt'><o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center;line-height:200%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:200%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:176.4pt;mso-char-indent-count:12.55;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����'>".XNONE($RS->fields['ѧ��'])."</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����'>��<span lang=EN-US>".XNTWO($RS->fields['ѧ��'])."</span></span></b><span style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;font-family:����;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri'>ѧ��</span><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>��</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:����;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>��</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></b><b style='mso-bidi-font-weight:
normal'><u><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%;mso-fareast-font-family:���ռ��п�'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span></span></u></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:���ռ��п�;mso-ascii-font-family:Calibri'>".$RS->fields['����']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;mso-fareast-font-family:���ռ��п�'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></u></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>��</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:����;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>��</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><u><span
style='mso-spacerun:yes'>&nbsp;</span></u></span></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>".$RS->fields['����']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></u></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%'><span style='mso-spacerun:yes'>&nbsp;&nbsp;</span><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����'>ְ<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span><span
class=GramE>��</span><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
</span><u><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span></u></span><u>".$RS->fields['ְ��']."<span
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
150%;font-family:����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>�������</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span></b><st1:chsdate Year=2009
Month=7 Day=8 IsLunarDate=False IsROCDate=False w:st=on><b
 style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
 mso-bidi-font-size:11.0pt;line-height:150%;font-family:����'>".YMD($RS->fields['�������'])."</span></b><b></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>
</td></TR></table></li><li><table class=TableBlock  align=center  width=50 height=700 ><tr></tr></table></li>";


print "<li><table class=TableBlock  align=center width=600   >
  <TR class=TableData><td align=center height=50>��λְ�������Ŀ������</td></TR>
    <TR class=TableData><td align=left height=350 valign=top>  <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['��λְ�������Ŀ������']."</p>   </td></TR>

	<TR class=TableData><td align=center height=50>  ���꽱�����   </td></TR>
	<TR class=TableData><td align=left valign=top height=350> <p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['���꽱�����']." </p>  </td></TR></table></li></ul></div></div>
	<div class=framework><ul><li><table class=TableBlock  align=center width=600   ><TR class=TableData><td align=center height=50>   �����ܽ�  </td></TR>
	<TR class=TableData><td align=left  valign=top height=800>
   <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['�����ܽ�']."</p>
   <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  <DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_111 ></div>
		<input type=hidden name=DATA_111 value='".$ITEM_DATA_111."' title='ǩ�¿ؼ�:����ǩ������'>
		<input type=hidden name=DATA_79 value='2010-06-17' title='�������������'><p align=right>".YMD($RS->fields['�����ܽ�ǩ��ǩ������'])."</p>
	</DIV></td></TR></table></li>
	 <li><table class=TableBlock  align=center  width=50 height=700 ><tr></tr></table></li>
	<li>
	<table class=TableBlock  align=center width=600   >
	<TR class=TableData><td align=center height=50>  ���Ҳ������   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['���Ҳ������']." </p>
	<p>���˵ȼ���".$RS->fields['���Ҳ������˵ȼ�']."</p>
	<p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_117 ></div>
		<input type=hidden name=DATA_117 value='".$ITEM_DATA_117."' title='ǩ�¿ؼ�:����ǩ��ǩ��'>
		<p align=right>".YMD($RS->fields['���Ҳ����������'])."</p>
	</DIV>
	</td></TR>
<TR class=TableData><td align=center height=50>  У�����쵼С��������   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['ѧУ����С�����']." </p>
	<p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_121 ></div>
		<input type=hidden name=DATA_121 value='".$ITEM_DATA_121."' title='ǩ�¿ؼ�:У�����쵼С��ǩ��ǩ��'>
		<p align=right>".YMD($RS->fields['ѧУ����С���������'])."</p>
	</DIV>
	</td></TR>
	<TR class=TableData><td align=center height=50>  �����������   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['�������']." </p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_124 ></div>
		<input type=hidden name=DATA_124 value='".$ITEM_DATA_124."' title='ǩ�¿ؼ�:��������ǩ��ǩ��'>
		<p align=right>".YMD($RS->fields['�����������'])."</p>
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
		var separator = \"::\";  // �ָ���
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
		  if(MyValue.indexOf(\"&quot;\")>=0) MyValue.replace(\"/&quot;/g\",\"'\");   //����˫����
			if(MyValue.indexOf(\"&#039;\")>=0) MyValue.replace(\"/&#039;/g\",\"'\");   //��������
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
  B4����  A4��ʼ
******************************************************************************************************/
if($_GET['type'] == 'A4' || $_GET['type'] == ''){
	print "<form name=\"form1\" method=\"post\" action=\"\">\n";
print "<div class=fenye><table class=TableBlock  align=center width=600  height=700 ><TR class=TableData><td>

<p class=MsoNormal style='text-indent:76.75pt;mso-char-indent-count:2.94;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:26.0pt;line-height:250%;font-family:����'>�����ṤҵѧУ����ְ��<span
lang=EN-US><o:p></o:p></span></span></b></p>

<p class=MsoNormal style='text-indent:119.35pt;mso-char-indent-count:3.5;
line-height:250%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:24.0pt;line-height:250%;font-family:����;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;letter-spacing:5.0pt'>��ȹ������˱�</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:24.0pt;
line-height:250%;letter-spacing:5.0pt'><o:p></o:p></span></b></p>

<p class=MsoNormal align=center style='text-align:center;line-height:200%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:200%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:176.4pt;mso-char-indent-count:12.55;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����'>".XNONE($RS->fields['ѧ��'])."</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����'>��<span lang=EN-US>".XNTWO($RS->fields['ѧ��'])."</span></span></b><span style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;font-family:����;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri'>ѧ��</span><span lang=EN-US
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal align=center style='text-align:center;line-height:150%'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>��</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:����;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>��</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></b><b style='mso-bidi-font-weight:
normal'><u><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%;mso-fareast-font-family:���ռ��п�'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span></span></u></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:���ռ��п�;mso-ascii-font-family:Calibri'>".$RS->fields['����']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%;mso-fareast-font-family:���ռ��п�'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></u></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>��</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span></b><b
style='mso-bidi-font-weight:normal'><span style='font-size:14.0pt;mso-bidi-font-size:
11.0pt;line-height:150%;font-family:����;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri'>��</span></b><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><u><span
style='mso-spacerun:yes'>&nbsp;</span></u></span></b><b style='mso-bidi-font-weight:
normal'><u><span style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:
150%;font-family:����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>".$RS->fields['����']."</span></u></b><b
style='mso-bidi-font-weight:normal'><u><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp; </span></span></u></b><b style='mso-bidi-font-weight:
normal'><span lang=EN-US style='font-size:14.0pt;mso-bidi-font-size:11.0pt;
line-height:150%'><span style='mso-spacerun:yes'>&nbsp;&nbsp;</span><o:p></o:p></span></b></p>

<p class=MsoNormal style='text-indent:126.5pt;mso-char-indent-count:9.0;
line-height:150%'><b style='mso-bidi-font-weight:normal'><span
style='font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:
����'>ְ<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span></span><span
class=GramE>��</span><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
</span><u><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span></u></span><u>".$RS->fields['ְ��']."<span
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
150%;font-family:����;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri'>�������</span></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span></b><st1:chsdate Year=2009
Month=7 Day=8 IsLunarDate=False IsROCDate=False w:st=on><b
 style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
 mso-bidi-font-size:11.0pt;line-height:150%;font-family:����'>".YMD($RS->fields['�������'])."</span></b><b></b><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='font-size:14.0pt;
mso-bidi-font-size:11.0pt;line-height:150%'><o:p></o:p></span></b></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US style='mso-bidi-font-size:10.5pt'><o:p>&nbsp;</o:p></span></p>
</td></TR></table></div>";


print "<div class=fenye><table class=TableBlock  align=center width=600   >
  <TR class=TableData><td align=center height=50>��λְ�������Ŀ������</td></TR>
    <TR class=TableData><td align=left height=350 valign=top>  <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['��λְ�������Ŀ������']."</p>   </td></TR>

	<TR class=TableData><td align=center height=50>  ���꽱�����   </td></TR>
	<TR class=TableData><td align=left valign=top height=350> <p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['���꽱�����']." </p>  </td></TR></table></div>
	<div class=fenye><table class=TableBlock  align=center width=600   ><TR class=TableData><td align=center height=50>   �����ܽ�  </td></TR>
	<TR class=TableData><td align=left  valign=top height=800>
   <p>&nbsp;&nbsp;&nbsp;&nbsp;".$RS->fields['�����ܽ�']."</p>
   <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_111 >&nbsp;</div>
		<input type=hidden name=DATA_111 value='".$ITEM_DATA_111."' title='ǩ�¿ؼ�:����ǩ������'>
		<p align=right>".YMD($RS->fields['�����ܽ�ǩ��ǩ������'])."</p>
	</DIV>
     </td></TR></table></div>

	<table class=TableBlock  align=center width=600   >
	<TR class=TableData><td align=center height=50>  ���Ҳ������   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['���Ҳ������']." </p>
	<p>���˵ȼ���".$RS->fields['���Ҳ������˵ȼ�']."</p>
	<p>&nbsp;</p><p>&nbsp;</p>
<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_117 ></div>
		<input type=hidden name=DATA_117 value='".$ITEM_DATA_117."' title='ǩ�¿ؼ�:����ǩ��ǩ��'>
		<p align=right>".YMD($RS->fields['���Ҳ����������'])."</p>
	</DIV>
	</td></TR>
<TR class=TableData><td align=center height=50>  У�����쵼С��������   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['ѧУ����С�����']." </p>
	<p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_121 ></div>
		<input type=hidden name=DATA_121 value='".$ITEM_DATA_121."' title='ǩ�¿ؼ�:У�����쵼С��ǩ��ǩ��'>
		<p align=right>".YMD($RS->fields['ѧУ����С���������'])."</p>
	</DIV>
	</td></TR>
	<TR class=TableData><td align=center height=50>  �����������   </td></TR>
	<TR class=TableData><td align=left>
	<p>&nbsp;&nbsp;&nbsp;&nbsp; ".$RS->fields['�������']." </p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<DIV style=\"TEXT-ALIGN: center\">
		<BR><BR><BR><BR>ǩ�������£�&nbsp;&nbsp;
		<div id=SIGN_POS_DATA_124 ></div>
		<input type=hidden name=DATA_124 value='".$ITEM_DATA_124."' title='ǩ�¿ؼ�:��������ǩ��ǩ��'>
		<p align=right>".YMD($RS->fields['�����������'])."</p>
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
		var separator = \"::\";  // �ָ���
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
		  if(MyValue.indexOf(\"&quot;\")>=0) MyValue.replace(\"/&quot;/g\",\"'\");   //����˫����
			if(MyValue.indexOf(\"&#039;\")>=0) MyValue.replace(\"/&#039;/g\",\"'\");   //��������
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



	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����edu_xingzheng_work_check_register_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'edu_xingzheng_work_check_register';
	$parse_filename		=	'edu_xingzheng_work_check_register';
	require_once('include.inc.php');
	if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >��ע:��ģ��ͨ��������ʵ�ֲ���,�˴������ڹ�����������֮�������</font></td></table>";
	print $PrintText;
}
	?>










	<?
	function YMD($date){
		$list=explode("-",$date);
	 $DATE=$list[0].'��'.$list[1].'��'.$list[2].'��';
	 return $DATE;
	}

	function XNONE($xn){
		$xn=str_replace("ѧ��","",$xn);
		$list=explode("--",$xn);
	 return $list[0];
	}
	function XNTWO($xn){
		$xn=str_replace("ѧ��","",$xn);
		$list=explode("--",$xn);
	 return $list[1];
	}
	?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>