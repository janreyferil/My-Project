
<?php

if (isset($_SESSION['u_id'])) {

     $username = $_SESSION['u_uid'];
     echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-brand"><small>Current user is</small> '.$username.'</div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../pages/user.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../pages/inventory.php">Inventory</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../pages/total.php">Transaction</a>
          </li>
        </ul>
        <button class="btn btn-outline-info" style="margin-right:10px" type="button" id="user_acc">User Setting</button>
        <form class="form-inline my-2 my-lg-0" action="../process/logout.php" method="POST">
        <button class="btn btn-outline-secondary" type="submit" name="logout">Logout</button>
        </form>
      </div>
    </nav>';

     echo "<div class='container'>".

     "</div>";
  }
 ?>
