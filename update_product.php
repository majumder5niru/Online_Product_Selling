<?php
	include "Library/dbconnect.php";
	include "Library/SessionValidate.php";

	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
 	$description = $_POST['description'];
 	$price = $_SESSION['price'];
 	$product_image = $_POST['product_img'];
 	
	if(isset($product_id))
	{
		$Usql = mysql_query("UPDATE products SET product_name = '$product_name',description = '$description', price = 'price',product_image='product_image' WHERE product_id = '$product_id' ");
		if($Usql)
		{
			echo "Data successfully updated";
		} 
		else
		{
			echo "Failed to update data";
		}
	}else
	{
		echo "Error in updating data";
	}
?>