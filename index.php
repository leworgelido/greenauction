
           <!-- PHP code -->
<?php 

  session_start();

  require_once './database/connect.php';

  try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"])){

      if(empty($_POST["username"]) || empty($_POST["pass"])){

        $message = '<label>All fields are required</label>';

      } else {
          $qry = "SELECT * FROM users WHERE username = :username";
          $result = $pdo->prepare($qry);

          $result->bindParam(":username", $_POST['username']);
          $result->execute();

          $user = $result->fetch();

          if($user && password_verify($_POST["pass"], $user["pass"])) {
            $_SESSION["username"] = $_POST["username"];

            $user_logged_in = $_SESSION["username"];

            $qry = "INSERT INTO `audit_trail` (`action`, `user`) VALUES ('User logged in', :user);";
            $stmt = $pdo->prepare($qry);
            $stmt->bindParam(":user", $user_logged_in);
            $stmt->execute();


            header("location: home.php");

          } else {
            $message = '<label>Wrong Data</label>';
          }

          
      }
    }
  } catch(PDOException $error) {
    $message = $error->getMessage();
  }


  $pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- stylesheet link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/log-in.css">
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="pictures/favicon2.ico">
</head>
<body>
<!-- start -->
  <div class="main">
    <div class="flex">
      <!-- Name of the Shop -->
      <div class="cont">
        <div class="title-container">
          <img class="logo" src="./pictures/logo1.png">
        </div>

      </div>
      
      <!-- Login FORM -->
      <div class="container">
        <div class="login-container">
          <div class="h1">Login</div>
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <input id="user" type="text" name="username" placeholder="Username" >
            <input id="pass" type="password" name="pass" placeholder="Password" >
              <?php
                      if(isset($message)){
                        echo '<label>' . $message . '</label>';
                      }
                ?>
                
            <input id="submit" type="submit" name="login" value="Login">
          </form>
            <div class="text">Don't have an account?<a href="register.php" class="login-here">Signup here</a></div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end -->
</body>
</html>

 
