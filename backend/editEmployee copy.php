<?php
    session_start();
    require_once "../includes/connection.php";

    //delete employee
    if(isset($_POST['deleteEmployeeID'])){
        $deleteEmployeeID = (int) mysqli_real_escape_string($conn, $_POST['deleteEmployeeID']);
        $sql1 = mysqli_query($conn, "UPDATE employeeMaster SET status = 'Deleted' WHERE id = '$deleteEmployeeID'");
    }
    
    //add employee form
    if(isset($_POST['employeeCode'])){
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

        // $date = date("Y-m-d");
        

        $editEmployeeID = (int) mysqli_real_escape_string($conn, $_POST['editEmployeeID']);
        $editEmployeePhoto = mysqli_real_escape_string($conn, $_POST['editEmployeePhoto']);
        $employeeCode = mysqli_real_escape_string($conn, $_POST['employeeCode']);
        $employeeName = mysqli_real_escape_string($conn, $_POST['employeeName']);
        $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $mobileNumber = mysqli_real_escape_string($conn, $_POST['mobileNumber']);
        $imei = mysqli_real_escape_string($conn, $_POST['imei']);
        $whatsappNumber = mysqli_real_escape_string($conn, $_POST['whatsappNumber']);
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);
        $salary = (int) mysqli_real_escape_string($conn, $_POST['salary']);
        $dateOfJoining = mysqli_real_escape_string($conn, $_POST['dateOfJoining']);
        $addtionalDetails = mysqli_real_escape_string($conn, $_POST['addtionalDetails']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $reportingManager = (int) mysqli_real_escape_string($conn, $_POST['reportingManager']);
        $AF1 = mysqli_real_escape_string($conn, $_POST['AF1']);
        $AF2 = mysqli_real_escape_string($conn, $_POST['AF2']);
        $AF3 = mysqli_real_escape_string($conn, $_POST['AF3']);
        $AF4 = mysqli_real_escape_string($conn, $_POST['AF4']);
        $AF5 = mysqli_real_escape_string($conn, $_POST['AF5']);


        $sql = mysqli_query($conn,"SELECT * FROM employeeMaster WHERE mobileNumber = '{$mobileNumber}' AND NOT id = '$editEmployeeID'");
        if(mysqli_num_rows($sql) == 0){
            if($_FILES['employeePhoto']['name'] != null){
                $fileName = $_FILES['employeePhoto']['name'];
                $tmpName = $_FILES['employeePhoto']['tmp_name'];
                $fileSplit = explode(".", $fileName);
                $fileExt = end($fileSplit);
                if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "png"){
                    $newFileName = $mobileNumber."-employeePhoto.".$fileExt;
                    // $newFileName = str_replace(" ", "-", $newFileName);
                    if($_FILES['employeePhoto']['name'] != ""){
                        unlink("../photo/".$editEmployeePhoto);
                        // echo "inside this";
                    }
                    if(move_uploaded_file($tmpName, "../photo/".$newFileName)){
                        $dateTime = date('Y-m-d H:i:s');
                        $sql1 = mysqli_query($conn, "UPDATE employeeMaster SET employeeCode = '{$employeeCode}', 
                                                        employeeName = '{$employeeName}', employeePhoto = '{$newFileName}', 
                                                        gender = '{$gender}', dateOfBirth = '{$dateOfBirth}', address = '{$address}',
                                                        location = '{$location}', pincode = '{$pincode}', city = '{$city}', 
                                                        state = '{$state}', country = '{$country}', mobileNumber = '{$mobileNumber}', 
                                                        whatsappNumber = '{$whatsappNumber}', IMEI = '{$imei}', 
                                                        designation = '{$designation}', reportingManager = {$reportingManager}, 
                                                        salary = {$salary}, dateOfJoining = '{$dateOfJoining}', 
                                                        additionalDetails = '{$addtionalDetails}', AF1 = '{$AF1}', AF2 = '{$AF2}', 
                                                        AF3 = '{$AF3}', AF4 = '{$AF4}', AF5 = '{$AF5}', status = '{$status}', 
                                                        modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                                        WHERE id = '$editEmployeeID'");
                        
                        $sql2 = mysqli_query($conn, "UPDATE employeeLogin SET status = '{$status}' WHERE id = '$editEmployeeID'");
                        if($sql1 && $sql2){
                            echo "success";
                        }    
                        else{
                            echo "error";
                            // echo("Error description: " . mysqli_error($conn));
                        }
                    }
                    else{
                        echo "Unable to upload file!";
                    }
                }
                else{
                    echo "Please select image files only!!";
                }
            }
            else{
                $dateTime = date('Y-m-d H:i:s');
                $sql1 = mysqli_query($conn, "UPDATE employeeMaster SET employeeCode = '{$employeeCode}', 
                                                employeeName = '{$employeeName}', gender = '{$gender}', 
                                                dateOfBirth = '{$dateOfBirth}', address = '{$address}',location = '{$location}', 
                                                pincode = '{$pincode}', city = '{$city}', state = '{$state}', country = '{$country}', 
                                                mobileNumber = '{$mobileNumber}', whatsappNumber = '{$whatsappNumber}', 
                                                IMEI = '{$imei}', designation = '{$designation}', reportingManager = {$reportingManager}, 
                                                salary = {$salary}, dateOfJoining = '{$dateOfJoining}', 
                                                additionalDetails = '{$addtionalDetails}', AF1 = '{$AF1}', AF2 = '{$AF2}', 
                                                AF3 = '{$AF3}', AF4 = '{$AF4}', AF5 = '{$AF5}', status = '{$status}', 
                                                modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                                WHERE id = '$editEmployeeID'");

                $sql2 = mysqli_query($conn, "UPDATE employeeLogin SET status = '{$status}', username = '{$mobileNumber}' 
                                        WHERE id = '$editEmployeeID'");
                if($sql1 && $sql2){
                    echo "success";
                }    
                else{
                    echo "error";
                    // echo("Error description: " . mysqli_error($conn));
                }
            }
        }
        else{
            echo "Mobile Number already exist!";
        }
    }

    //initial edit employee manager dropdown
    if(isset($_POST['designationDropdownSelected'])){
        $designationDropdownSelected = (int) mysqli_real_escape_string($conn, $_POST['designationDropdownSelected']);
        $sql1 = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE id = '$designationDropdownSelected'");
        $row1 = mysqli_fetch_assoc($sql1);

        $sql2 = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE designation = '$row1[designation]'");
        echo '<option disabled value="">Select Manager</option>
                <option value="0">None</option>';
        $s = "";
        while($row2 = mysqli_fetch_assoc($sql2)){
            if($designationDropdownSelected==$row2["id"]){
                $s = "selected";
            } 
            echo '<option value="'.$row2["id"].'" '.$s.'>'.$row2["employeeName"].'</option>';            
        }
    }
    
    //edit employee manager dropdown
    if(isset($_POST['designationDropdown'])){
        $designationDropdown = mysqli_real_escape_string($conn, $_POST['designationDropdown']);
        // echo $designationDropdown;
        $sql3 = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE designation = '$designationDropdown'");
        echo '<option disabled value="">Select Manager</option>
                <option value="0">None</option>';
        while($row3 = mysqli_fetch_assoc($sql3)){
            echo '<option value="'.$row3["id"].'">'.$row3["employeeName"].'</option>';            
        }
    }
