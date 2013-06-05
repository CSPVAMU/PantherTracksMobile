<?php

include 'mysql.php';
header('Access-Control-Allow-Origin: *');
	
$search = mysql_query ("SELECT id FROM users WHERE email='".$email."'");
$match = mysql_num_rows ($search);

if ($match > 0) {
		$msg = 1;
}
else {
		$msg = 0;
}

echo $msg;


?>