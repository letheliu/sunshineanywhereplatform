<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

//print_R($_GET);
page_css("ϵͳ����");
if($_SESSION['LOGIN_USER_ID']!="admin")			{
	print_infor("��ԽȨ��!",'',"window.close();");;
	exit;
}


$common_html=returnsystemlang('common_html');

$FileIniname	= $_GET['FileIniname'];
$Tablename		= $_GET['Tablename'];
$action			= $_GET['action'];
$FileDirName	= $_GET['FileDirName'];
$GOBACKFILENAME	= $_GET['GOBACKFILENAME'];

$SHOW_STOP		= 0;

//������Խ����Զ�����ֶ�����
$������Խ����Զ�����ֶ����� =
				array("input","textarea","boolean","money","number","userdefine","tablefilter","tablefiltercolor","");
if($action=="add_default"||$action=="edit_default")
		$������Խ����Զ�����ֶ����� =
				array("input","textarea","boolean","money","number","","","","");

$Columns=returntablecolumn($Tablename);
$html_etc=returnsystemlang($Tablename);

$filepath_system= "../$FileDirName/Model/".$FileIniname."_newai.ini";
$file_ini		= @parse_ini_file($filepath_system,true);
$file_ini		= $file_ini[$action];

$showlistfieldlistArray		= explode(',',$file_ini['showlistfieldlist']);
$showlistnullArray			= explode(',',$file_ini['showlistnull']);
$showlistfieldfilterArray	= explode(',',$file_ini['showlistfieldfilter']);


//print_R($file_ini);
//print_R($_GET);
if($_GET['action2']=="�ָ���ʼ��״̬")			{

	//print_R($_POST);exit;
	//�õ��û��Զ��������
	$sql	= "delete from  systemprivateconfig
			where Ŀ¼='$FileDirName' and ��='$Tablename' and ����='$FileIniname' and ��ͼ='$action'";
	$rs		= $db->Execute($sql);
	$actionURL = "?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."";
	print_infor("���Ѿ������ǰģ��������Ϣ.","","location='$actionURL'",$actionURL);
	exit;
}


