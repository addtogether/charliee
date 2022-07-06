<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Retailer</title>
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
  include_once("navbar.php");
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
                          <input type="text" class="form-control" name="retailerCode" id="retailerCode" placeholder="Retailer Code" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Code.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="retailerName">Retailer Name</label>
                          <input type="text" class="form-control" name="retailerName" id="retailerName" placeholder="Retailer Name" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Name.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="contactPersonName">Contact Person Name</label>
                          <input type="text" class="form-control" name="contactPersonName" id="contactPersonName" placeholder="Contact Person Name" pattern="[a-zA-Z'-'\s]*" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Name.
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="address" class="col-form-label">Address</label>
                        <input class="form-control" type="text" name="address" id="address" required>
                        <div class="invalid-feedback">
                            Please enter a Valid Address.
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                          <div class="invalid-feedback">
                            Please enter a Valid location.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="pincode">Pincode</label>
                          <input class="form-control" type="text" name="pincode" maxlength="6" pattern="\d{6}" id="pincode" placeholder="pincode" required>
                          <div class="invalid-feedback">
                            Please enter a Valid Pincode.
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="city">City</label>
                          <input type="text" class="form-control" name="city" id="city" pattern="[a-zA-Z'-'\s]*" placeholder="City" required>
                          <div class="invalid-feedback">
                            Please enter a Valid City.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="state">State</label>
                          <input type="text" class="form-control" name="state" id="state" pattern="[a-zA-Z'-'\s]*" placeholder="State" required>
                          <div class="invalid-feedback">
                            Please enter a Valid State.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="country">Country</label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="country" id="country" pattern="[a-zA-Z'-'\s]*" placeholder="Country"
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
                            <input class="form-control" type="text" name="mobileNumber" maxlength="10" pattern="\d{10}" id="mobileNumber" required>
                            <div class="invalid-feedback">
                              Please enter a Valid Number.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="whatsappNumber" class="col-form-label">Whatsapp Number</label>
                            <input class="form-control" type="text" name="whatsappNumber" maxlength="10" pattern="\d{10}" id="whatsappNumber" required>
                            <div class="invalid-feedback">
                              Please enter a Valid whatsapp Number.
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="workingDays" class="col-form-label">Workings Days</label>
                            <input class="form-control" type="text" name="workingDays" id="workingDays" placeholder="Workings Days" required>
                            <div class="invalid-feedback">
                              Please enter a working day.
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="geoLocation" class="col-form-label">GeoLocation</label>
                        <input class="form-control" type="text" name="geoLocation" id="geoLocation" placeholder="GeoLocation" required>
                        <div class="invalid-feedback">
                          Please enter a GeoLocation.
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="geoAddress" class="col-form-label">GeoAddress</label>
                        <input class="form-control" type="text" name="geoAddress" id="geoAddress" placeholder="GeoAddress" required>
                        <div class="invalid-feedback">
                          Please enter a GeoAddress.
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Type of outlet</label>
                          <select class="form-control" name="typeOfOutlet" id="typeOfOutlet" required>
                            <option selected disabled value="">Select Type of outlet</option>
                            <option>SR</option>
                            <option>SO</option>
                            <option>SM</option>
                            <option>RM</option>
                            <option>ZM</option>
                            <option>Manager Sale</option>
                          </select>
                          <div class="invalid-feedback">
                              Please select a Valid Type of outlet.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Classification</label>
                          <select class="form-control" name="classification" id="classification" required>
                            <option selected disabled value="">Select Classification</option>
                            <option>SR</option>
                            <option>SO</option>
                            <option>SM</option>
                            <option>RM</option>
                            <option>ZM</option>
                            <option>Manager Sale</option>
                          </select>
                          <div class="invalid-feedback">
                              Please select a Valid Classification.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label class="col-form-label">Retailer Type</label>
                          <select class="form-control" name="retailerType" id="retailerType" required>
                            <option selected disabled value="">Select Retailer Type</option>
                            <option>SR</option>
                            <option>SO</option>
                            <option>SM</option>
                            <option>RM</option>
                            <option>ZM</option>
                            <option>Manager Sale</option>
                          </select>
                          <div class="invalid-feedback">
                              Please select a Valid Retailer Type.
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3" >
                            <label for="gstNumber" class="col-form-label">GST Number</label>
                            <input class="form-control" type="text" name="gstNumber" id="gstNumber" placeholder="GST Number" required>
                            <div class="invalid-feedback">
                              Please enter a GST Number.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3" >
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status" id="status" required>
                              <option selected disabled value="">Select Status</option>
                              <option>ON</option>
                              <option>OFF</option>
                              <option>Blocked</option>
                              <option>Deleted</option>
                            </select>
                            <div class="invalid-feedback">
                              Please select a Valid Status.
                            </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="fssaiNo">FSSAI Number</label>
                          <input type="text" class="form-control" name="fssaiNo" id="fssaiNo" placeholder="FSSAI Number" required>
                          <div class="invalid-feedback">
                            Please enter a FSSAI Number.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validityDate" class="col-form-label">Validty Date</label>
                            <input class="form-control" type="date" name="validityDate"  id="validityDate" required>
                            <div class="invalid-feedback">
                              Please select a Valid Validty Date.
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="additionalDetails" class="col-form-label">Additional Details</label>
                        <input class="form-control" type="text" name="additionalDetails" id="additionalDetails">
                      </div>
                      <div class="form-group">
                        <label for="AF1" class="col-form-label">AF1</label>
                        <input class="form-control" type="text" name="AF1" id="AF1">
                      </div>
                      <div class="form-group">
                        <label for="AF2" class="col-form-label">AF2</label>
                        <input class="form-control" type="text" name="AF2" id="AF2">
                      </div>
                      <div class="form-group">
                        <label for="AF3" class="col-form-label">AF3</label>
                        <input class="form-control" type="text" name="AF3" id="AF3">
                      </div>
                      <div class="form-group">
                        <label for="AF4" class="col-form-label">AF4</label>
                        <input class="form-control" type="text" name="AF4" id="AF4">
                      </div>
                      <div class="form-group">
                        <label for="AF5" class="col-form-label">AF5</label>
                        <input class="form-control" type="text" name="AF5" id="AF5">
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
  <script src="./js/addRetailer.js"></script>     
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->

</html>