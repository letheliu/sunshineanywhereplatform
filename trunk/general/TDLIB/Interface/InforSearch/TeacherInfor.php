<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();
$IsWin = IsWin();
$fileName = "../../Framework/inc_Teacher_page.php?FILENAME=TeacherInforViewTeacherInfor.php&DIR=InforSearch";
 ?>
<HEAD><TITLE>��ʦ��ѧ���ݹ���</TITLE>
<frameset rows="30,*"  cols="*" frameborder="0" border="0" framespacing="0" id="frame1">
    <frame name="file_title" scrolling="no" noresize src="TeacherInforHeader.php" frameborder="0">
    <frameset rows="*"  cols="220,*" frameborder="0" border="0" framespacing="0" id="frame2">
       <frame name="left" scrolling="auto" resize src="<?=$fileName ?>" frameborder="0">
       <frame name="edu_main" scrolling="auto" src="TeacherInforViewTeacherInfor.php" frameborder="0">
    </frameset>
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