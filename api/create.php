<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../config/db_config.php');
    include_once ('../model/Student.php');

    $db = new database();
    $connection = $db->connect();

    $Student = new Student($connection);

    $data = json_decode(file_get_contents("php://input"));
    $Student ->HoTen = $data->HoTen;
    $Student ->DiaChi = $data->DiaChi;
    $Student ->Email = $data->Email;
    if ($Student->create()) {
        echo json_encode(['message' => 'Student created']);
    } else {
        echo json_encode(['message' => 'Student not created']);
    }

?>