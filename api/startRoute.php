<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // input
    // employee id, username, geolocation, photo(base64), datetime
    // routeid, boolean (inserted)

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['id'])){
        $day = date("l");
        $sql = mysqli_query($conn, "SELECT id FROM routeMaster 
                                WHERE assignToEmployee = '{$decoded['id']}' AND weekDay = '{$day}' AND status = 'ON'");
        if(mysqli_num_rows($sql) != 0){
            $row = mysqli_fetch_assoc($sql);
            //base64 to image
            $datetime = strtotime($decoded['startRouteDateTime']);
            $filename = $decoded['username']."-".$datetime."-startDay.png";
            file_put_contents("../files/route/".$filename, file_get_contents($decoded['startRoutePhoto']));
            // file_put_contents($path,base64_decode($decoded['startRoutePhoto']));
            $sql1 = mysqli_query($conn, "INSERT INTO employeeDailyStartRoute (username, routeID, startRouteDateTime, 
                                        startRouteGeoLocation, startRoutePhoto) VALUES ('{$decoded['username']}', 
                                        '{$row['id']}', '{$decoded['startRouteDateTime']}', '{$decoded['startRouteGeoLocation']}', 
                                        '{$filename}')");
            if($sql1){
                $last_inserted = mysqli_insert_id($conn); // return last inserted id
                $row['startID'] = strval($last_inserted);
                $row['inserted'] = true;
                echo json_encode($row);
            }
            else{
                echo json_encode(["inserted"=>false]);
            }
        }
        else{
            echo json_encode(["route"=>false]);
        }
    }