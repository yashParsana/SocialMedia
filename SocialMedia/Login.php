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
      if ($uname == $value['userDetails']['username'] && $password == $value['userDetails']['password']) {
        session_start();
        $_SESSION['uname'] = $uname;
        header('Location: home.php');
      }
    }
  }
}
?>