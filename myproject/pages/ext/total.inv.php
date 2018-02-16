<?php
if(isset($_GET['code']) || isset($_GET['name']) || isset($_GET['price'])) {
  $code = $_GET['code'];
  $name = $_GET['name'];
  $price = $_GET['price'];
  $stock = $_GET['stock'];
  echo "<form action='../process/inventory/update.php' method='POST'>".
  "<input class='form-control' type='text' name='ucode' placeholder='Product Code' value='$code'>".
  "<input class='form-control' type='text' name='uname' placeholder='Product Name' value='$name'>".
  "<input class='form-control' type='text' name='uprice' placeholder='Product Price' value='$price'></input>".
  "<button type='submit' name='updates'>Update</button>".
  "</form>";
} else {

}
