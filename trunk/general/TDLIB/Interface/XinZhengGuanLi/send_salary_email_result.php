<?  ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
    require_once('lib.inc.php');
	
	$GLOBAL_SESSION=returnsession();
//include_once( "inc/auth.php" );
include_once( "inc/utility_all.php" );
include_once( "inc/utility_sms1.php" );
include_once( "inc/utility_sms2.php" );
//include_once( "sms.php" );
$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];
?>
<html><head><title>发送EMAIL工资条</title><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<? echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/";
echo $LOGIN_THEME == "" ? "1" : $LOGIN_THEME;
echo "/style.css\">\r\n";   ?>
</head>
<body class="bodycolor" topmargin="5">
<?
$yue=date("m");
//$yue=$yue-1;
$SUBJECT=$yue.'月工资条';
$y=date('Y');


$SEND_TIME = date( "Y-m-d H:i:s" );
$rs=$db->Execute("select USER_ID,USER_NAME from user");
$people=$rs->GetArray();
if($rs->RecordCount()<=0) {message( "提示", "没有工资条数据" );
	button_back( );exit();}
for($i=0;$i<sizeof($people);$i++){
    $USERID=$people[$i][USER_ID];
	$salary=$db->Execute("select 费用名称,金额 from hrms_salary_detail where 费用人员='".$people[$i]['USER_NAME']."' and 月份='".$yue."' and 年份='".$y."'");
	$item=$salary->GetArray();
	if($salary->RecordCount()<=0) {message( "提示", "没有工资条数据" );
	button_back( );exit();}
	$TR = "<br><div align=center>\n<table border=0 cellspacing=1 class=TableBlock cellpadding=3>\n";
	$TR .= "<tr class=TableContent><td nowrap align=center width=120><b>工资项目</b></td><td nowrap align=center width=80><b>金额</b></td></tr>\n";
	for($j=0;$j<sizeof($item);$j++){
		$TR .="<tr class=TableData>";
		$TR .= "<td nowrap align=center>".$item[$j]['费用名称']."</td>";
	    $TR .= "<td nowrap align=center>".$item[$j]['金额']."</td>";
		$TR .= "</tr>\n";
	
	}
	$TR .="</table></div>";

   $CONTENT=$TR;
$sql="insert into email_body(FROM_ID,TO_ID2,COPY_TO_ID,SUBJECT,CONTENT,SEND_TIME,ATTACHMENT_ID,ATTACHMENT_NAME,SEND_FLAG,IMPORTANT) select '".$LOGIN_USER_ID."' as FROM_ID,'{$USERID},' as TO_ID2,'' as COPY_TO_ID ,'{$SUBJECT}' as SUBJECT,'{$CONTENT}' as CONTENT,'{$SEND_TIME}' as SEND_TIME,'' as ATTACHMENT_ID,'' as ATTACHMENT_NAME,'1' as SEND_FLAG,'0' as IMPORTANT from USER where USER_ID='{$USERID}' and  NOT_LOGIN='0'";
$email1=$db->Execute($sql);
$BODY_ID=$db->Insert_ID();
$query = "INSERT INTO EMAIL(TO_ID,READ_FLAG,DELETE_FLAG,BOX_ID,BODY_ID) values('".$USERID."','0','0','0','{$BODY_ID}')";
$email2=$db->Execute($query);
$ROW_ID = $db->Insert_ID();
$REMIND_URL = "email/inbox/read_email/?BOX_ID=0&EMAIL_ID=".$ROW_ID;
				$SMS_CONTENT = "请查收邮件！\n主题：".$SUBJECT;
				send_sms( "", $LOGIN_USER_ID, $USERID, 2, $SMS_CONTENT, $REMIND_URL );
}


	message( "提示", "工资条已发送" );
	button_back( );
?>

</body></html><?
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