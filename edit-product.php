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
    <link rel="stylesheet" href="./styles/edit-product.css"> 
    
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

<?php
  session_start();
  require_once './database/connect.php';
  



        if(isset($_POST["Edit"])){
        $product_id = $_POST["product_id"];
        
        $qry = "SELECT * FROM users_products WHERE id = :id";
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":id", $product_id);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $row){
          $pname = $row["prod_name"];
          $pdesc = $row["prod_description"];
          $pprice = $row["prod_price"];
          $pcategory = $row["prod_category"];
          $image = $row["image_product"];
          
        }
          
          
          
          
          ?>








          <div class="overlay">
            <div class="edit-container">
              <div class="text">Edit your Products</div>
              <form action="update-product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="upload-box">
                            <input type="file" name="ProdPicture" id="ProdPicture">
                            <label for="ProdPicture">Update Photo</label>
                        </div>
                        <div class="inputs">
                            <label for="prod_name">Product Name</label>
                            <input class="inp1" name="prod_name" type="text" placeholder="Product Name" value="<?php echo $pname;?>">

                            <label for="prod_desc">Product Description</label>
                            <textarea name="prod_desc" id="prod_desc" cols="20" rows="6"><?php echo $pdesc;?></textarea>

                            <label for="prod_price">Product Price</label>
                            <input class="inp2" name="prod_price" type="number" placeholder="Product Price" value="<?php echo $pprice;?>">

                            <label for="category">Category</label>
                            <select id="category" name="category">
                                <option value="category" <?php echo ($pcategory === 'category') ? 'selected' : ''; ?>>Category</option>
                                <option value="Fresh Produce" <?php echo ($pcategory === 'Fresh Produce') ? 'selected' : ''; ?>>Fresh Produce</option>
                                <option value="Preserved Products" <?php echo ($pcategory === 'Preserved Products') ? 'selected' : ''; ?>>Preserved Products</option>
                                <option value="Organic Products" <?php echo ($pcategory === 'Organic Products') ? 'selected' : ''; ?>>Organic Products</option>
                                <option value="Nuts and Seeds" <?php echo ($pcategory === 'Nuts and Seeds') ? 'selected' : ''; ?>>Nuts and Seeds</option>
                                <option value="Herbs and Spices" <?php echo ($pcategory === 'Herbs and Spices') ? 'selected' : ''; ?>>Herbs and Spices</option>
                                <option value="Honey and Bee Products" <?php echo ($pcategory === 'Honey and Bee Products') ? 'selected' : ''; ?>>Honey and Bee Products</option>
                                <option value="Specialty Products" <?php echo ($pcategory === 'Specialty Products') ? 'selected' : ''; ?>>Specialty Products</option>
                                <option value="Flower and Plants" <?php echo ($pcategory === 'Flower and Plants') ? 'selected' : ''; ?>>Flower and Plants</option>
                                <option value="Homemade Products" <?php echo ($pcategory === 'Homemade Products') ? 'selected' : ''; ?>>Homemade Products</option>
                                <option value="Seasonal Items" <?php echo ($pcategory === 'Seasonal Items') ? 'selected' : ''; ?>>Seasonal Items</option>
                            </select>

                        </div>  
                        
                    </div>
                    <input class="btn-prod" type="submit" name="submit" value="Update Product">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $image; ?>">

                </form>
                    <a class="back-btn"href="list-of-prod.php">Back</a>
            </div>
          </div>

          <?php
        }
      ?>
</body>
</html>