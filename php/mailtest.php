<?php
session_start();
include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$username = $_SESSION['username'];
	
$sql = mysql_query("SELECT hash FROM users WHERE username='$username'");
$row = mysql_fetch_assoc($sql);
$hash = $row['hash'];
	
$sql = mysql_query("SELECT email FROM users WHERE username='$username'");
$row = mysql_fetch_assoc($sql);
$email = $row['email'];

$sql = mysql_query("SELECT first FROM users WHERE username='$username'");
$row = mysql_fetch_assoc($sql);
$name = $row['first'];
	
$subject = "PantherTracks Mobile Email Verification";
$message = '

Hello '.$name.', 

Thanks for signing up!
Your username is: '.$username.'
	
Please click the link below to activate your account:
http://pvamu.hazar.us/php/verify.php?email='.$email.'&hash='.$hash.'';

//$message = "Hello";
$from = "PantherTracks Mobile <noreply-ptmobile@pvamu.edu>";
$headers = "From:" . $from;
mail($email,$subject,$message,$headers);
	
?>