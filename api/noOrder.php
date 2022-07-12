<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded)){
        $flag = true;
        foreach($decoded as $x => $val) {
            // var_dump($val);
            // echo "\n".$val["m"];
            $sql = mysqli_query($conn, $val["m"]);
            if($sql){
                $flag = true;
            }
            else{
                $flag = false;
                break;
            }
        }
        echo json_encode(["inserted"=>$flag]);
    }
    /*
        [
            {
                "m" : "INSERT INTO noOrder (routeID, retailerID, employeeID, orderDate, reason, geoLocation, status) VALUES ()"
            },
            {
                "m" : "INSERT INTO noOrder (routeID, retailerID, employeeID, orderDate, reason, geoLocation, status) VALUES ()"
            }
        ]
    */