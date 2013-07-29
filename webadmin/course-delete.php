<?php include("header.html");
include('scripts/config.php');

if (isset($_REQUEST["id"])) {
    $id = intval($_REQUEST["id"]);
    try {
        $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
        $STH = $DBH->query("SELECT * FROM `courses` WHERE id = $id");  
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $record = $STH->fetch();
    } catch(PDOException $e) {
    } ?>
    
    
<h2>Are you sure you want to delete <?php echo $record["title"] . " (" . $record["courseID"]; ?>)?</h2>

<form method="get">
    <input type="hidden" value="confirmed" name="delete-course">
    <input type="hidden" value="<?php echo $record["id"]; ?>" name="id">
    <input type="hidden" value="<?php echo $record["title"]; ?>" name="title">
    <input type="submit" value="Yes, delete this course">
    <input id="dp-create-cancel" type="button" value="No, do no delete anything"><br>
    <label>Course Title:</label><span><?php echo $record["title"]; ?></span><br>
    <label>Course and Subject Identifier:</label><span><?php echo $record["courseID"]; ?></span><br>
    <label>Credit Hours:</label><span><?php echo $record["creditHours"]; ?></span><br>
    <label>Catalog Description:</label><span><?php echo $record["description"]; ?></span><br>
</form>

    <?php
    
}

if (isset($_REQUEST["delete-course"])) {
    if($_REQUEST["delete-course"] == "confirmed") {
        $id = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        
        try {
            $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
            $STH = $DBH->prepare("DELETE FROM `courses` WHERE id = $id"); 
            $STH->execute();  
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        echo $title . " deleted.<br><br>";
    }
}

?>



<?php include("footer.html"); ?>
