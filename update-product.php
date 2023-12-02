<?php
session_start();
require_once './database/connect.php';
$username = $_SESSION["username"];

$product_id = $_POST["product_id"];

if($_SERVER["REQUEST_METHOD"] == "POST") {
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
          $fileInfo = $_FILES["ProdPicture"];
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
                if($fileSize < 250000){
    
                  $NewFileName = uniqid("PRODUCT-IMG-",true) . '.'. $file_ex_lc;
                  $qry = "UPDATE users_products SET image_product = :image_product, prod_name = :prod_name, prod_description = :prod_description, prod_price = :prod_price, prod_category = :prod_category, users_shop_id = :users_shop_id WHERE id = :id";
    
                  $stmt= $pdo->prepare($qry);
                  $stmt->bindParam(":image_product", $NewFileName);
                  $stmt->bindParam(":prod_name", $prod_name);
                  $stmt->bindParam(":prod_description", $prod_desc);
                  $stmt->bindParam(":prod_price", $prod_price);
                  $stmt->bindParam(":prod_category", $category);
                  $stmt->bindParam(":users_shop_id", $users_shop_id);
                  $stmt->bindParam(":id", $product_id);
                  $stmt->execute();
    
                  $FileUploadPath = 'uploads/' . $NewFileName;
                  move_uploaded_file($fileTmp, $FileUploadPath);
    
                  
                  header("Location: list-of-prod.php");
    
                } else {
                  $mes = "Your files size is too large!";
              echo "333";
  
                }
              } else {
                $product_image = $_POST["product_image"];
    
                if(!(empty($prod_name) || empty($prod_desc) || empty($prod_price) || empty($category))) {
                
                  
                      $qry = "UPDATE users_products SET image_product = :image_product, prod_name = :prod_name, prod_description = :prod_description, prod_price = :prod_price, prod_category = :prod_category, users_shop_id = :users_shop_id WHERE id = :id";
        
                      $stmt= $pdo->prepare($qry);
                      $stmt->bindParam(":image_product", $product_image);
                      $stmt->bindParam(":prod_name", $prod_name);
                      $stmt->bindParam(":prod_description", $prod_desc);
                      $stmt->bindParam(":prod_price", $prod_price);
                      $stmt->bindParam(":prod_category", $category);
                      $stmt->bindParam(":users_shop_id", $users_shop_id);
                      $stmt->bindParam(":id", $product_id);
                      $stmt->execute();
                      
                      header("Location: list-of-prod.php");
      
                  }
                 else {
                  $mes = "Please ensure that all required fields are filled before publishing";
                  echo "123";
                }
  
              }
            } else {
              $mes = "Please ensure that all required fields are filled before publishing";
              echo "122";
            }
            
          }
        }
      
        