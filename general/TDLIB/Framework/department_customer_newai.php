<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
$filetablename='department';
require_once('../Enginee/lib/init.php');
$_GET['action']=checkreadaction('init_customer');
require_once('include.inc.php');
?>