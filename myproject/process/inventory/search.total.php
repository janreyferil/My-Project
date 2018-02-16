<?php

include_once '../dbh.php';

if (isset($_POST['seek'])) {
    $search = mysqli_real_escape_string($conn,$_POST['search']);
    if(empty($search)) {
      header("Location: ../../pages/total.php?search=empty");
      exit();
    } else {
      $sql = "SELECT * FROM tbl_inventory WHERE pro_name LIKE '%$search%';";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $code = $row['pro_code'];
          $name = $row['pro_name'];
          $price = $row['pro_price'];
          $stock = $row['pro_stock'];
          header("Location: ../../pages/total.php?search=success&code=$code&name=$name&price=$price&stock=$stock");
          exit();
        }
      } else {
            header("Location: ../../pages/total.php?search=failed");
            exit();
      }
    }
  }  else {
      header("Location: ../../pages/total.php");
}
