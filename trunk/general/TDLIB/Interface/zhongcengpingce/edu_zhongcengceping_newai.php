<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-�ɲ�����-������Ŀ����");


	if($_GET['action']=="add_default_data"||$_GET['action']=="edit_default_data")				{

		//print_R($_GET);print_R($_POST);//exit;
		//��ʼ����Ա��Ϣ
		$��������Ա
 = $_POST['��������Ա'];
		$�������� = $_POST['��������'];
		$��������ԱArray = explode(',',$��������Ա);
		/*
		DROP TABLE IF EXISTS `edu_zhongcengrenyuan`;
		CREATE TABLE IF NOT EXISTS `edu_zhongcengrenyuan` (
		  `���` int(33) NOT NULL auto_increment,
		  `��������` varchar(200) NOT NULL default '',
		  `������Ա` varchar(200) NOT NULL default '',
		  `��λ` varchar(200) NOT NULL default '',
		  `ְ��` varchar(200) NOT NULL default '',
		  `Ʒ������` mediumtext NOT NULL default '',
		  `Ʒ������` mediumtext NOT NULL default '',
		  `��������` mediumtext NOT NULL default '',
		  `��������` mediumtext NOT NULL default '',
		  `�ڷ�����` mediumtext NOT NULL default '',
		  `�ڷ�����` mediumtext NOT NULL default '',
		  `��Ч����` mediumtext NOT NULL default '',
		  `��Ч����` mediumtext NOT NULL default '',
		  `��������` mediumtext NOT NULL default '',
		  `��������` mediumtext NOT NULL default '',
		  PRIMARY KEY  (`���`)
		) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='�в�ɲ�������Ա��ϸ' AUTO_INCREMENT=1 ;

		*/		//�����н�ʦ����
		$sql = "select * from edu_zhongcengrenyuan where ��������='$��������'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		$�����н�ʦ���� = array();
		for($i=0;$i<sizeof($rs_a);$i++)		{
			$�����н�ʦ����[] = $rs_a[$i]['������Ա'];
		}
		//�����ӵ�����
		$�����ӵ���Ա���� = $��������ԱArray;
		for($i=0;$i<sizeof($�����ӵ���Ա����);$i++)		{
			$������������Ա = $�����ӵ���Ա����[$i];
		}
		$ԭ�������в����ڲ��� = @array_diff($�����н�ʦ����,$�����ӵ���Ա����);
		$ԭ�������в����ڲ��� = @array_values($ԭ�������в����ڲ���);
		//print_R($�����н�ʦ����);
		//print_R($�����ӵ���Ա����);
		//print_R($ԭ�������в����ڲ���);

		//ɾ������ȥ������Ա
		for($i=0;$i<sizeof($ԭ�������в����ڲ���);$i++)		{
			$��ȥ����Ա = $ԭ�������в����ڲ���[$i];
			$sql = "delete from edu_zhongcengrenyuan where  ��������='$��������' and ������Ա='$��ȥ����Ա'";
			$rs = $db->Execute($sql);;
			//print $sql;
		}

		//���������ӵ���Ա
		for($i=0;$i<sizeof($�����ӵ���Ա����);$i++)		{
			$������Ա = $�����ӵ���Ա����[$i];
			$sql = "select * from edu_zhongcengrenyuan where  ��������='$��������' and ������Ա='$������Ա'";
			$rs = $db->Execute($sql);;
			if($rs->RecordCount()==0&&$������Ա!='')		{
				$DEPT_ID = returntablefield("user","USER_NAME",$������Ա,"DEPT_ID");
				$USER_PRIV = returntablefield("user","USER_NAME",$������Ա,"USER_PRIV");
				$��λ = returntablefield("department","DEPT_ID",$DEPT_ID,"DEPT_NAME");
				$ְ�� = returntablefield("user_priv","USER_PRIV",$USER_PRIV,"PRIV_NAME");
				$sql = "insert into edu_zhongcengrenyuan(��������,������Ա,��λ,ְ��) values('$��������','$������Ա','$��λ','$ְ��');";
				$db->Execute($sql);
				//print $sql."<BR>";
			}
		}
		//exit;
		//global $db;

		$�Ƿ���Ч = $_POST['�Ƿ���Ч'];
		if($�Ƿ���Ч==1)		{
			$sql = "update edu_zhongcengceping set �Ƿ���Ч='0'";
			$db->Execute($sql);
		}

		//$�̲ı�� = $_POST['�̲ı��'];

		//$sql = "update edu_jiaocai set ���п��=���п��+$������� where �̲ı��='".$�̲ı��."'";

		//$rs = $db->Execute($sql);

		//print $sql;exit;

		//$_POST['������'] = returntablefield("edu_jiaocai","�̲ı��",$�̲ı��,"������");

		//$_POST['������'] = returntablefield("edu_jiaocai","�̲ı��",$�̲ı��,"������");

	}








	$filetablename='edu_zhongcengceping';

	require_once('include.inc.php');


	?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>