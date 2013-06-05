<?php

session_start();
include 'mysql.php';
header('Access-Control-Allow-Origin: *');

//$id = 89;

$search = mysql_query ("SELECT first FROM users WHERE id='".$id2."'");
$match = mysql_fetch_array ($search);

if ($match > 0) {
	echo $match[0];
}
else {
	echo "error";
}

?>