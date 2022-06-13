<?php
    require_once "../includes/connection.php";
    header('Content-Type: application/json; charset=utf-8');
    // category, subCategory

    // response : array of json

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);

    if(isset($decoded['category'])){
        $output = [];
        if($decoded['category']=="-1" && $decoded['subCategory']=="-1"){
            $sql = mysqli_query($conn, "SELECT id, productCode, productName, GMS, photo, catalogueURL, category, subCategory, GST, 
                                        MRP, WR, DR, SSR, schemeRate FROM productMaster");
            while($row = mysqli_fetch_assoc($sql)){
                array_push($output, $row); 
            }
            echo json_encode($output);
        }
        else if($decoded['category']=="-1"){
            $sql = mysqli_query($conn, "SELECT id, productCode, productName, GMS, photo, catalogueURL, category, subCategory, GST, 
                                        MRP, WR, DR, SSR, schemeRate FROM productMaster WHERE subCategory = '{$decoded['subCategory']}'");
            while($row = mysqli_fetch_assoc($sql)){
                array_push($output, $row); 
            }
            echo json_encode($output);
        }
        else if($decoded['subCategory']=="-1"){
            $sql = mysqli_query($conn, "SELECT id, productCode, productName, GMS, photo, catalogueURL, category, subCategory, GST, 
                                        MRP, WR, DR, SSR, schemeRate FROM productMaster WHERE category = '{$decoded['category']}'");
            while($row = mysqli_fetch_assoc($sql)){
                array_push($output, $row); 
            }
            echo json_encode($output);
        }
        else{
            $sql = mysqli_query($conn, "SELECT id, productCode, productName, GMS, photo, catalogueURL, category, subCategory, GST, 
                                        MRP, WR, DR, SSR, schemeRate FROM productMaster WHERE category = '{$decoded['category']}' 
                                        AND subCategory = '{$decoded['subCategory']}'");
            while($row = mysqli_fetch_assoc($sql)){
                array_push($output, $row); 
            }
            echo json_encode($output);
        }
    }