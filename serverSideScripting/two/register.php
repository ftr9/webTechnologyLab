<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./style.css" >
    <title>----Register----</title>
  </head>
  <body>

  <?php  require('./dbconnection.php');
    $emailErr = "";
    $passwordErr= "";

    $emailValue = "";
    $passwordValue = "";

    $hasFormError = false;

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        if(empty($_POST["email"])){
            $hasFormError = true;
            $emailErr = "* please enter an email address";
        }else{
            $emailErr = "";
            $hasFormError = false;
            $emailValue = $_POST["email"];
            if(!filter_var($emailValue,FILTER_VALIDATE_EMAIL)){
                $emailErr = "* please enter valid email";
                $hasFormError = true;
            }
        }

        if(empty($_POST["password"])){
            $hasFormError = true;
            $passwordErr = "* please enter a password";
        }else{
            $hasFormError = false;
            $passwordErr = "";
            $passwordValue = $_POST["password"];
            if(strlen($passwordValue) < 5){
                $passwordErr = "* min 5 characters is required";
                $hasFormError = true;
            }

        }

        if(!$hasFormError){
            
            $insertQuery = "INSERT INTO `users`(`email`, `password`) VALUES ('$emailValue','$passwordValue')";
            try{
            
                if($conn->query($insertQuery) === TRUE){
            
                   $redirectPath =  str_replace("register","login",$_SERVER["PHP_SELF"]);
                    header("Location: $redirectPath");
                }
            }catch(Exception $e){

               if(strpos($e->getMessage(),"Duplicate") !== false){
                $emailErr = $emailValue." already exists";
               }else{
                echo "<script>Failed to register try again...</script>";
               }
            }
        }

    }

    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>Register</h1>
      <div class="err"><?php echo $emailErr; ?></div>
      <input type="email" placeholder="Enter email" name="email" value="<?php echo $emailValue; ?>" />

      <div class="err" ><?php echo $passwordErr; ?></div>
      <input type="password" placeholder="Enter the password" name="password" value="<?php echo $passwordValue; ?>" />

      <button type="submit">Register</button>
      <a href="<?php echo str_replace("register","login",$_SERVER["PHP_SELF"]); ?>" >Already Registered ?</a>
    </form>
  </body>
</html>
