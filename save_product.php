<?php
	include "Library/dbconnect.php";
	include "Library/SessionValidate.php";
   	$product_id = $_POST['product_id'];
   	$product_name = $_POST['product_name'];
 	$description = $_POST['description'];
 	$price = $_SESSION['price'];
 	echo $price;
 	$product_image = $_POST['product_img'];
 	echo $product_image;
	
	if(isset($product_id))
	{
		$Asql = mysql_query("INSERT INTO products (product_name,description,price,product_image) VALUES ('$product_name','$description','$price','product_image')");
		if($Asql)
		{
			echo "Data successfully added";
		}
		else
		{
			echo "Failed to add data";
		}
	} 
	else
	{
		echo "Error in adding data";
	}
?>