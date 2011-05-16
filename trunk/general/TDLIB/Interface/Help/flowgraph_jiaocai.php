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
$PrintText .= "<TR class=TableHeader><td ><font color=green >
教材部分实施操作流程图
</font></td></tr>";
$PrintText .= "<TR class=TableData><td >
<img src=\"flowgraph_jiaocai.png\" border=0>
</td></tr></table>";
	print $PrintText;

?>
