<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$url='http://pvet.net16.net/qr_generator.php';
$imageData = file_get_contents($url);
$name=new DateTime();
//file_put_contents('/home/a6133177/public_html/qrcodes/'.$name.'.png',$imageData);
file_put_contents('/home/pvamu/public_html/qrcodes/'.$name.'.png',$imageData);

?>