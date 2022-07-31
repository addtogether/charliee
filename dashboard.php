<?php
    session_start();
    if(!isset($_SESSION['adminID'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard - Charliee</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
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
  $sql = mysqli_query($conn, "SELECT * FROM employeeMaster");
  $employeeCount = mysqli_num_rows($sql);
  $sql1 = mysqli_query($conn, "SELECT * FROM retailerMaster");
  $retailerCount = mysqli_num_rows($sql1);
?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Employees</h5>
                          <h2 class="mb-3 font-18"><?php echo $employeeCount; ?></h2>

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img  src="assets/img/banner/user.png" alt="" height="80px">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Retailers</h5>
                          <h2 class="mb-3 font-18"><?php echo $retailerCount; ?></h2>

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/users.png" alt="" height="80px">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Category</h5>
                          <h2 class="mb-3 font-18">02</h2>

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/cat.png" alt="" height="80px">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Topic</h5>
                          <h2 class="mb-3 font-18">48,697</h2>

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/topic.png" alt="" height="80px">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-4">
              <!-- Users modules tickets -->
              <div class="card">
                <div class="card-header">
                  <h4>Top users</h4>
                </div>
                <div class="card-body">
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-1.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Top user -->
            </div>

            <div class="col-md-12 col-lg-12 col-xl-4">
              <!-- Online User -->
              <div class="card">
                <div class="card-header">
                  <h4>Online users</h4>
                </div>
                <div class="card-body">
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-1.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                </div>

              </div>
              <!-- Online User  -->
            </div>
            <div class="col-md-12 col-lg-12 col-xl-4">
              <!-- new Users -->
              <div class="card">
                <div class="card-header">
                  <h4>New users</h4>
                </div>
                <div class="card-body">
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-1.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                  <div class="support-ticket media pb-1 mb-2">
                    <img src="assets/img/users/user-2.png" class="user-img mr-2" alt="">
                    <div class="media-body ml-3">
                      <span class="font-weight-bold">ROBOT</span>
                    </div>
                  </div>
                </div>

              </div>
              <!-- new Users -->
            </div>
        </section>


        <section class="section">
          <div class="row">
            <!-- Tranding topic list start -->
            <div class="col-md-6 col-lg-6 col-xl-6">

              <div class="card">
                <div class="card-header">
                  <h4>Tranding Topic </h4>
                </div>
                <div class="card-body" >
                  <div class="table-responsive" style="height: 210px !important">
                    <table class="table table-striped" >
                      <tr>

                        <th>Posts</th>
                        <th>Views</th>
                        <th>Comments</th>
                        
                      </tr>
                      <tr>
                        <td>
                           
                            <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35"
                              data-toggle="title" title="">
                            <span class="d-inline-block ml-1">Bitcoin</span>
                           
                        </td>
                        <td>200k                 
                        </td>                       
                        <td>677575</td>                        
                      </tr>
                      <tr>
                        <td>
                          
                            <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35"
                              data-toggle="title" title="">
                            <span class="d-inline-block ml-1">Bitcoin</span>
                           
                        </td>
                        <td>200k                 
                        </td>                       
                        <td>56574</td>                        
                      </tr>
                      <tr>
                        <td>
                           
                            <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35"
                              data-toggle="title" title="">
                            <span class="d-inline-block ml-1">Bitcoin</span>
                          
                        </td>
                        <td>200k                 
                        </td>                       
                        <td>657</td>                        
                      </tr>
                      <tr>
                        <td>
                           
                            <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35"
                              data-toggle="title" title="">
                            <span class="d-inline-block ml-1">Bitcoin</span>
                          </a>    
                        </td>
                        <td>200k                 
                        </td>                       
                        <td>4546</td>                        
                      </tr>
                      <tr>
                        <td>
                           
                            <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35"
                              data-toggle="title" title="">
                            <span class="d-inline-block ml-1">Bitcoin</span>
                           
                        </td>
                        <td>200k                 
                        </td>                       
                        <td>2345</td>                        
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- tranding list end here  -->

            <!-- Engagment start here-->
            <div class="col-md-6 col-lg-6 col-xl-6" >

              <div class="card engage-card" style="height: 300px !important ;">
                <div class="card-header">
                  <h4>Engagment per Topic </h4>
                </div>
                <div class="card-body">
                  <div class="engagement-cat">
                    <form action="">
                      <select name="" id="">
                        <option value="0"> Category </option>
                        <option value="0"> Category 1</option>
                        <option value="0"> Category 2</option>
                        <option value="0"> Category 3</option>
                        <option value="0"> Category 4</option>
                      </select>
                    </form>
                    <div class="engagements-cmt">
                      <h3>50</h3>
                      <p>New Comments</p>
                    </div>
                  </div>
                  <div class="engagement-top">
                    <form action="">
                      <select name="" id="">
                        <option value="0"> Topic </option>
                        <option value="0"> Topic 1</option>
                        <option value="0"> Topic 2</option>
                        <option value="0"> Topic 3</option>
                        <option value="0"> Topic 4</option>
                      </select>
                    </form>
                    <div class="engagements-tcmt">
                      <h3>150</h3>
                      <p>Total Comments</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- engagement ends here -->
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
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <!-- Dashboard Selector -->
  <script src="./js/navbar.js"></script>
  <!-- <script src="./js/settings.js"></script> -->
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>