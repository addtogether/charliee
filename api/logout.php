<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // logID
    // geolocation

    // response : true

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['logID'])){
        $dateTime = date('Y-m-d H:i:s');
        $sql = mysqli_query($conn,"UPDATE employeeLoginLog SET logoutDateTime = '{$dateTime}', 
                                logoutGeoLocation = '{$decoded['geolocation']}' WHERE id = '{$decoded['logID']}'");
        if($sql){
            echo json_encode(["updation"=>true]);
        }
        else{
            echo json_encode(["updation"=>true]);
        }
    }    


