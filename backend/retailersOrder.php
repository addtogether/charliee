<?php
    session_start();
    require_once "../includes/connection.php";
    
    if(isset($_POST['orderDetailID'])){
        if($_POST['orderBoolean']=="true"){
            $orderDetailID = (int) mysqli_real_escape_string($conn, $_POST['orderDetailID']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);
    
            $sql1 = mysqli_query($conn, "UPDATE orderDetails SET status = '{$status}' WHERE id = '{$orderDetailID}'");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }
        else{
            $orderDetailID = (int) mysqli_real_escape_string($conn, $_POST['orderDetailID']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);
    
            $sql1 = mysqli_query($conn, "UPDATE returnDetails SET status = '{$status}' WHERE id = '{$orderDetailID}'");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }

    }
