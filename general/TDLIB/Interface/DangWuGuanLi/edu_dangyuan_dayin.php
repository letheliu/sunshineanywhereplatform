<link rel="stylesheet" type="text/css" href="/theme/3/style.css">
<script src="/inc/js/ccorrect_btn.js"></script>

<?
require_once('lib.inc.php');
function ����ǩ���ı�($RUN_ID,$ITEM_ID)		{
	global $db;
	$sql = "select ITEM_DATA from TD_OA.flow_run_data where RUN_ID='$RUN_ID' and ITEM_ID='$ITEM_ID'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$ITEM_DATA = $rs_a[0]['ITEM_DATA'];
	return $ITEM_DATA;
}
	$���=$_GET['���'];
	$RUN_ID = $_GET['RUN_ID'];
	$RUN_ID = returntablefield("edu_dangyuan_work_check_register","���",$���,"������");
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

<title>����ӡ - �������鵳Ա�Ǽ�����(2010-07-05 12:18:01)</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/3/dialog.css">
<style type="text/css">
<!--
.title {  font-family: "����"; font-size: 18pt; font-weight: bold}
/*�û��Զ�����ʽ��*/
-->
</style>

</head>

<body style="background:none;" topmargin="5"  >
<div align=center>
<input type=button accesskey=p name=print value=��ӡ��ҳ class=SmallButton onClick="document.execCommand('Print');" >
<?
$�汾=$_SESSION['SYSTEM_OA_VERSION'];
if($�汾=="TDOA2009"){
	print "<script src=\"/inc/js/jquery/jquery.js\"></script>\n";
	}
	else{
	print "<script src=\"/inc/js/attach.js\"></script>\n";
	print "<script src=\"/inc/js/jquery/jquery.min.js\"></script>\n";
	}
?>
<script src="/inc/js/jquery/jquery.js"></script>
<input type=button onClick="javascript:history.back();" value="����" class=SmallButton >
</div>

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

$ITEM_DATA_86 = ����ǩ���ı�($RUN_ID,'86');
	$ITEM_DATA_89 = ����ǩ���ı�($RUN_ID,'89');
	$ITEM_DATA_92 = ����ǩ���ı�($RUN_ID,'92');
	//$ITEM_DATA_124= ����ǩ���ı�($RUN_ID,'124');
	//print $ITEM_DATA_92;exit;
                       $���=$_GET['���'];
						$sql="select * from edu_dangyuan_work_check_register where ���='$���'";
						$rs = $db->Execute($sql);
						$rs_a = $rs->GetArray();
						for($i=0;$i<sizeof($rs_a);$i++){
						$ѧУ����=$rs_a[$i]['ѧУ����'];
						$ѧ��=$rs_a[$i]['ѧ��'];
						$����=$rs_a[$i]['����'];
						$������=$rs_a[$i]['������'];
						$�û���=$rs_a[$i]['�û���'];
						$����=$rs_a[$i]['����'];
						$�Ա�=$rs_a[$i]['�Ա�'];
						$��������=$rs_a[$i]['��������'];
						$����=$rs_a[$i]['����'];
						$����=$rs_a[$i]['����'];
						$ְ��=$rs_a[$i]['ְ��'];
						$ѧ��=$rs_a[$i]['ѧ��'];
						$�뵳ʱ��=$rs_a[$i]['�뵳ʱ��'];
						$ת��ʱ��=$rs_a[$i]['ת��ʱ��'];
						$�μӹ���ʱ��=$rs_a[$i]['�μӹ���ʱ��'];
						$����С��=$rs_a[$i]['����С��'];
						$�����������=$rs_a[$i]['�����������'];
						$֧�����=$rs_a[$i]['֧�����'];
						$֧�����ǩ��ǩ������=$rs_a[$i]['֧�����ǩ��ǩ������'];
						$�ϼ�����֯���=$rs_a[$i]['�ϼ�����֯���'];
						$�ϼ�����֯ǩ��ǩ������=$rs_a[$i]['�ϼ�����֯ǩ��ǩ������'];
						$�������=$rs_a[$i]['�������'];
						$����ǩ��ǩ������=$rs_a[$i]['����ǩ��ǩ������'];
						$��ע=$rs_a[$i]['��ע'];

						}


?>
<form name="form1" method="post" action="">
<DIV align=center><BR>
<BR><BR><SPAN style="FONT-SIZE: 16pt"><STRONG>&nbsp;</STRONG>
<DIV align=center><SPAN style="FONT-SIZE: 16pt"><STRONG>�������鵳Ա�ǼǱ�</STRONG></SPAN></DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center><SPAN style="FONT-SIZE: 16pt">
<?=$ѧ��?>
</SPAN></DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;</DIV>
<DIV align=center>&nbsp;<SPAN style="FONT-SIZE: 16pt">���� <U><SPAN><?=$����?><input type=hidden name=DATA_67 value='ϵͳ����Ա' title='����'>
<BR><BR></SPAN></U></SPAN></DIV>
<DIV align=center>&nbsp;</DIV>

<DIV align=center>&nbsp;<SPAN style="FONT-SIZE: 16pt">��λ <U><SPAN><?=$ѧУ����?><input type=hidden name=DATA_68 value='�����ṤҵѧУ' title='��λ'>
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
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">����</SPAN></DIV></TD>


<!-- ���� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 54pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=72>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">��&nbsp;��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$����?></DIV></TD>

<!-- �Ա� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">��&nbsp;��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$�Ա�?></DIV></TD>

<!-- �������� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">��������</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 69.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=93>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$��������?></DIV></TD></TR>
<TR>

<!-- ������ -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 54pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=72>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">������</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$������?></DIV></TD>

