<?php 

$studentid=$_POST['studentid'];	

//ini_set( "display_errors", 0);
//header('Access-Control-Allow-Origin: *');
include 'mysql.php';


	$sql = "UPDATE `users` SET `logs`='".$_POST["logs"]."', `defaultHours`='".$_POST["defaultHours"]."' WHERE `id`='".$studentid."'";
	$db->exec($sql);


?>

