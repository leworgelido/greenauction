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
    <link rel="stylesheet" href="./styles/list-of-prod.css"> 
    
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

            <div class="prod_list_cont">
                <div class="prod-table">
                    <div class="container">
                        <div class="box">
                            <div class="product-image">Product Image</div>
                        </div>
                        <div class="box">
                            <div class="product-name">Product Name</div>
                        </div>
                        <div class="box">
                            <div class="product-price">Product Price</div>
                        </div>
                        <div class="box">
                            <div class="product-category">Product Category</div>
                        </div>
                        <div class="box">
                            <div class="Action">Action</div>
                        </div>
                    </div>
                    
                </div>
                <div class="prod-list">
                    <div class="prod-cont-full-bg">
                        <div class="prod-container">
                            <?php
                                session_start();
                                require_once './database/connect.php';
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

                                $qry = "SELECT * FROM users_products WHERE users_shop_id = :id";
                                $stmt = $pdo->prepare($qry);
                                $stmt->bindParam(":id", $users_shop_id);
                                $stmt->execute();

                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($results as $row3){
                                    $image = $row3["image_product"];
                                    $pdesc = $row3["prod_description"];

                                    ?>

                                    
                            <div class="img">
                                <div class="image-img">
                                    <img src="./uploads/<?php echo $row3["image_product"];?>" alt="">
                                </div>
                                
                            </div>
                            <div class="p-name">
                                <?php echo $pname = $row3["prod_name"]?>
                            </div>
                            <div class="p-price">
                            <?php echo $pprice = $row3["prod_price"]?>

                            </div>
                            <div class="p-category">
                            <?php echo $pcategory = $row3["prod_category"]?>
                            </div>
                            
                            <div class="btn-action">
                                <form action="edit-product.php" method="POST">
                                    <button class="edit" name="Edit" value="Edit">Edit</button>
                                    <input type="hidden" name="product_id" value="<?php echo $row3["id"]; ?>">
                                </form>

                                <form action="">
                                <button class="delete">Delete</button>
                                </form>
                               
                            
                            </div>
                            <?php
                                    }
                            ?>
                        </div>
                    </div>
                    
                    
                </div>

            </div>
        </div>
    </div>

   

</body>
</html>