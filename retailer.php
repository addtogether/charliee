<!DOCTYPE html>
<html lang="en">


<!-- posts.html  21 Nov 2019 04:05:03 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Retailer - Charliee</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <!-- data tables -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
</head>

<?php
  require_once("./includes/connection.php");
  include_once("navbar.php");
?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body ">

            <div class="row mt-4">
              <div class="col-12">
                <a href="addRetailer.php" class="create-new" href="">
                  <i data-feather="plus"></i>
                  Create new Retailer
                </a>
                <div class="card">
                  <div class="card-header">
                    <h4>All Retailer</h4>
                  </div>
                  <div class="card-body">
                    <!-- <div class="float-left">
                      <select class="form-control selectric">
                        <option>Action For Selected</option>
                        <option>Move to Draft</option>
                        <option>Move to Pending</option>
                        <option>Delete Permanently</option>
                      </select>
                    </div> -->
                    <div class="float-right">
                      <div class="card-header-action">
                        <button onclick="exportTableToExcel('example', 'Employees-data')" type="button" class="btn btn-success mb-3"> <i data-feather="download"></i> Export</button>
                        <button  onclick="exportTableToExcel('example', 'Employees-data')" type="button" class="btn btn-primary mb-3 mid-button"> <i data-feather="download"></i>Export Template</button>
                        <button  type="button" class="btn btn-primary mb-3 mid-button"> <i data-feather="upload"></i> Import</button>
                      </div>
                    </div>
                   
                    <!-- <div class="float-left">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for user">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div> -->
                    <div class="table-responsive user-table">
                      <table id="example" class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Retailer Code</th>
                            <th>Retailer Name</th>
                            <th>Mobile Number</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql = mysqli_query($conn,"SELECT * FROM retailerMaster");
                          while($row = mysqli_fetch_assoc($sql)){
                              echo '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['retailerCode'].'</td>
                                    <td>'.$row['retailerName'].'</td>
                                    <td>'.$row['mobileNumber'].'</td>
                                    <td><span class="status-p bg-primary">'.$row['status'].'</span></td>
                                    <td>
                                      <a href="editRetailer.php?u='.$row['id'].'" style="color:#0080c0 ;" >
                                        <i data-feather="edit"></i>
                                      </a>
                                    </td>
                                    <td>
                                        <i onclick="deleteRetailer('.$row['id'].')" style="color: red; cursor:pointer" data-feather="trash-2"></i>
                                    </td>
                                    </tr>';
                          }   
                        ?>
                        </tbody>
                      </table>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- model for banning start  -->
        <div id="myModal" class="modal">
          <div class="card" id="sample-login" style="width: 30%; margin-left: 495px ;">
            <div class="float-right">
              <span class="close">&times;</span>
            </div>
            <form>
              <div class="card-body pb-0">

                <div class="form-group">

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Length</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="number" id="quantity" name="quantity" min="1" max="1000" class="form-control"
                        placeholder="Days..">
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reason</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote-simple"></textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer pt-">
                <button type="submit"
                  onclick="$.cardProgress('#sample-login', {dismiss: true,onDismiss: function() {alert('Dismissed :)')}});return false;"
                  class="btn btn-primary">Ban</button>
              </div>
            </form>
          </div>
        </div>
        <!-- model for banning ends  -->


        <!-- settings-->
        <?php
          include_once("settings.php");
        ?>
      </div>

    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/posts.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <!-- Dashboard Selector -->
    <script src="./js/navbar.js"></script>
    <script src="./js/retailer.js"></script>
</body>


<!-- posts.html  21 Nov 2019 04:05:04 GMT -->

</html>