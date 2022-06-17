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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Referral</li>
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


    <div class="pt-20 bg-dark rounded pb-20">
      <h3 class="pl-20">Referral Details</h3>
      <!-- Referral code -->
      <div class="mt-40 mb-40 m-auto d-flex" style="background-color: #C27414; width: 80%; padding: 20px; border-radius: 10px; justify-content: space-between;">
        <?php
          $referral_code = $_SESSION['user']['referral_code'];
        ?>
        <div>
          <span style="font-size: 26px">Referral code: </span> <span id="ref_code" style="font-size: 24px;"><?php echo $referral_code ?></span>
        </div>
        <div>
          <button class="btn btn-primary btn-sm ml-60" type="button" onclick="copy_to_clipboard('#ref_code')">Copy referral code</button>
        </div>
      </div>

      <!-- Referral Link -->
      <div class="mt-40 mb-40 m-auto d-flex" style="background-color: #C27414; width: 80%; padding: 20px; border-radius: 10px; justify-content: space-between;">
        <?php
          $referral_code = $_SESSION['user']['referral_code'];
        ?>
        <div>
          <span style="font-size: 26px">Referral link: </span> <span id="ref_link" style="font-size: 18px;"><a href="/zurielcryptocash/register.php?referral_code=<?php echo $referral_code ?>">localhost/zurielcryptocash/register.php?referral_code=<?php echo $referral_code ?></a></span>
        </div>
        <div>
          <button class="btn btn-primary btn-sm ml-40" type="button" onclick="copy_to_clipboard('#ref_link')">Copy referral link</button>
        </div>
      </div>

      <!-- referral bonus -->
      <div class="mt-40 mb-40 m-auto" style="background-color: #C27414; width: 80%; padding: 20px; border-radius: 10px;">
        <?php
          $referral_code = $_SESSION['user']['referral_code'];
        ?>
        <span style="font-size: 30px">Referral bonus: </span> <span style="display: inline"><?php echo $referral_code ?></span>
      </div>

      <!-- Number of referred users -->
      <div class="mt-40 mb-40 m-auto" style="background-color: #C27414; width: 80%; padding: 20px; border-radius: 10px;">
        <?php
          $query = "SELECT * FROM users WHERE referrer = '$referral_code'";
          $result = mysqli_query($con, $query);
          $number_of_referred_users = mysqli_num_rows($result);
        ?>
        <span style="font-size: 30px">Number of referred users: </span> <span style="font-size: 26px"><b><?php echo $number_of_referred_users ?></b></span>
      </div>

    </div>



    <script>
      function copy_to_clipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
      }
    </script>



    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>