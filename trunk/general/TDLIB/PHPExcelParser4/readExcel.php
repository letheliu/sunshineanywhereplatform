<?php
class ReadExcel
{
 var $excfile = '';
 function ReadExcel($readfile)
 {
  $this->excfile = $readfile;
 }
 function read()
 {
  $reArr = array();
  require_once 'excelparser.php';
  $exc = new ExcelFileParser();
  $res = $exc->ParseFromFile($this->excfile);
  $RS = $exc->worksheet['data'];
  //print_R($RS);exit;

  for($she = 0;$she <=count($exc->worksheet['name']);$she++)
  {
   for( $col=0;$col<=$exc->worksheet['data'][0]['max_col'];$col++ )
   {
    for($row=0;$row<=$exc->worksheet['data'][0]['max_row'];$row++)
    {
     $data = $exc->worksheet['data'][0]['cell'][$row][$col];
     $ind = $data['data'];
	 //print $data['type'].":".$data['data']."<BR>";

     switch ($data['type']) {
			// string
			case 0:
				$ind = $data['data'];
				if( $exc->sst['unicode'][$ind] )
				{
					$s = $this->uc2html($exc->sst['data'][$ind]);
				}
				else
				{
					$s = $exc->sst['data'][$ind];
				}
				if( strlen(trim($s))==0 )
					$reArr[$she][$col][$row] = "";
				else
					$reArr[$she][$col][$row] = $s;
				break;
				// integer number
			case 1:
				$s = $data['data'];
				$reArr[$she][$col][$row] = $s;
				break;
				// float number
			case 2:
				$s = $data['data'];
				$reArr[$she][$col][$row] = $s;
				break;
				// date
			case 3:
				$s = $data[data];
				$SArray = explode('.',$s);
				$TodayYear = date("y");
				if($SArray[2]>=38)		{
					//$SArray[2] = "19";
				}
				$s = date("Y-m-d",mktime(1,1,1,$SArray[0],$SArray[1],$SArray[2]));
				$reArr[$she][$col][$row] = $s;
				break;
			default:
				$ind = $data['data'];
				if( $exc->sst['unicode'][$ind] )
				{
					$s = $this->uc2html($exc->sst['data'][$ind]);
				}
				else
				{
					$s = $exc->sst['data'][$ind];
				}
				if( strlen(trim($s))==0 )
					$reArr[$she][$col][$row] = "";
				else
					$reArr[$she][$col][$row] = $s;
				break;
		}
    }
   }
  }
  return $reArr;
 }


 function uc2html($str) {

  $ret = '';
  for( $i=0; $i<strlen($str)/2; $i++ )
  {
   $charcode = ord($str[$i*2])+256*ord($str[$i*2+1]); //一个汉字
   if($charcode > 128)
   {
    //convert to char
    $src_str_hex = dechex($charcode);
    $char1 = substr($src_str_hex,0,2);
    $char2 = substr($src_str_hex,2,2);
    $char=chr(hexdec($char1)).chr(hexdec($char2));//转成unicode字符

    $s=$char;


    $gbk = iconv("UTF-16","GBK",$s);
    $ret.=$gbk;
   }else{
    $ret.=$str[$i*2];
   }
  }
  return $ret;

 }
}

//此文件被其它文件调用,不宜在此做测试
//$a = new ReadExcel("Book1.xls");
//$tmp = $a->read();
//print_R($tmp);
?>