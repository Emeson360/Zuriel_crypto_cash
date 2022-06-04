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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Users</li>
          </ol>
        </div>
      </div>
    </div>
			


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
              <h4 class="card-title">Registered users</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive mt-10">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="font-weight: 700;">S/N</th>
                    <th style="font-weight: 700;">Name</th>
                    <th style="font-weight: 700;">Email</th>
                    <th style="font-weight: 700;">Phone Number</th>
                    <th style="font-weight: 700;">Country</th>
                    <th style="font-weight: 700;">Role</th>
                    <th style="font-weight: 700;">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                      $sn = 1;
                      foreach($result as $row) {
                        
                        ?>
                        
                        <tr>
                          <td><?php echo $sn++; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['phone']; ?></td>
                          <td><?php echo $row['country']; ?></td>
                          <td><?php echo $row['usertype']; ?></td>
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
      </div>
    </div>

              





		<?php include('../gen_includes/footer_script.php'); ?>

		<script>
			$(document).ready(function () {
				$('.email_id').keyup(function(e) {
					var email = $('.email_id').val();
					// console.log(email);
					
					$.ajax({
						type: "POST",
						url: "../../connect.php",
						data: {
							'check_Emailbtn':1,
							'email':email,
						},
						dataType: "",
						success: function(response) {
							// console.log(response);
							$('.email_error').text(response)
						}
					})
				});

			});
		</script>


<?php include('../gen_includes/footer.php'); ?>