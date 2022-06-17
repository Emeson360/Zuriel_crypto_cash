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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Make Deposit</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->



    <!-- Row -->
    <div class="row d-flex" style="justify-content: center;">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-30">
        <div class="row">
          <?php include('../gen_includes/message/status_msg.php') ?>
        </div>
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

            <!-- Crypto Converter ⚡ Widget -->
            <div class="row mt-30" style="width: 40%;">
              <p>Crypto Calculator</p>
              <crypto-converter-widget shadow symbol live background-color="#9D5F11" border-radius="0.60rem" fiat="united-states-dollar" crypto="bitcoin" amount="1" decimal-places="2"></crypto-converter-widget><script async src="https://cdn.jsdelivr.net/gh/dejurin/crypto-converter-widget@1.5.2/dist/latest.min.js"></script>
            </div>
            
            <!-- /Crypto Converter ⚡ Widget -->

            <form action="../../connect.php" method="POST">
              <div class="form-group mt-50">
                <input type="text" name="amt_deposited" class="form-control pa-10 form-control-line" placeholder="$500" style="background-color: #1d1d1d;">
              </div>
              <button type="submit" name="next" class="btn btn-primary">NEXT</a>
            </form>
          </div>
        </div>
        <!-- Card -->
      </div>
      </div>
      <!-- End Row -->

    
    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>