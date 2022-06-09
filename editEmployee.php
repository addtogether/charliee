<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Employee</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<?php
  require_once("./includes/connection.php");
  include_once("navbar.php");
  $sql = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE id = {$_GET['u']}");
  $row = mysqli_fetch_assoc($sql);
?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Employee</h4>
                  </div>
                  <div class="card-body">
                    <form action="" class="needs-validation">
                      <div class="form-group ">
                        <label for="employeePhoto">Employee Photo</label>
                        <!-- <label class="col-12 col-md-3 col-lg-3">Employee Photo</label> -->
                        <div class="col-sm-12 col-md-7">
                          <div id="image-preview" class="image-preview" hidden>
                            <label for="employeeImage" id="image-label">Choose File</label>
                            <!-- <input type="file" name="image" id="employeImage" accept="image/*" onchange="return fileValidation()" required/> -->
                            <input type="file" name="employeePhoto" id="employeePhoto" accept="image/*"/>
                          </div>
                            <?php
                              if ($row['employeePhoto']==""){
                                echo '<img id="employeePhotoPreview" src="./photo/personCircle.svg" width="250" height="250">';
                              }
                              else{
                                echo '<img id="employeePhotoPreview" src="./photo/'.$row['employeePhoto'].'" width="250" height="250">';
                              }
                            ?>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="employeeCode">Employee Code</label>
                          <input type="text" class="form-control" name="editEmployeeID" id="editEmployeeID" value="<?php echo $row['id'];?>" hidden>
                          <input type="text" class="form-control" name="editEmployeeManager" id="editEmployeeManager" value="<?php echo $row['reportingManager'];?>" hidden>
                          <input type="text" class="form-control" name="editEmployeePhoto" id="editEmployeePhoto" value="<?php echo $row['employeePhoto'];?>" hidden>
                          <input type="text" class="form-control" name="employeeCode" id="employeeCode" placeholder="Employee Code" value="<?php echo $row['employeeCode'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Code.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="employeeName">Employee Name</label>
                          <input type="text" class="form-control" name="employeeName" id="employeeName" placeholder="Employee Name" pattern="[a-zA-Z'-'\s]*" value="<?php echo $row['employeeName'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Name.
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="dateOfBirth" class="col-form-label">Date of Birth</label>
                            <input class="form-control" type="date" name="dateOfBirth"  id="dateOfBirth" max="<?php echo date("Y-m-d"); ?>" value=<?php echo $row['dateOfBirth'];?> required>
                            <div class="invalid-feedback">
                              Please select a Valid Date of Birth.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 gender">
                          <label >Gender</label>
                          <select class="form-control" name="gender" id="gender" required>
                            <option disabled value="">Select Gender</option>
                            <option <?php if($row['gender']=="Male") echo "selected";?>>Male</option>
                            <option <?php if($row['gender']=="Female") echo "selected";?>>Female</option>
                          </select>
                          <div class="invalid-feedback">
                            Please select a Valid Gender.
                          </div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label for="address" class="col-form-label">Address</label>
                        <input class="form-control" type="text" name="address" id="address" value="<?php echo $row['address'];?>" required>
                        <div class="invalid-feedback">
                            Please enter a Valid Address.
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="<?php echo $row['location'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid location.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="pincode">Pincode</label>
                          <input class="form-control" type="text" name="pincode" maxlength="6" pattern="\d{6}" id="pincode" placeholder="pincode" value="<?php echo $row['pincode'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Pincode.
                          </div>                        
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="city">City</label>
                          <input type="text" class="form-control" name="city" id="city" pattern="[a-zA-Z'-'\s]*" placeholder="City" value="<?php echo $row['city'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid City.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="state">State</label>
                          <input type="text" class="form-control" name="state" id="state" pattern="[a-zA-Z'-'\s]*" placeholder="State" value="<?php echo $row['state'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid State.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="country">Country</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="country" id="country" pattern="[a-zA-Z'-'\s]*" placeholder="Country"
                              aria-describedby="inputGroupPrepend" value="<?php echo $row['country'];?>" required>
                              <div class="invalid-feedback">
                                Please enter a Valid Country.
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="mobileNumber" class="col-form-label">Mobile Number</label>
                            <input class="form-control" type="text" name="mobileNumber" maxlength="10" pattern="\d{10}" id="mobileNumber" value=<?php echo $row['mobileNumber'];?> required>
                            <div class="invalid-feedback">
                              Please enter a Valid Number.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="imei" class="col-form-label">IMEI</label>
                            <input class="form-control" type="text" name="imei" maxlength="15" pattern="\d{15}" id="imei" value=<?php echo $row['IMEI'];?> required>
                            <div class="invalid-feedback">
                             Please enter a Valid IMEI.
                           </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="whatsappNumber" class="col-form-label">Whatsapp Number</label>
                            <input class="form-control" type="text" name="whatsappNumber" maxlength="10" pattern="\d{10}" id="whatsappNumber" value=<?php echo $row['whatsappNumber'];?> required>
                            <div class="invalid-feedback">
                              Please enter a Valid whatsapp Number.
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Designation</label>
                        <select class="form-control" name="designation" id="designation" required>
                          <option disabled value="">Select Designation</option>
                          <option <?php if($row['designation']=="SR") echo "selected";?>>SR</option>
                          <option <?php if($row['designation']=="SO") echo "selected";?>>SO</option>
                          <option <?php if($row['designation']=="SM") echo "selected";?>>SM</option>
                          <option <?php if($row['designation']=="RM") echo "selected";?>>RM</option>
                          <option <?php if($row['designation']=="ZM") echo "selected";?>>ZM</option>
                          <option <?php if($row['designation']=="Manager Sale") echo "selected";?>>Manager Sale</option>
                        </select>
                          <div class="invalid-feedback">
                              Please select a Valid Designation.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="salary" class="col-form-label">Salary</label>
                          <input class="form-control" type="number" name="salary" id="salary" value=<?php echo $row['salary'];?> required>
                          <div class="invalid-feedback">
                            Please enter a Valid Salary.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="dateOfJoining" class="col-form-label">Date of Joining</label>
                          <input class="form-control" type="date" name="dateOfJoining" id="dateOfJoining" value=<?php echo $row['dateOfJoining'];?> required>
                          <div class="invalid-feedback">
                            Please select a Valid Date of Joining.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="addtionalDetails" class="col-form-label">Additional Details</label>
                        <input class="form-control" type="text" name="addtionalDetails" id="addtionalDetails" value="<?php echo $row['additionalDetails'];?>">
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label class="col-form-label">Status</label>
                        <select class="form-control" name="status" id="status" required>
                          <option selected disabled value="">Select Status</option>
                          <option <?php if($row['status']=="ON") echo "selected";?>>ON</option>
                          <option <?php if($row['status']=="OFF") echo "selected";?>>OFF</option>
                          <option <?php if($row['status']=="Blocked") echo "selected";?>>Blocked</option>
                          <option <?php if($row['status']=="Deleted") echo "selected";?>>Deleted</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Status.
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label class="col-form-label">Reporting Manager</label>
                        <select class="form-control" name="reportingManager" id="reportingManager" required>
                          <option selected disabled value="">Select Designation First</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Manager.
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="AF1" class="col-form-label">AF1</label>
                        <input class="form-control" type="text" name="AF1" id="AF1" value="<?php echo $row['AF1'];?>">
                      </div>
                      <div class="form-group">
                        <label for="AF2" class="col-form-label">AF2</label>
                        <input class="form-control" type="text" name="AF2" id="AF2" value="<?php echo $row['AF2'];?>">
                      </div>
                      <div class="form-group">
                        <label for="AF3" class="col-form-label">AF3</label>
                        <input class="form-control" type="text" name="AF3" id="AF3" value="<?php echo $row['AF3'];?>">
                      </div>
                      <div class="form-group">
                        <label for="AF4" class="col-form-label">AF4</label>
                        <input class="form-control" type="text" name="AF4" id="AF4" value="<?php echo $row['AF4'];?>">
                      </div>
                      <div class="form-group">
                        <label for="AF5" class="col-form-label">AF5</label>
                        <input class="form-control" type="text" name="AF5" id="AF5" value="<?php echo $row['AF5'];?>">
                      </div>
                      <button class="btn btn-primary mb-3" id= "submit" type="submit" formnovalidate>Submit form</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- settings-->
        <?php
          include_once("settings.php");
        ?>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  
  <!-- Page Specific JS File -->
  <script src="assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <!-- Dashboard Selector -->
  <script src="./js/navbar.js"></script>
  <script src="./js/editEmployee.js"></script>     
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->

</html>