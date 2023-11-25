<?php
session_start();

  if(!isset($_SESSION["username"])) {
    header("location: index.php");
    exit;
  }

  require_once './database/connect.php';

  $username = $_SESSION["username"];

  try{
          $qry = "SELECT * FROM users WHERE username = :username";
          $stmt = $pdo->prepare($qry);

          $stmt->bindParam(":username", $username);
          $stmt->execute();

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $pdo = null;
          $stmt = null;
  }  catch (PDOException $error) {
    echo $error->getMessage();  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/homee.css">
  <title>Document</title>
</head>
<body>
  <div class="main">
  <div id="home-section">
      <div class="navbar">
        <div class="left-section">
          <a href="#home-section">
            <img src="./pictures/logo5.png" alt="">
          </a>
          
        </div>

          <ul class="right-section">
            <li><a href="#home-section">HOME</a></li>
            <li><a href="#products-section">PRODUCTS</a></li>
            <li><a href="#bidding-section">BIDDING</a></li>
            <li><a href="#contact-us-section">CONTACT</a></li>
              <div class="account-settings">
                <button class="btn-acc">
                  <?php
                    foreach($result as $row) {
                      ?>
                      <img src="<?php echo 'uploads/' . $row['image']?>"> <?php
                    } 
                  ?>
                </button>
          </ul>
      </div>

      <div class="acc-box-container">
        <a href="acc-setting.php">Account Setting</a>
        <span></span>
        <a href="#">Start Selling</a>
        <span></span>
        <a href="#">My Orders</a>
        <span></span>
        <a href="#">My History</a>
        <span></span>
        <a href="logout.php">Logout</a>
        <span></span>
        <button class="cancel">Cancel</button>
      </div>
  </div>

  <script src="script.js"></script>

  
</body>
</html>