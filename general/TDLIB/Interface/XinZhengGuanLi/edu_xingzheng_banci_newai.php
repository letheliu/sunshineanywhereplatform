<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("������Դ-��������-���");
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;




	$filetablename='edu_xingzheng_banci';
	require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{
		$PrintText .= "<BR><table class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >
		&nbsp;&nbsp;��ע����ι���һ�Ͱ�ι���������ֶΣ���������Ժ���Ҫ�����޶��ð�������������ڼ�¼�Ĺ���Ȩ�ޡ�<BR>
		&nbsp;&nbsp;ʾ���������ѧ���Ƹ������,�����ǽ���Ƹ������������������¿Ƹ������ȡ�<BR>

		&nbsp;&nbsp;��Σ�<BR>
&nbsp;&nbsp;�پ����ճ��ϰ��еİ����Ϣ��������������࣬����࣬���Ǻܳ����������л���࣬��ٰ�ȡ�<BR>
&nbsp;&nbsp;��һ����ζ�Ӧһ����ʼʱ��ͽ���ʱ�䡣<BR>
&nbsp;&nbsp;�۲�ͬ��ε���ֹʱ��Ӧ����Ҫ�г�ͻ����������ϵ����ϰ�ʱ���߽������ð�Ρ�<BR>
&nbsp;&nbsp;�������ʱ���ص��İ�δ��ڣ���ô���Ű��ʱ����Ҫע�⣬һ����Ա��ͬһʱ����ڲ�Ҫͬʱӵ��������Σ��������ǿ�Ƶģ�Ҳ�����������ţ���
		</font></td></table>";
		print $PrintText;

		//���˷Ƿ�����
		��ʱִ�к���("�����������ڷǷ�����",30);

	}

	function �����������ڷǷ�����()		{
		global $db;
		$sql = "delete from edu_xingzheng_kaoqinmingxi where ��� not in (select ������� from edu_xingzheng_banci)";
		$db->Execute($sql);
	}
	?>