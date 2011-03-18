<?
class qswhU{
 var $qswhData;
 function qswhU($filename="qswhU.php"){
  $this->qswhData=file($filename);
 }
 
 function decode($str,$pattern=0){
  $arr=array("/&#(\w+);/iU","/((%\w\w)+)/i","/%u(\w{4,5})/iU");
  if(is_integer($pattern)){
    if($pattern>=count($arr))die("Invalid Function");
    $pattern=$arr[$pattern];
  }
  return preg_replace_callback($pattern,array($this,"u2gb"),$str);
 }
 
 function u2gb($arr){
  /******(qiushuiwuhen 2002-8-15)******/
  $ret="";$str=$arr[1];
  if(preg_match_all("/%\w{2}/",$str,$matches)){
   for($i=0;$i<count($matches[0]);$i++){
    $chr1=hexdec(substr($matches[0][$i],1));
    $arr=array("f0","e0","c0","0");
    for($j=0;$j<count($arr);$j++)if($chr1>hexdec($arr[$j]))break;
    $chr=hexdec(substr($matches[0][$i],1))-hexdec($arr[$j]);
    while(++$j<count($arr))$chr=$chr*0x40+(hexdec(substr($matches[0][++$i],1))-0x80);
    $str=dechex($chr);
    if(strlen($str)==4){
     $p=hexdec(substr($str,0,2))-0x4d;
     $q=hexdec(substr($str,2))*4;
     $ret.=chr(hexdec(substr($this->qswhData[$p],$q,2)));
     $ret.=chr(hexdec(substr($this->qswhData[$p],$q+2,2)));
    }else
     $ret.=chr(hexdec($str));
   }
  }
  else{ 
   if(strtolower($str[0])=="x")
    $str=substr($str,1);
   else
    if(strlen($str)!=4)$str=dechex($str);
    
   if(strlen($str)==4){
    $p=hexdec(substr($str,0,2))-0x4d;
    $q=hexdec(substr($str,2))*4;
    $ret.=chr(hexdec(substr($this->qswhData[$p],$q,2)));
    $ret.=chr(hexdec(substr($this->qswhData[$p],$q+2,2)));
   }else
    $ret.=chr(hexdec($str));
  }
  return $ret;
 }
 
 
} 


?>