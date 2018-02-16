<?php

session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="../styles/style.css">
      <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <title>
      <?php
          if (isset($_SESSION['u_id'])) {
            $title = "Action Page";
          } else {
            $title = "Unauthorized Page";
          }
          echo $title;
       ?>
    </title>
  </head>
  <body>

    <?php
    if (isset($_SESSION['u_id'])) {
      include_once '../includes/navbar.php';
      echo '<br>';
      echo '<br>';

      include_once 'ext/search.inv.total.php';

    } else {
       header("Location: index.php");
    }
     ?>
  </body>
</html>
