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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Make Deposit</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <?php include('../gen_includes/message/status_msg.php') ?>

    <!-- Row -->
    <div class="row d-flex" style="justify-content: center;">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-30">
        <!-- Card -->
        <div class="card">
          <div class="card-header pa-20">
            <h3>You can deposit via your Btc <i class="fab fa-bitcoin" style=" color: #FFA523"></i>, Eth <i class="fab fa-ethereum" style=" color: #FFA523"></i>, Usdt <span><img src="../../images/icons/orange/usdt_icon.png" alt="" width="25px"></span> or Busd <span><img src="../../images/icons/orange/BUSD_icon.png" width="20px" alt=""></span> wallet</h3>
          </div>
          <div class="card-body">
            <h4 class="card-title mb-15 mb-50">Our minimum deposit amount is $500.00</h4>
            <p class=" mb-40" style="font-size: 18px; color: red;">Deposit may take up to 3 Mins to reflect in your account. Please exercise patience while your transaction is being processed after a successful deposit</p>

            <p style="font-size: 16px;">Email <span style="color: #FFA523;">changetozurielemail@gmail.com</span> if payment is not confirmed after 30 Mins.</p>
            <p style="font-size: 16px;">Also let us know if you need help on how to buy any crypto-coin.</p>

            <div class="d-flex" style="justify-content: center; margin-top: 100px;">
              <div class="col-lg-10 d-flex" style="justify-content: center; border-top: 1px solid #666; border-bottom: 1px solid #666">
              <div class="pa-20" style="text-align: center;">
                <h3 style="text-transform: uppercase; color: red;">Do not refresh or close this page before submiting payment</h3>
                <p style="font-size: 16px;">You must click on the PAID button below after making payment</p>
              </div>
              </div>
            </div>

            <div class="d-flex mt-40" style="justify-content: center;">
              <div class="col-lg-10">
                <p style="text-align: center;">Deposite amount:</p>
              </div>
            </div>

            <?php
              $userid = $_SESSION['user']['userid'];
              $query = "SELECT * FROM temp_deposit WHERE userid = $userid ORDER BY temp_deposit_id ASC";
              $result = mysqli_query($con, $query);

              if (mysqli_num_rows($result) > 0) {
                foreach($result as $row) {
                  
                }
                
                $amt_deposited = $row['amt_deposited'];
                $transaction_reference = $row['transaction_reference'];
                
              }
            ?>

              <div class="d-flex mt-10" style="justify-content: center;">
                <div class="col-lg-10">
                  <?php echo "<p style='text-align: center;'>". "$". $amt_deposited . "<p>" ?>
                </div>
              </div>
            
            

            <div class="d-flex mt-40" style="justify-content: center;">
              <div class="col-lg-10">
                <p style="text-align: center;">Deposite address:</p>
                <?php 
                  $query = "SELECT * FROM admin_btc_wallet";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                        <form class="form-horizontal form-material" action="">
                        <div class="form-group" style="text-align: center;">
                          <span style="background-color: #B36B13; padding:10px; margin-right: 5px;">BTC wallet address: </span>
                          <input type="text" class="form-control form-control-line" style="width: 50%;" value="<?php echo  $row['admin_btc_wallet_address']; ?>" readonly>
                        </div>
                        </form>
            
                      <?php
                    }
                  }
                ?>

                <?php 
                  $query = "SELECT * FROM admin_eth_wallet";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                        <form class="form-horizontal form-material" action="">
                        <div class="form-group" style="text-align: center;">
                          <span style="background-color: #B36B13; padding:10px; margin-right: 5px;">ETH wallet address: </span>
                          <input type="text" class="form-control form-control-line" style="width: 50%;" value="<?php echo  $row['admin_eth_wallet_address']; ?>" readonly>
                        </div>
                        </form>
            
                      <?php
                    }
                  }
                ?>
                
                <?php 
                  $query = "SELECT * FROM admin_usdt_wallet";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                        <form class="form-horizontal form-material" action="">
                        <div class="form-group" style="text-align: center;">
                          <span style="background-color: #B36B13; padding:10px; margin-right: 5px;">USDT wallet address: </span>
                          <input type="text" class="form-control form-control-line" style="width: 50%;" value="<?php echo  $row['admin_usdt_wallet_address']; ?>" readonly>
                        </div>
                        </form>
            
                      <?php
                    }
                  }
                ?>

                <?php 
                  $query = "SELECT * FROM admin_busd_wallet";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                        <form class="form-horizontal form-material" action="">
                        <div class="form-group" style="text-align: center;">
                          <span style="background-color: #B36B13; padding:10px; margin-right: 5px;">BUSD wallet address: </span>
                          <input type="text" class="form-control form-control-line" style="width: 50%;" value="<?php echo  $row['admin_busd_wallet_address']; ?>" readonly>
                        </div>
                        </form>
            
                      <?php
                    }
                  }
                ?>
              </div>
            </div>

            <div class="d-flex mt-40" style="justify-content: center;">
              <div class="col-lg-10">
                <p style="text-align: center;">Transaction reference:</p>
               

                <div class="d-flex mt-10" style="justify-content: center;">
                  <div class="col-lg-10">
                    <?php echo "<p style='text-align: center;'>". "$". $transaction_reference . "<p>" ?>
                  </div>
                </div>

                 
              </div>
            </div>
            <form action="../../connect.php" method="POST">
              <div class="d-flex mt-40" style="justify-content: center;">
                <div class="col-lg-10" style="text-align: center;">
                  <input type="checkbox" name="certify"> <span style="font-size: 18px;"> I certify that i have paid <?php echo $amt_deposited ?> worth of coin to one of the above addresses.</span>
                  
                </div>
              </div>

              <div class="d-flex mt-40" style="justify-content: center;">
                <div class="col-lg-10" style="text-align: center;">
                  <button type="submit" name="paid" class="btn btn-primary">PAID</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Card -->
      </div>
      </div>
      <!-- End Row -->

    
    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>