<?php

//session_start();

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

//$id = "89";

$search = mysql_query ("SELECT first, last FROM users WHERE id='".$id."' AND role = 3");
$row = mysql_fetch_row ($search);

	if ($row > 0) {
		$msg = "".$row[0]." ".$row[1]."";
	}
	else {
		$msg = "0";
	}
	//echo $id."\r\n";
	echo $msg;

?>