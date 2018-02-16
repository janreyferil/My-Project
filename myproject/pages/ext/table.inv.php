<div class="container">
  <table class="table table-hover" style="width: 40%;">
    <thead>
      <tr>
        <th scope="col">Total Product</th>
        <th scope="col">Total Stock</th>
      </tr>
    </thead>
  <?php
  include_once '../process/dbh.php';
  $sql = "SELECT COUNT(pro_code) AS totalproduct FROM tbl_inventory;";
  $result = mysqli_query($conn,$sql);
  $tproduct =[];
  while ($row = mysqli_fetch_assoc($result))
  {
          $tproduct[] = number_format($row['totalproduct'],2);
  }
  foreach ($tproduct as $tproducts) {
      echo "<tbody>".
        "<tr class='table-active'>".
        "<td>".$tproducts."</td>";

  }
   ?>

   <?php
   $sql = "SELECT SUM(pro_stock) AS totalstock FROM tbl_inventory;";
   $result = mysqli_query($conn,$sql);
  $tstock = [];
   while ($row = mysqli_fetch_assoc($result))
   {
           $tstock[] = number_format($row['totalstock'],2);
   }
   foreach ($tstock as $tstocks) {
     echo  "<td>".$tstocks."</td>".
            "</tbody>".
            "</tr>";

   }
    ?>
</table>
<table class="table table-hover" style="width: 80%">
  <thead>
    <tr>
      <th scope="col">Product Code</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Stock</th>
    </tr>
  </thead>
<?php

$sql = "SELECT * FROM tbl_inventory;";
$sql = "SELECT * FROM tbl_inventory ORDER BY pro_name ASC;";

$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)) {
  header("Location: ../inventory.php?inv=sql");
  exit();
} else {
  $r = mysqli_stmt_execute($stmt);
  if(!$r) {
    header("Location: ../inventory.php?inv=execute");
    exit();
  } else {
    $result = mysqli_stmt_get_result($stmt);
    $datas = [];
    if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
      }
      foreach ($datas as $data) {
      $currprice = "₱ ".number_format($data['pro_price'],2);
      $fstock = number_format($data['pro_stock'],2);
      echo      "<tbody>".
                "<tr class='table-active'>".
                "<td>".$data['pro_code']."</td>".
                "<td>".$data['pro_name']."</td>".
                "<td>".$currprice."</td>".
                "<td>".$fstock."</td>".
                "</tr>".
                "</tbody>";
      }
    }
  }
}
?>
</table>
</div>
