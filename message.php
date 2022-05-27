
<?php
if (isset($_SESSION['status'])) {

  ?>
  
  <div style="background-color: #E68919;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <h2>Hey!</h2><?php echo "<h4>" . $_SESSION['status']. "</h4>"; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  unset($_SESSION['status']);
}

?>






