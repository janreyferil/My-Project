<?php
if(isset($_GET['code']) && isset($_GET['name']) && isset($_GET['price'])) {
  $code = $_GET['code'];
  $name = $_GET['name'];
  $price = number_format($_GET['price'],2);
  $stock = number_format($_GET['stock'],2);
  echo "<form action='../process/inventory/gettotal.php' method='POST'>".
  "<p>Product Code: <strong>$code</strong></p><input type='hidden' name='code' value='$code'>".
  "<p>Product Name: <strong>$name</strong></p><input type='hidden' name='name' value='$name'>".
  "<p>Product Price: <strong>₱ $price</strong></p><input type='hidden' name='price' value='$price'></input>".
  "<p>Product Stock: <strong>$stock</strong></p><input type='hidden' name='stock' value='$stock'></input>".
  "<br>".
  "Clasified : <select name='selection' class='btn btn-outline-light'>".
  "<option value='None'>None</option>".
  "<option value='Senior'>Senior</option>".
  "<option value='Discount'>Discount</option>".
  "</select>".
  "<br>".
  "<br>".
  "<input class='form-control' type='text' name='quantity' placeholder='Quantity'></input>".
  "<br>".
  "<center>".
  "<button class='btn btn-outline-info' type='submit' name='total'>Action</button>".
  "</center>".
  "</form>";
}  else {

  if(isset($_GET['code']) && isset($_GET['transac']) && isset($_GET['finaltotal'])) {
      echo '<h3 class="text-success" style="text-align:center">Ready for the payment</h3>';
    include '../process/dbh.php';

    $code = $_GET['code'];
    $transac = $_GET['transac'];
    $finaltotal = number_format($_GET['finaltotal'],2);
    $vat = number_format($_GET['vat'],2);
    $senior = $_GET['senior'];
    $discount = $_GET['discount'];

    $sql = "SELECT * FROM tbl_inventory INNER JOIN tbl_total ON tbl_inventory.pro_code = tbl_total.get_code WHERE tbl_inventory.pro_code = '$code';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
      $name = $row['pro_name'];
      $price = number_format($row['pro_price'],2);
      $stock = number_format($row['pro_stock'],2);
      $quantity = number_format($row['pro_quantity'],2);
      $class = $row['pro_class'];
      $total = number_format($row['pro_total'],2);
      $created = $row['created_at'];
    }

    if($senior == '') {
      $senior = "None";
    } else {
      $senior = "₱" .number_format($_GET['senior'],2);
    }
    if($discount == '')
    {
      $discount = "None";
    } else {
        $discount = "₱" .number_format($_GET['discount'],2);
    }

    echo "<form action='../process/inventory/payment.php' method='POST'>".
    "<p>Product Code: <strong>$code</strong></p>".
    "<p>Product Name: <strong>$name</strong></p>".
    "<p>Class: <strong>$class</strong></p>".
    "<p>Product Stock: <strong>$stock</strong></p>".
    "<p>Product Transaction Code: <strong>$transac</strong></p><input type='hidden' name='transac_code' value='$transac'></input>".
    "<p>Transaction Date: <strong>$created</strong></p>".
    "<p>Product Price: <strong>₱ $price</strong></p>".
    "<p>Product Quantity: <strong>$quantity</strong></p>".
    "<p>Total Price: <strong>₱ $total</strong></p>".
    "<p>Product Discount: <strong>$discount</strong></p>".
    "<p>Vatable: <strong>₱ $vat</strong></p>".
    "<p>Senior Discount: <strong>$senior</strong></p>".
    "<p>Total Price With Vat: <strong>₱ $finaltotal</strong></p><input type='hidden' name='final_total' value='$finaltotal'>";


    if(isset($_GET['balance']) && isset($_GET['payment'])) {
      $payment = $_GET['paiding'];
      $balance = $_GET['balance'];
      echo "<center> <h3 class='text-info'>The payment is ₱".$payment.
      "</p>";
      echo "<h3 class='text-info'>The balance is ₱".$balance.
      "</h3>";
      echo "<h3 class='text-info'>The payment is success!!".
      "</h3> </center>";

    } else {
      echo "<input class='form-control' type='text' name='payment_cus' placeholder='Payment'>".
      "<br>".
      "<center>".
      "<button class='btn btn-outline-info' type='submit' name='paid'>Payment</button>".
      "</center>";
    }
    echo "</form>";
  } else {

    echo '<center>
    <h3 class="text-warning">Search first to run the transaction.</h3>
    </center>';
  }
}
