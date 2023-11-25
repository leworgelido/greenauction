<?php
session_start();

$username = $_SESSION["username"];

require_once '../database/connect.php';

  $qry = "SELECT * FROM users WHERE username = :username";
  $stmt = $pdo->prepare($qry);
  $stmt->bindParam(":username", $username);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach($results as $row){
  $id = $row["id"];
  }
  
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $PhoneNo = $_POST["PhoneNo"];
  $users_Address = $_POST["users_Address"];

  try {
    $qry = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $row){
      $id = $row["id"];
      echo $id;
    }

    if(!$results){
        $qry = "UPDATE users SET username = :username, email = :email WHERE id = :id";
      
        $stmt = $pdo->prepare($qry);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id);
        $results = $stmt->execute();
        
        if($stmt->rowCount() > 0) {
          
          $_SESSION["username"] = $username;
          $username = $_SESSION["username"];

          if($results){
            if(!(empty($PhoneNo) || empty($users_Address))){

              $qry = "INSERT INTO `users_otherinfo` (`PhoneNo`, `users_Address`, `users_id`) VALUES (:PhoneNo, :users_Address, :users_id)";
              $stmt = $pdo->prepare($qry);
              $stmt->bindParam(":PhoneNo", $PhoneNo);
              $stmt->bindParam(":users_Address", $users_Address);
              $stmt->bindParam(":users_id", $id);
              $stmt->execute();
        
              header("Location: ../profile-setting.php?Success=Successfully changed!");
              $pdo = null;
              $stmt = null;
            } else {

            header("Location: ../profile-setting.php?Success=Successfully changed!");

            $pdo = null;
            $stmt = null;

            }
            
          }
    } 
    } else {
      header("Location: ../profile-setting.php?Error=Username%20is%20already%20taken!");
      exit();
    } 
 
  } catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
  }
}