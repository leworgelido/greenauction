<?php
session_start();
require_once './database/connect.php';

if(isset($_SESSION['username'])){
  $user_logged_out = $_SESSION["username"];

            $qry = "INSERT INTO `audit_trail` (`action`, `user`) VALUES ('User logged out', :user);";
            $stmt = $pdo->prepare($qry);
            $stmt->bindParam(":user", $user_logged_out);
            $stmt->execute();
}

unset($_SESSION['username']);
session_destroy();
header("location: index.php");