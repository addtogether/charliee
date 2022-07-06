<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Edit Product</title>
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
  require_once("./includes/connection.php");
  include_once("navbar.php");
  $sql = mysqli_query($conn, "SELECT * FROM productMaster WHERE id = {$_GET['p']}");
  $row = mysqli_fetch_assoc($sql);
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="" class="needs-validation">
                                <div class="form-group ">
                                    <label for="employeePhoto" class="col-form-label">Product Photo</label>
                                    <!-- <label class="col-12 col-md-3 col-lg-3">Employee Photo</label> -->
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview" hidden>
                                            <label for="employeeImage" id="image-label">Choose File</label>
                                            <!-- <input type="file" name="image" id="employeImage" accept="image/*" onchange="return fileValidation()" required/> -->
                                            <input type="file" name="productPhoto" id="employeePhoto" accept="image/*" />
                                        </div>
                                            <?php
                                                if ($row['photo']==""){
                                                    echo '<img id="productPhotoPreview" src="./files/product/product.svg" width="250" height="250">';
                                                }
                                                else{
                                                    echo '<img id="productPhotoPreview" src="./files/product/'.$row['photo'].'" width="250" height="250">';
                                                }
                                            ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="productCode" class="col-form-label">Product Code</label>
                                        <input type="text" class="form-control" name="editProductID" id="editProductID" value="<?php echo $row['id'];?>" hidden>
                                        <input type="text" class="form-control" name="editProductPhoto" id="editProductPhoto" value="<?php echo $row['photo'];?>" hidden>
                                        <input type="text" class="form-control" name="productCode" id="productCode" value="<?php echo $row['productCode'];?>" placeholder="Product Code" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid Code.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="productName" class="col-form-label">Product Name</label>
                                        <input type="text" class="form-control" name="productName" id="productName" value="<?php echo $row['productName'];?>" placeholder="Product Name" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid Name.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="GST" class="col-form-label">GST</label>
                                        <select class="form-control" name="GST" id="GST" required>
                                            <option disabled value="">Select GST(percent)</option>
                                            <option <?php if($row['GST']=="5") echo "selected";?>>5</option>
                                            <option <?php if($row['GST']=="12") echo "selected";?>>12</option>
                                            <option <?php if($row['GST']=="18") echo "selected";?>>18</option>
                                            <option <?php if($row['GST']=="28") echo "selected";?>>28</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid GST Rate.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="GMS" class="col-form-label">GMS</label>
                                        <input class="form-control" type="text" name="GMS" id="GMS" value="<?php echo $row['GMS'];?>" pattern="[a-zA-Z'-'\s]*" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid GMS.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="MRP" class="col-form-label">MRP</label>
                                        <input class="form-control" type="text" name="MRP" id="MRP" value="<?php echo $row['MRP'];?>" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid MRP.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="catalogueURL" class="col-form-label">Catalogue URL</label>
                                    <input class="form-control" type="text" name="catalogueURL" id="catalogueURL" value="<?php echo $row['catalogueURL'];?>" required>
                                    <div class="invalid-feedback">
                                        Please enter a Valid Catalogue URL.
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="col-form-label">Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option disabled value="">Select Category</option>
                                            <option <?php if($row['category']=="A") echo "selected";?>>A</option>
                                            <option <?php if($row['category']=="B") echo "selected";?>>B</option>
                                            <option <?php if($row['category']=="C") echo "selected";?>>C</option>
                                            <option <?php if($row['category']=="D") echo "selected";?>>D</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid Category.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="subCategory" class="col-form-label">Sub Category</label>
                                        <select class="form-control" name="subCategory" id="subCategory" required>
                                            <option disabled value="">Select Sub Category</option>
                                            <option <?php if($row['subCategory']=="1") echo "selected";?>>1</option>
                                            <option <?php if($row['subCategory']=="2") echo "selected";?>>2</option>
                                            <option <?php if($row['subCategory']=="3") echo "selected";?>>3</option>
                                            <option <?php if($row['subCategory']=="4") echo "selected";?>>4</option>
                                            <option <?php if($row['subCategory']=="5") echo "selected";?>>5</option>
                                            <option <?php if($row['subCategory']=="6") echo "selected";?>>6</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid SUb Category.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="WR" class="col-form-label">WR</label>
                                        <input type="text" class="form-control" name="WR" id="WR" placeholder="WR" value="<?php echo $row['WR'];?>" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid WR.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="DR" class="col-form-label">DR</label>
                                        <input type="text" class="form-control" name="DR" id="DR" placeholder="DR" value="<?php echo $row['DR'];?>" required>
                                        <div class="invalid-feedback">
                                            Please enter a Valid DR.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="SSR" class="col-form-label">SSR</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="SSR" id="SSR" placeholder="SSR" value="<?php echo $row['SSR'];?>" required>
                                            <div class="invalid-feedback">
                                                Please enter a Valid SSR.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="schemeRate" class="col-form-label">Scheme Rate</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="schemeRate" id="schemeRate" placeholder="Scheme Rate" value="<?php echo $row['schemeRate'];?>" required>
                                            <div class="invalid-feedback">
                                                Please enter a Valid Scheme Rate.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="col-form-label">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option disabled value="">Select Status</option>
                                            <option <?php if($row['status']=="ON") echo "selected";?>>ON</option>
                                            <option <?php if($row['status']=="OFF") echo "selected";?>>OFF</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Valid Status.
                                        </div>
                                    </div>
                                </div>
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
    <script src="./js/editProduct.js"></script>
    </body>


    <!-- create-post.html  21 Nov 2019 04:05:03 GMT -->

</html>