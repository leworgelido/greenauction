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
  if($_SERVER["REQUEST_METHOD"] === "POST"){
     $description = $_POST["shop_descriptiontext"];
     echo $description;

      try {
        
        
          $qry = "UPDATE users_shop SET shop_description = :shop_descriptione WHERE user_id = :id";
          $stmt = $pdo->prepare($qry);
          $stmt->bindParam(":shop_descriptione", $description);
          $stmt->bindParam(":id", $id);
          $stmt->execute();
        
          header("Location: add-product.php");
        
        }
       catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage();
      }
  }