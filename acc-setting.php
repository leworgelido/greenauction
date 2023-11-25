<?php
    session_start();
    require_once 'database/connect.php';

    $username = $_SESSION["username"];
    

        if($_SERVER["REQUEST_METHOD"] == "POST") {
          
          $fileName = $_FILES["profilePicture"]["name"];
          $fileSize = $_FILES["profilePicture"]["size"];
          $fileTmp = $_FILES["profilePicture"]["tmp_name"];

          $file_ex = pathinfo($fileName,PATHINFO_EXTENSION);
          $file_ex_lc = strtolower($file_ex);

          $allowed = array("jpg", "jpeg", "png");

          if(in_array($file_ex_lc,$allowed)) {
            if($fileSize < 125000){


              $NewFileName = uniqid("IMG-",true) . '.'. $file_ex_lc;
    
              $qry = "UPDATE users SET image = :newFileName WHERE username = :username";

              $stmt= $pdo->prepare($qry);

              $stmt->bindParam(":newFileName", $NewFileName);
              $stmt->bindParam(":username", $username);
              $stmt->execute();

              $FileUploadPath = 'uploads/' . $NewFileName;
              move_uploaded_file($fileTmp, $FileUploadPath);

              
              header("Location: acc-setting.php");
            } else {
              $mes = "Your files size is too large!";
            }
          } else {
              $mes = "You can't upload this type of files!";
          }
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
  <link rel="stylesheet" href="styles/acc-settings.css">
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
          <div class=""><a href="profile-setting.php">Account Details</a></div>
        </div>  

        <div class="container">
          <div class="image">
            <?php
              $qry = "SELECT * FROM users WHERE username = :username";
              $stmt = $pdo->prepare($qry);

              $stmt->bindParam(":username", $username);
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    ?>
                      <img src="<?php echo 'uploads/' . $row['image'] ?>">
                    <?php
                }
              ?>
          </div>

          <div class="update-image">
            <form action="acc-setting.php" method="post" enctype="multipart/form-data">
              <div class="buttonUpload">
                <div class="box">
                    <input type="file" name="profilePicture" id="profilePicture">
                    <label for="profilePicture">Photo</label>
                </div>
                  <button type="submit" name="submit">Upload</button>
              </div>
                  
                <?php
                  if(isset($mes)) {
                    echo "<div class='error'>$mes</div>";
                  }
                ?> 
                </form>
                <div class="back">
                  <a href="home.php"><button>Back</button></a>
                </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>