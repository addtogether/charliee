<?php
    require_once "../includes/connection.php";

    //route list
    if(isset($_POST['employee'])){
        $employee = mysqli_real_escape_string($conn, $_POST['employee']);
        $day = mysqli_real_escape_string($conn, $_POST['day']);
        // echo $designationDropdown;
        $sql = mysqli_query($conn, "SELECT id,routeName FROM routeMaster WHERE assignToEmployee = '{$employee}' AND weekDay = '{$day}'");
        if(mysqli_num_rows($sql) != 0){
            echo '<tr><td colspan="3"><h4>'.$row['routeName'].'</h4></td></tr>';
            $row = mysqli_fetch_assoc($sql);
            $sql1 = mysqli_query($conn, "SELECT retailerID, priority, status FROM routeRetailerMapping WHERE routeID = '{$row['id']}' ORDER BY priority");
            while($row1 = mysqli_fetch_assoc($sql1)){
                $sql2 = mysqli_query($conn, "SELECT retailerName FROM retailerMaster WHERE id = '{$row1['retailerID']}'");
                $row2 = mysqli_fetch_assoc($sql2);
                echo '<tr>
                        <td>'.$row1['priority'].'</td>
                        <td>'.$row2['retailerName'].'</td>';
                if($row1['status']=="ON"){
                    echo '<td><span class="status-p bg-correct">ON</span></td>';
                }
                else{
                    echo '<td><span class="status-p bg-inc">OFF</span></td>';
                }
                echo '</tr>';
            }
        }
        else{
            echo '<td colspan="3">No Routes</td>';
        }
    }