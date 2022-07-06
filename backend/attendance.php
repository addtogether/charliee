<?php
    require_once "../includes/connection.php";

    //attendance list
    if(isset($_POST['employee'])){
        $employee = mysqli_real_escape_string($conn, $_POST['employee']);
        $date = mysqli_real_escape_string($conn, $_POST['month']);
        $date = explode("-", $date);
        $sql = mysqli_query($conn, "SELECT username FROM employeeLogin WHERE id = '{$employee}'");
        $row = mysqli_fetch_assoc($sql);
        $sql1 = mysqli_query($conn, "SELECT * FROM employeeDailyStartRoute WHERE username = '{$row['username']}' AND 
                                    MONTH(startRouteDateTime) = '{$date[1]}' AND YEAR(startRouteDateTime) = '{$date[0]}'");
        if(mysqli_num_rows($sql1) != 0){
            $no = 1;
            while($row1 = mysqli_fetch_assoc($sql1)){
                echo '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$row1['startRouteDateTime'].'</td>
                            <td><a href="https://www.google.com/maps/search/'.$row1['startRouteGeoLocation'].'" target="_blank">'.$row1['startRouteGeoLocation'].'</a></td>
                            <td>
                                <div class="support-ticket">
                                    <a href="./files/route/'.$row1['startRoutePhoto'].'" target="_blank">
                                    <img src="./files/route/'.$row1['startRoutePhoto'].'" class="user-img " alt="">
                                    </a>
                                </div>
                            </td>';
                            if($row1["endRouteDateTime"]!=""){
                                echo '<td>'.$row1['endRouteDateTime'].'</td>
                                        <td><a href="https://www.google.com/maps/search/'.$row1['endRouteGeoLocation'].'" target="_blank">'.$row1['endRouteGeoLocation'].'</a></td>
                                        <td>
                                            <div class="support-ticket">
                                                <a href="./files/route/'.$row1['endRoutePhoto'].'" target="_blank">
                                                <img src="./files/route/'.$row1['endRoutePhoto'].'" class="user-img " alt="">
                                                </a>
                                            </div>
                                        </td>';
                            }
                            else{
                                echo '<td>-</td>
                                        <td>-</td>
                                        <td>-</td>';
                            }
                            echo '<td><a href="employeeRoute.php">View</a></td>
                                    </tr>';
            }
        }
        else{
            echo '<td colspan="8">No Attendance Record</td>';
        }
    }