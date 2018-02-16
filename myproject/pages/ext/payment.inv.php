<div class="container">
<?php


include_once '../process/dbh.php';

echo '<table class="table table-hover" style="width: 70%;">
  <thead>
    <tr>
      <th scope="col">Transaction Code</th>
      <th scope="col">Date/th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Payment</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>';

$sqlIn_In = "SELECT * FROM tbl_inventory INNER JOIN tbl_total ON tbl_inventory.pro_code = tbl_total.get_code INNER JOIN tbl_transac ON tbl_total.pro_transac = tbl_transac.get_transac;";
$result = mysqli_query($conn,$sqlIn_In);
if(mysqli_num_rows($result) > 0) {
$datas = [];
while ($row = mysqli_fetch_assoc($result)) {
  $datas[] = $row;
}

foreach ($datas as $data) {

  echo    "<tbody>".
          "<tr class='table-active'>".
          "<td>".$data['get_transac']."</td>".
          "<td>".$data['created_at']."</td>".
          "<td>".$data['pro_name']."</td>".
          "<td>".number_format($data['pro_price'],2)."</td>".
          "<td>".$data['pro_quantity']."</td>".
          "<td>".$data['pro_total_vat']."</td>".
          "<td>"."₱".number_format($data['pro_payment'],2)."</td>".
          "<td>"."₱".number_format($data['pro_balance'],2)."</td>".
          "</tr>".
          "<tbody>";
}

}


?>
</div>
