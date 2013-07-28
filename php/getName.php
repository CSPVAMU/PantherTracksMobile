<?php


include 'mysql.php';
header('Access-Control-Allow-Origin: *');


if(isset($_POST['studentid']))
	$studentid=$_POST['studentid'];
$db = & CDB::get_db();
$sql = "SELECT * FROM `users` WHERE `id`='".$studentid."'";
$row = & $db->get_row($sql);

if ($row > 0) {
	echo $row['first']." ".$row['last'];
}

?>