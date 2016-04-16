<?php

  session_start(); 
	include "header_page.php";
	include "footer_page.php";
  
  if (!empty($_SESSION['message'])) {
      echo '<b> '.$_SESSION['message'].'</b>';
      unset($_SESSION['message']);
  }

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li><a href = "home.php">Home</a></li>
      	<li><a href = "login.php">Log In</a></li>
      	<li><a href = "user.php">Sign In</a></li>
        <li><a href = "change_pass.php">Change Password</a></li>
        <li><a href = "update_profile.php">Update Profile</a></li>
        <li><a href = "product_details.php">Product Details</a></li>
        <li><a href = "contact.php">Contact Us</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>