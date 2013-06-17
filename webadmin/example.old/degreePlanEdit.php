<!DOCTYPE html>
<html>

<?php
include('config_local.php');
include('class.db.php');
include('functions.php');

//http://www.imavex.com/php-pdo-wrapper-class/
$db = new db(PDO_CONNECTION, DB_WRITE_USER, DB_WRITE_PASS);

if(isset($_REQUEST["edit"])) {
    if($_REQUEST["edit"] == "create") {
    ?>
    <form method="get" action="degreePlanEdit.php">
        <input type="hidden" name="edit" value="insert">
        Degree Plan Name: <input type="text" name="planName">
        <input type="submit">
        <a href="degreePlanEdit.php"><input type="button" value="Cancel"></a>
    </form>
    <?php

    } else if(isset($_REQUEST["planName"])) {
        $insert = array("name" => $_REQUEST["planName"]);
        $db->insert("degreePlanData", $insert);
        echo "Success, <a href='degreePlanEdit.php'>click here</a> to go back to list.";
    }
} else {

    ?>
    <p>Select a plan to edit</p>
    <p><a href="degreePlanEdit.php?edit=create">Create a new degree plan</a>.</p>
    <?php

    $results = $db->select("degreePlanData");
    $howmany = count($results);
    echo "<pre>";
    echo "Plan ID\tDegree Plan Name\n";
    echo "-------\t----------------\n";
    
    for($i = 0; $i < $howmany; $i++) {
        echo $results[$i]["planID"] . "\t";
        echo "<a href='degreePlanRequirementsEdit.php?id=" . $results[$i]["planID"] . "'>" . $results[$i]["name"] . "\n</a>";
    }
}
?>


</html>