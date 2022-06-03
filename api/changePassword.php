<?php
    // id 
    // old pass
    // new pass

    // old pass verify from db
    //     incorret return false no update

    //     corret return true update
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['id'])){
        $sql = mysqli_query($conn,"SELECT * FROM employeeLogin WHERE id = '{$decoded['id']}'");
        if(mysqli_num_rows($sql) != 0){
            $row = mysqli_fetch_assoc($sql);
            $check = password_verify($decoded['oldPassword'], $row['password']);
            if(mysqli_num_rows($sql) != 0 && $check){
                $newPassword = password_hash($decoded['newPassword'], PASSWORD_DEFAULT);
                $sql = mysqli_query($conn,"UPDATE employeeLogin SET password = '{$newPassword}' WHERE id = '{$decoded['id']}'");
                if(mysqli_affected_rows($conn)!=0){
                    echo json_encode(["updation"=>true]);
                }
                else{
                    echo json_encode(["updation"=>false]);
                }
            }
            else{
                echo json_encode(["updation"=>false]);
            }
        }
        else{
            echo json_encode(["updation"=>false]);
        }
    }
