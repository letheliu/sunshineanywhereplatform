<?php
	require_once("lib.inc.php");
	
	$GLOBAL_SESSION=returnsession();

	$common_html=returnsystemlang('common_html');



	$_GET['所属状态'] = "购置未分配,购置已分配,资产已分配,资产已归还";

	$filetablename='fixedasset';
	require_once('include.inc.php');

 ?>