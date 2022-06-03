<?php
    require_once "../includes/connection.php";

    if(isset($_POST['routes'])){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        $routeName = mysqli_real_escape_string($conn, $_POST['routeName']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $subLocation = mysqli_real_escape_string($conn, $_POST['subLocation']);
        $frequency = mysqli_real_escape_string($conn, $_POST['frequency']);
        $weekDay = mysqli_real_escape_string($conn, $_POST['weekDay']);
        $assignToEmployee = mysqli_real_escape_string($conn, $_POST['assignToEmployee']);
        $addtionalDetails = mysqli_real_escape_string($conn, $_POST['addtionalDetails']);
        $routeStatus = mysqli_real_escape_string($conn, $_POST['routeStatus']);

        $routes = json_decode($_POST['routes'], true);
        // var_dump($routes);

        $dateTime = date('Y-m-d H:i:s');
        $sql = mysqli_query($conn, "INSERT INTO routeMaster (routeName, location, subLocation, frequency, weekDay, 
                                    assignToEmployee, addtionalDetails, status, createdIP, createdDate)
                                    VALUES ('{$routeName}', '{$location}', '{$subLocation}', '{$frequency}', '{$weekDay}', 
                                    '{$assignToEmployee}', '{$addtionalDetails}', '{$routeStatus}', '{$ipaddress}', '{$dateTime}')");
        if($sql){
            $last_inserted = mysqli_insert_id($conn); // return last inserted id

            $len = count($routes);
            $isFirst = true;
            $sqlValues = "";
            foreach ($routes as $index => $values) {
                if ($isFirst) {
                    $isFirst = false;
                    continue;
                }
                unset($routes[$index][2]);
                $sqlValues .= '("'.$last_inserted.'", "';
                $sqlValues .= implode('", "', $routes[$index]) . "\"";
                $sqlValues .= ', "'.$ipaddress.'", "'.$dateTime.'")';
                $sqlValues .= ($index == $len - 1) ? "" : ", \n";
            }
            $dateTime = date('Y-m-d H:i:s');
            $sql1 = mysqli_query($conn, "INSERT INTO routeRetailerMapping (routeID, retailerID, priority, status, createdIP, 
                                            createdDate) VALUES $sqlValues");
            if($sql1){
                echo "success";
            }
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }
        else{
            echo "error";
            // echo("Error description: " . mysqli_error($conn));
        }
    }