<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


require_once('lib.inc.php');
$sessionkey=returnSessKey();
$GLOBAL_SESSION=returnsession();



?><html>
<head>
<title><?=$IE_TITLE?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script language="JavaScript">
self.moveTo(0,0);
self.resizeTo(screen.availWidth,screen.availHeight);
self.focus();
// ״̬����ʾ����
window.defaultStatus="<?=$��λ����?>";
</script>
</head>

<frameset rows="51,*,20" cols="*" frameborder="NO" border="0" framespacing="0" id="frame1"><!-- ���·�ʽ�ָ�Ϊ3�� -->
  <frame src="index_top.php" name="topFrame" scrolling="NO" noresize ><!--//����ҳ��  -->
  <frameset rows="*" cols="7,190,5,9,*" framespacing="0" frameborder="NO" border="0" id="frame2"><!--//�в��ٷ�Ϊ����,���ҷ�ʽ�ָ� -->
    <frame src="menu_leftbar.php" name="menu_leftbar" scrolling="NO" noresize><!-- //�˵������ -->
	<frame src="function_panel_index.php" name="function_panel_index" scrolling="NO" noresize><!--//��ߵĲ˵�ҳ -->
    <frame src="menu_rightbar.php" name="menu_rightbar" scrolling="NO" noresize><!--//�˵��ұ��� -->
	<frame src="controlmenu.php" name="controlmenu" scrolling="no" frameborder="0" noresize><!--//�м�ҳ��������߲˵������� -->
	<frame src="table_index.php" name="table_index" scrolling="no" frameborder="0" noresize><!--//�ұߵ�����ҳ�棬��ʾ�˵����ҳ�� -->
  </frameset>

  <frame src="status_bar.php" name="status_bar" scrolling="NO" noresize ><!--//�ײ���״̬ҳ�� -->
</frameset>

<noframes>�����������֧�ֿ��ҳ�棬��ʹ��IE6.0���ϵ��������</noframes>
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