<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-��������-������ϸ");
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;

	require_once('lib.xingzheng.inc.php');


	if($_GET['action']=="add_default_data")			{
		$_POST['��Ա�û���'] =  $_POST['��Ա_ID'];
		$DEPT_ID =  returntablefield("user","USER_ID",$_POST['��Ա_ID'],"DEPT_ID");
		$_POST['����'] =  returntablefield("department","DEPT_ID",$DEPT_ID,"DEPT_NAME");
		//print_R($_POST);exit;
	}


	//����ͨ���Ӱ���˲���
if($_GET['action']=="operation_piliangjiaban"&&$_GET['selectid']!="")			{
	//print_R($_GET);exit;
	//print_R($_SESSION);
	$����� = $_SESSION['LOGIN_USER_NAME'];
	$���ʱ��=date('Y-m-d H:i:s');

	$Array = explode(',',$_GET['selectid']);
	//PRINT_r($Array);EXIT;
	for($i=0;$i<sizeof($Array);$i++)	{
		$Element = $Array[$i];
		if($Element!="")		{
			$���״̬ = returntablefield("edu_xingzheng_jiabanbuxiu","���",$$Element,"���״̬");
			if($���״̬!=1){
			$sql = "update edu_xingzheng_jiabanbuxiu set �Ӱ����״̬='1',�Ӱ������='$�����',�Ӱ����ʱ��='$���ʱ��' where ���='$Element'";
			$rs = $db->Execute($sql);
			$sql."<BR>"; 
			}
		}
	}
	$pageid = $_GET['pageid'];
	page_css("�Ӱ��������");
	print_nouploadfile("������ݲ��������ɹ�!");
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?pageid=$pageid'>\n";
	exit;
}




//����ͨ��������˲���
if($_GET['action']=="operation_piliangbuxiu"&&$_GET['selectid']!="")			{
	//print_R($_GET);exit;
	//print_R($_SESSION);
	$����� = $_SESSION['LOGIN_USER_NAME'];
	$���ʱ��=date('Y-m-d H:i:s');

	$Array = explode(',',$_GET['selectid']);
	//PRINT_r($Array);EXIT;
	for($i=0;$i<sizeof($Array);$i++)	{
		$Element = $Array[$i];
		if($Element!="")		{
			$���״̬ = returntablefield("edu_xingzheng_jiabanbuxiu","���",$$Element,"���״̬");
			if($���״̬!=1){
			$sql = "update edu_xingzheng_jiabanbuxiu set �Ӱ����״̬='0',�������״̬='1',���������='$�����',�������ʱ��='$���ʱ��' where ���='$Element'";
			$rs = $db->Execute($sql);
			$sql."<BR>"; 
			}
		}
	}
	$pageid = $_GET['pageid'];
	page_css("�����������");
	print_nouploadfile("������ݲ��������ɹ�!");
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?pageid=$pageid'>\n";
	exit;
}




	$filetablename='edu_xingzheng_jiabanbuxiu';
	require_once('include.inc.php');
	//������˵��ע��
	require_once("../Help/module_xingzhengworkflow.php");
	?>