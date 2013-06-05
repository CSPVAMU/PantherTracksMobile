<html>
<body>

<?php
//header('Access-Control-Allow-Origin: *');
include 'mysql.php';

$length = strpos($_POST['field3'],"@");
$username = substr($_POST['field3'],0,$length);
$hash = md5( rand(0,1000) );
$email = $_POST['field3'];

$search = mysql_query ("SELECT id FROM users WHERE email='".$email."'");
$match = mysql_num_rows ($search);

if ($match > 0) {
	echo 1;
}
else {
	if($_POST['type']=="student")
	$role=3;
else if ($_POST['type']=="faculty")
	$role=2;

mysql_query("INSERT INTO users (role,first,last,username,email,password,major,classification,Departement,verified,hash)
VALUES ('$role','$_POST[field1]','$_POST[field2]','$username','$email','".md5($_POST['field4'])."','$_POST[Major]','$_POST[field7]','$_POST[department]', 0,'$hash')");

mysql_close($con);

$to = $_POST["field3"];
$subject = "PantherTracks Mobile Email Verification";
$message = '

Hello '.$_POST['field1'].', 

Thanks for signing up!
Your username is: '.$username.'

Please click the link below to activate your account:
http://pvamu.hazar.us/php/verify.php?email='.$email.'&hash='.$hash.'';

//$message = "Hello";
$from = "PantherTracks Mobile <noreply-ptmobile@pvamu.edu>";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

echo 0;
}

?>

</body>
</html>