if($_GET['actionconfig']=="config_data")			{

	//print_R($_POST);exit;
	//�õ��û��Զ��������
	$sql	= "select �ֶ�,���� from systemprivateconfig
			where Ŀ¼='$FileDirName' and ��='$Tablename' and ����='$FileIniname' and ��ͼ='$action'";
	$rs		= $db->Execute($sql);
	$rs_a	= $rs->GetArray();
	$�����ֶ�	= $rs_a[0]['�ֶ�'];
	$������Ϣ	= $rs_a[0]['����'];
	$action		= $_GET['action'];
	$NewArray	= array();
	for($i=0;$i<sizeof($showlistfieldlistArray);$i++)			{
		$FieldIndex  = $showlistfieldlistArray[$i];
		$FieldNULL	 = strtolower($showlistnullArray[$i]);
		$FieldFilterArray = explode(':',$showlistfieldfilterArray[$i]);
		$FieldFilter = $FieldFilterArray[0];
		$�ֶ����� = $Columns[$FieldIndex];
		$�ֶ����� = $html_etc[$Tablename][$�ֶ�����];
		$�ֶ����� = $showlistfieldfilterArray[$i];
		if($action=="add_default"||$action=="edit_default")		{
			if($FieldNULL=="notnull")	$SHOW_STOP = 1;
			else						$SHOW_STOP = 0;
		}

		if(in_array($FieldFilter,$������Խ����Զ�����ֶ�����)&&$SHOW_STOP==0)	{
			if(($FieldFilter=="tablefilter"||$FieldFilter=="tablefiltercolor"))	{
				$PRINT_MODE = "SYSTEM";
				//&&$_GET[$�ֶ�����]!=""
				//$PRINT_MODE = "CONFIG";
			}
			else	{
				$PRINT_MODE = "CONFIG";
			}
		}
		else		{
			$PRINT_MODE = "SYSTEM";
		}

		if($PRINT_MODE == "CONFIG")		{
			//print '�Զ����ֶ�_'.$FieldIndex;�Զ����ֶ�,�������û������Ƿ������ʾ
			$�Զ����ֶε�ֵ = $_POST['�Զ����ֶ�_'.$FieldIndex];
			if($�Զ����ֶε�ֵ=="on")		{
				$NewArray[$i] = $FieldIndex;
			}
			else		{
				//����ʾ�ֶ�
			}
		}
		else	{
			//SYSTEM�ֶ�,һ��Ҫ��ʾ
			$NewArray[$i] = $FieldIndex;
		}
	}

	//�������ʵ��ʾ���ֶν����Զ����������
	$action_orderindex = $_POST['action_orderindex'];
	//��������Ϣ��������,�õ���ֵ���Ѿ��źõ�,�õ���KEYSֵ�Ƕ�Ӧ�ֶε�����
	@asort($action_orderindex);
	$action_orderindex_KEYS = array_keys($action_orderindex);
	//print_R($action_orderindex);
	$NewArrayNEW = array();
	for($i=0;$i<sizeof($action_orderindex_KEYS);$i++)			{
		$����ֵ  = $action_orderindex_KEYS[$i];
		if($NewArray[$����ֵ]!="")		{
			$NewArrayNEW[] = $NewArray[$����ֵ];
		}
	}
	$�����ֶ� = join(',',$NewArrayNEW);
	//print $�����ֶ�;exit;
	//����������Ϣ
	$���� = array();
	if($_POST['ÿҳ��ʾ��¼����']!="")			{
		$����['ÿҳ��ʾ��¼����'] = $_POST['ÿҳ��ʾ��¼����'];
	}
	if(sizeof($_POST['action_model'])>0)			{
		$����['action_model'] = join(',',$_POST['action_model']);;
	}
	if(sizeof($_POST['row_element'])>0)			{
		$����['row_element'] = join(',',$_POST['row_element']);;
	}
	if(sizeof($_POST['bottom_element'])>0)			{
		$����['bottom_element'] = join(',',$_POST['bottom_element']);;
	}
	if($_POST['�����ֶ�0']!='')			{
		for($i=0;$i<5;$i++)				{
			$�����ֶ� = "�����ֶ�".$i;
			$����ʽ = "����ʽ".$i;
			if($_POST[$�����ֶ�]!="")	{
				$ϵͳ������������Array[] .= $_POST[$�����ֶ�].":".$_POST[$����ʽ];
			}
		}
		$ϵͳ������������ = join(',',$ϵͳ������������Array);
		$����['systemorder'] = $ϵͳ������������;
	}

	if(sizeof($_POST['action_search'])>0)			{
		$����['action_search'] = join(',',$_POST['action_search']);;
	}

	//print_R($����);exit;





	$������Ϣ = serialize($����);

	if($�����ֶ�=="")		{
		$sql = "insert into systemprivateconfig values('','$FileDirName','$Tablename','$FileIniname','$action','$�����ֶ�','$������Ϣ','".$_SESSION['LOGIN_USER_ID']."','".date("Y-m-d H:i:s")."');";
	}
	else	{
		$sql = "update systemprivateconfig
					set �ֶ�='$�����ֶ�',����='$������Ϣ'
				where
					Ŀ¼='$FileDirName'
					and ��='$Tablename'
					and ����='$FileIniname'
					and ��ͼ='$action'
				";
	}
	$rs = $db->Execute($sql);
	//print_R($_GET);print_R($_POST);print_R($NewArray);
	//print $sql;
	$actionURL = "../$FileDirName/$GOBACKFILENAME";
	print_infor("��������Ѿ����,�뷵��[ϵͳ���������150�����Ч].","","location='$actionURL'",$actionURL);
	exit;
}

/*
DROP TABLE IF EXISTS `systemprivateconfig`;
CREATE TABLE IF NOT EXISTS `systemprivateconfig` (
  `���` int(44) NOT NULL auto_increment,
  `Ŀ¼` varchar(200) NOT NULL default '',
  `��` varchar(200) NOT NULL default '',
  `����` varchar(200) NOT NULL default '',
  `��ͼ` varchar(200) NOT NULL default '',
  `�ֶ�` varchar(200) NOT NULL default '',
  `����` varchar(200) NOT NULL default '',
  `������` varchar(200) NOT NULL default '',
  `����ʱ��` datetime,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 comment='�û��Զ������' ;

*/

