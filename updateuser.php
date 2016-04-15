<?php
	include_once "Library/dbconnect.php";
	
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
		}
		
	}else
	{
		echo "Error in updating data";
	}
?>