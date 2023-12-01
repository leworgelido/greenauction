<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/products.css"> 
    
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

            <a href="">
              <div class="">Fresh Produce</div>
              <img src="./pictures/fresh-produce.png" alt="">
            </a>
            <a href="">
              <div class="">Preserved Products</div>
              <img src="./pictures/preserved.png" alt="">
            </a>
            <a href="">
              <div class="">Organic Products</div>
              <img src="./pictures/organic.png" alt="">
            </a>
            <a href="">
              <div class="">Nuts and Seeds</div>
              <img src="./pictures/nuts.png" alt="">
            </a>
            <a href="">
              <div class="">Herbs and Spices</div>
              <img src="./pictures/herbs.png" alt="">
            </a>
            <a href="">
              <div class="">Honey and Bee Products</div>
              <img src="./pictures/honey.png" alt="">
            </a>
            <a href="">
              <div class="">Specialty Products</div>
              <img src="./pictures/specialty.png" alt="">
            </a>
            <a href="">
              <div class="">Flowers and Plants</div>
              <img src="./pictures/plants.png" alt="">
            </a>
            <a href="">
              <div class="">Homemade Products</div>
              <img src="./pictures/homemade.png" alt="">
            </a>
            <a href="">
              <div class="">Seasonal Items</div>
              <img src="./pictures/seasonal.png" alt="">
            </a>
      </div>

      <div class="discoveries-section">
        <div class="daily-disco">Daily Discoveries</div>
      </div>

  </div>
</body>
</html>