<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("���ڹ���-�칫��Ʒ-������ϸ");


//Array ( [action] => add_default2_data [pageid] => 1 ) Array ( [�칫��Ʒ����] => ���ɻ�����˼��������� [�칫��Ʒ���] => 100002 [�����ֿ�] => һ�Ųֿ� [����ֿ�] => һ�Ųֿ� [��������] => 1 [������] => ������ [��ע] => [������] => admin [����ʱ��] => 2009-06-14 11:19:11 [submit] => ���� )

if($_GET['action']=="add_default_data")		{
	page_css('����');
	$�칫��Ʒ���� = $_POST['�칫��Ʒ����'];
	$�칫��Ʒ��� = $_POST['�칫��Ʒ���'];
	$�����ֿ� = $_POST['�����ֿ�'];
	$����ֿ� = $_POST['����ֿ�'];
	$�������� = $_POST['��������'];
	$������ = $_POST['������'];
	$��ע = $_POST['��ע'];
	$������ = $_POST['������'];
	$����ʱ�� = $_POST['����ʱ��'];
	if($�����ֿ�==$����ֿ�)		{
		$Infor = "����͵����ֿⲻ��Ϊͬһ�ֿ�!";
		print_nouploadfile($Infor);
		exit;
	}
	if($��������<1)		{
		$Infor = "���������������0!";
		print_nouploadfile($Infor);
		exit;
	}

	if($_POST['��׼��']!="")	{
		$_POST['����'] = returntablefield("officeproduct","�칫��Ʒ���",$�칫��Ʒ���,"����");
		$_POST['����'] = $_POST['��������'];
		$_POST['���'] = $_POST['����']*$_POST['����'];
		//print $sql."<BR>";exit;
		$���� = $_POST['����'];
		$���� = $_POST['����'];
		$��� = $_POST['���'];
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("��׼��Ϊ�ջ�������������Ϊ��,���Ĳ���û��ִ�гɹ�!",$infor='�ò����°汾û�б�ʹ��',$return="location='officeproduct_newai.php'",$indexto='officeproduct_newai.php');
		exit;
	}

	//print_R($_GET);
	//print_R($_POST);
	/*
out
  ��� int(100)   ��  auto_increment
  �칫��Ʒ���� varchar(200) gbk_chinese_ci  ��
  �칫��Ʒ��� varchar(200) gbk_chinese_ci  ��
  ����ֿ� varchar(200) gbk_chinese_ci  ��
  �������� int(10)   �� 0
  ������� varchar(200) gbk_chinese_ci  ��
  �������� varchar(200) gbk_chinese_ci  ��
  ������ varchar(200) gbk_chinese_ci  ��
  ��׼�� varchar(200) gbk_chinese_ci  ��
  ��ע varchar(255) gbk_chinese_ci  ��
  ������ varchar(200) gbk_chinese_ci  ��
  ����ʱ��

in
  �칫��Ʒ���� varchar(200) gbk_chinese_ci  ��
  �칫��Ʒ��� varchar(200) gbk_chinese_ci  ��
  ���ֿ� varchar(200) gbk_chinese_ci  ��
  ������� int(10)   �� 0
  ������ varchar(200) gbk_chinese_ci  ��
  ��׼�� varchar(200) gbk_chinese_ci  ��
  ��ע varchar(255) gbk_chinese_ci  ��
  ������ varchar(200) gbk_chinese_ci  ��
  ����ʱ��

	*/

	//�γɵ����ֿ���ⵥ��
	$sql = "insert into officeproductout values('','$�칫��Ʒ����','$�칫��Ʒ���','$�����ֿ�','$����','$�������','����','$������','$��׼��','ϵͳ���еĲֿ�����','$������','$����ʱ��','$����','$����','$���');";
	$db->Execute($sql);
	//�γɵ���ֿ���ⵥ��
	$sql = "insert into officeproductin values('','$�칫��Ʒ����','$�칫��Ʒ���','$����ֿ�','$����','$������','$��׼��','ϵͳ���еĲֿ�����','$������','$����ʱ��','$����','$����','$���');";
	$db->Execute($sql);
	//exit;
}


$filetablename='officeproducttiaoku';
require_once('include.inc.php');
?>