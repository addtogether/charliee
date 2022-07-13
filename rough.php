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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

                        </div>
                        <div class="card-body">
                            <div class="table-responsive user-table">
                                <table id="table" class="table table-striped display">
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
                                                <button type="button" class="btn btn-sm btn-primary fas fa-pencil-alt noUnderlineCustom text-white" data-toggle="modal" data-target="#editModal"></button>
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
                <!-- modal start -->
                <div class="popup">
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="padding-top:10%">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="ModalLabel">Order Status</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data" method="POST" id="ModalForm">
                                    {{csrf_field()}}
                                    <input type="hidden" id="editId" value="">
                                    <div class="form-group">
                                        <label for="editLevel">Status</label>
                                        <select class="form-control" id="editLevel" name="level">
                                            <option value="0">Pending</option>
                                            <option value="1">Delivered</option>
                                            <option value="2">No order</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <button type="button" id="saveModalButton" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    $(function() {
        //Take the data from the TR during the event button
        $('table').on('click', 'button.editingTRbutton',function (ele) {
            //the <tr> variable is use to set the parentNode from "ele
            var tr = ele.target.parentNode.parentNode;

            //I get the value from the cells (td) using the parentNode (var tr)
            var id = tr.cells[0].textContent;
            var firstName = tr.cells[1].textContent;
            // var surname = tr.cells[2].textContent;
            // var email = tr.cells[3].textContent;
            // var phone = tr.cells[4].textContent;
            var level = tr.cells[5].textContent;

            //Prefill the fields with the gathered information
            $('h5.modal-title').html('Edit Admin Data: '+firstName);
            // $('#editName').val(firstName);
            // $('#editSurname').val(surname);
            // $('#editEmail').val(email);
            // $('#editPhone').val(phone);
            $('#editId').val(id);
            $("#editLevel").val(level).attr('selected', 'selected');

            //If you need to update the form data and change the button link
            $("form#ModalForm").attr('action', window.location.href+'/update/'+id);
            $("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
        });
    });

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