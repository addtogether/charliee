<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Route Name</title>
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
              <h4>Employee Route</h4>
            </div>
            <div class="card-body">
              <form action="" class="needs-validation">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label class="col-form-label">Employee Name</label>
                    <select class="form-control" name="employeeName" id="employeeName" required>
                      <option selected disabled value="">Select Employee Name</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1 Sale</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a Valid Employee Name.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="col-form-label">Day</label>
                    <select class="form-control" name="day" id="day" required>
                      <option selected disabled value="">Select Day</option>
                      <option>Sunday</option>
                      <option>Monday</option>
                      <option>Tuesday</option>
                      <option>Wednesday</option>
                      <option>Thursday</option>
                      <option>Friday</option>
                      <option>Saturday</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a Valid Day.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="col-form-label">Frequency</label>
                    <select class="form-control" name="frequency" id="frequency" required>
                      <option selected disabled value="">Select Frequency</option>
                      <option>Daily</option>
                      <option>Weekly</option>
                      <option>Monthly</option>
                      <option>Quarterly</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a Valid Frequency.
                    </div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                    <label class="" for="route name">Route Name</label>
                    <input type="text" class="form-control" name="routeName" id="routeName" placeholder="Enter Route" required>
                    <div class="invalid-feedback">
                      Please enter a Valid route name.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                    <label class="" for="route name">Location</label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location" required>
                    <div class="invalid-feedback">
                      Please enter a Valid route name.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                    <label class="" for="route name">Sub Location</label>
                    <input type="text" class="form-control" name="subLocation" id="subLocation" placeholder="Enter Sub Location" required>
                    <div class="invalid-feedback">
                      Please enter a Valid route name.
                    </div>
                  </div>
                </div>
                <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label class="col-form-label">Status</label>
                    <select class="form-control" name="status" id="status" required>
                      <option selected disabled value="">Select Status</option>
                      <option>ON</option>
                      <option>OFF</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a Valid Status.
                    </div>
                  </div>
                  <div class="col-md-8 mb-3 ag-pad" style="padding-top: 0.5%;">
                    <label class="" for="route name">AF!</label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Enter AF!" >
                    <div class="invalid-feedback">
                      <!-- Please enter a Valid route name. -->
                    </div>
                  </div>

                </div>
                <div>
                  <hr>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="sequence" class="col-form-label">Sequence</label>
                    <input class="form-control" type="number" name="sequence" id="sequence" required>
                    <div class="invalid-feedback">
                      Please enter a valid sequence.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="col-form-label">Retailer Name</label>
                    <select class="form-control" name="retailerName" id="retailerName" required>
                      <option selected disabled value="">Select Retailer Name</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1</option>
                      <option>Vishal1 Sale</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a Valid Retailer Name.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="col-form-label">Status</label>
                    <select class="form-control" name="status" id="status" required>
                      <option selected disabled value="">Select Status</option>
                      <option>ON</option>
                      <option>OFF</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a Valid Status.
                    </div>
                  </div>
                  <!-- <button class="btn btn-primary mb-3" id="save">
                    Add Row
                  </button> -->
                  <div>
                  <a  class="create-new" href="">
            <i data-feather="plus"></i>
            Add Row
          </a>
                  </div>
                </div>
                <div>
                  <hr>
                </div>
                <div class="table-responsive user-table">
                  <table id="myTable" class="table table-striped display">
                    <tr>
                      <th>Sequence</th>
                      <th>Retailer Name</th>
                      <th>Status</th>
                      <!-- <th>Edit</th>
                            <th>Delete</th> -->
                    </tr>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Vishal1</td>
                        <td><span class="status-p bg-correct">On</span></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Vishal166</td>
                        <td><span class="status-p bg-inc">Off</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate>Submit</button>
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