<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();


	if($_GET['action']=="add_default_data")		{
	page_css('�ɹ�');
	$�������� = $_POST['��������'];
	$�ɹ���ʶ = $_POST['�ɹ���ʶ'];
	$��׼�� = $_POST['��׼��'];
	$���� = $_POST['����'];
	$������ = $_POST['������'];
	$����ʱ�� = $_POST['����ʱ��'];
	if($��׼��!=""&&$����>0)					{
		//print_R($_POST);exit;
		for($i=1;$i<=$����;$i++)			{

			//�õ�ͼ����
			$sql = "select ͼ���� from booksset order by ��� desc limit 1";
			$rs = $db->Execute($sql);
			$ͼ���� = $rs->fields['ͼ����'];
			if($ͼ����!="")			{
				$ͼ����  = $ͼ����+1;
				$ͼ������ = $�ɹ���ʶ;//."".date("Ymd")
			}
			else	{
				$ͼ����1 = substr($ͼ����,0,10);
				//print $ͼ����1."<HR>$ͼ����";
				$ͼ����2 = substr($ͼ����,10,4);
				$ͼ����2 = $ͼ����2+10001;
				$ͼ����2 = substr($ͼ����2,1,strlen($ͼ����2));
				$ͼ����  = $ͼ����1.$ͼ����2;
				$ͼ������ = $�ɹ���ʶ;
			}


			$���� = returntablefield("booksset","ͼ������",$ͼ������,"����");
			$��� = $����*$����;
			//����̶�ͼ��������
			$sql = "insert into booksset
				(ͼ������,ͼ����,ͼ�����,��������,����״̬,������,����ʱ��,����,����,���)
				values('$ͼ������','$ͼ����','$ͼ�����','$��������','����δ����','$������','$����ʱ��','$����','1','$����');";
			$db->Execute($sql);

			//����̶�ͼ��ɹ��������
			$sql = "insert into bookssetin
				(ͼ������,ͼ����,��������,��׼��,��ע,������,����ʱ��,����,����,���)
				values('$ͼ������','$ͼ����','$��������','$��׼��','$��ע','$������','$����ʱ��','$����','1','$����');";
			$db->Execute($sql);
			//print $sql."<BR>";
		}
		//print_R($_POST);exit;
		print_infor("��Ĳ����Ѿ����!",$infor='trip',$return="location='booksset_newai.php?'",$indexto='booksset_newai.php',1);


		//Array ( [�ɹ���ʶ] => ̨ʽ���� [����] => 6 [��������] => �������� [��׼��_ID] => admin [��׼��] => ϵͳ����Ա [��ע] => [������] => admin [����ʱ��] => 2009-08-27 16:52:16 [submit] => ���� )
	}

	else			{
		$SYSTEM_SECOND = 1;
		print_infor("��׼��Ϊ�ջ�����С��1,���Ĳ���û��ִ�гɹ�!",$infor='�ò����°汾û�б�ʹ��',$return="location='booksset_newai.php'",$indexto='booksset_newai.php');
	}

	exit;
}




	$filetablename		=	'bookssetin';

	$parse_filename	=	'bookssetin';

	require_once('include.inc.php');

	?>