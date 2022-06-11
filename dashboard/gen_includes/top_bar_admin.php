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
      <div class="navbar-header" style="background-color: #1d1d1d;"> 
        <a class="navbar-brand" href="../admin/index.php">
          <!-- Logo icon -->
          <img src="../../images/zuriel_logo/logo_light.png" width="60%" alt="homepage">
        </a> 
      </div>
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
          <li class="nav-item dropdown u-pro"> <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton1"> <span class="hidden-md-down">
          
          <?php if (isset($_SESSION['user'])) : ?>
            <?php 
              $userid = $_SESSION['user']['userid'];
              $query = "SELECT * FROM users WHERE userid = $userid";
              $result = mysqli_query($con, $query);
              $count = mysqli_num_rows($result);

              if ($count > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                  $profile_pics_name = $row['profile_pics'];
                }
                ?>

                <?php
                if ($profile_pics_name != "") {
                  ?>
                  <img src="../assets/images/users/<?php echo $profile_pics_name ?>" class="img-circle" width="100%" />

                  <?php
                }
                else {
                  ?>
                  <img src="../assets/images/users/Avatar.jpg" alt="user" width="100%" class="" /> <span class="hidden-md-down">
                  <?php
                }
                  
                ?>
                <?php if (isset($_SESSION['user'])) : ?>
                  <span>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>
                  </span>

                <?php endif ?>
                
                <?php
              }
              else {
                echo "No image found";
                
              }

              ?>
            

          <?php endif ?>
          
          &nbsp;<i class="fa fa-angle-down"></i></span> </a>
            <div class="dropdown-menu dropdown-menu-right animated fadeIn">
              <ul class="dropdown-user">
                <li>
                  <div class="dw-user-box">
                    <?php if (isset($_SESSION['user'])) : ?>
                      <?php 
                        $userid = $_SESSION['user']['userid'];
                        $query = "SELECT * FROM users WHERE userid = $userid";
                        $result = mysqli_query($con, $query);
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {

                          while ($row = mysqli_fetch_assoc($result)) {
                            $profile_pics_name = $row['profile_pics'];
                          }
                          ?>
                          <?php
                          if ($profile_pics_name != "") {
                            ?>
                            <div class="u-img">
                              <img src="../assets/images/users/<?php echo $profile_pics_name ?>" width="100%" alt="user">
                            </div>
                            <?php
                          }
                          else {
                            ?>
                              <div class="u-img">
                              <img src="../assets/images/users/Avatar.jpg" width="100%" alt="user">
                            </div>
                            <?php
                          }
                          
                          ?>
                        
                          <?php
                        }
                        else {
                          echo "No image found";
                        
                        }

                      ?>
                    <?php endif ?>
                    
                    <div class="u-text">
                      <?php if (isset($_SESSION['user'])) : ?>
                        <span>
                        <h4><strong><?php echo $_SESSION['user']['name']; ?></strong></h4>
                        </span>
                        <p class="text-muted"><?php echo $_SESSION['user']['email']; ?></p>
                      <?php endif ?>
                      
                      <a href="../admin/profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                    </div>
                  </div>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="../admin/profile.php"><i class="ti-user"></i> My Profile</a></li>
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
  