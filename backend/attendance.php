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
                $startTime = explode(" ", $row1['startRouteDateTime']);
                $startLocation = explode(",", $row1['startRouteGeoLocation']);
                echo '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$startTime[1].'</td>
                            <td>Latitude : '.$startLocation[0].'<br>
                                Longitude : '.$startLocation[1].'
                            </td>
                            <td>
                                <div class="support-ticket">
                                    <img src="./files/route/'.$row1['startRoutePhoto'].'" class="user-img " alt="">
                                </div>
                            </td>';
                            if($row1["endRouteDateTime"]!=""){
                                $endTime = explode(" ", $row1['endRouteDateTime']);
                                $endLocation = explode(",", $row1['endRouteGeoLocation']);
                                echo '<td>'.$endTime[1].'</td>
                                        <td>Latitude : '.$endLocation[0].'<br>
                                        Longitude : '.$endLocation[1].'
                                        </td>
                                        <td>
                                            <div class="support-ticket">
                                                <img src="./files/route/'.$row1['endRoutePhoto'].'" class="user-img " alt="">
                                            </div>
                                        </td>';
                            }
                            else{
                                echo '<td>-</td>
                                        <td>Latitude : -<br>
                                            Longitude : -
                                        </td>
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