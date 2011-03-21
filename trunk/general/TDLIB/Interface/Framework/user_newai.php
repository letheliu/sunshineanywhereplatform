<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
CheckSystemPrivate("系统信息设置-组织机构设置");
//######################教育组件-权限较验部分##########################


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


	if($_GET['action']=="add_default_data")		{
		global $db;
		$_POST['PASSWORD']	= crypt("");
		$_POST['THEME']		= '3';
	}

	if($_GET['action']=="operation_clearpassword"&&$_GET['selectid']!="")				{
		$PASSWORD	= crypt("");
		$selectidArray = explode(',',$_GET['selectid']);
		$TempValue = sizeof($selectidArray)-2;
		for($i=0;$i<sizeof($selectidArray);$i++)			{
			$selectidValue = $selectidArray[$i];
			if($selectidValue!="")				{
				$sql = "update user set PASSWORD='$PASSWORD' where UID='$selectidValue'";
				$db->Execute($sql);
			}
		}
		page_css("您的操作己成功");
		print_infor("您的操作己成功,请返回....",'',"location='?'","?");
		exit;
	}


	//自动较验数据库表格式
	$Columns = $db->MetaColumns("user");
	if($Columns['UID']->primary_key!=1)				{
		$sql = "ALTER TABLE `user` ADD PRIMARY KEY ( `UID` ) ";
		$db->Execute($sql);
	};
	if($Columns['UID']->auto_increment!=1)				{
		$sql = "ALTER TABLE `user` CHANGE `UID` `UID` INT( 11 ) NOT NULL AUTO_INCREMENT ";
		$db->Execute($sql);
	};


	//$SYSTEM_PRINT_SQL  = 0;
	//$sql = "ALTER TABLE `user` ADD PRIMARY KEY ( UID ) ";
	//$db->Execute($sql);
	//$sql = "ALTER TABLE `user` CHANGE UID UID INT( 11 ) NOT NULL AUTO_INCREMENT ";
	//$db->Execute($sql);

	//数据表模型文件,对应Model目录下面的user_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'user';
	$parse_filename		=	'user';
	require_once('include.inc.php');
	?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>