<?php session_start();

include 'mysql.php';
//header('Access-Control-Allow-Origin: *');

$username=$_SESSION['username'];

if(isset ($_SESSION['username']) ){
	echo $username;
}else{
	echo "not set";
}
?>