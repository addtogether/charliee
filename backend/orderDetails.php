<?php
    session_start();
    require_once "../includes/connection.php";
    
    if(isset($_POST['orderID'])){

        $orderID = (int) mysqli_real_escape_string($conn, $_POST['orderID']);
        $status = (int) mysqli_real_escape_string($conn, $_POST['status']);

        $sql1 = mysqli_query($conn, "UPDATE orderMaster SET status = '{$status}' WHERE id = '{$orderID}'");
        if($sql1){
            echo "success";
        }    
        else{
            echo "error";
            // echo("Error description: " . mysqli_error($conn));
        }
    }
