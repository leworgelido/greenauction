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
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/cate-headerr.css">
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="pictures/favicon2.ico">
</head>
<body>
  <div class="header">
    <div class="left-section">
      <a href="../home.php"><img src="../pictures/logo5.png" alt=""></a>
    </div>
    <div class="right-section">
      <a href="../add-to-cart.php" class="add-to-cart">
        <img src="../pictures/add-to-cart-logo.png" alt="">
      </a>
      <?php
        session_start();
        require_once '../database/connect.php';
        $username = $_SESSION["username"];

          $qry = "SELECT * FROM users WHERE username = :username";
          $stmt = $pdo->prepare($qry);

          $stmt->bindParam(":username", $username);
          $stmt->execute();

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach($result as $row){
            $id = $row["id"];
          }

               $qry = "SELECT * FROM add_cart WHERE users_id = :id";
               $stmt = $pdo->prepare($qry);
               $stmt->bindParam(":id",$id);
               $stmt->execute();

               $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


               foreach($result as $row){
                 $cart = $row["cart"];
               }
              ?>
      <div class="add-num"><?php echo $cart?></div>
    </div>
    </div>
</body>
</html>