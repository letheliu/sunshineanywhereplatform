<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?php


$from= "王纪云";
$to = "王纪云";
$subject = "职场宝典：CIO忽悠老板的四大“法宝”";
$letter = "==========tongda==========";
$attachment = "职场宝典：CIO忽悠老板的四大“法宝”.txt";



//下载文件
$newfile = $subject.".eml";
$URL = "http://".$_SERVER['SERVER_NAME'];
header('Pragma: no-cache');
header("Cache-control: private");
//header("Content-type: application/octet-stream");text/plain 
header("Content-type: application/octet-stream");
//header("Content-Length: $filesize");
header("Content-Disposition: attachment; filename=\"$newfile");
header("Content-Description: $URL");



echo   "Date: ".date(r)."\n";;
echo   "From: \"$from\" <chr>\n";
echo   "MIME-Version: 1.0\n";
echo   "To: \"$to\" <chr>\n";
echo   "Subject: $subject\n";
echo   "Content-Type: multipart/mixed;\n";
echo   " boundary=\"$letter\"\n\n";
echo   "This is a multi-part message in MIME format.\n";
echo   "--$letter\n";
echo   "Content-Type: text/html;\n";
echo   "charset=\"gb2312\"\n";
echo   "Content-Transfer-Encoding: base64\n\n";
//$Content = "邮件内容测试!";
//echo   base64_encode($Content)."\n\n";
echo   $Content;







echo   "\n\n\n--$letter\n";
echo   "Content-Type: application/octet-stream;\n";
echo   "	name=\"$attachment\"\n";
echo   "Content-Transfer-Encoding: base64\n";
echo   "Content-Disposition: attachment;\n";
echo   "	filename=\"$attachment\"\n";
$filename = "dir.class.php";
if(is_file($filename))	{
	$handle = fopen($filename,r);
	$contents = fread ($handle, filesize ($filename));
	//$filesize = filesize ($filename);
	fclose ($handle); 
	echo   "\n\n\n";
	echo   base64_encode($contents)."\n";
}

exit;
?>