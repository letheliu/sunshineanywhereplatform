<?php // 

$filename = "priv.php";
$����ļ����� = file($filename);;
$����ļ�����TEXT = array_pop($����ļ�����);
//print_R($����ļ�����[2]);;exit;
$�ļ���� = fopen($filename,'rb');
$�ļ����� = fread($�ļ����,filesize($filename));
$�ļ�����Array = explode(";return;?>",$�ļ�����);;
fclose($�ļ����);
$�ļ�����_ǰ�벿��Array = explode("<?php //",$�ļ�����Array[0]);;
$�ļ�����_ǰ�벿������ = $�ļ�����_ǰ�벿��Array[1];
$�ļ�����_ǰ�벿������ = ereg_replace("__FILE__","'".$filename."'",$�ļ�����_ǰ�벿������);;

$�ļ�����_ǰ�벿������Array = explode(";",$�ļ�����_ǰ�벿������);;

//ִ����ͨ����
for($i=0;$i<sizeof($�ļ�����_ǰ�벿������Array)-1;$i++)			{
	$ELEMENT = $�ļ�����_ǰ�벿������Array[$i];
	eval($ELEMENT.";"); 
	//highlight_string($ELEMENT);	print "<HR>";
}
//
//ִ��EVAL����
$EVAL�������� = array_pop($�ļ�����_ǰ�벿������Array);
$EVAL���������滻��� = ereg_replace("eval","",$EVAL��������);;
$EVAL���������滻��� = substr($EVAL���������滻���,2,-2);;
$EVAL���������滻��� = substr($EVAL���������滻���,13,-2);;
//$EVAL���������滻��� = ereg_replace("\$\$O0O0000O0","base64_decode",$EVAL���������滻���);;
//print $$O0O0000O0;
$EVAL���������滻��� = base64_decode($EVAL���������滻���);
//print $EVAL���������滻���;exit;
//eval($�ļ�����_ǰ�벿������);
//print_R($�ļ�����_ǰ�벿������);

$EVAL���������滻���Array = explode(";",$EVAL���������滻���);;


//ִ����ͨ����
for($i=0;$i<sizeof($EVAL���������滻���Array)-3;$i++)			{
	$ELEMENT = $EVAL���������滻���Array[$i];
	eval($ELEMENT.";"); 
	//highlight_string($ELEMENT);	print "<HR>";
}
array_pop($EVAL���������滻���Array);
$�����ڶ���EVAL�������� = array_pop($EVAL���������滻���Array);
$����������EVAL�������� = array_pop($EVAL���������滻���Array);
$ִ�к��� = substr($�ڶ���EVAL��������,5,-1);;

$����������EVAL��������Array = explode(",",$����������EVAL��������);;
$�ļ��������� = $�ļ�����Array[1];
$�ļ��������� = trim($�ļ���������);;
//$�ļ��������� = substr($�ļ���������,1,strlen($�ļ���������));;
//print $�ļ���������;exit;
$����������EVAL��������Array[0] = "\$����=(base64_decode(strtr(substr('$�ļ���������'";
$����������EVAL��������TEXT = join(',',$����������EVAL��������Array);
//print_R($�ڶ���EVAL��������);
//$OO00O00O0 = ereg_replace("__FILE__",$filename,$OO00O00O0);;
//print $O000O0O00;
$�ļ��������� = ereg_replace("\n","",$�ļ���������);;
$�ļ��������� = ereg_replace("\r","",$�ļ���������);;
$�ļ��������� = ereg_replace("\t","",$�ļ���������);;
eval($����������EVAL��������TEXT.";");
//print $����������EVAL��������;
//print_R($�ļ�����Array);
highlight_string($����);
print " ";


$�ļ���� = fopen($filename.".de.php",'w+');
//$���� = ereg_replace("\$","\\\$",$����);
fwrite($�ļ����,"<?".$����."?>");
fclose($�ļ����);

//exit;
//$����=(base64_decode(strtr(substr($�ļ���������,380),'fadrIehbS4ATpqGEx+7Dut9PUn03WV1NcMgo5kFKHmwiCLJ8lZ2YBzyRQ/O6svXj=','ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/')));
//eval($OO00O00O0); 
//print base64_decode;
//highlight_string($����);
?>