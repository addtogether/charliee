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
    <title>Employee Attendance</title>
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
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employee's Attendance</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="needs-validation">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3 ag-pad" style="padding-top: 0.5%;">
                                        <label for="employee" class="col-form-label">Employee</label>
                                        <select class="form-control" name="employee" id="employee" required>
                                            <option selected disabled value="">Select Employee</option>
                                            <?php
                                                $sql = mysqli_query($conn, "SELECT id,employeeName FROM employeeMaster WHERE status = 'ON'");
                                                while($row = mysqli_fetch_assoc($sql)){
                                                echo '<option value='.$row["id"].'>'.$row["employeeName"].'</option>';
                                                }
                                            ?> 
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid Employee Name.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ag-pad" style="padding-top: 0.5%;">
                                        <label for="month" class="col-form-label">Month and Year</label>
                                        <input type="month" class="form-control" name="month" id="month" required>
                                        <div class="invalid-feedback">
                                            Please select a Valid month and year.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate>Show Attendance</button>
                            </form>

                            <div>
                                <hr>
                            </div>
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <th>Sr No.</th>
                                        <th>Start Time</th>
                                        <th>Start Geolocation</th>
                                        <th>Start Route Photo</th>
                                        <th>End Time</th>
                                        <th>End Geolocation</th>
                                        <th>End Route Photo</th>
                                        <th>View Route</th>
                                    </thead>
                                    <tbody id="attendanceList">
                                        <td colspan="8">Select Employee and month to view Attendance</td>
                                        <!-- <tr>
                                            <td>1</td>
                                            <td>11:30</td>
                                            <td>Latitude : 37.48 <br>
                                                Longitude : 122.48
                                            </td>
                                            <td>
                                                <div class="support-ticket">
                                                    <img src="assets/img/users/user-1.png" class="user-img " alt="">
                                                </div>
                                            </td>
                                            <td>11:30</td>
                                            <td>Latitude : 37.48 <br>
                                                Longitude : 122.48</td>
                                            <td>
                                                <div class="support-ticket">
                                                    <img src="assets/img/users/user-1.png" class="user-img " alt="">
                                                </div>
                                            </td>
                                            <td><a href="employeeRoute.php">View</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
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
<script src="./js/attendance.js"></script>
</body>
</html>