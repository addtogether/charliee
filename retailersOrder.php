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
    $sql = mysqli_query($conn, "SELECT * FROM orderMaster WHERE id = {$_GET['o']}");
    $row = mysqli_fetch_assoc($sql);
    $sql1 = mysqli_query($conn, "SELECT routeName FROM routeMaster WHERE id = {$row['routeID']}");
    $row1 = mysqli_fetch_assoc($sql1);
    $sql2 = mysqli_query($conn, "SELECT employeeName FROM employeeMaster WHERE id = {$row['employeeID']}");
    $row2 = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT retailerName FROM retailerMaster WHERE id = {$row['retailerID']}");
    $row3 = mysqli_fetch_assoc($sql3);
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
                            <div class="verticalLine">
                                <h4><?php echo $row3['retailerName']; ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tabs navs -->
                            <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
                                <li class="nav-item flex-sm-fill">
                                    <a id="order-tab2" data-toggle="tab" href="#orderTab" role="tab" aria-controls="orderTab" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active" style="color:black;">Orders</a>
                                </li>
                                <li class="nav-item flex-sm-fill">
                                    <a id="return-tab2" data-toggle="tab" href="#returnTab" role="tab" aria-controls="returnTab" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0" style="color:black;">Returns</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                            <!-- content  -->
                            <div id="myTab2Content" class="tab-content">
                                <div id="orderTab" role="tabpanel" aria-labelledby="order-tab" class="tab-pane fade px-4 py-5 show active">
                                    <div class="table-responsive user-table">
                                        <table id="orderTable" class="table table-striped display">
                                            <thead>
                                                <th scope="col">Sr No.</th>
                                                <th hidden scope="col">Order Detail ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Order Status</th>
                                                <th scope="col">Total Amount ₹</th>
                                                <th scope="col">Total Quantity</th>
                                                <th scope="col">Edit</th>
                                            </thead>
                                            <tbody id="orderList">
                                                <?php
                                                    $no = 1;
                                                    $totalAmount = 0;
                                                    $totalQuantity = 0;
                                                    $sql4 = mysqli_query($conn, "SELECT * FROM orderDetails WHERE orderID = '{$row['id']}'");
                                                    while($row4 = mysqli_fetch_assoc($sql4)){
                                                        $sql5 = mysqli_query($conn, "SELECT productName FROM productMaster 
                                                        WHERE id = '{$row4['productID']}'");
                                                        $row5 = mysqli_fetch_assoc($sql5);
                                                        echo '<tr>
                                                                <td scope="row">'.$no++.'</td>
                                                                <td hidden>'.$row4['id'].'</td>
                                                                <td>'.$row5['productName'].'</td>';
                                                                if($row4['status']=="Delivered"){
                                                                    echo '<td><span class="status-p bg-correct">Delivered</span></td>';
                                                                }
                                                                else if($row4['status']=="Pending"){
                                                                    echo '<td><span class="status-p bg-amber">Pending</span></td>';
                                                                }
                                                                else if($row4['status']=="Rejected"){
                                                                    echo '<td><span class="status-p bg-inc">Rejected</span></td>';
                                                                }
                                                                else if($row4['status']=="Returned"){
                                                                    echo '<td><span class="status-p bg-lime">Returned</span></td>';
                                                                }
                                                                else{
                                                                    echo '<td><span class="status-p bg-grey">Deffered</span></td>';
                                                                }
                                                                $totalAmount += $row4['amount'];
                                                                $totalQuantity += $row4['quantity'];
                                                                echo '<td>'.$row4['amount'].'</td>
                                                                        <td>'.$row4['quantity'].'</td>
                                                                        <td>
                                                                            <a onclick="toggleModalOrder(this)" class="btn btn-danger btn-delete btn-sm">Edit</a>
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
                                <div id="returnTab" role="tabpanel" aria-labelledby="return-tab" class="tab-pane fade px-4 py-5">
                                    <div class="table-responsive user-table">
                                        <table id="returnTable" class="table table-striped display">
                                            <thead>
                                                <th scope="col">Sr No.</th>
                                                <th hidden scope="col">Order Detail ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Order Status</th>
                                                <th scope="col">Total Amount ₹</th>
                                                <th scope="col">Total Quantity</th>
                                                <th scope="col">Edit</th>
                                            </thead>
                                            <tbody id="returnList">
                                                <?php
                                                    $sql6 = mysqli_query($conn, "SELECT id FROM returnMaster WHERE employeeID = 
                                                    '{$row['employeeID']}' AND DATE(returnDate) = '{$orderDate}' AND 
                                                    retailerID = '{$row['retailerID']}'");
                                                    $row6 = mysqli_fetch_assoc($sql6);
                                                    $no = 1;
                                                    $totalAmount = 0;
                                                    $totalQuantity = 0;
                                                    $sql7 = mysqli_query($conn, "SELECT * FROM returnDetails WHERE returnID = '{$row6['id']}'");
                                                    if(mysqli_num_rows($sql7) != 0){
                                                        while($row7 = mysqli_fetch_assoc($sql7)){
                                                            $sql8 = mysqli_query($conn, "SELECT productName FROM productMaster 
                                                            WHERE id = '{$row7['productID']}'");
                                                            $row8 = mysqli_fetch_assoc($sql8);
                                                            echo '<tr>
                                                                    <td scope="row">'.$no++.'</td>
                                                                    <td hidden>'.$row7['id'].'</td>
                                                                    <td>'.$row8['productName'].'</td>';
                                                                    if($row7['status']=="Accepted"){
                                                                        echo '<td><span class="status-p bg-correct">Accepted</span></td>';
                                                                    }
                                                                    else if($row7['status']=="Pending"){
                                                                        echo '<td><span class="status-p bg-amber">Pending</span></td>';
                                                                    }
                                                                    else if($row7['status']=="Rejected"){
                                                                        echo '<td><span class="status-p bg-inc">Rejected</span></td>';
                                                                    }
                                                                    else{
                                                                        echo '<td><span class="status-p bg-grey">Deffered</span></td>';
                                                                    }
                                                                    $totalAmount += $row7['amount'];
                                                                    $totalQuantity += $row7['quantity'];
                                                                    echo '<td class="amount">'.$row7['amount'].'</td>
                                                                            <td class="quantity">'.$row7['quantity'].'</td>
                                                                            <td>
                                                                                <a onclick="toggleModalReturn(this)" class="btn btn-danger btn-delete btn-sm">Edit</a>
                                                                            </td>
                                                                    </tr>';
                                                        }
                                                        echo '<tr>
                                                                <td colspan="3">Total</td>
                                                                <td>'.$totalAmount.'</td>
                                                                <td>'.$totalQuantity.'</td>
                                                        </tr>';
                                                    }
                                                    else{
                                                        echo '<td colspan="6">No Returns</td>';
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
                                    <input type="text" class="form-control" name="orderDetailID" id="orderDetailID" hidden>
                                    <input type="text" class="form-control" name="orderBoolean" id="orderBoolean" hidden>
                                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option selected disabled value="">Select a product to change status</option>
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
<script src="./js/retailersOrder.js"></script>
</body>

</html>