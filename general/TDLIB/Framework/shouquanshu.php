<?

require_once('lib.inc.php');


$returnmachinecode = returnmachinecode();

//print_R($_SERVER['SERVER_NAME']);

$ini_file=@parse_ini_file('license.ini');
if($ini_file['REGISTER_CODE']=="")	{
	$ini_file['REGISTER_CODE']	= "软件未注册-试用版本";
	$ini_file['USER_NUMBER']	= "软件未注册-试用版本";
	$ini_file['SERVER_NAME']	= "软件未注册-试用版本";
	$ini_file['SCHOOL_NAME']	= "软件未注册-试用版本";
	$ini_file['SOFTWARE_TYPE']	= "软件未注册-试用版本";
	$ini_file['SOFTWARE_DATE']	= "软件未注册-试用版本";
	$ini_file['MACHINE_CODE']	= $returnmachinecode;
	@unlink('license.ini');
}
else	{
	$ini_file['USER_NUMBER'] = "不限制";
}
$软件版本号FILE = @file("../Interface/EDU/version.ini");


$showChinaText = new showChinaText();
$showChinaText->内部软件版本		= $软件版本号FILE[0];
$showChinaText->授权使用域名		= $ini_file['SERVER_NAME'];
$showChinaText->授权使用学校		= $ini_file['SCHOOL_NAME'];
$showChinaText->授权软件使用单位	= $ini_file['SCHOOL_NAME'];
$showChinaText->软件机器码			= $ini_file['MACHINE_CODE'];
$showChinaText->软件注册码			= $ini_file['REGISTER_CODE'];
$showChinaText->授权软件版本		= $ini_file['SOFTWARE_TYPE'];
$showChinaText->授权时间			= $ini_file['SOFTWARE_DATE'];
$showChinaText->授权使用域名		= $ini_file['SERVER_NAME'];
$showChinaText->授权软件名称		= $SYSTEM_SOFTWARE_NAME;
$showChinaText->font				= $_SERVER['WINDIR']."/Fonts/simhei.ttf";
$showChinaText->show();


class showChinaText
{
	var $font='simhei.ttf';
	var $背景图片='images/shouquanshu.jpg';
	var $angle=0;
	var $size=50;
	var $showX=100;
	var $showY=100;
	var $授权软件使用单位	= "郑州单点科技软件有限公司";
	var $授权软件名称		= "通达数字化校园";
	var $授权软件版本		= "中小学标准版本";
	var $内部软件版本		= "内部软件版本";
	var $软件机器码			= "软件机器码";
	var $软件注册码			= "软件注册码";
	var $授权使用域名		= "授权使用域名";
	var $授权使用学校		= "授权使用学校";
	var $授权时间			= "2010-10-30";




	function showChinaText($showText='')
	{

	}
	function createText($instring)
	{
		$outstring="";
		$max=strlen($instring);
		for($i=0;$i<$max;$i++)
		{
		$h=ord($instring[$i]);
		if($h>=160 && $i<$max-1)
		{
			$outstring.="&#".base_convert(bin2hex(iconv("gb2312","ucs-2",substr ($instring,$i,2))),16,10).";";
			$i++;
		}
		else
		{
		$outstring.=$instring[$i];
		}
		}
		return $outstring;
	}
	function createJpeg()
	{
	}
	function show()
	{
		//输出头内容
		Header( "Content-type:image/png");
		//建立图象
		$image = Imagecreatefromjpeg($this->背景图片);
		//加入汉字
		$授权软件使用单位=$this->createText($this->授权软件使用单位);
		imagettftext($image,30, $this->angle, 235, 248,$white,$this->font,$授权软件使用单位);
		//加入汉字
		$授权软件名称=$this->createText($this->授权软件名称);
		imagettftext($image,24, $this->angle, 285, 446,$white,$this->font,$授权软件名称);
		//加入汉字
		$授权软件版本=$this->createText($this->授权软件版本);
		imagettftext($image,24, $this->angle, 285, 484,$white,$this->font,$授权软件版本);
		//加入汉字
		$内部软件版本=$this->createText($this->内部软件版本);
		imagettftext($image,24, $this->angle, 285, 520,$white,$this->font,$内部软件版本);
		//加入汉字
		$软件机器码=$this->createText($this->软件机器码);
		imagettftext($image,24, $this->angle, 285, 560,$white,$this->font,$软件机器码);

		//加入汉字
		$软件注册码=$this->createText($this->软件注册码);
		imagettftext($image,24, $this->angle, 285, 600,$white,$this->font,$软件注册码);

		//加入汉字
		$授权使用域名=$this->createText($this->授权使用域名);
		imagettftext($image,24, $this->angle, 285, 638,$white,$this->font,$授权使用域名);

		//加入汉字
		$授权使用学校=$this->createText($this->授权使用学校);
		imagettftext($image,24, $this->angle, 285, 675,$white,$this->font,$授权使用学校);

		//加入汉字
		$授权时间=$this->createText($this->授权时间);
		imagettftext($image,22, $this->angle, 180, 896,$white,$this->font,$授权时间);


		imagejpeg($image);
		ImageDestroy($image);
	}
}

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