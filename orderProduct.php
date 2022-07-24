<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Product To Order</title>
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
    $id = mysqli_real_escape_string($conn, $_GET['o']);
    $sql = mysqli_query($conn, "SELECT * FROM orderMaster WHERE id = {$id}");
    $row = mysqli_fetch_assoc($sql);
    $sql1 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id = {$row['routeID']}");
    $row1 = mysqli_fetch_assoc($sql1);
    $sql2 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = {$row['employeeID']}");
    $row2 = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT retailerName FROM retailerMaster WHERE id = {$row['retailerID']}");
    $row3 = mysqli_fetch_assoc($sql3);
    $orderDate = explode(" ", $row['orderDate']);
    $orderDate = $orderDate[0];
  ?>

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Add Product To Order</h4>
                </div>
                <div class="card-body">
                  <form action="" class="needs-validation">
                    <div class="form-row">
                      <div class="col-md-4 mb-3 ag-pad">
                        <input type="text" class="form-control" name="orderID" id="orderID" value="<?php echo $row['id'];?>" hidden>
                        <label for="routeName" class="col-form-label">Employee Name</label>
                        <input type="text" class="form-control" name="employeeName" id="employeeName" value="<?php echo $row2['employeeName'];?>" disabled>
                        <div class="invalid-feedback">
                          Please enter a Valid employee name.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3 ag-pad">
                        <label for="routeName" class="col-form-label">Route Name</label>
                        <input type="text" class="form-control" name="routeName" id="routeName" value="<?php echo $row1['routeName'];?>" disabled>
                        <div class="invalid-feedback">
                          Please enter a Valid route name.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3 ag-pad">
                        <label for="orderDate" class="col-form-label">Order Date</label>
                        <input class="form-control" type="date" name="orderDate" id="orderDate" value="<?php echo $orderDate;?>" disabled>
                        <div class="invalid-feedback">
                          Please select a Valid Order Date.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="retailerName" class="col-form-label">Retailer Name</label>
                          <input type="text" class="form-control" name="retailerName" id="retailerName" value="<?php echo $row3['retailerName'];?>" disabled>
                          <div class="invalid-feedback">
                            Please enter a Valid retailer name.
                          </div>
                        </div>
                      <div class="col-md-4 mb-3">
                        <label for="category" class="col-form-label">Category</label>
                        <select class="form-control" name="category" id="category" required>
                          <option selected disabled value="">Select Category</option>
                          <?php
                            $sql = mysqli_query($conn, "SELECT DISTINCT category FROM productMaster");
                            while($row = mysqli_fetch_assoc($sql)){
                              echo '<option '.$row["category"].'</option>';
                            }
                          ?>        
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Category.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="subCategory" class="col-form-label">Sub Category</label>
                        <select class="form-control" name="subCategory" id="subCategory" required>
                          <option selected disabled value="">Select Category First</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Sub Category.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="product" class="col-form-label">Product</label>
                        <select class="form-control" name="product" id="product" required>
                          <option selected disabled value="">Select Sub Category First</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Product.
                        </div>
                      </div>
                      <div class="col-md-8 mb-3 ag-pad" style="padding-top: 0.1%;">
                        <label for="quantity" class="col-form-label">Quantity</label>
                        <input class="form-control" type="text" name="quantity" id="quantity">
                          <div class="invalid-feedback">
                            Please select a Valid Quantity.
                          </div>
                      </div>
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
    <script src="./js/orderProduct.js"></script>
  </body>

</html>