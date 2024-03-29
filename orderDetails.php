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
    $id = mysqli_real_escape_string($conn, $_GET['o']);
    $sql = mysqli_query($conn, "SELECT * FROM orderMaster WHERE id = {$id}");
    $row = mysqli_fetch_assoc($sql);
    $sql1 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id = {$row['routeID']}");
    $row1 = mysqli_fetch_assoc($sql1);
    $sql2 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = {$row['employeeID']}");
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
                                <h4><?php echo date('d F Y', strtotime($orderDate)); ?></h4>
                            </div>

                        </div>
                        <div class="card-body">
                            <!-- Tabs navs -->
                            <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
                                <li class="nav-item flex-sm-fill">
                                    <a id="order-tab2" data-toggle="tab" href="#orderTab" role="tab" aria-controls="orderTab" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active" style="color:black;">Orders</a>
                                </li>
                                <li class="nav-item flex-sm-fill">
                                    <a id="noOrder-tab2" data-toggle="tab" href="#noOrderTab" role="tab" aria-controls="noOrderTab" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0" style="color:black;">No Orders</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                            <!-- content  -->
                            <div id="myTab2Content" class="tab-content">
                                <div id="orderTab" role="tabpanel" aria-labelledby="order-tab" class="tab-pane fade px-4 py-5 show active">
                                    <div class="table-responsive user-table">
                                        <table id="orderTable" class="table table-striped display">
                                            <thead class="'table-row'">
                                                <th scope="col">Sr No.</th>
                                                <th hidden scope="col">Order ID</th>
                                                <th scope="col">Retailer Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total Amount ₹</th>
                                                <th scope="col">Total Quantity</th>
                                                <th scope="col">Edit</th>
                                            </thead>
                                            <tbody id="orderList">
                                                <?php
                                                    $no = 1;
                                                    $totalAmount = 0;
                                                    $totalQuantity = 0;
                                                    $sql3 = mysqli_query($conn, "SELECT * FROM orderMaster 
                                                    WHERE employeeID = '{$row['employeeID']}' AND DATE(orderDate) = '{$orderDate}'");
                                                    while($row3 = mysqli_fetch_assoc($sql3)){
                                                        $sql4 = mysqli_query($conn, "SELECT retailerName FROM retailerMaster 
                                                        WHERE id = '{$row3['retailerID']}'");
                                                        $row4 = mysqli_fetch_assoc($sql4);
                                                        echo '<tr>
                                                                <td scope="row">'.$no++.'</td>
                                                                <td hidden>'.$row3['id'].'</td>
                                                                <td><a href="retailersOrder.php?o='.$row3['id'].'">'.$row4['retailerName'].'</a></td>';
                                                                if($row3['status']=="Delivered"){
                                                                    echo '<td><span class="status-p bg-correct">Delivered</span></td>';
                                                                }
                                                                else if($row3['status']=="Pending"){
                                                                    echo '<td><span class="status-p bg-amber">Pending</span></td>';
                                                                }
                                                                else if($row3['status']=="Rejected"){
                                                                    echo '<td><span class="status-p bg-inc">Rejected</span></td>';
                                                                }
                                                                else if($row3['status']=="Refunded"){
                                                                    echo '<td><span class="status-p bg-lime">Refunded</span></td>';
                                                                }
                                                                else{
                                                                    echo '<td><span class="status-p bg-grey">Deffered</span></td>';
                                                                }
                                                                $totalAmount += $row3['totalAmount'];
                                                                $totalQuantity += $row3['totalQuantity'];
                                                                echo '<td>'.$row3['totalAmount'].'</td>
                                                                        <td>'.$row3['totalQuantity'].'</td>
                                                                        <td>
                                                                            <a onclick="toggleModal(this)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                                                        </td>
                                                                </tr>';
                                                    }
                                                    echo '<tr>
                                                            <td colspan="3">Total</td>
                                                            <td>'.$totalAmount.'</td>
                                                            <td>'.$totalQuantity.'</td>
                                                    </tr>';
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="noOrderTab" role="tabpanel" aria-labelledby="noOrder-tab" class="tab-pane fade px-4 py-5">
                                    <div class="table-responsive user-table">
                                        <table id="noOrderTable" class="table table-striped display">
                                            <thead class="'table-row'">
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Retailer Name</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">Image</th>
                                            </thead>
                                            <tbody id="noOrderList">
                                                <?php
                                                    $no = 1;
                                                    $sql5 = mysqli_query($conn, "SELECT * FROM noOrder 
                                                    WHERE employeeID = '{$row['employeeID']}' AND DATE(orderDate) = '{$orderDate}'");
                                                    if(mysqli_num_rows($sql5) != 0){
                                                        while($row5 = mysqli_fetch_assoc($sql5)){
                                                            $sql6 = mysqli_query($conn, "SELECT retailerName FROM retailerMaster 
                                                            WHERE id = '{$row5['retailerID']}'");
                                                            $row6 = mysqli_fetch_assoc($sql6);
                                                            echo '<tr>
                                                                    <td scope="row">'.$no++.'</td>
                                                                    <td>'.$row6['retailerName'].'</td>
                                                                    <td>'.$row5['reason'].'</td>';
                                                            if($row5['image'] != "0"){
                                                                echo '<td><a href="./files/noOrder/'.$row5['image'].'" target="_blank">View Image</a></td>
                                                                    </tr>';
                                                            }
                                                            else{
                                                                echo '<td>-</td>
                                                                    </tr>';
                                                            }
                                                        }
                                                    }
                                                    else{
                                                        echo '<td colspan="4">No Records</td>';
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
                <!-- sidebar status change   -->
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Order Status</h5>
                        </div>
                        <div class="card-body">
                            <!-- <div class="content" style="font-size:15px; font-weight :600; color:red;"></div> -->
                            <form action="" class="needs-validation">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="orderID" id="orderID" hidden>
                                    <input type="text" class="form-control" name="retailerName" id="retailerName" placeholder="Retailer Name" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option selected disabled value="">Select Status</option>
                                        <option>Delivered</option>
                                        <option>Pending</option>
                                        <option>Rejected</option>
                                        <option>Refunded</option>
                                        <option>Deffered</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a Valid Status.
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate disabled>Change Status</button>
                            </form>
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
<script src="./js/orderDetails.js"></script>
</body>

</html>