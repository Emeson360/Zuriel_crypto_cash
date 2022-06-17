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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Request Withdrawal</li>
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
      <div class="col-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <div style="float: left;">
              <h4 class="card-title">Request Withdrawal</h4>
            </div>
          </div>
          <div class="card-body">
            <p class="mb-30" style="font-size: 20px;">Enter the amount you wish to request for in USD. Your withdrawal will be processed.</p>
            <div class="balance mt-40 mb-40" style="background-color: #C27414; text-align:center; padding: 20px; border-radius: 10px;">
              <?php
                $userid = $_SESSION['user']['userid'];
                $query = "SELECT * FROM wallet_balance WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)) {
                  foreach ($result as $row) {

                  }
                  $total_balance = $row['total_balance'];
                }
              ?>
              <span style="font-size: 30px"><i class="fa fa-list-squares"></i> Withdrawable Balance: </span> <h1 style="display: inline"><?php echo "$ " .$total_balance ?></h1>
            </div>

            <form action="../../connect.php" method="POST">
              <div class="form-group" style="text-align: center;">
                <span style="background-color: #B36B13; padding:10px; margin-right: 5px;">$: </span>
                <input type="text" name="amt_withdrawn" class="form-control" style="width: 50%; padding: 10px; background-color: #1D1D1D;" placeholder="0.00" >
              </div>
              <button style="display: block; width: 40%; margin: auto" type="submit" name="req_btc" class="btn btn-primary mb-20">Request BTC Withdrawal</button>
              <button style="display: block; width: 40%; margin: auto" type="submit" name="req_eth" class="btn btn-primary mb-20">Request ETH Withdrawal</button>
              <button style="display: block; width: 40%; margin: auto" type="submit" name="req_busd" class="btn btn-primary mb-20">Request BUSD Withdrawal</button>
              <button style="display: block; width: 40%; margin: auto" type="submit" name="req_usdt" class="btn btn-primary mb-20">Request USDT Withdrawal</button>
            </form>

            

          </div>
        </div>
      </div>
    </div>
   







    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>
