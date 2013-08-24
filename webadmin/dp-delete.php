<?php include("header.html");
include('scripts/config.php');

if (isset($_REQUEST["planid"])) {
    $id = intval($_REQUEST["planid"]);
    try {
        $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
        $STH = $DBH->query("SELECT * FROM `degreeplandata` WHERE planID = $id");  
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $record = $STH->fetch();
    } catch(PDOException $e) {
    } ?>
    
    
<h2>Are you sure you want to delete <?php echo $record["name"]; ?>?</h2>

<form method="get">
    <input type="hidden" value="confirmed" name="delete-plan">
    <input type="hidden" value="<?php echo $record["name"]; ?>" name="planname">
    <input type="hidden" value="<?php echo $record["planID"]; ?>" name="id">
    <input type="submit" value="Yes, delete this degree plan">
    <input id="dp-create-cancel" type="button" value="No, do no delete anything"><br>
</form>

    <?php
    
}

if (isset($_REQUEST["delete-plan"])) {
    if($_REQUEST["delete-plan"] == "confirmed") {
        $id = $_REQUEST["id"];
        $title =  $_REQUEST["planname"];
		
        try {
            $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
            $STH = $DBH->prepare("DELETE FROM `degreeplandata` WHERE planID = $id"); 
            $STH->execute();
			
			$STH = $DBH->prepare("DELETE FROM `degreeplanrequirements` WHERE planID = $id"); 
            $STH->execute();  
			
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        echo $title . " deleted.<br><br>";
    }
}

?>



<?php include("footer.html"); ?>
