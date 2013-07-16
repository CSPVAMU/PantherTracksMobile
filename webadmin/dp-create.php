<?php include("header.html");

if (!isset($_REQUEST["operation"])) {
    header("location: index.php");
}

?>

<h2>Create New Degree Plan</h2>

<form method="get">
    <input type="hidden" value="insert" name="operation">
    Degree Plan Name: <input type="text" name="planname">
    <input type="submit" value="Submit">
    <input id="dp-create-cancel" type="button" value="Cancel"><br>
    <input id="add-single" type="button" value="add single course">
    <input id="add-elective" type="button" value="add elective"><br>
    
    
</form>


<?php include("footer.html"); ?>
