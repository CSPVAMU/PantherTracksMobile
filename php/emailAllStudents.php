<?php
session_start();
include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$id = "194";
/*$sid = "192";
$subject = "Test";
$message = "This is a test";*/
	
$sql1 = mysql_query("SELECT email FROM users WHERE id='$id'");
$row1 = mysql_fetch_assoc($sql1);
$facEmail = $row1['email'];

$sql = mysql_query("SELECT student FROM faculty WHERE id='$id'");
$row = mysql_fetch_array($sql);
echo $row[0]."<br>";
echo $row[1]."<br>";

$began = "no";
if($row > 0) {

	echo count($row)."<br>";
	for($i = 0; $i < count($row); $i++) {
		/*$sql = mysql_query("SELECT email FROM users WHERE id='$row[$i]'");
		$result = mysql_fetch_assoc($sql);
		
		if($began == "no") {
			$studEmail += $result['email'];
			echo $studEmail."<br>";
			$began = "yes";
		}
		else {
			$studEmail += ", ".$result['email'];
			echo $studEmail."<br>";
		}*/
		echo $row[$i]."<br>";
	}
}
else {
	echo "You are not advising any students";
}
	
$from = $facEmail;
$headers = "From:" . $from;
//mail($studEmail,$subject,$message,$headers);
	
?>