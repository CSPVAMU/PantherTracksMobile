<?php 

//ini_set( "display_errors", 0);
header('Access-Control-Allow-Origin: *');
include '../php/mysql.php';




	$settings = array();
	$sql = "SELECT `logs`, `defaultHours` FROM `users` WHERE `id`='".$studentid."'";
	$row = & $db->get_row($sql);
	if($row['logs']==0)
		$settings[0]="unchecked";
	else
		$settings[0]="checked";
	$settings[1]=$row['defaultHours'];

	echo json_encode($settings);


?>

