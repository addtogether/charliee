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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Orders</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="needs-validation">
                                <div class="form-row">
                                    <div class="col-md-5 mb-3">
                                        <label for="orderDate" class="col-form-label">Select Date</label>
                                        <input class="form-control" type="date" name="orderDate" id="orderDate" required>
                                        <div class="invalid-feedback">
                                            Please select a Valid date.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate>Show Order</button>
                            </form>

                            <div>
                                <hr>
                            </div>
                            <!-- Tabs navs -->
                            <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
                                <li class="nav-item flex-sm-fill">
                                    <a id="order-tab2" data-toggle="tab" href="#orderTab" role="tab" aria-controls="orderTab" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active" style="color:black;">Orders</a>
                                </li>
                                <li class="nav-item flex-sm-fill">
                                    <a id="noOrder-tab2" data-toggle="tab" href="#noOrderTab" role="tab" aria-controls="noOrderTab" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0" style="color:black;">No Orders</a>
                                </li>
                                <li class="nav-item flex-sm-fill">
                                    <a id="return-tab2" data-toggle="tab" href="#returnTab" role="tab" aria-controls="returnTab" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0" style="color:black;">Returns</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                            <!-- content  -->
                            <div id="myTab2Content" class="tab-content">
                                <div id="orderTab" role="tabpanel" aria-labelledby="order-tab" class="tab-pane fade px-4 py-5 show active">
                                    <div class="table-responsive user-table">
                                        <table id="orderTable" class="table table-striped display">
                                            <thead>
                                                <th>Sr No.</th>
                                                <th>Employee Name</th>
                                                <th>Route Name</th>
                                                <th>Total Amount ₹</th>
                                                <th>Total Quantity</th>
                                            </thead>
                                            <tbody id="orderList">
                                                <td colspan="5">Select date to view orders!</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="noOrderTab" role="tabpanel" aria-labelledby="noOrder-tab" class="tab-pane fade px-4 py-5">
                                    <div class="table-responsive user-table">
                                        <table id="noOrderTable" class="table table-striped display">
                                            <thead>
                                                <th>Sr No.</th>
                                                <th>Employee Name</th>
                                                <th>Route Name</th>
                                                <th>Reason</th>
                                            </thead>
                                            <tbody id="noOrderList">
                                                <td colspan="4">Select date to view orders!</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="returnTab" role="tabpanel" aria-labelledby="return-tab" class="tab-pane fade px-4 py-5">
                                    <div class="table-responsive user-table">
                                        <table id="returnTable" class="table table-striped display">
                                            <thead>
                                                <th>Sr No.</th>
                                                <th>Employee Name</th>
                                                <th>Route Name</th>
                                                <th>Total Amount ₹</th>
                                                <th>Total Quantity</th>
                                            </thead>
                                            <tbody id="returnList">
                                                <td colspan="5">Select date to view returns!</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- content  -->
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
<script src="./js/order.js"></script>
</body>

</html>