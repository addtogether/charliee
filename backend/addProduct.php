<?php
    session_start();
    require_once "../includes/connection.php";
    
    //add employee form
    if(isset($_POST['productCode'])){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        // $date = date("Y-m-d");
        
        $productCode = mysqli_real_escape_string($conn, $_POST['productCode']);
        $productName = mysqli_real_escape_string($conn, $_POST['productName']);
        $GST = mysqli_real_escape_string($conn, $_POST['GST']);
        $GMS = mysqli_real_escape_string($conn, $_POST['GMS']);
        $MRP = mysqli_real_escape_string($conn, $_POST['MRP']);
        $catalogueURL = mysqli_real_escape_string($conn, $_POST['catalogueURL']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $subCategory = mysqli_real_escape_string($conn, $_POST['subCategory']);
        $WR = mysqli_real_escape_string($conn, $_POST['WR']);
        $DR = mysqli_real_escape_string($conn, $_POST['DR']);
        $SSR = mysqli_real_escape_string($conn, $_POST['SSR']);
        $schemeRate = mysqli_real_escape_string($conn, $_POST['schemeRate']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        if($_FILES['productPhoto']['name'] != null){
            $fileName = $_FILES['productPhoto']['name'];
            $tmpName = $_FILES['productPhoto']['tmp_name'];
            $fileSplit = explode(".", $fileName);
            $fileExt = end($fileSplit);
            if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "png"){
                $newFileName = $productCode."-productPhoto.".$fileExt;
                // $newFileName = str_replace(" ", "-", $newFileName);
                if(move_uploaded_file($tmpName, "../files/product/".$newFileName)){
                    $dateTime = date('Y-m-d H:i:s');
                    $sql1 = mysqli_query($conn, "INSERT INTO productMaster (productCode, productName, GMS, photo, catalogueURL, 
                                                category, subCategory, GST, MRP, WR, DR, SSR, schemeRate, status, createdIP, createdDate) 
                                                VALUES ('{$productCode}', '{$productName}', '{$GMS}', '{$newFileName}', '{$catalogueURL}', 
                                                '{$category}', '{$subCategory}', '{$GST}', '{$MRP}', '{$WR}', '{$DR}', '{$SSR}', 
                                                '{$schemeRate}', '{$status}', '$ipaddress', '{$dateTime}')");
                    if($sql1){
                        echo "success";
                    }    
                    else{
                        echo "error";
                        // echo("Error description: " . mysqli_error($conn));
                    }
                }
                else{
                    echo "Unable to upload file!";
                }
            }
            else{
                echo "Please select image files only!!";
            }
        }
        else{
            echo "Please select a file to upload!";
        }
    }