<?php
    session_start();
    require_once "../includes/connection.php";

    //delete prouduct
    if(isset($_POST['deleteProductID'])){
        $deleteProductID = (int) mysqli_real_escape_string($conn, $_POST['deleteProductID']);
        $sql1 = mysqli_query($conn, "UPDATE productMaster SET status = 'Deleted' WHERE id = '$deleteProductID'");
    }

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
        

        $editProductID = (int) mysqli_real_escape_string($conn, $_POST['editProductID']);
        $editProductPhoto = mysqli_real_escape_string($conn, $_POST['editProductPhoto']);
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
                $time = time();
                $newFileName = $time."-productPhoto.".$fileExt;
                // $newFileName = str_replace(" ", "-", $newFileName);
                if($_FILES['productPhoto']['name'] != ""){
                    unlink("../files/product/".$editProductPhoto);
                    // echo "inside this";
                }
                if(move_uploaded_file($tmpName, "../files/product/".$newFileName)){
                    $dateTime = date('Y-m-d H:i:s');
                    $sql1 = mysqli_query($conn, "UPDATE productMaster SET productCode = '{$productCode}', 
                                                    productName = '{$productName}', GMS = '{$GMS}', photo = '{$newFileName}', 
                                                    catalogueURL = '{$catalogueURL}', category = '{$category}',
                                                    subCategory = '{$subCategory}', GST = '{$GST}', MRP = '{$MRP}', WR = '{$WR}', 
                                                    DR = '{$DR}', SSR = '{$SSR}', schemeRate = '{$schemeRate}', status = '{$status}', 
                                                    modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                                    WHERE id = '$editProductID'");
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
            $dateTime = date('Y-m-d H:i:s');
            $sql1 = mysqli_query($conn, "UPDATE productMaster SET productCode = '{$productCode}', 
                                        productName = '{$productName}', GMS = '{$GMS}', catalogueURL = '{$catalogueURL}', 
                                        category = '{$category}', subCategory = '{$subCategory}', GST = '{$GST}', MRP = '{$MRP}', 
                                        WR = '{$WR}', DR = '{$DR}', SSR = '{$SSR}', schemeRate = '{$schemeRate}', status = '{$status}', 
                                        modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                        WHERE id = '$editProductID'");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }
    }
