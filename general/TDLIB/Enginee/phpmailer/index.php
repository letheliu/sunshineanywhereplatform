<?
require_once('class.smtp.php');
require_once('class.phpmailer.php');

//##########################################################################
//����������PHPMAILER�����ʼ��Ĵ���#########################################
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
//�����ǹ����ʼ��б��ַ�Ĵ���#######################################################
//###################################################################################
if(is_array($emailArray))	{
	for($i=0;$i<sizeof($emailArray);$i++)	{
		if(trim($emailArray[$i])!="")	{
			$mail->AddAddress($emailArray[$i],$emailArray[$i]); 
		}
	}
}
//$mail->AddAddress("jiyun512@eyou.com","������"); 
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

?>