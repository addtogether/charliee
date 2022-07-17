<?php
    require_once "../includes/connection.php";

    //order list
    if(isset($_POST['orderDate'])){
        $orderDate = mysqli_real_escape_string($conn, $_POST['orderDate']);
        // echo $designationDropdown;
        $sql = mysqli_query($conn, "SELECT DISTINCT employeeID FROM orderMaster WHERE DATE(orderDate) = '{$orderDate}'");
        if(mysqli_num_rows($sql) != 0){
            $no = 1;
            $totalAmount = 0;
            $totalQuantity = 0;
            $finalAmount = 0;
            $finalQuantity = 0;
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = '{$row['employeeID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id IN (SELECT routeID FROM orderMaster 
                                                WHERE employeeID = '{$row['employeeID']}' AND DATE(orderDate) = '{$orderDate}')");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = mysqli_query($conn, "SELECT id FROM orderMaster WHERE employeeID = '{$row['employeeID']}' AND 
                                                DATE(orderDate) = '{$orderDate}'");
                $row3 = mysqli_fetch_assoc($sql3);
                echo '<tr>
                        <td>'.$no++.'</td>
                        <td><a href="orderDetails.php?o='.$row3['id'].'">'.$row1['employeeName'].'</a></td>
                        <td>'.$row2['routeName'].'</td>';
                $sql3 = mysqli_query($conn, "SELECT totalAmount, totalQuantity FROM orderMaster WHERE employeeID = '{$row['employeeID']}' AND 
                                            DATE(orderDate) = '{$orderDate}'");
                while($row3 = mysqli_fetch_assoc($sql3)){
                    $totalAmount += $row3['totalAmount'];
                    $totalQuantity += $row3['totalQuantity'];
                }
                $finalAmount += $totalAmount;
                $finalQuantity += $totalQuantity;
                echo '<td>'.$totalAmount.'</td>
                        <td>'.$totalQuantity.'</td>
                        </tr>';
                $totalAmount = 0;
                $totalQuantity = 0;
            }
            echo '<tr>
                    <td colspan="3">Total</td>
                    <td>'.$finalAmount.'</td>
                    <td>'.$finalQuantity.'</td>
                    </tr>';
        }
        else{
            echo '<td colspan="5">No Orders</td>';
        }
    }

    //noOrder list
    if(isset($_POST['noOrderDate'])){
        $noOrderDate = mysqli_real_escape_string($conn, $_POST['noOrderDate']);
        // echo $designationDropdown;
        $sql = mysqli_query($conn, "SELECT DISTINCT employeeID FROM orderMaster WHERE DATE(orderDate) = '{$noOrderDate}'");
        if(mysqli_num_rows($sql) != 0){
            $no = 1;
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = '{$row['employeeID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id IN (SELECT routeID FROM orderMaster 
                                                WHERE employeeID = '{$row['employeeID']}' AND DATE(orderDate) = '{$noOrderDate}')");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = mysqli_query($conn, "SELECT id FROM orderMaster WHERE employeeID = '{$row['employeeID']}' AND 
                                                DATE(orderDate) = '{$noOrderDate}'");
                $row3 = mysqli_fetch_assoc($sql3);
                echo '<tr>
                        <td>'.$no++.'</td>
                        <td><a href="orderDetails.php?o='.$row3['id'].'">'.$row1['employeeName'].'</a></td>
                        <td>'.$row2['routeName'].'</td>';
                $sql3 = mysqli_query($conn, "SELECT totalAmount, totalQuantity FROM orderMaster WHERE employeeID = '{$row['employeeID']}' AND 
                                            DATE(orderDate) = '{$noOrderDate}'");
                while($row3 = mysqli_fetch_assoc($sql3)){
                    $totalAmount += $row3['totalAmount'];
                    $totalQuantity += $row3['totalQuantity'];
                }
                $finalAmount += $totalAmount;
                $finalQuantity += $totalQuantity;
                echo '<td>'.$totalAmount.'</td>
                        </tr>';
            }
        }
        else{
            echo '<td colspan="5">No Orders</td>';
        }
    }

    //return list
    if(isset($_POST['returnDate'])){
        $returnDate = mysqli_real_escape_string($conn, $_POST['returnDate']);
        // echo $designationDropdown;
        $sql = mysqli_query($conn, "SELECT DISTINCT employeeID FROM returnMaster WHERE DATE(returnDate) = '{$returnDate}'");
        if(mysqli_num_rows($sql) != 0){
            $no = 1;
            $totalAmount = 0;
            $totalQuantity = 0;
            $finalAmount = 0;
            $finalQuantity = 0;
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = '{$row['employeeID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id IN (SELECT routeID FROM returnMaster 
                                                WHERE employeeID = '{$row['employeeID']}' AND DATE(returnDate) = '{$returnDate}')");
                $row2 = mysqli_fetch_assoc($sql2);
                $sql3 = mysqli_query($conn, "SELECT id FROM returnMaster WHERE employeeID = '{$row['employeeID']}' AND 
                                                DATE(returnDate) = '{$returnDate}'");
                $row3 = mysqli_fetch_assoc($sql3);
                echo '<tr>
                        <td>'.$no++.'</td>
                        <td><a href="returnDetails.php?o='.$row3['id'].'">'.$row1['employeeName'].'</a></td>
                        <td>'.$row2['routeName'].'</td>';
                $sql3 = mysqli_query($conn, "SELECT totalAmount, totalQuantity FROM returnMaster WHERE employeeID = '{$row['employeeID']}' AND 
                                            DATE(returnDate) = '{$returnDate}'");
                while($row3 = mysqli_fetch_assoc($sql3)){
                    $totalAmount += $row3['totalAmount'];
                    $totalQuantity += $row3['totalQuantity'];
                }
                $finalAmount += $totalAmount;
                $finalQuantity += $totalQuantity;
                echo '<td>'.$totalAmount.'</td>
                        <td>'.$totalQuantity.'</td>
                        </tr>';
                $totalAmount = 0;
                $totalQuantity = 0;
            }
            echo '<tr>
                    <td colspan="3">Total</td>
                    <td>'.$finalAmount.'</td>
                    <td>'.$finalQuantity.'</td>
                    </tr>';
        }
        else{
            echo '<td colspan="5">No Returns</td>';
        }
    }