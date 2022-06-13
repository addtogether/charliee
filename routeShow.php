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
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employee's Route List</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="needs-validation">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3 ag-pad" style="padding-top: 0.5%;">
                                        <label for="employee" class="col-form-label">Employee</label>
                                        <select class="form-control" name="employee" id="employee" required>
                                            <option selected disabled value="">Select Employee</option>
                                            <?php
                                                $sql = mysqli_query($conn, "SELECT id,employeeName FROM employeeMaster");
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
                                        <label for="day" class="col-form-label">Week Day</label>
                                        <select class="form-control" name="day" id="day" required>
                                            <option selected disabled value="">Select Week Day</option>
                                            <option>Sunday</option>
                                            <option>Monday</option>
                                            <option>Tuesday</option>
                                            <option>Wednesday</option>
                                            <option>Thursday</option>
                                            <option>Friday</option>
                                            <option>Saturday</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid week day.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate>Show Route</button> 
                                <a class="btn btn-primary mb-3 float-right" href="javascript:redirect()">Edit</a>    
                            </form>
                                                
                            <div>
                                <hr>
                            </div>
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <th>Sequence</th>
                                        <th>Retailer Name</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody id="routeList">
                                        <td colspan="3">Select Employee and Day to view route</td>
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
    <script src="./js/routeShow.js"></script>
    </body>

</html>