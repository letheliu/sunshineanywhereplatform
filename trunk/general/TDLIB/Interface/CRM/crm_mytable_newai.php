<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	
	/*
	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);//exit;
		global $db;
		$������� = (int)$_POST['�������'];$�̲ı�� = $_POST['�̲ı��'];
		$sql = "update edu_jiaocai set ���п��=���п��+$������� where �̲ı��='".$�̲ı��."'";
		$rs = $db->Execute($sql);//print $sql;exit;
		$_POST['������'] = returntablefield("edu_jiaocai","�̲ı��",$�̲ı��,"������");
		$_POST['������'] = returntablefield("edu_jiaocai","�̲ı��",$�̲ı��,"������");
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}

    	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>������ť��ʼ������ģ�����ݣ�
			               <input type=button name=csh class=SmallButton value=��ʼ��>
			               </td></table>";
			print $PrintText;
		}
		*/
	$filetablename		=	'crm_mytable';
	$parse_filename		=	'crm_mytable';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>˵����<br>
                            &nbsp;&nbsp;&nbsp;1����ģ���ǹ���ʹ�õģ����й��������û�����ģ�����õ�Ȩ�ޡ�<br>
			                &nbsp;&nbsp;&nbsp;2������ǵ�һ�ε�¼ϵͳ��ϵͳ����CRM����ģ����г�ʼ����<br>        
			               </td></table>";
			print $PrintText;
		}
	?>