if($_GET['actionconfig']=="config")			{

	//�õ��û��Զ��������
	$sql = "select �ֶ�,���� from systemprivateconfig
			where Ŀ¼='$FileDirName' and ��='$Tablename' and ����='$FileIniname' and ��ͼ='$action'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$�����ֶ� = $rs_a[0]['�ֶ�'];
	$���� = $rs_a[0]['����'];
	$������Ϣ = unserialize($����);
	//û��ʱȫ����ʾ
	if($�����ֶ�=='')				{
		$�����ֶ� = $file_ini['showlistfieldlist'];
		$������ϢTEXT = "<font color=gray>����״̬:��ģ�鲻����������Ϣ</font>";
	}
	else	{
		//�Ѿ���������Ϣ
		$������ϢTEXT = "<font color=green>��ģ���Ѿ�����������Ϣ,</font><a href=\"javascript:if(confirm('�������Ҫ�ָ���ʼ��״̬��'))location='?".base64_encode("XX=XX&action2=�ָ���ʼ��״̬&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."'\" title='�����Ե�ǰģ������������Ϣ������,�����������,�ָ���ʼ��״̬'>����ָ���ʼ��״̬</a>";
	}
	$�����ֶ�Array = explode(',',$�����ֶ�);



	//Array ( [XX] => XX [action] => init_default [Tablename] => edu_jiaocai [FileIniname] => edu_jiaocai [FileDirName] => EDU [actionconfig] => config [pageid] => 1 )
	$actionURL = "XX=XX&actionconfig=config_data&action=$action&Tablename=$Tablename&FileIniname=$FileIniname&FileDirName=$FileDirName&GOBACKFILENAME=$GOBACKFILENAME";
	form_begin("form1",$actionURL);
	table_begin("700");
	print "<tr class=TableContent><td colspan=5>&nbsp;
	��ʼ���õ�ǰҳ��Ҫ��ʾ���ֶ���Ϣ $������ϢTEXT
	<input type=Button class=SmallButton value='�޸Ľ�������'
	onClick=\"location='systemlang.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&ACTION_NAME=html_etc&XX=XX")."'\">

	<input type=Button class=SmallButton value='����������'
	onClick=\"location='../".$_GET['FileDirName']."/".$_GET['GOBACKFILENAME']."?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&ACTION_NAME=html_etc&XX=XX")."'\">
	</td></tr>";

	print "<tr class=Tableheader><td colspan=5>&nbsp;����:$Tablename ����:$FileIniname ��ͼ:$action
	</td></tr>";
	if($action=="init_default"||$action=="init_customer"||$action=="init_default2")		{




		//$������Դ = explode(',',"add_default:new:n,export_default:export:x,import_default:import:i");;
		$action_model = $file_ini['action_model'];
		if($����!="")
			$ʵ������ = $������Ϣ['action_model'];
		else
			$ʵ������ = $action_model;
		$ʵ������Array = explode(',',$ʵ������);
		$������Դ = explode(',',$action_model);
		if($������Դ[0]!="")	$SHOWTEXT .= "&nbsp;����������������:";
		for($i=0;$i<sizeof($������Դ);$i++)			{
			if(@in_array($������Դ[$i],$ʵ������Array))	{
				$checked = "checked";
			}
			else	{
				$checked = "";
			}
			$�������� = explode(':',$������Դ[$i]);
			$�������� = $��������[1];

			if($������Դ[$i]!="")	$SHOWTEXT .= "<input name='action_model[]' type=checkbox value='".$������Դ[$i]."' $checked>".$common_html['common_html'][$��������]." ";
		}
		if($������Դ[0]!="")	$SHOWTEXT .= "<BR>";


		//$������Դ = explode(',',"view:view_default,edit:edit_default,delete:delete_array");;
		$row_element = $file_ini['row_element'];
		if($����!="")
			$ʵ������ = $������Ϣ['row_element'];
		else
			$ʵ������ = $row_element;
		$ʵ������Array = explode(',',$ʵ������);
		$������Դ = explode(',',$row_element);
		if($������Դ[0]!="")	$SHOWTEXT .= "&nbsp;ÿ�м�¼��������:";
		for($i=0;$i<sizeof($������Դ);$i++)			{
			if(@in_array($������Դ[$i],$ʵ������Array))	{
				$checked = "checked";
			}
			else	{
				$checked = "";
			}
			$�������� = explode(':',$������Դ[$i]);
			$�������� = $��������[0];

			if($������Դ[$i]!="")	$SHOWTEXT .= "<input name='row_element[]' type=checkbox value='".$������Դ[$i]."' $checked>".$common_html['common_html'][$��������]." ";
		}
		if($������Դ[0]!="")	$SHOWTEXT .= "<BR>";

		//$������Դ = explode(',',"view:view_default,edit:edit_default,delete:delete_array");;
		$bottom_element = $file_ini['bottom_element'];
		if($����!="")
			$ʵ������ = $������Ϣ['bottom_element'];
		else
			$ʵ������ = $bottom_element;
		$ʵ������Array = explode(',',$ʵ������);
		$������Դ = explode(',',$bottom_element);
		if($������Դ[0]!="")	$SHOWTEXT .= "&nbsp;ÿ�м�¼��������:";
		for($i=0;$i<sizeof($������Դ);$i++)			{
			if(@in_array($������Դ[$i],$ʵ������Array))	{
				$checked = "checked";
			}
			else	{
				$checked = "";
			}
			$�������� = explode(':',$������Դ[$i]);
			if($��������[0]=="operation")	$�������� = $��������[1];
			else	$�������� = $��������[0];

			if($������Դ[$i]!="")	$SHOWTEXT .= "<input name='bottom_element[]' type=checkbox value='".$������Դ[$i]."' $checked>".$common_html['common_html'][$��������]." ";
		}
		if($������Դ[0]!="")	$SHOWTEXT .= "<BR>";

		//pagenums_model = 25
		$pagenums_model = $file_ini['pagenums_model'];
		if($pagenums_model=='')		$pagenums_model = 25;
		if($������Ϣ['ÿҳ��ʾ��¼����']!="")
			$ÿҳ��ʾ��¼���� = $������Ϣ['ÿҳ��ʾ��¼����'];
		else
			$ÿҳ��ʾ��¼���� = $pagenums_model;
		$SHOWTEXT .= "&nbsp;ÿҳ��ʾ��¼����:<input type=input name=ÿҳ��ʾ��¼���� value='$ÿҳ��ʾ��¼����' class=SmallInput size=4><BR>";

		//systemorder = 4:desc,3:desc
		$systemorder = $file_ini['systemorder'];
		if($systemorder=="")	$systemorder = "0:desc";
		if($������Ϣ['systemorder']!="")
			$ϵͳ������������ = $������Ϣ['systemorder'];
		else
			$ϵͳ������������ = $systemorder;
		if($ϵͳ������������!="")				{
			$SHOWTEXT .= "&nbsp;ϵͳ������������:";
			$ϵͳ������������Array = explode(',',$ϵͳ������������);
			for($i=0;$i<sizeof($ϵͳ������������Array);$i++)		{
				$ϵͳ������������TEXT = $ϵͳ������������Array[$i];
				$ϵͳ������������TEXTArray = explode(':',$ϵͳ������������TEXT);
				$SHOWTEXT .= "<select name=�����ֶ�".$i.">";
				for($iD=0;$iD<sizeof($Columns);$iD++)		{
					$�ֶ����� = $Columns[$iD];
					if($iD==$ϵͳ������������TEXTArray[0])	{
						$Selected = "selected";
					}
					else	{
						$Selected = "";
					}
					$SHOWTEXT .= "<option value='$iD' $Selected>[$iD]".$�ֶ�����."</option>";
				}
				$SHOWTEXT .= "</select>";
				$SHOWTEXT .= "<select name=����ʽ".$i.">";
				$����ʽArray = array("desc","asc");
				for($iD=0;$iD<sizeof($����ʽArray);$iD++)		{
					$�ֶ����� = $����ʽArray[$iD];
					if($�ֶ�����==$ϵͳ������������TEXTArray[1])	{
						$Selected = "selected";
					}
					else	{
						$Selected = "";
					}
					$SHOWTEXT .= "<option value='$�ֶ�����' $Selected>$�ֶ�����</option>";
				}
				$SHOWTEXT .= "</select>&nbsp;&nbsp;&nbsp;&nbsp;";
			}
		}

		//systemorder = 4:desc,3:desc
		$action_search = $file_ini['action_search'];
		if($������Ϣ['action_search']!="")
			$�б������������� = $������Ϣ['action_search'];
		else
			$�б������������� = $action_search;
		$����HEADER = "<td>&nbsp;����</td>";


		print "<tr class=TableData><td colspan=5>
		$SHOWTEXT
		</td></tr>";
	}

	print "<tr class=Tableheader>
	<td>&nbsp;�ֶ�����</td>
	<td>&nbsp;�ֶ�����</td>
	$����HEADER
	<td>&nbsp;����</td>
	<td>&nbsp;�ֶ�����(�����Ƿ���ʾ)</td>
	</tr>";

	for($i=0;$i<sizeof($showlistfieldlistArray);$i++)			{
		$FieldIndex  = $showlistfieldlistArray[$i];
		$FieldNULL	 = strtolower($showlistnullArray[$i]);
		$FieldFilterArray = explode(':',$showlistfieldfilterArray[$i]);
		$FieldFilter = $FieldFilterArray[0];
		$�ֶ����� = $Columns[$FieldIndex];
		$�ֶ����� = $html_etc[$Tablename][$�ֶ�����];
		$�ֶ����� = $showlistfieldfilterArray[$i];
		if($action=="add_default"||$action=="edit_default")		{
			if($FieldNULL=="notnull")	$SHOW_STOP = 1;
			else						$SHOW_STOP = 0;
			$�ǿ���ʾ = "�ǿ�";
		}
		else	{
			//���б���ǲ鿴ҳ��,����Ҫʹ�÷ǿ�����
			$�ǿ���ʾ = "";
		}
		if(in_array($FieldFilter,$������Խ����Զ�����ֶ�����)&&$SHOW_STOP==0)	{
			if(($FieldFilter=="tablefilter"||$FieldFilter=="tablefiltercolor"))	{
				$PRINT_MODE = "SYSTEM";
				//&&$_GET[$�ֶ�����]!=""
				//$PRINT_MODE = "CONFIG";
			}
			else	{
				$PRINT_MODE = "CONFIG";
			}
		}
		else		{
			$PRINT_MODE = "SYSTEM";
		}

	if($action=="init_default"||$action=="init_customer"||$action=="init_default2")		{
		$�б�������������Array = explode(',',$�б�������������);
		if(in_array($FieldIndex,$�б�������������Array))	{
			$���� = "<td>&nbsp;<input name='action_search[]' type=checkbox value='".$FieldIndex."' checked></td>
					";
		}
		else	{
			$���� = "<td>&nbsp;<input name='action_search[]' type=checkbox value='".$FieldIndex."' ></td>";
		}


	}

	//�õ��������ֵ
	$�����ֶ�Array���� = array_flip($�����ֶ�Array);
	$������ֵ = $�����ֶ�Array����[$FieldIndex];
	$������ֵTEXT = "<td>&nbsp;<input name='action_orderindex[]' type=input size=3 class=SmallInput value='".$������ֵ."' checked></td>";

		if($PRINT_MODE == "CONFIG")							{
			if(in_array($FieldIndex,$�����ֶ�Array))		{
				$checkbox = "checked";
			}
			else		{
				$checkbox = "";
			}
			print "<tr class=TableData>
			<td>&nbsp;".($i+1)." $�ֶ�����</td>
			<td>&nbsp;$�ֶ�����</td>
			$���� $������ֵTEXT
			<td>&nbsp;<input type=checkbox $checkbox name=�Զ����ֶ�_".$FieldIndex.">
			�Ƿ������ʾ
			����:$FieldFilter
			</td>
			</tr>";
		}
		else	{
			print "<tr class=TableData>
			<td>&nbsp;".($i+1)." $�ֶ�����</td>
			<td>&nbsp;$�ֶ�����</td>
			$���� $������ֵTEXT
			<td title='ϵͳʹ���ֶβ��ܽ����Զ�����ʾ'>&nbsp;<font color=gray>ϵͳʹ���ֶ� ����:$FieldFilter $�ǿ���ʾ</font></td>
			</tr>";
		}
	}
	print_submit("�ύ",5);
	print "<tr class=TableData><td colspan=5>&nbsp;���ݱ����Ժ�,ϵͳ����150���Ժ������Ч[ϵͳ�����������150��].
	</td></tr>";
	table_end();
	form_end();

}

//print_R($_GET);
?>