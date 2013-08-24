<?php include("header.html");

if (!isset($_REQUEST["operation"])) {
    header("location: index.php");
} else if (isset($_REQUEST["planname"])) {
    include('scripts/config.php');
	$planname = $_REQUEST["planname"];
	$plandesc = $_REQUEST["plandesc"];
	
	try {
        $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
        $STH = $DBH->prepare("INSERT INTO
								degreeplandata (`name`, `description`)
                                values (?, ?)");

        $STH->execute(array($planname, $plandesc));  
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    echo "Added " . $planname . " to the database.<br><br>";
}

?>

<h2>Create New Degree Plan</h2>

<form method="get">
	<div>
    <input type="hidden" value="insert" name="operation">
    Degree Plan Name: <input type="text" name="planname"><br>
	Description: <br><textarea name="plandesc" style="float: none; height: 90px; width: 365px;"></textarea><br>
	</div>
	<div>
    <input type="submit" value="Submit">
    <input id="dp-create-cancel" type="button" value="Cancel"><br>
    <input class="add-single" type="button" value="add single course">
    <input id="add-elective" type="button" value="add elective"><br>
    </div>
    
</form>


<?php include("footer.html"); ?>
