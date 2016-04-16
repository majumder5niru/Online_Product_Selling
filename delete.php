<?php
	include "Library/dbconnect.php";

	$product_id = $_POST['product_id'];
	
	if(isset($product_id))
	{
		$Asql = mysql_query("DELETE FROM products WHERE product_id = '$product_id'");
		if($Asql)
		{
			echo "Data successfully deleted";
			header("Location:product_details.php");
		    exit;
		}
		else
		{
			echo "Failed to delete data";
		}
	} 
	else
	{
		echo "Error in deleting data";
	}
?>