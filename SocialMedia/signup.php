<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
  <link rel="stylesheet" href="signup.css" />
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
  <div id="wrapper">
    <header>

    </header>
  </div>
  <main>
  <div class="reg">
    <h1 class="text-center">Sign up</h1>
    <form class="color" onsubmit="return validate()">
      <div class="login-page">
        <label>First Name:</label>
        <input onfocusout="validate_name()" type="text" id="name" class="form-control" placeholder="Enter first name" />
        <small id="name_error" class="form-text label-danger"></small>
      </div>

      <div class="login-page">
        <label>Last Name:</label>
        <input onfocusout="validate_name()" type="text" id="name" class="form-control" placeholder="Enter last name" />
        <small id="name_error" class="form-text label-danger"></small>
      </div>

      <div class="login-page">
        <label>Email:</label>
        <input onfocusout="validate_email()" type="text" id="email" class="form-control" placeholder="Enter Email" />
        <small id="email_error" class="form-text label-danger"></small>
      </div>

      <div class="login-page">
        <label>Password:</label>
        <input onfocusout="validate_password()" type="password" id="password" class="form-control" placeholder="Enter Password" />
        <small id="password_error" class="form-text label-danger"></small>
      </div>
      <div class="login-page">
        <label>Confirm Password:</label>
        <input onfocusout="validate_cpassword()" type="password" id="cpassword" class="form-control" placeholder="Enter Confirm Password" />
        <small id="cpassword_error" class="form-text label-danger"></small>
      </div>
      
      <input type="submit" class="btn-primary" value="Submit" />
    </form>
  </div>
  </main>
  <br />

</body>

</html>
<?php
include "config.php";

$str = file_get_contents('JSONData/Login.JSON');
$json = json_decode($str, true);
$userDetails = $json['data'];
if (isset($_POST['submit']) && isset($_POST['uname']) && isset($_POST['pwd'])) {
  $uname = mysqli_real_escape_string($conn, $_POST['uname']);
  $password = mysqli_real_escape_string($conn, $_POST['pwd']);

  if ($uname != "" && $password != "") {
    foreach ($userDetails as $key => $value) {
      echo $key . '=>' . $value['userDetails']['username'] . '<br/>';
      if ($uname == $value['userDetails']['username'] && $password == $value['userDetails']['password']) {
        session_start();
        $_SESSION['uname'] = $uname;
        header('Location: home.php');
      }
    }
  }
}
?>