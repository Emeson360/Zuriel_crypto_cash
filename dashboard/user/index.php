

<?php 
include('../../connect.php');
include('../gen_includes/header.php');
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
            <li class="breadcrumb-item" style="display: flex; align-items:center;"><a href="../user/index.php">Home</a></li>
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
    <?php include('../gen_includes/message/status_msg.php') ?>

    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-30 no-block" style="justify-content: space-between;">
              <div class="align-slef-center" >
                <?php 
                  $pending_deposit = 0.00; 
                  $wallet_balance = 0.00;
                  $userid = $_SESSION['user']['userid'];

                  $query_wallet = "SELECT * FROM wallet_balance WHERE userid = $userid ORDER BY wallet_balance_id ASC";

                  $result = mysqli_query($con, $query_wallet);
                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      $wallet_balance += $row['amt_deposited'];
                    }
                    
                  }

                  $query = "SELECT * FROM deposit WHERE userid = $userid ORDER BY deposit_id ASC";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                    }
                    if ($row['status'] == 'confirmed') {
                      $pending_balance = 0.00;
                    }
                    else {
                      $pending_deposit += $row['amt_deposited'];
                    }
                     
                  }
                ?>
                <h2 class="mb-2" style="font-size: 32px;">$ <?php echo $wallet_balance ?></h2>
                <p class="mb-4" style="font-size: 20px;">$ <?php echo $pending_deposit ?> <sup style="color: red;">*pending</sup></p>
              </div>
              <div class="dashImg">
                <img src="../../images/icons/orange/download-bitcoin.png" width="100%" alt="">
              </div>
            </div>
            <div>
              <h6 class="text-muted mb-0 text-uppercase" style="text-align: center;">WALLET BALANCE</h6>
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
          <div class="card-body">
            <div class="d-flex pa-30 no-block mb-4" style="justify-content: space-between;">
              <div class="align-slef-center" >
                <?php 
                  $investment_balance = 0.00; 
                  $userid = $_SESSION['user']['userid'];

                  $query = "SELECT * FROM investment WHERE userid = $userid ";
                  $result = mysqli_query($con, $query);
                  if ($result) {
                    foreach($result as $row) {
                      $investment_balance += $row['amt_invested'];
                    }
                  }

                ?>
                <h2 class="mb-4">$ <?php echo $investment_balance; ?></h2>
              </div>
              <div class="dashImg">
                <img src="../../images/icons/orange/add-bitcoins.png" width="100%" alt="">
              </div>
            </div>
            <div>
              <h6 class="text-muted mt-2 text-uppercase" style="text-align: center;">INVESTMENT</h6>
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
          <div class="card-body">
            <div class="d-flex pa-30 no-block">
              <div class="align-slef-center" style="margin: auto;">
                <?php
                  $earning = 0.00; 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM investment WHERE userid = $userid";
                  $result = mysqli_query($con, $query);
                  if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) {
                      
                    }
                    $plan = $row['plan'];
                    $amt_invested = $row['amt_invested'];
                    if ($plan == 'basic_plan') {
                      $earning = ($amt_invested * 1 * 10)/(52 * 100);
                    }
                  
                    if ($plan == 'standard_plan') {
                      $earning = ($amt_invested * 1 * 12)/(52 * 100);
                    }
                  
                    if ($plan == 'diamond_plan') {
                      $earning = ($amt_invested * 1 * 15)/(52 * 100);
                    }
                  
                    if ($plan == 'premuim_plan') {
                      $earning = ($amt_invested * 1 * 17)/(52 * 100);
                    }
                  }

                ?>
                <h2 class="mb-2">$ <?php echo number_format("$earning", 4); ?></h2>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
              </div>
              <div class="dashImg">
                <img src="../../images/icons/orange/cost-efficiency.png" width="100%" alt="">
              </div>
            </div>
            <div>
              <h6 class="text-muted mb-0 text-uppercase" style="text-align: center;">EARNING</h6>
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
          <div class="card-body">
            <div class="d-flex pa-30 no-block">
              <div class="align-slef-center" style="margin: auto;">
                <h2 class="mb-2">$ 0.00</h2>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
              </div>
              <div class="dashImg">
                <img src="../../images/icons/orange/payment-options.png" width="100%" alt="">
              </div>
            </div>
            <div>
              <h6 class="text-muted mb-0 text-uppercase" style="text-align: center;">WITHDRAWAL</h6>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->

      <!-- Column -->
      <div class="col-lg-8 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <!-- Crypto Converter ⚡ Widget -->
            <div class="" style="width: 100%;">
            <!-- <p>Crypto Calculator</p> -->
            <crypto-converter-widget shadow symbol live background-color="#9D5F11" border-radius="0.60rem" fiat="united-states-dollar" crypto="bitcoin" amount="1" decimal-places="2"></crypto-converter-widget><script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script>
            </div>
          
            <!-- /Crypto Converter ⚡ Widget -->
          </div>
        </div>
      </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- BTC live chart -->
    <!-- ============================================================== -->
    <div class="row">

      <!-- Chart Starts -->
      <div class="col-md-8 bg-grey-chart">
                        <div class="chart-widget dark-chart chart-1">
                            <div>
                                <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                            </div>
                        </div>
						<div class="chart-widget light-chart chart-2">
                            <div>
                                <div class="btcwdgt-chart" bw-theme="light"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Ends -->
      
      
    </div>
   
    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>
    
