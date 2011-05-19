<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('adodb/adodb.inc.php');
require_once('config.inc.php');
$method=$_GET[method];

$_GET['exportsql']=ereg_replace(':',"'",$_GET['exportsql']);//exit;
if(isset($_GET['exportsql']))	{
	global $db;
	$sql=explode(' ',$_GET['exportsql']);//
	//print_R($sql);exit;
	//print $_GET['exportsql'];exit;
	if($sql[0]!='select'||$sql[2]!='from')	exit;
	$fields=explode(',',trim($sql[1]));
	$string=join(',',array_unique($fields));

	$rs=$db->CacheExecute(150,$_GET['exportsql']);
	$array=$rs->GetArray();
		$targetarray=array();
		array_push($targetarray,$string);
	foreach($array as $list)	{
		array_push($targetarray,join(',',$list));			
	}
	$content=join("\n",$targetarray);

	///*
	header("Pragma: no-cache");
	header("Cache-control: private");
	header("Content-Disposition: attachment; filename=".$_GET['tablename']."_".gmdate("Y_m_d_H_i").".csv");
	header("Content-Type: text/csv; charset=UTF-8");
	header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
	header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
	header( "Cache-Control: post-check=0, pre-check=0", false );
	header("Content-Length: ".strlen($content));
	print $content;
	exit;
}
?>