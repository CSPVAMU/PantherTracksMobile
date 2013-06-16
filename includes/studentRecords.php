<?php
/**
 * Returns json object of student records based on URI variable.
 * studentid=#      Studentid number (should fall back to session storage if not provided).
 * display=plan     Retuns student records that match the student's chosen degree plan.
 * display=all      Returns all student records.
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

if (isset($studentid)) {
    try {
        $DBH = new PDO(PDO, DB_USER, DB_PASS);
        $sql = "SELECT `planID` FROM `users` WHERE `id`=$studentid LIMIT 1";
        $STH = $DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $result = $STH->fetch(); //Retuns array, even for single record.
        $planID = $result["planID"];

        if ($display == "plan") {
            $sql = "SELECT *
                    FROM StudentRecords
                    INNER JOIN degreePlanRequirements
                    ON StudentRecords.courseID = degreePlanRequirements.courseOptions
                    INNER JOIN courses
                    ON StudentRecords.courseID = courses.courseID
                    WHERE degreePlanRequirements.planID = $planID
                    AND StudentRecords.studentID = $studentid";
        } else {
            $sql = "SELECT *
                    FROM StudentRecords
                    INNER JOIN courses
                    ON StudentRecords.courseID = courses.courseID
                    INNER JOIN users
                    ON StudentRecords.modifiedBy = users.id
                    WHERE StudentRecords.studentID = $studentid";
        }

        $STH = $DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        
        $response = [];
        while($row = $STH->fetch()) {
            array_push($response, json_encode($row));
        }
        echo json_encode($response);

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}