<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Order</title>
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
                <div class="col-md-9 col-lg-9 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Vishal Kumar</h4>
                            <div class="verticalLine">
                                <h4>Dadar East</h4>
                            </div>
                            <div class="verticalLine">
                                <h4>11/5/2022</h4>
                            </div>
                            <div class="verticalLine">
                                <h4>XYZ Company</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Total Amount ₹</th>
                                        <th scope="col">Total Quantity</th>
                                        <th scope="col">Edit</th>
                                    </thead>
                                    <tbody id="routeList">
                                        <!-- <td colspan="3">No Elements</td> -->
                                        <tr id="row-1">
                                            <th scope="row">1</th>
                                            <td class="name">Peanut Chikki</td>
                                            <td><span class="status status-p bg-correct">Delivered</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="quantity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 1)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                            </td>

                                        </tr>
                                        <tr id="row-2">
                                            <th scope="row">1</th>
                                            <td class="name">Peanut202 Chikki</td>
                                            <td><span class=" status status-p bg-correct">Delivered</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="quantity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 2)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                        <tr id="row-3">
                                            <th scope="row">1</th>
                                            <td class="name">Pani Chikki</td>
                                            <td><span class=" status status-p bg-correct">Delivered</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="quantity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 3)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                        <tr id="row-3">
                                            <th scope="row">1</th>
                                            <td class="name">Peanut Chikki</td>
                                            <td><span class="status status-p bg-amber">Pending</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="quantity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 3)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Peanut Chikki</td>
                                            <td><span class="status-p bg-amber">Pending</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Peanut Chikki</td>
                                            <td><span class="status-p bg-grey">Refunded</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>

                                        </tr>
                                        <tr>
                                            <td colspan="3">Total</td>
                                            <td>234566.00</td>
                                            <td>2345</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar status change   -->
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Order Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="content" style="font-size:15px; font-weight :600; color:red;">
                            </div>
                            <div class="form">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option selected disabled value="">Select Status</option>
                                        <option>Delivered</option>
                                        <option>Pending</option>
                                        <option>Refunded</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a Valid Status.
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" id="submit" type="submit"  formnovalidate>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar status change   -->
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
<script src="./js/retailersOrder.js"></script>
</body>

</html>