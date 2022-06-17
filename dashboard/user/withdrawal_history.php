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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Withdrawal History</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="card">
      <div class="card-header">
        <div style="float: left;">
          <h4 class="card-title">Withdrawal history</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive mt-10">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="font-weight: 700;">S/N</th>
                <th style="font-weight: 700;">Amount withdrawn</th>
                <th style="font-weight: 700;">Status</th>
                <th style="font-weight: 700;">Date of withdrawal</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $userid = $_SESSION['user']['userid'];
                $query = "SELECT * FROM withdrawal WHERE userid = $userid";
                $result = mysqli_query($con, $query);
                
                $sn = 1;

                if (mysqli_num_rows($result) > 0) {
                  foreach($result as $row) {
                    
                    ?>
                    
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $row['amt_withdrawn']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      <td><?php echo $row['date']; ?></td>
                    </tr>
                    
                    <?php
                  }
                }
                else {
                  ?>
                  <tr>
                    <td>No record found</td>
                  </tr>
                  <?php
                }
              ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

      






    
    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>