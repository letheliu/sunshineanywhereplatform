<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-人事管理-人事档案");


	$filetablename='hrms_file';
	require_once('include.inc.php');
	?>