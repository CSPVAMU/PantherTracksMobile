<?php 

//ini_set( "display_errors", 0);
include_once '../php/mysql.php';

if(isset($_POST['studentid']))
	$studentid=$_POST['studentid'];
if(isset($_POST['format']))
	$format=$_POST['format'];

function settings($studentid, $data="array"){
	$db = & CDB::get_db();
	$sql = "SELECT `logs`, `defaultHours` FROM `users` WHERE `id`='".$studentid."'";
	$row = & $db->get_row($sql);
	if($data=="array"){
		$settings = array();
		if($row['logs']==0)
			$settings[0]="unchecked";
		else
			$settings[0]="checked";
		$settings[1]=$row['defaultHours'];
	}else{
		$settings=$row['defaultHours'];
	}
	
	return $settings;
}

if(isset($format) && $format=="json"){
  $studentsettings = array();
  $studentsettings = settings($studentid);
  echo json_encode($studentsettings);  
}

?>

