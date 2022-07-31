<?php
    session_start();
    if(!isset($_SESSION['adminID'])){
        header("location: index.php");
    }
?>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
                <!-- </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a> -->
                <div class="dropdown-divider"></div>
                <a href="backend/logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                  Logout
                </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- menu  -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name">Charliee</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="active" id="menu-dashboard">
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Details</li>

            <li class="" id="menu-employee">
              <a href="employee.php" class="nav-link"><i data-feather="users"></i><span>Employee's</span></a>
            </li>
            <li class="" id="menu-retailer">
              <a href="retailer.php" class="nav-link"><i data-feather="shopping-cart"></i><span>Retailer's</span></a>
            </li>
            <li class="" id="menu-product">
              <a href="product.php" class="nav-link"><i data-feather="shopping-bag"></i><span>Product's</span></a>
            </li>

            <li class="menu-header">Insight</li>
            <li class="" id="menu-route">
              <a href="employeeRoute.php" class="nav-link"><i data-feather="map"></i><span>Route</span></a>
            </li>
            <li class="" id="menu-routeShow">
              <a href="routeShow.php" class="nav-link"><i data-feather="globe"></i><span>Employee's Route List</span></a>
            </li>

            <!--  -->
            <li class="" id="menu-attendance">
              <a href="attendance.php" class="nav-link"><i data-feather="calendar"></i><span>Employee's Attendance</span></a>
            </li>
            <li class="" id="menu-order">
              <a href="order.php" class="nav-link"><i data-feather="file-text"></i><span>View Order</span></a>
            </li>

            <!-- Target Page Start Here  -->
            <li class="menu-header">Target</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-bullseye"></i></i><span>Target</span></a>
              <ul class="dropdown-menu">
                <li id="menu-assign-target" ><a class="nav-link" href="assignTarget.php"></i></i>Assign Target</a></li>
                <li id="menu-view-target"><a class="nav-link" href="viewTarget.php"></i></i>View Target</a></li>
                <!-- <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                <li><a class="nav-link" href="create-topic.html">Create Topic</a></li> -->

              </ul>
            </li>
            <!-- Target Page ends Here  -->

            <!-- setting start here  -->
            <li class="menu-header">Setting</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-cog"></i></i><span>Setting</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="geoFence.php"></i></i>GeoFence</a></li>
                <!-- <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                <li><a class="nav-link" href="create-topic.html">Create Topic</a></li> -->

              </ul>
            </li>
            <!-- setting ends here  -->
          </ul>
        </aside>
      </div>