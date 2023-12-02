<?php
    require_once './database/connect.php';
    session_start();
?>



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
    <link rel="stylesheet" href="./styles/home-shop.css"> 
    
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
                        <a href="add-products.php">My Products</a>
                    </div>
                </div>


            </div>
            <div class="container">
                <div class="">
                    <div class="img-container">
                    <?php
                    $username = $_SESSION["username"];

                    $qry = "SELECT * FROM users WHERE username = :username";
                    $stmt = $pdo->prepare($qry);
                    $stmt->bindParam(":username", $username);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($results as $row){
                    $id = $row["id"];
                    }

                        $qry = "SELECT * FROM users_shop WHERE user_id = :id";
                        $stmt = $pdo->prepare($qry);

                        $stmt->bindParam(":id", $id);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                $shopdesc = $row["shop_description"];
                                $shopname = $row["shop_name"];
                        ?>
                        <img src="<?php echo 'uploads/' . $row['shop_image'] ?>">
                        <?php
                    }
                ?>

                        <form action="uploading.php" method="post" enctype="multipart/form-data">
                            <div class="buttonUpload">
                            <div class="box">
                                <input type="file" name="shopPicture" id="profilePicture">
                                <label for="profilePicture">Photo</label>
                            </div>
                            <button type="submit" name="submit">Upload</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-container">
                        <div class="shop_name"><?php echo $shopname?></div>
                        <div class="description">Description</div>
                        <div class="shop_description"><?php echo $shopdesc ?></div>
                        <div class="btn">
                            <button class="add-description">Edit Description</button>
                        </div>
                        
                    </div>




                </div>
                <div class=""></div>
            </div>
        </div>
        
    </div>
    


    <div class="overlay">
        <div class="container">
            <div class="text">Edit your Description</div>
            <form action="description.php" method="POST">
                <textarea name="shop_descriptiontext" id="description-textarea" cols="40" rows="7"></textarea>
                <div class="btn">
                    <a href="add-product.php" class="back-btn">Back</a>
                    <button class="btn-save" type="submit">Save</button>
                </div>
                
            </form>
        </div>
    </div>

    <script src="pop-up.js"></script>
</body>
</html>