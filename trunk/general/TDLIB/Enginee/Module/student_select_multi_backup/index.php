<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/conn.php");

if($LOGIN_NOT_VIEW_USER)
{
   Message("","�޲鿴�û���Ȩ��","blank");
   exit;
}
if($TO_ID=="" || $TO_ID=="undefined")
{
   $TO_ID="TO_ID";
   $TO_NAME="TO_NAME";
}
if($MODULE_ID=="undefined")
   $MODULE_ID="";
if($MANAGE_FLAG=="undefined")
   $MANAGE_FLAG="";
if($FORM_NAME=="" || $FORM_NAME=="undefined")
  $FORM_NAME="form1";
?>

<html>
<head>
<title>ѡ����Ա</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script src="/inc/js/utility.js"></script>
<script Language="JavaScript">
function Load_Do()
{
   var parent_window = getOpenner();
   var TO_ID_STR = parent_window.<?=$FORM_NAME?>.<?=$TO_ID?>.value;
   var TO_NAME_STR = parent_window.<?=$FORM_NAME?>.<?=$TO_NAME?>.value;
   if(TO_ID_STR=="" || TO_NAME_STR=="")
      user.location="user.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&MANAGE_FLAG=<?=$MANAGE_FLAG?>";
   else
      user.location="selected.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>";
}
</script>

<frameset rows="*,30"  rows="*" frameborder="no" border="1" framespacing="0" id="frame1" onload="Load_Do();">
   <frameset cols="200,*"  rows="*" frameborder="yes" border="1" framespacing="0" id="frame2">
      <frame name="dept" src="dept.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&MANAGE_FLAG=<?=$MANAGE_FLAG?>">
      <frame name="user" src="">
   </frameset>
   <frame name="control" scrolling="no" src="control.php">
</frameset><?
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