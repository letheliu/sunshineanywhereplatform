<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	/*
	if($_GET['action']=="add_default_data")		{
		//print_R($_GET);print_R($_POST);//exit;
		global $db;
		$入库数量 = (int)$_POST['入库数量'];$教材编号 = $_POST['教材编号'];
		$sql = "update edu_jiaocai set 现有库存=现有库存+$入库数量 where 教材编号='".$教材编号."'";
		$rs = $db->Execute($sql);//print $sql;exit;
		$_POST['编作者'] = returntablefield("edu_jiaocai","教材编号",$教材编号,"编作者");
		$_POST['出版社'] = returntablefield("edu_jiaocai","教材编号",$教材编号,"出版社");
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?'>";
	}
	*/

	//数据表模型文件,对应Model目录下面的user_code_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'user_code';
	$parse_filename		=	'user_code';
	require_once('include.inc.php');


if($_GET['action']==''||$_GET['action']=='init_default')		{
$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
$PrintText .= "<TR class=TableContent><td ><font color=green >
教师考勤模块原理：<BR>
&nbsp;&nbsp;1、一卡通使用权限和外网访问权限提供给第三方厂家调用。<BR>
&nbsp;&nbsp;2、同步标识为用户修改密码或管理员清空用户密码时,同步标识为否,第三方系统同步操作完成以后同步标识为是。<BR>

</font></td></table>";
print $PrintText;
}

?>