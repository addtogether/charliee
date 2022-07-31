<?php
    session_start();
    if(!isset($_SESSION['adminID'])){
        header("location: index.php");
    }
?>
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
    require_once("./includes/connection.php");
    include_once("navbar.php");
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $day = mysqli_real_escape_string($conn, $_GET['d']);
    $sql = mysqli_query($conn, "SELECT * FROM routeMaster WHERE assignToEmployee = {$id} AND weekDay = '{$day}'");
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
                  <h4>Employee Route</h4>
                </div>
                <div class="card-body">
                  <form action="" class="needs-validation">
                    <div class="form-row">
                      <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                        <label for="routeName" class="col-form-label">Route Name</label>
                        <input type="text" class="form-control" name="routeID" id="routeID" value="<?php echo $row['id'];?>" hidden>
                        <input type="text" class="form-control" name="routeName" id="routeName" placeholder="Enter Route" value="<?php echo $row['routeName'];?>" required>
                        <div class="invalid-feedback">
                          Please enter a Valid route name.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                        <label for="location" class="col-form-label">Location</label>
                        <select class="form-control" name="location" id="location" required>
                          <option disabled value="">Select Location</option>
                          <?php
                            $sql1 = mysqli_query($conn, "SELECT DISTINCT city FROM retailerMaster");
                            while($row1 = mysqli_fetch_assoc($sql1)){
                              if($row1["city"]==$row["location"]){
                                echo '<option selected>'.$row1["city"].'</option>';
                              }
                              else{
                                echo '<option>'.$row1["city"].'</option>';
                              }
                            }
                          ?>        
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid route Location.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                        <input id="subLocationInitial" value="<?php echo $row['subLocation'];?>" hidden>
                        <label for="subLocation" class="col-form-label">Sub Location</label>
                        <select class="form-control" name="subLocation" id="subLocation" required>
                          <option selected disabled value="">Select Location First</option>       
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid route Sub Location.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-3">
                        <label for="assignToEmployee" class="col-form-label">Employee</label>
                        <select class="form-control" name="assignToEmployee" id="assignToEmployee" required>
                          <option disabled value="">Select Employee</option>
                          <?php
                            $sql1 = mysqli_query($conn, "SELECT id,employeeName FROM employeeMaster WHERE status = 'ON'");
                            while($row1 = mysqli_fetch_assoc($sql1)){
                              if($row1["id"]==$row["assignToEmployee"]){
                                echo '<option value='.$row1["id"].' selected>'.$row1["employeeName"].'</option>';
                              }
                              else{
                                echo '<option value='.$row1["id"].'>'.$row1["employeeName"].'</option>';
                              }
                            }
                          ?>        
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Employee.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="weekDay" class="col-form-label">Week Day</label>
                        <select class="form-control" name="weekDay" id="weekDay" required>
                          <option selected disabled value="">Select Week Day</option>
                          <option <?php if($row['weekDay']=="Sunday") echo "selected";?>>Sunday</option>
                          <option <?php if($row['weekDay']=="Monday") echo "selected";?>>Monday</option>
                          <option <?php if($row['weekDay']=="Tuesday") echo "selected";?>>Tuesday</option>
                          <option <?php if($row['weekDay']=="Wednesday") echo "selected";?>>Wednesday</option>
                          <option <?php if($row['weekDay']=="Thursday") echo "selected";?>>Thursday</option>
                          <option <?php if($row['weekDay']=="Friday") echo "selected";?>>Friday</option>
                          <option <?php if($row['weekDay']=="Saturday") echo "selected";?>>Saturday</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Week Day.
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="frequency" class="col-form-label">Frequency</label>
                        <select class="form-control" name="frequency" id="frequency" required>
                          <option disabled value="">Select Frequency</option>
                          <option <?php if($row['frequency']=="Daily") echo "selected";?>>Daily</option>
                          <option <?php if($row['frequency']=="Weekly") echo "selected";?>>Weekly</option>
                          <option <?php if($row['frequency']=="Monthly") echo "selected";?>>Monthly</option>
                          <option <?php if($row['frequency']=="Quarterly") echo "selected";?>>Quarterly</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Frequency.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="routeStatus" class="col-form-label">Status</label>
                        <select class="form-control" name="routeStatus" id="status" required>
                          <option disabled value="">Select Status</option>
                          <option <?php if($row['status']=="ON") echo "selected";?>>ON</option>
                          <option <?php if($row['status']=="OFF") echo "selected";?>>OFF</option>
                          <option <?php if($row['status']=="Deleted") echo "selected";?>>Deleted</option>
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Status.
                        </div>
                      </div>
                      <div class="col-md-8 mb-3 ag-pad" style="padding-top: 0.1%;">
                        <label for="addtionalDetails" class="col-form-label">Additional Details</label>
                        <input class="form-control" type="text" name="addtionalDetails" id="addtionalDetails" value="<?php echo $row['addtionalDetails'];?>">
                      </div>

                    </div>
                    <div>
                      <hr>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="retailerName" class="col-form-label">Retailer Name</label>
                        <select class="form-control" name="retailerName" id="retailerName">
                        <option selected disabled value="">Select Sub Location First</option>       
                        </select>
                        <div class="invalid-feedback">
                          Please select a Valid Retailer Name.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="retailerStatus" class="col-form-label">Status</label>
                        <select class="form-control" name="retailerStatus" id="retailerStatus">
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
                      <a  class="create-new" href="javascript:addRow()">
                        <i data-feather="plus"></i>Add Row
                      </a>
                      </div>
                    </div>
                    <div>
                      <hr>
                    </div>
                    <div class="table-responsive user-table">
                      <table id="myTable" class="table table-striped display">
                        <thead>
                            <th hidden>id</th>
                            <th>Retailer Name</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th hidden>retailerMappingID</th>
                        </thead>
                        <tbody id="routeList">
                          <?php
                            $sql1 = mysqli_query($conn, "SELECT * FROM routeRetailerMapping WHERE routeID = '{$row['id']}'");
                            while($row1 = mysqli_fetch_assoc($sql1)){
                              $sql2 = mysqli_query($conn, "SELECT retailerName FROM retailerMaster WHERE id = '{$row1['retailerID']}'");
                              $row2 = mysqli_fetch_assoc($sql2);
                              echo '<tr draggable="true" ondragstart="start()" ondragover="dragover()">
                                      <td hidden>'.$row1['retailerID'].'</td>
                                      <td>'.$row2['retailerName'].'</td>';
                              if($row1['status']=="ON"){
                                echo '<td><span class="status-p bg-correct">ON</span></td>';
                              }
                              else{
                                echo '<td><span class="status-p bg-inc">OFF</span></td>';
                              }
                              echo '<td><input type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"/></td>
                                    <td hidden>'.$row1['id'].'</td>
                                    </tr>';
                            }
                          ?>
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
    <script src="./js/editRoute.js"></script>
  </body>

</html>