<?
session_start();
?>
<link rel="stylesheet" type="text/css" href="/theme/<?=$_SESSION['LOGIN_THEME']?>/style.css">
<html>
<head>
<title>帮助说明</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body class="bodycolor">


<?

$PrintText  = "<table  class=TableBlock align=center width=100%>";
$PrintText .= "<TR class=TableContent><td ><font color=green >
教师考勤部分实施必读手册(流程图以及概念性说明)
</font></td></tr>";
$PrintText .= "<TR class=TableData><td >
<img src=\"flowgraph_teacherkaoqin.png\" border=0>
</td></tr></table>";
	print $PrintText;

require_once('../Help/module_teacherkaoqinmingxi_datalist.php');

require_once('../Help/module_teacherkaoqin_yuanshidaka.php');


?>
