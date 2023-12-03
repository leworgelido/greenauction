<?php
session_start();
require_once '../database/connect.php';
$username = $_SESSION["username"];

    $qry = "SELECT * FROM users WHERE username = :username";
      $stmt = $pdo->prepare($qry);
      $stmt->bindParam(":username", $username);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($results as $row){
        $id = $row["id"];
      }

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $shopName = $_POST["shop_name"];
  $fullName = $_POST["full_name"];
  $pickAddress = $_POST["Pick_Address"];
  $shopEmail = $_POST["Shop_Email"];
  $shopPhoneNo = $_POST["Shop_PhoneNo"];
  $shop_image = "../uploads/account-default-pic.jpg";
  $shop_description = "PUT SOME DESCRIPTION";

  try {
    

    if(!(empty($shopName) || empty($fullName) || empty($pickAddress) || empty($shopEmail) || empty($shopPhoneNo))){
      
      $qry = "SELECT * FROM users_shop WHERE shop_name = :shop_name";
      $stmt = $pdo->prepare($qry);
      $stmt->bindParam(":shop_name", $shopName);
      $stmt->execute();

      $results = $stmt->fetch(PDO::FETCH_ASSOC);

      if(!$results) {
        
        $qry = "INSERT into users_shop (shop_name, full_name, pickup_Address, shop_email, shop_PhoneNo, user_id, shop_image, shop_description) VALUES (:shop_name, :full_name, :pickup_Address, :shop_email, :shop_PhoneNo, :user_id, :shop_image, :shop_description)";
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":shop_name", $shopName);
        $stmt->bindParam(":full_name", $fullName);
        $stmt->bindParam(":pickup_Address", $pickAddress);
        $stmt->bindParam(":shop_email", $shopEmail);
        $stmt->bindParam(":shop_PhoneNo", $shopPhoneNo);
        $stmt->bindParam(":user_id", $id);
        $stmt->bindParam(":shop_image", $shop_image);
        $stmt->bindParam(":shop_description", $shop_description);
        $results = $stmt->execute();

        if($results) {
          $have_shop = 1;

          $qry = "UPDATE users SET have_shop = :have_shop WHERE username = :username";
          $stmt = $pdo->prepare($qry);
          $stmt->bindParam(":have_shop", $have_shop);
          $stmt->bindParam(":username", $username);
          $stmt->execute();

          header("Location: start-selling.php?success=Successfully created your shop.");
        }

      } else {
        $mes = '<div class="error">Your Shop Name is already taken!</div>';
        
      }

    } else {
      $mes = '<div class="error">Please ensure all required fields are filled before submitting it</div>';
     
    }







  } catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
  }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/start-sellings.css"> 
    
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="../pictures/favicon2.ico">

</head>
<body>
  <div class="header">
    <div class="left-section">
      <img src="../pictures/logo5.png" alt="">
    </div>
  </div>

  <div class="main">
    <div class="title">
      <div class="sub-title">Welcome to <span>Green Auction</span></div>
      <div class="sub-sub-title">To get started, sign up as a seller by giving the needed information.</div>
    </div>


    <div class="container">
      <div class="upper-line"></div>
      <div class="registration">
      <div></div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
          
        <div class="input">
          <label for="shop_name">Shop Name</label>
          <input type="text" placeholder="Enter your Shop name" name="shop_name">
        </div>

        <div class="input">
          <label for="full_name">Full Name</label>
          <input type="text" placeholder="Enter your Full Name" name="full_name">
        </div>

        <div class="input">
          <label for="">Pickup Address</label>
          <input type="text" placeholder="Street / Brgy / City / Country / Postal Code" name="Pick_Address">
        </div>

        <div class="input">
          <label for="">Email</label>
          <input type="text" placeholder="Shop Email" name="Shop_Email">
        </div>

        <div class="input">
          <label for="">Phone number</label>
          <input type="number" placeholder="Shop Phone Number" name="Shop_PhoneNo">
        </div>
          <?php
              if(isset($mes)) {
                echo $mes;
              }
          ?>


          <div class="button-line">
            <button class="submit" type="submit" onclick="show('popup')">Submit</button>
            <a href="../home.php">Back</a>
          </div>
        </form>
        <div></div>
      </div>
      
      <div class="lower-line"></div>

    </div>
    
      <?php
        if(isset($_GET["success"])){
          echo '<div class="overlay">';
            echo '<div class="success-container">';
              echo '<div class="text">' . $_GET["success"] . '</div>';
              echo '<a href="../home.php" class="btn-ok">Okay</a>';
              echo '<a href="../home-shop.php" class="btn-shop">Go to your Shop</a>';
            echo '</div>';
          echo '</div>';
        }
      ?>

  </div>
</body>
</html>