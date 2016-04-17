<?php
	$first_name = $_POST['first-name'];
	$last_name = $_POST['last-name'];
	$email = $_POST['email'];
	$card_number = $_POST['card-number'];

	$Asql = mysql_query("INSERT INTO sold (first_name,last_name,email,card_number) VALUES ('$first_name','$last_name','$email','$card_number')");
?>