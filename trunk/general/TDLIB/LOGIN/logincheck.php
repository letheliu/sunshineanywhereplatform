<?

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('include.inc.php');
//$��ǰ׺ = "TD_OA.";
//print_R($db);
function logincheck($username,$password)							{
	global $db,$��ǰ׺;
	$SQL		= "SELECT * FROM ".$��ǰ׺."user WHERE USER_ID = '$username'";
	$rs			= $db->Execute($SQL);
	$rs_a		= $rs->GetArray();
	$USER_ID	= $rs_a[0]['USER_ID'];
	$PASSWORDTEXT = $rs_a[0]['PASSWORD'];
	//print crypt('', $PASSWORDTEXT) == $PASSWORDTEXT;
	//print_R($password);print_R($PASSWORDTEXT);exit;
	if($USER_ID!="")												{
		if(crypt($password,$PASSWORDTEXT) == $PASSWORDTEXT)			{
			//������ȷ
			return $rs_a;
			exit;
		}
		else	{
			//�������
			//print_R($password);print_R($username);exit;
			echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
			exit;
		}
	}
	else	{
		//�û���������
		//print_R($password);print_R($_POST);exit;
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
		exit;
	}
	exit;
}
//$array=explode('||',$_GET['checkstring']);//print_R($array);
//$username=$array[0];
//$password=$array[1];
//print $username.$password;exit;

//����������ĸ =
$checkUserName = explode('=',$_REQUEST['username']);
$checkUserPassword = explode('=',$_REQUEST['password']);
if(sizeof($checkUserName)>1||sizeof($checkUserPassword)>1)  {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
}
//����������ĸ "
$checkUserName = explode('"',$_REQUEST['username']);
$checkUserPassword = explode('"',$_REQUEST['password']);
if(sizeof($checkUserName)>1||sizeof($checkUserPassword)>1)  {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
}
//����������ĸ '
$checkUserName = explode("'",$_REQUEST['username']);
$checkUserPassword = explode("'",$_REQUEST['password']);
if(sizeof($checkUserName)>1||sizeof($checkUserPassword)>1)  {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";
}

$rs_a	=	logincheck($_REQUEST['username'],$_REQUEST['password']);
//print_R($rs_a);
if($rs_a[0]['USER_NAME']!='')	{
	session_start();
	$_SESSION['LOGIN_UID']		=	$rs_a[0]['UID'];
	$_SESSION['LOGIN_USER_ID']	=	$rs_a[0]['USER_ID'];
	$_SESSION['LOGIN_DEPT_ID']	=	$rs_a[0]['DEPT_ID'];
	$_SESSION['LOGIN_USER_PRIV']=	$rs_a[0]['USER_PRIV'];
	$_SESSION['LOGIN_THEME']	=	$rs_a[0]['THEME'];
	$_SESSION['LOGIN_AVATAR']	=	$rs_a[0]['AVATAR'];
	$_SESSION['LOGIN_USER_NAME']=	$rs_a[0]['USER_NAME'];


	//$USER_PRIV_TEXT = returntablefield("user_priv","USER_PRIV",$rs->fields['USER_PRIV'],"PRIV_NO");
	$sql = "select FUNC_ID_STR from ".$��ǰ׺."user_priv where USER_PRIV='".$rs_a[0]['USER_PRIV']."'";
	$rs_user_priv = $db->Execute($sql);
	$rs_user_priv_array = $rs_user_priv->GetArray();
	$FUNC_ID_STR = $rs_user_priv_array[0]['FUNC_ID_STR'];
	$_SESSION['LOGIN_FUNC_ID_STR'] = $FUNC_ID_STR;

	$DEPT_ID=$rs_a[0]['DEPT_ID'];
	$sql="select DEPT_NAME from ".$��ǰ׺."department where DEPT_ID='$DEPT_ID'";
	//print $sql;
	$rs_d=$db->Execute($sql);
	$DEPT_NAME=$rs_d->fields['DEPT_NAME'];

	$USER_PRIV=$rs_a[0]['USER_PRIV'];
	$sql="select PRIV_NAME from ".$��ǰ׺."user_priv where USER_PRIV='$USER_PRIV'";
	//print $sql;
	$rs_u=$db->Execute($sql);
	$PRIV_NAME=$rs_u->fields['PRIV_NAME'];

	$_SESSION[$SUNSHINE_USER_DEPT_NAME_VAR]=$DEPT_NAME;
	$_SESSION[$SUNSHINE_USER_PRIV_NAME_VAR]=$PRIV_NAME;
	//print $SUNSHINE_USER_AVATAR_VAR;

	//print_R($_SESSION);print_R($_GET);exit;
	$MENU_TYPE = 0;

	//��־��¼
	//system_log_input('��¼�ɹ�');

	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=../Framework/index.php'>\n";


	//echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=Framework/index.php'>\n";
}
else	{
	//system_log_input('��¼ʧ��');
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=notchecked.php'>\n";

}
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