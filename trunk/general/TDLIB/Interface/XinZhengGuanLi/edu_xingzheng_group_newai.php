<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-行政考勤-组别");

	if($_GET['action'] == "add_default_data")
	{
		//print_R($_GET);
		//print_R($_POST);

		$行政组名称 = $_POST['行政组名称'];
		$_POST['组员名称'] = $_POST['COPY_TO_ID'];
		$备注 = $_POST['备注'];
		$创建人 = $_POST['创建人'];
		$创建时间 = $_POST['创建时间'];
		//$sql = "insert into edu_xingzheng_group values('','".$行政组名称."','".$组员名称."','".$备注."','".$创建人."','".$创建时间."')";
		//print $sql;exit;
		//$result = $db -> Execute($sql);
		//print "<meta http-equiv='refresh' content='1;url=?'>";
		//exit;
	}
	if($_GET['action'] == "edit_default_data")
	{
		//print_R($_GET);
		//print_R($_POST);
		//$记录编号 = $_GET['编号'];
		$_POST['组员名称'] = $_POST['COPY_TO_ID'];
		//$sql = "update edu_xingzheng_group set 组员名称='".$组员名称."' where 编号=".$记录编号;
		//print $sql;//exit;
		//$db -> Execute($sql);
		//print "<meta http-equiv='refresh' content='1;url=?'>";
		//exit;
	}

	$filetablename='edu_xingzheng_group';
	require_once('include.inc.php');


require_once("lib.xingzheng.inc.php");
//定时执行函数($函数名称='自动清理行政考勤中离职人员产生的多余数据',$间隔时间='30');

require_once('../Help/module_xingzhengkaoqin.php');



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