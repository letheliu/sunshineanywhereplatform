<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	//print_r($_POST);exit;

	if($_GET['action']=="view_default"){
	   header( "Location:   xiaoshoudingdan.php?���=".$_GET['���']."");
	}



	//�½�ʱ�������۶���ҳ��
	if($_GET['action']=="add_default")	
	{
		//print_R($_GET);print_R($_POST);//exit;
		//header( "Location:   xiaoshoudingdan.php");
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=xiaoshoudingdan.php'>";
		include('xiaoshoudingdan.php');
		exit;
	}


	//�ύ������ݲ���
	if($_GET['action'] == "submit")
	{
						print_r($_POST);
		$��� = "";
		$������� = $_POST['tablecode'];
		$�������� = $_POST['tabledate'];
		$�ͻ� = $_POST['�ͻ�����'];

		$��������˰ = $_POST['amt'];
		$��������˰ = $_POST['stockid'];
/*
		[stockid] => 1
		[factpayamt] => -1.00
		[intype] => 1
		[payamt] => 5.00 
		[stockinsign] => 3
		[rebate] => 2 
		[buyman] => ϵͳ����Ա 
		[sendDate] => 2011-03-10
		[payment] => 46 
		[sellfrom] => 1
		[customerPO] => 4 
		[orderamt] => 5.00
		[datascope] => 0
		[sendAmt] => 6.00 
		[subAmt] => 7.00 
		[a_count] => 19 
		[Add_fieldName] 
		*/
//(`���`, `�������`, `��������`, `�ͻ�`, `���۲���`, `��������˰`, `������˰`, `�ƻ�����`, `���տ����`, `��Ŀ`, `��ע`, `����ҵ��Ա`, `Ԥ���ͻ�����`, `�տʽ`, `������Դ`, `�Ͷ�����`, `������Դ`, `Ԥ�ն���`, `�տ�ʱ��`, `��������`, `�ֿ۽��`) 
			//print '11';
			exit;
	}


	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);//exit;
		header( "Location:   xiaoshoudingdan.php?���=".$_GET['���']."");
		//include_once('���۶�������.htm');
		//exit;


		}

/*
		if($_GET['action']=="add_default_date")		{
			if($_GET['action'] == "submit")
			{
			//print_r($_POST);
			print '11';
			exit;
			}

			exit;
		}

*/
		




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
	*/

	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����crm_order2_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'crm_order2';
	$parse_filename		=	'crm_order2';
	require_once('include.inc.php');
	?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>