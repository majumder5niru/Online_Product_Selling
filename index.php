<?php

  session_start(); 
	include "header_page.php";
	include "footer_page.php";
  include  "navbar.php";
  if (!empty($_SESSION['message'])) {
      echo '<b> '.$_SESSION['message'].'</b>';
      unset($_SESSION['message']);
  }

?>
