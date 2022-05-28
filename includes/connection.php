<?php
    $servername = "bfuzsgiszke6l2e7z5o9-mysql.services.clever-cloud.com";
    $username = "u7ttomsnlwm1gcxl";
    $password = "9Vd30iY4A0KjinAF8WSu";
    $dbname = "bfuzsgiszke6l2e7z5o9";
    
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Database connection error".mysqli_connect_error();
    }
