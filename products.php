<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/product.css"> 
    
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="pictures/favicon2.ico">
</head>
<body>
  <!-- start -->
    <?php
  
      include_once 'header.php';
    ?>

<div id="products-section">
      
      <div class="search-section">
        <div class=""></div>
        <div class="mid">
          <input type="text" placeholder="Search" name="search">
          <button>
            <img src="./pictures/search.svg" alt="">
          </button>
        </div>
        <div class=""></div>
      </div>

      <div class="categories">CATEGORIES</div>
     
      <div class="category-section">

            <a href="./categories-section/fresh.php">
              <div class="">Fresh Produce</div>
              <img src="./pictures/fresh-produce.png" alt="">
            </a>
            <a href="./categories-section/preserved.php">
              <div class="">Preserved Products</div>
              <img src="./pictures/preserved.png" alt="">
            </a>
            <a href="./categories-section/organic.php">
              <div class="">Organic Products</div>
              <img src="./pictures/organic.png" alt="">
            </a>
            <a href="./categories-section/nuts.php">
              <div class="">Nuts and Seeds</div>
              <img src="./pictures/nuts.png" alt="">
            </a>
            <a href="./categories-section/herbs.php">
              <div class="">Herbs and Spices</div>
              <img src="./pictures/herbs.png" alt="">
            </a>
            <a href="./categories-section/honey.php">
              <div class="">Honey and Bee Products</div>
              <img src="./pictures/honey.png" alt="">
            </a>
            <a href="./categories-section/specialty.php">
              <div class="">Specialty Products</div>
              <img src="./pictures/specialty.png" alt="">
            </a>
            <a href="./categories-section/flowers.php">
              <div class="">Flowers and Plants</div>
              <img src="./pictures/plants.png" alt="">
            </a>
            <a href="./categories-section/homemade.php">
              <div class="">Homemade Products</div>
              <img src="./pictures/homemade.png" alt="">
            </a>
            <a href="./categories-section/seasonal.php">
              <div class="">Seasonal Items</div>
              <img src="./pictures/seasonal.png" alt="">
            </a>
      </div>

      <div class="discoveries-section">
        <div class="daily-disco">Daily Discoveries</div>
        <div class="random-products">
          <div class="cate-all-products">
          <?php
            require './database/connect.php';
               $username = $_SESSION["username"];
               $display = $_SESSION["display"];

       
                      $qry = "SELECT * FROM users_products WHERE display_prod = :id";
                      $stmt = $pdo->prepare($qry);
                      $stmt->bindParam(":id", $display);
                      $stmt->execute();

                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach ($results as $row3){
                        $image = $row3["image_product"];
                        $p_id = $row3["id"];

                        $link = "./prod-info.php?id=$p_id";

                    ?>

            
              <a href="<?php echo $link;?>" class="link-prod">
                <div class="products-container">
                  <div class="image-cont">
                    <img src="./uploads/<?php echo $image;?>" alt="">
                  </div>
                  <div class="text">
                    <div class="prod-name"><?php echo $row3["prod_name"];?></div>
                    <div class="price-cart">
                      <div class="prod-price">₱ <?php echo $row3["prod_price"];?></div>
                      <form action="" method="POST">
                        <button class="btn-add-cart"><img src="./pictures/add-to-cart-logo.png" alt=""></button>
                        <input type="hidden" name="product_id" value="">
                      </form>
                    </div>
                  </div>
                </div>
              </a>


              <?php
            }
               
            ?>
            </div>
          </div>
      </div>
  </div>


</body>
</html>