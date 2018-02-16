<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
        <script src="../scripts/jquery-3.2.1.min.js" charset="utf-8"></script>

        <link rel="stylesheet" href="../bootstrap/bootstrap.css">

    <title>
      <?php
          if (isset($_SESSION['u_id'])) {
            $title = "User Page";
          } else {
            $title = "Unauthorized Page";
          }
          echo $title;

       ?></title>
    </title>
  </head>
  <body>
    <?php
      include_once '../includes/navbar.php';
     ?>
<div id="form"></div>
 <script type="text/javascript">
    $(document).ready(function(){
      $("#user_acc").click(function(){
          $("#form").toggle(2000,function(){
            $("#form").html("<?php
                if (isset($_SESSION['u_id'])) {
                 $username = $_SESSION['u_uid'];
                 include_once '../process/dbh.php';
                 echo "<br>".
                 "<center>".
                 "<div class='container'>".
                 "<div class='card border-success mb-3' style='max-width: 20rem;'>" .
                 "<div class='card-header'>User Account Setting</div>" .
                 "<div class='card-body'>" .
                 "<form action='../process/userupdate.php' method='POST'>".
                 "<input class='form-control' type='text' name='uid' value='".$username."' placeholder='New Username'>". "<br>" .
                 "<input class='form-control' type='password' name='confpwd' placeholder='Confirm Password'>".  "<br>" .
                 "<input class='form-control' type='password' name='newpwd' placeholder='New Password'>". "<br>" .
                 "<br>".
                 "<button class='btn btn-outline-info' type='submit' name='update'>Confirm</button>".
                "</center>".
                 "</form>".
                 "</div>".
                 "</div>".
                 "</div>";
             } else {
               header("Location: index.php");
             } ?>");
          });
      });
    });

 </script>

  </body>
</html>
