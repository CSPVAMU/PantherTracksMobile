<?php

//session_start();

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

//$email = "hkahera@student.pvamu.edu";

$search = mysql_query ("SELECT id FROM users WHERE email='".$email."'");
$match = mysql_fetch_row ($search);

if($match > 0) {
	
	//echo $match[0];
	$search2 = mysql_query ("SELECT student FROM faculty WHERE id='".$id."' AND student='".$match[0]."'");
	$match2 = mysql_fetch_row ($search2);
	
	if($match2 > 0) {
	
		$msg = "1";
	}
	else {
		
		$search4 = mysql_query ("SELECT student FROM faculty WHERE student='".$match[0]."'");
		$match4 = mysql_fetch_row ($search4);
		
		if($match4 > 0) {
	
			$msg = "3";
		}
		else {
			$search3 = mysql_query ("SELECT first, last FROM users WHERE email='".$email."' AND role = 3");
			$row = mysql_fetch_row ($search3);

			if ($row > 0) {
				$msg = "".$row[0]." ".$row[1]."";
			}
			else {
				$msg = "2";
			}
		}
	}
}
else {
	$msg = "0";
}

echo $msg;

?>