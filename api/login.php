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
            $check = password_verify($decoded['password'], $row['password']);
            if(mysqli_num_rows($sql) != 0 && $check){
                $row = mysqli_fetch_assoc($sql);
                unset($row['password']);
                echo json_encode($row);
            }
            else{
                echo json_encode(["validation"=>false]);
            }
    
        }
        else{
            $sql = mysqli_query($conn,"SELECT * FROM employeeLogin WHERE username = '{$decoded['username']}'");
            if($sql){
                $row = mysqli_fetch_assoc($sql);
                $check = password_verify($decoded['password'], $row['password']);
                if(mysqli_num_rows($sql) != 0 && $check){
                    if($row['status']=="ON"){
                        $sql = mysqli_query($conn, "INSERT INTO employeeLoginLog (username, loginDateTime, loginGeoLocation) VALUES ('{$decoded['username']}', CURRENT_TIMESTAMP, '{$decoded['geolocation']}')");
                        // echo("Error description: " . mysqli_error($conn));
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
