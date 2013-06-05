<?php

session_start();

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$username = $_SESSION['username'];
//$id = $_SESSION['id'];

if(isset($id)) {

	$search = mysql_query ("SELECT id FROM users WHERE email='".$studentEmail."'");
	$row = mysql_fetch_row ($search);

	if ($row > 0) {
		$studentId = $row[0];
		mysql_query("INSERT into faculty (id, student) VALUES ('$id','$studentId')");
		$msg = "Student was added successfully";
	}
	else {
		$msg = "Error: Student not found";
	}
}
else {
	$msg = "Error: Faculty id not set";
}

echo $msg;

?>