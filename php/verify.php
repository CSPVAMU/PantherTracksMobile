<?php

	include 'mysql.php';

        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        	// Verify data
        	$email = mysql_escape_string($_GET['email']); // Set email variable
        	$hash = mysql_escape_string($_GET['hash']); // Set hash variable

        	$search = mysql_query("SELECT email, hash, verified FROM users WHERE email='".$email."' AND hash='".$hash."' AND verified='0'");
        	$match  = mysql_num_rows($search);

        	if($match > 0){
        		// We have a match, activate the account
        		mysql_query("UPDATE users SET verified='1' WHERE email='".$email."' AND hash='".$hash."' AND verified='0'");
	        	echo "Your account has been activated.";
        	}else{
        		// No match -> invalid url or account has already been activated.
                	echo "The url is either invalid or your account is already activated.";
        	}

       	}else{
        	// Invalid approach
                echo "Invalid approach, please use the link that has been send to your email.";
        }

?>
