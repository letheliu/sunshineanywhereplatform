<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();



	//###########################################
	//����ֲ��Ź���Ȩ�޲���
	//###########################################
	$SCRIPT_NAME	= "inc_booksset_priv.php";
	$LOGIN_USER_ID		= $_SESSION['LOGIN_USER_ID'];
	$sql = "select * from systemprivateinc where `FILE`='$SCRIPT_NAME' and USER_ID like '%".$LOGIN_USER_ID.",%'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$MODULE_ARRAY = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$MODULE_ARRAY[] = $rs_a[$i]['MODULE'];
	}
	$MODULE_TEXT = join(',',$MODULE_ARRAY);
	if($MODULE_TEXT=="")  $MODULE_TEXT = "δָ��������Ϣ";
	//if($_GET['action']==""||$_GET['action']=="init_default")
	$_GET['��������'] = $MODULE_TEXT;

	$_GET['����״̬'] = "����δ����,�����ѷ���,ͼ���ѷ���,ͼ���ѹ黹";


	$filetablename='booksset';
	$parse_filename = 'booksset_department';

	require_once('include.inc.php');


	?>