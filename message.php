
<?php
if (isset($_SESSION['status'])) {

  ?>
  
  <div style="background-color: #91560F;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php echo "<h4>" . $_SESSION['status']. "</h4>"; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  unset($_SESSION['status']);
}

if (isset($_SESSION['upload'])) {

  ?>
  
  <div style="background-color: #91560F;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php echo "<h4>" . $_SESSION['upload']. "</h4>"; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  unset($_SESSION['upload']);
}

?>






