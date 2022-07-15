<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // login (usename,password, geolocation (lat,long), validate(true,false))

    // validate true:
    // no database store
    // match username true: return (id,username,status)
    // match username false: return (boolean: false)

    // validate false:
    // match username true: 
    // if status on: 
    //     database store (loginlog)
        
    // else:
    //     return (id,username,status)

    // match username false: return (boolean: false)

    // data: json
    
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
    
    // echo json_encode($decoded);
    if(isset($decoded['validation'])){
        if($decoded['validation']){
            $sql = mysqli_query($conn,"SELECT * FROM employeeLogin WHERE username = '{$decoded['username']}'");
            if(mysqli_num_rows($sql) != 0){
                $row = mysqli_fetch_assoc($sql);
                $check = password_verify($decoded['password'], $row['password']);
                if(mysqli_num_rows($sql) != 0 && $check){
                    unset($row['password']);
                    echo json_encode($row);
                }
                else{
                    echo json_encode(["validation"=>false]);
                }
            }
            else{
                echo json_encode(["validation"=>false]);
            }
        }
        else{
            $sql = mysqli_query($conn,"SELECT * FROM employeeLogin WHERE username = '{$decoded['username']}'");
            // echo strval($sql);
            if(mysqli_num_rows($sql) != 0){
                $row = mysqli_fetch_assoc($sql);
                $sql1 = mysqli_query($conn, "SELECT IMEI FROM employeeMaster WHERE mobileNumber = {$decoded['username']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $row["IMEI"] = $row1["IMEI"];
                $check = password_verify($decoded['password'], $row['password']);
                if(mysqli_num_rows($sql) != 0 && $check){
                    if($row['status']=="ON"){
                        $dateTime = date('Y-m-d H:i:s');
                        $sql = mysqli_query($conn, "INSERT INTO employeeLoginLog (username, loginDateTime, loginGeoLocation) 
                                                    VALUES ('{$decoded['username']}', '{$dateTime}', '{$decoded['geolocation']}')");
                        // echo("Error description: " . mysqli_error($conn));
                        $last_inserted = mysqli_insert_id($conn); // return last inserted id
                        $row['logID'] = strval($last_inserted);
                    }
                    unset($row['password']);
                    echo json_encode($row);
                }
                else{
                    echo json_encode(["validation"=>false]);
                }
            }
            else{
                echo json_encode(["validation"=>false]);
            }
        }
    }
