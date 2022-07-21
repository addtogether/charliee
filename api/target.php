<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // id

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['id'])){
        $month = date("Y-m");
        $sql = mysqli_query($conn, "SELECT target, achieved FROM employeeTarget 
                                    WHERE employeeID = '{$decoded['id']}' AND monthYear = '{$month}'");
        if(mysqli_num_rows($sql) != 0){
            $row = mysqli_fetch_assoc($sql);
            echo json_encode($row);
        }
        else{
            echo json_encode("{}");
        }
    }