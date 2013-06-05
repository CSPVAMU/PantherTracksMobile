<html>

<body>

<?php

$length = strpos($_POST['field3'],"@");
$username = substr($_POST['field3'],0,$length);

$con = mysql_connect("localhost","pvamu_pvplanner","c;U=CT^OgfWs");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("pvamu_pvplanner", $con);

mysql_query("INSERT INTO users (first,last,username,email,password,verified,hash)
VALUES ('$_POST[field1]','$_POST[field2]','$username','$_POST[field3]','$_POST[field4]',0,'test')");

mysql_close($con);

$to = $_POST["field3"];
$subject = "PantherTracks Mobile Email Verification";
$message = "Hello! This is a test.";
$from = "admin@pvamu.hazar.us";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
?>

<script type="text/javascript">window.location.href = "index.html"</script>

</body>
</html>
