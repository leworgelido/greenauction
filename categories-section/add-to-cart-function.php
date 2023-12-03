<?php
session_start();
require_once '../database/connect.php';
$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $p_id = $_POST["product_id"];
  $id = $_GET["id"];
  $users_shop_id = $_GET["users_shop_id"];
  $i = 0;
  $cart = ++$i; 

  echo $p_id;
  echo $id;
  echo $users_shop_id;

  
    $qry = "UPDATE add_cart SET cart = :cart WHERE users_id = :id";
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":cart", $cart);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  


  
  
  }
 
