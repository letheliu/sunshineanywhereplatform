<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("ѧ������-�ۺ�����-��Ա","������Դ-��Ա����-�������鵳Ա�ǼǱ�");

	if($_GET['action']=="view_default"){
	header( "Location:   edu_dangyuan_dayin.php?���=".$_GET['���']."");
	}

	$filetablename		=	'edu_dangyuan_work_check_register';
	$parse_filename		=	'edu_dangyuan_work_check_register';
	require_once('include.inc.php');

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
	&nbsp;&nbsp;��ע����ģ��ͨ��������ʵ�ֲ������˴������ڹ�����������֮������ݡ�<BR>
	&nbsp;&nbsp;�ؼ��Ը���˵����<BR>
&nbsp;&nbsp;�ٱ�ģ��ĵ�Ա������Ҫ���ڹ����ʦ����������Ա������Ա��Ϣ�Ĺ�����ͬ��ѧ���������浳Աֻ���ڹ�����Уѧ������ơ�<BR>
&nbsp;&nbsp;�ڱ�ģ����˹���Ա�����ѡ�������֮�⣬�ص�Ե�Ա�������Ϣ�����������˺͵�Ա������������еǼǹ���<BR>
&nbsp;&nbsp;�۵�Ա��������������ɵ�Ա������Ĺ������������Լ����Լ��������֣����ɵ�С�鸺���ˣ���Ա֧����ǣ���ί��ǽ������֣������������ֻ�У԰�����ݿ⣬�γɿ��Խ��л��ܺ�ͳ�ƵĽṹ�����ݡ�<BR>
&nbsp;&nbsp;���������鵳Ա�ǼǱ����ɵ�Ա������Ĺ����������ɵ�Ա������дһЩ��Ϣ�����ɵ�С�鸺���ˣ���Ա֧����ǣ���ί��ǽ������ۣ������������ֻ�У԰�����ݿ⣬�γɿ��Խ��л��ܺ�ͳ�ƵĽṹ�����ݡ�</font></td></table>";
	print $PrintText;
}
	?>