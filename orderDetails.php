<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Order</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <!-- <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css"> -->
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
    $sql = mysqli_query($conn, "SELECT * FROM orderMaster WHERE id = {$_GET['o']}");
    $row = mysqli_fetch_assoc($sql);
    $sql1 = mysqli_query($conn, "SELECT * FROM routeMaster WHERE id = {$row['routeID']}");
    $row1 = mysqli_fetch_assoc($sql1);
    $sql2 = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE id = {$row['employeeID']}");
    $row2 = mysqli_fetch_assoc($sql2);
    $orderDate = explode(" ", $row['orderDate']);
    $orderDate = $orderDate[0];
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $row2['employeeName']; ?></h4>
                            <div class="verticalLine">
                                <h4><?php echo $row1['routeName']; ?></h4>
                            </div>
                            <div class="verticalLine">
                                <h4><?php echo $orderDate; ?></h4>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead class="'table-row'">
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">Reatiler Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total Amount ₹</th>
                                        <th scope="col">Total Quantity</th>
                                        <th scope="col">Edit</th>
                                    </thead>
                                    <tbody id="routeList">
                                        <tr id="row-1">
                                            <th scope="row">1</th>
                                            <td><a class="name" href="retailersOrder.php">Nikul</a></td>
                                            <td><span class=" status status-p bg-correct">Refunded</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="quantity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 1)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                        <tr id="row-1">
                                            <th scope="row">2</th>
                                            <td><a class="name" href="retailersOrder.php">Nikul12</a></td>
                                            <td><span class=" status status-p bg-correct">Pending</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="quantity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 1)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Nikul2 </td>
                                            <td><span class="status-p bg-inc">No Order</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>
                                            <!-- <td><a href="" id="myBtn" > <i data-feather="edit"></i></a></td> -->

                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Nikul4 </td>
                                            <td><span class="status-p bg-amber">Pending</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>
                                            <!-- <td><a href="" class="open-modal" data-open="modal2"> <i data-feather="edit"></i></a></td> -->

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Nikul </td>
                                            <td><span class="status-p bg-amber">Pending</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Nikul </td>
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
                                        <option>No Order</option>
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
<script src="./js/employeeRoute.js"></script>
</body>

</html>