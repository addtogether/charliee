<?php
    session_start();
    require_once "../includes/connection.php";
    
    if(isset($_POST['orderDetailID'])){
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

        $dateTime = date('Y-m-d H:i:s');
        if($_POST['orderBoolean']=="true"){
            $orderDetailID = (int) mysqli_real_escape_string($conn, $_POST['orderDetailID']);
            $newQuantity = mysqli_real_escape_string($conn, $_POST['totalQuantity']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);

            $sql = mysqli_query($conn, "SELECT * FROM orderDetails WHERE id = '{$orderDetailID}'");
            $row = mysqli_fetch_assoc($sql);
            $sql1 = mysqli_query($conn, "SELECT WR FROM productMaster WHERE id = '{$row['productID']}'");
            $row1 = mysqli_fetch_assoc($sql1);
            $newAmount = $newQuantity * $row1['WR'];
            $sql2 = mysqli_query($conn, "UPDATE orderDetails SET quantity = '{$newQuantity}', amount = '{$newAmount}', 
                                    status = '{$status}', modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                    WHERE id = '{$orderDetailID}'");
            if($sql2){
                $sql3 = mysqli_query($conn, "SELECT employeeID, orderDate, totalAmount, totalQuantity FROM orderMaster 
                                        WHERE id = '{$row['orderID']}'");
                $row3 = mysqli_fetch_assoc($sql3);
                $totalAmount = ($row3['totalAmount'] - $row['amount']) + $newAmount;
                $totalQuantity = ($row3['totalQuantity'] - $row['quantity']) + $newQuantity;
                $sql4 = mysqli_query($conn, "UPDATE orderMaster SET totalAmount = '{$totalAmount}', totalQuantity = '{$totalQuantity}', 
                                        modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                        WHERE id = '{$row['orderID']}'");
                if($sql4){
                    if($status == "Delivered"){
                        $month = date_format(date_create($row3['orderDate']),"Y-m");
                        $sql5 = mysqli_query($conn, "SELECT achieved FROM employeeTarget WHERE employeeID = '{$row3['employeeID']}' 
                                                AND monthYear = '{$month}'");
                        $row5 = mysqli_fetch_assoc($row5);
                        $newAchieved = $row5['achieved'] + $newAmount;
                        $sql5 = mysqli_query($conn, "UPDATE employeeTarget SET achieved = $newAchieved, modifiedIP = '$ipaddress', 
                                                modifiedDate = '{$dateTime}' WHERE employeeID = '{$row3['employeeID']}' 
                                                AND monthYear = '{$month}'");
                        if($sql5){
                            echo "success";
                        }
                        else{
                            echo "error";
                            // echo("Error description: " . mysqli_error($conn));
                        }
                    }
                    else{
                        echo "success";
                    }
                }    
                else{
                    echo "error";
                    // echo("Error description: " . mysqli_error($conn));
                }
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }
        else{
            $orderDetailID = (int) mysqli_real_escape_string($conn, $_POST['orderDetailID']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);
    
            $sql1 = mysqli_query($conn, "UPDATE returnDetails SET status = '{$status}', modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' WHERE id = '{$orderDetailID}'");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }

    }
