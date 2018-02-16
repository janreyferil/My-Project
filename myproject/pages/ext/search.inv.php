<div class="container">
<div class="card border-success mb-3" style="max-width: 12rem; position:relative; float:right; margin-top:25px;">
<div class="card-header">Searching for product</div>
<div class="card-body">
<form action="../process/inventory/search.php" method="POST">
<input class="form-control" type="text" name="search" placeholder="Search"></input>
<br> <center>
<button class="btn btn-outline-success" type="submit" name="seek">Search</button>
</center>
</form>
<?php
include_once 'get.inv.php';
 ?>
</div>
</div>
</div>
