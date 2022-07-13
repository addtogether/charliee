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
    $sql2 = mysqli_query($conn, "SELECT * FROM retailerMaster WHERE id = {$row['retailerID']}");
    $row2 = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM employeeMaster WHERE id = {$row['employeeID']}");
    $row3 = mysqli_fetch_assoc($sql3);
    $orderDate = explode(",", $row['orderDate']);
    $orderDate = $orderDate[0];
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $row3['employeeName'];?></h4>
                            <div class="verticalLine">
                                <h4><?php echo $row1['routeName'];?></h4>
                            </div>
                            <div class="verticalLine">
                                <h4><?php echo $orderDate;?></h4>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table table-striped display">
                                    <thead class="'table-row'">
                                        <th>Sr No.</th>
                                        <th>Reatiler Name</th>
                                        <th>Status</th>
                                        <th>Total Amount ₹</th>
                                        <th>Total Quantity</th>
                                        <th>Edit</th>
                                    </thead>
                                    <tbody id="routeList">
                                        <!-- <td colspan="3">No Elements</td> -->
                                        <tr>
                                            <td>1</td>
                                            <td><a href="retailersOrder.php">Nikul </a></td>
                                            <td><span class="status-p bg-correct">Delivered</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-delete btn-sm" id="open">Edit</a>
                                            </td>
                                            

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Nikul1 </td>
                                            <td><span class="status-p bg-correct">Delivered</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>
                                            

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