<?
session_start();
?>
<html>
<head>
<title>�˵�����������</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<script language="JavaScript">
	var AUTO_HIDE_MENU=0;

var arrowpic1="images/control-button.gif";
var arrowpic2="images/control-button.gif"

//--------------------- ״̬��ʼ ----------------------
var MENU_SWITCH;
function panel_menu_open()
{
 MENU_SWITCH=AUTO_HIDE_MENU;
 panel_menu_ctrl();
}


//------------------ ���״̬�л� ---------------------
function panel_menu_ctrl()
{
   if(MENU_SWITCH==0)
   {
      parent.frame2.cols="7,190,5,9,*,0";
      MENU_SWITCH=1;
      arrow.src=arrowpic1;
   }
   else
   {
      parent.frame2.cols="0,0,0,9,*,0";
      MENU_SWITCH=0;
      arrow.src=arrowpic2;
   }
}


//------------------ ���״̬�л� ---------------------
function enter_menu_ctrl()
{
   if(AUTO_HIDE_MENU==1)    // �ж�����Ƿ������Զ�����
   {
     if(MENU_SWITCH==0)
     {
        parent.frame2.cols="7,190,5,9,*,0";
        MENU_SWITCH=1;
        arrow.src=arrowpic1;
     }
     else
     {
        parent.frame2.cols="0,0,0,9,*,0";
        MENU_SWITCH=0;
        arrow.src=arrowpic2;
     }
   }
}


//--------------- ���¿��ҳ��ʾ���� -----------------
var DB_VIEW=0;                          // ״ֵ̬��ʼ
var DB_rows=parent.parent.frame1.rows;  // ����ԭʼֵ
function DB_Display()
{
   if (DB_VIEW==0)     // δ����
   {
    parent.parent.frame1.rows="0,0,*,0";
	DB_VIEW=1;
   }
   else                // ������
   {
    parent.parent.frame1.rows=DB_rows;
    DB_VIEW=0;
   }
}




</script>


</head>
<link rel='stylesheet' type='text/css' href='/theme/<?=$_SESSION['LOGIN_THEME']?>/style.css'>
<body topmargin="0" class=bodycolor leftmargin="0">

<table width="9" height="100%" border="0" cellpadding="0" cellspacing="0"  onMouseMove="enter_menu_ctrl()" >
<tr style="cursor:hand" onclick="panel_menu_ctrl()">
    <td style="background:url(images/control-bg.gif) repeat-y;">
	<img id="arrow" src="images/control-button.gif" width="9" height="57" GALLERYIMG="no"  alt="���������Ʋ˵�����壬�Ҽ������������״̬����"/>
	</td>
  </tr>
</table>


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