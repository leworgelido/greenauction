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

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

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
        
    } else {
          $Error = "Username is already taken!";
          
          
        } 
    }
    if($results){
      $qry = "INSERT INTO `users_otherinfo` (`PhoneNo`, `users_Address`) VALUES (:PhoneNo, :users_Address)";
      $stmt = $pdo->prepare($qry);
      $stmt->bindParam(":PhoneNo", $PhoneNo);
      $stmt->bindParam(":users_Address", $users_Address);
      $stmt->execute();

      header("Location: ../profile-setting.php");
      $pdo = null;
      $stmt = null;
    }

    
  } catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
  }
}