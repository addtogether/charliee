<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // retailerID

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['retailerID'])){
        $day = date("l");
        $sql = mysqli_query($conn, "SELECT retailerCode, retailerName, contactPersonName, address, location, pincode, city, state, 
                                    country, geoLocation, geoAddress, mobileNumber, whatsappNumber, typeOfOutlet, classification, 
                                    retailerType, workingDays, status FROM retailerMaster WHERE id = '{$decoded['retailerID']}'");
        if(mysqli_num_rows($sql) != 0){
            $row = mysqli_fetch_assoc($sql);
            echo json_encode($row);
        }
        else{
            echo json_encode("{}");
        }
    }