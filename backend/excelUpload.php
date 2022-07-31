<?php
    session_start();
    require_once "../includes/connection.php";

    if(isset($_POST['excel'])){
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

        $decoded = json_decode($_POST['excel'], true);

        // echo $decoded[0]['id'];
        //var_dump the array so that we can view it's structure.
        // var_dump($decoded[0][0]);
        // var_dump($decoded);

        function bulkUpdateQuery($table, $array){
            /* Example:
            INSERT INTO mytable (id, a, b, c)
            VALUES (1, 'a1', 'b1', 'c1'),
            (2, 'a2', 'b2', 'c2'),
            (3, 'a3', 'b3', 'c3')
            ON DUPLICATE KEY UPDATE id=VALUES(id),
            a=VALUES(a),
            b=VALUES(b),
            c=VALUES(c);
            */
            global $ipaddress;
            $sql = "";
            $columns = $array[0];
            $columns_as_string = implode(', ', $columns);
            $sql .= "INSERT INTO $table
                    (" . $columns_as_string . ", createdBy, createdIP, createdDate)
                    VALUES ";
            $len = count($array);
            $isFirst = true;
            foreach ($array as $index => $values) {
                if ($isFirst) {
                    $isFirst = false;
                    continue;
                }
                $sql .= '("';
                $sql .= implode('", "', $array[$index]) . "\"";
                $dateTime = date('Y-m-d H:i:s');
                $sql .= ', "'.$_SESSION['adminID'].'", "'.$ipaddress.'", "'.$dateTime.'")';
                $sql .= ($index == $len - 1) ? "" : ", \n";
            }
            $sql .= "\nON DUPLICATE KEY UPDATE \n";
            $len = count($columns);
            foreach ($columns as $index => $column) {

                $sql .= "$column=VALUES($column)";
                $sql .= ($index == $len - 1) ? "" : ", \n";
            }
            $dateTime = date('Y-m-d H:i:s');
            $sql .= ',
                    modifiedBy="'.$_SESSION['adminID'].'".
                    modifiedIP="'.$ipaddress.'",
                    modifiedDate="'.$dateTime.'";';
            return $sql;
        }

        function bulkUpdateValues($array){
            $len = count($array);
            $isFirst = true;
            $sqlValues = "";
            foreach ($array as $index => $values) {
                if ($isFirst) {
                    $isFirst = false;
                    continue;
                }
                $password = password_hash($array[$index][12], PASSWORD_DEFAULT);
                $sqlValues .= '("'.$array[$index][0].'", "'.$array[$index][12].'", "'.$password.'", "'.$array[$index][25].'")';
                $sqlValues .= ($index == $len - 1) ? "" : ", \n";
            }
            $sqlValues .= "\nON DUPLICATE KEY UPDATE \n";
            $sqlValues .= "id=VALUES(id),\nusername=VALUES(username),\nstatus=VALUES(status);";
            return $sqlValues;
        }

        if($decoded[0][0]=="id" && $decoded[0][1]=="employeeCode"){
            if(isset($decoded[1])){
                // var_dump(array_column($decoded, 12));
                // echo(count(array_unique(array_column($decoded, 12))));
                $mobileNumbers = array_column($decoded, 12);
                if(count(array_unique($mobileNumbers))==count($mobileNumbers)){   
                    // echo bulkUpdateQuery("employeeMaster", $decoded);
                    // echo bulkUpdateValues($decoded);
                    $query = bulkUpdateQuery("employeeMaster", $decoded);
                    $sql = mysqli_query($conn, "$query");
                    if($sql){
                        $queryValues = bulkUpdateValues($decoded);
                        $sql1 = mysqli_query($conn, "INSERT INTO employeeLogin (id, username, password, status) VALUES $queryValues");
                        if($sql1){
                            echo "success";
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
                    echo "Excel contains duplicate mobile numbers";
                }
            }
            else{
                echo "Add atleast 1 row!";
            }
        }
        else if($decoded[0][0]=="id" && $decoded[0][1]=="retailerCode"){
            if(isset($decoded[1])){
                $mobileNumbers = array_column($decoded, 12);
                if(count(array_unique($mobileNumbers))==count($mobileNumbers)){
                    $query = bulkUpdateQuery("retailerMaster", $decoded);
                    $sql = mysqli_query($conn, "$query");
                    if($sql){
                        echo "success";
                    }
                    else{
                        echo "error";
                        // echo("Error description: " . mysqli_error($conn));
                    }
                }
                else{
                    echo "Excel contains duplicate mobile numbers";
                }
            }
            else{
                echo "Add atleast 1 row!";
            }
        }
        else if($decoded[0][0]=="id" && $decoded[0][1]=="productCode"){
            if(isset($decoded[1])){
                $query = bulkUpdateQuery("productMaster", $decoded);
                $sql = mysqli_query($conn, "$query");
                if($sql){
                    echo "success";
                }
                else{
                    echo "error";
                    // echo("Error description: " . mysqli_error($conn));
                }
            }
            else{
                echo "Add atleast 1 row!";
            }
        }
        else{
            echo "Wrong Excel File Template!";
        }
        
    }