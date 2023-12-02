<?php
    session_start();
    require_once 'database/connect.php';

    $username = $_SESSION["username"];

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

   
    

        if($_SERVER["REQUEST_METHOD"] == "POST") {
          $fileName = $_FILES["ProdPicture"]["name"];
          $fileSize = $_FILES["ProdPicture"]["size"];
          $fileTmp = $_FILES["ProdPicture"]["tmp_name"];
          $prod_name = $_POST["prod_name"];
          $prod_desc = $_POST["prod_desc"];
          $prod_price = $_POST["prod_price"];
          $category = $_POST["category"];

          $file_ex = pathinfo($fileName,PATHINFO_EXTENSION);
          $file_ex_lc = strtolower($file_ex);

          $allowed = array("jpg", "jpeg", "png");
          if(!(empty($prod_name) || empty($prod_desc) || empty($prod_price) || empty($category))) {
            if(in_array($file_ex_lc,$allowed)) {
              if($fileSize < 125000){
  
                $NewFileName = uniqid("PRODUCT-IMG-",true) . '.'. $file_ex_lc;
                $qry = "INSERT INTO users_products (image_product, prod_name, prod_description, prod_price, prod_category, users_shop_id) VALUES (:image_product, :prod_name, :prod_description, :prod_price, :prod_category, :users_shop_id)";
  
                $stmt= $pdo->prepare($qry);
                $stmt->bindParam(":image_product", $NewFileName);
                $stmt->bindParam(":prod_name", $prod_name);
                $stmt->bindParam(":prod_description", $prod_desc);
                $stmt->bindParam(":prod_price", $prod_price);
                $stmt->bindParam(":prod_category", $category);
                $stmt->bindParam(":users_shop_id", $users_shop_id);
                $stmt->execute();
  
                $FileUploadPath = 'uploads/' . $NewFileName;
                move_uploaded_file($fileTmp, $FileUploadPath);
  
                
                header("Location: add-products.php?success=Successfully Published!");
  
              } else {
                $mes = "Your files size is too large!";
              }
            } else {
                $mes = "You can't upload this type of files!";
            }
          } else {
            $mes = "Please ensure that all required fields are filled before publishing";
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
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/add-product.css"> 
    
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
        <div class="column-container">
            <div class="menu-container">
                <div class="menu">
                    <div class="link-tag">
                        <a href="home-shop.php">Home</a>
                        <a href="add-products.php">Add Products</a>
                        <a href="list-of-prod.php">List of Products</a>
                        <a href="add-products.php">Orders</a>
                    </div>
                </div>
            </div>
         

        <div class="add-product-container">
            <div class="add-prod">
                <div class="add-prods-text">
                    Add Products
                </div>
                <div class="line">
                    <div class="upper-line"></div>
                </div>
                <form action="add-products.php" method="POST" enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="upload-box">
                            <input type="file" name="ProdPicture" id="ProdPicture">
                            <label for="ProdPicture">Photo</label>
                        </div>
                        <div class="inputs">
                            <label for="prod_name">Product Name</label>
                            <input name="prod_name" type="text" placeholder="Product Name">

                            <label for="prod_desc">Product Description</label>
                            <textarea name="prod_desc" id="prod_desc" cols="20" rows="6">Description</textarea>

                            <label for="prod_price">Product Price</label>
                            <input class="prod-price" name="prod_price" type="number" placeholder="Product Price">

                            <label for="category">Category</label>
                            <select id="category" name="category" >
                                <option value="category">Category</option>
                                <option value="Fresh Produce">Fresh Produce</option>
                                <option value="Preserved Products">Preserved Products</option>
                                <option value="Organic Products">Organic Products</option>
                                <option value="Nuts and Seeds">Nuts and Seeds</option>
                                <option value="Herbs and Spices">Herbs and Spices</option>
                                <option value="Honey and Bee Products">Honey and Bee Products</option>
                                <option value="Specialty Products">Specialty Products</option>
                                <option value="Flower and Plants">Flower and Plants</option>
                                <option value="Homemade Products">Homemade Products</option>
                                <option value="Seasonal Items">Seasonal Items</option>
                            </select>

                        </div>  
                        
                    </div>
                    <input class="btn-prod" type="submit" name="submit" value="Publish Product">
                </form>
                <?php
                    if(isset($mes)){
                      echo "<div class='error'>" . $mes. "</div>";
                    }
                ?>
                <div class="line2">
                <div class="bottom-line"></div>
            </div>
            </div>

         </div>
         </div>
           
      </div>

      <?php
        if(isset($_GET["success"])){
          echo '<div class="overlay">';
            echo '<div class="success-container">';
              echo '<div class="text">' . $_GET["success"] . '</div>';
              echo '<a href="add-products.php" class="btn-ok">Okay</a>';
              echo '<a href="home.php" class="btn-shop">Go to your Home</a>';
            echo '</div>';
          echo '</div>';
        }
      ?>

</body>
</html>