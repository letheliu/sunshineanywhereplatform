<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();
	//print_R($_SESSION);
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
	$user_id = $_SESSION['LOGIN_USER_ID'];
	//$user_id = "ccccccccc";
	$ins_date = date("Y-m-d H:i:s");
    $SQL = "select COUNT(*) AS NUM from crm_mytable where 创建人='$user_id'";
	$rs = $db->Execute($SQL);
	if($rs->fields('NUM')==0){
		page_css("CRM桌面初始化");
		$ins_sql = "INSERT INTO `crm_mytable` (`模块编号`, `模块名称`, `模块位置`, `模块属性`, `显示行数`, `滚动显示`, `创建人`, `创建时间`, `备注`) VALUES ('02', 'crm_kehu_birthday.php', '右边', '用户必选', '0', '1', '".$user_id."', '".$ins_date."', 'CRM客户生日提醒'),
  ('03', 'crm_notes.php', '右边', '用户必选', '0', '1', '".$user_id."', '".$ins_date."', 'CRM桌面便签'),
('04', 'crm_mytable_kehugaishu.php', '左边', '用户必选', '0', '1', '".$user_id."', '".$ins_date."', 'CRM客户概述'),
('05', 'crm_mytable_feiyong.php', '左边', '用户必选', '4', '1', '".$user_id."', '".$ins_date."', 'CRM费用管理'),
('06', 'crm_mytable_fuwu.php', '左边', '用户必选', '4', '1', '".$user_id."', '".$ins_date."', 'CRM服务管理'),
('07', 'crm_mytable_hetong.php', '左边', '用户必选', '4', '1', '".$user_id."', '".$ins_date."', 'CRM合同管理'),
('08', 'crm_mytable_dingdan.php', '左边', '用户必选', '4', '1', '".$user_id."', '".$ins_date."', 'CRM订单管理'),
('01', 'crm_google.php', '右边', '用户必选', '0', '1', '".$user_id."', '".$ins_date."', 'Google在线翻译'),
('09', 'kehu_chaxun.php', '右边', '用户必选', '0', '0', '".$user_id."', '".$ins_date."', 'CRM客户查询'),
('10', 'crm_mytable_tongzhi.php', '右边', '用户必选', '0', '0', '".$user_id."', '".$ins_date."', 'CRM紧急通知');";

       $db->Execute($ins_sql);

    print "<div align=\"center\" title=\"初始化CRM左面模块\">
		   <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
		   <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;您的桌面模块已经完成初始化，请使用.</div>
		   </td></tr></table><br><div align=center>";
	print "<input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-2);\"></div>";
	exit;
	}


    if($_GET['action']=="edit_default_data")    {
	   page_css('显示行数限制');
	   $显示行数 = $_POST['显示行数'];
	   if($显示行数 > 4){
	     print "<div align=\"center\" title=\"显示行数限制提醒\">
			    <table class=\"MessageBox\" align=\"center\" width=\"650\"><tr><td class=\"msg info\">
			    <div class=\"content\" style=\"font-size:12pt\">&nbsp;&nbsp;为了保持桌面模块的整齐一致，显示行数不能大于4，请重新设置.</div>
			    </td></tr></table><br><div align=center>";
	     print "<input type=button  value=\"返回\" class=\"SmallButton\" onClick=\"history.go(-1);\"></div>";
		 exit;
	   }
	}


	$_GET['创建人'] = $user_id;

	$filetablename		=	'crm_mytable';
	$parse_filename		=	'crm_mytable_person';
	require_once('include.inc.php');

	   	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
			$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
			$PrintText .= "<TR class=TableContent><td>说明：<br>
			&nbsp;&nbsp;&nbsp;1、如果是第一次登录系统，系统将对CRM桌面模块进行初始化。<br>
			&nbsp;&nbsp;&nbsp;2、初始化完成后，用户可以自定义桌面模块的显示。        
			               </td></TR></table>";
			print $PrintText;
		}

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