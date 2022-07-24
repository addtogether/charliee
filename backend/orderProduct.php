<?php
    require_once "../includes/connection.php";

    if(isset($_POST['routes'])){
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

        $orderID = mysqli_real_escape_string($conn, $_POST['orderID']);
        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

        $sql = mysqli_query($conn, "SELECT WR FROM productMaster WHERE id = '{$product}'");
        $row = mysqli_fetch_assoc($sql);
        $amount = $quantity * $row1['WR'];

        $dateTime = date('Y-m-d H:i:s');
        $sql1 = mysqli_query($conn, "INSERT INTO orderDetails (orderID, productID, quantity, amount, status, modifiedIP, modifiedDate)
                                    VALUES ('{$orderID}', '{$product}', '{$quantity}', '{$amount}', 'Pending', '{$ipaddress}', '{$dateTime}')");
        if($sql1){
            echo "success";
        }
        else{
            echo "error";
            // echo("Error description: " . mysqli_error($conn));
        }
    }

    //subCategory dropdown
    if(isset($_POST['categoryDropdown'])){
        $categoryDropdown = mysqli_real_escape_string($conn, $_POST['categoryDropdown']);
        // echo $designationDropdown;
        $sql2 = mysqli_query($conn, "SELECT DISTINCT subCategory FROM productMaster WHERE category = '$categoryDropdown'");
        echo '<option selected disabled value="">Select Sub Category</option>';
        while($row2 = mysqli_fetch_assoc($sql2)){
            echo '<option>'.$row2["subCategory"].'</option>';            
        }
    }

    //product dropdown
    if(isset($_POST['subCategoryDropdown'])){
        $subCategoryDropdown = mysqli_real_escape_string($conn, $_POST['subCategoryDropdown']);
        // echo $designationDropdown;
        $sql3 = mysqli_query($conn, "SELECT id,productName FROM productMaster WHERE subCategory = '$subCategoryDropdown'");
        echo '<option selected disabled value="">Select Product</option>';
        while($row3 = mysqli_fetch_assoc($sql3)){
            echo '<option value="'.$row3["id"].'">'.$row3["productName"].'</option>';           
        }
    }