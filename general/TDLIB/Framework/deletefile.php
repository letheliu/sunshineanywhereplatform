<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('lib.inc.php');
empty($_GET['sessionkey'])?exit:'';
$GLOBAL_SESSION=returnsession();
$attachmentid=$HTTP_GET_VARS[attachmentid];
$attachmentname=$HTTP_GET_VARS[attachmentname];
if($_GET['action']=="delete")	{
		$pathname="../attachment/".$attachmentid."/".urldecode($attachmentname)."";
		if(is_File($pathname))			{
		@unlink($pathname);
		@rmdir("../attachment/".$attachmentid);
		}
		else	{
			exit;
		}
}

?>
