<?
session_start();
?>
<link rel="stylesheet" type="text/css" href="/theme/<?=$_SESSION['LOGIN_THEME']?>/style.css">
<html>
<head>
<title>����˵��</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body class="bodycolor">


<?

$PrintText  = "<table  class=TableBlock align=center width=100%>";
$PrintText .= "<TR class=TableHeader><td ><font color=green >
�̲Ĳ���ʵʩ��������ͼ
</font></td></tr>";
$PrintText .= "<TR class=TableData><td >
<img src=\"flowgraph_jiaocai.png\" border=0>
</td></tr></table>";
	print $PrintText;

?>
