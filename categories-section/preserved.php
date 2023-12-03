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
  <link rel="stylesheet" href="../styles/cate-header.css">
  <link rel="stylesheet" href="./cate-styles/categories.css">
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="../pictures/favicon2.ico">
</head>
<body>
    <?php
      include_once '../cate-header.html';
    ?>
    <div class="main">
      <div class="cate-menu">
        <div class="cate-text">Categories</div>
        <a href="fresh.php">Fresh Produce</a>
        <a href="preserved.php">Preserved Product</a>
        <a href="organic.php">Organic Products</a>
        <a href="nuts.php">Nuts and Seeds</a>
        <a href="herbs.php">Herbs and Spices</a>
        <a href="honey.php">Honey and Bee Products</a>
        <a href="specialty.php">Specialty Products</a>
        <a href="flowers.php">Flowers and Plants</a>
        <a href="homemade.php">Homemade Products</a>
        <a href="seasonal.php">Seasonal Items</a>
      </div>
      
      <div class="cate-products">
          <div class="search">
            <div class="text">Preserved Products</div>
            <div class="search-box">
              <input type="text">
              <button>
                <img src="../pictures/search.svg" alt="">
              </button>
            </div>
            <div></div>
          </div>
          <div class="cate-all-products">
            
            <?php
            session_start();
            require_once '../database/connect.php';
            $display = $_SESSION["display"];
            $username = $_SESSION["username"];
            $preserved = "Preserved Products";

                $qry = "SELECT * FROM users WHERE username = :username";
                $stmt = $pdo->prepare($qry);
                $stmt->bindParam(":username", $username);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $row){
                $id = $row["id"];
                }


                  $qry2 = "SELECT * FROM users_shop WHERE user_id = :id";
                  $stmt = $pdo->prepare($qry2);
                  $stmt->bindParam(":id", $id);
                  $stmt->execute();

                  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($results as $row2){
                    $users_shop_id = $row2["id"];
                    }

                      $qry = "SELECT * FROM users_products WHERE display_prod = :id";
                      $stmt = $pdo->prepare($qry);
                      $stmt->bindParam(":id", $display);
                      $stmt->execute();

                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach ($results as $row3){
                        $image = $row3["image_product"];
                        $pcategory = $row3["prod_category"];

                        if($preserved === $pcategory){

                        
                        
                    ?>
           
            <a href="" class="link-prod">
              <div class="products-container">
                <div class="image-cont">
                  <img src="../uploads/<?php echo $image;?>" alt="">
                </div>
                <div class="text">
                  <div class="prod-name"><?php echo $row3["prod_name"];?></div>
                  <div class="price-cart">
                    <div class="prod-price">₱ <?php echo $row3["prod_price"];?></div>
                    <form action="" method="POST">
                      <button class="btn-add-cart"><img src="../pictures/add-to-cart-logo.png" alt=""></button>
                      <input type="hidden" name="product_id" value="">
                    </form>
                  </div>
                </div>
              </div>
            </a>

            <?php
            }
               } 
            ?>

          </div>
      </div>
    </div>
</body>
</html>