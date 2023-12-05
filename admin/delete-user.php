<?php
  require_once '../database/connect.php';

  if(isset($_POST["name"])){

    $qry = "DELETE FROM uses";


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
  <link rel="stylesheet" href="delete.css">
<!-- title -->
  <title>Green Auction</title>
  <link rel="icon" type="image/x-icon" href="../pictures/favicon2.ico">
</head>
<body>
  <div class="main">
    <div class="content">
      <div class="text-cont">
        <div class="text">Are you sure you want to delete it?</div>
      </div>
      <div class="btn-cont">
        <form action="delete-user.php" method="POST">
          <button class="btn-yes" name="Delete">Yes</button>
        </form>
          <a href="user-acc.php"><button class="btn-no"name="go-back">No</button></a>
      </div>
    </div>
  </div>
</body>
</html>