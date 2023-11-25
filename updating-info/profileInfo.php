<?php
session_start();

$username = $_SESSION["username"];

  
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $PhoneNo = $_POST["PhoneNo"];
  $users_Address = $_POST["users_Address"];

  try {
    require_once '../database/connect.php';

    $qry = "UPDATE users SET email = :email, PhoneNo = :PhoneNo, users_Address = :users_Address WHERE username = :username";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":PhoneNo", $PhoneNo);
    $stmt->bindParam(":users_Address", $users_Address);
    $stmt->bindParam(":username", $username);

    $stmt->execute();
    

    if($stmt->rowCount() > 0){
      header("Location: ../profile-setting.php?Success=Successfully Changed!");
    } else {
      header("Location: ../profile-setting.php?Error=You just click the button without changing your information.");
    }



  } catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
  }

  
 
 
  
}