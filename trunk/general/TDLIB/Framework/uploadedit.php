<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?php
// �� 4.1.0 ��ǰ�� PHP �У���Ҫ�� $HTTP_POST_FILES ���� $_FILES��
// �� 4.0.3 ��ǰ�� PHP �У���Ҫ�� copy() �� is_uploaded_file() ������ move_uploaded_file()��

$uploaddir = 'docs/';
$uploadfile = $uploaddir. $_FILES['EDITFILE']['name'];
print "��������:".$_POST["data"]."<br>";
if (is_uploaded_file($_FILES['EDITFILE']['tmp_name']))
{
	if (move_uploaded_file($_FILES['EDITFILE']['tmp_name'], $uploadfile))
	{
		print "�ɹ������ļ�:".$_FILES['EDITFILE']['name'].". ��С:".$_FILES['EDITFILE']['size']."�ֽ�<br>";
	}
	else
	{
		print "�ļ��������";
	}
}
$attachdir = 'attaches/';

if (array_key_exists("attaches", $_FILES))
{
    print "���渽��:<br>";
    foreach ($_FILES['attaches']['tmp_name'] as $key => $value)
    {	
    	$uploadfile = $attachdir. $_FILES['attaches']['name'][$key];
    	if (is_uploaded_file($_FILES['attaches']['tmp_name'][$key]))
    	{
    		if (move_uploaded_file($_FILES['attaches']['tmp_name'][$key], $uploadfile))
    		{
    			print "�ɹ������ļ�:".$_FILES['attaches']['name'][$key].".��С:".$_FILES['attaches']['size'][$key]."�ֽ�<br>";
    		}
    		else
    		{
    			print "�ļ�".$_FILES['attaches']['name'][$key]."�������";
    		}
    	}    	
    }
}
else
{
    print "û������������";
}
?>