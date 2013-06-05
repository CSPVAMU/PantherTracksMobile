<?php

session_start();

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$db = & CDB::get_db();
$sql = "Select `student` FROM `faculty` WHERE `id`='".$sid."' ORDER BY `student` ASC";
$arr = & $db->get_array($sql);
$students= array();
$count=0;
foreach($arr as $i) {
	$students[$count]=$i['student'];
	$count++;
	//echo $i['student'];
	//echo "<br>";
				
}
$names = array();
$count=0;
for($i=0;$i<sizeof($students);$i++){
	$db = & CDB::get_db();
	$sql = "SELECT * FROM `users` WHERE `id`='".$students[$i]."'";
	$row = & $db->get_row($sql);

	if ($row > 0) {
		$names[$count][0]=$row['id'];
		$names[$count][1]=$row['first']." ".$row['last'];
	}
	$count++;
}
echo json_encode($names);
?>