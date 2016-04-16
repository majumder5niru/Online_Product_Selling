<?php
    session_start(); 
	include_once "Library/dbconnect.php";
	$email = $_POST['email'];
	$password = $_POST['password'];
	$re_pass = $_POST['re_pass'];
	$new_pass = $_POST['new_pass'];
	
    if($re_pass==$new_pass){
    	$query = "SELECT * from user where email='$email' AND password='$password' ";
        $result   = mysql_query($query);
        $count = mysql_num_rows($result);
        if($count>0){
        	$res = mysql_query ("  UPDATE user 
								SET 
								password = '$new_pass',
								re_pass = '$new_pass'
								WHERE email = '$email'
							");
        	if($res){
        		$_SESSION['message'] = "Password reset successful";
			    header("Location:index.php");
		    	exit;
        	}else{
        		//echo "Reset is not successful";
        		$_SESSION['message'] = "Reset is not successful";
			    header("Location:change_pass.php");
		    	exit;
        	}
        }else{
        	//echo "Your Password or Email is not correct";
        	$_SESSION['message'] = "Your Password or Email is not correct";
		    header("Location:change_pass.php");
	    	exit;
        }
    }else{
    	//echo " Password don't match";
    	$_SESSION['message'] = "Password don't match";
	    header("Location:change_pass.php");
    	exit;
    }
?>