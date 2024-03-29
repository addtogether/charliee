<?php
    session_start();
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

        $routeID = mysqli_real_escape_string($conn, $_POST['routeID']);
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
        $sql = mysqli_query($conn, "UPDATE routeMaster SET routeName = '{$routeName}', location = '{$location}', 
                                    subLocation = '{$subLocation}', frequency = '{$frequency}', weekDay = '{$weekDay}', 
                                    assignToEmployee = '{$assignToEmployee}', addtionalDetails = '{$addtionalDetails}', 
                                    status = '{$routeStatus}', modifiedBy = '{$_SESSION['adminID']}', modifiedIP = '{$ipaddress}', modifiedDate = '{$dateTime}'
                                    WHERE id = '$routeID'");
        if($sql){
            $len = count($routes);
            $isFirst = true;
            $sqlValues = "";
            foreach ($routes as $index => $values) {
                if ($isFirst) {
                    $isFirst = false;
                    continue;
                }
                $dateTime = date('Y-m-d H:i:s');
                unset($routes[$index][1]);
                unset($routes[$index][3]);
                $sqlValues .= '("'.$routes[$index][4].'", "'.$routeID.'", "'.$routes[$index][0].'", "'.$index.'", "'.$routes[$index][2].'", "'.$ipaddress.'", "'.$dateTime.'")';
                $sqlValues .= ($index == $len - 1) ? "" : ", \n";
            }
            $sqlValues .= "\nON DUPLICATE KEY UPDATE \n";
            $sqlValues .= 'id=VALUES(id),
                            routeID=VALUES(routeID),
                            retailerID=VALUES(retailerID),
                            priority=VALUES(priority),
                            status=VALUES(status),
                            modifiedBy = '.$_SESSION['adminID'].', 
                            modifiedIP="'.$ipaddress.'",
                            modifiedDate="'.$dateTime.'";';
            $dateTime = date('Y-m-d H:i:s');
            $sql1 = mysqli_query($conn, "INSERT INTO routeRetailerMapping (id, routeID, retailerID, priority, status, createdIP, 
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

    //initial sublocation dropdown
    if(isset($_POST['locationDropdownInitial'])){
        $locationDropdownInitial = mysqli_real_escape_string($conn, $_POST['locationDropdownInitial']);
        $subLocationDropdownInitial = mysqli_real_escape_string($conn, $_POST['subLocationDropdownInitial']);
        // echo $locationDropdownInitial;
        // echo $subLocationDropdownInitial;
        $sql2 = mysqli_query($conn, "SELECT DISTINCT location FROM retailerMaster WHERE city = '$locationDropdownInitial'");
        echo '<option disabled value="">Select Sub Location</option>';
        while($row2 = mysqli_fetch_assoc($sql2)){
            if($row2["location"]==$subLocationDropdownInitial){
                echo '<option selected>'.$row2["location"].'</option>';            
            }
            else{
                echo '<option>'.$row2["location"].'</option>';            
            }
        }
    }

    //initial retailerName dropdown
    if(isset($_POST['subLocationDropdownInitial1'])){
        $subLocationDropdownInitial1 = mysqli_real_escape_string($conn, $_POST['subLocationDropdownInitial1']);
        // echo $subLocationDropdownInitial1;
        $sql3 = mysqli_query($conn, "SELECT id,retailerName FROM retailerMaster WHERE location = '$subLocationDropdownInitial1'");
        echo '<option selected disabled value="">Select Retailer</option>';
        while($row3 = mysqli_fetch_assoc($sql3)){
            echo '<option value="'.$row3["id"].'">'.$row3["retailerName"].'</option>';           
        }
    }

    //sublocation dropdown
    if(isset($_POST['locationDropdown'])){
        $locationDropdown = mysqli_real_escape_string($conn, $_POST['locationDropdown']);
        // echo $designationDropdown;
        $sql2 = mysqli_query($conn, "SELECT DISTINCT location FROM retailerMaster WHERE city = '$locationDropdown'");
        echo '<option selected disabled value="">Select Sub Location</option>';
        while($row2 = mysqli_fetch_assoc($sql2)){
            echo '<option>'.$row2["location"].'</option>';            
        }
    }

    //retailerName dropdown
    if(isset($_POST['subLocationDropdown'])){
        $subLocationDropdown = mysqli_real_escape_string($conn, $_POST['subLocationDropdown']);
        // echo $designationDropdown;
        $sql3 = mysqli_query($conn, "SELECT id,retailerName FROM retailerMaster WHERE location = '$subLocationDropdown'");
        echo '<option selected disabled value="">Select Retailer</option>';
        while($row3 = mysqli_fetch_assoc($sql3)){
            echo '<option value="'.$row3["id"].'">'.$row3["retailerName"].'</option>';           
        }
    }