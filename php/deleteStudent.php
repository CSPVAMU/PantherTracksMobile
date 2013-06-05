<?php

session_start();

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

//$id = "160";

if(isset($id) && isset($fid)) {

	//if ($row > 0) {
	//	$studentId = $row[0];
	if(mysql_query("DELETE FROM faculty WHERE id='".$fid."' AND student='".$id."'")) {
		$msg = "Student was removed successfully";
	}
	else {
		echo $id."<br>";
		$msg = "Error: Student not found";
	}
}
else {
	$msg = "Error: student or faculty id not set";
}

echo $msg;

?>