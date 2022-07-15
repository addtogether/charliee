<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded)){
        $time = time();
        file_put_contents("../files/order/".$time.".json", $content);
        $flag = true;
        foreach($decoded as $x => $val) {
            // var_dump($val);
            echo "\n".$val["m"];
            $sql = mysqli_query($conn, $val["m"]);
            if($sql){
                $last_inserted = mysqli_insert_id($conn); // return last inserted id
                $query = "INSERT INTO orderDetails (orderID, productID, quantity, amount, status) VALUES (";
                $len = count($val["d"]);
                foreach($val["d"] as $index => $columns){
                    echo "\n".$columns;
                    $query .= $last_inserted.", ".$columns.")";
                    $query .= ($index == $len - 1) ? "" : ", \n";
                }
                $sql1 = mysqli_query($conn, $query);
                if($sql1){
                    $flag = true;
                }
                else{
                    $flag = false;
                    break;
                } 
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