<?php
$error_code = $excel->ParseFromFile($filename)

$fd = fopen( $filename, 'rb');
$content = fread ($fd, filesize ($name));
fclose($fd);
$error_code = $excel->ParseFromString($content);
unset( $content, $fd );
//get contents
//define date for title
print $now_date = date('d-m-Y H:i');

?>
