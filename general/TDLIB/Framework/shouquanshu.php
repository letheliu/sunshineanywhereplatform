<?

require_once('lib.inc.php');


$returnmachinecode = returnmachinecode();

//print_R($_SERVER['SERVER_NAME']);

$ini_file=@parse_ini_file('license.ini');
if($ini_file['REGISTER_CODE']=="")	{
	$ini_file['REGISTER_CODE']	= "���δע��-���ð汾";
	$ini_file['USER_NUMBER']	= "���δע��-���ð汾";
	$ini_file['SERVER_NAME']	= "���δע��-���ð汾";
	$ini_file['SCHOOL_NAME']	= "���δע��-���ð汾";
	$ini_file['SOFTWARE_TYPE']	= "���δע��-���ð汾";
	$ini_file['SOFTWARE_DATE']	= "���δע��-���ð汾";
	$ini_file['MACHINE_CODE']	= $returnmachinecode;
	@unlink('license.ini');
}
else	{
	$ini_file['USER_NUMBER'] = "������";
}

$����汾��FILE = @file("../Interface/EDU/version.ini");


if(@is_file($_SERVER['WINDIR']."/Fonts/simhei.ttf"))			{
	$showChinaText_font			= $_SERVER['WINDIR']."/Fonts/simhei.ttf";
}
else	{
	$showChinaText_font			= "images/FZYTK.TTF";
}

//print_R($showChinaText_font);

//exit;

$showChinaText = new showChinaText();
$showChinaText->�ڲ�����汾		= $����汾��FILE[0];
$showChinaText->��Ȩʹ������		= $ini_file['SERVER_NAME'];
$showChinaText->��Ȩʹ��ѧУ		= $ini_file['SCHOOL_NAME'];
$showChinaText->��Ȩ���ʹ�õ�λ	= $ini_file['SCHOOL_NAME'];
$showChinaText->���������			= $ini_file['MACHINE_CODE'];
$showChinaText->���ע����			= $ini_file['REGISTER_CODE'];
$showChinaText->��Ȩ����汾		= $ini_file['SOFTWARE_TYPE'];
$showChinaText->��Ȩʱ��			= $ini_file['SOFTWARE_DATE'];
$showChinaText->��Ȩʹ������		= $ini_file['SERVER_NAME'];
$showChinaText->font				= $showChinaText_font;

$showChinaText->show();


class showChinaText
{
	var $font='simhei.ttf';
	var $����ͼƬ='images/shouquanshu.jpg';
	var $angle=0;
	var $size=50;
	var $showX=100;
	var $showY=100;
	var $��Ȩ���ʹ�õ�λ	= "֣�ݵ���Ƽ�������޹�˾";
	var $��Ȩ�������		= "ͨ�����ֻ�У԰";
	var $��Ȩ����汾		= "��Сѧ��׼�汾";
	var $�ڲ�����汾		= "�ڲ�����汾";
	var $���������			= "���������";
	var $���ע����			= "���ע����";
	var $��Ȩʹ������		= "��Ȩʹ������";
	var $��Ȩʹ��ѧУ		= "��Ȩʹ��ѧУ";
	var $��Ȩʱ��			= "2010-10-30";




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
		//���ͷ����
		Header( "Content-type:image/png");
		//����ͼ��
		$image = Imagecreatefromjpeg($this->����ͼƬ);
		//���뺺��
		$��Ȩ���ʹ�õ�λ=$this->createText($this->��Ȩ���ʹ�õ�λ);
		imagettftext($image,30, $this->angle, 235, 248,$white,$this->font,$��Ȩ���ʹ�õ�λ);
		//���뺺��
		$��Ȩ�������=$this->createText($this->��Ȩ�������);
		imagettftext($image,24, $this->angle, 285, 446,$white,$this->font,$��Ȩ�������);
		//���뺺��
		$��Ȩ����汾=$this->createText($this->��Ȩ����汾);
		imagettftext($image,24, $this->angle, 285, 484,$white,$this->font,$��Ȩ����汾);
		//���뺺��
		$�ڲ�����汾=$this->createText($this->�ڲ�����汾);
		imagettftext($image,24, $this->angle, 285, 520,$white,$this->font,$�ڲ�����汾);
		//���뺺��
		$���������=$this->createText($this->���������);
		imagettftext($image,24, $this->angle, 285, 560,$white,$this->font,$���������);

		//���뺺��
		$���ע����=$this->createText($this->���ע����);
		imagettftext($image,24, $this->angle, 285, 600,$white,$this->font,$���ע����);

		//���뺺��
		$��Ȩʹ������=$this->createText($this->��Ȩʹ������);
		imagettftext($image,24, $this->angle, 285, 638,$white,$this->font,$��Ȩʹ������);

		//���뺺��
		$��Ȩʹ��ѧУ=$this->createText($this->��Ȩʹ��ѧУ);
		imagettftext($image,24, $this->angle, 285, 675,$white,$this->font,$��Ȩʹ��ѧУ);

		//���뺺��
		$��Ȩʱ��=$this->createText($this->��Ȩʱ��);
		imagettftext($image,22, $this->angle, 180, 896,$white,$this->font,$��Ȩʱ��);


		imagejpeg($image);
		ImageDestroy($image);
	}
}

?>