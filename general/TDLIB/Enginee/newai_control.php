<?
//�ж��Ƿ�ΪBASE64����
$isBase64 = isBase64();
//����_GET����ת��
$isBase64==1?CheckBase64():'';
//print $isBase64;exit;
//print $isBase64;print_R($_GET);exit;
$IE_TITLE==""?$IE_TITLE="ͨ�����ֻ�У԰":'';
$array_index=array_keys($file_ini);

//print $SYSTEM_PRIV_STOP;exit;
//������$SYSTEM_PRIV_STOPΪ1ʱ�����е�¼�ж�
if($SYSTEM_PRIV_STOP!="1"&&$SYSTEM_TABLE_VISION_MODE!="1")		{

	$GLOBAL_SESSION=returnsession();
}

$ExecTimeBegin=getmicrotime();



$html_etc=returnsystemlang($filetablename,$SYTEM_CONFIG_TABLE);

$SYTEM_CONFIG_TABLE!=""?$filetablename=$SYTEM_CONFIG_TABLE:'';

$columns=returntablecolumn($filetablename);//print_R($columns);

$common_html=returnsystemlang('common_html');//print_R($common_html);

//SYSTEM_PRIV_CONTROL();

$init=explode('_',$_GET['action']);
if($_GET['action']==''||$_GET['action']=='init')		{
	$_GET['action']='init_default';
}

$action=$_GET['action'];
$action_array = explode('_',$action);
$action_type = $action_array[0];
$mark = $action_array[1];
$action_check = $action_array[0]."_".$action_array[1];
array_push($array_index,'forward_default');
array_push($array_index,'reply_default');
array_push($array_index,'import_default');
array_push($array_index,'set_default');
array_push($array_index,'set_default_config');
array_push($array_index,'import_default');
array_push($array_index,'import_default_data');
array_push($array_index,'listtwo_worklog');

$in_array=in_array($action_check,$array_index);

if(empty($action_array[1])||$action_array[1]==''||$in_array!=1)		{
	page_css($IE_TITLE);
	print_infor($common_html['common_html']['paramerror'].$action_check,'trip',"location='?action=init_default'");
	exit;
}

//������ʾ�ı�
$SHOWINFOR		= "xPq7ucO709C5usLytMvI7bz+LMjn0Oi5usLyx+vBqs+11qPW3bWlteO/xry8yO28/tPQz965q8u+";
$SHOWINFORLIB	= "taW140NSTc+1zbPOqr+q1LTD4rfRyO28/izTw7unv8m1vc341b7XorLh08O7p8P7LLXHwry687/JyfqzydeisuHC6yzIu7rz1NrPtc2zytrIqLLLtaXW0NeisuE=";
$SHOWURL		= "aHR0cDovL2VkdS50b25nZGEyMDAwLmNvbS8=";
$SHOWURLLIB		= "aHR0cDovL2VkdS50b25nZGEyMDAwLmNvbS90ZGxpYnNlcnZpY2UvcmVnLnBocA==";
$SHOWTIP		= "16Ky4bn9uvO0y9DFz6LP+8qn";

