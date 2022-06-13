<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // input
    // employee id, username, geolocation, photo(base64), datetime
    // routeid, boolean (inserted)

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['startID'])){
        //base64 to image
        $datetime = strtotime($decoded['endRouteDateTime']);
        $filename = $decoded['username']."-".$datetime."-endDay.jpeg";
        file_put_contents("../files/route/".$filename, file_get_contents($decoded['endRoutePhoto']));
        $sql1 = mysqli_query($conn, "UPDATE employeeDailyStartRoute SET endRouteDateTime = '{$decoded['endRouteDateTime']}',  
                                    endRouteGeoLocation = '{$decoded['endRouteGeoLocation']}', endRoutePhoto = '{$filename}' 
                                    WHERE id = '{$decoded['startID']}'");
        if($sql1){
            echo json_encode(["inserted"=>true]);
        }
        else{
            echo json_encode(["inserted"=>false]);
        }
    }