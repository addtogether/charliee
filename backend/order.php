<?php
    require_once "../includes/connection.php";

    //route list
    if(isset($_POST['orderDate'])){
        $orderDate = mysqli_real_escape_string($conn, $_POST['orderDate']);
        // echo $designationDropdown;
        $sql = mysqli_query($conn, "SELECT * FROM orderMaster WHERE orderDate BETWEEN '{$orderDate}' AND '{$orderDate}".` 23:59:59`."'");
        if(mysqli_num_rows($sql) != 0){
            $no = 1;
            $totalAmount = 0;
            $totalQuantity = 0;
            while($row = mysqli_fetch_assoc($sql)){
                $totalAmount += $row['totalAmount'];
                $totalQuantity += $row['totalQuantity'];
                $sql1 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = '{$row['employeeID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $sql2 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id = '{$row['routeID']}'");
                $row2 = mysqli_fetch_assoc($sql2);
                echo '<tr>
                        <td>'.$no++.'</td>
                        <td><a href="orderDetails.php?e='.$row['employeeID'].'">'.$row1['employeeName'].'</a></td>
                        <td>'.$row2['routeName'].'</td>
                        <td>'.$row['totalAmount'].'</td>
                        <td>'.$row['totalQuantity'].'</td>
                        </tr>';
            }
            echo '<tr>
                    <td colspan="3">Total</td>
                    <td>'.$totalAmount.'</td>
                    <td>'.$totalQuantity.'</td>
                    </tr>';
        }
        else{
            echo '<td colspan="5">No Orders</td>';
        }
    }