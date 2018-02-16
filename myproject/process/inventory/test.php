<?php

$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
$count = count($char) - 7;
$shuffle = str_shuffle($char);
$finalshuffle = substr($shuffle,$count);

echo $finalshuffle;
 ?>
