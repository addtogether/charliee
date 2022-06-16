<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Product</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<?php
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
                            <h4>Add New Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="needs-validation">
                                <div class="form-group ">
                                    <label for="employeePhoto">Product Photo</label>
                                    <!-- <label class="col-12 col-md-3 col-lg-3">Employee Photo</label> -->
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="employeeImage" id="image-label">Choose File</label>
                                            <!-- <input type="file" name="image" id="employeImage" accept="image/*" onchange="return fileValidation()" required/> -->
                                            <input type="file" name="employeePhoto" id="employeePhoto" accept="image/*" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="productCode">Product Code</label>
                                        <input type="text" class="form-control" name="productCode" id="productCode" placeholder="Product Code" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid Code.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="productName">Product Name</label>
                                        <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" pattern="[a-zA-Z'-'\s]*" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid Name.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="col-form-label">GST</label>
                                        <select class="form-control" name="gst" id="gst" required>
                                            <option selected disabled value="">Select GST</option>
                                            <option>5%</option>
                                            <option>12%</option>
                                            <option>18%</option>
                                            <option>28%</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid GST Rate.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="salary" class="col-form-label">GMS</label>
                                        <input class="form-control" type="text" name="gms" id="gms" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid GMS.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="salary" class="col-form-label">MRP</label>
                                        <input class="form-control" type="number" name="mrp" id="mrp" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid MRP.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Catalogue URL</label>
                                    <input class="form-control" type="text" name="CatalogueURL" id="CatalogueURL" required>
                                    <div class="invalid-feedback">
                                        Please enter a Valid Catalogue URL.
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option selected disabled value="">Select Category</option>
                                            <option>ABC</option>
                                            <option>PQR</option>
                                            <option>XYZ</option>
                                            <option>EFG</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid Category.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Sub Category</label>
                                        <select class="form-control" name="subCategory" id="subCategory" required>
                                            <option selected disabled value="">Select Sub Category</option>
                                            <option>ABC%</option>
                                            <option>PQR%</option>
                                            <option>XYZ%</option>
                                            <option>EFG%</option>

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid SUb Category.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="city">WR</label>
                                        <input type="text" class="form-control" name="wr" id="WR" pattern="[a-zA-Z'-'\s]*" placeholder="WR" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid WR.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">DR</label>
                                        <input type="text" class="form-control" name="dr" id="dr" pattern="[a-zA-Z'-'\s]*" placeholder="DR" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid DR.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="country">SSR</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ssr" id="ssr" pattern="[a-zA-Z'-'\s]*" placeholder="SSR" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please enter a Valid SSR.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="col-md-6 mb-3" style="padding-top: 7px;">
                                        <label for="country">Scheme Rate</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="schemeRate" id="schemeRate" pattern="[a-zA-Z'-'\s]*" placeholder="Scheme Rate" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please enter a Valid Scheme Rate.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option selected disabled value="">Select Status</option>
                                            <option>ON</option>
                                            <option>OFF</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid Status.
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label for="AF5" class="col-form-label">AF5</label>
                                    <input class="form-control" type="text" name="AF5" id="AF5">
                                </div> -->
                                <button class="btn btn-primary mb-3" id="submit" type="submit" formnovalidate>Submit form</button>
                            </form>
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
    <script src="./js/addEmployee.js"></script>
    </body>


    <!-- create-post.html  21 Nov 2019 04:05:03 GMT -->

</html>