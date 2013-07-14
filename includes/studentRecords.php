<?php
/**
 * Returns json object of student records based on URI variable. There is an example of how to use 
 * this at includes/exampleStudentRecordCall.html.
 *
 * URI options:
 *   studentid=#       Studentid number, this is optional (should fall back to session storage if not
 *                     provided).
 *   display=all       Returns all student records, this is the default if not provided.
 *   display=plan      Retuns student records that match the students chosen degree plan.
 *   display=notplan   Returns student records that do not match students current degree plan.
 */

header('Content-Type: application/json');
include '../php/mysql.php';

if (isset($_REQUEST["studentid"])) {
    $studentid = $_REQUEST["studentid"];
}
if (isset($_REQUEST["display"])) {
    $display = $_REQUEST["display"];
} else {
    $display = "all";
}

echo $display;

if (isset($studentid)) {

    try {
        $DBH = new PDO(PDO, DB_USER, DB_PASS);
        $sql = "SELECT `chosenPlan` FROM `users` WHERE `id`=$studentid LIMIT 1";
        $STH = $DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $result = $STH->fetch(); //Retuns array, even for single record.
        $chosenPlan = $result["chosenPlan"];

        if ($display == "plan") {
            $sql = "SELECT *
                    FROM StudentRecords
                    INNER JOIN degreePlanRequirements
                    ON StudentRecords.courseID = degreePlanRequirements.courseOptions
                    INNER JOIN courses
                    ON StudentRecords.courseID = courses.courseID
                    WHERE degreePlanRequirements.planID = $chosenPlan
                    AND StudentRecords.studentID = $studentid";
        } else if ($display == "notplan") {
            $sql = "SELECT sr.studentID, sr.courseID 
                    FROM StudentRecords sr
                    WHERE sr.studentID = $studentid
                    AND NOT EXISTS (
                        SELECT dpr.courseOptions
                        FROM degreePlanRequirements dpr 
                        WHERE dpr.planID = 1 AND dpr.courseOptions = sr.courseID)";
        } else {
            $sql = "SELECT StudentRecords.*, courses.*, users.id, users.first, users.last, users.chosenPlan
                    FROM StudentRecords
                    INNER JOIN courses
                    ON StudentRecords.courseID = courses.courseID
                    INNER JOIN users
                    ON StudentRecords.modifiedBy = users.id
                    WHERE StudentRecords.studentID = $studentid";
        }

        $STH = $DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        
        $response = array(); //
        while($row = $STH->fetch()) {
            array_push($response, json_encode($row));
        }
        echo json_encode($response); // Actually returns an json object of json objects.

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
