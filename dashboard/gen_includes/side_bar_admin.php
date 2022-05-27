  <!-- Left Sidebar - style you can find in sidebar.scss  -->
  <!-- ============================================================== -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav" style="background-color: #111;">
        <ul id="sidebarnav" style="padding-top: 30px;">
          <li><a href="../admin/index.php"><i class="fa fa-dashboard" style="margin-right: 10px;"></i><span class="hide-menu"> Dashboard</span></a></li>
          <li><a href="../admin/users_deposite.php"><i class="fa fa-money-bill" style="margin-right: 10px;"></i><span class="hide-menu"> Users Deposite</span></a></li>
          <li><a href="#"><i class="fa fa-arrow-down-short-wide" style="margin-right: 10px;"></i><span class="hide-menu"> Users withdrawal</span></a></li>
          <li><a href="#"><i class="fa fa-folder-plus" style="margin-right: 10px;"></i><span class="hide-menu"> Admin Wallet</span></a></li>
          <li><a href="#"><i class="fa fa-dashboard" style="margin-right: 10px;"></i><span class="hide-menu"> My Profile</span></a></li>
          
          <li><a href="../user/index.php"><i class="fa fa-dashboard" style="margin-right: 10px;"></i><span class="hide-menu"> Refer a friend</span></a></li>

          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings mr-10"></i><span class="hide-menu">Users Management</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="../admin/users.php">Users</a></li>
              <li><a href="../admin/manage_users.php">Manage Users</a></li>
              <li><a href="../admin/users_investment.php">Users Investment</a></li>
            </ul>
          </li>
          
          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings mr-10"></i><span class="hide-menu">Requested Transactions</span></a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="pending_deposite">Pending Deposite</a></li>
              <li><a href="withdrawal_request">withdrawal Requeste</a></li>
            </ul>
          </li>
          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings mr-10"></i><span class="hide-menu">Manage Packages</span></a>
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
          </li>

          <li>
          <?php if (isset($_SESSION['user'])) : ?>

            <a href="../admin/index.php?logout='1'">

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