<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('lib.inc.php');
require_once('./sms_index/single_select.php');
$common_html=returnsystemlang('common_html');
$_GET['TO_ID']=isset($_GET['TO_ID'])?$_GET['TO_ID']:'TO_ID';
$_GET['TO_NAME']=isset($_GET['TO_NAME'])?$_GET['TO_NAME']:'TO_NAME';
$_GET['action_page']=isset($_GET['action_page'])?$_GET['action_page']:'action_page';
$MODE = $_GET['MODE'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<!-- saved from url=(0036)http://localhost/module/user_select/ -->
<HTML>
<HEAD>
<TITLE>
<?=$common_html['common_html']['adduser']?>
</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="./images/style.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2800.1106" name=GENERATOR>
</HEAD>
<FRAMESET id=bottom border=1 frameSpacing=0 rows=225,* frameBorder=YES cols=*>
<FRAMESET id=bottom border=1 frameSpacing=0 rows=* frameBorder=YES cols=150,*>
<FRAME name=dept 
src="./frame_user_dept.php?action_page=<?=$_GET['action_page']?>&TO_ID=<?=$_GET['TO_ID']?>&TO_NAME=<?=$_GET['TO_NAME']?>&MODE=<?=$MODE?>">
<FRAME name=user 
src="./frame_user_user.php?action_page=<?=$_GET['action_page']?>&TO_ID=<?=$_GET['TO_ID']?>&TO_NAME=<?=$_GET['TO_NAME']?>&MODE=<?=$MODE?>">
</FRAMESET>
<FRAME name=bottom 
src="otherinfor.php?action=bottom" frameBorder=NO scrolling=no></FRAMESET></HTML><?
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