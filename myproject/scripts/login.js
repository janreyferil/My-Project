


$(document).ready(function() {

  $('#admin').mouseover(function() {
    $('#us').html("<br>" + "<div class='card border-success mb-3' style='max-width: 20rem;'>" +
      "<div class='card-header'>Login as Admin</div>" +
      "<div class='card-body'>" +
      "<form class='form-des' action='../process/login.admin.php' method='POST'>" +
      "<input class='form-control' type='text' name='uid' placeholder='Username'>" + "<br>" +
      "<input class='form-control' type='password' name='pwd' placeholder='Password'>" + "<br>" +
      "<button class='btn btn-outline-light' type='submit' name='loginAdmin'>Confirm</button>" +
      "</form>" +
      "</div>" +
      "</div>");
  });

  $('#user').mouseover(function() {
    $('#us').html("<br>" + "<div class='card border-success mb-3' style='max-width: 20rem;'>" +
      "<div class='card-header'>Login as User</div>" +
      "<div class='card-body'>" +
      "<form class='form-des' action='../process/login.user.php' method='POST'>" +
      "<input class='form-control' type='text' name='uid' placeholder='Username'>" + "<br>" +
      "<input class='form-control' type='password' name='pwd' placeholder='Password'>" + "<br>" +
      "<button class='btn btn-outline-light' type='submit' name='loginUser'>Confirm</button>" +
      "</form>" +
      "</div>" +
      "</div>");
  });

  $('#signup').mouseover(function() {
    $('#us').html("<br>" + "<div class='card border-success mb-3' style='max-width: 20rem;'>" +
      "<div class='card-header'>Signup as User</div>" +
      "<div class='card-body'>" +
      "<form class='form-des' action='../process/signup.php' method='POST'>" +
      "<input class='form-control' type='text' name='uid' placeholder='Username'>" + "<br>" +
      "<input class='form-control' type='password' name='pwd' placeholder='Password'>" + "<br>" +
      "<input class='form-control' type='password' name='credential' placeholder='Credential'>" + "<br>" +
      "<button class='btn btn-outline-light' type='submit' name='submitSignup'>Confirm</button>" +
      "</form>" +
      "</div>" +
      "</div>");
  });
});
