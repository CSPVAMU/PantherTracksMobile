<?php 

//ini_set( "display_errors", 0);
header('Access-Control-Allow-Origin: *');
include_once '../php/mysql.php';

// Our custom error handler  
/*function nettuts_error_handler($number, $message, $file, $line, $vars)  
  
{  
    $email = " 
        <p>An error ($number) occurred on line  
        <strong>$line</strong> and in the <strong>file: $file.</strong>  
        <p> $message </p>";  
          
    $email .= "<pre>" . print_r($vars, 1) . "</pre>";  
      
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
      
    // Email the error to someone...  
    error_log($email, 1, 'hazarus@gmail.com', $headers);  
  
    // Make sure that you decide how to respond to errors (on the user's side)  
    // Either echo an error message, or kill the entire project. Up to you...  
    // The code below ensures that we only "die" if the error was more than  
    // just a NOTICE.   
    if ( ($number !== E_NOTICE) && ($number < 2048) ) {  
        die("There was an error. Please try again later.");  
    }  
}  */
  
// We should use our custom function to handle errors.  
//set_error_handler('nettuts_error_handler'); 

if(isset($_POST['studentid']))
	$studentid=$_POST['studentid'];
if(isset($_POST['format']))
	$format=$_POST['format'];
	
function studentHistory ($studentid, $type="ordered"){
	$db = & CDB::get_db();
	$sql = "Select `classID`, `modifiedBy`, `modifiedOn`, `status` FROM `StudentRecords` WHERE `studentID`='".$studentid."' ORDER BY `classID` ASC";
	$arr = & $db->get_array($sql);
	$ordered = array();
	$list = array();
	$cnt=0;
	for($n=0; $n<46;$n++){
		$ordered[$n][0]="unchecked";
	}
	if (sizeof($arr) > 0){
		foreach($arr as $i) {
			$sql = "SELECT `first`,`last` FROM `users` WHERE `id`='".$i['modifiedBy']."'";
			$arr2 = & $db->get_row($sql);
			//Corresponds to records[classID][detail] in Student History Module
			if($i['status']==0){
				$ordered[$i['classID']-1][0]="checked";	
				$list[$cnt]=$i['classID'];
				$cnt++;
			}
			$ordered[$i['classID']-1][1]=$arr2['first']." ".$arr2['last'];
			$ordered[$i['classID']-1][2]=$i['modifiedOn'];
		}
	}
	if($type=="ordered")
		return $ordered;	
	else
		return $list;
}

if(isset($format) && $format=="json"){
	$ordered = array();
	$ordered = studentHistory($studentid);
	echo json_encode($ordered);	
}

/*
if ( isset($studentid)){
	$db = & CDB::get_db();
	$sql = "Select `classID`, `modifiedBy`, `modifiedOn`, `status` FROM `StudentRecords` WHERE `studentID`='".$studentid."' ORDER BY `classID` ASC";
	$arr = & $db->get_array($sql);
	$ordered = array();
	for($n=0; $n<46;$n++){
		$ordered[$n][0]="unchecked";
	}
	if (sizeof($arr) > 0){
		foreach($arr as $i) {
			$sql = "SELECT `first`,`last` FROM `users` WHERE `id`='".$i['modifiedBy']."'";
			$arr2 = & $db->get_row($sql);
			//Corresponds to records[classID][detail] in Student History Module
			if($i['status']==0)
				$ordered[$i['classID']-1][0]="checked";	
			$ordered[$i['classID']-1][1]=$arr2['first']." ".$arr2['last'];
			$ordered[$i['classID']-1][2]=$i['modifiedOn'];
		}
	}
	
	
	echo json_encode($ordered);

}*/





?>

