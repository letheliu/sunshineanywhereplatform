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

    	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>请点击按钮初始化桌面模块数据：
			               <input type=button name=csh class=SmallButton value=初始化>
			               </td></table>";
			print $PrintText;
		}
		*/
	$filetablename		=	'crm_mytable';
	$parse_filename		=	'crm_mytable';
	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>说明：<br>
                            &nbsp;&nbsp;&nbsp;1、此模块是管理使用的，具有管理所有用户桌面模块设置的权限。<br>
			                &nbsp;&nbsp;&nbsp;2、如果是第一次登录系统，系统将对CRM桌面模块进行初始化。<br>        
			               </td></table>";
			print $PrintText;
		}
	?>