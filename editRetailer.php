<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Retailer</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
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
  $sql = mysqli_query($conn, "SELECT * FROM retailerMaster WHERE id = {$_GET['u']}");
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
                    <h4>Add New Retailer</h4>
                  </div>
                  <div class="card-body">
                    <form action="" class="needs-validation">
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="retailerCode">Retailer Code</label>
                          <input type="text" class="form-control" name="editRetailerID" id="editRetailerID" value="<?php echo $row['id'];?>" hidden>
                          <input type="text" class="form-control" name="retailerCode" id="retailerCode" placeholder="Retailer Code" value="<?php echo $row['retailerCode'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Code.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="retailerName">Retailer Name</label>
                          <input type="text" class="form-control" name="retailerName" id="retailerName" placeholder="Retailer Name" value="<?php echo $row['retailerName'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Name.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="contactPersonName">Contact Person Name</label>
                          <input type="text" class="form-control" name="contactPersonName" id="contactPersonName" placeholder="Contact Person Name" pattern="[a-zA-Z'-'\s]*" value="<?php echo $row['contactPersonName'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Name.
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
                            <input type="text" class="form-control" name="country" id="country" pattern="[a-zA-Z'-'\s]*" placeholder="Country" value="<?php echo $row['country'];?>"
                              aria-describedby="inputGroupPrepend" required>
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
                            <input class="form-control" type="text" name="mobileNumber" maxlength="10" pattern="\d{10}" id="mobileNumber" value="<?php echo $row['mobileNumber'];?>" required>
                            <div class="invalid-feedback">
                              Please enter a Valid Number.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="whatsappNumber" class="col-form-label">Whatsapp Number</label>
                            <input class="form-control" type="text" name="whatsappNumber" maxlength="10" pattern="\d{10}" id="whatsappNumber" value="<?php echo $row['whatsappNumber'];?>" required>
                            <div class="invalid-feedback">
                              Please enter a Valid whatsapp Number.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="workingDays" class="col-form-label">Workings Days</label>
                            <input class="form-control" type="text" name="workingDays" id="workingDays" placeholder="Workings Days" value="<?php echo $row['workingDays'];?>" required>
                            <div class="invalid-feedback">
                              Please enter a working day.
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="geoLocation" class="col-form-label">GeoLocation</label>
                        <input class="form-control" type="text" name="geoLocation" id="geoLocation" placeholder="GeoLocation" value="<?php echo $row['geoLocation'];?>" required>
                        <div class="invalid-feedback">
                          Please enter a GeoLocation.
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="geoAddress" class="col-form-label">GeoAddress</label>
                        <input class="form-control" type="text" name="geoAddress" id="geoAddress" placeholder="GeoAddress" value="<?php echo $row['geoAddress'];?>" required>
                        <div class="invalid-feedback">
                          Please enter a GeoAddress.
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Type of outlet</label>
                          <select class="form-control" name="typeOfOutlet" id="typeOfOutlet" required>
                            <option disabled value="">Select Type of outlet</option>
                            <option <?php if($row['typeOfOutlet']=="SR") echo "selected";?>>SR</option>
                            <option <?php if($row['typeOfOutlet']=="SO") echo "selected";?>>SO</option>
                            <option <?php if($row['typeOfOutlet']=="SM") echo "selected";?>>SM</option>
                            <option <?php if($row['typeOfOutlet']=="RM") echo "selected";?>>RM</option>
                            <option <?php if($row['typeOfOutlet']=="ZM") echo "selected";?>>ZM</option>
                            <option <?php if($row['typeOfOutlet']=="Manager Sale") echo "selected";?>>Manager Sale</option>
                          </select>
                          <div class="invalid-feedback">
                              Please select a Valid Type of outlet.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Classification</label>
                          <select class="form-control" name="classification" id="classification" required>
                            <option disabled value="">Select Classification</option>
                            <option <?php if($row['classification']=="SR") echo "selected";?>>SR</option>
                            <option <?php if($row['classification']=="SO") echo "selected";?>>SO</option>
                            <option <?php if($row['classification']=="SM") echo "selected";?>>SM</option>
                            <option <?php if($row['classification']=="RM") echo "selected";?>>RM</option>
                            <option <?php if($row['classification']=="ZM") echo "selected";?>>ZM</option>
                            <option <?php if($row['classification']=="Manager Sale") echo "selected";?>>Manager Sale</option>
                          </select>
                          <div class="invalid-feedback">
                              Please select a Valid Classification.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Retailer Type</label>
                          <select class="form-control" name="retailerType" id="retailerType" required>
                            <option disabled value="">Select Retailer Type</option>
                            <option <?php if($row['retailerType']=="SR") echo "selected";?>>SR</option>
                            <option <?php if($row['retailerType']=="SO") echo "selected";?>>SO</option>
                            <option <?php if($row['retailerType']=="SM") echo "selected";?>>SM</option>
                            <option <?php if($row['retailerType']=="RM") echo "selected";?>>RM</option>
                            <option <?php if($row['retailerType']=="ZM") echo "selected";?>>ZM</option>
                            <option <?php if($row['retailerType']=="Manager Sale") echo "selected";?>>Manager Sale</option>
                          </select>
                          <div class="invalid-feedback">
                              Please select a Valid Retailer Type.
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3" >
                            <label for="gstNumber" class="col-form-label">GST Number</label>
                            <input class="form-control" type="text" name="gstNumber" id="gstNumber" placeholder="GST Number" value="<?php echo $row['gstNumber'];?>" required>
                            <div class="invalid-feedback">
                              Please enter a GST Number.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3" >
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status" id="status" required>
                              <option disabled value="">Select Status</option>
                              <option <?php if($row['status']=="ON") echo "selected";?>>ON</option>
                              <option <?php if($row['status']=="OFF") echo "selected";?>>OFF</option>
                              <option <?php if($row['status']=="Blocked") echo "selected";?>>Blocked</option>
                              <option <?php if($row['status']=="Deleted") echo "selected";?>>Deleted</option>
                            </select>
                            <div class="invalid-feedback">
                              Please select a Valid Status.
                            </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="fssaiNo">FSSAI Number</label>
                          <input type="text" class="form-control" name="fssaiNo" id="fssaiNo" placeholder="FSSAI Number" value="<?php echo $row['fssaiNo'];?>" required>
                          <div class="invalid-feedback">
                            Please enter a FSSAI Number.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validityDate" class="col-form-label">Validty Date</label>
                            <input class="form-control" type="date" name="validityDate"  id="validityDate" value=<?php echo $row['validityDate'];?> required>
                            <div class="invalid-feedback">
                              Please select a Valid Validty Date.
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="additionalDetails" class="col-form-label">Additional Details</label>
                        <input class="form-control" type="text" name="additionalDetails" id="additionalDetails" value="<?php echo $row['additionalDetails'];?>">
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
      </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
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
  <script src="./js/editRetailer.js"></script>     
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->

</html>