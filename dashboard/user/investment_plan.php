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

    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Basic plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">10% weekly</h3>
                <a href="#" class="btn btn-primary">Invest</a>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $500</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $10000</p>
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
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Standard plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">12% weekly</h3>
                <a href="#" class="btn btn-primary">Invest</a>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $10000</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $25000</p>
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
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Diamond plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">15% weekly</h3>
                <a href="#" class="btn btn-primary">Invest</a>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $25000</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $50000</p>
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
            <div class="pa-10 no-block">
              <p class="mb-2" style="font-size: 20px; font-weight: 600;">Premium plan</p>
              <div class="d-flex mb-2 mt-2" style="justify-content: space-between;">
                <h3 class="mb-2" style="font-size: 30px;">17% weekly</h3>
                <a href="#" class="btn btn-primary">Invest</a>
              </div>
              <p class="mb-2" style="font-size: 13px;">min-deposit $50000</p>
              <p class="mb-2" style="font-size: 13px;">max-deposit $100000 and above</p>
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





    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>