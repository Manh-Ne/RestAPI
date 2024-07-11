<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../config/db_config.php');
    include_once ('../model/Student.php');

    $db = new database();
    $connection = $db->connect();

    $Student = new Student($connection);

    $data = json_decode(file_get_contents("php://input"));
    
    if ($Student->delete()) {
        echo json_encode(['message' => 'Student deleted']);
    } else {
        echo json_encode(['message' => 'Student not deleted']);
    }

?>