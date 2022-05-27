<?php 


// Redirect to login page if not logged in
// if (!isset($_SESSION['username'])) {
//   header('location: ../../login.php');
// }

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../../login.php');
}



?>



<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
  <!-- ============================================================== -->
  <!-- Topbar header - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light" style=" background-color: #1d1d1d;padding: 0px 0px">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header" style="background-color: #1d1d1d;"> <a class="navbar-brand" href="../admin/index.php">
        <!-- Logo icon -->
        <b>
        <!-- Light Logo icon -->
        <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> </b>
        <!--End Logo icon -->
        <!-- Logo text -->
        <span>
        <!-- dark Logo text -->
        <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" />
        <!-- Light Logo text -->
        <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a> </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse" style="background-color: #E78A1A;">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto">
          <!-- Menu icon -->
          <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
          <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
          <!-- ============================================================== -->
          <!-- Search -->
          <!-- ============================================================== -->
          <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="icon-Magnifi-Glass2"></i></a>
            <form class="app-search">
              <input type="text" class="form-control" placeholder="Search & enter">
              <a class="srh-btn"><i class="ti-close"></i></a>
            </form>
          </li>
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
          
         
          
         
          <!-- ============================================================== -->
          <!-- Profile -->
          <!-- ============================================================== -->
          <li class="nav-item dropdown u-pro"> <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton1"><img src="../assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">
          
          <?php if (isset($_SESSION['user'])) : ?>
            <span>
               <strong><?php echo $_SESSION['user']['username']; ?></strong>
            </span>

            <!-- <small> -->
						<!-- <i  style="color: #0f0;">(<?php //echo ucfirst($_SESSION['user']['usertype']); ?>)</i>  -->
					<!-- </small> -->

        <?php endif ?>
          
          &nbsp;<i class="fa fa-angle-down"></i></span> </a>
            <div class="dropdown-menu dropdown-menu-right animated fadeIn">
              <ul class="dropdown-user">
                <li>
                  <div class="dw-user-box">
                    <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                    <div class="u-text">
                      <?php if (isset($_SESSION['user'])) : ?>
                        <span>
                        <h4><strong><?php echo $_SESSION['user']['username']; ?></strong></h4>
                        </span>
                        <p class="text-muted"><?php echo $_SESSION['user']['email']; ?></p>
                      <?php endif ?>
                      <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                    </div>
                  </div>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                <li role="separator" class="divider"></li>
                <li>
                <?php if (isset($_SESSION['user'])) : ?>

                  <a href="../admin/index.php?logout='1'">

                <?php endif ?>  
                
                <i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- ============================================================== -->
  <!-- End Topbar header -->
  <!-- ============================================================== -->
  