global $SYTEM_CONFIG_TABLE;
switch($action_type)		{
	case 'add':
		if(sizeof($action_array)>=3)	{
			$action=$action_array[0]."_".$action_array[1];
			$action_add=$action_array[2];
		}
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$departprivte=$file_ini[$action]['departprivte'];
		//$showlistnull=$file_ini[$action]['showlistnull'];
		//$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		//$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		//$showlistfieldprivate=$file_ini[$action]['showlistfieldprivate'];
		//$showlistfieldlist=returnsystemsetting($tablename,$action,'FIELD_LIST',$showlistfieldlist);
		//$showlistfieldfilter=returnsystemsetting($tablename,$action,'FIELD_FILTER',$showlistfieldfilter);

		$showlistfieldlist	= $file_ini[$action]['showlistfieldlist'];
		$showlistnull		= $file_ini[$action]['showlistnull'];
		$showlistfieldfilter= $file_ini[$action]['showlistfieldfilter'];
		$returnsystemprivateconfig = returnsystemprivateconfig($showlistfieldlist,$showlistfieldfilter,$showlistnull,$action_model,$row_element,$bottom_element,$systemorder,$action_search);
		$showlistfieldlist	= $returnsystemprivateconfig['LIST'];;
		$showlistnull		= $returnsystemprivateconfig['NULL'];;
		$showlistfieldfilter= $returnsystemprivateconfig['FILTER'];;


		$action_model=$file_ini[$action]['action_model'];
		$action_submit=$file_ini[$action]['action_submit'];
		$primarykey=$file_ini[$action]['primarykey'];
		$uniquekey=$file_ini[$action]['uniquekey'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		$hidden_field=$file_ini[$action]['hidden_field'];
		$group_user=$file_ini[$action]['group_user'];
		$columns=returntablecolumn($tablename);
		$primarykey_index=$columns[$primarykey];
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);

		//�˲����������ӱ��ļ�¼ʹ��-����ͼ��ʹ���б���Ϣ
		$tablename2=$file_ini[$action]['tablename2'];
		$primarykey2=$file_ini[$action]['primarykey2'];
		$showlistnull2=$file_ini[$action]['showlistnull2'];
		$showlistfieldlist2=$file_ini[$action]['showlistfieldlist2'];
		$showlistfieldfilter2=$file_ini[$action]['showlistfieldfilter2'];
		$columns2=returntablecolumn($tablename2);
		$html_etc2=returnsystemlang($tablename2);
		$primarykey_index2=$columns2[$primarykey2];
		$parentkey=$file_ini[$action]['parentkey'];
		$parentkey_index = $columns2[$parentkey];
		$childkey=$file_ini[$action]['childkey'];
		$childkey_index = $columns[$childkey];

		page_css($IE_TITLE);
		$TempIndexNumber = sizeof($action_array)-1;
		if(sizeof($action_array)>=3&&$action_array[$TempIndexNumber]=='data')	{
			//����ͨ���ʽ�ϴ��ļ���������
			require_once("lib/utility_file.php");
			if($_POST['ͨ���ʽ�ϴ��ļ�']!="")		{
				if(count($_FILES)>1)
				{
				   $ATTACHMENTS		=	upload();
				   $CONTENT			=	ReplaceImageSrc($CONTENT, $ATTACHMENTS);
				   $ATTACHMENT_ID	=	$ATTACHMENT_ID_OLD.$ATTACHMENTS["ID"];
				   $ATTACHMENT_NAME	=	$ATTACHMENT_NAME_OLD.$ATTACHMENTS["NAME"];
				}
				else
				{
				   $ATTACHMENT_ID	=	$ATTACHMENT_ID_OLD;
				   $ATTACHMENT_NAME	=	$ATTACHMENT_NAME_OLD;
				}
				$ATTACHMENT_ID		.=	copy_sel_attach($ATTACH_NAME,$ATTACH_DIR,$DISK_ID);
				$ATTACHMENT_NAME	.=	$ATTACH_NAME;
				$�ϴ������ֶ����� = $_POST['ͨ���ʽ�ϴ��ļ�'];
				//�Ը����ϴ��ֶ����¸�ֵ
				$_POST[$�ϴ������ֶ�����] = $ATTACHMENT_NAME."||".$ATTACHMENT_ID;
				//print_R($_POST);print_R($_FILES);print_R($ATTACHMENT_NAME);print_R($ATTACHMENT_ID);exit;
			}
			//ͨ���ʽ�ϴ��ļ���������
		if($action_add=='data')	{
				$comma_parse_type=$file_ini[$action]['comma_parse_type'];
				$returnmodel=$file_ini[$action]['returnmodel'];
				require_once('newai.php');
				$temp_textarea=explode(',',$_POST[(string)$_POST['comma_parse']]);//print_R($temp_textarea);
				if(isset($_POST['comma_parse'])&&sizeof($temp_textarea)>=2&&$comma_parse_type!='notify')		{
					for($i=0;$i<sizeof($temp_textarea);$i++)		{
						$var=$temp_textarea[$i];
						$_POST[(string)$_POST['comma_parse']]=$var;
						if(isset($var)&&$var!=''&&strlen($var)>1)		{
							$return_sql_line=return_sql_line($fields);
							create_record_newai();//exit;
						}
					}
				}
				else		{
					$_POST[(string)$_POST['comma_parse']]=$_POST[(string)$_POST['comma_parse']];
					$return_sql_line=return_sql_line($fields);
					create_record_newai();
				}
				$returnmodelArray = explode(',',$returnmodel);
				$returnmodel = $returnmodelArray[0];
				$returnmodelPage = $returnmodelArray[1];
				$return=FormPageAction("action",$returnmodel);
				print_infor($common_html['common_html']['addsuccess'],'trip',"location='?$return'","$returnmodelPage?$return");
				exit;
			}
		unset($action_add);
		}

		require_once('newai.php');
		$fields['form']['action']="action=".$_GET['action']."_data";
		//$fields['form']['action']=returnpageaction($mode='add_data',array());
		newaiadd('add');
		break;
	case 'edit':
		if(sizeof($action_array)>=3)	{
			$action=$action_array[0]."_".$action_array[1];
			$action_add=$action_array[2];
		}

		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$departprivte=$file_ini[$action]['departprivte'];
		//$showlistnull=$file_ini[$action]['showlistnull'];
		//$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		//$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		//$showlistfieldprivate=$file_ini[$action]['showlistfieldprivate'];
		//$showlistfieldlist=returnsystemsetting($tablename,$action,'FIELD_LIST',$showlistfieldlist);
		//$showlistfieldfilter=returnsystemsetting($tablename,$action,'FIELD_FILTER',$showlistfieldfilter);

		$showlistfieldlist	= $file_ini[$action]['showlistfieldlist'];
		$showlistnull		= $file_ini[$action]['showlistnull'];
		$showlistfieldfilter= $file_ini[$action]['showlistfieldfilter'];
		$returnsystemprivateconfig = returnsystemprivateconfig($showlistfieldlist,$showlistfieldfilter,$showlistnull,$action_model,$row_element,$bottom_element,$systemorder,$action_search);
		$showlistfieldlist	= $returnsystemprivateconfig['LIST'];;
		$showlistnull		= $returnsystemprivateconfig['NULL'];;
		$showlistfieldfilter= $returnsystemprivateconfig['FILTER'];;
		//print_R($returnsystemprivateconfig);

		$action_model=$file_ini[$action]['action_model'];
		$action_submit=$file_ini[$action]['action_submit'];
		$primarykey=$file_ini[$action]['primarykey'];
		$uniquekey=$file_ini[$action]['uniquekey'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		$hidden_field=$file_ini[$action]['hidden_field'];
		$form_attribute=$file_ini[$action]['form_attribute'];
		$group_user=$file_ini[$action]['group_user'];
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$primarykey_index=$columns[$primarykey];
		$departprivte=$file_ini[$action]['departprivte'];

		//�˲����������ӱ��ļ�¼ʹ��-����ͼ��ʹ���б���Ϣ
		$tablename2=$file_ini[$action]['tablename2'];
		$primarykey2=$file_ini[$action]['primarykey2'];
		$showlistnull2=$file_ini[$action]['showlistnull2'];
		$showlistfieldlist2=$file_ini[$action]['showlistfieldlist2'];
		$showlistfieldfilter2=$file_ini[$action]['showlistfieldfilter2'];
		$columns2=returntablecolumn($tablename2);
		$html_etc2=returnsystemlang($tablename2);
		$primarykey_index2=$columns2[$primarykey2];
		$parentkey=$file_ini[$action]['parentkey'];
		$parentkey_index = $columns2[$parentkey];
		$childkey=$file_ini[$action]['childkey'];
		$childkey_index = $columns[$childkey];

		page_css($IE_TITLE);
		//print_R($_GET);//exit;
		//ͨ���ʽ�ϴ�:�ڱ༭״̬����ɾ������-��ʼ״̬
		if($_GET['actionDeleteFile']=="DeleteFile")				{
			global $db;
			$ɾ�������ֶ� = $_GET['DeleteField'];
			$primarykey_index_value = $_GET[$primarykey_index];
			$sql="select $ɾ�������ֶ� from $tablename where $primarykey_index='$primarykey_index_value'";
			$rs = $db->Execute($sql);
			$ɾ�������ֶ�ֵ = $rs->fields[$ɾ�������ֶ�];
			$ɾ�������ֶ����� = explode('||',$ɾ�������ֶ�ֵ);
			$ATTACHMENT_ID_OLD		=	$ɾ�������ֶ�����[1];
			$ATTACHMENT_NAME_OLD	=	$ɾ�������ֶ�����[0];
			//print_R($_GET);exit;
			$ATTACHMENT_ID = $_GET['ATTACHMENT_ID'];
			$ATTACHMENT_NAME = $_GET['ATTACHMENT_NAME'];

			if($ATTACHMENT_NAME!="")
			{
			   require_once('lib/utility_file.php');
			   delete_attach($ATTACHMENT_ID,$ATTACHMENT_NAME);
			   $ATTACHMENT_ID_ARRAY=explode(",",$ATTACHMENT_ID_OLD);
			   $ATTACHMENT_NAME_ARRAY=explode("*",$ATTACHMENT_NAME_OLD);

			   $ARRAY_COUNT=sizeof($ATTACHMENT_ID_ARRAY);
			   for($I=0;$I<$ARRAY_COUNT;$I++)
			   {
				   if($ATTACHMENT_ID_ARRAY[$I]!=$ATTACHMENT_ID&&$ATTACHMENT_ID_ARRAY[$I]!="")
				   {
					   $ATTACHMENT_ID1.=$ATTACHMENT_ID_ARRAY[$I].",";
					   $ATTACHMENT_NAME1.=$ATTACHMENT_NAME_ARRAY[$I]."*";
				   }
			   }
			   $ATTACHMENT_ID	=	$ATTACHMENT_ID1;
			   $ATTACHMENT_NAME	=	$ATTACHMENT_NAME1;
			   $ɾ�������ֶ�ֵ	=	$ATTACHMENT_NAME."||".$ATTACHMENT_ID;
			   $sql="update $tablename set $ɾ�������ֶ�='$ɾ�������ֶ�ֵ' where $primarykey_index='$primarykey_index_value'";
			   $db->Execute($sql);
			   //print_R($ATTACHMENT_ID_ARRAY);
			   //print $sql."<BR>";
			   //print $sql."<BR>";
			   //print $sql."<BR>";
			   //print $sql."<BR>";
			}
		}
		//ͨ���ʽ�ϴ�:�ڱ༭״̬����ɾ������-����״̬

		if($_GET['selectid']!="")	{
			$selectid_array=explode(',',$_GET['selectid']);
			$_GET[$primarykey_index]=$selectid_array[0];
		}
		//print_R($_GET);
		$TempIndexNumber = sizeof($action_array)-1;
		if(sizeof($action_array)>=3&&$action_array[$TempIndexNumber]=='data')	{
			//����ͨ���ʽ�ϴ��ļ���������
			require_once("lib/utility_file.php");
			if($_POST['ͨ���ʽ�ϴ��ļ�']!="")		{
				if(count($_FILES)>1)
				{
				   $ATTACHMENTS		=	upload();
				   $CONTENT			=	ReplaceImageSrc($CONTENT, $ATTACHMENTS);
				   $ATTACHMENT_ID	=	$ATTACHMENT_ID_OLD.$ATTACHMENTS["ID"];
				   $ATTACHMENT_NAME	=	$ATTACHMENT_NAME_OLD.$ATTACHMENTS["NAME"];
				}
				else
				{
				   $ATTACHMENT_ID	=	$ATTACHMENT_ID_OLD;
				   $ATTACHMENT_NAME	=	$ATTACHMENT_NAME_OLD;
				}
				$ATTACHMENT_ID		.=	copy_sel_attach($ATTACH_NAME,$ATTACH_DIR,$DISK_ID);
				$ATTACHMENT_NAME	.=	$ATTACH_NAME;
				$�ϴ������ֶ����� = $_POST['ͨ���ʽ�ϴ��ļ�'];
				//�Ը����ϴ��ֶ����¸�ֵ
				$_POST[$�ϴ������ֶ�����] = $ATTACHMENT_NAME."||".$ATTACHMENT_ID;
				//print_R($_POST);print_R($_FILES);print_R($ATTACHMENT_NAME);print_R($ATTACHMENT_ID);exit;
			}
			//ͨ���ʽ�ϴ��ļ���������

			require_once('newai.php');
			if(sizeof($selectid_array)>2)		{
				for($i=0;$i<sizeof($selectid_array);$i++)		{
					$var=$selectid_array[$i];
					if(isset($var)&&$var!='')		{
						$_GET[$primarykey_index]=$selectid_array[$i];
						$return_sql_line=return_sql_line($fields);
						edit_record_newai();
						//print_R($return_sql_line['update_sql']);
					}
				}
			}
			else		{
				$_POST[(string)$_POST['comma_parse']]=$_POST[(string)$_POST['comma_parse']];
				$_POST['FUNC_ID_STR']=isset($_POST['FUNC_ID_STR'])?$_POST['FUNC_ID_STR']:$_GET['FUNC_ID_STR'];
				$return_sql_line=return_sql_line($fields);
				edit_record_newai();
			}
			//print_R($_POST);
			//print_R($return_sql_line['update_sql']);
			//print_R($selectid_array);
			//exit;
			//���ز����б�
			$TempIndexNumber = sizeof($action_array)-2;
			if($action_array[$TempIndexNumber]=='search')	{
				$returnmodel .= "_search";
			}

			$returnmodelArray = explode(',',$returnmodel);
			$returnmodel = $returnmodelArray[0];
			$returnmodelPage = $returnmodelArray[1];
			$return=FormPageAction("action",$returnmodel);
			//print $return;
			//exit;
			print_infor($common_html['common_html']['editsuccess'],'trip',"location='?$return'","$returnmodelPage?$return");
			exit;
			unset($action_add);
		}

		$_GET[$primarykey_index]=$_GET[$primarykey_index]!=''?$_GET[$primarykey_index]:$_SESSION[$SUNSHINE_USER_ID_VAR];
		require_once('newai.php');
		$fields['form']['action']=FormPageAction("action",$_GET['action']."_data",$primarykey_index,$_GET[$primarykey_index]);
		newaiadd('edit');
		break;
	case 'view':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		//$showlistnull=$file_ini[$action]['showlistnull'];
		//$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		//$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];

		$showlistfieldlist	= $file_ini[$action]['showlistfieldlist'];
		$showlistnull		= $file_ini[$action]['showlistnull'];
		$showlistfieldfilter= $file_ini[$action]['showlistfieldfilter'];
		$returnsystemprivateconfig = returnsystemprivateconfig($showlistfieldlist,$showlistfieldfilter,$showlistnull,$action_model,$row_element,$bottom_element,$systemorder,$action_search);
		$showlistfieldlist	= $returnsystemprivateconfig['LIST'];;
		$showlistnull		= $returnsystemprivateconfig['NULL'];;
		$showlistfieldfilter= $returnsystemprivateconfig['FILTER'];;

		//�˲����������ӱ��ļ�¼ʹ��-����ͼ��ʹ���б���Ϣ
		$tablename2=$file_ini[$action]['tablename2'];
		$primarykey2=$file_ini[$action]['primarykey2'];
		$showlistnull2=$file_ini[$action]['showlistnull2'];
		$showlistfieldlist2=$file_ini[$action]['showlistfieldlist2'];
		$showlistfieldfilter2=$file_ini[$action]['showlistfieldfilter2'];
		$columns2=returntablecolumn($tablename2);
		$html_etc2=returnsystemlang($tablename2);
		$primarykey_index2=$columns2[$primarykey2];
		$parentkey=$file_ini[$action]['parentkey'];
		$parentkey_index = $columns2[$parentkey];
		$childkey=$file_ini[$action]['childkey'];
		$childkey_index = $columns[$childkey];
		$departprivte=$file_ini[$action]['departprivte'];

		//ϵͳ�������ò���-������ʹ����������ɲ��㣬�˹��ܣ��˲���ͨ
		//$showlistfieldlist=returnsystemsetting($tablename,$action,'FIELD_LIST',$showlistfieldlist);
		//$showlistfieldfilter=returnsystemsetting($tablename,$action,'FIELD_FILTER',$showlistfieldfilter);

		$action_model=$file_ini[$action]['action_model'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$action_submit=$file_ini[$action]['action_submit'];
		$primarykey=$file_ini[$action]['primarykey'];
		$uniquekey=$file_ini[$action]['uniquekey'];
		$hidden_field=$file_ini[$action]['hidden_field'];
		$merge=$file_ini[$action]['merge'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$primarykey_index=$columns[$primarykey];

		page_css($IE_TITLE);

		require_once('newai.php');
		$hidden_field_array=explode(',',$hidden_field);
		for($i=0;$i<sizeof($hidden_field_array);$i++)	{
			$element_array=explode(':',(string)$hidden_field_array[$i]);
			$element[(string)$element_array[0]]=$element_array[1];
			$element[(string)$element_array[2]]=$element_array[3];
		}
		if($element['markread']!='')		{
			switch($element['markreadtype'])	{
				case 'addusername':
					markread_record_newai('addusername',$element);
					break;
				case 'makeread':
					markread_record_newai('makeread');
					break;
				case 'makeadd':
					markread_record_newai('makeadd',$element);
					break;
				default:
					markread_record_newai('makeread');
					break;
			}
		}
		newaiadd('view');

		break;


	case 'report':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$child_tablename=$file_ini[$action]['child_tablename'];
		$child_partent=$file_ini[$action]['child_partent'];
		$UserDefineFunction=$file_ini[$action]['UserDefineFunction'];
		$child_showlistfieldlist=$file_ini[$action]['child_showlistfieldlist'];
		$child_showlistfieldfilter=$file_ini[$action]['child_showlistfieldfilter'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$primarykey=$file_ini[$action]['primarykey'];
		$primarykey_index=$columns[$primarykey];
		page_css("Report",$IE_TITLE);
		@$ReportHeaderTextArray=parse_ini_file("../../Framework/system_config.ini");
		$ReportHeaderText = $ReportHeaderTextArray['ReportTitle'];
		$ReportHeaderText.= "(".$html_etc[$tablename][$tablename].")";
		ReportHeaderHtml($ReportHeaderText,"80%");
		require_once('newai.php');
		$selectid_array=explode(',',$_GET['selectid']);
		foreach($selectid_array as $list)	{
			if(isset($list)&&$list!=''&&!empty($list))		{
				newaireport($fields,$list,"Single");
			}
		}
		break;

	case 'statistics':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$showlistfieldtype=$file_ini[$action]['showlistfieldtype'];
		$showlistfieldlist1=$file_ini[$action]['showlistfieldlist1'];
		$showlistfieldlist2=$file_ini[$action]['showlistfieldlist2'];
		$showlistfieldlist3=$file_ini[$action]['showlistfieldlist3'];
		$showlistfieldlist4=$file_ini[$action]['showlistfieldlist4'];
		$showlistfieldlist5=$file_ini[$action]['showlistfieldlist5'];
		$showlistfieldlist6=$file_ini[$action]['showlistfieldlist6'];
		$showlistfieldlist7=$file_ini[$action]['showlistfieldlist7'];
		$showlistfieldlist8=$file_ini[$action]['showlistfieldlist8'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$primarykey=$file_ini[$action]['primarykey'];
		$UserSumFunction=$file_ini[$action]['UserSumFunction'];
		$UserUnitFunction=$file_ini[$action]['UserUnitFunction'];
		$UserUnitFunctionIndex = $common_html['common_html'][$UserUnitFunction];
		$sum_index=$columns[$UserSumFunction];
		$primarykey_index=$columns[$primarykey];

		page_css("Report",$IE_TITLE);
		//@$ReportHeaderTextArray=parse_ini_file("../../Framework/system_config.ini");
		$ReportHeaderText = $ReportHeaderTextArray['ReportTitle'];
		//$ReportHeaderText.= "(".$html_etc[$tablename][$tablename].")";
		ReportHeaderHtml($ReportHeaderText,"900");
		require_once('newai.php');
		require_once('newai_statistics.php');
		newaistatistics($fields);
		break;

	case 'reportsearch':
		if(sizeof($action_array)>=3)	{
			$action=$action_array[0]."_".$action_array[1];
			$action_add=$action_array[2];
		}
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$showlistfieldfilter2=$file_ini[$action]['showlistfieldfilter2'];
		$showlistfieldlistSearch=$file_ini[$action]['showlistfieldlistSearch'];
		$showlistfieldfilterSearch=$file_ini[$action]['showlistfieldfilterSearch'];
		$showlistfieldfilter2Search=$file_ini[$action]['showlistfieldfilter2Search'];
		$totalnumber=$file_ini[$action]['totalnumber'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$primarykey=$file_ini[$action]['primarykey'];
		$primarykey_index=$columns[$primarykey];
		page_css("Report Search",$IE_TITLE);

		if(sizeof($action_array)>=3)	{
			if($action_add=='data')	{
				$showlistfieldlistSearchArray=explode(',',$showlistfieldlistSearch);
				$showlistfieldfilterSearchArray=explode(',',$showlistfieldfilterSearch);
				@$ReportHeaderTextArray=parse_ini_file("../../Framework/system_config.ini");
				$ReportHeaderText = $ReportHeaderTextArray['ReportTitle'];
				$ReportHeaderText.= "(".$html_etc[$tablename][$tablename].")";
				ReportHeaderHtml($ReportHeaderText,"80%");
				require_once('newai.php');
				//�������� SQL ����������  --��ʼ
				$SQL_ARRAY = array();
				for($i=0;$i<sizeof($showlistfieldlistSearchArray);$i++)		{
					$fieldIndex = $showlistfieldlistSearchArray[$i];
					$fieldName  = $columns[$fieldIndex];
					$fieldText  = $html_etc[$tablename][$fieldName];
					$mode = $showlistfieldfilterSearchArray[$i];
					switch($mode)		{
					case '':
						$SQL_ARRAY[$i]= $fieldName." like '%".$_GET[$fieldName]."%'";
						break;
					case 'input':
						$SQL_ARRAY[$i]= $fieldName." like '%".$_GET[$fieldName]."%'";
						break;
					case 'date':
						$NewFieldName1 = $fieldName."1";
						$NewFieldName2 = $fieldName."2";
						$SQL_ARRAY[$i]= $fieldName.">'".$_GET[$NewFieldName1]."' and ".$fieldName."<'".$_GET[$NewFieldName2]."'";
						break;
					}
				}
				//�������� SQL ����������  --����
				$SQL_Text = join(' and ',$SQL_ARRAY);
				$NEWAI_REPORT_SEARCH_SYSTEM = "select * from $tablename where $SQL_Text";
				newaireport($fields,$list,"Multiple");
			}
			unset($action_add);
			}
		else	{
			$_GET[$primarykey_index]=$_GET[$primarykey_index]!=''?$_GET[$primarykey_index]:$_SESSION[$SUNSHINE_USER_ID_VAR];
			require_once('newai.php');
			$fields['form']['action']=FormPageAction("action",$_GET['action']."_data",$primarykey_index,$_GET[$primarykey_index]);
			newaiReportSearch($fields,'');

		}
		break;

	case 'export':
		if(sizeof($action_array)>=3)	{
			$action=$action_array[0]."_".$action_array[1];
			$action_add=$action_array[2];
		}

		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$action_model=$file_ini[$action]['action_model'];
		$systemorder=$file_ini[$action]['systemorder'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		$primarykey=$file_ini[$action]['primarykey'];
		$hidden_field=$file_ini[$action]['hidden_field'];
		$group_filter=$file_ini[$action]['group_filter'];
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$pagenums_model=10000000;
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$primarykey_index=$columns[$primarykey];

		if(sizeof($action_array)>=3)	{
			if($action_add=='data')	{
				$tablename=$_GET['tablename'];
				$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
				//$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
				$merge=$file_ini[$action]['merge'];
				$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
				//$showlistfieldlist=$_GET['exportfield'];
				$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];

				$showlistfieldlist_array=explode(',',$showlistfieldlist);
				$showlistfieldfilter_array=explode(',',$showlistfieldfilter);
				//����EXPORT����ֵ
				$exportfield_array=explode(',',$_GET['exportfield']);
				$exportfield_array2 = array();
				for($i=0;$i<sizeof($exportfield_array);$i++)		{
					if($exportfield_array[$i]!="")	{
						array_push($exportfield_array2,$exportfield_array[$i]);
					}
				}
				if(sizeof($exportfield_array2)==0)
					$exportfield_array2[0] = 0;
				$exportfield_array = $exportfield_array2;
				$exportfield = join(",",$exportfield_array2);
				$_GET['exportfield'] = $exportfield;
				//�γ��ֶ��ı�������
				for($i=0;$i<sizeof($exportfield_array);$i++)		{
					$newFieldTextName = $columns[(String)$exportfield_array[$i]];
					$newFieldTextArray[$i] = $newFieldTextName;
					$newFieldNameArray[$i] = $html_etc[$tablename][$newFieldTextName];
				}
				//������һ���ֶ��б���
				$RowData['value'][0] = join(',',$newFieldTextArray);
				//$RowData['value'][1] = join(',',$newFieldTextArray);
				//��������������
				global $_SESSION;
				//2008-10-18֧�ֶ��ֶεĹ���
				for($k=0;$k<sizeof($columns);$k++)					{
					$KeyElement = $columns[$k];
					if($_GET[$KeyElement]!="")		{
						//2008-11-12֧��һ�ֶζ�ֵ�Ĺ��˷�ʽ
						$GETValue = $_GET[$KeyElement];
						$GETValueArray = explode(',',$GETValue);
						if(sizeof($GETValueArray)>1)		{	//2008-11-12GETֵΪ����,����IN�ж�
							$NewGetArray[] = $KeyElement." IN ('".implode("','", $GETValueArray)."')";
						}
						else		{	//2008-11-12��һֵ,����ֱ���ж�
							$NewGetArray[] = $KeyElement." like '%".$_GET[$KeyElement]."%'";
						}
						//$NewGetArrayValue[] = $KeyElement."(".$_GET[$KeyElement].")";
						//$PARA_TEMP = (int)$_GET[$KeyElement];
						$PARA_TEMP = substr_cut($_GET[$KeyElement],8).".";//�������ļ�����עʹ��
						$NewGetArrayValue[] = $KeyElement."(".$PARA_TEMP.")";//�������ļ�����עʹ��
						//$NewGetArrayValue[] = "[".$KeyElement."]";
					}
					else	if($_GET[$KeyElement."_��Сֵ"]!=""&&$_GET[$KeyElement."_���ֵ"]!="")		{
						$TEMP_MIN = $_GET[$KeyElement."_��Сֵ"];
						$TEMP_MAX = $_GET[$KeyElement."_���ֵ"];
						$TEMP_MIN = $TEMP_MIN - 0.001;
						$TEMP_MAX = $TEMP_MAX + 0.001;
						$NewGetArray[] = " $KeyElement >= '$TEMP_MIN' and $KeyElement <= '$TEMP_MAX'";
					}
					else	if($_GET[$KeyElement."_��ʼʱ��"]!=""&&$_GET[$KeyElement."_����ʱ��"]!="")		{
						$TEMP_MIN = $_GET[$KeyElement."_��ʼʱ��"];
						$TEMP_MAX = $_GET[$KeyElement."_����ʱ��"];
						$NewGetArray[] = " $KeyElement >= '$TEMP_MIN' and $KeyElement <= '$TEMP_MAX'";
					}
				}
				//2009-12-24֧�������ֶι���
				if($_GET['searchfield']!=""&&$_GET['searchvalue']!="")					{
					$SearchValueSQL = " and ".$_GET['searchfield']." like '%".$_GET['searchvalue']."%'";
					$NewGetArrayValue[] = "(".$_GET['searchvalue'].")";
				}
				else		{
					$SearchValueSQL = '';
				}

				//�γ�WHERE SQL�ֶ�
				if($NewGetArray[0]!="")				{
					$WhereText = "where ".join(' and ',$NewGetArray).$SearchValueSQL;;
				}
				else	{
					$WhereText = "where 1=1";
				}
				//2009-12-9������,��Ҫ���ڿͻ�ǰ̨ҳ��SQL��䶨��
				global $SYSTEM_ADD_SQL;
				if($SYSTEM_ADD_SQL!="")			{
					$WhereText .= " ".$SYSTEM_ADD_SQL;
				}

				//�γ�������ֶ��б�
				if($systemorder!="")						{//���������ִ�ж���������ֶ�
					$systemorderArray = explode(',',$systemorder);
					for($xx=0;$xx<sizeof($systemorderArray);$xx++)		{
						$KeyOrderSqlIndexArray = explode(':',$systemorderArray[$xx]);
						$KeyOrderSqlIndexName = $KeyOrderSqlIndexArray[0];
						$KeyOrderSqlIndexOrderDesc = $KeyOrderSqlIndexArray[1];
						$OrderSQLARRAY[$xx] = $columns[$KeyOrderSqlIndexName]." ".$KeyOrderSqlIndexOrderDesc;
					}
					$OrderSQLText = join(',',$OrderSQLARRAY);
				}
				else  {//���û�ж���,����KEY��˳���������
					$OrderSQLText = $columns[$primarykey];
				}

				//�γ��ֶ��ı���,�Թ���SQL���
				$newFieldText = join(',',$newFieldTextArray);
				$sql = "select $newFieldText from $tablename $WhereText order by ".$OrderSQLText."";
				$rs = $db->CacheExecute(150,$sql);
				$rs_a = $rs->GetArray();
				//print_R($rs_a);
				//print $sql;exit;
				//�Լ����еĽ�������й�������,��Ҫ��tablefilter,boolean���ֹ����㷨
				for($k=0;$k<sizeof($rs_a);$k++)					{
					//���û�Ҫ�����ʾ���ֶν��й���
					for($i=0;$i<sizeof($exportfield_array);$i++)	{
						$TextFieldIndex = $exportfield_array[$i];
						//print_R($exportfield_array);
						$TextField = $columns[$TextFieldIndex];
						//print_R($exportfield_array);
						//�ж��û�Ҫ����ֶ��Ƿ���ϵͳ�ṩ���ֶ�
						if(in_array($TextField,$newFieldTextArray))		{
							//print_R($showlistfieldfilter_array);
							$getExportKeyFilterArray = explode(':',$showlistfieldfilter_array[(String)$i]);
							//print $getExportKeyFilterArray[0];
							//����ʾ�ֶ���Ϣ���ݵ���ʽ����
							switch($getExportKeyFilterArray[0])		{
								case 'tablefilter':
									$ExportKeycolumns=returntablecolumn($getExportKeyFilterArray[1]);
									$ExportFieldCode = $ExportKeycolumns[(String)$getExportKeyFilterArray[2]];
									$ExportFieldName = $ExportKeycolumns[(String)$getExportKeyFilterArray[3]];
									$ResultFieldCode = returntablefield($getExportKeyFilterArray[1],$ExportFieldCode,$rs_a[$k][$TextField],$ExportFieldName);
									$RowDataLine[$i] = $ResultFieldCode;
									//print $TextField;
									//print_R($rs_a[$i][$TextField]);exit;
									break;
								default:
									//print_R($rs_a);
									$rs_a[$k][$TextField] = str_replace(",", "��", $rs_a[$k][$TextField]);
									$RowDataLine[$i] = str_replace("\r\n", "\\r\\n", $rs_a[$k][$TextField]);
									//�ֶο���
									if($RowValueLenght[$i]<strlen($rs_a[$k][$TextField]))
										$RowValueLenght[$i] = strlen($rs_a[$k][$TextField]);
									if($RowValueLenght[$i]<strlen($TextField))
										$RowValueLenght[$i] = strlen($TextField);

									break;
							}
							//end switch
						}
						//end if
					}
					//����ÿһ�е�����
					$RowData['value'][] = join(',',$RowDataLine);
				}
				//print_R($RowDataLine);exit;
				//���������ļ�������
				$RowData['tablename'] = $tablename;
				//print_R($NewGetArrayValue);
				$RowData['FileNameAttachment'] = @join('',$NewGetArrayValue);
				$RowData['FileNameAttachment'] = ereg_replace('/','',$RowData['FileNameAttachment']);
				$RowData['FileNameAttachment'] = ereg_replace('\*','',$RowData['FileNameAttachment']);
				$RowData['FileNameAttachment'] = substr($RowData['FileNameAttachment'],0,220);
				$RowData['RowValueLenght'] = $RowValueLenght;
				require_once('newai.php');
				//print_R($_GET);
				//print_R($exportfield_array);
				//print $RowData['FileNameAttachment'];
				//print_R($RowData['value']);
				//exit;
				$������ =	sizeof($RowData['value']);
				//print $������;exit;
				if($_GET['method']=="CSV")	{
					export_newai_CSV($RowData);
				}
				else	{
					if($������>16382)			{
						export_newai_CSV($RowData,'[�������ݳ���16382��,ǿ��ʹ��CSV��ʽ����]');
					}
					else	{
						export_newai_XLS($RowData);//����EXCEL
					}
				}
				exit;
			}
			unset($action_add);
		}

		page_css($IE_TITLE);

		require_once('newai.php');
		newai_export($fields,'content');
		break;

	case 'import':
		//print_R($action_array);
		if(sizeof($action_array)>=3)	{
			$action=$action_array[0]."_".$action_array[1];
			$action_add=$action_array[2];
		}

		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$action_model=$file_ini[$action]['action_model'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		$primarykey=$file_ini[$action]['primarykey'];
		$uniquekey=$file_ini[$action]['uniquekey'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$foreignkey=$file_ini[$action]['foreignkey'];
		$hidden_field=$file_ini[$action]['hidden_field'];
		$importgroup=$file_ini[$action]['importgroup'];
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$pagenums_model=10000000;
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$primarykey_index=$columns[$primarykey];

		//���ӣ����ڹ�����ѡ��ı���
		$importgroupArray = explode(':',$importgroup);
		$showfieldIndex = $importgroupArray[0];
		$showFieldName = $columns[$showfieldIndex];
		$showfieldTableName = $importgroupArray[1];
		$showfieldColumns = returntablecolumn($showfieldTableName);
		$showfieldIndexValue = $importgroupArray[2];
		$showfieldIndexName = $importgroupArray[3];
		$showfieldIndexValue = $showfieldColumns[$showfieldIndexName];
		$showfieldIndexName = $showfieldColumns[$showfieldIndexName];


		//print_R($action_array);
		//print_R($HTTP_POST_FILES['uploadfile']['tmp_name']);
		//print_R($_POST);
		is_uploaded_file($_FILES['uploadfile']['tmp_name']);
		//print $_FILES['uploadfile']['tmp_name'];

		//print_R(file($TempFile));
		//unlink($TempFile);

		if(sizeof($action_array)>=3)	{
			if($action_add=='data')	{
				require_once('newai.php');
				//�ϴ���EXCEL��ʽ�ļ�ʱ����XLS������,����CSV��ʽ����
				if(is_uploaded_file($_FILES['uploadfileXLS']['tmp_name']))			{
					newai_import_XLS($columns);
				}
				else	{
					newai_import_CSV($columns);
				}
				exit;
			}
			unset($action_add);
		}

		page_css($IE_TITLE);

		require_once('newai.php');
		newai_import($fields,'content');
		print_hidden($tablename,'tablename');
		break;
	case 'init':
		if(sizeof($action_array)>=3)	{
			$action=$action_array[0]."_".$action_array[1];
			$action_add=$action_array[2];
		}
		$location_title='sunshine_inside';
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$tablewidth=$file_ini[$action]['tablewidth'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$ondblclick_config=$file_ini[$action]['ondblclick_config'];
		$onclick_config=$file_ini[$action]['onclick_config'];
		$init_type=$file_ini[$action]['init_type'];
		$array_show=$file_ini[$action]['array_show'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		$read_type=$file_ini[$action]['read_type'];
		$nullshow=$file_ini[$action]['nullshow'];
		$systemorder=$file_ini[$action]['systemorder'];
		$row_element=$file_ini[$action]['row_element'];
		$row_userpriv=$file_ini[$action]['row_userpriv'];
		$bottom_element=$file_ini[$action]['bottom_element'];
		$departprivte=$file_ini[$action]['departprivte'];
		$pagenums_model=$file_ini[$action]['pagenums_model'];
		$pagestop_model=$file_ini[$action]['pagestop_model'];
		$export_port_arrribute=$file_ini[$action]['export_port_arrribute'];
		$merge=$file_ini[$action]['merge'];
		$UserUnitFunction=$file_ini[$action]['UserUnitFunction'];
		$UserUnitFunctionIndex = $common_html['common_html'][$UserUnitFunction];

		$action_model=$file_ini[$action]['action_model'];
		$action_search=$file_ini[$action]['action_search'];
		$group_filter=$file_ini[$action]['group_filter'];
		$child_filter=$file_ini[$action]['child_filter'];
		$UserDefineFunction=$file_ini[$action]['UserDefineFunction'];
		$UserSumFunction=$file_ini[$action]['UserSumFunction'];
		$email_filter=$file_ini[$action]['email_filter'];
		$sms_filter=$file_ini[$action]['sms_filter'];
		$hidden_field=$file_ini[$action]['hidden_field'];
		$group_user=$file_ini[$action]['group_user'];
		$edit_attribute=$file_ini[$action]['edit_attribute'];
		$primarykey=$file_ini[$action]['primarykey'];
		$uniquekey=$file_ini[$action]['uniquekey'];
		$childnums=$file_ini[$action]['childnums'];

		$showlistfieldlist	= $file_ini[$action]['showlistfieldlist'];
		$showlistnull		= $file_ini[$action]['showlistnull'];
		$showlistfieldfilter= $file_ini[$action]['showlistfieldfilter'];
		$returnsystemprivateconfig = returnsystemprivateconfig($showlistfieldlist,$showlistfieldfilter,$showlistnull,$action_model,$row_element,$bottom_element,$systemorder,$action_search);
		$showlistfieldlist	= $returnsystemprivateconfig['LIST'];;
		$showlistnull		= $returnsystemprivateconfig['NULL'];;
		$showlistfieldfilter= $returnsystemprivateconfig['FILTER'];;
		$pagenums_model		= $returnsystemprivateconfig['pagenums_model'];;
		$row_element		= $returnsystemprivateconfig['row_element'];;
		$bottom_element		= $returnsystemprivateconfig['bottom_element'];;
		$action_model		= $returnsystemprivateconfig['action_model'];;
		$action_search		= $returnsystemprivateconfig['action_search'];;
		$systemorder		= $returnsystemprivateconfig['systemorder'];;
		$��������Ϣ			= $returnsystemprivateconfig['��������Ϣ'];;



		//רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��
		//2010-4-3����ֹ�У���Ĳ鿴Ȩ��,����ʹ��SUNSHINE_BANJI_LIST����
		//��INI�ļ���ϵͳ���ж�action_model row_element bottom_element�ȼ��������������¶���

		if($_SESSION['SUNSHINE_BANJI_LIST']!=""&&$_SESSION['LOGIN_USER_ID']!="admin")		{
			$action_model = 'export_default:export:x';
			$row_element = '';
			$bottom_element = '';
			$_GET['ϵͳ˵��'] = " 1 �����˱���,��ʾGET����İ��,�༶,�༶����,�����༶�ȼ�������,��רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��; 2 ͬʱ��INI�ļ���ϵͳ���ж�action_model row_element bottom_element�ȼ��������������¶���";
		}


		session_register("ָ����Ա�û���");

		if($_GET['ָ����Ա�û���']!=""&&$_SESSION['LOGIN_USER_ID']!="admin")						{
			$_SESSION['ָ����Ա�û���'] = $_GET['ָ����Ա�û���'];
		}
		else	{
			$_SESSION['ָ����Ա�û���'] = '';

		}
		if($_SESSION['ָ����Ա�û���']!=""&&$_SESSION['LOGIN_USER_ID']!="admin")		{
			$action_model = '';
			$row_element = '';
			$bottom_element = '';
			$_GET['ϵͳ˵��'] = " 1 �����˱���,��ʾGET�����ָ����ʦ�û����ȱ�����ϵͳָ��,����ϵͳֻ���в鿴Ȩ��; 2 ͬʱ��INI�ļ���ϵͳ���ж�action_model row_element bottom_element�ȼ��������������¶���";

		}

		if($_GET['ָ�����']!=""&&$_SESSION['LOGIN_USER_ID']!="admin")						{
			session_register("ָ�����");
			$_SESSION['ָ�����'] = $_GET['ָ�����'];
		}
		else	{
			$_SESSION['ָ�����'] = '';
		}
		if($_SESSION['ָ�����']!=""&&$_SESSION['LOGIN_USER_ID']!="admin")		{

			$action_model = '';
			$row_element = '';
			$bottom_element = '';
			$_GET['ϵͳ˵��'] = " 1 �����˱���,��ʾGET����İ��,�༶,�༶����,�����༶�ȼ�������,��רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��; 2 ͬʱ��INI�ļ���ϵͳ���ж�action_model row_element bottom_element�ȼ��������������¶���";
		}
		//$columns=returntablecolumn($tablename);//print_R($SYTEM_CONFIG_TABLE);
		//$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		//�û��Զ���SQL���ʱ��������ֶλ�ȡ
		global $NEWAIINIT_VALUE_SYSTEM;
		global $NEWAIINIT_VALUE_SYSTEM_NUM;
		global $NEWAIINIT_VALUE_SYSTEM_SUM;
		if(strlen($NEWAIINIT_VALUE_SYSTEM)>10)			{
			$USER_DEFINE_SQL_ARRAY = explode('from',$NEWAIINIT_VALUE_SYSTEM);
			$USER_DEFINE_SQL_ARRAY = explode('select',$USER_DEFINE_SQL_ARRAY[0]);
			$USER_DEFINE_SQL_ARRAY = explode('from',$USER_DEFINE_SQL_ARRAY[1]);
			$USER_DEFINE_SQL_ARRAY = explode(',',$USER_DEFINE_SQL_ARRAY[0]);
			for($sql_array=0;$sql_array<sizeof($USER_DEFINE_SQL_ARRAY);$sql_array++)	{
				$Element = TRIM($USER_DEFINE_SQL_ARRAY[$sql_array]);
				//print "<font color=red>".$Element."</font><BR>";
				//����' '
				$Element = explode(' ',$Element);
				$Array_index = sizeof($Element);
				if(TRIM($Element[$Array_index-1])=="")
					$Element = TRIM($Element[0]);
				else
					$Element = TRIM($Element[$Array_index-1]);
				//print $Element."<BR>";
				//����'.'
				$Element = explode('.',$Element);
				$Array_index = sizeof($Element);
				if(TRIM($Element[$Array_index-1])=="")
					$Element = TRIM($Element[0]);
				else
					$Element = TRIM($Element[$Array_index-1]);
				//$Element = explode('.',$Element);
				//$Element = $Element[1];
				//print $Element."<BR>";
				$columns[$sql_array] = $Element;
			}
			//print_R($USER_DEFINE_SQL_ARRAY);
		}

		//�Կ�ʼ
		$primarykey_index=$columns[$primarykey];
		if(sizeof($action_array)>=3)	{
			$action_model=$action_model.",$action";
		}

		switch($init_type)			{
			case 'array_show':
				page_css($IE_TITLE);
				require_once('newai.php');
				//showpageheader_new($common_html['common_html']['set']." $tablename","person_info.gif");
				array_show();
				exit;
				break;
		}

		page_css($IE_TITLE);

		require_once('newai.php');
		newaiinit($fields,$mode);
		//����ʾ������ϸ����ʱ������ֵĹرհ�ť
		if($_GET['action_close']=="close")		{
			print "<BR><div align=center><INPUT class=SmallButton onclick=self.close(); type=button value='".$common_html['common_html']['close']."'</div>";
		}
		//�û��Զ�����Ʋ���,�˲��������Լ�����ĳЩ��ʾ����
		$�����Զ���������б� = array("init_default","init_customer","add_default","edit_default","view_default");
		if(in_array($_GET['action'],$�����Զ���������б�)&&$_SESSION['LOGIN_USER_ID']=='admin')			{
			if($parse_filename=="")		$parse_filename = $tablename;
			$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
			//print_R($PHP_SELF_ARRAY);
			$FILE_SELF_NAME = array_pop($PHP_SELF_ARRAY);
			$FileDirName = array_pop($PHP_SELF_ARRAY);
			$�Ƿ��ǽӿ�Ŀ¼ = array_pop($PHP_SELF_ARRAY);
			$����ʱ�� = time();
			$ִ��ʱ�� = ($����ʱ��-$SYSTEM_EXEC_TIME)*1000/60;
			$ִ��ʱ�� = number_format($ִ��ʱ��, 2, '.', '');
			$ִ��ʱ��TEXT = "ִ��:".$ִ��ʱ��."MS";;
			if($�Ƿ��ǽӿ�Ŀ¼=="Interface"&&$FileDirName!="PGSQL")		{
				print "<BR><div align=center><a href=\"../CONFIG/config.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=$tablename&FileIniname=$parse_filename&FileDirName=$FileDirName&actionconfig=config&GOBACKFILENAME=$FILE_SELF_NAME")."\" title='���õ�ǰҳ����ʾ���� $ִ��ʱ��TEXT (����Ϣֻ��admin�û�������ʾ)'>���Ƶ�ǰҳ����ֶ���ʾ�����沼��[".$ִ��ʱ��TEXT."]".$��������Ϣ."</a>&nbsp;<a href=\"http://edu.tongda2000.com/book/index.php\" target=_blank title='�����ⷴ���������̽��н��(����Ϣֻ��admin�û�������ʾ)'>�������⼰�������</a></div>";
			}
			else if($�Ƿ��ǽӿ�Ŀ¼=="Interface"&&$FileDirName=="PGSQL")		{
				print "<BR><div align=center>$ִ��ʱ��TEXT</div>";
			}
		}

		//��ʾϵͳ��ƽӿ�
		//print $parse_filename;
		$�ܽ�ɫ���� = explode(',',$_SESSION['LOGIN_USER_PRIV'].",".$_SESSION['LOGIN_USER_PRIV_OTHER']);
		if($SYSTEM_MODE=="1"&&$FileDirName!="PGSQL"&&in_array('1',$�ܽ�ɫ����))			{
			if($parse_filename=="")		{
				$parse_filename = $tablename;
			}
			$SCRIPT_FILENAME = ereg_replace('/','\\',$_SERVER['SCRIPT_FILENAME']);
			$SCRIPT_FILENAME_ARRAY = explode('\\',$SCRIPT_FILENAME);
			$MODULE_ARRAY_NAME = array_pop($SCRIPT_FILENAME_ARRAY);
			$MODULE_ARRAY_NAME = array_pop($SCRIPT_FILENAME_ARRAY);
			print "<BR><div align=center><a href=\"../../Development/main.php?MakeSystemModel=$MODULE_ARRAY_NAME&Tablename=$tablename&FileIniname=$parse_filename\" target=_blank><font color=red>�������</font></a><BR>
			<input type=text readonly class=SmallInput value='$SCRIPT_FILENAME' size=95/>
			</div>";
		}

		break;
	case 'delete':
			$action_array=explode('_',$action);
			$tablename=$file_ini[$action]['tablename'];
			$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
			$primarykey=$file_ini[$action]['primarykey'];
			$returnmodel=$file_ini[$action]['returnmodel'];
			$hidden_field=$file_ini[$action]['hidden_field'];
			$passwordcheck=$file_ini[$action]['passwordcheck'];
			$delete_attribute=$file_ini[$action]['delete_attribute'];
			$columns=returntablecolumn($tablename);
			$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
			$primarykey_index=$columns[$primarykey];
			//print $passwordcheck;
			if($passwordcheck=="1"&&$_GET['actionAdvDelete']!="AdvDelete"&&$_GET['actionAdvDelete']!="InforCheck")				{
				page_css("���������֤");
				//Array ( [action] => delete_array [returnmodel] => init_default [selectid] => 412, [pageid] => 1
				print "<form name=form1 action=\"?XX=XX&actionAdvDelete=InforCheck&action=delete_array&returnmodel=init_default&selectid=".$_GET['selectid']."\" method=post encType=multipart/form-data>";
				table_begin("500");
				print_title("�����������û�����,���ڹؼ��Բ���,��Ҫ���ж���������֤");
				print "<tr class=TableData><td width=25%>&nbsp;��������:</td><td>
						<input type=password name='PASSWORD' class=SmallInput >
						(����ǰ�ĵ�¼����)</td></tr>";
				print_submit("�ύ");
				table_end();
				form_end();
				//print_R($_GET);
				exit;
			}
			else if($passwordcheck=="1"&&$_GET['actionAdvDelete']=="InforCheck")				{
				page_css("���������֤");
				global $db;
				//print_R($_SESSION);
				$LOGIN_USER_ID	= $_SESSION['LOGIN_USER_ID'];
				$���ص�ǰ�û������� = returntablefield("user","USER_ID",$LOGIN_USER_ID,"PASSWORD");
				//$PASSWORD		= md5(TRIM($_POST['PASSWORD']));
				//$sql			= "select USER_ID from user where USER_ID='$LOGIN_USER_ID' and PASSWORD='$PASSWORD'";
				//print $sql;exit;
				//$rs				= $db->Execute($sql);
				//$USER_ID_STR	= $rs->fields['USER_ID'];
				//if($USER_ID_STR!="")			{
				//����CRYPT��MD5���ּ��ܷ�ʽ
				if(
					crypt(TRIM($_POST['PASSWORD']),$���ص�ǰ�û�������)==$���ص�ǰ�û�������
					||
					MD5(TRIM($_POST['PASSWORD']))==$���ص�ǰ�û�������
					)		{
					//�������ɹ�
					$JUMP_URL = "?XX=XX&actionAdvDelete=AdvDelete&action=".$_GET['action']."&selectid=".$_GET['selectid']."&returnmodel=".$_GET['returnmodel']."&pageid=".$_GET['pageid']."";
					print_infor("������ȷ,ϵͳ��ִ����Ĳ���!",'',"location='$JUMP_URL'");
					print "<META HTTP-EQUIV=REFRESH CONTENT='$SYSTEM_SECOND;URL=$JUMP_URL'>\n";
				}
				else		{
					//�������ʧ��
					$JUMP_URL = "?XX=XX&action=init_default&pageid=".$_GET['pageid']."";
					print_infor("���벻��ȷ,ϵͳ������....",'',"location='$JUMP_URL'");
					print "<META HTTP-EQUIV=REFRESH CONTENT='$SYSTEM_SECOND;URL=$JUMP_URL'>\n";
				}
				//print_R($_POST);print_R($_GET);
				exit;
			}

			//print_R($passwordcheck);exit;

			$action=($_GET['action']=='delete_group')?$action:'delete_array';
			switch($_GET['action'])			{
				case 'delete_group':
				case 'delete_inbox':
				case 'delete_outbox':
				case 'delete_array':
					$action=$_GET['action'];
					break;
				default:
					$action='delete_array';
			}//print$action;

			//exit;

			page_css($IE_TITLE);
			require_once('newai.php');
			if($action_array[1]=='array'||$action_array[1]=='inbox'||$action_array[1]=='outbox')	{
				$selectid_array=explode(',',$_GET['selectid']);
				foreach($selectid_array as $list)	{
					if(isset($list)&&$list!=''&&!empty($list))		{
						delete_array_newai($list,$fields);
					}
				}//end for
			}
			else if($action_array[1]=='group')	{
				$group_user=$file_ini[$action]['group_user'];
				exist_group_user();
			}
			else if(strlen($action_array[1])>=3)	{
				delete_array_newai($_GET[$primarykey_index],$fields);
			}
			else	{
			}
			$returnmodel=isset($_GET['returnmodel'])?$_GET['returnmodel']:$returnmodel;
			$_GET['returnmodel']=$returnmodel;

			if($_GET['searchfield']!=""&&$_GET['searchvalue']!="")		{
				$_GET['returnmodel'] .= "_search";
			}
			$_GET = array_diff_assoc($_GET,array("actionAdvDelete"=>"AdvDelete"));
			$_GET['selectid'] = '';
			$return=FormPageAction("action",$_GET['returnmodel'],'','','selectid');
			//print_R($_GET);exit;
			print_infor($common_html['common_html']['deletesuccess'],'trip',"location='?$return'","?$return");
			//pageindexo();
		break;

	case 'charts':
		$action_model=$file_ini[$action]['action_model'];
		$tablename=$file_ini[$action]['tablename'];
		$tabletitle=$file_ini[$action]['tabletitle'];
		$tablewidth=$file_ini[$action]['tablewidth'];
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$showlistfieldtype=$file_ini[$action]['showlistfieldtype'];
		page_css($IE_TITLE);
		require_once('newai.php');
		require_once('newai_charts.php');
		//print_R($file_ini[$action]);;
		$ReportHeaderText = "ͼ����Ϣͳ�������";
		ReportHeaderHtml($ReportHeaderText,"810");
		newaiCharts();
		break;

	case 'set':
		$_GET['table_name']=isset($_GET['table_name'])?$_GET['table_name']:$tablename;
		$_GET['table_action']=isset($_GET['table_action'])?$_GET['table_action']:$_GET['action'];
		$_GET['action']=isset($_GET['action'])?$_GET['action']:'set_default';
		$_GET['field_list']=isset($_GET['field_list'])?$_GET['field_list']:null;
		$action=$_GET['table_action'];

		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$showlistnull=$file_ini[$action]['showlistnull'];
		$showlistfieldlist=$file_ini[$action]['showlistfieldlist'];
		$returnmodel=$file_ini[$action]['returnmodel'];
		if($returnmodel=='')	$returnmodel=$_GET['returnmodel'];
		$showlistfieldfilter=$file_ini[$action]['showlistfieldfilter'];
		$primarykey_index=$columns[$primarykey];
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		page_css($IE_TITLE);
		require_once('systemsetting.php');

		if(sizeof($action_array)>=3&&$action_array[2]!='config')	{

			$formnewvar=formnewvar($file_ini[$action],$_GET['FLD_STR']);
			updatesystemsetting($formnewvar);
			$return=returnpageaction($mode='edit_init',array('index_name'=>'action','index_id'=>$returnmodel));
			print_infor($common_html['common_html']['setsuccess'],'trip',"location='?$return'","?$return");
			exit;
		}
		else if(sizeof($action_array)>=3&&$action_array[2]=='config')		{
			usesystemsetting();
			$return=FormPageAction("action",$returnmodel);
			//$return=returnpageaction($mode='edit_init',array('index_name'=>'action','index_id'=>$returnmodel));
			print_infor($common_html['common_html']['systemconfigsuccess'],'trip',"location='?$return'","?$return");
			exit;
		}

		$showlistfieldlist_array=explode(',',$showlistfieldlist);
		for($i=0;$i<sizeof($showlistfieldlist_array);$i++)			{
			$value['record'][$i]['name']=$html_etc[$tablename][(string)$columns[''.$showlistfieldlist_array[$i].'']];
			$value['record'][$i]['value']=$showlistfieldlist_array[$i];
		}

		//$showlistfieldlist=returnsystemsetting($tablename,$action,'FIELD_LIST',$showlistfieldlist);
		//$showlistfieldlist_array=explode(',',$showlistfieldlist);

		$value['table_name']=$tablename;
		$value['table_action']=$_GET['table_action'];
		$value['titleleft']=$common_html['common_html']['yoursetinfor'];
		$value['titleright']=$common_html['common_html']['originalinfor'];
		systemsetting_view($value);
		break;


	case 'listtwo':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$tablename_one=$file_ini[$action]['tablename_one'];
		$tablename_two=$file_ini[$action]['tablename_two'];
		$link=$file_ini[$action]['link'];
		page_css($IE_TITLE);
		require_once('newai.php');
		newai_list_two();
		break;
	case 'listone':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$tablename_one=$file_ini[$action]['tablename_one'];
		$link=$file_ini[$action]['link'];
		page_css($IE_TITLE);
		require_once('newai.php');
		newai_list_one();
		break;
	case 'tree':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$tablename_one=$file_ini[$action]['tablename_one'];
		$tablename_two=$file_ini[$action]['tablename_two'];
		$tablename_three=$file_ini[$action]['tablename_three'];
		$link=$file_ini[$action]['link'];
		require_once('newai.php');
		newai_tree();
		break;
	case 'framework':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$menu_top=$file_ini[$action]['menu_top'];
		$primary=$file_ini[$action]['primary'];
		project_framework($mode='project_framework');
		break;
	case 'menutop':
		$tablename=$file_ini[$action]['tablename'];
		$SYTEM_CONFIG_TABLE!="" ? $tablename = $SYTEM_CONFIG_TABLE : '';
		$columns=returntablecolumn($tablename);
		$html_etc=returnsystemlang($tablename,$SYTEM_CONFIG_TABLE);
		$menu_top=$file_ini[$action]['menu_top'];
		$primary=$file_ini[$action]['primary'];
		project_framework($mode='project_fw_menu');
		break;

}
$ExecTimeEnd=getmicrotime();
$ExecTime=$ExecTimeEnd-$ExecTimeBegin;
//print substr($ExecTime,0,8)." S";


$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$PHP_SELF_TEXT = array_pop($PHP_SELF_ARRAY);
//print "<a href='StudentFileNew.php?dir=.&editfile=$PHP_SELF_TEXT&n=1' class=OrgAdd target=_blank>$PHP_SELF_TEXT</a>";

//ע����ʾ
@require_once("lib/version.php");

//������ʾ�ı�
$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
array_pop($PHP_SELF_ARRAY);
array_shift($PHP_SELF_ARRAY);
//print_R($PHP_SELF_ARRAY);
if(in_array("TDLIB",$PHP_SELF_ARRAY))		{
	$SHOW1	= base64_decode($SHOWINFORLIB);;
	$SHOW2	= base64_decode($SHOWURLLIB);;
	$SHOW3	= base64_decode($SHOWTIP);;
}
else	{
	$SHOW1	= base64_decode($SHOWINFOR);;
	$SHOW2	= base64_decode($SHOWURL);;
	$SHOW3	= base64_decode($SHOWTIP);;
}


/*
if($SYSTEM_VERSION_CONTENT=="LIYE")		{
	include_once($_SERVER['DOCUMENT_ROOT']."/inc/td_core.php");
	if(!function_exists("tdoa_edu"))  {
		function tdoa_edu()	{
			return false;
		}
	}
	if(tdoa_edu())		{
	}
	else	{
		print "<BR><div align=center><input type=button class=SmallButton title='ע��������Ϣ��ʧ' value=' δע����ҵ���Ű汾 ' readonly /></div>";
	}
}
*/

if(!is_file("../../Framework/license.ini"))					{
	if(is_dir("../../Framework")&&(is_dir("../../../EDU")||is_dir("../../../TDLIB"))&&$FileDirName!="PGSQL")		{
		if($_GET['action']=="init_default"||$_GET['action']=="init_customer")		{
				print "<BR><div align=center><a href=\"$SHOW2\" title='$SHOW3' target=_blank><font color=gray>$SHOW1</font></a></div>";
		}
	}
}


?>