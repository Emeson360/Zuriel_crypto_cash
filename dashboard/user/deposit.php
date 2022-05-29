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
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Deposite</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


     <!-- Row -->
      <div class="row">
        <div class="col-12 mt-30">
          <h4 class="mb-0">Header and footer</h4>
          <p class="text-muted mt-0 font-12">Add an optional header and/or footer within a card. <code class="btn btn-sm" href="#code2" data-bs-toggle="collapse">HTML <i class="fa fa-code"></i></code></p>
          <div id="code2" class="collapse highlight">
              <pre class="prettyprint"><code class="language-html" data-lang="html">
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-header"</span><span class="nt">&gt;</span>
                  Featured
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
                <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Special title<span class="nt">&lt;/h4&gt;</span>
                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>With supporting text below as a natural lead-in to additional content.<span class="nt">&lt;/p&gt;</span>
                <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Custom Link<span class="nt">&lt;/a&gt;</span>
                <span class="nt">&lt;/div&gt;</span>
                <span class="nt">&lt;/div&gt;</span></code>
              </pre>
          </div>
          <!-- Card -->
          <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
              <h4 class="card-title">Special title</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Custom Link</a>
            </div>
          </div>
          <!-- Card -->
        </div>
      </div>
      <!-- End Row -->




    <?php include('../gen_includes/footer_script.php'); ?>
<?php include('../gen_includes/footer.php'); ?>
?>
