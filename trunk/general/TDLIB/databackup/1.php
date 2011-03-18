<?

$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$PHP_SELF_FILE = @array_pop($PHP_SELF_ARRAY);
if($PHP_SELF_FILE=="1.php")		{
	//非法执行
	print "非法执行";exit;
}

$EXPORT_DATE = Date("Y-m-d-H-i");

if(is_file("../index.php"))        {
    require_once('../general/TDLIB/include.inc.php');
    $sql = "../general/TDLIB/databackup/sunshine20CRM.sql";
}
else if(is_file("general/TDLIB/include.inc.php"))        {
    require_once('general/TDLIB/include.inc.php');
    $sql = "general/TDLIB/databackup/sunshine20CRM.sql";
}
//print_R($_SESSION);
//print_R($sql);exit;
//


//exit;


if(is_file($sql))    {
		global $_SESSION,$db;
		$SUNSHINE_MYSQL_VERSION = $_SESSION['SUNSHINE_MYSQL_VERSION'];
		if($SUNSHINE_MYSQL_VERSION=="")				{
			$ServerInfo = $db->ServerInfo();
			$_SESSION['SUNSHINE_MYSQL_VERSION'] = $ServerInfo['version'];
			$SUNSHINE_MYSQL_VERSION = $_SESSION['SUNSHINE_MYSQL_VERSION'];
		}//得到MYSQL VERSION的值
		if($SUNSHINE_MYSQL_VERSION>='5.0.0')				{
			//MYSQL 4版本,不能执行SET NAMES GBK等操作
			$db->Execute("set names gbk");
		}
        $file = file($sql);
        $fileText = join('',$file);
        $FileArray = explode(';',$fileText);
        //print "<BR>正在执行数据库操作，请稍候...";
        for($i=0;$i<sizeof($FileArray);$i++)        {
			$sql = TRIM($FileArray[$i]);
			if($sql=="SET USER PRIV ALL")		{
				$sql = "select FUNC_ID from TD_OA.sys_function";
				$rs = $db->Execute($sql);
				$rs_a = $rs->GetArray();
				$NewText = '';
				for($iX=0;$iX<sizeof($rs_a);$iX++)		{
					$FUNC_ID = $rs_a[$iX]['FUNC_ID'];
					$NewText .= "$FUNC_ID,";
				}
				$sql = "update TD_OA.user_priv set FUNC_ID_STR='$NewText' where USER_PRIV='1'";
				$rs = $db->Execute($sql);
				//print $sql;exit;
			}
			else	{
				//print "<BR>".$sql;
				//print "\n".$i;
				$rs = $db->Execute($FileArray[$i]);
				//print $rs->EOF;
				//print $sql;exit;
			}
        }
		//exit;

}
else    {
    print $sql."不存在";
}
//exit;

include_once( "inc/utility.php" );
include_once( "inc/conn.php" );
include_once( "inc/update.php" );
include_once( "inc/td_core.php" );
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