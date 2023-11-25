<?php
session_start();
  $username = $_SESSION["username"];

  require_once './database/connect.php';
  $qry = "SELECT * FROM users WHERE username = :username";
  $stmt = $pdo->prepare($qry);
  $stmt->bindParam(":username", $username);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach($results as $row){
  $email = $row["email"];
  $username= $row["username"];
  $id = $row["id"];
  }

  $qry2 = "SELECT * FROM users_otherinfo WHERE users_id = :id";
  $stmt2 = $pdo->prepare($qry2);
  $stmt2->bindParam(":id", $id);
  $stmt2->execute();
  $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

  foreach($results2 as $row2){
    $PhoneNo = $row2["PhoneNo"];
    $users_Address = $row2["users_Address"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- stylesheet -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="stylesheet" href="styles/prof-settings.css">
  <!-- title -->
    <title>Green Auction</title>
    <link rel="icon" type="image/x-icon" href="pictures/favicon2.ico">
</head>
<body>
<div class="header">
    <div class="left-section">
      <img src="./pictures/logo5.png" alt="">
    </div>
  </div>

  <div class="main-main">
    <div div class="main">

      <div class="title">
        <div class="">Account Settings</div>
        <div class="">Change your profile and account settings</div>
      </div>




      <div class="account-setting">
        <div class="menu">
          <div class=""><a href="acc-setting.php">Profile Picture</a></div>
          <div class=""><a href="">Account Details</a></div>
        </div>  

        <div class="form">
          <div class="update-info">
              <form action="./updating-info/profileInfo.php" method="POST">
                <div class="title">General Info</div>

                <div class="top-input">
                  <div class="input">
                      <label for="username">Username</label>
                      <input type="text" name="username" placeholder="Change your Username" value="<?php echo $username ?>">
                    </div>

                    <div class="input">
                      <label for="email">Email</label>
                      <input type="text" name="email" placeholder="Change your Email" value="<?php echo $email ?>">
                    </div>

                    <div class="input">
                      <label for="PhoneNo">Phone Number</label>
                      <input type="number" name="PhoneNo" placeholder="(9XXXXXXXXX)" value="<?php echo $PhoneNo ?>"> 
                    </div>
                  </div>
                  
                  <div class="middle-input">
                    <div class="input">
                      <label for="users_Address">Full Address</label>
                      <input type="text" name="users_Address" placeholder="Enter Your Full Address" value="<?php echo $users_Address ?>">
                    </div>

                    <?php
                      if(isset($_GET['Error'])){
                        echo '<div class="Username_error">' .$_GET['Error']. '</div>';
                      }
                    ?>
                  <?php
                    if(isset($_GET['Success'])){
                        echo '<div class="Username_Success">' .$_GET['Success']. '</div>';
                      }
                  ?>
                  </div>
                  <div class="buttons1">
                    <input type="submit" value="Save">
                  </div>
              </form>
                
              <div class="line">
                <span></span>
              </div>  

              
              <div class="title2">Change your Password</div>
              <form action="./updating-info/password.php" method="POST">
                <div class="bottom-input">
                
                    <div class="input"> 
                      <label for="email">Old Password</label>
                      <input type="password" name="Oldpass" placeholder="Password">
                    </div>

                    
                    <div class="input">
                      <label for="email">New Password</label>
                      <input type="password" name="New_pass" placeholder="Password">
                    </div>

                    <div class="input">
                      <label for="email">Confirm Password</label>
                      <input type="password" name="Confirm_pass" placeholder="Password">
                    </div>
                  </div>
                  <div class="buttons2">
                    <input type="submit" value="Save">
                  </div>
              </form>
                  <?php
                    if(isset($_GET['Success2'])){
                        echo '<div class="Username_Success2">' .$_GET['Success2']. '</div>';
                      }
                  ?>
                  <?php
                    if(isset($_GET['Error2'])){
                        echo '<div class="Username_Error2">' .$_GET['Error2']. '</div>';
                      }
                  ?>
                  
          
        </div>
      
        
        <div class="back">
          <a href="home.php"><button>Back</button></a>
          </div>
        </div>
      
      </div>
    </div>
  </div>





</body>
</html>