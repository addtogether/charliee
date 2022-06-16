<?php
    session_start();
    require_once "../includes/connection.php";
    
    if(isset($_POST['value'])){

        $value = (int) mysqli_real_escape_string($conn, $_POST['value']);

        $sql1 = mysqli_query($conn, "UPDATE geoFenceSetting SET value = '{$value}' WHERE id = '1'");
        if($sql1){
            echo "success";
        }    
        else{
            echo "error";
            // echo("Error description: " . mysqli_error($conn));
        }
    }
