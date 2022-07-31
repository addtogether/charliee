<?php
    session_start();
    require_once "../includes/connection.php";
    
    //delete retailer
    if(isset($_POST['deleteRetailerID'])){
        $deleteRetailerID = (int) mysqli_real_escape_string($conn, $_POST['deleteRetailerID']);
        $sql1 = mysqli_query($conn, "UPDATE retailerMaster SET status = 'Deleted' WHERE id = '$deleteRetailerID'");
    }

    //edit retailer form
    if(isset($_POST['retailerCode'])){
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

        $editRetailerID = (int) mysqli_real_escape_string($conn, $_POST['editRetailerID']);
        $retailerCode = mysqli_real_escape_string($conn, $_POST['retailerCode']);
        $retailerName = mysqli_real_escape_string($conn, $_POST['retailerName']);
        $contactPersonName = mysqli_real_escape_string($conn, $_POST['contactPersonName']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $mobileNumber = mysqli_real_escape_string($conn, $_POST['mobileNumber']);
        $whatsappNumber = mysqli_real_escape_string($conn, $_POST['whatsappNumber']);
        $gstNumber = mysqli_real_escape_string($conn, $_POST['gstNumber']);
        $workingDays = mysqli_real_escape_string($conn, $_POST['workingDays']);
        $geoLocation = mysqli_real_escape_string($conn, $_POST['geoLocation']);
        $geoAddress = mysqli_real_escape_string($conn, $_POST['geoAddress']);
        $typeOfOutlet = mysqli_real_escape_string($conn, $_POST['typeOfOutlet']);
        $classification = mysqli_real_escape_string($conn, $_POST['classification']);
        $fssaiNo = mysqli_real_escape_string($conn, $_POST['fssaiNo']);
        $validityDate = mysqli_real_escape_string($conn, $_POST['validityDate']);
        $retailerType = mysqli_real_escape_string($conn, $_POST['retailerType']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $additionalDetails = mysqli_real_escape_string($conn, $_POST['additionalDetails']);
        $AF1 = mysqli_real_escape_string($conn, $_POST['AF1']);
        $AF2 = mysqli_real_escape_string($conn, $_POST['AF2']);
        $AF3 = mysqli_real_escape_string($conn, $_POST['AF3']);
        $AF4 = mysqli_real_escape_string($conn, $_POST['AF4']);
        $AF5 = mysqli_real_escape_string($conn, $_POST['AF5']);


        $sql = mysqli_query($conn,"SELECT * FROM retailerMaster WHERE mobileNumber = '{$mobileNumber}' AND NOT id = '$editRetailerID'");
        if(mysqli_num_rows($sql) == 0){
            $dateTime = date('Y-m-d H:i:s');
            $sql1 = mysqli_query($conn, "UPDATE retailerMaster SET retailerCode = '{$retailerCode}', 
                                            retailerName = '{$retailerName}', contactPersonName = '{$contactPersonName}', 
                                            address = '{$address}',location = '{$location}', pincode = '{$pincode}', 
                                            city = '{$city}', state = '{$state}', country = '{$country}', 
                                            geoLocation = '{$geoLocation}', geoAddress = '{$geoAddress}', 
                                            mobileNumber = '{$mobileNumber}', whatsappNumber = '{$whatsappNumber}', 
                                            typeOfOutlet = '{$typeOfOutlet}', classification = '{$classification}', 
                                            retailerType = '{$retailerType}', gstNumber = '{$gstNumber}', fssaiNo = '{$fssaiNo}', 
                                            validityDate = '{$validityDate}', workingDays = '{$workingDays}', 
                                            additionalDetails = '{$additionalDetails}', AF1 = '{$AF1}', AF2 = '{$AF2}', 
                                            AF3 = '{$AF3}', AF4 = '{$AF4}', AF5 = '{$AF5}', status = '{$status}', 
                                            modifiedBy = '{$_SESSION['adminID']}', modifiedIP = '$ipaddress', modifiedDate = '{$dateTime}' 
                                            WHERE id = '$editRetailerID'");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
                // echo("Error description: " . mysqli_error($conn));
            }
        }
        else{
            echo "Mobile Number already exist!";
        }
    }
