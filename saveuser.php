<?php
	include_once "Library/dbconnect.php";

	$name = $_POST['name'];
	$type = $_POST['type'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$re_pass = $_POST['re_pass'];


	if($password==$re_pass)
	{
		$res = mysql_query("SELECT email FROM user WHERE email = '$email' ");
		$res2 = mysql_query("SELECT user_name FROM user WHERE user_name = '$user_name' ");
		if(mysql_num_rows($res)>0){
			$row = mysql_fetch_array($res);
			extract($row);
			if($email){
				session_start();       
			    $_SESSION['message'] = "Email  has already taken. Try another one.";
			    header("Location:user.php");
		    	exit;
			}
		}elseif(mysql_num_rows($res2)>0){
			$row2 = mysql_fetch_array($res2);
			extract($row2);
			if($user_name){
				session_start();       
			    $_SESSION['message'] = "User Name  has already taken. Try another one.";
			    header("Location:user.php");
		    	exit;
			}
		}else{
			$insert_query = "INSERT INTO user
			(
			    name,
			    user_name,
			    address,
			    city,
			    email,
			    phone,
			    password,
			    re_pass,
			    type
			)
			values
			(
			    '$name',
			    '$user_name',
			    '$address',
			    '$city',
			    '$email',
			    '$phone',
			    '$password',
			    '$re_pass',
			    '$type'
			)
	        ";
	        $a = mysql_query($insert_query) or die(mysql_error());

			if($a){
				session_start();       
			    $_SESSION['message'] = "Your registration is sucessful.Please log in..!!";
			    header("Location:login.php");
		    	exit;
			}
		} 
		
	} 
	else
	{
		
		session_start();       
	    $_SESSION['message'] = "Your Password don't match!!";
	    header("Location:user.php");
    	exit;
	}
?>