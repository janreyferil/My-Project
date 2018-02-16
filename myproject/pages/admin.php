<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
        <script src="../scripts/jquery-3.2.1.min.js" charset="utf-8"></script>
          <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <meta charset="utf-8">
    <title><?php
        if (isset($_SESSION['a_id'])) {
          $title = "Admin Users";
        } else {
          $title = "Unauthorized Page";
        }
        echo $title;
     ?></title>
  </head>
  <body>
    <div class="container">
    <?php
      if (isset($_SESSION['a_id'])) {

          include_once '../process/dbh.php';
          $id = $_SESSION['a_id'];
          $sql="SELECT * FROM tbl_admin;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $username = $row['ad_uid'];
              }
          }
          echo '<br> <div class="container">
           <div class="card border-success mb-3" style="max-width: 20rem;">
           <div class="card-header">Admin Account Setting
           <form action="../process/logout.php" method="POST">
           <button class="btn btn-outline-secondary" type="submit" name="logout" style="position:relative; float: right;">Logout</button>
           </form>
           </div>
           <div class="card-body">
          <form action="../process/adupdate.php" method="POST">
          <input class="form-control" type="text" name="uid" value="'.$username.'" placeholder="New Username">
          <input class="form-control" type="password" name="confpwd" placeholder="Confirm Password">
          <input class="form-control" type="password" name="newpwd" placeholder="New Password">
          <br> <center>
          <button class="btn btn-outline-info" type="submit" name="update">Confirm</button>
          </form>
          </center>
          <br>
          </div>
              </div>
             <div class="card border-success mb-3" style="max-width: 20rem;">
          <div class="card-header">Credential Setting </div>
           <div class="card-body">

          <form action="../process/credential.php" method="POST">
          <input class="form-control" type="password" name="confcredential" placeholder="Confirm Credential">
          <input class="form-control" type="password" name="newcredential" placeholder="New Credential">
          <br> <center>
          <button class="btn btn-outline-info" type="submit" name="update">Confirm</button>
          </form> </center>';
      } else {
        header("Location: index.php");
      }
     ?>
   </div>
  </body>
</html>
