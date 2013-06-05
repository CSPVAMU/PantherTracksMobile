<?php

include 'mysql.php';
header('Access-Control-Allow-Origin: *');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        	// Verify data
        	$email = mysql_escape_string($_GET['email']); // Set email variable
        	$hash = mysql_escape_string($_GET['hash']); // Set hash variable

?>
        	<html>
		<head><title>Reset Password</title></head>
		<body>
			
			<form name="reset" method="post">
				Enter new password<input name="pass" type="password" /><br>
				Retype new password<input name="repass" type="password" /><br>
			<input type="submit" value="submit">
			</form>
		
		</body>
		
		</html>
<?php
		if($_POST['pass'] == " " || $_POST['pass'] == "")
			echo "Please enter your new password";
		else if($_POST['pass'] == $_POST['repass']) {
		
			$password = $_POST['pass'];
        		$search = mysql_query("SELECT email, hash FROM users WHERE email='".$email."' AND hash='".$hash."'");
        		$match  = mysql_fetch_array($search);

        		if($match > 0){
        			// We have a match, activate the account
        			mysql_query("UPDATE users SET password='".md5($password)."' WHERE email='".$email."' AND hash='".$hash."'");
	        		echo "Your password has been reset.";
	        	}
	        	else
	        		echo "Error: User not found.";
        	}else{
        		// No match -> invalid url or account has already been activated.
                	echo "Password fields do not match.";
        	}

}
else{
        	// Invalid approach
	echo "Invalid approach, please use the link that has been send to your email.";
}
?>