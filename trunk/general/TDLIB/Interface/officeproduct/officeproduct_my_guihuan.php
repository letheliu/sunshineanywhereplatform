<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();




$_GET['归还人'] = $_SESSION['LOGIN_USER_NAME'];
$_GET['action']=checkreadaction('init_customer');
	//对校长查看权限进行特殊定义
	if($_GET['指定人员']!="")			{
		$指定人员姓名 = returntablefield("user","USER_ID",$_GET['指定人员'],"USER_NAME");
		$_GET['归还人'] = $指定人员姓名;
	}
	else	{
		$_GET['归还人'] = $_SESSION['LOGIN_USER_NAME'];
	}

$filetablename='officeproducttui';
require_once('include.inc.php');

require_once('../Help/module_officeproduct.php');

?>