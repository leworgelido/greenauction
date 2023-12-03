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

    <link rel="stylesheet" href="./styles/prod-info.css"> 
    
    <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="./pictures/favicon2.ico">
</head>
<body>
<div class="header">
    <div class="left-section">
      <a href="./home.php"><img src="./pictures/logo5.png" alt=""></a>
    </div>
    <div class="right-section">
      <a href="add-to-cart.php" class="add-to-cart">
        <img src="./pictures/add-to-cart-logo.png" alt="">
      </a>
      <div class="add-num">0</div>
    </div>
    </div>
    <?php
    require_once './database/connect.php';

      if(isset($_GET["id"])){
        $product_id = $_GET["id"];

        $qry = "SELECT * FROM users_products WHERE id = :id";
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":id", $product_id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $row){
?>  

    <div class="main">
      <div class="container">
        <div class="image-cont">
          <div class="image">
            <img src="./uploads/<?php echo $row["image_product"];?>" alt="">
          </div>
          <div class="description">
            <div class="text-desc">Description</div>
            <div class="desc"><?php echo $row["prod_description"];?></div>
          </div>
        </div>
        <div class="prod-info">
          <div class="product-name-cont">
            <div class="prod-text-cont">
              <div class="prod-name"><?php echo $row["prod_name"];?></div>
              <div class="prod-price">₱<span><?php echo $row["prod_price"];?></span> PER KILO </div>
              <div class="category-prod"><span>Category:</span> <?php echo $row["prod_category"];?></div>
            </div>
          </div>
          <div class="buttons">
            <button class="btn-add-cart">Add to Cart</button>
            <button class="btn-buy-now">Buy Now</button>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>
    </div>
</body>
</html>