<?php

session_start();

if (isset($_SESSION['SUserID'])) {
  if (!empty($_SESSION['message'])) {
      echo '<b> '.$_SESSION['message'].'</b>';
      unset($_SESSION['message']);
  }
 // header("Location: dashboard.php");
  //exit;
}
include 'Library/dbconnect.php';
//header("Location: index.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate (1).css">
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" href="css/loginreset.css">-->
    <link rel="stylesheet" href="css/loginstyle.css">
  </head>
  <body>
    <div class="text-center">
      <div class="col-md-4 col-sm-6 col-xs-8 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
        <div class=" cf ">
          <div class="signin animated flipInY">
            <div class="avatar"></div>
            <form action="Authenticate.php" method="post" name="login">

            
              <div class="inputrow">
                <input type="text" id="u_name" name="u_name" placeholder="Username" required/>

                <label for="name" class="ion-person-stalker"></label>
              </div>
              <div class="inputrow">
                <input type="password" id="pass" name="pass" placeholder="Password" required/>
                <label for="pass" class="ion-locked"></label>
              </div>
              <div class="col-sm-6 pr0 forgot">
                <a href="user.php">Not Registered? Register here</a>
              </div>
              <div class="col-sm-6 pr0 forgot">
                <a href="recover.php">Forgot password</a>
              </div>
              <div class="clr"></div>
              <div class="">
                <button type="submit"  class="btn  button1" value="" name="" id="">LOGIN</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>