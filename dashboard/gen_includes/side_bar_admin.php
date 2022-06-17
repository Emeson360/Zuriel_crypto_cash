  <!-- Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav" style="background-color: #111;">
        <ul id="sidebarnav" style="padding-top: 30px;">
          <li><a href="../admin/home.php"><i class="fa fa-dashboard" style="margin-right: 10px;"></i><span class="hide-menu"> Dashboard</span></a></li>
          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-people-arrows mr-10"></i><span class="hide-menu">Users Management</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="../admin/users.php">Users</a></li>
              <li><a href="../admin/manage_users.php">Manage Users</a></li>
            </ul>
          </li>
          <li><a href="../admin/users_deposit.php"><i class="fa fa-save" style="margin-right: 10px;"></i><span class="hide-menu"> Users Deposit</span></a></li>
          <li><a href="../admin/users_investment.php"><i class="fa fa-bank" style="margin-right: 10px;"></i>Users Investment</a></li>
          <li><a href="../admin/users_withdrawal.php"><i class="fa fa-money-bill-transfer" style="margin-right: 10px;"></i><span class="hide-menu"> Users withdrawal</span></a></li>
          <li><a href="../admin/add_wallet.php"><i class="fa fa-plus" style="margin-right: 10px;"></i><span class="hide-menu"> Add Wallet</span></a></li>
          <li><a href="../admin/profile.php"><i class="fa fa-circle-user" style="margin-right: 10px;"></i><span class="hide-menu"> My Profile</span></a></li>
          
          
         
          <!-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings mr-10"></i><span class="hide-menu">Manage Packages</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="app-calendar.html">Calendar</a></li>
              <li><a href="app-contact.html">Contact / Employee</a></li>
              <li><a href="app-chat.html">Chat app</a></li>
              <li><a href="app-contact2.html">Contact Grid</a></li>
              <li><a href="app-ticket.html">Support Ticket</a></li>
              <li><a href="app-contact-detail.html">Contact Detail</a></li>
            </ul>
          </li>

          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings mr-10"></i><span class="hide-menu">Send Message and Mail</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="app-calendar.html">Calendar</a></li>
              <li><a href="app-contact.html">Contact / Employee</a></li>
              <li><a href="app-chat.html">Chat app</a></li>
              <li><a href="app-contact2.html">Contact Grid</a></li>
              <li><a href="app-ticket.html">Support Ticket</a></li>
              <li><a href="app-contact-detail.html">Contact Detail</a></li>
            </ul>
          </li> -->

          <li>
          <?php if (isset($_SESSION['user'])) : ?>

            <a href="../admin/home.php?logout='1'">

          <?php endif ?>  
            
          <i class="fa fa-door-open" style="margin-right: 10px;"></i><span class="hide-menu"> Log Out</span></a></li>
          
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!-- ============================================================== -->
  <!-- End Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->