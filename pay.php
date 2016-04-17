<?php
	include "Library/dbconnnect.php";
	function returnErrorWithMessage($message) 
	{
	    $a = array('result' => 1, 'errorMessage' => $message);
	    echo json_encode($a);
	}
	 
	
	require_once('Stripe.php'); 
	 
	$trialAPIKey = "pk_test_PWmjQPeZC81feLtSudjGiVwu";  
	//$liveAPIKey = "4BYrmtvwLb8iiiq9KIdbnRh5KCeSfPsX";
	 
	Stripe::setApiKey($trialAPIKey);  
	 
	$token = $_POST['stripeToken'];
	$email = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$price = $_POST['price'];
	 
	$priceInCents = $price * 100;

	try
	{
	    if (!isset($token)) throw new Exception("Website Error: The Stripe token was not generated correctly or passed to the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
	    if (!isset($email)) throw new Exception("Website Error: The email address was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
	    if (!isset($firstName)) throw new Exception("Website Error: FirstName was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
	    if (!isset($lastName)) throw new Exception("Website Error: LastName was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
	    if (!isset($priceInCents)) throw new Exception("Website Error: Price was NULL in the payment handler script. Your credit card was NOT charged. Please report this problem to the webmaster.");
	 
	    try
	    {
	        
	        $charge = Stripe_Charge::create(array(
	            "amount" => $priceInCents,
	            "currency" => "usd",
	            "card" => $token,
	            "description" => $email)
	        );
	 
	        // If no exception was thrown, the charge was successful! 
	        // Here, you might record the user's info in a database, email a receipt, etc.
	 
	        $array = array('result' => 0, 'email' => $email, 'price' => $price, 'message' => 'Thank you; your transaction was successful!');
	        echo json_encode($array);
	    }
	    catch (Stripe_Error $e)
	    {
	        $message = $e->getMessage();
	        returnErrorWithMessage($message);
	    }
	}
	catch (Exception $e) 
	{
	    $message = $e->getMessage();
	    returnErrorWithMessage($message);
	}
?>