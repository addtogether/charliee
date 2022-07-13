<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Order</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" /> -->
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
?>


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

                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-table">
                                <table id="myTable" class="table display">
                                    <thead class="table-row">
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">Reatiler Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total Amount ₹</th>
                                        <th scope="col">Total Quantity</th>
                                        <th scope="col">Edit</th>
                                    </thead>
                                    <tbody>
                                        <!-- <td colspan="3">No Elements</td> -->
                                        <tr id="row-1">
                                            <th scope="row">1</th>
                                            <td ><a class="name" href="retailersOrder.php">Nikul </a></td>
                                            <td ><span class=" status status-p bg-correct">Delivered</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="qunatity">34</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary fas fa-pencil-alt noUnderlineCustom text-white" onclick="toggleModal(this, 1)"></a>
                                                
                                            </td>
                                        </tr>
                                        <tr id="row-2">
                                            <th scope="row">2</th>
                                            <td class="name">Nikul1 </td>
                                            <td><span class=" status status-p bg-correct">Delivered</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="qunatity">34</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary fas fa-pencil-alt noUnderlineCustom text-white" onclick="toggleModal(this, 2)"></a>
                                                <!-- <a onclick="removeRow(this)">Delete</a> -->
                                            </td>
                                        </tr>
                                        <tr id="row-3">
                                            <th scope="row">3</th>
                                            <td class="name">Nikul2 </td>
                                            <td class="status"><span class="status-p bg-inc">No Order</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="qunatity">34</td>
                                            <!-- <td><a href="" id="myBtn" > <i data-feather="edit"></i></a></td> -->
                                            <td>
                                                <a onclick="toggleModal(this, 3)">Edit</a>
                                                <!-- <a onclick="removeRow(this)">Delete</a> -->
                                            </td>
                                        </tr>
                                        <tr id="row-4">
                                            <th scope="row">4</th>
                                            <td class="name">Nikul4 </td>
                                            <td class="status"><span class="status-p bg-amber">Pending</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="qunatity">34</td>
                                            <!-- <td><a href="" class="open-modal" data-open="modal2"> <i data-feather="edit"></i></a></td> -->
                                            <td>
                                                <a onclick="toggleModal(this, 4)">Edit</a>
                                                <!-- <a onclick="removeRow(this)">Delete</a> -->
                                            </td>
                                        </tr>
                                        <tr id="row-5">
                                            <th scope="row">5</th>
                                            <td class="name">Nikul </td>
                                            <td class="status"><span class="status-p bg-amber">Pending</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="qunatity">34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 5)">Edit</a>
                                                <!-- <a onclick="removeRow(this)">Delete</a> -->
                                            </td>
                                        </tr>
                                        <tr id="row-6">
                                            <th scope="row">6</th>
                                            <td class="name">Nikul </td>
                                            <td class="status"><span class="status-p bg-grey">Refunded</span></td>
                                            <td class="amount">1,1300.00</td>
                                            <td class="qunatity"> 34</td>
                                            <td>
                                                <a onclick="toggleModal(this, 6)">Edit</a>
                                                <!-- <a onclick="removeRow(this)">Delete</a> -->
                                            </td>
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
                <!-- show the order status change side   -->
                <!-- Creating a popup modal -->
                <div class="modal" tabindex="-1" role="dialog" id="exampleModal" style="margin-top: 5% ;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Status</h5>
                                <button type="button" class="close" onclick="closeModal()" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option selected disabled value="">Select Status</option>
                                    <option>Delivered</option>
                                    <option>Pending</option>
                                    <option>REfunded</option>
                                    <!-- <option>Deleted</option> -->
                                </select>
                                <div class="invalid-feedback">
                                    Please select a Valid Status.
                                </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="saveInfo()">Save changes</button>
                                <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-backdrop fade show modal1" id="backdrop" style="display: none; margin-top:2%;"></div>

                <!-- show the order status change  -->

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
    let tableRowElement;

    function toggleModal(element) {

        tableRowElement = element.parentElement.parentElement;
        let current = document.getElementsByClassName('name')[0].innerHTML;
        console.log(current)  
        const name = tableRowElement.getElementsByClassName('name')[0].innerHTML;
        const status = tableRowElement.getElementsByClassName('status')[0].innerHTML;

        // document.getElementById('name').value = name;
        // document.getElementById('email').value = email;
        // document.getElementById('phone').value = phone;
        document.getElementById('status').value = status;

        openModal();
    }

    function saveInfo() {
        // const name = document.getElementById('name').value;
        const status = document.getElementById('status').value;

        // tableRowElement.getElementsByClassName('name')[0].innerHTML = name;
        tableRowElement.getElementsByClassName('status')[0].innerHTML = status;

        closeModal();
    }

    function openModal() {
        document.getElementById("backdrop").style.display = "block"
        document.getElementById("exampleModal").style.display = "block"
        document.getElementById("exampleModal").classList.add("show");
    }

    function closeModal() {
        document.getElementById("backdrop").style.display = "none"
        document.getElementById("exampleModal").style.display = "none"
        document.getElementById("exampleModal").classList.remove("show");
    }

    function removeRow(current) {
        current.parentElement.parentElement.remove();
    }
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