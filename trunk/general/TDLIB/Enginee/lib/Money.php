<?
//把数字金额转换成中文大写数字的函数
function num2rmb ($num){ 
$c1="零壹贰叁肆伍陆柒捌玖";
$c2="分角元拾佰仟万拾佰仟亿";

$num=round($num,2);
$num=$num*100;
if(strlen($num)>10){
return "oh,sorry,the number is too long!";
}

$i=0;
$c="";

while (1){
if($i==0){
$n=substr($num,strlen($num)-1,1);
}else{
$n=$num %10;
}

$p1=substr($c1,2*$n,2);


 

$p2=substr($c2,2*$i,2);
if($n!='0' || ($n=='0' &&($p2=='亿' || $p2=='万' || $p2=='元' ))){ 
$c=$p1.$p2.$c;
}else{
$c=$p1.$c;
} 

$i=$i+1;
$num=$num/10;
$num=(int)$num;

if($num==0){
break;
}
}//end of while| here, we got a chinese string with some useless character

//we chop out the useless characters to form the correct output
$j = 0; 
$slen=strlen($c);
while ($j< $slen) {
$m = substr($c,$j,4);

if ($m=='零元' || $m=='零万' || $m=='零亿' || $m=='零零'){
$left=substr($c,0,$j);
$right=substr($c,$j+2); 
$c = $left.$right; 
$j = $j-2;
$slen = $slen-2; 
} 
$j=$j+2;
}

if(substr($c,strlen($c)-2,2)=='零'){
$c=substr($c,0,strlen($c)-2);
} // if there is a '0' on the end , chop it out

return $c."整";
}// end of function
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>