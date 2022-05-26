

<?php 
include('../../connect.php');
include('../gen_includes/header.php');
include('../gen_includes/top_bar_user.php');
include('../gen_includes/side_bar_user.php');




?>






<!-- Page wrapper  -->
<div class="page-wrapper" style="background-color: #1d1d1d;">
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
            <li class="breadcrumb-item"><a href="../user/index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
    <div class="row">
      <!-- Column -->
      <div class="col-lg-3 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-10 no-block">
              <div class="align-slef-center" style="margin: auto;">
                <h2 class="mb-2">$ 0.00</h2>
                <p class="mb-4">$ 0.00 <sup style="color: red;">*pending</sup></p>
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
      <div class="col-lg-3 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-10 no-block">
              <div class="align-slef-center" style="margin: auto;">
                <h2 class="mb-2">$ 0.00</h2>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                
              </div>

            </div>
            <div>
              <h6 class="text-muted mb-0 text-uppercase" style="text-align: center;">INVESTMENT</h6>
            </div>
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary w-70-p h-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">50% Complete</span></div>
          </div>
        </div>
      </div>
      <!-- Column end-->
      <!-- Column -->
      <div class="col-lg-3 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-10 no-block">
              <div class="align-slef-center" style="margin: auto;">
                <h2 class="mb-2">$ 0.00</h2>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                
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
      <div class="col-lg-3 col-md-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex pa-10 no-block">
              <div class="align-slef-center" style="margin: auto;">
                <h2 class="mb-2">$ 0.00</h2>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                <p class="mb-0" style="color: #111;">$ 0.00 </p>
                
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
   
<?php 

include('../gen_includes/footer.php')

?>
    
