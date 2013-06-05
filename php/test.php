<?php

session_start();
include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$username = $_SESSION['username'];

//$username = "dmeeks1";

$search = mysql_query ("SELECT username FROM users WHERE username='".$username."'");
$row = mysql_fetch_row ($search);

if ($row > 0) {
	$msg = $row[0];	
}
else {
	$msg = "not set";
}
echo $msg;

?>