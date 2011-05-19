<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?php
// 在 4.1.0 以前的 PHP 中，需要用 $HTTP_POST_FILES 代替 $_FILES。
// 在 4.0.3 以前的 PHP 中，需要用 copy() 和 is_uploaded_file() 来代替 move_uploaded_file()。

$uploaddir = 'docs/';
$uploadfile = $uploaddir. $_FILES['EDITFILE']['name'];
print "其他数据:".$_POST["data"]."<br>";
if (is_uploaded_file($_FILES['EDITFILE']['tmp_name']))
{
	if (move_uploaded_file($_FILES['EDITFILE']['tmp_name'], $uploadfile))
	{
		print "成功保存文件:".$_FILES['EDITFILE']['name'].". 大小:".$_FILES['EDITFILE']['size']."字节<br>";
	}
	else
	{
		print "文件保存错误！";
	}
}
$attachdir = 'attaches/';

if (array_key_exists("attaches", $_FILES))
{
    print "保存附件:<br>";
    foreach ($_FILES['attaches']['tmp_name'] as $key => $value)
    {	
    	$uploadfile = $attachdir. $_FILES['attaches']['name'][$key];
    	if (is_uploaded_file($_FILES['attaches']['tmp_name'][$key]))
    	{
    		if (move_uploaded_file($_FILES['attaches']['tmp_name'][$key], $uploadfile))
    		{
    			print "成功保存文件:".$_FILES['attaches']['name'][$key].".大小:".$_FILES['attaches']['size'][$key]."字节<br>";
    		}
    		else
    		{
    			print "文件".$_FILES['attaches']['name'][$key]."保存错误！";
    		}
    	}    	
    }
}
else
{
    print "没有其他附件。";
}
?>