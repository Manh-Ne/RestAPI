<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once('../config/db_config.php');
    include_once ('../model/Student.php');

    $db = new database();
    $connection = $db->connect();

    $Student = new Student($connection);
    $read = $Student->read();

    $num = $read->rowCount();
    if ($num > 0) {
        $stu = [];
        $stu['data'] = [];
        while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = [
                'id' => $id,
                'HoTen' => $HoTen,
                'DiaChi' => $DiaChi,
                'Email' => $Email
            ];
            array_push($stu['data'], $item);
        }
        echo json_encode($stu, JSON_PRETTY_PRINT);
    }
?>