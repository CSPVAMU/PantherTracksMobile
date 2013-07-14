<?php
/* returns list of courses
*/
header("Content-Type: application/json", true);
include('config.php');


function coursesComboBox($DBH) {
    $STH = $DBH->query("SELECT * FROM courses");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    $json = $STH->fetchAll();
    echo json_encode( $json );
}



try {
    $DBH = new PDO(PDO_CONNECTION, DB_USER, DB_PASS);
    coursesComboBox($DBH);
} catch(PDOException $e) {
    echo $e->getMessage();
}