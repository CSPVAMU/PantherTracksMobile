<?php
/**
 * Creates json objects from database.
 * No planID returns list of degree plans.
 * Retrieving with a planID returns requirements and course options for that degree plan.
 */
header("Content-Type: application/json", true);
include('config.php');

$planID = (isset($_REQUEST["planID"]) ? $_REQUEST["planID"] : 0);

/**
 * Creates json object of degree plans.
 * @param {?} $DBH Database connection.
 */
function listPlans($DBH) {
    $STH = $DBH->query("SELECT * FROM degreePlanData");
    $json = $STH->fetchAll();
    echo json_encode( $json );
}

/**
 * Creates json object of courses in a degree plan sorted by requirement.
 * @param {?} $DBH Database connection.
 * $param {number} $planID planID of plan requirements.
 */
function listPlanReqs($DBH, $planID) {
    $STH = $DBH->query("
        SELECT * 
        FROM degreePlanRequirements
        INNER JOIN courses
        ON degreePlanRequirements.courseOptions = courses.courseID
        WHERE planID = $planID        
        ");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $json = $STH->fetchAll();
    echo json_encode( $json );
}

try {
    $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
    if ($planID == 0) {
        listPlans($DBH);
    } else {
        listPlanReqs($DBH, $planID);
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}