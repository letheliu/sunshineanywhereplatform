<?
require_once('cache.inc.php');
?>
<html>
<head>
<title>���ܲ˵���</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="images/style.css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-family: "����"}
-->
</style>

<script Language=JavaScript>

// ------ ��ʱˢ��ҳ�� -------
window.setTimeout('this.location.reload();',600000);  <!-- ��ʱˢ��  -->


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
document.oncontextmenu = nocontextmenu;  // for IE5+
document.onmousedown = norightclick;     // for all others
// <!--��������Ҽ�����-->

</script>
</head>


<body onselectstart="return false" style="margin:0;padding:0;">


<div style="background:url(images/pannel-top.gif);border-bottom:1px solid #778FAF;height:47px;">
<div class="obutton type1" id="menu_1" onclick="parent.view_menu(1)"><?=$�˵���Ϣһ����?></div>
<div class="obutton type2" id="menu_2" onclick="parent.view_menu(2)" ><?=$�˵���Ϣ������?></div>
<div class="obutton type3" id="menu_3" onclick="parent.view_menu(3)" ><?=$�˵���Ϣ������?></div>
</div>
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