<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
$username=$_POST['username'];
$password=$_POST['password'];
$checkstring=$username."||".$password;
?>
<script>
//window.open ('logincheck.php?checkstring=<?=$checkstring?>', 'newwindow', 'top=0,left=0, toolbar=yes, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
</script>
<script language="javascript">
<!--
var dc=document; 

dc.write('<scr'+'ipt language="javascript" ');
dc.write('>window.showModelessDialog("http://office.sndg.net/');
dc.write('logincheck.php?checkstring=<?=$checkstring?>","dialogwin","scroll:1;status:1;help:0;resizable:1;dialogWidth:1024px;dialogHeight:768px")</scr'+'ipt>');
-->
</script>
<?
//echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=javascript:window.open (\"logincheck.php?checkstring=$checkstring\", \"newwindow\", \"top=0,left=0, toolbar=yes, menubar=no, scrollbars=no, resizable=no,location=no, status=no\")'>\n";
?>