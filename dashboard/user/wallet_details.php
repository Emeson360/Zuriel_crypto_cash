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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Wallet Details</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <?php include('../gen_includes/message/status_msg.php') ?>


    <!-- Edit BTC wallet -->
    <!-- Modal -->
    <div class="modal fade" id="edit_btc_wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Btc Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Form Starts -->
          <form action="../../connect.php" method="POST">
          
            <div class="modal-body">
              <p>Edit your Btc wallet address</p>
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM btc_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group">
                      <input class="form-control form-control-line" style="width: 100%;" type="text" name="btc_wallet_address" value="<?php echo $row['btc_wallet_address'] ?>" >
                      </div>
                      <?php
                    }
                  }
                  
                ?>
              <?php endif ?>
             
            </div>
            <!-- Input Field Ends -->

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="edit_btc_wallet" class="btn btn-primary">Save</button>
            </div>
              
          </form>
          <!-- Form Ends -->

        </div>
      </div>
    </div>

    <!-- Edit ETH wallet -->
    <!-- Modal -->
    <div class="modal fade" id="edit_eth_wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Eth Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Form Starts -->
          <form action="../../connect.php" method="POST">
          
            <div class="modal-body">
              <p>Edit your Eth wallet address</p>
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM eth_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group">
                      <input class="form-control form-control-line" style="width: 100%;" type="text" name="eth_wallet_address" value="<?php echo $row['eth_wallet_address'] ?>" >
                      </div>
                      <?php
                    }
                  }
                  
                ?>
              <?php endif ?>
             
            </div>
            <!-- Input Field Ends -->

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="edit_eth_wallet" class="btn btn-primary">Save</button>
            </div>
              
          </form>
          <!-- Form Ends -->

        </div>
      </div>
    </div>

    <!-- Edit USDT wallet -->
    <!-- Modal -->
    <div class="modal fade" id="edit_usdt_wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Usdt Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Form Starts -->
          <form action="../../connect.php" method="POST">
          
            <div class="modal-body">
              <p>Edit your Usdt wallet address</p>
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM usdt_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group">
                      <input class="form-control form-control-line" style="width: 100%;" type="text" name="usdt_wallet_address" value="<?php echo $row['usdt_wallet_address'] ?>" >
                      </div>
                      <?php
                    }
                  }
                  
                ?>
              <?php endif ?>
             
            </div>
            <!-- Input Field Ends -->

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="edit_usdt_wallet" class="btn btn-primary">Save</button>
            </div>
              
          </form>
          <!-- Form Ends -->

        </div>
      </div>
    </div>

    <!-- Edit BUSD wallet -->
    <!-- Modal -->
    <div class="modal fade" id="edit_busd_wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Busd Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Form Starts -->
          <form action="../../connect.php" method="POST">
          
            <div class="modal-body">
              <p>Edit your Busd wallet address</p>
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM busd_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group">
                      <input class="form-control form-control-line" style="width: 100%;" type="text" name="busd_wallet_address" value="<?php echo $row['busd_wallet_address'] ?>" >
                      </div>
                      <?php
                    }
                  }
                  
                ?>
              <?php endif ?>
             
            </div>
            <!-- Input Field Ends -->

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="edit_busd_wallet" class="btn btn-primary">Save</button>
            </div>
              
          </form>
          <!-- Form Ends -->

        </div>
      </div>
    </div>

    <!-- All Wallet details -->
    <div class="row">
      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-12 col-sm-12">
        <div class="card" style="border-radius: 15px;">
          <div class="mb-10" style="background-color: #111111; padding: 20px; border-radius: 15px 15px 0px 0px;">
            <h6 style="font-size: 20px;">My Walllet Details</h6>
          </div>

          <!-- BTC wallet details -->
          <div class="pa-20">
            <h6 class="mb-20" style="font-size: 16px;">My Btc wallet</h6>
            <div class="row">
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM btc_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group col-lg-8 col-md-8 col-sm-8">
                      <input class="form-control " style="width: 100%;" type="text" name="btc_wallet_address" value="<?php echo $row['btc_wallet_address'] ?>" readonly>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_btc_wallet">
                          Edit
                        </button>
                      </div>


                      <?php
                    }
                  }
                  else {
                    ?>
                      <p class="text-danger"><?php echo "No Btc wallet added yet" ?></p>
                    <?php
                  }
                  
                ?>
              <?php endif ?>
              
            </div>
          </div>
          <!-- ETH wallet Details -->
          <div class="pa-20">
            <h6 class="mb-20" style="font-size: 16px;">My Eth wallet</h6>
            <div class="row">
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM eth_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group col-lg-8 col-md-8 col-sm-8">
                      <input class="form-control " style="width: 100%;" type="text" name="eth_wallet_address" value="<?php echo $row['eth_wallet_address'] ?>" readonly>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_eth_wallet">
                          Edit
                        </button>
                      </div>

                      <?php
                    }
                  }
                  else {
                    ?>
                      <p class="text-danger"><?php echo "No Eth wallet added yet" ?></p>
                    <?php
                  }
                  
                ?>
              <?php endif ?>
              
            </div>
          </div>
          <!-- USDT wallet details -->
          <div class="pa-20">
            <h6 class="mb-20" style="font-size: 16px;">My Usdt wallet</h6>
            <div class="row">
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM usdt_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group col-lg-8 col-md-8 col-sm-8">
                      <input class="form-control " style="width: 100%;" type="text" name="eth_wallet_address" value="<?php echo $row['usdt_wallet_address'] ?>" readonly>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_usdt_wallet">
                          Edit
                        </button>
                      </div>

                      <?php
                    }
                  }
                  else {
                    ?>
                      <p class="text-danger"><?php echo "No Usdt wallet added yet" ?></p>
                    <?php
                  }
                  
                ?>
              <?php endif ?>
              
            </div>
          </div>
          <!-- BUSD wallet address -->
          <div class="pa-20">
            <h6 class="mb-20" style="font-size: 16px;">My Busd wallet</h6>
            <div class="row">
              <?php if (isset($_SESSION['user'])) : ?>
                <?php 
                  $userid = $_SESSION['user']['userid'];
                  $query = "SELECT * FROM busd_wallet WHERE userid = $userid";
                  $result = mysqli_query($con, $query);

                  if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {
                      
                      ?>
                      <div class="form-group col-lg-8 col-md-8 col-sm-8">
                      <input class="form-control " style="width: 100%;" type="text" name="busd_wallet_address" value="<?php echo $row['busd_wallet_address'] ?>" readonly>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_busd_wallet">
                          Edit
                        </button>
                      </div>

                      <?php
                    }
                  }
                  else {
                    ?>
                      <p class="text-danger"><?php echo "No Usdt wallet added yet" ?></p>
                    <?php
                  }
                  
                ?>
              <?php endif ?>
              
            </div>
          </div>

        </div>
      </div>

    </div>








    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>