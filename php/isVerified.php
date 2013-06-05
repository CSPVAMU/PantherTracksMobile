<?php
	header('Access-Control-Allow-Origin: *');
	include 'mysql.php';
	$sql = "SELECT verified FROM users WHERE id='".$userid."' AND verified='0'";
	
		
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
 
 	
	if( $row > 0 ) {
		echo "1";
	}
	else {
		echo "0";
		//echo $studentid;
	}
	
	
		/*$ipaddress = $_SERVER["REMOTE_ADDR"];

		$to = 'admin@pvamu.hazar.us';
		$subject = $username." - ".$ipaddress;
		$message = $username;
		
		//$message = "Hello";
		$from = "PantherTracks Mobile <noreply-ptmobile@pvamu.edu>";
		$headers = "From:" . $from;
		mail($to,$subject,$message,$headers);*/
?>