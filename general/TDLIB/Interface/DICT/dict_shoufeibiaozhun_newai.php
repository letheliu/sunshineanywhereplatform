<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();




$filetablename		=	'dict_shoufeibiaozhun';
$parse_filename		=	'dict_shoufeibiaozhun';
require_once('include.inc.php');



if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=red ><B>�ǳ���Ҫ:<BR></B></font>
	<font color=green >
	&nbsp;&nbsp;1�����ɾ���շѱ�׼���Ƶ���Ϣ�����Զ�ɾ��רҵ�շѱ�׼/ѧ���ѽɷѵ�ģ��Ķ�Ӧ��Ϣ�������ʹ�á�<BR>
	&nbsp;&nbsp;2�������ֻ��һ���շѱ�׼����д'��ͨ'�Ϳ����ˣ���������ּ������շѱ�׼��ֱ�������շѱ�׼���ƣ���������Ժ���'�շѱ�׼����'����������þ�����Ϣ��<BR>&nbsp;&nbsp;3���������ٴ���һ���շѱ�׼,��������Ϊ'��ͨ'��</font></td></table>";
	print $PrintText;
}


$sql = "select * from dict_shoufeibiaozhun where ����='��ͨ'";
$rs = $db->Execute($sql);
if($rs->fields['����']!="��ͨ")			{
	$sql = "insert into dict_shoufeibiaozhun values('','��ͨ');";
	$db->Execute($sql);
}

?>