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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Pending deposit</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <?php include('../gen_includes/message/status_msg.php') ?>

    <div class="row">
      <div class="col-12 col-md-12">
        <?php
					if (isset($_SESSION['status'])) {
						echo "<h4>" . $_SESSION['status']. "</h4>";
            unset($_SESSION['status']);
					}		
        ?>
        <div class="card">
          <div class="card-header">
            <div style="float: left;">
              <h4 class="card-title">Pending deposit</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive mt-10">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="font-weight: 700;">S/N</th>
                    <th style="font-weight: 700;">Name</th>
                    <th style="font-weight: 700;">Amount deposited</th>
                    <th style="font-weight: 700;">Transaction Ref</th>
                    <th style="font-weight: 700;">Status</th>
                    <th style="font-weight: 700;">Date</th>
                    <th style="font-weight: 700;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $query = "SELECT deposit.userid, deposit.amt_deposited, deposit.transaction_reference, deposit.status, deposit.date, users.name FROM deposit INNER JOIN users ON deposit.userid = users.userid";
                    $result = mysqli_query($con, $query);
                    
                    if (mysqli_num_rows($result) > 0) {
                      $sn = 1;
                      foreach($result as $row) {
                        
                        ?>
                        
                        <tr>
                          <td><?php echo $sn++; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['amt_deposited']; ?></td>
                          <td><?php echo $row['transaction_reference']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                          <td><?php echo $row['date']; ?></td>
                          <td>
                            <form action="../../connect.php" method="POST">
                              <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                            <button type="submit" name="approve"  class="btn btn-primary"  >Approve</button>
                            </form>
                          </td>
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
      </div>
    </div>




    <?php include('../gen_includes/footer_script.php'); ?>
  
<?php include('../gen_includes/footer.php'); ?>