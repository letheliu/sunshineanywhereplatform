<?
require_once('cache.inc.php');
?>
<html>
<head>
<title>ϵͳ������</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="images/style.css">
<script language="JavaScript">

// ��ʾ�������ĵ�ǰʱ��
var OA_TIME = new Date();
function timeview()
{
  timestr=OA_TIME.toLocaleString();
  timestr=timestr.substr(timestr.indexOf(" "));
  OA_TIME.setSeconds(OA_TIME.getSeconds()+1);
  window.setTimeout( "timeview()", 1000 );
}

// ѯ��ע��ϵͳ
function iflogout()
{
if(window.confirm('ȷ�����µ�¼��'))
 {
  parent.parent.location="<?=$��ҳBANNERϵͳע��?>";        // ҳ����ת
 }
}


// ��������
function GoTable()
{
  parent.parent.table_index.table_main.location="MainDataWindows.php";
}

//�޸��ҵ�����
function ChangePAD()
{
  parent.parent.table_index.table_main.location="<?=$��ҳBANNER�޸�����?>";
}

// <!--��������Ҽ���ʼ-->
if (window.Event)
  document.captureEvents(Event.MOUSEUP);

function nocontextmenu()
{
 event.cancelBubble = true
 event.returnValue = false;

 return false;
}

function norightclick(e)
{
 if (window.Event)
 {
  if (e.which == 2 || e.which == 3)
   return false;
 }
 else
  if (event.button == 2 || event.button == 3)
  {
   event.cancelBubble = true
   event.returnValue = false;
   return false;
  }

}

// <!--��������Ҽ�����-->

</script>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" padding="0" onselectstart="return false" >
<div id="topWrap">
	<h1><?=$��ҳBANNER����?></h1>
	<div id="topInner">

		<div class="topButton" onClick="javascript:iflogout();">
			<div class="topButton-inner">
			<span class="relogin">ע��</span>
			</div>
		</div>
		<div class="topButton" onClick="javascript:ChangePAD();">
			<div class="topButton-inner">
			<span class="desktop">�޸�����</span>
			</div>
		</div>
		<div class="topButton" onClick="javascript:GoTable();">
			<div class="topButton-inner">
			<span class="desktop">�ҵ�����</span>
			</div>
		</div>
	</div>
</div>



</body>
</html>
