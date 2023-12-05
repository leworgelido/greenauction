<?php
   if(!isset($_SESSION["username"])) {
    header("location: admin-login.php");
    exit; 
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- stylesheet link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles/reset.css">
  <link rel="stylesheet" href="user-acc.css">
<!-- title -->
  <title>Green Auction</title>
  <link rel="icon" type="image/x-icon" href="../pictures/favicon2.ico">
</head>
<body>
<!-- start -->
<div class="main">
  <div class="header">
    <div class="left-section">
      <div class="logo">Admin</div>
    </div>
    <div class="right-section">
      <a href="logout-admin.php">LOGOUT</a>
    </div>
  </div>

  <div class="bottom">
    <div class="menu">
      <a href="admin.php">Dashboard</a>
      <a href="audit.php">Audit Trail</a>
      <a href="user-acc.php">User Accounts</a>
    </div>
    <div class="content">
        <div class="top-section">
          <div class="1">Username</div>
          <div class="1">Email</div>
          <div class="1">Phone Number</div>
          <div class="1">User Address</div>
          <div class="1">Seller</div>
          <div class="1">Created</div>
          <div class="1">Action</div>
        </div>

        <div class="bottom-section">
        <?php
        require_once '../database/connect.php';

        

        $qry = "SELECT * FROM `users` ORDER BY `created_at` ASC";
        $stmt = $pdo->prepare($qry);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $row){
          $id = $row["id"];

?>
          <div class="user-container">
            <div class="1"><?php echo $row["username"]?></div>
            <div class="1"><?php echo $row["email"]?></div>
            <div class="1"><?php echo $row["PhoneNo"]?></div>
            <div class="1"><?php echo $row["users_Address"]?></div>
            <div class="1"><?php echo $row["have_shop"]?></div>
            <div class="1"><?php echo $row["created_at"]?></div>
            <div class="1">
              <a href="delete-user.php?user_id=<?php echo $row["id"];?>">Delete</a>
            </div>

          </div>
            <?php 
}

        

?>
           
         

        
        </div>
    </div>
  </div>
  </div>

</div>