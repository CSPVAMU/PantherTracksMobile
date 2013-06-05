<?php session_start();
include 'mysql.php';
header('Access-Control-Allow-Origin: *');

//$_SESSION['loggedin'] = "YES";
$data = array(5);
 if($state == "logout") {
	
	session_start();
	session_unset();
	session_destroy();
	$data[4]=3;
	//echo $data;

}else{
	if(isset($_SESSION['loggedin'])){
		session_unset();
		session_destroy();	
	}	
	$search = mysql_query ("SELECT id, role, username FROM users WHERE username='".$username."' AND password='".md5($password)."'");
	$row = mysql_fetch_row ($search);

	if ($row > 0) {
		//$msg = 'Login Complete! Thanks';
		session_start();
		$data[0]=$_SESSION['id']=$row[0];
		$data[1]=$_SESSION['role']=$row[1];
		$data[2]=$_SESSION['loggedin']= "YES";
		$data[3]=$_SESSION['username']=$row[2];
		
		while(!isset($_SESSION['username'])) {
			session_start();
			$_SESSION['username']=$row[2];
		}
		
		$data[4]= 1;
		//echo $data;
	
	}
	else {
		//$msg = 'Login Failed!<br /> Please make sure that you enter the correct details and that you have activated your account.';
		$data[4] = 0;
		//echo $data;
	}


}
echo json_encode($data);

mysql_close($con);

//************************************

/*include 'mysql.php';
header('Access-Control-Allow-Origin: *');
	
$search = mysql_query ("SELECT id, role FROM users WHERE username='".$username."' AND password='".md5($password)."'");
$row = mysql_fetch_row ($search);

if ($row > 0) {
	$msg = 1;		
}
else {
	$msg = 0;
}
echo $msg;*/

?>