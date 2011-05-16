<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	//print_r($_POST);exit;

	if($_GET['action']=="view_default"){
	   header( "Location:   xiaoshoudingdan.php?编号=".$_GET['编号']."");
	}



	//新建时加载销售订单页面
	if($_GET['action']=="add_default")	
	{
		//print_R($_GET);print_R($_POST);//exit;
		//header( "Location:   xiaoshoudingdan.php");
		//print  "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=xiaoshoudingdan.php'>";
		include('xiaoshoudingdan.php');
		exit;
	}


	//提交后的数据操作
	if($_GET['action'] == "submit")
	{
						print_r($_POST);
		$编号 = "";
		$订单编号 = $_POST['tablecode'];
		$订单日期 = $_POST['tabledate'];
		$客户 = $_POST['客户名称'];

		$订单金额扣税 = $_POST['amt'];
		$订单金额扣税 = $_POST['stockid'];
/*
		[stockid] => 1
		[factpayamt] => -1.00
		[intype] => 1
		[payamt] => 5.00 
		[stockinsign] => 3
		[rebate] => 2 
		[buyman] => 系统管理员 
		[sendDate] => 2011-03-10
		[payment] => 46 
		[sellfrom] => 1
		[customerPO] => 4 
		[orderamt] => 5.00
		[datascope] => 0
		[sendAmt] => 6.00 
		[subAmt] => 7.00 
		[a_count] => 19 
		[Add_fieldName] 
		*/
//(`编号`, `订单编号`, `订单日期`, `客户`, `销售部门`, `订单金额扣税`, `订单金额含税`, `计划类型`, `已收款含定金`, `项目`, `备注`, `销售业务员`, `预计送货日期`, `收款方式`, `销售来源`, `客订单号`, `单据来源`, `预收定金`, `收款时限`, `发生费用`, `抵扣金额`) 
			//print '11';
			exit;
	}


	if($_GET['action']=="edit_default_data")		{
		//print_R($_GET);print_R($_POST);//exit;
		header( "Location:   xiaoshoudingdan.php?编号=".$_GET['编号']."");
		//include_once('销售订单管理.htm');
		//exit;


		}

/*
		if($_GET['action']=="add_default_date")		{
			if($_GET['action'] == "submit")
			{
			//print_r($_POST);
			print '11';
			exit;
			}

			exit;
		}

*/
		




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

	//数据表模型文件,对应Model目录下面的crm_order2_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'crm_order2';
	$parse_filename		=	'crm_order2';
	require_once('include.inc.php');
	?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>