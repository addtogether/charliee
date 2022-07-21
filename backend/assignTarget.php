<?php
    session_start();
    require_once "../includes/connection.php";
    
    //add retailer form
    if(isset($_POST['employee'])){
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

        // $date = date("Y-m-d");

        $employee = mysqli_real_escape_string($conn, $_POST['employee']);
        $month = mysqli_real_escape_string($conn, $_POST['month']);
        $target = mysqli_real_escape_string($conn, $_POST['target']);

        $sql = mysqli_query($conn,"SELECT * FROM employeeTarget WHERE employeeID = '{$employee}' AND monthYear = '{$month}'");
        if(mysqli_num_rows($sql) == 0){
            $dateTime = date('Y-m-d H:i:s');
            $sql1 = mysqli_query($conn, "INSERT INTO employeeTarget (employeeID, monthYear, target, createdIP, createdDate) 
                                            VALUES ('{$employee}', '{$month}', '{$target}', '$ipaddress', '{$dateTime}')");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }
        else{
            echo "Employee's Target already exist!";
        }
    }
