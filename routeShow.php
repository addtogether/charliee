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
                                            <option> Test1</option>
                                            <option> Test2</option>
                                            <option> Test3</option>
                                            <option> Test4</option>
                                            <option> Test5</option>
                                            <option> Test6</option>
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
                                <a class="btn btn-primary mb-3 float-right" href="employeeRoute.php">Edit</a>    
                            </form>
                                                
                            <div>
                                <hr>
                            </div>
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <th hidden>id</th>
                                        <th>Sequence</th>
                                        <th>Retailer Name</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody id="routeList">
                                        <!-- <td colspan="3">No Elements</td> -->
                                        <tr>
                                            <td>1</td>
                                            <td>TestRE1</td>
                                            <td><span class="status-p bg-correct">On</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>TestRE2</td>
                                            <td><span class="status-p bg-correct">On</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>TestRE1</td>
                                            <td><span class="status-p bg-correct">On</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>TestRE2</td>
                                            <td><span class="status-p bg-correct">On</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>TestRE1</td>
                                            <td><span class="status-p bg-inc">Off</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>TestRE2</td>
                                            <td><span class="status-p bg-inc">Off</span></td>
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
<script src="./js/employeeRoute.js"></script>
</body>

</html>