<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Assign Target</title>
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
                            <h4>View Target</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="needs-validation">
                                <div class="form-row">
                                    
                                    <div class="col-md-4 mb-3 ag-pad" style="padding-top: 0.5%;">
                                        <label for="month" class="col-form-label">Month and Year</label>
                                        <input type="month" class="form-control" name="month" id="month" />
                                        <div class="invalid-feedback">
                                            Please select a Valid month and year.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate>View</button>
                            </form>

                            <div>
                                <hr>
                            </div>
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <th>Sr No.</th>
                                        <th>Employee</th>
                                        <th>Assigned (₹)</th>
                                        <th>Achieved (₹)</th>
                                        <th>Percent (%)</th>
                                    </thead>
                                    <tbody id="attendanceList">
                                        <!-- <td colspan="8">Select Employee and month to view Attendance</td> -->
                                        <tr>
                                            <td>1</td>
                                            <td>Aamir</td>
                                            <td>1,00, 000</td>
                                            <td>75,000</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Aamir Khan</td>
                                            <td>2,00, 000</td>
                                            <td>55,000</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 27.5%" aria-valuenow="27.5" aria-valuemin="0" aria-valuemax="100">27.5%</div>
                                                </div>
                                            </td>
                                        </tr>
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