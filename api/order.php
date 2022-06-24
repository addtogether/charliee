<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // category

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded)){
        foreach($decoded as $x => $val) {
            // var_dump($val);
            echo "\n".$val["m"];
            foreach($val["d"] as $y => $yval){
                echo "\n".$yval;
            } 
        }
    }
    /*
        [
            {
                "m" : "INSERT INTO orderMaster (routeID, retailerID, employeeID, orderDate, totalAmount, totalQuantity, geoLocation, status) VALUES ()",
                "d" : 
                        [
                            "details,details",
                            "details,details"
                        ]
            },
            {
                "m" : "INSERT INTO orderMaster (routeID, retailerID, employeeID, orderDate, totalAmount, totalQuantity, geoLocation, status) VALUES ()",
                "d" : 
                        [
                            "details,details",
                            "details,details"
                        ]
            }
        ]
    */