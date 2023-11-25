<?php
session_start();

require_once '../database/connect.php';
$username = $_SESSION["username"];

$qry = "SELECT pass FROM users WHERE username = :username";
$stmt = $pdo->prepare($qry);
$stmt->bindParam(":username", $username);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($results as $row){
  $pass = $row["pass"];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $Old_pass = $_POST["Oldpass"];
  $New_pass = $_POST["New_pass"];
  $Confirm_pass = $_POST["Confirm_pass"];



  if(!(empty($Old_pass) || empty($New_pass) || empty($Confirm_pass))){
    if($Old_pass != $Confirm_pass){
      if($New_pass === $Confirm_pass){
        if(password_verify($Old_pass, $pass)){

          $hashNew_pass = password_hash($New_pass,PASSWORD_DEFAULT);
  
          $qry = "UPDATE users SET pass =:pass WHERE username = :username";
          $stmt = $pdo->prepare($qry);
          $stmt->bindParam(":pass", $hashNew_pass);
          $stmt->bindParam(":username", $username);
          $stmt->execute();

          
          
          header("Location: ../profile-setting.php?Success2=Successfully Changed!");
          $pdo = null;
        } else {
          header("Location: ../profile-setting.php?Error2=Your old password is invalid!");
          exit();
        }
      } else {
       
        header("Location: ../profile-setting.php?Error2=Your new password and confirm password do not match!");
        exit();
      }
    } else {
      header("Location: ../profile-setting.php?Error2=Your old and new password is just the same, please try again.");
      exit();
    }
  } else {
    header("Location: ../profile-setting.php?Error2=Please ensure all required fields are filled before Changing it");
    exit();
  }
  


}