<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


//----------------------------------------------------------
//������������sms_index/Ŀ¼
//----------------------------------------------------------
require_once('lib.inc.php');
session_start();

?>
<HTML>
<HEAD>
<TITLE>���ֻ�У԰ϵͳ</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="/theme/<?=$LOGIN_THEME?>/style.css" type=text/css rel=stylesheet>
<script type="text/javascript" language="javascript" src="../Enginee/lib/common.js"></script>
<FRAMESET id=bottom1 border=1 frameSpacing=0 rows=230,* frameBorder=YES cols=*>
<FRAMESET id=bottom2 border=1 frameSpacing=0 rows=* frameBorder=YES cols=*,0>
<FRAME name=user src="./select_departmentlist.php?tablename=<?=$_GET['tablename']?>&fieldid=<?=$_GET['fieldid']?>&fieldname=<?=$_GET['fieldname']?>&field=<?=$_GET['field']?>&field2=<?=$_GET['field2']?>&type=<?=$_GET['type']?>&title=<?=$_GET['title']?>">
</FRAMESET>
<FRAME name=bottom3 src="otherinfor.php?action=bottom" frameBorder=NO scrolling=no></FRAMESET>

</HTML><?
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