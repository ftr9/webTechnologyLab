<?php session_start() ?>
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
    if(!isset($_SESSION['email'])){
      $loginUrl = str_replace("index.php","login.php",$_SERVER["PHP_SELF"]);
        echo "
          <h1>Please Login First To continue</h1>
          <a href=$loginUrl>Login</a>
        ";
      exit;
      } 
  ?>
  <h1>DASHBOARD</h1>
  <h2>WELCOME <?php echo $_SESSION["email"]; ?></h2>
  

</body>
</html>