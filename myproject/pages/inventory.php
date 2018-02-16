<?php

session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <title>
      <?php
          if (isset($_SESSION['u_id'])) {
            $title = "Inventory Page";
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
      include_once 'ext/search.inv.php';
      echo "<div class='container'>";
      echo "<br> <div class='card border-primary mb-3' style='max-width: 20rem;'>
      <div class='card-header'>Add a Product</div>
      <div class='card-body'>
      <form  class='fullpanel' action='../process/inventory/store.php' method='post'>
      <input class='form-control' type='text' name='code' placeholder='Product Code'>
      <input class='form-control' type='text' name='name' placeholder='Product Name'>
      <input class='form-control' type='text' name='price' placeholder='Product Price'>
      <input class='form-control' type='text' name='stock' placeholder='Product Stock'>
      <br> <center>
      <button class='btn btn-outline-secondary' type='submit' name='add'>Add a Product</button>
      </center>
      </div>
      </div>
      </div>
      </form>
      <br>";
      include_once 'ext/table.inv.php';
      echo "</div>";
    } else {
       header("Location: index.php");
    }

     ?>

  </body>
</html>
