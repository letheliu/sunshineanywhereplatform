<?
	require_once('lib.inc.php');//

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-��������-���ż�����");

	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	if($_GET['ѧ��']=="") $_GET['ѧ��'] = $��ǰѧ��;

	//��ι��˲���,����ֶα�����Ϊ���ط�������--��ʼ
	$LOGIN_USER_NAME = $_SESSION['LOGIN_USER_NAME'];
	$sql	= "select ������� from edu_xingzheng_banci where ��ι���һ='$LOGIN_USER_NAME' or ��ι�����='$LOGIN_USER_NAME'";
	$rs		= $db->CacheExecute(150,$sql);
	$rs_a	= $rs->GetArray();
	$������� = array();
	for($i=0;$i<sizeof($rs_a);$i++)						{
		$Element = $rs_a[$i];
		$�������[]  = $Element['�������'];
	}
	$�������TEXT = join(',',$�������);
	if($�������TEXT=="")	$�������TEXT = "û���������İ����Ϣ";
	$_GET['���'] = $�������TEXT;
	//��ι��˲���,����ֶα�����Ϊ���ط�������--����



	���ӶԲ�ѯ���ڿ�ݷ�ʽ��֧��("����");


	$filetablename='edu_xingzheng_kaoqinmingxi';
	$parse_filename = 'my_bumen_xingzheng_kaoqinmingxi';

	require_once('include.inc.php');




	//������˵��ע��
	require_once("../Help/module_xingzhengdepartment.php");
	?>