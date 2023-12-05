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
  <link rel="stylesheet" href="auditt.css">
<!-- title -->
  <title>Green Auction</title>
  <link rel="icon" type="image/x-icon" href="../pictures/favicon2.ico">
</head>
<body>
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
          <div class="1">ID</div>
          <div class="1">Action</div>
          <div class="1">User</div>
          <div class="1">Timestamp</div>
        </div>

        <div class="bottom-section">
          <?php
            session_start();
            
            if(!isset($_SESSION["username"])) {
              header("location: admin-login.php");
              exit; 
            }
            require_once '../database/connect.php';

            $qry = "SELECT * FROM `audit_trail` ORDER BY `timestamp` DESC";
            $stmt = $pdo->prepare($qry);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $row){



          ?>
          <div class="audit-container">
            <div class="1"><?php echo $row["id"];?></div>
            <div class="1"><?php echo $row["action"];?></div>
            <div class="1"><?php echo $row["user"];?></div>
            <div class="1"><?php echo $row["timestamp"];?></div>
          </div>

          <?php
            }

          ?>
        
        </div>
    </div>
  </div>

</div>
</body>
</html>