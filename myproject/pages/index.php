<?php

session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Inventory Page
    </title>
    <script src="../scripts/jquery-3.2.1.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">

  </head>
  <body>

    <?php
    if(isset($_SESSION['u_id'])) {
      header("Location: user.php");
    }
    else {
      echo '    <br>

      <div class="container">
        <div class="jumbotron">
      <center>
      <h1>Welcome to my first php from scartch</h1>
      <button type="button" class="btn btn-outline-secondary" id="signup">Signup</button>
      <button type="button" class="btn btn-outline-secondary" id="user">Login As User</button>
      <button type="button" class="btn btn-outline-secondary" id="admin">Login As Admin</button>
      <br>
      <div id="us"></div>
      </div>
      </center>';
    }

     ?>
<script type="text/javascript" src="../scripts/login.js"></script>
  </body>
</html>
