<!DOCTYPE html>
<html lang="en">

<!-- posts.html  21 Nov 2019 04:05:03 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Employees - Charliee</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <!-- excel -->
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
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
                <a href="addEmployee.php" class="create-new" href="">
                  <i data-feather="plus"></i>
                  Create new Employee
              </a>
                <div class="card">
                  <div class="card-header">
                    <h4>All Employees</h4>
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
                        <button onclick="ExportToExcel('xlsx')" type="button" class="btn btn-primary mb-3"> <i data-feather="download"></i> Export</button>
                        <button  onclick="ExportToExcelTemplate('xlsx')" type="button" class="btn btn-primary mb-3 mid-button"> <i data-feather="download"></i>Download Template</button>
                        <button  type="button" class="btn btn-success mb-3 mid-button" data-toggle="collapse" data-target="#excelUpload"> <i data-feather="upload"></i> Import</button>
                        <form>
                          <div class="collapse" id="excelUpload">
                            <input type="file" id="excelImport" class="form-control">
                            <!-- <div class="input-group-append">
                              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div> -->
                          </div>
                        </form>
                        <!-- <input class="form-control" id="formFileSm" type="file" /> -->
                      </div>
                    </div>
                   
                    <div class="float-left">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for user">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive user-table">
                      <table id="example" class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Employee Image</th>
                            <th>Employee Code</th>
                            <th>Employee Name</th>
                            <th>Mobile Number</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql = mysqli_query($conn,"SELECT * FROM employeeMaster");
                          while($row = mysqli_fetch_assoc($sql)){
                              echo '<tr>
                                    <td>'.$row['id'].'</td>';
                                    if($row['employeePhoto']!=""){
                                      echo '<td><img src="./photo/'.$row['employeePhoto'].'" width="50" height="50"></td>';
                                    }
                                    else{
                                      echo '<td><img src="./photo/personCircle.svg" width="50" height="50"></td>';
                                    }
                                    echo '<td>'.$row['employeeCode'].'</td>
                                          <td>'.$row['employeeName'].'</td>
                                          <td>'.$row['mobileNumber'].'</td>
                                          <td><span class="status-p bg-primary">'.$row['status'].'</span></td>';

                                          // if($row['status']==1){
                                          //     echo '<td><span class="label label-success" style="font-size:inherit;">APPROVED</span></td>';
                                          // }
                                          // else if($row['status']==2){
                                          //     echo '<td><span class="label label-danger" style="font-size:inherit;">DISAPPROVED</span></td>';
                                          // }
                                          // else{
                                          //     echo '<td>
                                          //           <button class="btn btn-info btn-round btn-sm m-l-5" onclick="approve('.$row['id'].')">Approve</button>
                                          //           <button class="btn btn-danger btn-round btn-sm m-l-5" onclick="disapprove('.$row['id'].')">Disapprove</button>
                                          //           </td>';
                                          // }

                                    echo '<td>
                                            <a href="editEmployee.php?u=' . $row['id'] . '" style="color:#0080c0 ;" >
                                              <i data-feather="edit"></i>
                                            </a>
                                          </td>
                                          <td>
                                              <i onclick="deleteEmployee(' . $row['id'] . ')" style="color: red; cursor:pointer" data-feather="trash-2"></i>
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

  <!-- file modal -->



  <!-- model for banning start  -->
  <!-- <div id="myModal" class="modal">
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
        </div> -->
  <!-- model for banning ends  -->


  <!-- settings-->
  <?php
  include_once("settings.php");
  ?>
</div>
<div style="display:none;">
  <?php
  $sql = mysqli_query($conn, "SELECT * FROM employeeMaster");
  echo '<table id="outputTable"><tr>';
  $flag = true;
  while ($row = mysqli_fetch_assoc($sql)) {
    if ($flag) {
      $arrayKeys = array_keys($row);
      for ($i = 0; $i < count($arrayKeys) - 6; $i++) {
        echo '<td>' . $arrayKeys[$i] . '</td>';
      }
      $flag = false;
      echo '</tr>';
    }
    echo '<tr>';
    $arrayValues = array_values($row);
    for ($i = 0; $i < count($arrayValues) - 6; $i++) {
      echo '<td hidden>' . $arrayValues[$i] . '</td>';
    }
    echo '</tr>';
  }
  ?>
</div>
</div>
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
<script src="./js/employee.js"></script>
</body>


<!-- posts.html  21 Nov 2019 04:05:04 GMT -->

</html>