<?php

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

//$studentEmail = "dmeeks1@student.pvamu.edu";

$search = mysql_query ("SELECT email, first FROM users WHERE email='".$email."'");
$row = mysql_fetch_row ($search);

	if ($row > 0) {
	
		$hash = md5( rand(0,1000) );
		mysql_query("UPDATE users SET hash='".$hash."' WHERE email='".$email."'");
		
		$to = $email;
		$subject = "PantherTracks Mobile Password Reset";
		$message = '

Hello '.$row[1].', 

Please click the link below to reset your password:
http://pvamu.hazar.us/php/resetPassword.php?email='.$email.'&hash='.$hash.'';

		//$message = "Hello";
		$from = "PantherTracks Mobile <noreply-ptmobile@pvamu.edu>";
		$headers = "From:" . $from;
		mail($to,$subject,$message,$headers);
		$msg = "1";
	}
	else {
		$msg = "0";
	}

	echo $msg;

?>