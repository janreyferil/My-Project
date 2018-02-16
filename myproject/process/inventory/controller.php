<?php

class Controller {

  public function validate($code,$name,$price,$stock) {
    if (empty($code)||empty($name)||empty($price)||empty($stock)) {
        header("Location: ../../pages/inventory.php?inv=empty");
        exit();
    } else {
        if (!preg_match("/^[A-Za-z0-9]*$/", $code) || strlen($code) != 4) {
            header("Location: ../../pages/inventory.php?inv=code");
            exit();
        } else {
            if (!preg_match("/^[A-Za-z ]*$/", $name) || strlen($name) > 15) {
                header("Location: ../../pages/inventory.php?inv=name");
                exit();
            } else {
                if (!preg_match("/^[0-9.]*$/", $price) || strlen($stock) > 10) {
                    header("Location: ../../pages/inventory.php?inv=price");
                    exit();
                } else {
                    if (!preg_match("/^[0-9]*$/", $stock) || strlen($stock) > 10) {
                        header("Location: ../../pages/inventory.php?inv=stock");
                        exit();
                    }
                }
            }
        }
    }
  }

public static function shuffling() {
  $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $count = count($char) - 7;
  $shuffle = str_shuffle($char);
  $finalshuffle = substr($shuffle,$count);

  return $finalshuffle;
}

public static function currtime() {
  $time = time();
  return date("Y-m-d h:i a", $time);
}

}




 ?>
