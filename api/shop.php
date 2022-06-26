<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // id

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['id'])){
        $day = date("l");
        $sql = mysqli_query($conn, "SELECT id FROM routeMaster 
                                    WHERE assignToEmployee = '{$decoded['id']}' AND weekDay = '{$day}' AND status = 'ON'");
        $output = [];
        if(mysqli_num_rows($sql) != 0){
            $row = mysqli_fetch_assoc($sql);
            $sql1 = mysqli_query($conn, "SELECT retailerID FROM routeRetailerMapping 
                                        WHERE routeID = '{$row['id']}'  AND status = 'ON' ORDER BY priority");
            while($row1 = mysqli_fetch_assoc($sql1)){
                $sql2 = mysqli_query($conn, "SELECT retailerCode, retailerName, contactPersonName, address, location, pincode, 
                                            city, state, country, geoLocation, geoAddress, mobileNumber, whatsappNumber, 
                                            typeOfOutlet, classification, retailerType, workingDays, status FROM retailerMaster 
                                            WHERE id = '{$row1['retailerID']}'");
                $row2 = mysqli_fetch_assoc($sql2);
                array_push($output, array_merge($row1,$row2)); 
            }
            echo json_encode($output);
        }
        else{
            echo json_encode($output);
        }
    }