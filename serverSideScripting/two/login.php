<?php 
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./style.css" >
    <title>----LOGIN----</title>
  </head>
  <body>
    <?php require('./dbconnection.php');

        $emailValue = "";
        $passwordValue = "";
        $loginErr = "";

        if($_SERVER["REQUEST_METHOD"] === 'POST'){

            execute();

        }

        function execute(){
            global $conn;
            global $loginErr;
            global $emailValue;
            global $passwordValue;
        
            $emailValue = $_POST["email"];
            $passwordValue = $_POST["password"];
           
            if(empty($emailValue) || empty($passwordValue)){
                print("where i come");
                $loginErr = "* please fill all the fields";
                return;
            }

           

            $sqlStatement = "SELECT * from users where email='".$emailValue."'";
            $result = $conn->query($sqlStatement);
            if($result->num_rows === 0){
                $loginErr = "* invalid email or password";
                return;
            }

            $row = $result->fetch_assoc();
            if($row['email'] != $emailValue || $row['password'] != $passwordValue){
                $loginErr = "* invalid email or password";
                return;
            }

            //set the session
            $_SESSION["email"] = $row["email"];
       
            header("Location: ".str_replace("login.php"," ",$_SERVER["PHP_SELF"]));

        }

    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>Login</h1>
      <div class="err"><?php echo $loginErr; ?></div>
      <input type="email" placeholder="Enter email" name="email" value="<?php echo $emailValue; ?>" />

      <input type="password" placeholder="Enter the password" name="password" value="<?php echo $passwordValue;  ?>" />

      <button type="submit">Login</button>
      <a href="<?php echo str_replace("login","register",$_SERVER["PHP_SELF"]); ?>" >No Account ?</a>
    </form>
  </body>
</html>
