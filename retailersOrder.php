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

<style>
    .popup1 {
        background: rgba(0, 0, 0, 0.65);
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        opacity: 0;
        pointer-events: none;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 100000;
        transition: all 0.3s ease-in-out;
    }

    .popup1.show {
        opacity: 1;
        pointer-events: auto;
    }

    .popup1 .box {
        align-self: center;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(104, 80, 80, 0.2);
        padding: 15px 20px;
        width: 35%;
        margin: 10px auto;
        cursor: pointer;
    }

    .popup1 .box .part-1 h3 {
        color: #1cc88a;
        font-weight: bold;
    }

    .close {
        float: right;
        size: 14px;
    }
</style>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
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
                                        <th>Sr No.</th>
                                        <th>Product Name</th>
                                        <th>Order Status</th>
                                        <th>Total Amount ₹</th>
                                        <th>Total Quantity</th>
                                        <th>Edit</th>
                                    </thead>
                                    <tbody id="routeList">
                                        <!-- <td colspan="3">No Elements</td> -->
                                        <tr>
                                            <td>1</td>
                                            <td>Peanut Chikki</td>
                                            <td><span class="status-p bg-correct">Delivered</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-delete btn-sm" id="open">Edit</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Peanut Chikki</td>
                                            <td><span class="status-p bg-correct">Delivered</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Peanut Chikki</td>
                                            <td><span class="status-p bg-correct">Delivered</span></td>
                                            <td>1,1300.00</td>
                                            <td>34</td>

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

                <!-- modal start -->
                <div id="popup1" class="popup1">
                    <div class="box">
                        <span class="close" id="close">&times;</span>
                        <div class="part-1">
                            <h3>Order Status</h3>
                        </div>

                        <form action="" method="">
                            <div class="form-row">
                                <div class="content">
                                    <!-- Any Content -->
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="col-md-12 mb-3">

                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option selected disabled value="">Select Status</option>
                                            <option>Delivered</option>
                                            <option>Refunded</option>
                                            <option>Pending</option>
                                            
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid Status.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btns btn-approve btn-warning" id="close">Update Status</button>
                        </form>
                    </div>
                </div>
                <!-- modal ends -->

            </div>
        </div>
    </section>
    <!-- settings-->
    <?php
    include_once("settings.php");
    ?>
</div>
<!-- script for modal  -->
<script>
    const btnOpen = document.querySelector('#open');
    const btnClose = document.querySelector('#close');

    const popupContainer = document.querySelector('.popup1');
    const boxContent = document.querySelector('.content');

    var modal = document.getElementById('popup1')

    btnOpen.addEventListener('click', () => {

        const component = btnOpen.parentElement.parentElement;
        console.log(component);

        for (let i = 0; i < component.cells.length - 1; i++) {
            boxContent.innerHTML += component.cells[i].innerHTML + ' ';
        }

        // for getting only one element 
        // let element =1;
        // boxContent.innerHTML = component.cells[i].innerHTML;

        console.log(popupContainer);
        popupContainer.classList.add('show');

    });

    btnClose.addEventListener('click', () => {
        popupContainer.classList.remove('show')
        boxContent.innerHTML = '';
    });

    // window.onclick = function(event) {
    //     if (event.target == popup1) {
    //         popup1.style.display = "none";
    //     }
    // }
</script>

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