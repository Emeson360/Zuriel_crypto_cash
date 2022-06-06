

<?php 
include('../../connect.php');
include('../gen_includes/header.php');
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
            <li class="breadcrumb-item" style="display: flex; align-items:center;"><a href="../admin/index.php">Home</a></li>
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Add Wallet</li>
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

    <?php include('../gen_includes/message/status_msg.php') ?>


    <div class="row">
      <!-- Column -->
      <div class="col-lg-5 col-xlg-3 col-md-11 col-sm-12">
        <div class="card" style="border-radius: 15px;">
          <div class="mb-10" style="background-color: #111111; padding: 20px; border-radius: 15px 15px 0px 0px;">
            <h6 style="font-size: 20px;">Choose the wallet of your choice and add</h6>
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs profile-tab pa-10" role="tablist">
            <li class="nav-item mr-60 mb-20">
              <a class="nav-link active" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#btc" role="tab">Btc</a>
            </li>
            <li class="nav-item ml-60 mb-20">
              <a class="nav-link" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#eth" role="tab">Eth</a>
            </li>
            <li class="nav-item mr-60 mb-10">
              <a class="nav-link" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#usdt" role="tab">Usdt</a>
            </li>
            <li class="nav-item ml-60 mb-10">
              <a class="nav-link" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#busd" role="tab">Busd</a>
            </li>
          </ul>

        </div>

      </div>

      <!-- Column -->
      <div class="col-lg-6 col-xlg-9 col-md-11 col-sm-12">
        <div class="card" style="border-radius: 15px;">
        

          <!-- Tab panes -->
          <div class="tab-content pa-20">
            <div class="tab-pane active" id="btc" role="tabpanel">
              <form action="../../connect.php" method="POST">
                <h3 class="mb-30">Enter your BTC wallet address</h3>
                <p class="mb-60">Fields with <span class="text-danger">*</span> are required</p>
                <h4>BTC Wallet address <span class="text-danger">*</span></h4>
                <div class="form-group mb-60" style="width: 100%;">
                  <input type="text" name="admin_btc_wallet_address" class="form-control" placeholder="BTC wallet address" style="background-color: #1d1d1d; border-radius: 10px;">
                </div>
                <div style="width: 100%;" class="mb-40">
                  <button class="btn btn-info" type="submit" name="add_admin_btc_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update BTC wallet</button>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="eth" role="tabpanel">
              <form action="../../connect.php" method="POST">
                <h3 class="mb-30">Enter your ETH wallet address</h3>
                <p class="mb-60">Fields with <span class="text-danger">*</span> are required</p>
                <h4>ETH Wallet address <span class="text-danger">*</span></h4>
                <div class="form-group mb-60" style="width: 100%;">
                  <input type="text" name="admin_eth_wallet_address" class="form-control" placeholder="ETH wallet address" style="background-color: #1d1d1d; border-radius: 10px;">
                </div>
                <div style="width: 100%;" class="mb-40">
                  <button class="btn btn-info" type="submit" name="add_admin_eth_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update ETH wallet</button>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="usdt" role="tabpanel">
              <form action="../../connect.php" method="POST">
                <h3 class="mb-30">Enter your USDT wallet address</h3>
                <p class="mb-60">Fields with <span class="text-danger">*</span> are required</p>
                <h4>USDT Wallet address <span class="text-danger">*</span></h4>
                <div class="form-group mb-60" style="width: 100%;">
                  <input type="text" name="admin_usdt_wallet_address" class="form-control" placeholder="USDT wallet address" style="background-color: #1d1d1d; border-radius: 10px;">
                </div>
                <div style="width: 100%;" class="mb-40">
                  <button class="btn btn-info" type="submit" name="add_admin_usdt_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update USDT wallet</button>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="busd" role="tabpanel">
              <form action="../../connect.php" method="POST">
                <h3 class="mb-30">Enter your BUSD wallet address</h3>
                <p class="mb-60">Fields with <span class="text-danger">*</span> are required</p>
                <h4>BUSD Wallet address <span class="text-danger">*</span></h4>
                <div class="form-group mb-60" style="width: 100%;">
                  <input type="text" name="admin_busd_wallet_address" class="form-control" placeholder="BUSD wallet address" style="background-color: #1d1d1d; border-radius: 10px;">
                </div>
                <div style="width: 100%;" class="mb-40">
                  <button class="btn btn-info" type="submit" name="add_admin_busd_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update BUSD wallet</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- Column -->

    </div>


    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>