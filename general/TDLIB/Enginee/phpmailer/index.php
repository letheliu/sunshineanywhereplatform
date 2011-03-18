<?
require_once('class.smtp.php');
require_once('class.phpmailer.php');

//##########################################################################
//下面是利用PHPMAILER发送邮件的代码#########################################
//##########################################################################

$mail = new PHPMailer();

function sendmail_phpmailer($subject,$body,$emailArray,$adminemail)	{

global $emailaddress,$server,$username,$password,$ischeck;
global $mail;
//$mail = new PHPMailer();

$mail->IsSMTP();          // send via SMTP
$mail->Host     =$server; // SMTP servers
if($ischeck)		{
	$mail->SMTPAuth =true;     // turn on SMTP authentication
}
else	{
	$mail->SMTPAuth =false;     // turn on SMTP authentication
}
$mail->Username =$username;  // SMTP username
$mail->Password =$password; // SMTP password

$mail->From     =$adminemail;
$mail->FromName =$adminemail;
//print $username.$password.$adminemail.$server;
//###################################################################################
//下面是关于邮件列表地址的代码#######################################################
//###################################################################################
if(is_array($emailArray))	{
	for($i=0;$i<sizeof($emailArray);$i++)	{
		if(trim($emailArray[$i])!="")	{
			$mail->AddAddress($emailArray[$i],$emailArray[$i]); 
		}
	}
}
//$mail->AddAddress("jiyun512@eyou.com","王纪云"); 
$mail->AddReplyTo($adminemail,$adminemail);

$mail->WordWrap = 50;                              // set word wrap
//$mail->AddAttachment("/var/tmp/file.tar.gz");      // attachment
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); 
$mail->IsHTML(true);                              // send as HTML

$mail->Subject  =$subject;
//$mail->Encoding     = "gb2312";
$mail->Body     =$body;
//$mail->AltBody  =$altbody;

//print_R($mail);
if(!$mail->Send())
{
   RETURN 0;
}
else {
RETURN 1;
}
}//end function 

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