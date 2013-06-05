<?php

session_start();

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$db = & CDB::get_db();
$sql = "Select * FROM `users` WHERE `role`='2' ORDER BY `last` ASC";
$arr = & $db->get_array($sql);
$names = array();
$count=0;
foreach($arr as $row) {
	$names[$count][0]=$row['id'];
	$names[$count][1]=$row['first']." ".$row['last'];
	$names[$count][2]=$row['authorized'];
	$count++;
	
				
}

echo json_encode($names);
?>