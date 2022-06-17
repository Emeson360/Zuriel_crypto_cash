<?php  
require_once '../gen_includes/header.php';
include('../gen_includes/top_bar_admin.php');
include('../gen_includes/side_bar_admin.php');

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
            <li class="breadcrumb-item" style="display: flex; align-items:center;"><a href="../admin/home.php">Home</a></li>
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->

    <?php include('../gen_includes/message/login_msg.php') ?>
    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body pa-30">
            <div class="d-flex no-block" style="justify-content: center; align-items:center;">
              <div style="margin-right: 20px;">
                <i class="fa fa-people-group fa-3x" style="color: #E78A1A;"></i>
              </div>
              <div>
                <h6 class=" mb-0 text-uppercase" style="text-align: center; color:white;">Total Investors</h6>
              </div>
            </div>

            <div class=""  style="margin-left: 60px; padding-top: 20px;">
              
              <?php 
                $query = "SELECT * FROM users";
                $result = mysqli_query($con, $query);

                $count = mysqli_num_rows($result);
                  
                  ?>
                  <h3 style="font-size: 50px;"><?php echo $count; ?></h3>
                  <?php
              ?> 
            </div>
            
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
    
      <!-- Column -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body pa-30">
            <div class="d-flex no-block" style="justify-content: center; align-items:center;">
              <div style="margin-right: 20px;">
                <i class="fa fa-money-bill-transfer fa-3x" style="color: #E78A1A;"></i>
              </div>
              <div>
                <h6 class=" mb-0 text-uppercase" style="text-align: center; color:white;">Pending Deposit</h6>
              </div>
            </div>

            <div class=""  style="margin-left: 60px; padding-top: 20px;">
              <?php 
                $query = "SELECT * FROM deposit WHERE status = 'pending'";
                $result = mysqli_query($con, $query);

                $count = mysqli_num_rows($result);
                  
                  ?>
                  <h3 style="font-size: 50px;"><?php echo $count; ?></h3>
                  <?php
              ?>
            </div>
            
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
    
      <!-- Column -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body pa-30">
            <div class="d-flex " style="justify-content: center; align-items:center;">
              <div style="margin-right: 20px;">
                <i class="fa fa-database fa-3x" style="color: #E78A1A;"></i>
              </div>
              <div>
                <h6 class=" mb-0 text-uppercase" style="text-align: center; color:white;">Pending withdrawal</h6>
              </div>
            </div>

            <div class=""  style="margin-left: 60px; padding-top: 20px;">
              <h3 style="font-size: 50px;">3</h3>
              <?php 
                // $pending_deposit = 0.00; 
                // $approved_deposit = 0.00;
                // $userid = $_SESSION['user']['userid'];
                // $query = "SELECT * FROM deposit WHERE userid = $userid ORDER BY deposit_id ASC";
                // $result = mysqli_query($con, $query);

                // if (mysqli_num_rows($result) > 0) {
                //   foreach($result as $row) {
                    
                    
                //   }
                //   $pending_deposit += $row['amt_deposited'];
                // }
              ?>
              <!-- <h2 class="mb-2" style="font-size: 32px;">$ <?php 
              // echo $approved_deposit
                ?></h2> -->
              <!-- <p class="mb-4" style="font-size: 20px;">$ <?php  
              // echo $pending_deposit 
              // ?> <sup style="color: red;">*pending</sup></p> -->
            </div>
            
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
   
      <!-- Column -->
      <div class="col-lg-6 col-md-12">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body pa-30">
            <div class="d-flex " style="justify-content: center; align-items:center;">
              <div style="margin-right: 20px;">
                <i class="fa fa-history fa-3x" style="color: #E78A1A;"></i>
              </div>
              <div>
                <h6 class=" mb-0 text-uppercase" style="text-align: center; color:white;">Total Amount Deposited</h6>
              </div>
            </div>

            <div class=""  style="margin-left: 60px; padding-top: 20px;">
              <?php 
                $query = "SELECT * FROM deposit";
                $result = mysqli_query($con, $query);

                $count = mysqli_num_rows($result);
                $total_deposit = 0.00;
                foreach ($result as $row) {
                  $total_deposit += $row['amt_deposited'];
                }
                  
                  ?>
                  <h3 style="font-size: 50px;"><?php echo "$". $total_deposit; ?></h3>
                  <?php
              ?>
            </div>
            
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
    
      <!-- Column -->
      <div class="col-lg-6 col-md-12">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body pa-30">
            <div class="d-flex " style="justify-content: center; align-items:center;">
              <div style="margin-right: 20px;">
                <i class="fa fa-history fa-3x" style="color: #E78A1A;"></i>
              </div>
              <div>
                <h6 class=" mb-0 text-uppercase" style="text-align: center; color:white;">Total Amount Withdrawn</h6>
              </div>
            </div>

            <div class=""  style="margin-left: 60px; padding-top: 20px;">
              <h3 style="font-size: 50px;">3</h3>
              <?php 
                // $pending_deposit = 0.00; 
                // $approved_deposit = 0.00;
                // $userid = $_SESSION['user']['userid'];
                // $query = "SELECT * FROM deposit WHERE userid = $userid ORDER BY deposit_id ASC";
                // $result = mysqli_query($con, $query);

                // if (mysqli_num_rows($result) > 0) {
                //   foreach($result as $row) {
                    
                    
                //   }
                //   $pending_deposit += $row['amt_deposited'];
                // }
              ?>
              <!-- <h2 class="mb-2" style="font-size: 32px;">$ <?php 
              // echo $approved_deposit
                ?></h2> -->
              <!-- <p class="mb-4" style="font-size: 20px;">$ <?php  
              // echo $pending_deposit 
              // ?> <sup style="color: red;">*pending</sup></p> -->
            </div>
            
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
     

     

    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- BTC live chart -->
    <!-- ============================================================== -->
    <div class="row">

      <!-- Crypto prices Starts -->
      <!-- <div style="height:610px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38; padding: 0px; margin: auto; width: 98%;"><div style="height:590px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=9&pref_coin_id=1505&graph=yes" width="100%" height="586px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div> -->

        
      <!-- <script src="https://crypto.com/price/static/widget/index.js"></script>
      <div
        id="crypto-widget-CoinList"
        data-transparent="true"
        data-theme="dark"
        data-design="classic"
        data-coin-ids="1,166,136,1694,1120,2,382,2283">
      </div> -->
      <!-- Crypto prices Ends -->
      
    </div>
   
    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>
    
