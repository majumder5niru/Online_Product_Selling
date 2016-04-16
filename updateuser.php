<?php

	session_start();
	include_once "Library/dbconnect.php";
	include "navbar.php";
	 
	$User_ID = $_POST['User_ID'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];
	
	if(isset($name))
	{
		$res1 = mysql_query ("  UPDATE user 
								SET 
								name = '$name',
								address = '$address',
								city = '$city',
								phone = '$phone'
								WHERE User_ID = '$User_ID'
							");
		
		if($res1)
		{
			//echo "Data successfully updated.";
			
			$_SESSION['message'] = "Data successfully updated.";
		    header("Location:update_profile.php");
	    	exit;
		} 
		else
		{
			//echo "Failed to update data";
			$_SESSION['message'] = "Failed to update data";
		    header("Location:update_profile.php");
	    	exit;
		}
		
	}else
	{
		echo "Error in updating data";
	}
?>