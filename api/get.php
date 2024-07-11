<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once('../config/db_config.php');
    include_once ('../model/Student.php');

    $db = new database();
    $connection = $db->connect();

    $Student = new Student($connection);
    $Student->id = isset($_GET['id']) ? $_GET['id'] : die();
    $Student->get();
    $Student_arr = [
        'id' => $Student->id,
        'HoTen' => $Student->HoTen,
        'DiaChi' => $Student->DiaChi,
        'Email' => $Student->Email
    ];
echo (json_encode($Student_arr, JSON_PRETTY_PRINT));
?>