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
    if($New_pass === $Confirm_pass){
      if($Old_pass === $pass){
        echo "yes";
      } else {
        echo "3";
      }
    } else {
      echo "2";
   

    
    }

  } else {
    echo "1";
   
  
  }
  


}