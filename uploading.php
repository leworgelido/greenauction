<?php
  session_start();
  require_once 'database/connect.php';
  $username = $_SESSION["username"];
          $qry = "SELECT * FROM users WHERE username = :username";
          $stmt = $pdo->prepare($qry);

          $stmt->bindParam(":username", $username);
          $stmt->execute();

          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach($result as $row){
            $id = $row["id"];
          }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $fileName = $_FILES["shopPicture"]["name"];
      $fileSize = $_FILES["shopPicture"]["size"];
      $fileTmp = $_FILES["shopPicture"]["tmp_name"];

      $file_ex = pathinfo($fileName,PATHINFO_EXTENSION);
      $file_ex_lc = strtolower($file_ex);

      $allowed = array("jpg", "jpeg", "png");

      if(in_array($file_ex_lc,$allowed)) {
        if($fileSize < 250000){


          $NewFileName = uniqid("IMG-",true) . '.'. $file_ex_lc;

          $qry = "UPDATE users_shop SET shop_image = :newFileName WHERE user_id = :id";

          $stmt= $pdo->prepare($qry);

          $stmt->bindParam(":newFileName", $NewFileName);
          $stmt->bindParam(":id", $id);
          $stmt->execute();

          $FileUploadPath = 'uploads/' . $NewFileName;
          move_uploaded_file($fileTmp, $FileUploadPath);

          
          header("Location: home-shop.php");

        } else {
          header("Location: home-shop.php?error=Your files size is too large!");
        }
      } else {
        header("Location: home-shop.php?error=You can't upload this type of files!");
      }
  }