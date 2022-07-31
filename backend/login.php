<?php
    session_start();
    require_once "../includes/connection.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        // $check = password_verify($password, $row['password']);
        
        if($password == $row['password']){
            $_SESSION['adminID'] = $row['id'];
            echo "success";
        }
        else{
            echo "Password is incorrect!";
        }
    }
    else{
        echo "Email does not exist! sign up first.";
    }