<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded)){
        $flag = true;
        mysqli_autocommit($conn, false);
        mysqli_begin_transaction($conn);
        foreach($decoded as $x => $val) {
            // var_dump($val);
            // echo "\n".$val["m"];
            $filename = null;
            if($val["i"] != null){
                 //base64 to image
                $datetime = time();
                $filename = $datetime."-noOrder.png";
                file_put_contents("../files/noOrder/".$filename,base64_decode($val['i']));
            }
            $sql = mysqli_query($conn, $val["m"].$filename.")");
            if(!$sql){
                echo "sql error".mysqli_error($conn);
                $flag = false;
                break;
            }
        }
        if($flag){
            mysqli_commit($conn);
        }
        else{
            mysqli_rollback($conn);
        }
        echo json_encode(["inserted"=>$flag]);
    }
    /*
        [
            {
                "m" : "INSERT INTO noOrder (routeID, retailerID, employeeID, orderDate, reason, geoLocation, status, image) VALUES (",
                "i" : "base64 string"
            },
            {
                "m" : "INSERT INTO noOrder (routeID, retailerID, employeeID, orderDate, reason, geoLocation, status, image) VALUES (",
                "i" : "base64 string"
            }
        ]
    */