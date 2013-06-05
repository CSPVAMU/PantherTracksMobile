<?php 

include 'mysql.php';
$db = & CDB::get_db();
$sql = "Select * FROM `users` WHERE `role`='2' ORDER BY `id` ASC";
$arr = & $db->get_array($sql);
$list = array();
$count=0;
foreach($arr as $row) {
	$list[$count]=$row['id'];
	$count++;
}

$count=0;

while($count<count($list)){
	if(isset($_POST[$list[$count]]) ){
		$sql = "UPDATE `users` SET `authorized`='1' WHERE `id`='".$_POST[$list[$count]]."'";
		$db->exec($sql);
		$count++;
	}else {
		$sql = "UPDATE `users` SET `authorized`='0' WHERE `id`='".$list[$count]."'";
		$db->exec($sql);
		$count++;	
	}
}



?>

