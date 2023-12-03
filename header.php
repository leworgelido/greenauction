<!-- php -->
<?php
session_start();

  if(!isset($_SESSION["username"])) {
    header("location: index.php");
    exit; 
  }

  

  $username = $_SESSION["username"];
  

  try{
              
    require_once './database/connect.php';
          $qry = "SELECT * FROM users WHERE username = :username";
          $stmt = $pdo->prepare($qry);

          $stmt->bindParam(":username", $username);
          $stmt->execute();

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach($result as $row){
            $have_shop = $row["have_shop"];
            $id = $row["id"];
          }
          if($have_shop === 0) {
            $mes = "Start Selling";
            $loc = "./start-selling/start-selling.php";

            
          } else {
            $mes = "Go to your Shop";
            $loc = "home-shop.php";
          }

         
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
  <link rel="stylesheet" href="./styles/headerr.css">
  <title>Document</title>
</head>
<body>
<div class="main">
     <!-- section -->
    <div id="home-section">
      <div class="navbar">
        <div class="left-section">
          <a href="home.php">
            <img src="./pictures/logo5.png" alt="">
          </a>
          
        </div>

          <ul class="right-section">
            <li><a class="navv" href="home.php">HOME</a></li>
            <li><a class="navv" href="products.php">PRODUCTS</a></li>
            <li><a class="navv" href="#bidding-section">BIDDING</a></li>
            <li><a class="navv" href="#contact-us-section"> CONTACT</a></li>
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
              </div>
                
              <div class="AddCart">
                <a href="add-to-cart.php" class="add-to-cart">
                  <img src="./pictures/add-to-cart-logo.png" alt="">
                </a>
              </div>
              <?php
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
          </ul>
      </div>

      <div class="acc-box-container">
        <a href="acc-setting.php">Account Setting</a>
        <span></span>
        <a href="<?php echo $loc ?>"><?php echo $mes ?></a>
        <span></span>
        <a href="#">My Orders</a>
        <span></span>
        <a href="#">My History</a>
        <span></span>
        <a href="logout.php">Logout</a>
        <span></span>
        <button class="cancel">Cancel</button>
      </div>
     
      </main>
  <script src="script.js">
   
  </script>
  </script>
</body>
</html>