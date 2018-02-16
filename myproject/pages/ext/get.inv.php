<?php
if(isset($_GET['code']) || isset($_GET['name']) || isset($_GET['price'])) {
  echo '<br>'.'<center>';
  $code = $_GET['code'];
  $name = $_GET['name'];
  $price = $_GET['price'];
  $stock = $_GET['stock'];
  echo "<form action='../process/inventory/update.php' method='POST'>".
  "<input class='form-control' type='text' name='ucode' placeholder='Product Code' value='$code'>".
  "<input class='form-control' type='text' name='uname' placeholder='Product Name' value='$name'>".
  "<input class='form-control' type='text' name='uprice' placeholder='Product Price' value='$price'></input>".
  "<br>".
  "<button class='btn btn-outline-info' type='submit' name='updates'>Update</button>".
  "</form>".
  "<br>".
  "<form action='../process/inventory/delete.php' method='POST'>".
  "<input type='hidden' name='code' value='$code'>".
  "<input type='hidden' name='name' value='$name'>".
  "<input type='hidden' name='price' value='$price'>".
  "<button class='btn btn-outline-danger' type='submit' name='delete'>Delete</button>".
  "</form>".
  "<hr>".
  "<form action='../process/inventory/stock.php' method='POST'>".
  "<input type='hidden' name='code' value='$code'>".
  "<input type='hidden' name='name' value='$name'>".
  "<input type='hidden' name='price' value='$price'>".
  "<input type='hidden' name='stock' value='$stock'>".
  "<input class='form-control' type='text' name='stocker' placeholder='Value'></input>".
  "<br>".
  "<button class='btn btn-outline-light' type='submit' name='add' style='margin-right:10px'>Add</button>".
  "<button class='btn btn-outline-warning' type='submit' name='remove'>Remove</button>".
  "</form>" . "</center>";
} else {

  echo '<br> <p class="text-secondary">Search first after you update, delete or add/remove stocks from selected product.</p>';
}


 ?>
