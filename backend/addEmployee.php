<?php
    session_start();
    require_once "../includes/connection.php";
    
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


        $sql = mysqli_query($conn,"SELECT * FROM employeeMaster WHERE mobileNumber = '{$mobileNumber}'");
        if(mysqli_num_rows($sql) == 0){
            if($_FILES['employeePhoto']['name'] != null){
                $fileName = $_FILES['employeePhoto']['name'];
                $tmpName = $_FILES['employeePhoto']['tmp_name'];
                $fileSplit = explode(".", $fileName);
                $fileExt = end($fileSplit);
                if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "png"){
                    $newFileName = $mobileNumber."-employeePhoto.".$fileExt;
                    // $newFileName = str_replace(" ", "-", $newFileName);
                    if(move_uploaded_file($tmpName, "../files/employeePhoto/".$newFileName)){
                        $dateTime = date('Y-m-d H:i:s');
                        $sql1 = mysqli_query($conn, "INSERT INTO employeeMaster (employeeCode, employeeName, employeePhoto, gender, dateOfBirth, 
                                                        address, location, pincode, city, state, country, mobileNumber, whatsappNumber, IMEI, 
                                                        designation, reportingManager, salary, dateOfJoining, additionalDetails, AF1, AF2, AF3, 
                                                        AF4, AF5, status, createdIP, createdDate) 
                                                        VALUES ('{$employeeCode}', '{$employeeName}', '{$newFileName}', '{$gender}', '{$dateOfBirth}', 
                                                        '{$address}', '{$location}', '{$pincode}', '{$city}', '{$state}', '{$country}', 
                                                        '{$mobileNumber}', '{$whatsappNumber}', '{$imei}', '{$designation}', {$reportingManager} , 
                                                        {$salary}, '{$dateOfJoining}', '{$addtionalDetails}', '{$AF1}', '{$AF2}', '{$AF3}', 
                                                        '{$AF4}', '{$AF5}', '{$status}', '$ipaddress', '{$dateTime}')");
                        
                        if($sql1 && $sql2){
                            $password = password_hash($mobileNumber, PASSWORD_DEFAULT);
                            $sql2 = mysqli_query($conn, "INSERT INTO employeeLogin (username, password, status) VALUES ('{$mobileNumber}', '{$password}',
                                                    '{$status}'");
                            if($sql){
                                echo "success";
                            }
                            else{
                                echo "error";
                                echo("Error description: " . mysqli_error($conn));
                            }
                        }    
                        else{
                            echo "error";
                            echo("Error description: " . mysqli_error($conn));
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
                echo "Please select a file to upload!";
            }
        }
        else{
            echo "Mobile Number already exist!";
        }
    }

    //add employee manager dropdown
    if(isset($_POST['designationDropdown'])){
        $designationDropdown = mysqli_real_escape_string($conn, $_POST['designationDropdown']);
        // echo $designationDropdown;
        $sql1 = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE designation = '$designationDropdown'");
        echo '<option selected disabled value="">Select Manager</option>
                <option value="0">None</option>';
        while($row1 = mysqli_fetch_assoc($sql1)){
            echo '<option value="'.$row1["id"].'">'.$row1["employeeName"].'</option>';            
        }
    }
