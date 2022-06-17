<?php

$con = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

// check connection
if (!$con) {
  die("connection failed: " . mysqli_connect_error());
}

?>