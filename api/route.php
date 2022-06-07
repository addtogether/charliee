<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // id

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['id'])){
        $day = date("l");
        $sql = mysqli_query($conn, "SELECT id, routeName, location, subLocation, frequency, weekDay, status FROM routeMaster 
                                    WHERE assignToEmployee = '{$decoded['id']}' AND weekDay = '{$day}' AND status = 'ON'");
        if(mysqli_num_rows($sql) != 0){
            $row = mysqli_fetch_assoc($sql);
            $sql1 = mysqli_query($conn, "SELECT retailerID, priority FROM routeRetailerMapping 
                                        WHERE routeID = '{$row['id']}'  AND status = 'ON'");
            $output = [];
            while($row1 = mysqli_fetch_assoc($sql1)){
                array_push($output, $row1); 
            }
            echo json_encode($output);
        }
        else{
            echo json_encode("[]");
        }
    }