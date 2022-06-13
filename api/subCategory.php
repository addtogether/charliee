<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // category

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['category'])){
        $output = [];
            $sql = mysqli_query($conn, "SELECT DISTINCT subCategory FROM productMaster WHERE category = '{$decoded['category']}'");
            while($row = mysqli_fetch_assoc($sql)){
                array_push($output, $row); 
            }
            echo json_encode($output);
    }