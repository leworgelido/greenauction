<!-- php -->
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
  <!-- stylesheet -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/homee.css"> 
    
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="pictures/favicon2.ico">

</head>
<body>
  <!-- start -->
  <div class="main">
     <!-- section -->
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
                      $id = $row["id"];
                      $username = $row["username"];
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
        <a href="#">Start Selling</a>
        <span></span>
        <a href="logout.php">Logout</a>
        <span></span>
        <button class="cancel">Cancel</button>
      </div>

      
      <div class="hero">


          <div class="img">
            <div class="dark-overlay"></div>
              <?php echo '<div class="greeting">Welcome, '  . $username .'!</div>'?>
            <div class="slogan">Cultivate Success, Harvest Deals: Your Premier Agri-Marketplace for Online Selling and Bidding Excellence.</div>
          </div>


        <div class="three-logo">
          <div class="logo"></div>
          <div class="logo">
            <img class="trusted-pic" src="./pictures/shpping-pic.jpg" alt="shipping-picture">
            <div class="paragraph">
              <div class="title">Shipping</div>
              <div class="sentence">We prioritize swift, secure delivers with a focus on efficiency and safety at every stage.</div>
            </div>
          </div>
          <div class="logo">
            <img class="trusted-pic" src="./pictures/easy-trans-pic.jpg" alt="easy-transaction-picture">
            <div class="paragraph">
              <div class="title">EASY TRANSACTION</div>
              <div class="sentence">Our goal is to ensure smooth, secure transactions with user-friendly experience and utmost safety for all parties involved.</div>
            </div>
          </div>
          <div class="logo">
            <img class="trusted-pic" src="./pictures/trusted-pic.jpg" alt="trusted-picture">
            <div class="paragraph">
              <div class="title">TRUSTED SITE</div>
              <div class="sentence">Our platform ensures secure, efficiency transactions with a primary focus on the highest safety standards for universal use.</div>
            </div>
          </div>
          <div class="logo"></div>
        </div>
      </div>
    </div>

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
              <div class="">Fresh Produce</div>
              <div class="">Organic Products</div>
              <div class="">Fresh Produce</div>
              <div class="">Fresh Produce</div>
              <div class="">Fresh Produce</div>
              <div class="">Organic Products</div>
              <div class="">Fresh Produce</div>
              <div class="">Fresh Produce</div>
        </div>

        <div class="discoveries-section">

        </div>

      </div>
    <div id="bidding-section"></div>
    <div id="contact-us-section"></div>
  </div>
    
<script src="script.js"></script>

</body>
</html>