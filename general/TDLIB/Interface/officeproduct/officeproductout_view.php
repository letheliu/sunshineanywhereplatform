<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();



$_GET['action']=checkreadaction('init_customer');

$filetablename='officeproductout';
require_once('include.inc.php');
 ?>