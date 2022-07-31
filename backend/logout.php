<?php
    session_start();
    if(isset($_SESSION['adminID'])){
        session_unset();
        session_destroy();
        header("location: ../index.php");
    }