<?php 
    session_start();
    if(isset($_SESSION['adminID'])){
        header("location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <form action="" class="needs-validation">
                        <div class="card-body p-5 text-center">
                            <div class="sidebar-brand">
                                <img alt="image" src="assets/img/logo.png" class="header-logo" />
                            </div>
                            <h3 class="mb-5">Sign in into Charliee</h3>
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Email" required/>
                                <div class="invalid-feedback">
                                    Please enter a Valid Email.
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Password" required/>
                                <div class="invalid-feedback">
                                    Please enter a Valid Password.
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="btn btn-primary btn-lg btn-block" id="submit" type="submit" formnovalidate>Login</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/create-post.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>