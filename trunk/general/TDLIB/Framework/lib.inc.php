<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


//other dir file
require_once('../adodb/adodb.inc.php');
require_once('../config.inc.php');
require_once('../setting.inc.php');
require_once('../adodb/session/adodb-session2.php');

require_once('../Enginee/lib/init.php');
require_once('../Enginee/lib/html_element.php');
require_once('../Enginee/lib/function_system.php');
require_once('../Enginee/lib/select_menu.php');
require_once('../Enginee/lib/select_menu_two.php');
require_once('../Enginee/lib/select_menu.php');
require_once('../Enginee/lib/getpagedata.php');
require_once('../Enginee/lib/getpagedata_new.php');
require_once('../Enginee/lib/other.php');
require_once('../Enginee/lib/fzhu.php');
require_once('../Enginee/lib/select_menu_countryCode.php');


require_once('./cache.inc.php');
require_once('./lib.calendar.inc.php');

//�Ӳ˵�Ȩ�޹�����,ͬʱ��FRAMEWORK��EDU������ж���
function returnPrivMenu($ModuleName)		{
	global $db,$_SERVER,$_SESSION;
	return 1;//�����н���Ȩ��,ֱ�����

	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$PHP_SELF = array_pop($PHP_SELF_ARRAY);
	$sql = "select * from systemprivateinc where `FILE`='$PHP_SELF' and `MODULE`='$ModuleName'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray(); //print_R($rs_a);
	$DEPT_NAME = $rs_a[0]['DEPT_ID'];
	$USER_NAME = $rs_a[0]['USER_ID'];
	$ROLE_NAME = $rs_a[0]['ROLE_ID'];
	$return = 0;
	//������Ϊ��ʱ������ж�
	if($DEPT_NAME==""&&$USER_NAME==""&&$ROLE_NAME=="")		{
		$return = 1;
	}
	//ȫ�岿��
	if($DEPT_NAME=="ALL_DEPT")			{
		$return = 1.5;
	}
	//�û��ж�
	$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];
	$LOGIN_USER_ID_ARRAY = explode(',',$USER_NAME);
	if(in_array($LOGIN_USER_ID,$LOGIN_USER_ID_ARRAY))		{
		$return = 2;
	}
	//�����ж�
	$LOGIN_DEPT_ID = $_SESSION['LOGIN_DEPT_ID'];
	$LOGIN_DEPT_ID_ARRAY = explode(',',$DEPT_NAME);
	if(in_array($LOGIN_DEPT_ID,$LOGIN_DEPT_ID_ARRAY))		{
		$return = 3;
	}
	//��ɫ�ж�
	$LOGIN_USER_PRIV = $_SESSION['LOGIN_USER_PRIV'];
	$LOGIN_USER_PRIV_ARRAY = explode(',',$ROLE_NAME);
	if(in_array($LOGIN_USER_PRIV,$LOGIN_USER_PRIV_ARRAY))		{
		$return = 4;
	}
	//print_R($_SESSION);
	return $return;
}

$����汾��FILES = @parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$����汾��S = $����汾��FILES['SCHOOL_MODEL'];
?>