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
                $last_inserted = mysqli_insert_id($conn); // return last inserted id
                $query = "INSERT INTO returnDetails (returnID, productID, quantity, amount, status) VALUES (";
                $len = count($val["d"]);
                foreach($val["d"] as $index => $columns){
                    // echo "\n".$columns;
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
                "m" : "INSERT INTO returnMaster (routeID, retailerID, employeeID, returnDate, totalAmount, totalQuantity, geoLocation, status) VALUES ()",
                "d" : 
                        [
                            "details,details",
                            "details,details"
                        ]
            },
            {
                "m" : "INSERT INTO returnMaster (routeID, retailerID, employeeID, returnDate, totalAmount, totalQuantity, geoLocation, status) VALUES ()",
                "d" : 
                        [
                            "details,details",
                            "details,details"
                        ]
            }
        ]
    */