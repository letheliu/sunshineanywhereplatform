<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('lib.inc.php');
//empty($_GET['sessionkey'])?exit:'';
//$GLOBAL_SESSION=returnsession();
$attachmentid=$_GET[attachmentid];
$attachmentname=$_GET[attachmentname];
if($_GET['action']=="download")	{
		$pathname="../attachment/".$attachmentid."/".urldecode($attachmentname)."";
		is_file($pathname)?'':$pathname="attachment/".$attachmentid."/".urldecode($attachmentname)."";
		if(is_File($pathname))			{
		$filesize = filesize($pathname);
		$file = fopen($pathname,"r");
		header('Pragma: no-cache');
		header("Cache-control: private");
		header("Content-type: application/octet-stream");
		header("Content-Length: $filesize");
		header("Content-Disposition: attachment; filename=\"".urldecode($attachmentname)."\"");
		header("Content-Description: ".$_SERVER['SERVER_NAME']);
		echo fread($file,$filesize);
		fclose($file);
		exit;
		}
		else	{
			exit;
		}
}

if($_GET['action']=="picturefile")	{
		$pathname="../attachment/".$attachmentid."/".urldecode($attachmentname)."";
		is_file($pathname)?'':$pathname="attachment/".$attachmentid."/".urldecode($attachmentname)."";
		if(is_File($pathname))			{
		}
		else	{
			$pathname = "images/nopicture.jpg";
		}
		$filesize = filesize($pathname);
		$file = fopen($pathname,"r");
		header('Pragma: no-cache');
		header("Cache-control: private");
		header("Content-type: image/gif");
		header("Content-Length: $filesize");
		header("Content-Disposition: attachment; filename=\"".urldecode($attachmentname)."\"");
		header("Content-Description: ".$_SERVER['SERVER_NAME']);
		echo fread($file,$filesize);
		fclose($file);
		exit;
		
}

if($_GET['action']=="directpicturefile")	{
		$ID = $_GET['ID'];
		$pathname="../Picture/".$ID.".jpg";
		if(!is_File($pathname))			{
			$pathname="../Picture/".$ID.".JPG";
		}
		else if(!is_File($pathname))			{
			$pathname="../Picture/".$ID.".gif";
		}
		else if(!is_File($pathname))			{
			$pathname="../Picture/".$ID.".GIF";
		}
		else if(!is_File($pathname))			{
			$pathname = "images/nopicture.gif";
		}
		$filesize = filesize($pathname);
		$file = fopen($pathname,"r");
		header('Pragma: no-cache');
		header("Cache-control: private");
		header("Content-type: image/gif");
		header("Content-Length: $filesize");
		header("Content-Disposition: attachment; filename=\"".urldecode($attachmentname)."\"");
		header("Content-Description: ".$_SERVER['SERVER_NAME']);
		echo fread($file,$filesize);
		fclose($file);
		exit;
		
}
if($_GET['action']=="binaryfile")		{
require_once('include.inc.php');
$sql="select * from student where xuehao='20021052157'";
$rs=$db->Execute($sql);
$file=$rs->fields['photo'];
//header('Pragma: no-cache');
//header("Cache-control: private");
header("Content-type: image/gif");
echo stripslashes($file);
}
?>
