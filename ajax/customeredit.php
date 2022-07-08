<?php

	/*
		WARNING: YOU SHOULDN'T IMPLEMENT THIS SCRIPT WITHOUT ALSO IMPLEMENTING AUTHENTICATION, 
		WITHOUT AUTHENTICATION A MALICIOUS USER COULD SEND A BOGUS REQUEST AND MANIPULATE YOUR DATABASE. 
		THIS IS INTENDED AS A SAMPLE, NOT TO BE USED LIVE WITHOUT MODIFICATION.
	*/

	/*
		This script handles JSON requests from the page with the same name and returns either 
		true or false is the customer has been updated.
	*/

	require_once "../includes/classes.php";

	if(isset($_REQUEST['JSON'])){
		
		$json = json_decode($_REQUEST['JSON']);
		
		$saved = false;

		$date = Date("U");

		if(Customers::Update($connection, $json->alpha, $json->first, $json->last, $json->sex, $json->birthdate, $json->phone, $json->email, $date)){
			echo "true";
		}else{
			echo "false";
		}
	}else{
		echo "false";
	}

?>