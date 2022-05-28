<?php
    require_once("./includes/connection.php");
    
    function cleanData(&$str){
      if($str == 't') $str = 'TRUE';
      if($str == 'f') $str = 'FALSE';
      if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
        $str = "'$str";
      }
      if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
  
    // // filename for download
    // $filename = "website_data_" . date('Ymd') . ".csv";
  
    // header("Content-Disposition: attachment; filename=\"$filename\"");
    // header("Content-Type: text/csv; charset=UTF-16LE");
  
    // $out = fopen("php://output", 'w');
  
    // $flag = false;
    // $result = mysqli_query($conn, "SELECT * FROM employeeMaster");
    // while(false !== ($row = mysqli_fetch_assoc($result))) {
    //   if(!$flag) {
    //     // display field/column names as first row
    //     fputcsv($out, array_keys($row), ',', '"');
    //     $flag = true;
    //   }
    //   array_walk($row, __NAMESPACE__ . '\cleanData');
    //   fputcsv($out, array_values($row), ',', '"');
    // }
  
    // fclose($out);
    // exit;

      // filename for download
        $filename = "website_data_" . date('Ymd') . ".csv";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: text/csv");

        $out = fopen("php://output", 'w');

        $flag = false;
        $result = mysqli_query($conn, "SELECT * FROM retailerMaster");
        while(false != ($row = mysqli_fetch_assoc($result))) {
            if(!$flag) {
            // display field/column names as first row
            fputcsv($out, array_keys($row), ',', '"');
            $flag = true;
            }
            array_walk($row, __NAMESPACE__ . '\cleanData');
            fputcsv($out, array_values($row), ',', '"');
        }

        fclose($out);
        exit;


    // $DB_TBLName = "employeeMaster"; 
    // $filename = "excelfilename";  //your_file_name
    // $file_ending = "csv";   //file_extention

    // header("Content-Type: application/vnd.ms-excel");    
    // header("Content-Disposition: attachment; filename=\"$filename.$file_ending\"");  
    // header("Pragma: no-cache"); 
    // header("Expires: 0");

    // $sep = "\t";

    // $sql="SELECT * FROM $DB_TBLName"; 
    // $resultt = $conn->query($sql);
    // while ($property = mysqli_fetch_field($resultt)) { //fetch table field name
    //     echo $property->name."\t";
    // }

    // print("\n");    

    // while($row = mysqli_fetch_row($resultt))  //fetch_table_data
    // {
    //     $schema_insert = "";
    //     for($j=0; $j< mysqli_num_fields($resultt);$j++)
    //     {
    //         if(!isset($row[$j]))
    //             $schema_insert .= "NULL".$sep;
    //         elseif ($row[$j] != "")
    //             $schema_insert .= "$row[$j]".$sep;
    //         else
    //             $schema_insert .= "".$sep;
    //     }
    //     $schema_insert = str_replace($sep."$", "", $schema_insert);
    //     $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    //     $schema_insert .= "\t";
    //     print(trim($schema_insert));
    //     print "\n";
    // }