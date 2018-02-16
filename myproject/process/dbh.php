<?php

$DB = array(
"server"=>"localhost",
"username" => "root",
"password" => "",
"dbname" => "dbferil"
);

$conn = mysqli_connect($DB["server"],$DB['username'],$DB["password"],$DB["dbname"]);

if(!$conn){
  die("The database connection had error: ".mysqli_connect_error($conn));
}
