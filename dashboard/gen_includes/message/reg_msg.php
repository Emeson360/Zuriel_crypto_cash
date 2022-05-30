<?php 

if (isset($_SESSION['reg'])) {

  ?>
  
  <div style="background-color: #91560F; width: 60%; border-radius: 20px;" class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php echo "<h4>" . $_SESSION['reg']. "</h4>"; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  unset($_SESSION['reg']);
}

?>