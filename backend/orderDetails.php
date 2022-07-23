<?php
    session_start();
    require_once "../includes/connection.php";
    
    if(isset($_POST['orderID'])){

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

        $dateTime = date('Y-m-d H:i:s');

        $orderID = (int) mysqli_real_escape_string($conn, $_POST['orderID']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql1 = mysqli_query($conn, "UPDATE orderMaster SET status = '{$status}', modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                        WHERE id = '{$orderID}'");
        if($sql1){
            echo "success";
        }    
        else{
            echo "error";
            // echo("Error description: " . mysqli_error($conn));
        }
    }
