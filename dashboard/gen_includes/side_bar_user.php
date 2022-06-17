  <!-- Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav" style="background-color: #111;">
        <ul id="sidebarnav" style="padding-top: 30px;">
          <li><a  href="../user/home.php"><i class="fa fa-dashboard" style="margin-right: 10px;"></i><apan class="hide-menu"> Dashboard</apan></a></li>
          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-circle-user mr-10"></i><span class="hide-menu">My Profile</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="../user/update_account.php">Update Account</a></li>
              <li><a href="../user/wallet_details.php">Wallet Details</a></li>
            </ul>
          </li>
          
          <li><a href="../user/make_deposit.php"><i class="fa fa-money-bill-1-wave mr-10"></i>Deposit</a></li>
          <li><a href="../user/deposite_history.php"><i class="fa fa-history mr-10"></i>Deposit History</a></li>
          <li><a href="../user/investment_plan.php"><i class="fa fa-bank" style="margin-right: 10px;"></i><apan class="hide-menu"> Investment plans</apan></a></li>
          <li><a href="../user/investment_history.php"><i class="fa fa-history" style="margin-right: 10px;"></i><apan class="hide-menu"> Investment history</apan></a></li>
          <li><a href="../user/add_wallet.php"><i class="fa fa-plus" style="margin-right: 10px;"></i><apan class="hide-menu"> Add Wallet</apan></a></li>
          
          <li><a href="../user/request_withdrawal.php"><i class="fa fa-money-bill-transfer" style="margin-right: 10px;"></i><apan class="hide-menu"> Request withdrawal</apan></a></li>
          <li><a href="../user/withdrawal_history.php"><i class="fa fa-history" style="margin-right: 10px;"></i><apan class="hide-menu"> withdrawal history</apan></a></li>
          <li><a href="../user/refer_a_friend.php"><i class="fa fa-layer-group" style="margin-right: 10px;"></i><apan class="hide-menu"> Refer a friend</apan></a></li>
          <li>
          <?php if (isset($_SESSION['user'])) : ?>

          <a href="../user/home.php?logout='1'">

          <?php endif ?>   
          <i class="fa fa-door-open" style="margin-right: 10px;"></i><span class="hide-menu"> Log out</span></a></li>

          
          
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!-- ============================================================== -->
  <!-- End Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->