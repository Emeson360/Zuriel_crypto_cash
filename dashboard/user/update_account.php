<?php 
require_once '../gen_includes/header.php';
include('../gen_includes/top_bar_user.php');
include('../gen_includes/side_bar_user.php');

?>






<!-- Page wrapper  -->
<div class="page-wrapper" style="background-color: #1B1D21;">
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb  -->
    <!-- ============================================================== -->
    <div class="row page-titles">
      <div class="col-md-12 col-lg-12 align-self-center dash">
        <div class="dashTxt">
          <h3 class="text-themecolor">Dashboard</h3>
        </div>
        <div class="dashHome">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" style="display: flex; align-items:center;"><a href="../user/home.php">Home</a></li>
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Update Account</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row">
      <?php include('../gen_includes/message/status_msg.php'); ?>
    </div>
    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <?php if (isset($_SESSION['user'])) : ?>
              <?php 
                $userid = $_SESSION['user']['userid'];
                $query = "SELECT * FROM users WHERE userid = $userid";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {

                  while ($row = mysqli_fetch_assoc($result)) {
                    $profile_pics_name = $row['profile_pics'];
                  }
                  ?>
                  <center class="mt-30">
                    <?php
                    if ($profile_pics_name != "") {
                      ?>
                      <img src="../assets/images/users/<?php echo $profile_pics_name ?>" class="img-circle" width="100%" />

                      <?php
                    }
                    else {
                      ?>
                        <img src="../assets/images/users/Avatar.jpg" class="img-circle" width="100%" />
                      <?php
                    }
                    
                    ?>
                  
                      <h4 class="card-title mt-10"><?php echo $_SESSION['user']['name']; ?>  </h4>
                      <h6 class="card-subtitle"><?php echo $_SESSION['user']['username']; ?></h6>
                  </center>

                  <?php
                }
                else {
                  echo "No image found";

                }
              ?>
            <?php endif ?>
            
          </div>
          <div>
            <hr class="mb-20"> 
          </div>
          <div class="card-body pt-0 text-center">
            <span class="text-muted ma-0 font-30 pl-0"><i class="fa fa-mail-bulk text-success"></i> </span>
            <?php if (isset($_SESSION['user'])) : ?>
              <h6 class="font-normal text-grey"><?php echo $_SESSION['user']['email']; ?></h6>
            <?php endif ?>
            
            <small class="text-muted pt-15 font-30 pl-0 db"><i class="fa fa-mobile-phone text-primary"></i></small>
            <?php if (isset($_SESSION['user'])) : ?>
              <h6 class="font-normal text-grey"><?php echo $_SESSION['user']['phone']; ?></h6>
            <?php endif ?>
            
            <small class="text-muted pt-15 font-30 pl-0 db"><i class="fa fa-map-marker text-danger"></i></small>
            <?php if (isset($_SESSION['user'])) : ?>
              <h6 class="font-normal text-grey"><?php echo $_SESSION['user']['address']; ?></h6>
              <h6 class="font-normal text-grey"><?php echo $_SESSION['user']['country']; ?></h6>
            <?php endif ?>
            
            <div class="mt-15 mb-15">
              <button class="btn btn-circle facebook-bg btn-secondary"><i class="fab fa-facebook"></i></button>
              <button class="btn btn-circle twitter-bg btn-secondary"><i class="fab fa-twitter"></i></button>
              <button class="btn btn-circle youtube-bg btn-secondary"><i class="fab fa-youtube"></i></button>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Column -->



      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
          <!-- Nav tabs  -->
          <div class="nav nav-tabs profile-tab"  role="tablist" >
            <li class="nav-item" style="background-color: #121417; color: #E78A1A; padding: 20px; font-size: 20px;"> Update account </li>
          </div>
          <!-- card bordy -->
          <div class="pa-20">
            <div class="card-body">
              <form class="form-horizontal form-material" action="../../connect.php" method="POST" enctype="multipart/form-data">

              <?php 
                $userid = $_SESSION['user']['userid'];
                $query = "SELECT * FROM users WHERE userid = $userid";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                  foreach($result as $row) {
                    
                    ?>
                    
                    <input type="hidden" name="id" value="<?php echo $row['userid']; ?>">
                     
                    <div class="form-group">
                      <label class="col-md-12">Full Name</label>
                      <div class="col-md-12">
                        <input type="text" value="<?php echo $row['name']; ?>" class="form-control form-control-line"  name="name" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">Userame</label>
                      <div class="col-md-12">
                        <input type="text" value="<?php echo $row['username']; ?>" class="form-control form-control-line"  name="username" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">Email</label>
                      <div class="col-md-12">
                        <input type="email" value="<?php echo $row['email']; ?>" class="form-control form-control-line email_id" name="email" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">Phone No</label>
                      <div class="col-md-12">
                        <input type="text" value="<?php echo $row['phone']; ?>" class="form-control form-control-line" name="phone" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">Password</label>
                      <div class="col-md-12">
                        <input type="password" value="<?php echo $row['password']; ?>" class="form-control form-control-line" name="password" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">Confirm Password</label>
                      <div class="col-md-12">
                        <input type="password" value="<?php echo $row['cpassword']; ?>" class="form-control form-control-line" name="cpassword" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">Address</label>
                      <div class="col-md-12">
                        <input type="text" value="<?php echo $row['address']; ?>" class="form-control form-control-line" name="address" readonly>
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <label class="col-md-12">Country</label>
                      <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="country" value="<?php echo $row['country']; ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                        <a href="./update_account_edit.php?userid=<?php echo $row['userid']; ?>" class="btn btn-primary">Edit Profile</a>
                      </div>
                    </div>
                    
                    <?php
                  }
                }
                    
              ?>  
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>





    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>