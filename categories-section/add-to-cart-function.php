<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $prod_id = $_POST["product_id"];

  if(!(isset($_SESSION["Cart"]))){
    $_SESSION["cart"] = array();
  }
}

  $_SESSION["cart"][] = $prod_id;

  echo "product added!";