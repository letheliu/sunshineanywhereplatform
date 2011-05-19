<?php // 

$filename = "priv.php";
$获得文件内容 = file($filename);;
$获得文件内容TEXT = array_pop($获得文件内容);
//print_R($获得文件内容[2]);;exit;
$文件句柄 = fopen($filename,'rb');
$文件内容 = fread($文件句柄,filesize($filename));
$文件内容Array = explode(";return;?>",$文件内容);;
fclose($文件句柄);
$文件内容_前半部分Array = explode("<?php //",$文件内容Array[0]);;
$文件内容_前半部分内容 = $文件内容_前半部分Array[1];
$文件内容_前半部分内容 = ereg_replace("__FILE__","'".$filename."'",$文件内容_前半部分内容);;

$文件内容_前半部分内容Array = explode(";",$文件内容_前半部分内容);;

//执行普通操作
for($i=0;$i<sizeof($文件内容_前半部分内容Array)-1;$i++)			{
	$ELEMENT = $文件内容_前半部分内容Array[$i];
	eval($ELEMENT.";"); 
	//highlight_string($ELEMENT);	print "<HR>";
}
//
//执行EVAL操作
$EVAL操作内容 = array_pop($文件内容_前半部分内容Array);
$EVAL操作内容替换结果 = ereg_replace("eval","",$EVAL操作内容);;
$EVAL操作内容替换结果 = substr($EVAL操作内容替换结果,2,-2);;
$EVAL操作内容替换结果 = substr($EVAL操作内容替换结果,13,-2);;
//$EVAL操作内容替换结果 = ereg_replace("\$\$O0O0000O0","base64_decode",$EVAL操作内容替换结果);;
//print $$O0O0000O0;
$EVAL操作内容替换结果 = base64_decode($EVAL操作内容替换结果);
//print $EVAL操作内容替换结果;exit;
//eval($文件内容_前半部分内容);
//print_R($文件内容_前半部分内容);

$EVAL操作内容替换结果Array = explode(";",$EVAL操作内容替换结果);;


//执行普通操作
for($i=0;$i<sizeof($EVAL操作内容替换结果Array)-3;$i++)			{
	$ELEMENT = $EVAL操作内容替换结果Array[$i];
	eval($ELEMENT.";"); 
	//highlight_string($ELEMENT);	print "<HR>";
}
array_pop($EVAL操作内容替换结果Array);
$倒数第二步EVAL操作内容 = array_pop($EVAL操作内容替换结果Array);
$倒数第三步EVAL操作内容 = array_pop($EVAL操作内容替换结果Array);
$执行函数 = substr($第二步EVAL操作内容,5,-1);;

$倒数第三步EVAL操作内容Array = explode(",",$倒数第三步EVAL操作内容);;
$文件加密内容 = $文件内容Array[1];
$文件加密内容 = trim($文件加密内容);;
//$文件加密内容 = substr($文件加密内容,1,strlen($文件加密内容));;
//print $文件加密内容;exit;
$倒数第三步EVAL操作内容Array[0] = "\$变量=(base64_decode(strtr(substr('$文件加密内容'";
$倒数第三步EVAL操作内容TEXT = join(',',$倒数第三步EVAL操作内容Array);
//print_R($第二步EVAL操作内容);
//$OO00O00O0 = ereg_replace("__FILE__",$filename,$OO00O00O0);;
//print $O000O0O00;
$文件加密内容 = ereg_replace("\n","",$文件加密内容);;
$文件加密内容 = ereg_replace("\r","",$文件加密内容);;
$文件加密内容 = ereg_replace("\t","",$文件加密内容);;
eval($倒数第三步EVAL操作内容TEXT.";");
//print $倒数第三步EVAL操作内容;
//print_R($文件内容Array);
highlight_string($变量);
print " ";


$文件句柄 = fopen($filename.".de.php",'w+');
//$变量 = ereg_replace("\$","\\\$",$变量);
fwrite($文件句柄,"<?".$变量."?>");
fclose($文件句柄);

//exit;
//$变量=(base64_decode(strtr(substr($文件加密内容,380),'fadrIehbS4ATpqGEx+7Dut9PUn03WV1NcMgo5kFKHmwiCLJ8lZ2YBzyRQ/O6svXj=','ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/')));
//eval($OO00O00O0); 
//print base64_decode;
//highlight_string($变量);
?>