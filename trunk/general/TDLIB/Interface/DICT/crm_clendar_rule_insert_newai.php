<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();


	//���������˵�ʱ,�Ƿ���ʾKEY�ֶ�
	$SYSTEM_SELECT_MENU_SHOW_KEY = 1;

	$SYSTEM_ADD_SQL = " and ����='INSERT'";



	if($_GET['action2']=="��ʼ�������")										{
		page_css("��ʼ�������");
		//$PrivateTableArray2 = array("wygl","dict","edu","gb","school","asset","dorm","paikao","tiku","keyan","bukao","newedu","officeproduct","fixedasset","hrms","system","remote","tiku");
		$PrivateTableArray2 = array("wygl","edu","dorm","tiku","officeproduct","fixedasset","hrms");
		$PrivateTableArray3 = array("officeproduct","fixedasset");

		$MetaTables	= $db->MetaTables();
		$sql = "TRUNCATE TABLE crm_clendar_object";
		$db->Execute($sql);
		$sql = "TRUNCATE TABLE crm_clendar_objectdetail";
		$db->Execute($sql);
		for($i=0;$i<sizeof($MetaTables);$i++)					{
			$���� = $MetaTables[$i];

			//�õ���ע
			$sql	= "SHOW TABLE STATUS FROM $MYSQL_DB LIKE '".strtolower($����)."%'";
			$rs		= $db->CacheExecute(150,$sql);
			$Comment = $rs->fields['Comment'];
			//if($Comment=='')		$Comment = $����;

			//�õ���ṹ��Ϣ
			$MetaColumnNames	= $db->MetaColumnNames($����);
			$MetaColumnNames	= array_keys($MetaColumnNames);

			//ͬ������Ҫ�ĵı��ֶ�����
			$TablenameArray = explode('_',$����);
			////||substr($Tablename,0,5)=="books"
			if((in_array($TablenameArray[0],$PrivateTableArray2)||
				substr($����,0,13)=="officeproduct"||
				substr($����,0,10)=="fixedasset"||
				substr($����,0,4)=="hrms")
				&&$Comment!=''
				&&sizeof($MetaColumnNames)>3
				)												{



				//ͬ������������
				$sql = "select COUNT(*) AS NUM from crm_clendar_object where ����='$����'";
				$rs = $db->Execute($sql);
				$NUM = $rs->fields['NUM'];
				if($NUM==0)				{
					$sql = "insert into crm_clendar_object values('','$����','$Comment');";
					$db->Execute($sql);
				}


				for($ix=0;$ix<sizeof($MetaColumnNames);$ix++)		{
					$�ֶ��� = $MetaColumnNames[$ix];
					$sql = "select COUNT(*) AS NUM from crm_clendar_objectdetail where ����='$����' and �ֶ�='$�ֶ���'";
					$rs = $db->Execute($sql);
					$NUM = $rs->fields['NUM'];
					if($NUM==0)				{
						$sql = "insert into crm_clendar_objectdetail values('','$����','$�ֶ���');";
						$db->Execute($sql);
					}
				}
			}////||substr($Tablename,0,5)=="books"

		}//end for
		print_infor('���Ĳ������ɹ�,�����Բ���ʹ����������','',"location='?'","?");
		exit;
	}

	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);exit;
		global $db;
		$_POST['����'] = "INSERT";
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}




	if($_GET['action']==''||$_GET['action']=='init_default')		{
		//print_R($_SESSION);
		$�����ı� = "�������ݴ�������";
		$�����ı� = "add_default";
		$�������� = "��������";
		$�������� = explode(',',$�����ı�);;
		$�������� = explode(',',$�����ı�);;
		$����_lin .= "";
		for($i=0;$i<sizeof($��������);$i++)
		{
			$�������� = $��������[$i];
			$����_lin .= "&nbsp;<a href='?".base64_encode("XX=XX&action=".$��������[$i]."&$��������=".$��������."&XX=XX")."'>$��������</a>";
		}
		//���δ�趨,ָΪȫ���༶
		if($_GET[$��������]=="")		{
			$_GET[$��������] = $��������[0];
		}
		else	{
		}
		$PrintText .= "<table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableData><td ><font color=green >
		�����ֶ�ѡ�񴥷�����:".$����_lin."
		</font></td></table><BR>";
		print $PrintText;
	}


	//���ݱ�ģ���ļ�,��ӦModelĿ¼�����crm_clendar_rule_newai.ini�ļ�
	//�������Ҫ���ƴ�ģ��,����Ҫ�޸�$parse_filename������ֵ,Ȼ���Ӧ��ModelĿ¼ ���ļ���_newai.ini�ļ�
	$filetablename		=	'crm_clendar_rule';
	$parse_filename		=	'crm_clendar_rule_insert';
	require_once('include.inc.php');


require_once('../Help/module_message.php');

if($_GET['action']==''||$_GET['action']=='init_default')		{
	//print_R($_GET);
	print "<BR><FORM name=form1 action=\"?action=DataDealDelte&pageid=1\" method=post encType=multipart/form-data>";
	print "<table class=TableBlock width=100%>";
	print "<tr class=TableContent><td><input type=button class=BigButton name='��ʼ�������' onClick=\"location='?".base64_encode("xx=xx&ѧ������=".$_GET['ѧ������']."&action2=��ʼ�������&xx=xx")."'\" value='��ʼ�������'><font color=green>&nbsp;��ʼ����������˼����������ݿ��ִ�ı���ֶ���Ϣ���뵽���ݶ�������ݱ���ȥ,�������½���Ϣ���ѹ���ʱ�Ϳ��Եõ���صı���ֶε���Ϣ.</font></td></tr>";

	print "</table>";
	print "</FORM>";
}

?>