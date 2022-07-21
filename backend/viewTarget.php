<?php
    session_start();
    require_once "../includes/connection.php";

    if(isset($_POST['month'])){
        $month = mysqli_real_escape_string($conn, $_POST['month']);
        $no = 1;
            
        $sql = mysqli_query($conn, "SELECT * FROM employeeTarget WHERE monthYear = '{$month}'");
        if(mysqli_num_rows($sql)!=0){
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = '{$row['employeeID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $percentage = round((($row['achieved']/$row['target'])*100), 2);
                echo '<tr>
                        <td>'.$no++.'</td>
                        <td>'.$row1['employeeName'].'</td>
                        <td>'.$row['target'].'</td>
                        <td>'.$row['achieved'].'</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: '.$percentage.'%" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100">'.$percentage.'%</div>
                            </div>
                        </td>
                    </tr>';
            }
        }
        else{
            echo '<td colspan="5">No Records</td>';
        }
    }
