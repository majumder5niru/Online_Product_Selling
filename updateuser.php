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

	
	$User_ID = $_POST['User_ID'];
	$Name = $_POST['Name'];
	$Designation = $_POST['Designation'];
	$CompanyName = $_POST['CompanyName'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	$Type = $_POST['Type'];
	$User_Name = $_POST['User_Name'];
	$Password = $_POST['Password'];
	
	


	if(isset($Name))
	{
		$res1 = mysql_query ("  UPDATE _nisl_mas_user 
								SET 
								Name = '$Name',
								Designation = '$Designation',
								CompanyName = '$CompanyName',
								Address = '$Address',
								Email = '$Email',
								Phone = '$Phone'
								WHERE User_ID = '$User_ID'
							");
		
		$res2 = mysql_query ("  UPDATE _nisl_mas_member 
								SET 
								User_Name = '$User_Name',
								Password = '$Password',
								Type = '$Type'
								WHERE User_ID = '$User_ID'
							");
		if($res2)
		{
			echo "Data successfully updated.";
		} 
		else
		{
			echo "Failed to update data";
>>>>>>> e0f1c2a469c97d5a52f4c22cf34fdab01362a502
		}
		
	}else
	{
		echo "Error in updating data";
	}
?>