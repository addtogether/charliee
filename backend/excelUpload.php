<?php
    require_once "../includes/connection.php";

    if(isset($_POST['excel'])){
        $excel = $_POST['excel'];
        $decoded = json_decode($excel, true);

        // echo $decoded[0]['id'];
        //var_dump the array so that we can view it's structure.
        // var_dump($decoded[0]['id']);
        // var_dump($decoded);

        function bulkUpdateQuery($table, $array)
        {
            /*
            * Example:
            INSERT INTO mytable (id, a, b, c)
            VALUES (1, 'a1', 'b1', 'c1'),
            (2, 'a2', 'b2', 'c2'),
            (3, 'a3', 'b3', 'c3'),
            (4, 'a4', 'b4', 'c4'),
            (5, 'a5', 'b5', 'c5'),
            (6, 'a6', 'b6', 'c6')
            ON DUPLICATE KEY UPDATE id=VALUES(id),
            a=VALUES(a),
            b=VALUES(b),
            c=VALUES(c);
            */
            $sql = "";

            $columns = $array[0];
            $columns_as_string = implode(', ', $columns);

            $sql .= "INSERT INTO $table
                    (" . $columns_as_string . ")
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
                $sql .= ')';
                $sql .= ($index == $len - 1) ? "" : ", \n";
            }

            $sql .= "\nON DUPLICATE KEY UPDATE \n";

            $len = count($columns);
            foreach ($columns as $index => $column) {

                $sql .= "$column=VALUES($column)";
                $sql .= ($index == $len - 1) ? "" : ", \n";
            }

            $sql .= ";";

            return $sql;
        }

        echo bulkUpdateQuery("employeeMaster", $decoded);
        $query = bulkUpdateQuery("employeeMaster", $decoded);
        $sql = mysqli_query($conn, "$query");
        if($sql){
            echo "success";
            echo mysqli_insert_id($conn);
        }
        else{
            echo "error";
            echo("Error description: " . mysqli_error($conn));
        }

    }