<!-- ���� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">��&nbsp;��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$����?></DIV></TD>

<!-- ���� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">��<SPAN>&nbsp;&nbsp;&nbsp; </SPAN>��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 69.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=93>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$����?></DIV></TD></TR>

<!-- �뵳ʱ�� -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 86.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=115 colSpan=2>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">�뵳ʱ��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$�뵳ʱ��?>
</DIV></TD>

<!--  ת��ʱ��-->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">ת��ʱ��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$ת��ʱ��?></DIV></TD>

<!--�μӹ���ʱ�� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">�μӹ���ʱ<SPAN>&nbsp;&nbsp;&nbsp; </SPAN>��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 69.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=93>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$�μӹ���ʱ��?>
</DIV></TD></TR>


<!-- ѧ�� -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 86.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=115 colSpan=2>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">ѧ<SPAN>&nbsp;&nbsp;&nbsp; </SPAN>��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 81pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=108>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$ѧ��?></DIV></TD>

<!-- ����ְ�� -->
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 63pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=84>
<DIV style="LINE-HEIGHT: 150%" align=center><SPAN style="FONT-SIZE: 12pt; LINE-HEIGHT: 150%">����ְ��</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 195.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=261 colSpan=3>
<DIV style="LINE-HEIGHT: 150%" align=center><?=$����ְ��?></DIV></TD></TR>

<!-- ����С�� -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 426.1pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=568 colSpan=7>
<DIV style="LINE-HEIGHT: 150%" align=center><B><SPAN style="FONT-SIZE: 16pt; LINE-HEIGHT: 150%">����С��</SPAN></B></DIV></TD></TR>
<TR >

<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 426.1pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=568 colSpan=7>
<DIV style="LINE-HEIGHT: 150%" align=center>&nbsp;</DIV>
<DIV style="LINE-HEIGHT: 150%;height:600px;" align=center><?=nl2br($����С��)?></DIV>



<DIV style="LINE-HEIGHT: 150%" align=center>&nbsp;</DIV></TD></TR>

<tr style="PAGE-BREAK-AFTER:always;"><tr>

<!--�����������  -->
<TR >
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 30pt" align=center><SPAN style="FONT-SIZE: 14pt">�����������</SPAN></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV style="LINE-HEIGHT: 150%;height:80px;" align=center><?=nl2br($�����������)?></DIV></TD></TR>

<!-- <div class=fenye></div>  -->
<!-- ֧����� -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 38pt" align=center><B><SPAN style="FONT-SIZE: 16pt">֧</SPAN></B></DIV>
<DIV style="LINE-HEIGHT: 38pt" align=center><B><SPAN style="FONT-SIZE: 16pt">�����</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV align=center>&nbsp;</DIV>
<DIV style="LINE-HEIGHT: 150%;height:120px;" align=center><?=nl2br($֧�����)?></DIV>

<DIV style="TEXT-INDENT: 12pt">֧�����ǩ�ֻ����
<? print "<div id=SIGN_POS_DATA_86>&nbsp;</div>
<input type=hidden name=DATA_86 value='".$ITEM_DATA_86."' title='ǩ�¿ؼ�:֧�����ǩ��ǩ��'>"; ?>

</DIV>
<DIV align=center>&nbsp;</DIV></TD></TR>


<!-- ������� -->
<TR style="HEIGHT: 92pt">
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; HEIGHT: 92pt; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 20pt" align=center><B><SPAN style="FONT-SIZE: 16pt">�������</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; HEIGHT: 92pt; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV style="LINE-HEIGHT: 150%;height:120px;" align=center><?=$�������?>
</DIV>

<DIV style="TEXT-INDENT: 12pt"><SPAN style="FONT-SIZE: 12pt">ǩ�ֻ����<SPAN>&nbsp;&nbsp;
<? print "<div id=SIGN_POS_DATA_89></div>
<input type=hidden name=DATA_89 value='".$ITEM_DATA_89."' title='ǩ�¿ؼ�:����ǩ��ǩ��'>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </SPAN><?=$����ǩ��ǩ������?>
</SPAN></DIV></TD></TR>

<!--�ϼ�����֯���  -->
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV style="LINE-HEIGHT: 26pt" align=center><B><SPAN style="FONT-SIZE: 16pt">�ϼ�����֯���</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV align=center>&nbsp;</DIV>
<DIV style="LINE-HEIGHT: 150%;height:160px;" align=center><?=$�ϼ�����֯���?>
</DIV>

<DIV style="TEXT-INDENT: 12pt"><SPAN style="FONT-SIZE: 12pt">����<SPAN>&nbsp;
<? print "<div id=SIGN_POS_DATA_92 ></div>
		<input type=hidden name=DATA_92 value='".$ITEM_DATA_92."' title='ǩ�¿ؼ�:֧�����ǩ��ǩ��'>"; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </SPAN><?=$�ϼ�����֯ǩ��ǩ������?>
</SPAN></DIV></TD></TR>
<TR>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: windowtext 1pt solid; WIDTH: 32.4pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=43>
<DIV align=center><B><SPAN style="FONT-SIZE: 16pt">��ע</SPAN></B></DIV></TD>
<TD style="BORDER-RIGHT: windowtext 1pt solid; PADDING-RIGHT: 5.4pt; BORDER-TOP: #ece9d8; PADDING-LEFT: 5.4pt; PADDING-BOTTOM: 0cm; BORDER-LEFT: #ece9d8; WIDTH: 393.7pt; PADDING-TOP: 0cm; BORDER-BOTTOM: windowtext 1pt solid; BACKGROUND-COLOR: transparent" width=525 colSpan=6>
<DIV style="LINE-HEIGHT: 150%;height:100px;" align=center><?=$��ע?></DIV>
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
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>