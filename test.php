<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>


  <?php
    $start = mktime();
    $end = strtotime('now');
    $add = date("y-m-d h:i:sa", $d);
    $now = date("y-m-d h:i:sa", $da);
    
    echo $now . "<br>";
    echo $add . "<br>";
    if ($now > $add) {
      echo "Hello";
    }
  ?>
  
</body>
</html>