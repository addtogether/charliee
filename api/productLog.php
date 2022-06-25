<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');

    // $content = trim(file_get_contents("php://input"));
    // $decoded = json_decode($content, true);

    $sql = mysqli_query($conn, "SELECT * FROM productLog");
    $row = mysqli_fetch_assoc($sql);
    echo json_encode($row);
