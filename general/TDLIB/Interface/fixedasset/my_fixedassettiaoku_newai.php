<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();



	//$_GET['所属状态'] = "资产已报废";//资产已报废

	$_GET['批准人'] = $_SESSION['LOGIN_USER_NAME'];
	//对校长查看权限进行特殊定义
	if($_GET['指定人员']!="")			{
		$指定人员姓名 = returntablefield("user","USER_ID",$_GET['指定人员'],"USER_NAME");
		$_GET['批准人'] = $指定人员姓名;
	}
	else	{
		$_GET['批准人'] = $_SESSION['LOGIN_USER_NAME'];
	}
	$filetablename='fixedassettiaoku';
	$parse_filename = "my_fixedassettiaoku";


require_once('include.inc.php');

require_once('../Help/module_fixxedasset.php');

?>