

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
      <!-- Column Wallet balance-->
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
                      $wallet_balance += $row['total_balance'];
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
      <!-- Column Wallet balance end-->

      <!-- Column Investment -->
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
                  if (mysqli_num_rows($result)) {
                    foreach($result as $row) {
                      $investment_balance += $row['amt_invested'];
                    }

                    $start_date = $row['date'];
                    $end_date = $row['end_date'];
                    if ($start_date > $end_date) {
                      $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)) {
                        foreach ($result as $row) {
                          
                        }
                        $wallet_balance = $row['total_balance'];
                        $new_wallet_balance = $wallet_balance + $investment_balance;
                        $investment_balance = 0.00;

                        $query = "UPDATE wallet_balance SET total_balance = '$new_wallet_balance' WHERE userid = $userid";
                        $result = mysqli_query($con, $query);
                      }
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
      <!-- Column Investment end-->

      <!-- Column Earning -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-30 no-block mb-4" style="justify-content: space-between;">
              <div class="align-slef-center">
                <?php
                  $earning = 0.00; 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM investment WHERE userid = $userid";
                  $result = mysqli_query($con, $query);
                  if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) {
                      $earning += $row['earning'];
                    }
                    
                    if ($start_date >= $end_date) {
                      $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)) {
                        foreach ($result as $row) {
                          
                        }
                        $wallet_balance = $row['total_balance'];
                        $new_wallet_balance = $wallet_balance + $earning;
                        $earning = 0.00;

                        $query = "UPDATE wallet_balance SET total_balance = '$new_wallet_balance' WHERE userid = $userid";
                        $result = mysqli_query($con, $query);
                      }
                    }
                  }

                ?>
                <h2 class="mb-4">$ <?php echo number_format("$earning", 2); ?></h2>
                
              </div>
              <div class="dashImg">
                <img src="../../images/icons/orange/cost-efficiency.png" width="100%" alt="">
              </div>
            </div>
            <div>
              <h6 class="text-muted mt-2 text-uppercase" style="text-align: center;">EARNING</h6>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column Earning end-->

      <!-- Column Withdrawal -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-30 no-block" style="justify-content: space-between;">
            <div class="align-slef-center" >
              <?php 
                $pending_withdrawal = 0.00; 
                $amt_withdrawn = 0.00;
                $userid = $_SESSION['user']['userid'];

                $query_wallet = "SELECT * FROM withdrawal WHERE userid = $userid ORDER BY withdrawal_id ASC";

                $result = mysqli_query($con, $query_wallet);
                if (mysqli_num_rows($result) > 0) {
                  foreach($result as $row) {
                    $amt_withdrawn += $row['amt_withdrawn'];
                  }

                  if ($row['status'] == 'confirmed') {
                    $pending_withdrawal = 0.00;
                  }
                  else {
                    $pending_withdrawal += $row['amt_deposited'];
                  }
                }

             

                
                  
                    
                
              ?>
              <h2 class="mb-2" style="font-size: 32px;">$ <?php echo $amt_withdrawn ?></h2>
              <p class="mb-4" style="font-size: 20px;">$ <?php echo $pending_withdrawal ?> <sup style="color: red;">*pending</sup></p>
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
      <!-- Column Withdrawal end-->

      <!-- Column Crypto converter -->
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

      <!-- Crypto prices Starts -->
      <div style="height:610px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38; padding: 0px; margin: auto; width: 98%;"><div style="height:590px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=9&pref_coin_id=1505&graph=yes" width="100%" height="586px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
      <!-- Crypto prices Ends -->
      
    </div>

    <div class="row mt-20">
      
      <div style="height:560px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: auto; width: 98%;"><div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>

    </div>
   
    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>
    
