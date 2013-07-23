<?php include("header.html");
include('scripts/config.php');

if (isset($_REQUEST["id"])) {
    try {
        $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
        $STH = $DBH->query('SELECT * FROM courses WHERE id = $_REQUEST["id"]');  
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $record = $STH->fetch();
        echo $record["id"];
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    
}

if (isset($_REQUEST["update-course"])) {
    $query  = explode('&', $_SERVER['QUERY_STRING']);
    $params = array();
    
    foreach($query as $param) {
        list($name, $value) = explode('=', $param);
        $params[urldecode($name)][] = urldecode($value);
    }
    
    $courseID = $_REQUEST["course-id"];
    $subject = substr($_REQUEST["course-id"], 0, 4);
    $title = $_REQUEST["course-title"];
    $creditHours = $_REQUEST["course-hours"];
    $level = substr($_REQUEST["course-id"], 4, 1);
    $fall = (isset($_REQUEST["fall"]) ? true : false);
    $spring = (isset($_REQUEST["spring"]) ? true : false);
    $summer = (isset($_REQUEST["summer"]) ? true : false);
    $description = $_REQUEST["course-description"];
    
    $coreqs = "[";
    if (isset($params["co-req"])) {
        foreach($params["co-req"] as $coreqcourse) {
            $coreqs = $coreqs . "\"" . $coreqcourse . "\"" . ",";
        }
    }
    if (count($coreqs) == 1) { $coreqs = substr($coreqs, 0, -1); }
    $coreqs = $coreqs . "]";
    
    $prereqs = "[";
    if (isset($params["prereq"]) > 0) {
        foreach($params["prereq"] as $prereqcourse) {
            $prereqs = $prereqs . "\"" . $prereqcourse . "\"" . ",";
        }
    }
    if (count($prereqs) == 1) { $prereqs = substr($prereqs, 0, -1); }
    $prereqs = $prereqs . "]";
    
    echo $prereqs;
    echo $coreqs;

    try {
        $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
        $STH = $DBH->prepare("INSERT INTO 
                              courses (`courseID`, `subject`, `title`, `creditHours`, `level`,
                                       `fall`, `spring`, `summer`, `coreqs`, `prereqs`, `description`)
                                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
        $STH->execute([$courseID, $subject, $title, $creditHours, $level,
                       $fall, $spring, $summer, $coreqs, $prereqs, $description]);  
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    echo $_REQUEST["course-title"] . " updated in the database.<br><br>";
}

?>

<h2>Create New Course</h2>

<form method="get">
    <input type="hidden" value="insert" name="add-course">
    <input type="submit" value="Submit">
    <input id="dp-create-cancel" type="button" value="Cancel"><br>
    <input class="add-single" id="add-prereq" label="prereq" type="button" value="add pre-requiste course">
    <input class="add-single" id="add-coreq" label="co-req" type="button" value="add co-requisite course"><br>
    <label>Course Title:</label><input type="text" name="course-title"><br>
    <label>Course and Subject Identifier:</label><input type="text" name="course-id"><br>
    <label>Credit Hours:</label><input type="text" name="course-hours"><br>
    <label>Normal Semester this course is offered:</label><br>
    <div class="checkbox"><input type="checkbox" name="spring" value="spring">Spring?</div>
    <div class="checkbox"><input type="checkbox" name="fall" value="fall">Fall?</div>
    <div class="checkbox"><input type="checkbox" name="summer" value="summer">Summer?</div>
    <label>Catalog Description:</label><textarea name="course-description" cols="24"></textarea><br>
</form>


<?php include("footer.html"); ?>
