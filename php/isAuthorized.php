<?php
	include 'mysql.php';
	$sql = "SELECT count(*) FROM users WHERE( id='".$userid."' AND authorized='0')";
		
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
 
 	
	if( $row > 0 ) {
		echo "1";
	}
	else {
		echo "0";
	}
		

?>