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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Investment Plans</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <?php include('../gen_includes/message/status_msg.php') ?>

    <!-- Basic plan investment -->
		<!-- Modal -->
		<div class="modal fade" id="basic_plan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Basic Plan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<!-- Form Starts -->
					<form action="../../connect.php" method="POST">

            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Min Deposit: $500</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Max Deposit: $10,000</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Profit%: 10% Weekly</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Available/Investable Amount: </p>
            <?php 
              $balance = 0.00;
              $userid = $_SESSION['user']['userid'];
              $query = "SELECT * FROM wallet_balance where userid = $userid";
              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {

                }
                $balance = $row['total_balance'];
                $_SESSION['balance'] = $balance;
              }
            ?>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black; color:green;">$ <?php echo $balance; ?></p>

						<div class="modal-body">
	 						<input type="text" name="amt_invested" placeholder="Amount to be invested">
              <?php
                $userid = $_SESSION['user']['userid'];
              ?>
	 						<input type="hidden" name="userid" value="<?php echo $userid ?>">
						</div>
						<!-- Input Field Ends -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="basic_plan" class="btn btn-primary">Invest</button>
						</div>

					</form>
					<!-- Form Ends -->
					
				</div>
			</div>
		</div>
    <!-- End Basic plan investment Modal -->

    <!-- Standard plan investment -->
		<!-- Modal -->
		<div class="modal fade" id="standard_plan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Standard Plan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<!-- Form Starts -->
					<form action="../../connect.php" method="POST">

            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Min Deposit: $10,000</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Max Deposit: $25,000</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Profit%: 12% Weekly</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Available/Investable Amount: </p>
            <?php 
              $balance = 0.00;
              $userid = $_SESSION['user']['userid'];
              $query = "SELECT * FROM wallet_balance where userid = $userid";
              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {

                }
                $balance = $row['total_balance'];
                $_SESSION['balance'] = $balance;
              }
            ?>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black; color:green;">$ <?php echo $balance; ?></p>

						<div class="modal-body">
	 						<input type="text" name="amt_invested" placeholder="Amount to be invested">
              <?php
                $userid = $_SESSION['user']['userid'];
              ?>
	 						<input type="hidden" name="userid" value="<?php echo $userid ?>">
						</div>
						<!-- Input Field Ends -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="standard_plan" class="btn btn-primary">Invest</button>
						</div>
							
							

					</form>
					<!-- Form Ends -->
				</div>
			</div>
		</div>
    <!-- End standard investment Modal -->

    <!-- Diamond plan investment -->
		<!-- Modal -->
		<div class="modal fade" id="diamond_plan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Diamond Plan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<!-- Form Starts -->
					<form action="../../connect.php" method="POST">

            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Min Deposit: $25,000</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Max Deposit: $50,000</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Profit%: 15% Weekly</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Available/Investable Amount: </p>
            <?php 
              $balance = 0.00;
              $userid = $_SESSION['user']['userid'];
              $query = "SELECT * FROM wallet_balance where userid = $userid";
              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {

                }
                $balance = $row['total_balance'];
                $_SESSION['balance'] = $balance;
              }
            ?>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black; color:green;">$ <?php echo $balance; ?></p>

						<div class="modal-body">
	 						<input type="text" name="amt_invested" placeholder="Amount to be invested">
              <?php
                $userid = $_SESSION['user']['userid'];
              ?>
	 						<input type="hidden" name="userid" value="<?php echo $userid ?>">
						</div>
						<!-- Input Field Ends -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="diamond_plan" class="btn btn-primary">Invest</button>
						</div>		

					</form>
					<!-- Form Ends -->
					
				</div>
			</div>
		</div>
    <!-- End Diamond investment Modal -->

    <!-- Premium plan investment -->
		<!-- Modal -->
		<div class="modal fade" id="premium_plan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Premium Plan</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<!-- Form Starts -->
					<form action="../../connect.php" method="POST">

            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Min Deposit: $50,000</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Max Deposit: $100,000 and above</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Profit%: 17% Weekly</p>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black;">Available/Investable Amount: </p>
            <?php 
              $balance = 0.00;
              $userid = $_SESSION['user']['userid'];
              $query = "SELECT * FROM wallet_balance where userid = $userid";
              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {

                }
                $balance = $row['total_balance'];
                $_SESSION['balance'] = $balance;
              }
            ?>
            <p class="mb-2 ml-20" style="font-size: 16px; color: black; color:green;">$ <?php echo $balance; ?></p>

						<div class="modal-body">
	 						<input type="text" name="amt_invested" placeholder="Amount to be invested">
              <?php
                $userid = $_SESSION['user']['userid'];
              ?>
	 						<input type="hidden" name="userid" value="<?php echo $userid ?>">
						</div>
						<!-- Input Field Ends -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="premium_plan" class="btn btn-primary">Invest</button>
						</div>
							
							

					</form>
					<!-- Form Ends -->

					
				</div>
			</div>
		</div>
    <!-- End Premium investment Modal -->



    <div class="row">
      <!-- Column basic plan -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Basic plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">10% weekly</h3>
                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#basic_plan_modal">Invest</button>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $500</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $10,000</p>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
      <!-- Column standard plan -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Standard plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">12% weekly</h3>
                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#standard_plan_modal">Invest</button>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $10,000</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $25,000</p>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column diamond plan end-->
      <!-- Column -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Diamond plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">15% weekly</h3>
                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#diamond_plan_modal">Invest</button>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $25,000</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $50,000</p>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
      <!-- Column premium plan -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Premium plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">17% weekly</h3>
                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#premium_plan_modal">Invest</button>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $50,000</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $100,000 and above</p>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->

      <!-- Column crypto converter -->
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





    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>