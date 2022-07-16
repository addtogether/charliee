<?php
    date_default_timezone_set("Asia/Kolkata");
    //clever cloud
    $servername = "bfuzsgiszke6l2e7z5o9-mysql.services.clever-cloud.com";
    $username = "u7ttomsnlwm1gcxl";
    $password = "9Vd30iY4A0KjinAF8WSu";
    $dbname = "bfuzsgiszke6l2e7z5o9";

    //valiant
    // $servername = "localhost";
    // $username = "valiantn_user";
    // $password = "Nikul@111$";
    // $dbname = "valiantn_db";
    
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Database connection error".mysqli_connect_error();
    }
