<?
//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("�����շѹ���-�շ��趨");
//######################�������-Ȩ�޽��鲿��##########################

$filetablename='dict_shoufeixiangmu';
require_once('include.inc.php');


if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=red ><B>��ע:���ɾ���շ���Ŀ���Ƶ���Ϣ,���Զ�ɾ��רҵ�շѱ�׼,ѧ���ѽɷѵ�ģ��Ķ�Ӧ��Ϣ,�����ʹ��.</B></font></td></table>";
	print $PrintText;
}

?>