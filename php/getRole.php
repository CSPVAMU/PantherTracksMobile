<?php session_start();
include 'mysql.php';
header('Access-Control-Allow-Origin: *');

$search = mysql_query ("SELECT role FROM users WHERE username='".$username."' AND role = 3");
$row = mysql_fetch_row ($search);

if ($row > 0) {
	$msg = 3;	
}
else {
	$search2 = mysql_query ("SELECT id FROM users WHERE username='".$username."' AND role = 2");
	$row2 = mysql_fetch_row ($search2);
	
	if ($row2 > 0) {
		$msg = 2;
	}
	else
		$msg = 0;
}

/*session_start();
if(!isset($_SESSION['role']))
	$msg = "user role not set";
else if($_SESSION['role'] == 2)
	$msg = 2;
else if(($_SESSION['role']) == 3)
	$msg = 3;
else
	$msg = "Unknown Error";
*/
echo $msg;

?>