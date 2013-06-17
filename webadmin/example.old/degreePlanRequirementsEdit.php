    <!DOCTYPE html>
    <html>
<?php
include('config_local.php');
include('class.db.php');
include('functions.php');

//http://www.imavex.com/php-pdo-wrapper-class/
$db = new db(PDO_CONNECTION, DB_WRITE_USER, DB_WRITE_PASS);

if(isset($_REQUEST["id"])) {
    $planID = $_REQUEST["id"];
} else {
    //header('Location: degreePlanEdit.php');
    ?>
    <meta HTTP-EQUIV="REFRESH" content="0; url=degreePlanEdit.php">
    <?php
}
$degreename = $db->select("degreePlanData", "planID = $planID");
echo "<h2>Editing " . $degreename[0]["name"] . " Requirements</h2>";

if(isset($_REQUEST["requirement"])) {
    if($_REQUEST["requirement"] == "createnew") {
        echo "Create new requirement.";
        ?>
        <form method="get" action="degreePlanRequirementsEdit.php">
            <input type="hidden" name="id" value="<?php echo $planID; ?>">
            <input type="hidden" name="requirement" value="creatingnew">
            Requirement Name: <input type="text" name="requirementName"><br>
            Select course(s) to meet requirement<br>
            <select name="courses[]" size="10" multiple="multiple">
            <?php
                $couseoptions = $db->select("courses");
                foreach($couseoptions as $course) {
                    echo "<option value='" . $course["courseID"] . "'>" . $course["courseID"] . " - " . $course["title"] . "</option>";
                }
            ?>
            </select><br>
            hold ctrl to select multiple courses<br>
            <input type="submit">
            <a href="degreePlanRequirementsEdit.php"><input type="button" value="Cancel"></a>
        </form>
        <?php
    } else if($_REQUEST["requirement"] == "creatingnew") {
        
        foreach($_REQUEST["courses"] as $coursesToInput) {
            $insert = array(
                "planID" => $planID,
                "requirement" => $_REQUEST["requirementName"],
                "courseOptions" => $coursesToInput
            );
            
            $db->insert("degreePlanRequirements", $insert);
            
            echo "Added " . $coursesToInput . " to " . $_REQUEST["requirementName"] . "<br>";
        }
        
    } else {
    
        $requirement = $_REQUEST["requirement"]; 
        $reqresults = $db->select("degreePlanRequirements", "planID = '1' AND requirement = '$requirement'", "","courseOptions");
        $reqresultslen = count($reqresults);
        
        ?>
        <p> Editing <?php echo $requirement ?> requirement</p>
        <form>
            Requirement Name: <input type="text" value="<?php echo $requirement ?>"><br>
            Courses that will Meet Requirement: <input type="text" value="<?php 
                foreach($reqresults as $cour) {
                    echo $cour["courseOptions"] . ", ";
                }
            ?>"><br>
        </form>

<?php
    }
} else {
?>


    <p>Click on a requirement to edit that requirement</p>
    <p><a href="degreePlanRequirementsEdit.php?id=<?php echo $planID; ?>&requirement=createnew">add a requirement/class to degree plan</a></p>

    <hr>

    <?php
    $results = $db->select("degreePlanRequirements", "planID = $planID");
    $resultslen = count($results);

    $req = array();
    for($i = 0; $i < $resultslen; $i++) {
        array_push($req, array($results[$i]["requirement"],$results[$i]["courseOptions"]));
    }


    $opts = array_column($req, 0);  //makes an array of requirement (has doubles)
    $opts = array_unique($opts);    //makes array only have unique values.
    $optslen = count($opts);        //length of unique values

    echo "<pre>";
    echo "Requirement\tCourse Options\n";
    echo "-----------\t--------------\n";
    //Iterates over the $req array for each unique requirment, creates a temporary array of all courses than can meet that requirement.
    foreach($opts as $options) {
        $temp = array();
        foreach($req as $val) {
            if($val[0] == $options) {
                array_push($temp, $val[1]);
            }
        }

        //Displays the results.
        echo "<a href='degreePlanRequirementsEdit.php?id=" . $planID . "&requirement=" . $options . "'>" . $options . "</a>\t";
        foreach($temp as $course) {
            echo $course . ", ";
        }
        echo "\n";
    }

}

?>
</html>