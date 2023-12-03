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
    <link rel="stylesheet" href="./styles/add-product.css"> 
    <link rel="stylesheet" href="./styles/add-to-carts.css"> 
    
    <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="./pictures/favicon2.ico">
</head>
<body>
<div class="header">
        <div class="left-section">
            <a href="home.php"><img src="./pictures/logo5.png" alt=""></a>
        </div>
    </div>

    <div class="main">
      <div class="main-title">
        <div class="title">Shopping Cart</div>
      </div>
      <div class="cart-container">
        <div class="top-section">
          <div class="product">Product</div>
          <div class="shopname">Shop Name</div>
          <div class="uprice">Unit Price</div>
          <div class="quantity">Quantity</div>
          <div class="tprice">Total Price</div>
          <div class="action">Actions</div>

        </div>
        <div class="bottom-section">
          <div class="products">
            <div class="product-item">
              <div class="image">
                <img src="./uploads/account-default-pic.jpg" alt="">
              </div>
              <div class="product-name">
                <div class="text">FRESH CAROOTS</div>
              </div>
            </div>

              <div class="s_name">Goku's Shop</div>
              <div class="u_price">₱ 1000</div>
              <div class="quan">
                <form action="">
                  <button class="add">&plus;</button>
                </form>
                <div class="quant">3</div>
                <form action="">
                  <button class="sub">&minus;</button>
                </form>
                
              </div>
              <div class="T_price">₱ 3000</div>
              <div class="Actions">
                <button class="checkout">Checkout</button>
                <button class="delete">Delete</button>
              </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>