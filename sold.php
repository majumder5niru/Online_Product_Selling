<?php
	include "Library/dbconnect.php";
	$first_name = $_POST['first-name'];
	$last_name = $_POST['last-name'];
	$email = $_POST['email'];
	$card_number = $_POST['card-number'];
	$product_id = $_POST['product_id'];

	$Asql = mysql_query("INSERT INTO sold (first_name,last_name,email,card_number,product_id) VALUES ('$first_name','$last_name','$email','$card_number','$product_id')");
	if($Asql){
		echo "Success";
	}else{
		echo "Failed";
	}
?>