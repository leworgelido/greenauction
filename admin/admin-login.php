
           <!-- PHP code -->
           <?php 

session_start();

require_once '../database/connect.php';

try{
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST["login"])){

    if(empty($_POST["username"]) || empty($_POST["passWord"])){

      $message = '<label>All fields are required</label>';

    } else {
        $qry = "SELECT * FROM admin_tbl WHERE username = :username";
        $result = $pdo->prepare($qry);

        $result->bindParam(":username", $_POST['username']);
        $result->execute();

        $user = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach($user as $row){
          $passWord = $row["passWord"];
        }

        if($passWord === $_POST["passWord"]) {
          $_SESSION["username"] = $_POST["username"];
          header("location: admin.php");

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
  <link rel="stylesheet" href="../styles/reset.css">
  <link rel="stylesheet" href="admin-login.css">
<!-- title -->
  <title>Green Auction</title>
  <link rel="icon" type="image/x-icon" href="../pictures/favicon2.ico">
</head>
<body>
<!-- start -->
<div class="main">
  <div class="flex">
  
    
    <!-- Login FORM -->
    <div class="container">
      <div class="login-container">
        <div class="h1">Admin</div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
          <input id="user" type="text" name="username" placeholder="Username" >
          <input id="pass" type="password" name="passWord" placeholder="Password" >
            <?php
                    if(isset($message)){
                      echo '<label>' . $message . '</label>';
                    }
              ?>
              
          <input id="submit" type="submit" name="login" value="Login">
        </form>
      </div>
    </div>
    
  </div>
</div>
<!-- end -->
</body>
</html>


