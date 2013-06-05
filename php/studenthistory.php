<?php 
//ini_set( "display_errors", 0);
//header('Access-Control-Allow-Origin: *');
include 'mysql.php';

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
    error_log($email, 1, 'admin@pvamu.hazar.us', $headers);  
  
    // Make sure that you decide how to respond to errors (on the user's side)  
    // Either echo an error message, or kill the entire project. Up to you...  
    // The code below ensures that we only "die" if the error was more than  
    // just a NOTICE.   
    if ( ($number !== E_NOTICE) && ($number < 2048) ) {  
        die("There was an error. Please try again later.");  
    }  
}  
  
// We should use our custom function to handle errors.  
set_error_handler('nettuts_error_handler'); */

$to = "admin@pvamu.hazar.us";
$subject = "PantherTracks History Save";

// To send HTML mail, the Content-type header must be set
/*$headers = "From: admin@pvamu.hazar.us" . "\n"; 
$headers .= "MIME-Version: 1.0" . "\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$msg="Deleted ".$row['id']."-";
mail($to,$subject,$msg,$headers);*/


$state=$_POST['state'];
 if($state=="upload" ){
	$studentid=$_POST["studentid"];	
	$id=$_POST["id"];	
	$count=0;
	$msg="";
	while($count<45){
		if(isset($_POST[$count])){
			$search = mysql_query ("SELECT `id` FROM `StudentRecords` WHERE `studentID`='".$studentid."' AND `classID`='".$_POST[$count]."'");
			$row = mysql_fetch_row ($search);
			if ($row > 0) {
					$sql = "UPDATE `StudentRecords` SET `status`='0', `modifiedBy`='".$id."', `modifiedOn`=CURRENT_TIMESTAMP WHERE `studentID`='".$studentid."' AND `classID`='".$_POST[$count]."'";
					$db->exec($sql);
				//don't do anything
			}else{
				$sql = "INSERT INTO `StudentRecords` set `studentID`='".$studentid."', `classID`='".$_POST[$count]."', `modifiedBy`='".$id."'";
				$db->exec($sql);
			}
		}else{
			$classid=$count+1;
			$sql= "SELECT `id` FROM `StudentRecords` WHERE `studentID`='".$studentid."' AND `classID`='".$classid."'";
			$row = & $db->get_row($sql);
			if ($row) {
				//delete row
				$sql = "UPDATE `StudentRecords` SET `status`='1', `modifiedBy`='".$id."', `modifiedOn`=CURRENT_TIMESTAMP WHERE `id`='".$row['id']."'";
				$db->exec($sql);
			}else{

			}
		}
		$count++;
	}
}


//mail($to,$subject,$message,$headers);

?>

