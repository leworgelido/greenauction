 <!-- PHP code -->
 <?php 

session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
  

    if(empty($_POST["username"]) || empty($_POST["pass"]) || empty($_POST["email"])){
      $mes = '<label>Please fill out all required fields</label>';

    } else {
        
      try {

      require_once './database/connect.php';
    

      $username = $_POST["username"];
      $pass = $_POST["pass"];
      $email = $_POST["email"];
      $defaultImage = 'account-default-pic.jpg';

      $hash = password_hash($pass,PASSWORD_DEFAULT);
      
      $qry = "SELECT * FROM users WHERE username = :username";
      $stmt = $pdo->prepare($qry);
      $stmt->bindParam(":username", $username);
      $stmt->execute();

      $results = $stmt->fetch(PDO::FETCH_ASSOC);

      if($results){
        $mes = "Username is already taken!";
      }
      else
      {
        $qry = "INSERT INTO users  (username,pass,email, image) VALUES (:username, :pass, :email, :image)";
        $result = $pdo->prepare($qry);
        
        $result->bindParam(":username", $username);
        $result->bindParam(":pass", $hash);
        $result->bindParam(":email", $email);
        $result->bindParam(":image", $defaultImage);
        $result->execute();

        header("location: index.php");
        die();
      }


      } catch(PDOException $e) {
        echo "Query Failed: " . $e->getMessage();
      }
    }
  
  }
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
    <link rel="stylesheet" href="styles/re.css">
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="pictures/favicon2.ico">
</head>
<body>
  <!-- start -->
  <div class="main">
    <!-- Register form -->
    <div class="container">
      <div class="h1">Create an Account</div>
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <input id="user" type="text" name="username" placeholder="Username">
            <input id="email" type="text" name="email" placeholder="Email">
            <input id="pass" type="password" name="pass" placeholder="Password">
            <?php 
                if (isset($mes)){
                  echo '<label>'. $mes . '</label>';
                }
            ?>
           
            <input id="submit" type="submit" value="Signup">
        </form>
        <div class="text">Have already an account?<a href="index.php" class="login-here">Login here</a></div>
    </div>
  </div>
  <!-- end -->
</body>
</html>